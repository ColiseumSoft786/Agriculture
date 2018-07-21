<?php

namespace App\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\DataBundle\Entity\InfoDesk;
use App\DataBundle\Entity\Pics;


class InfoDeskController extends Controller
{
    public function info_deskAction($action,$id,Request $request){
        if($request->getMethod() == 'POST'){
            if($action == 'new'){
                $new = New InfoDesk();
                $new->setName($request->get('name'));
                $new->setNId($id);
                $new->setDetails($request->get('details'));
                if($_FILES['pic']['name'] != ""){
                    $info = pathinfo($_FILES['pic']['name']);
                    $ext = $info['extension'];
                    $date = date('mdYhisms', time());
                    $newname = $date . '.' . $ext;
                    $target = 'bundles/Images/'.$newname;
                    move_uploaded_file( $_FILES['pic']['tmp_name'], "./".$target);
                    $new->setImg($target);
                }
                $em = $this->getDoctrine()->getManager();
                $em->persist($new);
                $em->flush();
                return $this->redirect($this->generateUrl('admin_info_desk', ['action' => 'view', 'id' => $id]));

            }
            elseif ($action == 'edit'){

                $em = $this->getDoctrine()->getManager();
                $edit = $em->getRepository('DataBundle:InfoDesk')->find($id);
                $edit->setName($request->get('name'));
                $edit->setDetails($request->get('details'));
                if($_FILES['pic']['name'] != ""){
                    if($edit->getimg() != null){
                        if(file_exists("./".$edit->getimg())){
                            unlink("./".$edit->getimg());
                        }
                    }
                    $info = pathinfo($_FILES['pic']['name']);
                    $ext = $info['extension'];
                    $date = date('mdYhisms', time());
                    $newname = $date . '.' . $ext;
                    $target = 'bundles/Images/'.$newname;
                    move_uploaded_file( $_FILES['pic']['tmp_name'], "./".$target);
                    $edit->setimg($target);
                }
                $var = $edit->getNId();
                $em->flush();
                return $this->redirect($this->generateUrl('admin_info_desk', ['action' => 'view', 'id' => $var]));
            }
        }
        if ($action == 'view'){
            $fetch = $this->getDoctrine()->getRepository('DataBundle:InfoDesk')->findBy(array('nId'=>$id));
            if($id == 0){$name = 'Farmers';}elseif ($id == 1){$name = 'Markets';}
            return $this->render('AdminBundle:info_desk:view.html.twig',array(
                'fetch' => $fetch,
                'name'  => $name,
                'id'    => $id
            ));
        }
        elseif ($action == 'delete'){
            $em = $this->getDoctrine()->getManager();
            $delete = $em->getRepository('DataBundle:InfoDesk')->find($id);
            if($delete->getImg() != null){
                if(file_exists("./".$delete->getImg())){
                    unlink("./".$delete->getImg());
                }
            }
            $var = $delete->getNId();
            $em->remove($delete);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_info_desk', ['action' => 'view', 'id' => $var]));
        }
        elseif ($action == 'new'){
            if($id == 0){$name = 'Farmers';}else{$name = 'Markets';}
            return $this->render('AdminBundle:info_desk:new.html.twig',array(
                'name'  => $name
            ));
        }
        elseif ($action == 'edit'){

            $edit = $this->getDoctrine()->getRepository('DataBundle:InfoDesk')->findOneBy(array('id'=>$id));
            $check_id = $edit->getNId();
            if($check_id == 0){$name = 'Farmers';}elseif ($check_id == 1){$name = 'Markets';}
            return $this->render('AdminBundle:info_desk:edit.html.twig',array(
                'name'  => $name,
                'edit'    => $edit
            ));
        }
    }
    public function upload_picAction(Request $request){
        $target = 0;
        if($request->get('id')){
            $em = $this->getDoctrine()->getManager();
            $del = $em->getRepository('DataBundle:Pics')->find($request->get('id'));
            if($del->getPath() != null){
                if(file_exists("./".$del->getPath())){
                    unlink("./".$del->getPath());
                }
            }
            $em->remove($del);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_upload_pic'));
        }
        if($request->getMethod() == 'POST'){
            if($_FILES['pic']['name'] != ""){
                $info = pathinfo($_FILES['pic']['name']);
                $ext = $info['extension'];
                $date = date('mdYhisms', time());
                $newname = $date . '.' . $ext;
                $target = 'bundles/Images/'.$newname;
                move_uploaded_file( $_FILES['pic']['tmp_name'], "./".$target);
                $pic = New Pics();
                $pic->setPath($target);
                $em = $this->getDoctrine()->getManager();
                $em->persist($pic);
                $em->flush();
                $target = 'localhost/agriculture/web/' . $target;

                return $this->redirect($this->generateUrl('admin_upload_pic'));

            }
        }
//        elseif ($request->get('action' == 'delete')){
////            $em = $this->getDoctrine()->getManager();
////            $del = $em->getRepository('DataBundle:Pics')->find($request->get('id'));
////            $em->remove($del);
////            $em->flush();
////            return $this->redirect($this->generateUrl('admin_upload_pic'));
//        }

        $pic = $this->getDoctrine()->getRepository('DataBundle:Pics')->findBy(array(),array(),30);
        $pic = array_reverse($pic);
        return $this->render('AdminBundle:info_desk:upload_pic.html.twig',array(
            'pic' => $target,
            'pics' => $pic
        ));
    }
}
