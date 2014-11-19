<?php

namespace Lantern\AuthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Lantern\AuthBundle\Entity\User;
use Lantern\AuthBundle\Form\Type\RegisterType;

class SecurityController extends Controller
{

    public function loginAction()
    {

        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render(
            'LanternAuthBundle:Security:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            )
        );
    }

    public function registerAction()
    {
        $user = new User();
        $form = $this->createForm(new RegisterType(), $user, array(
            'action' => $this->generateUrl('create'),
        ));

        return $this->render(
            'LanternAuthBundle:Security:register.html.twig',
            array('form' => $form->createView())
        );
    }

    public function createAction(Request $request)
    {
        $factory = $this->get('security.encoder_factory');
        $em = $this->getDoctrine()->getEntityManager();

        $form = $this->createForm(new RegisterType(), new User());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $user = $form->getData();

            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
            $user->setPassword($password);
            // all registered users get role_user by default
            $role = $em->getRepository('LanternAuthBundle:Role')->findOneByShortName('ROLE_USER');
            $user->addRole($role);

            $em->persist($user);
            $em->flush($user);

            return $this->redirect($this->generateUrl('LanternAppBundle_index', array()));
        }

        return $this->render(
            'LanternAuthBundle:Security:register.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
    * @Template()
    *
    */
    public function resetPasswordAction(Request $request)
    {

        if ($request->isMethod('POST')) {
            $data = $request->request->all();
            $email = $data['_username'];

            $verification = sha1(uniqid(mt_rand(0, 999999) . $email));
            $emailTime = new \DateTime();
            $verifyExpiration = new \DateTime();
            $verifyExpiration->add(new \DateInterval('PT30M'));

            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('LanternAuthBundle:User')->findOneByEmail($email);

            if (null != $user) {
                $user->setVerification($verification);
                $user->setVerifyExpiration($verifyExpiration);
                $em->persist($user);
                $em->flush();

                $body = $this->renderView('LanternAuthBundle:Security:resetEmail.html.twig', array(
                    'verification' => $verification,
                    'email' => $user->getEmail(),
                    'sent' => $emailTime->format('g:ia'),
                    'expire' => $verifyExpiration->format('g:ia'),
                    ));

                $message = \Swift_Message::newInstance()
                ->setSubject('Reset Password')
                ->setFrom('noreply@nomail.com')
                ->setTo($user->getEmail())
                ->setBody($body, 'text/html')
                ;
                $this->get('mailer')->send($message);
                return $this->redirect($this->generateUrl('check_email'));
            }
            return $this->redirect($this->generateUrl('does_not_exist'));
        }

        return array(
            'last_username' => $this->get('request')->getSession()->get(SecurityContext::LAST_USERNAME),
            );
    }

    /**
    * @Template()
    *
    */
    public function doesNotExistAction(Request $request) {
        return array(
            );
    }

    /**
    * @Template()
    *
    */
    public function verifyAction(Request $request, $email, $verification)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('LanternAuthBundle:User')->findOneByEmail($email);
        if (($user->getVerification() === $verification) && ($user->getVerifyExpiration() > new \DateTime()))
        {
            $user->setVerifyExpiration(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
            $this->get('security.context')->setToken($token);
            return $this->redirect($this->generateUrl('change_password'));
        }

        return $this->redirect($this->generateUrl('check_email'));
    }

    /**
    * @Template()
    *
    */
    public function changePasswordAction(Request $request)
    {
        $form = $this->createForm(new ChangePasswordType());
        $user = $this->get('security.context')->getToken()->getUser();

        if ($request->isMethod('POST')) {
            $form->setData($user);
            $form->bind($request);
            if ($form->isValid()) {
                $data = $form->getData();
                $user->setRawPassword($data->getRawPassword());

                $factory = $this->get('security.encoder_factory');
                $user->encodePassword($factory->getEncoder($user));
                $user->setPasswordDate(new \DateTime());

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                return $this->redirect($this->generateUrl('login'));
            }
        }

        return array('form' => $form->createView());
    }

    /**
    * @Template()
    *
    */
    public function checkEmailAction(Request $request)
    {
    }

}