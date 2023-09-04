<?php

class Pages extends CI_Controller{

    public function view($param = null){

        if (!$this->session->userdata('logged_in')) {
            // If not logged in, redirect to the login page
            redirect('pages/login');
        }

        if($param == null) {
            
            $page ="home";

            if(!file_exists(APPPATH. 'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Search Records";


            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

    } else {
        
    }
}
     
    public function details($param1, $param2) {

        if (!$this->session->userdata('logged_in')) {
            // If not logged in, redirect to the login page
            redirect('pages/login');
        }
            
            $page ="single";

            if(!file_exists(APPPATH. 'views/pages/'.$page.'.php')){
                show_404();
            }
    
            $data['posts'] = $this->Posts_model->get_posts_single($param1, $param2);
            $data['title'] = "Customer Details" ?? null;
            $data['firstName'] = $data['posts']['firstName'] ?? null;
            $data['lastName'] = $data['posts']['lastName'] ?? null;
            $data['address'] = $data['posts']['address'] ?? null;
            $data['boxNumber'] = $data['posts']['boxNumber'] ?? null;
            $data['chipid'] = $data['posts']['chipid'] ?? null;
            $data['cca'] = $data['posts']['cca'] ?? null;
            $data['stb'] = $data['posts']['stb'] ?? null;
            $data['transactionType'] = $data['posts']['transactionType'] ?? null;
            $data['dateOfPurchase'] = $data['posts']['dateOfPurchase'] ?? null;
            $data['type'] = $data['posts']['type'] ?? null;
            $data['contact'] = $data['posts']['contact'] ?? null;
            $data['installer'] = $data['posts']['installer'] ?? null;
            $data['remarks'] = $data['posts']['remarks'] ?? null;
            
            $data['id'] = $data['posts']['id'] ?? null;
            //print_r($data);
    
    
        if($data['posts']){
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }else{
            show_404();

        }

}


public function search($param1 = null) {

    if (!$this->session->userdata('logged_in')) {
        // If not logged in, redirect to the login page
        redirect('pages/login');
    }

    $page = "search";
    
    $searchedWords = $param1 ? urldecode($param1) : $this->input->post('search') ?? '';

    if (empty($searchedWords)) {
        redirect(base_url());
    }

    if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
        show_404();
    }

    $this->load->library('pagination');

    $config['base_url'] =  base_url() . 'search/' . urlencode($searchedWords);
    $config['total_rows'] = count($this->Posts_model->get_posts_search($searchedWords));
    $config['per_page'] = 10;
    $config['num_links'] = 2;
    //enclosing markup
    $config['full_tag_open'] = '<nav aria-label="Search results pages"><ul class="pagination">';
    $config['full_tag_close'] = '</ul></nav>';
    //digit links
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    //adding attribute to anchors
    $config['attributes'] = array('class' => 'page-link');
    //current page link
    $config['cur_tag_open'] = '<li class="page-item active" aria-current="page"><a class="page-link" href="#">';
    $config['cur_tag_close'] = '</a></li>';



    $this->pagination->initialize($config);

    $data['title'] = "Search Records";
    $data['keywords'] = $searchedWords;
    $data['posts'] = $this->Posts_model->get_posts_search($searchedWords, $config['per_page'], $this->uri->segment(3));
    $data['total'] = $config['total_rows'];


    $this->load->view('templates/header');
    $this->load->view('pages/' . $page, $data);
    $this->load->view('templates/footer');
    
}


//this goes to the login page!

public function login() {
    
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
    $this->form_validation->set_rules('username','username','required');
    $this->form_validation->set_rules('password','password','required');

    if($this->form_validation->run() == FALSE){
            
        $page ="login";

        if(!file_exists(APPPATH. 'views/pages/'.$page.'.php')){
            show_404();
        }


        //$this->load->view('templates/header');
        $this->load->view('pages/'.$page);
        $this->load->view('templates/footer');

    }else{

        $user_id = $this->Posts_model->login();

        if($user_id){

            $user_data = array(

                'firstname' => $user_id['firstname'],
                'lastname' => $user_id['lastname'],
                'fullname' => $user_id['firstname'].' '.$user_id['lastname'],
                'access' => $user_id['is_admin'],
                'logged_in' => true
                
            );

            $this->session->set_userdata($user_data);
            $this->session->set_flashdata('user_loggedin','You are now logged in as '.$this->session->fullname);
            redirect(base_url());

        } else{
            $this->session->set_flashdata('failed_login','Login is invalid');
            redirect('login');
        }

    }
}

public function logout(){

    $this->session->unset_userdata('firstname');
    $this->session->unset_userdata('lastname');
    $this->session->unset_userdata('fullname');
    $this->session->unset_userdata('access');
    $this->session->unset_userdata('logged_in');

    $this->session->set_flashdata('user_loggedout', 'You are now loggged out');
    redirect('login');
}






public function add() {

    if (!$this->session->userdata('logged_in')) {
        // If not logged in, redirect to the login page
        redirect('pages/login');
    }


    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
    $this->form_validation->set_rules('boxtype','Box Type','required');
    $this->form_validation->set_rules('firstname','First Name','required');
    $this->form_validation->set_rules('lastname','Last Name','required');
    $this->form_validation->set_rules('address','Address','required');
    $this->form_validation->set_rules('boxnumber','Box Number','required');
    $this->form_validation->set_rules('transactiontype','Transaction Type','required');
    
    if ($this->input->post('transactiontype') == 'INSTALL') {
    $this->form_validation->set_rules('installer','Installer','required');
    }

    if ($this->input->post('boxtype') == 'gpinoy') {
        $this->form_validation->set_rules('boxnumber', 'GPinoy Box Number', 'required|is_unique[gpinoy.boxNumber]', array('required' => 'The {field} field is required.','is_unique' => 'The {field} already exists.'));
        $this->form_validation->set_rules('chipid', 'GPinoy Chip ID', 'is_unique[gpinoy.chipid]', array('is_unique' => 'The {field} already exists.'));

    } else if ($this->input->post('boxtype') == 'gsathd') {
        $this->form_validation->set_rules('boxnumber', 'GSat HD Box Number', 'required|is_unique[gsathd.boxNumber]', array('required' => 'The {field} field is required.','is_unique' => 'The {field} already exists.'));
        $this->form_validation->set_rules('chipid', 'GSat HD Chip ID', 'is_unique[gsathd.chipid]', array('is_unique' => 'The {field} already exists.'));

    } else if ($this->input->post('boxtype') == 'cignal') {
        $this->form_validation->set_rules('boxnumber', 'Cignal Box Number', 'required|is_unique[cignal.boxNumber]', array('required' => 'The {field} field is required.','is_unique' => 'The {field} already exists.'));
        $this->form_validation->set_rules('cca', 'Cignal CCA No.', 'is_unique[cignal.cca]', array('is_unique' => 'The {field} already exists.'));
        $this->form_validation->set_rules('stb', 'Cignal STB ID', 'is_unique[cignal.stb]', array('is_unique' => 'The {field} already exists.'));

    } else if ($this->input->post('boxtype') == 'satlite') {
        $this->form_validation->set_rules('boxnumber', 'Satlite Box Number', 'required|is_unique[satlite.boxNumber]', array('required' => 'The {field} field is required.','is_unique' => 'The {field} already exists.'));
        $this->form_validation->set_rules('cca', 'Satlite CCA No.', 'is_unique[satlite.cca]', array('is_unique' => 'The {field} already exists.'));
        $this->form_validation->set_rules('stb', 'Satlite STB ID', 'is_unique[satlite.stb]', array('is_unique' => 'The {field} already exists.'));
    } 

    if($this->form_validation->run() == FALSE){
            
        $page ="add";

        if(!file_exists(APPPATH. 'views/pages/'.$page.'.php')){
            show_404();
        }

        // Get the selected value of 'boxtype' from the submitted form data
        $selectedBoxType = $this->input->post('boxtype');
        $selectedTransactionType = $this->input->post('transactiontype');
        $selectedDay = $this->input->post('day');
        $selectedMonth = $this->input->post('month');
        $selectedYear = $this->input->post('year');
        
        if ($selectedBoxType) {
            $this->session->set_userdata('selected_boxtype', $selectedBoxType);
        }
        if ($selectedTransactionType) {
            $this->session->set_userdata('selected_transactiontype', $selectedTransactionType);
        }
        if ($selectedDay) {
            $this->session->set_userdata('selected_day', $selectedDay);
        }
        if ($selectedMonth) {
            $this->session->set_userdata('selected_month', $selectedMonth);
        }
        if ($selectedYear) {
            $this->session->set_userdata('selected_year', $selectedYear);
        }

        $selectedBoxType = $this->session->userdata('selected_boxtype');
        $selectedTransactionType = $this->session->userdata('selected_transactiontype');
        $selectedDay = $this->session->userdata('selected_day');
        $selectedMonth = $this->session->userdata('selected_month');
        $selectedYear = $this->session->userdata('selected_year');


        // Pass the selected value back to the view
        $data['selectedBoxType'] = $selectedBoxType;
        $data['selectedTransactionType'] = $selectedTransactionType;
        $data['selectedDay'] = $selectedDay;
        $data['selectedMonth'] = $selectedMonth;
        $data['selectedYear'] = $selectedYear;


        $data['title'] = "Add New Record";

        if (!$this->input->post()) {
            $this->session->unset_userdata('selected_boxtype');
            $this->session->unset_userdata('selected_transactiontype');
            $this->session->unset_userdata('selected_day');
            $this->session->unset_userdata('selected_month');
            $this->session->unset_userdata('selected_year');
        }

        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');

    }else{

        $this->Posts_model->insert_post();
        $this->session->set_flashdata('post_added','New ' . $this->input->post('boxtype') . ' record was added!');
        $this->session->unset_userdata('selected_boxtype');
        $this->session->unset_userdata('selected_transactiontype');
        $this->session->unset_userdata('selected_day');
        $this->session->unset_userdata('selected_month');
        $this->session->unset_userdata('selected_year');

        //redirect(base_url());
        redirect(base_url() . 'details/' . $this->input->post('boxtype') ."/" . $this->input->post('boxnumber'));

    }
    

}

public function edit($param1, $param2){

    if (!$this->session->userdata('logged_in')) {
        // If not logged in, redirect to the login page
        redirect('pages/login');
    }


    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
    $this->form_validation->set_rules('firstname','First Name','required');
    $this->form_validation->set_rules('lastname','Last Name','required');
    $this->form_validation->set_rules('address','Address','required');

    
    if($this->form_validation->run() == FALSE){
            
        $page ="edit";

        if(!file_exists(APPPATH. 'views/pages/'.$page.'.php')){
            show_404();
        }
//Populate form
            $data['posts'] = $this->Posts_model->get_posts_edit($param1, $param2);
            $data['title'] = "Edit Customer Details";
            $data['firstName'] = $data['posts']['firstName'] ?? null;
            $data['lastName'] = $data['posts']['lastName'] ?? null;
            $data['address'] = $data['posts']['address'] ?? null;
            $data['boxType'] = $param1 ?? null;
            $data['boxNumber'] = $data['posts']['boxNumber'] ?? null;
            $data['chipid'] = $data['posts']['chipid'] ?? null;
            $data['cca'] = $data['posts']['cca'] ?? null;
            $data['stb'] = $data['posts']['stb'] ?? null;
            $data['transactionType'] = $data['posts']['transactionType'] ?? null;
            $data['dateOfPurchase'] = $data['posts']['dateOfPurchase'] ?? null;
            $data['type'] = $data['posts']['type'] ?? null;
            $data['contact'] = $data['posts']['contact'] ?? null;
            $data['installer'] = $data['posts']['installer'] ?? null;
            $data['remarks'] = $data['posts']['remarks'] ?? null;

            $data['id'] = $data['posts']['id'] ?? null;

        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');

    }else{

        $this->Posts_model->update_post();
        $this->session->set_flashdata('post_updated','This customer was updated!');
        redirect(base_url() . 'details/' . $param1 ."/" . $param2);

    }

}

public function edit_history(){

    if (!$this->session->userdata('logged_in')) {
        // If not logged in, redirect to the login page
        redirect('pages/login');
    }
        
        $page ="edit_history";

        if(!file_exists(APPPATH. 'views/pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Edit History";


        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
    
}


public function delete(){


    $this->Posts_model->delete_post();
    $this->session->set_flashdata('post_delete', 'Post was deleted successfully!');
    redirect(base_url());

}

public function deletedrecords(){

    $page ="deletedrecords";

    if(!file_exists(APPPATH. 'views/pages/'.$page.'.php')){
        show_404();
    }

}

}