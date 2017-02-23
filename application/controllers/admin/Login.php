<?php

class Login extends CI_Controller
{

		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->model('Content_model');

		}



	public function index()
	{
	        isset($_POST['email'])?$email=$_POST['email']:$email=null;
            isset($_POST['password'])?$password=$_POST['password']:$password=null;


            if($this->Content_model->checkLogin($email,$password)){

                $_SESSION['iflogin']=1; //在这里给用户发一个成功session
                header('Location: http://localhost/ci/admin');
            }

        $this->load->view('login.php');


	}

    public function logout()
    {
        $this->session->sess_destroy();
        header("Location: http://localhost/ci/login");
    }


}