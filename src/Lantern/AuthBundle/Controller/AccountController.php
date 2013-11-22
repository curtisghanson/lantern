<?php

namespace Lantern\AuthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Lantern\AuthBundle\Form\Type\RegistrationType;
use Lantern\AuthBundle\Entity\AuthUser;


class AccountController extends Controller
{
    public function registerAction()
    {
        $user = new AuthUser();
        $form = $this->createForm(new RegistrationType(), $user, array(
            'action' => $this->generateUrl('account_create'),
        ));

        return $this->render(
            'LanternAuthBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }

    public function createAction(Request $request)
    {
        $factory = $this->get('security.encoder_factory');
        $em = $this->getDoctrine()->getEntityManager();

        $form = $this->createForm(new RegistrationType(), new AuthUser());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $user = $form->getData();

            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
            $user->setPassword($password);

            $em->persist($user);
            $em->flush($user);

            return $this->redirect($this->generateUrl('LanternAppBundle_home', array()));
        }

        return $this->render(
            'LanternAuthBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }
}