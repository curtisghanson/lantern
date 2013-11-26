<?php

namespace Lantern\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class AjaxController extends Controller
{
    public function ajaxAction(Request $request)
    {
/*
        // all ajax requests require a route
        // from which the data is requested
        // i.e. a POST or GET
        // return responses are in json

        // get the request
        // $request = $this->container->get('request');

        // get the route from the request object
        // forward the quest and prepare the response
        //$response = $this->forward('AcmeHelloBundle:Hello:fancy', array(
        //    'name'  => $name,
        //    'color' => 'green',
        //));

        // then prepend the response status
        $isAjax = $request->isXMLHttpRequest();
        //var_dump($isAjax);die;
        if ($isAjax) {
            $response = array('code' => 100, 'msg' => 'horray, im ajax');
            return new Response(json_encode($response));
        }
        $response = array('code' => 400, 'msg' => 'not ajax');
        return new Response(json_encode($response));
*/
        // then prepend the response status
        $isAjax = $request->isXMLHttpRequest();

        // all ajax requests require a route
        // from which the data is requested
        // i.e. a POST or GET
        // return responses are in json

        // get the request
        $route = $request->query->get('route');
        $path = $this->get('router')->generate($route);
        $path = str_replace( '/lantern/app_dev.php' , '', $path);
        $controller = $this->get('router')->match($path);

        // get the route from the request object
        // forward the quest and prepare the response
        $response = $this->forward($controller['_controller'], array(
            'data'  => $request->query,
        ));

        if ($isAjax) {
            $response = array('code' => 100, 'data' => $response);
            return new Response(json_encode($response));
        }
        $response = array('code' => 400, 'data' => 'error');
        return new Response(json_encode($response));
    }
}
