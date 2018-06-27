<?php

namespace App\AdminBundle\Controller;

use App\DataBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
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

    public function loginAction(Request $request)
    {
        $err = "";
        if ($request->getMethod() == "POST"){
            $user = $this->getDoctrine()->getRepository('DataBundle:User')->findOneBy(array(
                'username' => $request->get('username'),
                'password' => md5($request->get('password'))
            ));
            if($user != null){
                if (session_status() == PHP_SESSION_NONE){
                    session_start();
                }
                $_SESSION['user'] = $user;
                return $this->redirect($this->generateUrl('admin_homepage'));
            }else{
                $err = "Username and password is incorrect";
                return $this->render('AdminBundle:Login:login.html.twig', array('err' => $err));
            }
        }
        return $this->render('AdminBundle:Login:login.html.twig', array('err' => $err));
    }
    public function registerAction(Request $request){
        if($request->getMethod() == "POST"){
            $user = new User();
            $user->setUsername($request->get('username'));
            $user->setPassword(md5($request->get('password')));
            $em= $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl('adminbundle_users'));
        }
    }
    public function listusersAction(){
        if($this->loggedin){
            $user = $this->getDoctrine()->getRepository('DataBundle:User')->findAll();
            return $this->render('AdminBundle:Login:users.html.twig', array('user' => $user));
        }
        return $this->redirect($this->generateUrl('adminbundle_login'));
    }
    public function deleteAction($id){
        if($this->loggedin){
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('DataBundle:User')->find($id);
            $em->remove($user);
            $em->flush();
            return $this->redirect($this->generateUrl('adminbundle_users'));
        }
        return $this->redirect($this->generateUrl('adminbundle_login'));

      }
    public function logoutAction(){
        session_destroy();
        return $this->redirect($this->generateUrl('adminbundle_login'));
    }
    public function showAction(){
        return $this->render('AdminBundle:Login:show.html.twig', array('user' => $this->user));

    }
}
