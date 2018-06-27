<?php

namespace App\HomeBundle\Controller;

use App\DataBundle\Entity\Answer;
use App\DataBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PanelController extends Controller
{
    public function indexAction()
    {
        $q = $this->getDoctrine()->getRepository('DataBundle:Question')->findby(
            array('approved' => 1)
        );
        $data = array();
        foreach ($q as $item){
            $ans = count($this->getDoctrine()->getRepository('DataBundle:Answer')->findBy(
                array('question' => $item->getId())
            ));
            array_push($data,array($item,$ans));
        }
        $data = array_reverse($data);
        return $this->render('HomeBundle:Panel:index.html.twig',array(
            'q' => $data
        ));
    }
    public function createAction(Request $request){
        if ($request->getMethod() == "POST"){
            $q = new Question();
            $q->setName($request->get('name'));
            $q->setEmail($request->get('email'));
            $q->setQuestion($request->get('question'));
            $date = new \DateTime();
            $date->setTimezone(new \DateTimeZone('Asia/Karachi'));
            $q->setDate($date);
            $q->setApproved(0);
            $em = $this->getDoctrine()->getManager();
            $em->persist($q);
            $em->flush();
            return new Response('true');
        }
        return $this->render('HomeBundle:Panel:create.html.twig');
    }
    public function answersAction($q,Request $request){
        if($request->getMethod() == "POST"){
            $ans = new Answer();
            $ans->setApproved(1);
            $ans->setAnswer($request->get('answer'));
            $ans->setName($request->get('name'));
            $ans->setQuestion($this->getDoctrine()->getRepository('DataBundle:Question')->find($q));
            $date = new \DateTime();
            $date->setTimezone(new \DateTimeZone('Asia/Karachi'));
            $ans->setDate($date);
            $em = $this->getDoctrine()->getManager();
            $em->persist($ans);
            $em->flush();
            return $this->redirect($this->generateUrl('Panel_answers',array('q' => $q)));
        }
        $ans = $this->getDoctrine()->getRepository('DataBundle:Answer')->findBy(array(
            'question' => $q
        ));
        $q = $this->getDoctrine()->getRepository('DataBundle:Question')->find($q);
        return $this->render('HomeBundle:Panel:answer.html.twig',array(
            'ans' => $ans,
            'q' => $q
        ));
    }
}
