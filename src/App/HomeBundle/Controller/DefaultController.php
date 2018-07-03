<?php

namespace App\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $veg = $this->getDoctrine()->getRepository('DataBundle:Item')->findAll();
        $city = $this->getDoctrine()->getRepository('DataBundle:City')->findBy(array(),array('id'=>'DESC'),10);
        $news = $this->getDoctrine()->getRepository('DataBundle:News')->findBy(array(),array('id'=>'DESC'),20);
        return $this->render('HomeBundle:Default:index.html.twig',array(
            'veg' => $veg,
            'city' => $city,
            'news' => $news
            ));
    }
    public function sliderAction(){
        $slider = $this->getDoctrine()->getRepository('DataBundle:Slider')->findAll();
        $veg = $this->getDoctrine()->getRepository('DataBundle:Item')->findAll();
        $city = $this->getDoctrine()->getRepository('DataBundle:City')->findAll();
        return $this->render('HomeBundle:Default:slider.html.twig',array(
            'slider' => $slider,
            'city' => $city,
            'veg' => $veg
        ));
    }
    public function Chart_HomeAction(){
        $veg = $this->getDoctrine()->getRepository('DataBundle:Item')->findAll();
        $city = $this->getDoctrine()->getRepository('DataBundle:City')->findAll();
        $news = $this->getDoctrine()->getRepository('DataBundle:News')->findBy(array(),array('id'=>'DESC'),20);
        $link = $this->getDoctrine()->getRepository('DataBundle:Link')->findBy(array(),array('id'=>'DESC'),10);
        return $this->render('HomeBundle:Default:chart_home.html.twig',array(
            'city' => $city,
            'veg' => $veg,
            'news' => $news,
            'link' => $link
        ));
    }
    public function byvegAction($id){
        $veg = $this->getDoctrine()->getRepository('DataBundle:Item')->find($id);
        $city = $this->getDoctrine()->getRepository('DataBundle:City')->findAll();
        return $this->render('HomeBundle:Default:byveg.html.twig',array(
            'veg' => $veg,
            'city' => $city
        ));
    }
    public function bycityAction($id){
        $veg = $this->getDoctrine()->getRepository('DataBundle:Item')->findAll();
        $city = $this->getDoctrine()->getRepository('DataBundle:City')->find($id);
        return $this->render('HomeBundle:Default:bycity.html.twig',array(
            'veg' => $veg,
            'city' => $city
        ));
    }



    public function detailsAction($veg,$city){
        $rates = $this->getDoctrine()->getRepository('DataBundle:Rates')->findBy(array(
            'item' => $veg,
            'city' => $city
        ));

        $sum = 0;
        $avg = 0;
        if(count($rates) != 0){
            foreach($rates as $item){
                $sum = $sum + $item->getRate();
            }
            $avg = $sum/count($rates);
            return new Response("<center>".$avg."</center>");
        }
        return new Response("<center>-</center>");
    }public function detailsmaxAction($veg,$city){
        $rates = $this->getDoctrine()->getRepository('DataBundle:Rates')->findBy(array(
            'item' => $veg,
            'city' => $city
        ));
        $val = array();
        foreach($rates as $item){
            array_push($val,$item->getRate());
        }
    if(count($val) == 0){
        return new Response("<center>-</center>");
    }
        $val = max($val);
        return new Response("<center>$val</center>");
    }public function detailsminAction($veg,$city){
        $rates = $this->getDoctrine()->getRepository('DataBundle:Rates')->findBy(array(
            'item' => $veg,
            'city' => $city
        ));

    $val = array();
    foreach($rates as $item){
        array_push($val,$item->getRate());
    }
    if(count($val) == 0){
        return new Response("<center>-</center>");
    }
    $val = min($val);
    return new Response("<center>$val</center>");
    }
    public function chartAction(Request $request){
        $veg = $this->getDoctrine()->getRepository('DataBundle:Item')->findAll();
        $city = $this->getDoctrine()->getRepository('DataBundle:City')->findAll();
        if($request->getMethod() == "POST"){
            $sd = explode("-",$request->get('sdate'));
            $sdate = new \DateTime();
            $sdate->setDate($sd[0],$sd[1],$sd[2]);
            $sd = explode("-",$request->get('edate'));
            $edate = new \DateTime();
            $edate->setDate($sd[0],$sd[1],$sd[2]);
            $qb = $this->getDoctrine()->getManager()->createQueryBuilder()
                ->select('c')
                ->from('DataBundle:Rates', 'c')
                ->where('c.item = :item AND c.city = :city AND c.date BETWEEN :firstDate AND :lastDate ORDER BY c.date ASC')
                ->setParameter('firstDate', $sdate)
                ->setParameter('lastDate', $edate)
                ->setParameter('item',$request->get('veg'))
                ->setParameter('city',$request->get('city'));

            $rates = $qb->getQuery()->getResult();

            return $this->render('HomeBundle:Default:chart.html.twig',array(
                'veg' => $veg,
                'city' => $city,
                'rates' => $rates,
                'sveg' => $this->getDoctrine()->getRepository('DataBundle:Item')->find($request->get('veg')),
                'scity' => $this->getDoctrine()->getRepository('DataBundle:City')->find($request->get('city')),
                'edate' => $edate,
                'sdate' => $sdate
                ));
        }

        return $this->render('HomeBundle:Default:chart.html.twig',array(
            'veg' => $veg,
            'city' => $city
        ));
    }





    public function menuAction(){
        $pubs = $this->getDoctrine()->getRepository('DataBundle:Publications')->findAll();
        $info = $this->getDoctrine()->getRepository('DataBundle:Infobank')->findAll();
        $link = $this->getDoctrine()->getRepository('DataBundle:Link')->findAll();
        return $this->render('HomeBundle:Default:menu.html.twig',array(
            'link' => $link,
            'pubs' => $pubs,
            'info' => $info
        ));
    }
    public function singlepubAction($name,$id){
        $pub = $this->getDoctrine()->getRepository('DataBundle:Publications')->find($id);
        $pubs = $this->getDoctrine()->getRepository('DataBundle:Pub')->findBy(array(
            'pub' => $id
        ));
        $pubs = array_reverse($pubs);
        return $this->render('HomeBundle:Default:pubs.html.twig',array(
            'pubs' => $pubs,
            'pub' => $pub
        ));
    }
    public function singleinfoAction($name,$id){
        $info = $this->getDoctrine()->getRepository('DataBundle:Infobank')->find($id);
        $infos = $this->getDoctrine()->getRepository('DataBundle:Info')->findBy(array(
            'info' => $id
        ));
        $infos = array_reverse($infos);
        return $this->render('HomeBundle:Default:infos.html.twig',array(
            'infos' => $infos,
            'info' => $info
        ));
    }
    public function infodetailsAction($id){
        $detail = $this->getDoctrine()->getRepository('DataBundle:Info')->find($id);
        $info = $this->getDoctrine()->getRepository('DataBundle:Infobank')->find($detail->getInfo()->getId());

        return $this->render('HomeBundle:Default:details.html.twig',array(
            'detail' => $detail,
            'info' => $info
        ));
    }
    public function info_deskAction($id,$action){
        if($action == 'list'){
            if($id == 'Farmers'){
                $data = $this->getDoctrine()->getRepository('DataBundle:InfoDesk')->findBy(array('nId'=>0));
            }
            elseif ($id == 'Cooperate'){
                $data = $this->getDoctrine()->getRepository('DataBundle:InfoDesk')->findBy(array('nId'=>1));
            }
            elseif ($id == 'Exporters'){
                $data = $this->getDoctrine()->getRepository('DataBundle:InfoDesk')->findBy(array('nId'=>2));
            }
            return $this->render('HomeBundle:default:info_desk_view.html.twig',array(
                'data' => $data,
                'name' => $id,
            ));
        }
        else{
            $data = $this->getDoctrine()->getRepository('DataBundle:InfoDesk')->findOneBy(array('id'=>$id));
            return $this->render('HomeBundle:default:info_desk_read.html.twig',array(
                'data' => $data,
            ));
        }
    }
}
