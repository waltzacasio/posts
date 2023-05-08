<?php

class Posts_model extends CI_Model{

    public function __construct(){

        $this->load->database();
    }

    public function get_posts(){

        $query = $this->db->get('post');
        return $query->result_Array();

    }

    public function get_posts_single($param){

        $this->db->where('id', $param);
        $result = $this->db->get('post');

        return $result->row_array();
    }

}