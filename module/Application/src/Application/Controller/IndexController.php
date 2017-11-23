<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {

    public function indexAction() {
        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        $lista = $em->getRepository("Application\Model\TaskItem")->findBy([], ['priority' => 'ASC']);
        return new ViewModel(array('lista' => $lista));
    }

    public function excluirAction() {
        $id = $this->params()->fromRoute("id", 0);
        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        $task = $em->find("Application\Model\TaskItem", $id);
        $em->remove($task);
        $em->flush();

        return $this->redirect()->toRoute('application/default', array('controller' => 'index', 'action' => 'index'));
    }

    public function editarAction() {
        $id = $this->params()->fromRoute("id", 0);
        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");

        $taskitem = $em->find("Application\Model\TaskItem", $id);
        $request = $this->getRequest();
        if ($request->isPost()) {
            try {
                $title = $request->getPost("title");
                $description = $request->getPost("description");
                $priority = $request->getPost("priority");
                $completed = $request->getPost("completed");
                $taskitem->setTitle($title);
                $taskitem->setCompleted($completed);
                $taskitem->setDescription($description);
                $taskitem->setPriority($priority);                
                $taskitem->modifiedDate();
                $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
                $em->merge($taskitem);
                $em->flush();
            } catch (Exception $e) {
                
            }

            return $this->redirect()->toRoute('application/default', array('controller' => 'index', 'action' => 'index'));
        }

        return new ViewModel(array('f' => $taskitem));
    }
    public function adicionarAction() {
          $request = $this->getRequest();
          $result = array();
          if($request->isPost())
          {
              try{
                  $title = $request->getPost("title");
                  $completed = $request->getPost("completed");  
                  $description = $request->getPost("description");
                  $priority = $request->getPost("priority");                  
                  $taskitem = new \Application\Model\TaskItem();
                  $taskitem->setTitle($title);
                  $taskitem->setCompleted($completed);
                  $taskitem->setDescription($description);
                  $taskitem->setPriority($priority);                     
                  $taskitem->modifiedDate();
   
                  $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
                  $em->persist($taskitem);
                  $em->flush();
   
                  $result["resp"] = $title. ", Adicionado corretamente!";
              }  catch (Exception $e){
                  
              }
              return $this->redirect()->toRoute('application/default', array('controller' => 'index', 'action' => 'index'));
          }
          
          return new ViewModel($result);
    }    

}
