<?php
class Content_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();


    }

    public function getRowContents($id)
    {
         
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('id', $id);
        $query = $this->db->get();
         
        return $query->row();

    
    }


/*    public function getRowsContents($num=5)

    {
         
        $this->db->select('content.*');
        $this->db->from('content');
        $this->db->order_by('id','DESC');


        $query = $this->db->limit($num)->get();
         
        return $query->result_array();

    }*/


    public function getRowsContents($pages,$limit)

    {
        $offset=($pages-1)*$limit;

        $this->db->select('*');
        $this->db->from('content');
        $this->db->order_by('id','DESC');



        $query = $this->db->limit($limit,$offset)->get();

        return $query->result_array();

    }


    public function getRowsNum()
    {
        $this->db->select('id');
        $this->db->from('content');

        return $this->db->count_all_results();



    }


    public function updateRowContents($id,$content)
    {
         
            $data = array(
                    'content' => htmlspecialchars($content),
            );

        $this->db->where('id', $id);
        $this->db->update('content',$data);


         
        return $this->db->affected_rows();

    }


        public function delRowContents($id)
    {
         
        $this->db->where('id', $id);
        $this->db->delete('content');

        return $this->db->affected_rows();

    }


        public function addRowContents($title,$content,$writer) 
        {


                $data = array(
                    'title' => $title,
                    'content' => $content,
                    'datetime' => date("Y-m-d H:i:s"),
                    'writer' => $writer

                );

                $this->db->insert('content', $data);


        }




    public function getSiteInfo()
    {

        $this->db->select('sitename,description');
        $this->db->from('site');
        $query=$this->db->get();
        return $query->row();//返回一行数据且是对象


    }


        public function checkLogin($account,$password)
    {

            $this->db->select('user.name,user.passwd');
            $this->db->from('user');
            $this->db->where('user.name',$account);
            $this->db->where('user.passwd',md5($password));
            $query = $this->db->get();
            return $query->num_rows() == 0 ? null : $query->row_array();
           
    }



}
