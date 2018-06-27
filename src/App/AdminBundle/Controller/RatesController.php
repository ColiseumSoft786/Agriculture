<?php

namespace App\AdminBundle\Controller;

use App\DataBundle\Entity\City;
use App\DataBundle\Entity\Item;
use App\DataBundle\Entity\Rates;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RatesController extends Controller
{
    public function newAction(Request $request){
        if($request->getMethod() == "POST"){
            $rate = new Rates();
            $rate->setItem($this->getDoctrine()->getRepository('DataBundle:Item')->find($request->get('veg')));
            $rate->setCity($this->getDoctrine()->getRepository('DataBundle:City')->find($request->get('city')));
            $rate->setRate($request->get('rate'));
            $sd = explode("-",$request->get('date'));
            $date = new \DateTime();
            $date->setDate($sd[0],$sd[1],$sd[2]);
            $rate->setDate($date);
            $em = $this->getDoctrine()->getManager();
            $em->persist($rate);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_rates_index'));
        }
    }
    public function indexAction(){
        $item = array_reverse($this->getDoctrine()->getRepository('DataBundle:Item')->findAll());
        $city = array_reverse($this->getDoctrine()->getRepository('DataBundle:City')->findAll());
        $rates = $this->getDoctrine()->getRepository('DataBundle:Rates')->findBy(array(),array('date' => 'DESC'),50);
        return $this->render('AdminBundle:Rates:index.html.twig',array(
            'rates' => $rates,
            'veg' => $item,
            'city' => $city
        ));
    }
    public function newitemAction(Request $request){
        if ($request->getMethod() == "POST"){
            $item = new Item();
            $item->setName($request->get('name'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_rates_index'));
        }
    }
    public function newcityAction(Request $request){
        if ($request->getMethod() == "POST"){
            $item = new City();
            $item->setName($request->get('name'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_rates_index'));
        }
    }
    public function geteditAction(Request $request){
        if($request->get('ch') == "veg"){
            $veg = $this->getDoctrine()->getRepository('DataBundle:Item')->find($request->get('id'));
            return $this->render('AdminBundle:Rates:veg.html.twig',array('veg' => $veg));
        }else if($request->get('ch') == "city"){
            $city = $this->getDoctrine()->getRepository('DataBundle:City')->find($request->get('id'));
            return $this->render('AdminBundle:Rates:city.html.twig',array('city' => $city));
        }else if($request->get('ch') == "rate"){
            $rates = $this->getDoctrine()->getRepository('DataBundle:Rates')->find($request->get('id'));
            $city = $this->getDoctrine()->getRepository('DataBundle:City')->findAll();
            $veg = $this->getDoctrine()->getRepository('DataBundle:Item')->findAll();
            return $this->render('AdminBundle:Rates:rates.html.twig',array('rate' => $rates,'veg' => $veg,'city' => $city));
        }
    }
    public function editvegAction(Request $request){
        if ($request->getMethod() == "POST"){
            $em = $this->getDoctrine()->getManager();
            $item = $em->getRepository('DataBundle:Item')->find($request->get('id'));
            $item->setName($request->get('name'));
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirect($this->generateUrl('admin_rates_index'));
        }
    }
    public function editcityAction(Request $request){
        if ($request->getMethod() == "POST"){
            $em = $this->getDoctrine()->getManager();
            $item = $em->getRepository('DataBundle:City')->find($request->get('id'));
            $item->setName($request->get('name'));
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirect($this->generateUrl('admin_rates_index'));
        }
    }
    public function editrateAction(Request $request){
        if($request->getMethod() == "POST"){
            $em = $this->getDoctrine()->getManager();
            $rate= $em->getRepository('DataBundle:Rates')->find($request->get('id'));

            $rate->setItem($this->getDoctrine()->getRepository('DataBundle:Item')->find($request->get('veg')));
            $rate->setCity($this->getDoctrine()->getRepository('DataBundle:City')->find($request->get('city')));
            $rate->setRate($request->get('rate'));
            $sd = explode("-",$request->get('date'));
            $date = new \DateTime();
            $date->setDate($sd[0],$sd[1],$sd[2]);
            $rate->setDate($date);
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirect($this->generateUrl('admin_rates_index'));
        }
    }
    public function delrateAction($id){
        $em = $this->getDoctrine()->getManager();
        $rate = $em->getRepository('DataBundle:Rates')->find($id);
        $em->remove($rate);
        $em->flush();
        return $this->redirect($this->generateUrl('admin_rates_index'));
    }
    public function delvegAction($id){
        $em = $this->getDoctrine()->getManager();
        $item = $em->getRepository('DataBundle:Item')->find($id);
        $rate = $em->getRepository('DataBundle:Rates')->findBy(array('item' => $item));
        foreach ($rate as $i){
            $em->remove($i);
            $em->flush();
        }
        $em->remove($item);
        $em->flush();
        return $this->redirect($this->generateUrl('admin_rates_index'));
    }
    public function delcityAction($id){
        $em = $this->getDoctrine()->getManager();
        $item = $em->getRepository('DataBundle:City')->find($id);
        $rate = $em->getRepository('DataBundle:Rates')->findBy(array('city' => $item));
        foreach ($rate as $i){
            $em->remove($i);
            $em->flush();
        }
        $em->remove($item);
        $em->flush();
        return $this->redirect($this->generateUrl('admin_rates_index'));
    }

}
