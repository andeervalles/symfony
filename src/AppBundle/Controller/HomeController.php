<?php
namespace AppBundle\Controller;

use \Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller{
    
    /**
     * @Route("/home/") // app_home_index
     * @Template()
     */
    public function indexAction() {
        
 
    }
    
}
