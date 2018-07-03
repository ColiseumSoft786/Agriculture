<?php

namespace App\AdminBundle\Controller;

use App\DataBundle\Entity\Slider;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SliderController extends Controller
{
    public function indexAction(){
        if($this->loggedin){
            $slider = $this->getDoctrine()->getRepository('DataBundle:Slider')->findAll();
            return $this->render('AdminBundle:Slider:index.html.twig', array(
                'slider' => $slider,
            ));
        }return $this->redirect($this->generateUrl('adminbundle_login'));
    }
    private $loggedin = false;
    private $user = null;
    public function __construct()
    {
        if(isset($_SESSION['user'])){
            $this->user = $_SESSION['user'];
            $this->loggedin = true;
        }
    }
    public function newAction(Request $request)
    {
        if($this->loggedin){
            if($request->getMethod() == "POST"){
                $pub = new Slider();
                $pub->setName($request->get('name'));
                if($_FILES['doc']['name'] != ""){
                    $info = pathinfo($_FILES['doc']['name']);
                    $ext = $info['extension'];
                    $date = date('mdYhisms', time());
                    $newname = $date . '.' . $ext;
                    $target = 'bundles/Images/'.$newname;
                    move_uploaded_file( $_FILES['doc']['tmp_name'], "./".$target);
                    $pub->setPath($target);
                }
                $em = $this->getDoctrine()->getManager();
                $em->persist($pub);
                $em->flush();
                return $this->redirect($this->generateUrl('admin_slider_index',array(

                )));
            }
            return $this->render('AdminBundle:Slider:new.html.twig', array(
            ));
        }return $this->redirect($this->generateUrl('adminbundle_login'));

    }
    public function editAction(Request $request,$id)
    {
        if($this->loggedin){
            if($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $pub = $em->getRepository('DataBundle:Slider')->find($id);
                $pub->setName($request->get('name'));
                if($_FILES['doc']['name'] != ""){
                    if($pub->getPath() != null){
                        if(file_exists("./".$pub->getPath())){
                            unlink("./".$pub->getPath());
                        }
                    }
                    $info = pathinfo($_FILES['doc']['name']);
                    $ext = $info['extension'];
                    $date = date('mdYhisms', time());
                    $newname = $date . '.' . $ext;
                    $target = 'bundles/Images/'.$newname;
                    move_uploaded_file( $_FILES['doc']['tmp_name'], "./".$target);
                    $pub->setPath($target);
                }
                $em->flush();
                return $this->redirect($this->generateUrl('admin_slider_index',array(

                )));
            }
            $pub = $this->getDoctrine()->getRepository('DataBundle:Slider')->find($id);
            return $this->render('AdminBundle:Slider:edit.html.twig', array(
                'slider' => $pub
            ));
        }return $this->redirect($this->generateUrl('adminbundle_login'));


    }
    public function deleteAction($id){
        if($this->loggedin){
            $em = $this->getDoctrine()->getManager();
            $pub = $em->getRepository('DataBundle:Slider')->find($id);
            if($pub->getPath() != null){
                if(file_exists("./".$pub->getPath())){
                    unlink("./".$pub->getPath());
                }
            }
            $em->remove($pub);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_slider_index',array(
            )));
        }return $this->redirect($this->generateUrl('adminbundle_login'));



    }

}
