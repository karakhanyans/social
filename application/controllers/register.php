<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('user_sess')) {


            $this->load->model('login_model');
            $data['user'] = $this->login_model->check_login();
            $this->load->view('complete', $data);

        }else{

            $this->load->helper('form');

            $this->load->library('form_validation');
            $this->load->model('register_model');
            if (isset($_POST['name'])) {

                $this->load->model('register_model');
                $this->form_validation->set_rules($this->register_model->rules);

                $check = $this->form_validation->run();

                if ($check == true) {

                    $user['name'] = $this->input->post('name');
                    $user['surname'] = $this->input->post('surname');
                    $user['email'] = $this->input->post('email');

                    $salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
                    $salt = base64_encode($salt);
                    $salt = str_replace('+', '.', $salt);
                    $user['password'] = crypt($this->input->post('password'), '$2y$10$' . $salt . '$');






                    $this->db->insert('users', $user);
                    $this->load->view('register_success');


                } else {

                    $this->load->view('register_view');
                }


            } else {
                $this->load->view('register_view');

            }
        }





    }


}