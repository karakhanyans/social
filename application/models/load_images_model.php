<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Load_images_model extends CI_Model {


        public function load_images($id){


            $this->db->where('user_id',$id);
            $query = $this->db->get('images');
            $result = $query->result_array();
            return $result;

        }


}