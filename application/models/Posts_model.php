<?php

class Posts_model extends CI_Model{

    public function __construct(){

        $this->load->database();
    }

    public function get_posts($limit = 0, $offset = 0){

        $query = $this->db->get('post', $limit, $offset);
        return $query->result_array();

    }
    //gikan ni sa pages/controller
    public function get_posts_search($param){

        $this->db->like('lastName', $param);
        $this->db->or_like('firstName', $param);
        $this->db->or_like('address', $param);
        $this->db->or_like('boxNumber', $param);
        $this->db->or_like('remarks', $param);
        $this->db->or_like('dateOfPurchase', $param);
        $this->db->or_like('installer', $param);

        $query = $this->db->get('gpinoy');
        return $query->result_array();

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
            'slug' => url_title($this->input->post('title'), '-', true),
            'body' => $this->input->post('body')

        );

        $this->db->where('id', $id);
        return $this->db->update ('post', $data);
    }


    public function delete_post() {

        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('post');

        return true;
        
    }


    public function login() {

        $this->db->where('email', $this->input->post('username', true));
        $this->db->where('password', $this->input->post('password', true));
        $result = $this->db->get('user');

        if($result->num_rows() == 1) {

            return $result->row_array();

        }else{

            return false;
        }
    }

} 