<?php

namespace App\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class MoreController extends Controller
{
    public function AboutAction(Request $request){
        if ($request->getMethod() == 'POST'){
            $em = $this->getDoctrine()->getManager();
            $about = $em->getRepository('DataBundle:More')->findOneBy(array('name'=>'About'));
            $about->setText($request->get('text'));
            $em->flush();
            return $this->redirect($this->generateUrl('admin_info_about'));
        }
        $about = $this->getDoctrine()->getRepository('DataBundle:More')->findBy(array('name'=>'About'));
        return $this->render('AdminBundle:Info:about.html.twig',array(
            'about' => $about,
        ));
    }
    public function ContactAction(Request $request){
        if ($request->getMethod() == 'POST'){
            $em = $this->getDoctrine()->getManager();
            $about = $em->getRepository('DataBundle:More')->findOneBy(array('name'=>'Contact'));
            $about->setText($request->get('text'));
            $em->flush();
            return $this->redirect($this->generateUrl('admin_info_contact'));
        }
        $contact = $this->getDoctrine()->getRepository('DataBundle:More')->findBy(array('name'=>'Contact'));
        return $this->render('AdminBundle:Info:contact.html.twig',array(
            'contact' => $contact,
        ));
    }
}
