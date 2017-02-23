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

                $_SESSION['iflogin']=true; //在这里给用户发一个成功session
                header('Location: http://localhost/ci/admin');
            }
            else{
                $_SESSION['iflogin']=false;
            }

        $this->load->view('login.php');


	}

    public function logout()
    {
        session_destroy();
        header("Location: http://localhost/ci/login");
    }


}