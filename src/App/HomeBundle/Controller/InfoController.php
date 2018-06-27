<?php

namespace App\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InfoController extends Controller
{
    public  function aboutAction(){
        $about = $this->getDoctrine()->getRepository('DataBundle:More')->findBy(array('id'=>1));
        return $this->render('HomeBundle:Info:About.html.twig',array(
            'about' =>$about
        ));
    }
    public  function contactAction(){
        $contact = $this->getDoctrine()->getRepository('DataBundle:More')->findBy(array('id'=>2));
        return $this->render('HomeBundle:Info:Contact.html.twig',array(
            'contact' =>$contact
        ));
    }
}
