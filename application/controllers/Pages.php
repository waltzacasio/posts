<?php

class Pages extends CI_Controller{

    public function view($param = null/**/){

        if($param == null) {
            
            $page ="home";

            if(!file_exists(APPPATH. 'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Home";


            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            
                
       /* }else{
            
            $page ="single";

            if(!file_exists(APPPATH. 'views/pages/'.$page.'.php')){
                show_404();
            }
    
            $data['posts'] = $this->Posts_model->get_posts_single($param);
            $data['title'] = $data['posts']['title'] ?? null;
            $data['body'] = $data['posts']['body'] ?? null;
            $data['date'] = $data['posts']['date_published'] ?? null;
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
*/
    }
}

public function search($param1 = null)
{
    $page = "search";
    $searchedWords = $param1 ? urldecode($param1) : $this->input->post('search') ?? '';

    if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
        show_404();
    }

    $this->load->library('pagination');

    $config['base_url'] = 'http://127.0.0.1/posts/search/' . urlencode($searchedWords);
    $config['total_rows'] = count($this->Posts_model->get_posts_search($searchedWords));
    $config['per_page'] = 10;
    $config['num_links'] = 10;

    $this->pagination->initialize($config);

    $data['title'] = "Search Posts";
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


        $this->load->view('templates/header');
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

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
    $this->form_validation->set_rules('firstname','First Name','required');
    $this->form_validation->set_rules('lastname','Last Name','required');
    if($this->form_validation->run() == FALSE){
            
        $page ="add";

        if(!file_exists(APPPATH. 'views/pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Add New Record";



        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');

    }else{

        $this->Posts_model->insert_post();
        $this->session->set_flashdata('post_added','New post was added');
        redirect(base_url());

    }
    

}

public function edit($param){

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
    $this->form_validation->set_rules('title','Title','required');
    $this->form_validation->set_rules('body','body','required');
    if($this->form_validation->run() == FALSE){
            
        $page ="edit";

        if(!file_exists(APPPATH. 'views/pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Edit Post";
        $data['posts'] = $this->Posts_model->get_posts_edit($param);
        $data['title'] = $data['posts']['title'] ?? null;
        $data['body'] = $data['posts']['body'] ?? null;
        $data['date'] = $data['posts']['date_published'] ?? null;
        $data['id'] = $data['posts']['id'] ?? null;



        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');

    }else{

        $this->Posts_model->update_post();
        $this->session->set_flashdata('post_updated','Post was Updated');
        redirect(base_url().'edit/'.$param);

    }

}

public function delete(){

    $this->Posts_model->delete_post();
    $this->session->set_flashdata('post_delete', 'Post was deleted successfully!');
    redirect(base_url());

}

}