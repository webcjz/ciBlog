<?php
/**
 * JimmyChen webcjz@gmail.com
 */
class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        if (!$_SESSION['iflogin']) {
            header('Location: http://localhost/ci/login');
            
        }

    }


}