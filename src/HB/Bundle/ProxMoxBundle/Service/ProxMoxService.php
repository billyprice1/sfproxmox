<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace HB\Bundle\ProxMoxBundle\Service;
use ProxmoxVE\Proxmox;

/**
 * Description of ProxMoxService
 *
 * @author jeanluc
 * 
 */
class ProxMoxService extends Proxmox{
    public function __construct(){
        // create your credential array
        // to be but in conffile
        $credential = [
            'hostname' => '192.168.11.19',
            'port' => '8006',
            'username' => 'root',
            'password' => 'hb2015',
        ];
        return parent::__construct($credential);
    }
//    public function indexAction(){
//        $proxmox = $this->container->get("hb_prox_mox.service");
//        $nodelist = $proxmox->get("/nodes");
//        return $nodelist;
//    }
    //put your code here
}
