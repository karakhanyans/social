<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class People extends CI_Controller
{


    public function index()
    {

        if ($this->session->userdata('user_sess')) {

            $sess = $this->session->userdata('user_sess');
            $this->load->model('login_model');
            $data['user'] = $this->login_model->check_login($sess);

            $id = $this->session->userdata('user_id');

            $this->load->model('people_model');
            $data['people'] = $this->people_model->load_people($id);
            foreach ($data['people'] as $people) {
                if(!empty($people['user_sess'])){

                    $status = 'on';
                }else{

                    $status = 'off';
                }
                if(!empty($people['image_name'])){

                    $image = '<img src="'.base_url().'images/photo/'.$people['image_name'].'">';
                }
                echo '<div class="user" data-id="'.$people['id'].'">' .
                         '<div class="user-image">'.$image.'</div>' .
                         '<div class="user-name">'.$people['name'].'&nbsp'.$people['surname'].'</div>' .
                         '<span class="status '.$status.'"></span>' .
                            '<span class="new_count"></span>'.
                     '</div>';
            }

            //$this->load->view('complete',$data);
        } else {

            header('Location:' . base_url());
        }

    }

    public function view_profile($id)
    {
        if ($this->session->userdata('user_sess')) {
            $this->load->model('people_model');
            $data['profile'] = $this->people_model->view_profile($id);

            $this->load->model('login_model');
            $data['images'] = $this->login_model->load_image($id);
            $this->load->view('people_view', $data);
        } else {

            header('Location:' . base_url());
        }
    }


}