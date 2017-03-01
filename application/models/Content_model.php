<?php
class Content_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();


    }
    //查某id文章
    public function getRowContents($id)
    {
         
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('id', $id);
        $query = $this->db->get();
         
        return $query->row();

    
    }

    //查一些文章（支持分页）
    public function getRowsContents($pages,$limit)

    {
        $offset=($pages-1)*$limit;

        $this->db->select('*');
        $this->db->from('content');
        $this->db->order_by('id','DESC');



        $query = $this->db->limit($limit,$offset)->get();

        return $query->result_array();

    }

    //查某些页面（支持分页）
    public function getRowsPages($pages,$limit)

    {
        $offset=($pages-1)*$limit;

        $this->db->select('*');
        $this->db->from('page');
        $this->db->order_by('id','DESC');



        $query = $this->db->limit($limit,$offset)->get();

        return $query->result_array();

    }

    //查文章或页面的数量
    public function getRowsNum($pagesORcontent)
    {
        $this->db->select('id');
        $this->db->from($pagesORcontent);

        return $this->db->count_all_results();
    }

<<<<<<< HEAD
    //改文章内容
=======

>>>>>>> 379cad56be7ac50b3d01b61879bc36ecaeedde26
    public function updateRowContents($id,$title,$writer,$content)
    {
         
            $data = array(


                    'title' => htmlspecialchars($title),
                    'writer' => htmlspecialchars($writer),
                    'content' => htmlspecialchars($content),
            );

        $this->db->where('id', $id);
        $this->db->update('content',$data);


         
        return $this->db->affected_rows();

    }

        //删内容
        public function delRowContents($id)
    {
         
        $this->db->where('id', $id);
        $this->db->delete('content');

        return $this->db->affected_rows();

    }

        //增内容
        public function addRowContents($title,$content,$writer) 
        {


                $data = array(
                    'title' => htmlspecialchars($title),
                    'content' => htmlspecialchars($content),
                    'datetime' => date("Y-m-d H:i:s"),
                    'writer' =>  htmlspecialchars($writer),

                );

                $this->db->insert('content', $data);


        }



    //查站点信息
    public function getSiteInfo()
    {

        $this->db->select('sitename,description');
        $this->db->from('site');
        $query=$this->db->get();
        return $query->row();//返回一行数据且是对象


    }

        //验证登录
        public function checkLogin($account,$password)
    {

            $this->db->select('user.name,user.passwd');
            $this->db->from('user');
            $this->db->where('user.name',htmlspecialchars($account));
            $this->db->where('user.passwd',md5($password));
            $query = $this->db->get();
            return $query->num_rows() == 0 ? false : true;
           
    }



}
