<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class First extends CI_Controller {


    public function index()
    {
        if($this->session->userdata('user_sess')){

            $id = $this->session->userdata('user_id');
            $sess = $this->session->userdata('user_sess');
            $this->load->model('login_model');
            $data['user'] = $this->login_model->check_login($sess);
            $data['images'] = $this->login_model->load_image($id);
            $data['profile'] = $this->login_model->profile($id);
            $this->load->view('header');
            $this->load->view('complete',$data);

        }else{

            $this->load->view('header');
            $this->load->view('default');
        }

    }


}