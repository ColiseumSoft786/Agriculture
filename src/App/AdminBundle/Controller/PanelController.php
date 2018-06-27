<?php

namespace App\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PanelController extends Controller
{
    public function indexAction()
    {
        $q = $this->getDoctrine()->getRepository('DataBundle:Question')->findAll();
        $q = array_reverse($q);
        return $this->render('AdminBundle:Panel:index.html.twig', array(
            'q' => $q
            ));
    }
    public function changeAction($id){
        $em = $this->getDoctrine()->getManager();
        $q = $em->getRepository('DataBundle:Question')
            ->find($id);
        if($q->getApproved() == 0){
            $q->setApproved(1);
        }else{
            $q->setApproved(0);
        }
        $em->flush();
        return $this->redirect($this->generateUrl('panel_index'));
    }
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $q = $em->getRepository('DataBundle:Question')
            ->find($id);
        $em->remove($q);
        $em->flush();
        return $this->redirect($this->generateUrl('panel_index'));

    }

}
