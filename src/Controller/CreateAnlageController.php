<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateAnlageController extends Controller
{
    /**
     * @Route("/windowViews/anlagenEdit.html")
     * @param Response $response
     * @return Response
     */
    public function onIndex(Request $request)
    {
        $splitted = explode("&", urldecode($request->getContent()));
        $data = [];

        array_shift($splitted);
        foreach ($splitted as $value)
        {
            $split = explode("=", $value);
            $data[$split[0]] = $split[1];
        }

        return $this->render("anlagenEdit.html.twig", array("data" => $data));
    }
}

?>