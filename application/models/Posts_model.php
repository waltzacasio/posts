<?php

class Posts_model extends CI_Model{

    public function __construct(){

        $this->load->database();
    }

    public function get_posts($limit = 0, $offset = 0){  

        $query = $this->db->get('post', $limit, $offset);
        return $query->result_array();

    }

    public function get_posts_search($searchedWords, $limit = 0, $offset = 0){

        $keywords = explode(' ', $searchedWords);
        //query gpinoy table
        $this->db->select('lastName, firstName, address, boxNumber, transactionType, dateOfPurchase, installer, remarks');
        $this->db->select('"GPinoy" AS tableName', FALSE); // Include table name as alias
        $this->db->from('gpinoy');

        foreach ($keywords as $word) {
            $this->db->group_start();
            $this->db->like('lastName', $word);
            $this->db->or_like('firstName', $word);
            $this->db->or_like('address', $word);
            $this->db->or_like('boxNumber', $word);
            $this->db->or_like('transactionType', $word);
            $this->db->or_like('dateOfPurchase', $word);
            $this->db->or_like('installer', $word);
            $this->db->or_like('remarks', $word);
            // Add more columns if needed
            $this->db->group_end();
        }

        $query1 = $this->db->get_compiled_select();

        //query gsathd table
        $this->db->select('lastName, firstName, address, boxNumber, transactionType, dateOfPurchase, installer, remarks');
        $this->db->select('"GSat HD" AS tableName', FALSE); // Include table name as alias
        $this->db->from('gsathd');

        foreach ($keywords as $word) {
            $this->db->group_start();
            $this->db->like('lastName', $word);
            $this->db->or_like('firstName', $word);
            $this->db->or_like('address', $word);
            $this->db->or_like('boxNumber', $word);
            $this->db->or_like('transactionType', $word);
            $this->db->or_like('dateOfPurchase', $word);
            $this->db->or_like('installer', $word);
            $this->db->or_like('remarks', $word);
            // Add more columns if needed
            $this->db->group_end();
        }

        $query2 = $this->db->get_compiled_select();

        //query cignal table
        $this->db->select('lastName, firstName, address, boxNumber, transactionType, dateOfPurchase, installer, remarks');
        $this->db->select('"Cignal" AS tableName', FALSE); // Include table name as alias
        $this->db->from('cignal');

        foreach ($keywords as $word) {
            $this->db->group_start();
            $this->db->like('lastName', $word);
            $this->db->or_like('firstName', $word);
            $this->db->or_like('address', $word);
            $this->db->or_like('boxNumber', $word);
            $this->db->or_like('transactionType', $word);
            $this->db->or_like('dateOfPurchase', $word);
            $this->db->or_like('installer', $word);
            $this->db->or_like('remarks', $word);
            // Add more columns if needed
            $this->db->group_end();
        }

        $query3 = $this->db->get_compiled_select();

            //query cignal table
            $this->db->select('lastName, firstName, address, boxNumber, transactionType, dateOfPurchase, installer, remarks');
            $this->db->select('"Satlite" AS tableName', FALSE); // Include table name as alias
            $this->db->from('satlite');
    
            foreach ($keywords as $word) {
                $this->db->group_start();
                $this->db->like('lastName', $word);
                $this->db->or_like('firstName', $word);
                $this->db->or_like('address', $word);
                $this->db->or_like('boxNumber', $word);
                $this->db->or_like('transactionType', $word);
                $this->db->or_like('dateOfPurchase', $word);
                $this->db->or_like('installer', $word);
                $this->db->or_like('remarks', $word);
                // Add more columns if needed
                $this->db->group_end();
            }

        $query4 = $this->db->get_compiled_select();

        // Combine the queries using UNION
        $unionQuery = $query1 . ' UNION ' . $query2 . ' UNION ' . $query3 . ' UNION ' . $query4;

        $combinedQueryWithLimit = $unionQuery . ' LIMIT ';

        $combinedQueryWithLimit = $unionQuery . ' ORDER BY lastName, firstName';

        if ($limit > 0) {
            $combinedQueryWithLimit .= ' LIMIT ' . $limit;
            
            if ($offset > 0) {
                $combinedQueryWithLimit .= ' OFFSET ' . $offset;
            }
        }

        // Execute the combined query
        $query = $this->db->query($combinedQueryWithLimit);

        $str = $this->db->last_query();
        print_r($str);
        
        return $query->result_array();

       
    }


    public function get_posts_single($param1, $param2){

        //$query = $this->db->query('SELECT boxNumber FROM ' . $param1);
        $this->db->where('boxNumber', $param2);
        $result = $this->db->get($this->db->escape_identifiers($param1));

        return $result->row_array();
    }

    public function get_posts_edit($param1, $param2){

        $this->db->where('boxNumber', $param2);
        $result = $this->db->get($this->db->escape_identifiers($param1));

        return $result->row_array();
    }

    /*public function get_posts_edit($param){

        $this->db->where('id', $param);
        $result = $this->db->get('post');

        return $result->row_array();
    }*/

    public function insert_post(){

        $boxtype = $this->input->post('boxtype');

        if ($boxtype == "gpinoy") {
            $data = array(
                'firstName' => $this->input->post('firstname'),
                'lastName' => $this->input->post('lastname'),
                'address' => $this->input->post('address'),
                'boxNumber' => $this->input->post('boxnumber'),
                'chipid' => $this->input->post('chipcca'),
                'transactionType' => $this->input->post('transactiontype'),
                'dateOfPurchase' => $this->input->post('dateofpurchase'),
                'contact' => $this->input->post('contact'),
                'installer' => $this->input->post('installer'),
                'remarks' => $this->input->post('remarks')
            );

            return $this->db->insert('gpinoy', $data);

        } else if ($boxtype == "gsathd") {
            $data = array(
                'firstName' => $this->input->post('firstname'),
                'lastName' => $this->input->post('lastname'),
                'address' => $this->input->post('address'),
                'boxNumber' => $this->input->post('boxnumber'),
                'chipid' => $this->input->post('chipcca'),
                'transactionType' => $this->input->post('transactiontype'),
                'dateOfPurchase' => $this->input->post('dateofpurchase'),
                'contact' => $this->input->post('contact'),
                'installer' => $this->input->post('installer'),
                'remarks' => $this->input->post('remarks')
            );

            return $this->db->insert('gsathd', $data);

        } else if ($boxtype == "cignal") {
            $data = array(
                'firstName' => $this->input->post('firstname'),
                'lastName' => $this->input->post('lastname'),
                'address' => $this->input->post('address'),
                'boxNumber' => $this->input->post('boxnumber'),
                'cca' => $this->input->post('chipcca'),
                'stb' => $this->input->post('stb'),
                'transactionType' => $this->input->post('transactiontype'),
                'dateOfPurchase' => $this->input->post('dateofpurchase'),
                'contact' => $this->input->post('contact'),
                'installer' => $this->input->post('installer'),
                'remarks' => $this->input->post('remarks')
            );

            return $this->db->insert('cignal', $data);

        } else if ($boxtype == "satlite") {
            $data = array(
                'firstName' => $this->input->post('firstname'),
                'lastName' => $this->input->post('lastname'),
                'address' => $this->input->post('address'),
                'boxNumber' => $this->input->post('boxnumber'),
                'stb' => $this->input->post('chipcca'),
                'cca' => $this->input->post('stb'),
                'transactionType' => $this->input->post('transactiontype'),
                'dateOfPurchase' => $this->input->post('dateofpurchase'),
                'contact' => $this->input->post('contact'),
                'installer' => $this->input->post('installer'),
                'remarks' => $this->input->post('remarks')
            );

            return $this->db->insert('satlite', $data);
        } 






        /*$data = array(
            'title' => $this->input->post('title'),
            'slug' => url_title($this->input->post('title'), '-', true),
            'body' => $this->input->post('body')
        );

        return $this->db->insert('post', $data);*/

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