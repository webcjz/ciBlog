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
        $this->load->helper('js');


        if (empty($_SESSION['iflogin'])) {
            headto('login');
            
        }

    }


}