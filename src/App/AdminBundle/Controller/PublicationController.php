<?php

namespace App\AdminBundle\Controller;

use App\DataBundle\Entity\Pub;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PublicationController extends Controller
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
    public function newAction(Request $request,$name,$id)
    {
        if($this->loggedin){

            if($request->getMethod() == "POST"){
                $pub = new Pub();
                $pub->setName($request->get('name1'));
                $pub->setDetails($request->get('details'));
                if($_FILES['doc']['name'] != ""){
                    $info = pathinfo($_FILES['doc']['name']);
                    $ext = $info['extension'];
                    $date = date('mdYhisms', time());
                    $newname = $date . '.' . $ext;
                    $target = 'bundles/documents/'.$newname;
                    move_uploaded_file( $_FILES['doc']['tmp_name'], "./".$target);
                    $pub->setDocument($target);
                }
                $pub->setPub($this->getDoctrine()->getRepository('DataBundle:Publications')->find($id));
                $em = $this->getDoctrine()->getManager();
                $em->persist($pub);
                $em->flush();
                return $this->redirect($this->generateUrl('admin_publication_show',array(
                    'name' => $pub->getPub()->getName(),
                    'id' => $id
                )));        }
            $pub = $this->getDoctrine()->getRepository('DataBundle:Publications')->find($id);
            return $this->render('AdminBundle:Publication:new.html.twig', array(
                'pub' => $pub
            ));
        }return $this->redirect($this->generateUrl('adminbundle_login'));

    }
    public function editAction(Request $request,$id)
    {
        if($this->loggedin){
            if($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $pub = $em->getRepository('DataBundle:Pub')->find($id);
                $pub->setName($request->get('name'));
                $pub->setDetails($request->get('details'));
                if($_FILES['doc']['name'] != ""){
                    if($pub->getDocument() != null){
                        if(file_exists("./".$pub->getDocument())){
                            unlink("./".$pub->getDocument());
                        }
                    }
                    $info = pathinfo($_FILES['doc']['name']);
                    $ext = $info['extension'];
                    $date = date('mdYhisms', time());
                    $newname = $date . '.' . $ext;
                    $target = 'bundles/documents/'.$newname;
                    move_uploaded_file( $_FILES['doc']['tmp_name'], "./".$target);
                    $pub->setDocument($target);
                }
                $em->flush();
                return $this->redirect($this->generateUrl('admin_publication_show',array(
                    'name' => $pub->getPub()->getName(),
                    'id' => $pub->getPub()->getId()
                )));
            }
            $pub = $this->getDoctrine()->getRepository('DataBundle:Pub')->find($id);
            return $this->render('AdminBundle:Publication:edit.html.twig', array(
                'pub' => $pub
            ));
        }return $this->redirect($this->generateUrl('adminbundle_login'));


    }
    public function showAction($name,$id){
        if($this->loggedin){
            $pubs = $this->getDoctrine()->getRepository('DataBundle:Pub')->findBy(array(
                'pub' => $id
            ));
            $pub = $this->getDoctrine()->getRepository('DataBundle:Publications')->find($id);
            return $this->render('AdminBundle:Publication:show.html.twig', array(
                'pub' => $pub,
                'pubs' => $pubs
            ));
        }return $this->redirect($this->generateUrl('adminbundle_login'));


    }
    public function deleteAction($id){
        if($this->loggedin){
            $em = $this->getDoctrine()->getManager();
            $pub = $em->getRepository('DataBundle:Pub')->find($id);
            if($pub->getDocument() != null){
                if(file_exists("./".$pub->getDocument())){
                    unlink("./".$pub->getDocument());
                }
            }

            $name = $pub->getPub()->getName();$pubid = $pub->getPub()->getId();
            $em->remove($pub);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_publication_show',array(
                'name' => $name,
                'id' => $pubid
            )));
        }return $this->redirect($this->generateUrl('adminbundle_login'));



    }

    public function editpubnameAction(Request $request,$id){
        if($this->loggedin){
            $em = $this->getDoctrine()->getManager();
            $pub = $em->getRepository('DataBundle:Publications')->find($id);
            $pub->setName($request->get('name'));
            $em->flush();
            return $this->redirect($this->generateUrl('admin_publication_show',array(
                'name' => $pub->getName(),
                'id' => $id
            )));
        }return $this->redirect($this->generateUrl('adminbundle_login'));


    }
    public function deletepubmainAction($id){
        if($this->loggedin){
            $em = $this->getDoctrine()->getManager();
            $pub = $em->getRepository('DataBundle:Publications')->find($id);
            $em->remove($pub);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_homepage'));

        }return $this->redirect($this->generateUrl('adminbundle_login'));

     }

}
