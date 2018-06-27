<?php

namespace App\AdminBundle\Controller;

use App\DataBundle\Entity\Info;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class InfobankController extends Controller
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
                $pub = new Info();
                $pub->setMandi($request->get('mandi'));
                $pub->setAgent($request->get('agent'));
                $pub->setCompany($request->get('company'));
                $pub->setPhone($request->get('phone'));
                $pub->setTraded($request->get('traded'));
                $pub->setDetails($request->get('details'));
                $pub->setInfo($this->getDoctrine()->getRepository('DataBundle:Infobank')->find($id));
                $em = $this->getDoctrine()->getManager();
                $em->persist($pub);
                $em->flush();
                return $this->redirect($this->generateUrl('admin_infobank_show',array(
                    'name' => $pub->getInfo()->getName(),
                    'id' => $id
                )));
            }
            $info = $this->getDoctrine()->getRepository('DataBundle:Infobank')->find($id);
            return $this->render('AdminBundle:Infobank:new.html.twig', array(
                'info' => $info
            ));
        }return $this->redirect($this->generateUrl('adminbundle_login'));


    }
    public function editAction(Request $request,$id)
    {
        if($this->loggedin){
            if($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $pub = $em->getRepository('DataBundle:Info')->find($id);
                $pub->setMandi($request->get('mandi'));
                $pub->setAgent($request->get('agent'));
                $pub->setCompany($request->get('company'));
                $pub->setPhone($request->get('phone'));
                $pub->setTraded($request->get('traded'));
                $pub->setDetails($request->get('details'));

                $em->flush();
                return $this->redirect($this->generateUrl('admin_infobank_show',array(
                    'name' => $pub->getInfo()->getName(),
                    'id' => $pub->getInfo()->getId()
                )));
            }
            $info = $this->getDoctrine()->getRepository('DataBundle:Info')->find($id);
            return $this->render('AdminBundle:Infobank:edit.html.twig', array(
                'info' => $info
            ));
        }return $this->redirect($this->generateUrl('adminbundle_login'));


    }
    public function showAction($name,$id){
        if($this->loggedin){
            $infos = $this->getDoctrine()->getRepository('DataBundle:Info')->findBy(array(
                'info' => $id
            ));
            $info = $this->getDoctrine()->getRepository('DataBundle:Infobank')->find($id);
            return $this->render('AdminBundle:InfoBank:show.html.twig', array(
                'info' => $info,
                'infos' => $infos
            ));
        }return $this->redirect($this->generateUrl('adminbundle_login'));


    }
    public function deleteAction($id){
        if($this->loggedin){
            $em = $this->getDoctrine()->getManager();
            $pub = $em->getRepository('DataBundle:Info')->find($id);

            $name = $pub->getInfo()->getName();$pubid = $pub->getInfo()->getId();
            $em->remove($pub);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_Infobank_show',array(
                'name' => $name,
                'id' => $pubid
            )));
        }return $this->redirect($this->generateUrl('adminbundle_login'));



    }





    public function editpubnameAction(Request $request,$id){
        if($this->loggedin){
            $em = $this->getDoctrine()->getManager();
            $info = $em->getRepository('DataBundle:Infobank')->find($id);
            $info->setName($request->get('name'));
            $em->flush();
            return $this->redirect($this->generateUrl('admin_infobank_show',array(
                'name' => $info->getName(),
                'id' => $id
            )));
        }return $this->redirect($this->generateUrl('adminbundle_login'));


    }
    public function deletepubmainAction($id){
        if($this->loggedin){
            $em = $this->getDoctrine()->getManager();
            $info = $em->getRepository('DataBundle:Infobank')->find($id);
            $em->remove($info);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_homepage'));

        }return $this->redirect($this->generateUrl('adminbundle_login'));

       }

}
