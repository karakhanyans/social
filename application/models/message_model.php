<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_model extends CI_Model {


    public function insert_message($data){


       $this->db->insert('chat',$data);

    }
    public function load_message($data){
        $from =  $data['from_id'];
        $to =  $data['to_id'];

        $query = "SELECT chat.from_id,chat.to_id,chat.message,chat.status,chat.date_send,chat.date_viewed,users.name,users.id
                  FROM chat
                  JOIN users ON  chat.from_id = users.id
                  WHERE (chat.from_id = '$from' AND chat.to_id = '$to') OR (chat.from_id = '$to' AND chat.to_id = '$from') ORDER BY date_send";
//        $this->db->select('chat.from_id,chat.to_id,chat.message,chat.status,chat.date_send,chat.date_viewed,users.name,users.id');
//        $this->db->from('chat');
//        $this->db->join('users','chat.from_id = users.id' );
//
//
//
//
//        $this->db->where(array('chat.from_id' => $from,'chat.to_id' => $to));
//
//        $this->db->or_where(array('chat.from_id' => $to,'chat.to_id' => $from));
//
//        $this->db->order_by('date_send');


        $result = $this->db->query($query);
        return $result->result_array();
    }

    public function load_last($data){
        $from =  $data['from_id'];
        $to =  $data['to_id'];
        $date =  $data['date_send'];
        $this->db->where('from_id',$from);
        $this->db->where('to_id',$to);
        //$this->db->where('date_send != ',$date);

        $this->db->or_where('from_id',$to);
        $this->db->or_where('to_id',$from);
        $this->db->limit('1');

        $query = $this->db->get('chat');
        return $query->result_array();
    }
    public function set_status(){

        $d = $this->session->userdata('user_id');
        $data['status'] = 'seen';
        $data['date_viewed'] = time();
        $this->db->where('status','new');
        $this->db->where('to_id',$d);
        $this->db->update('chat',$data);


    }
    public function check_new_message(){

        $id = $this->session->userdata('user_id');

        $this->db->where('status','new');
        $this->db->where('to_id',$id);
      //$query['count'] = $this->db->count_all_results('chat');
        $query = $this->db->get('chat');
        return $query->result_array();
    }



}