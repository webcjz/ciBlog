<?php 
class Blog extends CI_Controller {




      public function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model');

    }

	

	public function index()
	{
        $this->page(0);

    }

    public function page($page=null)
    {
            $limit=5;
            $total_rows=($this->Content_model->getRowsNum('content'))/$limit;

            if($page==null){
                $data['rows']=$this->Content_model->getRowsContents(1,$limit);
            }
            else{
                $data['rows']=$this->Content_model->getRowsContents($page+1,$limit);
            }


            $data['sitename']=$this->Content_model->getSiteInfo()->sitename;
            $data['description']=$this->Content_model->getSiteInfo()->description;
            $data['base_url'] = $base_url= $this->config->item('base_url');


        //开始分页
        $this->load->library('pagination');
        $config['base_url'] = $base_url . 'blog/page/';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 1;
        //$config['display_pages'] = FALSE;

        $this->pagination->initialize($config);
        $data['pages_html'] = $this->pagination->create_links();
        //分页结束


            $this->load->view('header',$data);
            $this->load->view('blog',$data);

    }


    public function about()
        {



    $data['rows']=$this->Content_model->getRowsContents(1,5);
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