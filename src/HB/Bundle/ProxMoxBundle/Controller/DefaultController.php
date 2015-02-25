<?php

namespace HB\Bundle\ProxMoxBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use HB\Bundle\ProxMoxBundle\Form\OpenvzDetailType;

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
     * @Route("/openvz/new")
     * @Template()
     */
    public function openvzaddAction(){
        return $this->openvzeditAction(-1);
    }
    /**
     * 
     * @Route("/openvz/{vmid}/edit")
     * @Template("HBProxMoxBundle:Default:openvzadd.html.twig")
     */
    public function openvzeditAction($vmid){
        $mox = $this->container->get("hb_prox_mox.service");
        $openvzDetail = new \HB\Bundle\ProxMoxBundle\Entity\OpenvzDetail();
        if ($vmid != -1 ) {
            $openvzAsArray = $mox->get("/nodes/proxmox1/openvz/$vmid/config");
            
        } else {
            $openvzAsArray = $mox->get("/nodes/proxmox1/openvz/104/config");
        }
        $postdata = Array();
        foreach ($openvzAsArray['data'] as $key => $value){
            if ($key=='ip_address'){
                $opName = 'setIpAddress';
            } else {
                $opName='set'.strtoupper(substr($key,0,1)).substr($key,1);
            }
            $openvzDetail->$opName($value);
        }
        //$proxmox = $this->container->get("hb_prox_mox.service");
        $form = $this->createForm(new OpenvzDetailType, $openvzDetail); 
		// On récupère la requête
		$request = $this->get('request');
		 
		// On vérifie qu'elle est de type POST pour voir si un formulaire a été soumis
		if ($request->getMethod() == 'POST') {
			// On fait le lien Requête <-> Formulaire
			// À partir de maintenant, la variable $article contient les valeurs entrées dans
			// le formulaire par le visiteur
			$form->bind($request);
			// On vérifie que les valeurs entrées sont correctes
			// (Nous verrons la validation des objets en détail dans le prochain chapitre)
			//if ($form->isValid()) {
				// On l'enregistre notre objet $article dans la base de données
				//$em = $this->getDoctrine()->getManager();
				//$em->persist($article);
				//$em->flush();
                                if ( $vmid == -1) {
                                    $nextId = $mox->get('cluster/nextid');
                                } else {
                                    $nextId = Array('data' => $vmid);
                                }
                                foreach($openvzAsArray['data'] as $key => $value){
                                    if ($key=='ip_address'){
                                        $opName = 'getIpAddress';
                                    } else {
                                        $opName='get'.strtoupper(substr($key,0,1)).substr($key,1);
                                    }
                                    if ($key != 'digest'){
                                        $postdata[$key] = $openvzDetail->$opName();
                                    }
                                }
                                //print_r($nextId);
                                //die();
                                $postdata["vmid"]=$nextId['data'];
                                //$postdata["node"]="proxmox1";
                                //$postdata['ostemplate'] = $openvzDetail->getOstemplate();
                                $postdata['storage'] = 'local';
                                print_r($postdata);
                                //die();
				$retour=$mox->create("/nodes/proxmox1/openvz",$postdata);
                                print_r($postdata);
                                print_r($retour);
                                //die();
                                if (isset($retour['errors'])) {
                                    error_log('Unable to create new proxmox CT.');
                                    foreach ($retour['errors'] as $title => $description) {
                                        error_log($title . ': ' . $description);
                                    }
                                } else {
                                    echo 'Successful CT creation!';
                                }        
                                die();
                                if ($postdata['vmid']>=0){
                                    // On redirige vers la page de visualisation de l'article nouvellement créé
                                    return $this->redirect(
                                        $this->generateUrl('hb_proxmox_default_openvzlist')
                                    );
                                    
                                } else {
                                    // On redirige vers la page de visualisation de l'article nouvellement créé
                                    return $this->redirect(
                                        $this->generateUrl('hb_proxmox_default_openvz', Array('id'=>$openvzDetail->getId()))
                                    );
                                }
			//}
		}
		
		if ($openvzDetail->getId()>0)
			$edition = true;
		else
			$edition = false;
		 
		// passe la vue de formulaire à la vue
		return array( 'formulaire' => $form->createView(), 'edition' => $edition );
        
        //$listenodes = $mox->put('nodes/proxmox1/openvz');
        
        //$details['baseconfig'] = $listenodes['data'][$id.""];
        //return $details;
        //return Array('data' => "");
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
}
