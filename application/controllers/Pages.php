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

}