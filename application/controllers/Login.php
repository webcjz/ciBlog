<?php
class Login extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->model('Content_model');

		}
	


	public function index()
	{

         $account = $this->input->post('email');
         $password = $this->input->post('password');



            if($this->Content_model->checkLogin($account,$password)===null){

                $this->session->iflogin==1;//失败session
            }
            else{ 
                $this->session->iflogin=0;//在这里给用户发一个成功session 
                
            header('Location: http://localhost/ci/admin');

               
            } 
       



        $this->load->view('login.php'); 


	}

    public function logout()
    {
        session_destroy();
        header("Location: http://localhost/ci/admin");
    }


}