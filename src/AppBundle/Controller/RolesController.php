<?php
namespace AppBundle\Controller;

use \Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Rol;

class RolesController extends Controller{
    
    /**
     * @Route("/roles/") // app_roles_index
     * @Template()
     */
    public function indexAction() {
        
        $roles = $this->getDoctrine()->getRepository('AppBundle:Rol')->findAll();
        
        return ['roles' => $roles];
    }
    
    /**
     * @Route("/roles/registrar/") // app_roles_registrar
     * @Template()
     */
    public function registrarAction(Request $request) {
        
        if($request->isMethod('POST')){
            
            $nombre = $request->get('nombre');
            
            $rol = new  Rol();
            $rol->setNombre($nombre);
            
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($rol);
            $em->flush();
            
            $this->addFlash('notice', 'Registro guardado satisfactoriamente');
            return $this->redirectToRoute('app_roles_index');
            
        }
        
        return [];
    }
    
    /**
     * @Route("/roles/editar/{id}/")
     * @Template()
     */
    public function editarAction(Request $request, $id) {
        
        $rol = $this->getDoctrine()->getRepository('AppBundle:Rol')->find($id);
        
        if($request->isMethod('POST')){
            
            $nombre = $request->get('nombre');
            
            $rol->setNombre($nombre);
            
            $em = $this->getDoctrine()->getEntityManager();
            $em->flush();
            
            $this->addFlash('notice', 'Registro actualizado satisfactoriamente');
            return $this->redirectToRoute('app_roles_index');
        }
        
        return ['rol' => $rol];
    }
    
    /**
     * @Route("/roles/eliminar/{id}/")
     */
    public function eliminar($id) {
        
        $rol = $this->getDoctrine()->getRepository('AppBundle:Rol')->find($id);
        
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($rol);
        $em->flush();
        
        $this->addFlash('notice', 'Registro eliminado satisfactoriamente');
        return $this->redirectToRoute('app_roles_index');
    }
    
}
