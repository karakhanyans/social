<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model {




        public $rules = array(

            array(
                'field' => 'name',
                'lable' => 'Name',
                'rules' => 'trim|required|min_length[3]|max_length[12]|xss_clean'
            ),
            array(
                'field' => 'surname',
                'lable' => 'Surname',
                'rules' => 'trim|required|min_length[3]|max_length[12]|xss_clean'
            ),
            array(
                'field' => 'email',
                'lable' => 'Email',
                'rules' => 'trim|required|valid_email'
            ),
            array(
                'field' => 'password',
                'lable' => 'Password',
                'rules' => 'trim|required|min_length[6]|max_length[12]|xss_clean|matches[confirm_password]'
            ),
            array(
                'field' => 'confirm_password',
                'lable' => 'Confirm Password',
                'rules' => 'trim|required|min_length[3]|max_length[12]|xss_clean'
            )
        );






}