<?php

namespace App\AdminBundle\Controller;

use App\DataBundle\Entity\Link;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LinkController extends Controller
{
    private $loggedin = false;
    private $user = null;
    public function __construct()
    {
        if(isset($_SESSION['user'])){
            $this->user = $_SESSION['user'];
            $this->loggedin = true;
        }
    }
    public function indexAction(){
        if($this->loggedin){
            $link = $this->getDoctrine()->getRepository('DataBundle:Link')->findAll();
            return $this->render('AdminBundle:Link:index.html.twig', array(
                'link' => $link
            ));
        }return $this->redirect($this->generateUrl('adminbundle_login'));
    }
    public function newAction(Request $request)
    {
        if($this->loggedin){
            if($request->getMethod() == "POST"){
                $pub = new Link();
                $pub->setName($request->get('name'));
                $pub->setPath($request->get('link'));
                $em = $this->getDoctrine()->getManager();
                $em->persist($pub);
                $em->flush();
                return $this->redirect($this->generateUrl('admin_link_index',array(
                )));
            }
            return $this->render('AdminBundle:Link:new.html.twig', array(
            ));
        }return $this->redirect($this->generateUrl('adminbundle_login'));

    }
    public function editAction(Request $request,$id)
    {
        if($this->loggedin){
            if($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $pub = $em->getRepository('DataBundle:Link')->find($id);
                $pub->setName($request->get('name'));
                $pub->setPath($request->get('link'));
                $em->flush();
                return $this->redirect($this->generateUrl('admin_link_index',array(

                )));
            }
            $pub = $this->getDoctrine()->getRepository('DataBundle:Link')->find($id);
            return $this->render('AdminBundle:Link:edit.html.twig', array(
                'link' => $pub
            ));
        }return $this->redirect($this->generateUrl('adminbundle_login'));


    }
    public function deleteAction($id){
        if($this->loggedin){
            $em = $this->getDoctrine()->getManager();
            $pub = $em->getRepository('DataBundle:Link')->find($id);
            $em->remove($pub);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_link_index',array(
            )));
        }return $this->redirect($this->generateUrl('adminbundle_login'));



    }

}
