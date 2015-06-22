<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{


    public function index()
    {
        if($this->session->userdata('user_sess')){

            $sess = $this->session->userdata('user_sess');
            $this->load->model('login_model');
            if($this->login_model->check_login($sess)){
                header('Location:'.base_url());
            }




        }elseif($this->input->post('email')){
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

            $check = $this->form_validation->run();
            if ($check == true) {

                //$id = $this->session->userdata('user_id');

                $email = $this->input->post('email');
                $password = $this->input->post('password');

                $this->load->model('login_model');
                if($data['user'] = $this->login_model->login($email,$password)){

                    $data['images'] = $this->login_model->load_image();
                    $data['profile'] = $this->login_model->profile();


                    $this->load->view('header');
                    $this->load->view('complete', $data);

                }else {

                    $this->load->view('login_view');

                }




            } else {

                $this->load->view('login_view');

            }

        }else{

            header('Location:'.base_url());
        }



    }
    public function logout(){

        $this->load->model('login_model');
        $this->login_model->logout();
        $this->load->view('default');
    }
}