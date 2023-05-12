<?php

class Pages extends CI_Controller{

    public function view($param = null){

        if($param == null) {
            
            $page ="home";

            if(!file_exists(APPPATH. 'views/pages/'.$page.'.php')){
                show_404();
            }
    
            $data['title'] = "New Posts";
            $data['posts'] = $this->Posts_model->get_posts();
    
            //print_r($data['document']);
     
    
    
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
    
        }else{
            
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
            $this->load->view('templates/footer');
        }else{
            show_404();

        }

    }
}

public function add() {

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
    $this->form_validation->set_rules('title','Title','required');
    $this->form_validation->set_rules('body','body','required');
    if($this->form_validation->run() == FALSE){
            
        $page ="add";

        if(!file_exists(APPPATH. 'views/pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Add New Post";



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


}

}