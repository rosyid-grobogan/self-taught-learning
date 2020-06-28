<?php
namespace application\controllers;
use \Controller;
class AdminMainController extends Controller{
   public function __construct(){
      if(empty($_SESSION['username']) AND empty($_SESSION['password'])){
         $this->redirect('admin/login');
      }   
   }
   public function template($viewName, $bc='', $data=array()){
      $view = $this->view('admin/template');
      $view->bind('viewName', $viewName);
      $view->bind('breadcrumb', $bc);
      $view->bind('data', $data);   
   }
} 