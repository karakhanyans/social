<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class People_model extends CI_Model {


    public function load_people($id){


       // $query =  $this->db->get('users');

        $this->db->select('users.id,users.name,users.surname,users.user_sess,images.user_id,images.image_name,images.status');
        $this->db->from('users');
        $this->db->join('images','users.id = images.user_id','left');
        $this->db->where('users.id !=',$id);

        $this->db->where('images.status','profile');
        $query = $this->db->get();
        return $res = $query->result_array();

    }
    public function view_profile($id){

        $this->db->where('id',$id);
        $query = $this->db->get('users');
        return $query->result_array();
    }





}