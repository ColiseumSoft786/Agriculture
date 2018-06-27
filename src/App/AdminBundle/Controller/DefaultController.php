<?php

namespace App\AdminBundle\Controller;

use App\DataBundle\Entity\Infobank;
use App\DataBundle\Entity\Publications;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
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
    public function indexAction()
    {
        if($this->loggedin){
            $name = "Admin Panel";
            return $this->render('AdminBundle:Default:index.html.twig', array('name' => $name));

        }
        return $this->redirect($this->generateUrl('adminbundle_login'));

    }
    public function publicationsAction(){
        if($this->loggedin){
            $data = array();
            $pub = $this->getDoctrine()->getRepository('DataBundle:Publications')->findAll();
            foreach($pub as $item){
                $pubs = count( $this->getDoctrine()->getRepository('DataBundle:Pub')->findBy(array(
                    'pub' => $item
                )));
                array_push($data,array($item,$pubs));
            }

            return $this->render('AdminBundle:Default:publications.html.twig', array('data' => $data));

        }
        return $this->redirect($this->generateUrl('adminbundle_login'));

       }

    public function infobankAction(){
        if($this->loggedin){
            $info = $this->getDoctrine()->getRepository('DataBundle:Infobank')->findAll();
            $data = array();
            foreach($info as $item){
                $infos = count( $this->getDoctrine()->getRepository('DataBundle:Info')->findBy(array(
                    'info' => $item
                )));
                array_push($data,array($item,$infos));
            }
            return $this->render('AdminBundle:Default:infobank.html.twig', array('data' => $data));
        }
        return $this->redirect($this->generateUrl('adminbundle_login'));

      }
    public function addpubAction(Request $request){
        if($this->loggedin){
            if($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $pub = new Publications();
                $pub->setName($request->get('pub'));
                $em->persist($pub);
                $em->flush();
                return $this->redirect($this->generateUrl('admin_publication_show',array(
                    'name' => $pub->getName(),
                    'id' => $pub->getId()
                )));
            }
        }
        return $this->redirect($this->generateUrl('adminbundle_login'));




    }
    public function addinfoAction(Request $request){
        if($this->loggedin){
            if($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $info = new Infobank();
                $info->setName($request->get('info'));
                $em->persist($info);
                $em->flush();
                return $this->redirect($this->generateUrl('admin_homepage'));
            }
        }
        return $this->redirect($this->generateUrl('adminbundle_login'));


    }
}
