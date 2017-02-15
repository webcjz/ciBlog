<?php
class Admin extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->model('Content_model');

		}
	


	public function index()
	{

			$data['sitename']=$this->Content_model->getSiteInfo()->sitename;


            if ($this->session->iflogin===0) {
            	//登录成功

            	$this->load->view('admin/admin_header');
				$this->load->view('admin/admin_sidebar');
                 $this->load->view('admin',$data);
             }
                 else{

                    header('Location: http://localhost/ci/login');


            }
		
	}




	public function edit($id=null)
	{
		
		$data['id']=$id;		


		if ($id!=null) //如果edit后面接了参数,进入编辑页面
			{
			$data['content']=$this->Content_model->getRowContents($id)->content;
			$data['title']=$this->Content_model->getRowContents($id)->title;
			$data['writer']=$this->Content_model->getRowContents($id)->writer;


			if($this->input->post("content")!=null)
			  {
			  	$content=$this->input->post("content");
			  	$this->Content_model->updateRowContents($id,$content);
			  	//清空post 并刷新当前页面
			  	$content=$this->input->post("content")==null;

			  	$this->load->helper('js');
                refresh();
			  }

			$this->load->view('admin/admin_header');
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/editcontent',$data);
			}
			else //如果没有接参数，显示文章列表
			{
					$data['rows']=$this->Content_model->getRowsContents(1,5);



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
                $this->load->helper('js');
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
		echo "发表成功";

		echo "<script>window.location.href='edit';</script>";//跳转回编辑页面

		}




		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/addcontent.php');

	}



		public function pagesEdit()
	{

		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/pagesedit');

	}


		public function linksEdit()
	{
		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/linksedit');

	}


		public function commentsEdit()
	{

		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/commentsedit');

	}


		public function settingEdit()
	{

		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/settingedit');

	}



}