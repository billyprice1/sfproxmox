<?php

namespace HB\Bundle\ProxMoxBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * 
     * @Route("/liste")
     * @Template()
     */
    public function indexAction(){
        //$mox = new ProxMoxService();
        
        $mox = $this->container->get("hb_prox_mox.service");
        $listenodes = $mox->get('/nodes');
        return $listenodes;
    }
    /**
     * 
     * @Route("/openvzlist")
     * @Template()
     */
    public function openvzlistAction(){
        $mox = $this->container->get("hb_prox_mox.service");
        //$proxmox = $this->container->get("hb_prox_mox.service");
        $listenodes = $mox->get('nodes/proxmox1/openvz');
        return $listenodes;
    }
    /**
     * 
     * @Route("/openvz/{id}")
     * @Template()
     */
    public function openvzAction($id){
        $mox = $this->container->get("hb_prox_mox.service");
        //$proxmox = $this->container->get("hb_prox_mox.service");
        
        $listenodes = $mox->get('nodes/proxmox1/openvz');
        $details = $mox->get('nodes/proxmox1/openvz/'.$id.'/config');
        $details['vmid'] = $id;
        foreach ($listenodes['data'] as $vms){
            if ($vms['vmid'] == $id){
                //print_r($vms);
                $details['baseconfig'] = $vms;
            }
        }
        //$details['baseconfig'] = $listenodes['data'][$id.""];
        return $details;
    }
    /**
     * 
     * @Route("/openvz/new")
     * @Template()
     */
    public function openvzAddAction($id){
        $mox = $this->container->get("hb_prox_mox.service");
        //$proxmox = $this->container->get("hb_prox_mox.service");
        
        //$listenodes = $mox->put('nodes/proxmox1/openvz');
        
        //$details['baseconfig'] = $listenodes['data'][$id.""];
        //return $details;
    }
}
