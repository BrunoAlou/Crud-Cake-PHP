<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\Controller;

class BreadcrumbComponent extends Component
{
    public function addBreadcrumb(array $breadcrumbs): void
    {
        $controller = $this->getController();
        
        if (!$controller->viewBuilder()->getVar('breadcrumbs')) {
            $controller->set('breadcrumbs', $breadcrumbs);
        }
    }
    

    public function generateBreadcrumb(): array
    {
        $controller = $this->getController();
        $request = $controller->getRequest();
        $params = $request->getParam('pass');
        $url = $request->getAttribute('here');
    
        $breadcrumbs = [];
        $breadcrumbs[] = ['title' => 'Home', 'url' => '/'];
    
        if ($controller instanceof Controller) {
            $controllerName = $request->getParam('controller');
            $actionName = $request->getParam('action');
    
            $controllerTitle = ucwords(strtolower(str_replace('-', ' ', $controllerName)));
    
            if ($actionName === 'add') {
                $actionTitle = 'Adicionar';
            } elseif ($actionName === 'edit') {
                $actionTitle = 'Editar';
            } elseif ($actionName === 'view') {
                $actionTitle = 'Visualizar';
            } else {
                $actionTitle = ucwords(strtolower(str_replace('-', ' ', $actionName)));
            }
    
            if ($actionName !== 'index') {
                $breadcrumbs[] = ['title' => $controllerTitle, 'url' => ['controller' => $controllerName, 'action' => $actionName]];
                $breadcrumbs[] = ['title' => $actionTitle, 'url' => $url];
            } else {
                $breadcrumbs[] = ['title' => $controllerTitle, 'url' => $url];
            }
        }
    
        foreach ($params as $param) {
            $breadcrumbs[] = ['title' => $param, 'url' => $url];
        }
    
        return $breadcrumbs;
    }
}