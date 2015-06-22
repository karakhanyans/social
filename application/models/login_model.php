<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {


public function login($email,$password){


    $this->db->where('email',$email);
    $query = $this->db->get('users');


    $pass = $query->result_array();

    if($pass[0]['password'] == crypt($password,$pass[0]['password'])){

        $str = str_shuffle('ewubcwilubclksjdbclkbewlkcbweaiucwebciluewbicbwelicubelawublkajdcblakesbcluewbclieubcliuewbcliuewbcilewblcbawelucblwekbkdbclkjasdckabwelflwbcluwbelkucbewluguruuduguduugugdugrcewcuew');
        $s = sha1($str . mt_rand(100, 1000000));
        $id = $pass[0]['id'];

        $update = "UPDATE users SET user_sess='$s' WHERE id='$id'";
        if($this->db->query($update)){

            $this->session->set_userdata('user_sess', $s);
            $this->session->set_userdata('user_id', $id);

        }
        $sess = $this->session->userdata('user_sess');


        return $this->check_login($sess);
        //return $pass;
    }




}
    public function load_image(){

        $id = $this->session->userdata('user_id');
        $this->db->where('user_id',$id);
        $this->db->limit('6');
        $query = $this->db->get('images');
        return $query->result_array();


    }
public function profile(){

    $id = $this->session->userdata('user_id');
    $this->db->where('user_id',$id);
    $this->db->where('status','profile');
    $query = $this->db->get('images');
    return $query->result_array();
}
    public function check_login($sess){

           $sess = $this->session->userdata('user_sess');
//
//            $this->db->select('*');
//            $this->db->from('users');
//            $this->db->join('images','users.id = images.user_id');

            $this->db->where('users.user_sess',$sess);
//            $this->db->where('images.status','profile');
            $query = $this->db->get('users');
            $user = $query->result_array();

        return $user;
    }
    public function logout(){

    $sess = $this->session->userdata('user_sess');
   // $this->db->where('user_sess',$sess);
    $update = "UPDATE users SET user_sess='' WHERE user_sess='$sess'";
        $this->db->query($update);
        $this->session->unset_userdata('user_sess');
        $this->session->unset_userdata('user_id');
        header('Location:'.base_url());
}






}