<?php

namespace App\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsController extends Controller
{
    public function indexAction()
    {
        $news = $this->getDoctrine()->getRepository('DataBundle:News')->findAll();
        $news = array_reverse($news);
        return $this->render('HomeBundle:News:index.html.twig', array(
                'news' => $news
            ));
    }

    public function singleAction($id)
    {
        $news = $this->getDoctrine()->getRepository('DataBundle:News')->find($id);
        return $this->render('HomeBundle:News:single.html.twig', array(
            'news' => $news
            ));
    }
    public function latestAction(){
        $news = $this->getDoctrine()->getRepository('DataBundle:News')->findby(array(),array('id' => 'DESC'),4,0);
        return $this->render('HomeBundle:News:latest.html.twig', array(
            'news' => $news
        ));
    }

}
