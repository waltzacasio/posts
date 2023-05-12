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

        $this->db->where('slug', $param);
        $result = $this->db->get('post');

        return $result->row_array();
    }

    public function get_posts_edit($param){

        $this->db->where('id', $param);
        $result = $this->db->get('post');

        return $result->row_array();
    }

    public function insert_post(){

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => url_title($this->input->post('title'), '-', true),
            'body' => $this->input->post('body')
        );

        return $this->db->insert('post', $data);

    }

    public function update_post(){

        $id = $this->input->post('id');
        $data = array(
            'title' => $this->input->post('title'),
            'body' => $this->input->post('body')

        );

        $this->db->where('id', $id);
        return $this->db->update ('post', $data);
    }

} 