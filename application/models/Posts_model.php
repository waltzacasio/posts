<?php

class Posts_model extends CI_Model{

    public function __construct(){

        $this->load->database();
    }

    private function does_view_exists($viewName) {
        $query = $this->db->query("SHOW TABLES LIKE '$viewName'");
        return $query->num_rows() > 0;
    }

    public function get_posts_search($searchedWords, $limit = 0, $offset = 0){

        // Start creating Gpinoy View
        $gpinoyView = 'gpinoyView';

        // Check if the view exists in the database
        $doesGpinoyViewExists = $this->does_view_exists($gpinoyView);

        if (!$doesGpinoyViewExists) {
            $createViewQuery = "CREATE VIEW $gpinoyView AS
                SELECT lastName, firstName, address, boxNumber, chipid, '12thColumn' AS columnFill, transactionType, dateOfPurchase, contact, installer, remarks, 'GPinoy' AS tableName
                FROM gpinoy";
            $this->db->query($createViewQuery);
        }

        // Start creating GSAT HD View
        $gsathdView = 'gsathdView';

        // Check if the view exists in the database
        $doesGsatHDViewExists = $this->does_view_exists($gsathdView);

        if (!$doesGsatHDViewExists) {
            $createViewQuery = "CREATE VIEW $gsathdView AS
                SELECT lastName, firstName, address, boxNumber, chipid, '12thColumn' AS columnFill, transactionType, dateOfPurchase, contact, installer, remarks, 'GSat HD' AS tableName
                FROM gsathd";
            $this->db->query($createViewQuery);
        }

        // Start creating Cignal View
        $cignalView = 'cignalView';

        // Check if the view exists in the database
        $doesCignalViewExists = $this->does_view_exists($cignalView);

        if (!$doesCignalViewExists) {
            $createViewQuery = "CREATE VIEW $cignalView AS
                SELECT lastName, firstName, address, boxNumber, cca, stb, transactionType, dateOfPurchase, contact, installer, remarks, 'Cignal' AS tableName
                FROM cignal";
            $this->db->query($createViewQuery);
        }

        // Start creating Satlite View
        $satliteView = 'satliteView';

        // Check if the view exists in the database
        $doesSatliteViewExists = $this->does_view_exists($satliteView);

        if (!$doesSatliteViewExists) {
            $createViewQuery = "CREATE VIEW $satliteView AS
                SELECT lastName, firstName, address, boxNumber, cca, stb, transactionType, dateOfPurchase, contact, installer, remarks, 'Satlite' AS tableName
                FROM satlite";
            $this->db->query($createViewQuery);
        }

        

        $keywords = explode(' ', $searchedWords);
        
        //query gpinoy table
        //$this->db->select('lastName, firstName, address, boxNumber, chipid, "12thColumn" AS columnFill, transactionType, dateOfPurchase, contact, installer, remarks');
        $this->db->select('lastName, firstName, address, boxNumber, chipid, columnFill, transactionType, dateOfPurchase, contact, installer, remarks, tableName');
        //$this->db->select('"12thColumn" AS columnFill', FALSE); // Include table name as alias
        //$this->db->select('"GPinoy" AS tableName', FALSE); // Include table name as alias

        //$this->db->from('gpinoy');
        $this->db->from('gpinoyView');

        foreach ($keywords as $word) {
            $this->db->group_start();
            $this->db->like('lastName', $word);
            $this->db->or_like('firstName', $word);
            $this->db->or_like('address', $word);
            $this->db->or_like('boxNumber', $word);
            $this->db->or_like('chipid', $word);
            $this->db->or_like('transactionType', $word);
            $this->db->or_like('dateOfPurchase', $word);
            $this->db->or_like('contact', $word);
            $this->db->or_like('installer', $word);
            $this->db->or_like('remarks', $word);
            $this->db->or_like('tableName', $word, 'both');
            // Add more columns if needed
            $this->db->group_end();
        }

        $query1 = $this->db->get_compiled_select();

        //query gsathd table
        //$this->db->select('lastName, firstName, address, boxNumber, chipid, "12thColumn" AS columnFill, transactionType, dateOfPurchase, contact, installer, remarks');
        $this->db->select('lastName, firstName, address, boxNumber, chipid, columnFill, transactionType, dateOfPurchase, contact, installer, remarks, tableName');
        //$this->db->select('"12thColumn" AS columnFill', FALSE); // Include table name as alias
        //$this->db->select('"GSat HD" AS tableName', FALSE); // Include table name as alias

        $this->db->from('gsathdView');

        foreach ($keywords as $word) {
            $this->db->group_start();
            $this->db->like('lastName', $word);
            $this->db->or_like('firstName', $word);
            $this->db->or_like('address', $word);
            $this->db->or_like('boxNumber', $word);
            $this->db->or_like('chipid', $word);
            $this->db->or_like('transactionType', $word);
            $this->db->or_like('dateOfPurchase', $word);
            $this->db->or_like('contact', $word);
            $this->db->or_like('installer', $word);
            $this->db->or_like('remarks', $word);
            $this->db->or_like('tableName', $word, 'both');
            // Add more columns if needed
            $this->db->group_end();
        }

        $query2 = $this->db->get_compiled_select();

        //query cignal table
        //$this->db->select('lastName, firstName, address, boxNumber, cca, stb, transactionType, dateOfPurchase, contact, installer, remarks');
        $this->db->select('lastName, firstName, address, boxNumber, cca, stb, transactionType, dateOfPurchase, contact, installer, remarks, tableName');
        //$this->db->select('"Cignal" AS tableName', FALSE); // Include table name as alias
        $this->db->from('cignalView');

        foreach ($keywords as $word) {
            $this->db->group_start();
            $this->db->like('lastName', $word);
            $this->db->or_like('firstName', $word);
            $this->db->or_like('address', $word);
            $this->db->or_like('boxNumber', $word);
            $this->db->or_like('cca', $word);
            $this->db->or_like('stb', $word);
            $this->db->or_like('transactionType', $word);
            $this->db->or_like('dateOfPurchase', $word);
            $this->db->or_like('contact', $word);
            $this->db->or_like('installer', $word);
            $this->db->or_like('remarks', $word);
            $this->db->or_like('tableName', $word, 'both');
            // Add more columns if needed
            $this->db->group_end();
        }

        $query3 = $this->db->get_compiled_select();

            //query cignal table
            $this->db->select('lastName, firstName, address, boxNumber, cca, stb, transactionType, dateOfPurchase, contact, installer, remarks, tableName');
            //$this->db->select('"Satlite" AS tableName', FALSE); // Include table name as alias
            $this->db->from('satliteView');
    
            foreach ($keywords as $word) {
                $this->db->group_start();
                $this->db->like('lastName', $word);
                $this->db->or_like('firstName', $word);
                $this->db->or_like('address', $word);
                $this->db->or_like('boxNumber', $word);
                $this->db->or_like('cca', $word);
                $this->db->or_like('stb', $word);
                $this->db->or_like('transactionType', $word);
                $this->db->or_like('dateOfPurchase', $word);
                $this->db->or_like('contact', $word);
                $this->db->or_like('installer', $word);
                $this->db->or_like('remarks', $word);
                $this->db->or_like('tableName', $word, 'both');
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

        //$str = $this->db->last_query();
        //print_r($str);
        
        return $query->result_array();

       
    }


    public function get_posts_single($param1, $param2){

        //$query = $this->db->query('SELECT boxNumber FROM ' . $param1);
        $this->db->where('boxNumber', $param2);
        $result = $this->db->get($this->db->escape_identifiers($param1));

        return $result->row_array();
    }

    public function get_posts_edit($boxtype, $boxnumber){

        $this->db->where('boxNumber', $boxnumber);
        $result = $this->db->get($this->db->escape_identifiers($boxtype));

        return $result->row_array();
    }

    public function get_edit_history($boxNumber, $limit = 0, $offset = 0){
        
        $this->db->where('boxNumber', $boxNumber);
        $this->db->limit($limit, $offset);
        $query = $this->db->get('gpinoy_edit_logs');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array(); // Return an empty array if no results
        }

        /*$this->db->where('boxNumber', $boxnumber);
        $result = $this->db->get('gpinoy_edit_logs');

        return $result->result_array();*/

    }

    function convertToMySQLDate($day, $month, $year) {
        return $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);
    }
    

    public function insert_post(){

        $boxtype = $this->input->post('boxtype');

        if ($boxtype == "gpinoy") {
            // Assuming you have retrieved the day, month, and year values from the form
            $day = $this->input->post('day');
            $month = $this->input->post('month');
            $year = $this->input->post('year');

            // Convert the date to MySQL date format
            $dateOfPurchase = $this->convertToMySQLDate($day, $month, $year);


            $data = array(
                'firstName' => strtoupper($this->input->post('firstname')),
                'lastName' => strtoupper($this->input->post('lastname')),
                'address' => $this->input->post('address'),
                'boxNumber' => $this->input->post('boxnumber'),
                'chipid' => $this->input->post('chipid'),
                'transactionType' => $this->input->post('transactiontype'),
                'dateOfPurchase' => $dateOfPurchase, // Insert the prepared date here
                'contact' => $this->input->post('contact'),
                'installer' => $this->input->post('installer'),
                'remarks' => $this->input->post('remarks')
            );

            return $this->db->insert('gpinoy', $data);

        } else if ($boxtype == "gsathd") {

            $day = $this->input->post('day');
            $month = $this->input->post('month');
            $year = $this->input->post('year');

            $dateOfPurchase = $this->convertToMySQLDate($day, $month, $year);

            $data = array(
                'firstName' => strtoupper($this->input->post('firstname')),
                'lastName' => strtoupper($this->input->post('lastname')),
                'address' => $this->input->post('address'),
                'boxNumber' => $this->input->post('boxnumber'),
                'chipid' => $this->input->post('chipid'),
                'transactionType' => $this->input->post('transactiontype'),
                'dateOfPurchase' => $dateOfPurchase,
                'contact' => $this->input->post('contact'),
                'installer' => $this->input->post('installer'),
                'remarks' => $this->input->post('remarks')
            );

            return $this->db->insert('gsathd', $data);

        } else if ($boxtype == "cignal") {

            $day = $this->input->post('day');
            $month = $this->input->post('month');
            $year = $this->input->post('year');

            $dateOfPurchase = $this->convertToMySQLDate($day, $month, $year);

            $data = array(
                'firstName' => strtoupper($this->input->post('firstname')),
                'lastName' => strtoupper($this->input->post('lastname')),
                'address' => $this->input->post('address'),
                'boxNumber' => $this->input->post('boxnumber'),
                'cca' => $this->input->post('cca'),
                'stb' => $this->input->post('stb'),
                'transactionType' => $this->input->post('transactiontype'),
                'dateOfPurchase' => $dateOfPurchase,
                'contact' => $this->input->post('contact'),
                'installer' => $this->input->post('installer'),
                'remarks' => $this->input->post('remarks')
            );

            return $this->db->insert('cignal', $data);

        } else if ($boxtype == "satlite") {

            $day = $this->input->post('day');
            $month = $this->input->post('month');
            $year = $this->input->post('year');

            $dateOfPurchase = $this->convertToMySQLDate($day, $month, $year);

            $data = array(
                'firstName' => strtoupper($this->input->post('firstname')),
                'lastName' => strtoupper($this->input->post('lastname')),
                'address' => $this->input->post('address'),
                'boxNumber' => $this->input->post('boxnumber'),
                'cca' => $this->input->post('cca'),
                'stb' => $this->input->post('stb'),
                'transactionType' => $this->input->post('transactiontype'),
                'dateOfPurchase' => $dateOfPurchase,
                'contact' => $this->input->post('contact'),
                'installer' => $this->input->post('installer'),
                'remarks' => $this->input->post('remarks')
            );

            return $this->db->insert('satlite', $data);
        } 

    }

    public function createEditLogEntry($boxType, $boxNumber, $field, $oldValue, $newValue) {

        $timeStamp = date('Y-m-d H:i:s');
        $user = $this->session->firstname;

            $data = array(

                'boxNumber' => $boxNumber,
                'timeStamp' => $timeStamp,
                'user' => $user,
                'fieldName' => $field,
                'oldValue' => $oldValue,
                'newValue' => $newValue,
                /*changeDescription' => $changeDescription,*/
            );

        switch ($boxType) {
            case "gpinoy":
                return $this->db->insert('gpinoy_edit_logs', $data);
                break;
        }
    
}

    public function update_post_with_edit_log($boxType, $boxNumber){

        // Retrieve current record from the database
        $currentRecord = $this->get_posts_edit($boxType, $boxNumber);

        $id = $this->input->post('id');

        $formData = array(
            'firstName' => $this->input->post('firstname'),
            'lastName' => $this->input->post('lastname'),
            'address' => $this->input->post('address'),
            'dateOfPurchase' => $this->input->post('dateofpurchase'),
            'contact' => $this->input->post('contact'),
            'installer' => $this->input->post('installer'),
            'remarks' => $this->input->post('remarks'),
            'transactionType' => $this->input->post('transactiontype')
        );

        // Compare each field in the form with the corresponding field in the database record
        foreach ($formData as $field => $newValue) {
            $oldValue = $currentRecord[$field];

        if ($oldValue !== $newValue) {
            $this->createEditLogEntry($boxType, $boxNumber, $field, $oldValue, $newValue);
            }
        }

        // Update the database with the new form data
        $this->db->where('id', $id);
        $this->db->update('gpinoy', $formData);

    }



    public function update_post(){

        $boxtype = $this->input->post('boxtype');

        //echo "Box Type: " . $boxtype;

        if ($boxtype == "gpinoy") {

            $id = $this->input->post('id');

            //from the submitted form   
            $data = array(
                'firstName' => $this->input->post('firstname'),
                'lastName' => $this->input->post('lastname'),
                'address' => $this->input->post('address'),
                'dateOfPurchase' => $this->input->post('dateofpurchase'),
                'contact' => $this->input->post('contact'),
                'installer' => $this->input->post('installer'),
                'remarks' => $this->input->post('remarks'),
                'transactiontype' => $this->input->post('transactiontype')
            );

            //$this->db->where('boxtype', $boxtype);
            $this->db->where('id', $id);
            $this->db->update('gpinoy', $data);

        } else if ($boxtype == "gsathd") {
            
            $id = $this->input->post('id');

            $data = array(
                'firstName' => $this->input->post('firstname'),
                'lastName' => $this->input->post('lastname'),
                'address' => $this->input->post('address'),
                'dateOfPurchase' => $this->input->post('dateofpurchase'),
                'contact' => $this->input->post('contact'),
                'installer' => $this->input->post('installer'),
                'remarks' => $this->input->post('remarks'),
                'transactiontype' => $this->input->post('transactiontype')
            );
            $this->db->where('id', $id);
            $this->db->update('gsathd', $data);

        } else if ($boxtype == "cignal") {
            
            $id = $this->input->post('id');

            $data = array(
                'firstName' => $this->input->post('firstname'),
                'lastName' => $this->input->post('lastname'),
                'address' => $this->input->post('address'),
                'dateOfPurchase' => $this->input->post('dateofpurchase'),
                'contact' => $this->input->post('contact'),
                'installer' => $this->input->post('installer'),
                'remarks' => $this->input->post('remarks'),
                'transactiontype' => $this->input->post('transactiontype')
            );
            $this->db->where('id', $id);
            $this->db->update('cignal', $data);

        } else if ($boxtype == "satlite") {
            
            $id = $this->input->post('id');

            $data = array(
                'firstName' => $this->input->post('firstname'),
                'lastName' => $this->input->post('lastname'),
                'address' => $this->input->post('address'),
                'dateOfPurchase' => $this->input->post('dateofpurchase'),
                'contact' => $this->input->post('contact'),
                'installer' => $this->input->post('installer'),
                'remarks' => $this->input->post('remarks'),
                'transactiontype' => $this->input->post('transactiontype')
            );
            $this->db->where('id', $id);
            $this->db->update('satlite', $data);
        } 
        

       }    

        /*$id = $this->input->post('id');
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => url_title($this->input->post('title'), '-', true),
            'body' => $this->input->post('body')

        );

        $this->db->where('id', $id);
        return $this->db->update ('post', $data);*/
 


    public function delete_post() {

        //echo $this->input->post('id');
        $boxtype = $this->input->post('boxtype');

        if ($boxtype == 'gpinoy') {
            $id = $this->input->post('id');

            $this->db->where('id', $id);
            $this->db->delete('gpinoy');

        } else if ($boxtype == 'gsathd') {
            $id = $this->input->post('id');

            $this->db->where('id', $id);
            $this->db->delete('gsathd');

        } else if ($boxtype == 'cignal') {
            $id = $this->input->post('id');

            $this->db->where('id', $id);
            $this->db->delete('cignal');

        } else if ($boxtype == 'satlite') {
            $id = $this->input->post('id');

            $this->db->where('id', $id);
            $this->db->delete('satlite');

        }
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