<?php

namespace App\AdminBundle\Controller;

use App\DataBundle\Entity\News;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NewsController extends Controller
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
    public function newAction(Request $request)
    {
        if($this->loggedin){
            if($request->getMethod() == "POST"){
                $pub = new News();
                $pub->setName($request->get('name'));
                $pub->setDetails($request->get('details'));
                if($_FILES['doc']['name'] != ""){
                    $info = pathinfo($_FILES['doc']['name']);
                    $ext = $info['extension'];
                    $date = date('mdYhisms', time());
                    $newname = $date . '.' . $ext;
                    $target = 'bundles/Images/'.$newname;
                    move_uploaded_file( $_FILES['doc']['tmp_name'], "./".$target);
                    $pub->setImage($target);
                }
                $em = $this->getDoctrine()->getManager();
                $em->persist($pub);
                $em->flush();
                return $this->redirect($this->generateUrl('admin_news_show',array(

                )));
            }
            return $this->render('AdminBundle:News:new.html.twig', array(
            ));
        }return $this->redirect($this->generateUrl('adminbundle_login'));

    }
    public function editAction(Request $request,$id)
    {
        if($this->loggedin){
            if($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $pub = $em->getRepository('DataBundle:News')->find($id);
                $pub->setName($request->get('name'));
                $pub->setDetails($request->get('details'));
                if($_FILES['doc']['name'] != ""){
                    if($pub->getImage() != null){
                        if(file_exists("./".$pub->getImage())){
                            unlink("./".$pub->getImage());
                        }
                    }
                    $info = pathinfo($_FILES['doc']['name']);
                    $ext = $info['extension'];
                    $date = date('mdYhisms', time());
                    $newname = $date . '.' . $ext;
                    $target = 'bundles/Images/'.$newname;
                    move_uploaded_file( $_FILES['doc']['tmp_name'], "./".$target);
                    $pub->setImage($target);
                }
                $em->flush();
                return $this->redirect($this->generateUrl('admin_news_show',array(

                )));
            }
            $pub = $this->getDoctrine()->getRepository('DataBundle:News')->find($id);
            return $this->render('AdminBundle:Slider:edit.html.twig', array(
                'news' => $pub
            ));
        }return $this->redirect($this->generateUrl('adminbundle_login'));


    }
    public function showAction(){
        if($this->loggedin){
            $news = $this->getDoctrine()->getRepository('DataBundle:News')->findAll();
            return $this->render('AdminBundle:News:show.html.twig', array(
                'news' => $news,
            ));
        }return $this->redirect($this->generateUrl('adminbundle_login'));
    }
    public function deleteAction($id){
        if($this->loggedin){
            $em = $this->getDoctrine()->getManager();
            $pub = $em->getRepository('DataBundle:News')->find($id);
            if($pub->getImage() != null){
                if(file_exists("./".$pub->getImage())){
                    unlink("./".$pub->getImage());
                }
            }
            $em->remove($pub);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_news_show',array(
            )));
        }return $this->redirect($this->generateUrl('adminbundle_login'));



    }

}
