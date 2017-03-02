<?php
class Admin extends MY_Controller{

    public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->model('Content_model');
            $this->load->helper('js');
		}
	


	public function index()
	{
                $data['sitename']=$this->Content_model->getSiteInfo()->sitename;

            	$this->load->view('admin/admin_header');
				$this->load->view('admin/admin_sidebar');
                $this->load->view('admin',$data);
	}


	public function edit($id=null)
	{
		
		$data['id']=$id;		


		if ($id!=null) //如果edit后面接了参数,进入编辑页面
			{
			$data['row']=$this->Content_model->getRowContents($id);

			if($this->input->post("content")!=null)
			  {
			  	$title=$this->input->post("title");
			  	$writer=$this->input->post("writer");
			  	$content=$this->input->post("content");
			  	$this->Content_model->updateRowContents($id,$title,$writer,$content);

			  	$content=$this->input->post("content")==null;//清空post 并刷新当前页面
                refresh();
			  }

			$this->load->view('admin/admin_header');
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/editcontent',$data);
			}
			else //如果没有接参数，显示文章列表
			{
					$data['rows']=$this->Content_model->getRowsContents(1,20);



                    $this->load->view('admin/admin_header');
					$this->load->view('admin/admin_sidebar');
					$this->load->view('admin/edit',$data);
			}
	}


		public function del($id=null)
	{
		if ($id!=null) //如果edit后面接了参数,进入编辑页面
			{
				$this->Content_model->delRowContents($id);

                headto('../edit');


			}
			else{
				echo "您访问出错";
			}
	}



		public function add()
	{
		$title=$this->input->post("title");
		$content=$this->input->post("content");
		$writer=$this->input->post("writer");

		if($content!=null){//如果有东西，就插入数据库
		$this->Content_model->addRowContents($title,$content,$writer);
		headto('edit');
		}

		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/addcontent.php');
	}



		public function pagesEdit()
	{

        $data['rows']=$this->Content_model->getRowsPages(1,20);


		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/pagesedit',$data);

	}


		public function linksEdit()
	{

	    $data['rows']=$this->Content_model->getRowsLinks();

		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/linksedit',$data);

	}


		public function commentsEdit()
	{

		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/commentsedit');

	}


		public function settingEdit()
	{

	    if(!empty($_POST['sitename'])) {
            $sitename = $_POST['sitename'];
            $description = $_POST['description'];

            $this->Content_model->updateSiteInfo($sitename, $description);
        }

	    $row['row']=$this->Content_model->getSiteInfo();


		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/settingedit',$row);

	}



}