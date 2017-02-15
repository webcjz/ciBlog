<?php 
class Blog extends CI_Controller {




      public function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model');
        $this->load->library('pagination');


    }

	

	public function index()
	{


    $data['rows']=$this->Content_model->getRowsContents(5);
    $data['sitename']=$this->Content_model->getSiteInfo()->sitename;
    $data['description']=$this->Content_model->getSiteInfo()->description;
    $data['base_url'] = $base_url= $this->config->item('base_url');


   



        $this->load->library('pagination');

        $config['base_url'] = $base_url . '/page/';
        $config['total_rows'] = 200;
        $config['per_page'] = 1;
        $config['display_pages'] = FALSE;


        $config['next_link'] = '下一页';

        $config['prev_link'] = '上一页';



        $config['last_link'] = '尾页';






        $this->pagination->initialize($config);

       $data['pages_html']=$this->pagination->create_links();

       $this->load->view('header',$data);
       $this->load->view('blog',$data);

    }

        public function about()
        {



    $data['rows']=$this->Content_model->getRowsContents(5);
    $data['sitename']=$this->Content_model->getSiteInfo()->sitename;
    $data['description']=$this->Content_model->getSiteInfo()->description;
    $data['base_url'] = $this->config->item('base_url');

            $this->load->view('header',$data);
            $this->load->view('page');



        }




        public function content($id)
    {


       echo $this->Content_model->getRowContents($id)->content;


    }







}