<?php
class LoginController extends Controller{
   function __construct(){
      $this->model('admin');
   }

//Method untuk menampilkan halaman login   
   public function index(){
      $this->view('admin/login');
   }

//Method untuk mengecek username dan password yang dikirim dari halaman login
   public function check(){ 
      $username = $this->validate($_POST['username']);
      $password = md5($this->validate($_POST['password']));
      
      $query = $this->admin->selectWhere(array('username'=>$username, 'password'=>$password));
      
      $data = $this->admin->getResult($query);
      $jml = $this->admin->getRows($query);
            
      if($jml>0){
         $data = $data[0];
         $_SESSION['username'] = $data['username'];
         $_SESSION['password'] = $data['password'];
         
         $this->redirect('admin');
      }else{
         $view = $this->view('admin/login');
         $view->bind('msg', 'Username atau Password salah!');
      }
      
   }
}