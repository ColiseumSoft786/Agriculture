<?php

namespace App\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\DataBundle\Entity\InfoDesk;


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
                    $target = 'bundles/'.$newname;
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
                    $target = 'bundles/'.$newname;
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
            if($id == 0){$name = 'Formats';}elseif ($id == 1){$name = 'cprmorator';}else{$name = 'Suporter';}
            return $this->render('AdminBundle:info_desk:view.html.twig',array(
                'fetch' => $fetch,
                'name'  => $name,
                'id'    => $id
            ));
        }
        elseif ($action == 'delete'){
            $em = $this->getDoctrine()->getManager();
            $delete = $em->getRepository('DataBundle:InfoDesk')->find($id);
            $em->remove($delete);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_info_desk', ['action' => 'view', 'id' => $id]));
        }
        elseif ($action == 'new'){
            if($id == 0){$name = 'Formats';}elseif ($id == 1){$name = 'cprmorator';}else{$name = 'Suporter';}
            return $this->render('AdminBundle:info_desk:new.html.twig',array(
                'name'  => $name
            ));
        }
        elseif ($action == 'edit'){
            if($id == 0){$name = 'Formats';}elseif ($id == 1){$name = 'cprmorator';}else{$name = 'Suporter';}
            $edit = $this->getDoctrine()->getRepository('DataBundle:InfoDesk')->findOneBy(array('id'=>$id));
            return $this->render('AdminBundle:info_desk:edit.html.twig',array(
                'name'  => $name,
                'edit'    => $edit
            ));
        }
    }
}
