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

<<<<<<< HEAD

=======
>>>>>>> 379cad56be7ac50b3d01b61879bc36ecaeedde26
        if (!$_SESSION['iflogin']) {
            header('Location: http://localhost/ci/login');
            
        }

    }


}