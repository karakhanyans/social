<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller
{


    public function index()
    {

        $this->load->model('message_model');




        $data['message'] = $this->input->post('message');

        $data['from_id'] = $this->input->post('from_id');
        $data['to_id'] = $this->input->post('to_id');
        $data['status'] = 'new';
        $data['date_send'] = $this->input->post('date_send');

        if(strlen(trim($data['message'])) > 0){

            $this->message_model->insert_message($data);
        }





    }

    public function load_message($id)
    {
        date_default_timezone_set('Asia/Yerevan');
        $this->load->model('message_model');


//        $data['from_id'] = $this->input->post('from_id');
//        $data['to_id'] = $this->input->post('to_id');
        $data['from_id'] = $this->session->userdata('user_id');
        $data['to_id'] = $id;
        $message = $this->message_model->load_message($data);

        foreach ($message as $mes) {
            if($this->session->userdata('user_id') == $mes['from_id']){

                $from = 'from';

            }else{

                $from = 'to';
            }
            if(!empty($mes['date_viewed'])){

                $date = date('H:i:s',$mes['date_viewed']);
            }else{

                $date = date('H:i:s',$mes['date_send'] / 1000);

            }
            if($mes['status'] == 'seen'){

                $seen = 'seen';
            }else{

                $seen = '';
            }
            echo '<div class="info '.$from.'">' .
//                '<span class="chat_image"><img src="/images/photo/' . $mes['image'] . '"></span>' .
                '<span class="name">' . $mes['name'] . '</span>' .
                '<p class="text '.$mes['status'].'">' .
                '<span class="mess">'.$mes['message'].'</span>' .
                '<span class="time">' .
                $seen.'&nbsp'.$date .
                '</span>' .
                '</p>' . '<div class="clear"></div>'.
                '</div>';
        }


    }
    public function check_new_message(){

        $this->load->model('message_model');
        $count = $this->message_model->check_new_message();


        echo  json_encode($count);

    }

//    public function load_last()
//    {
//        $this->load->model('message_model');
//        $data['message'] = $this->input->post('message');
//        $data['from_id'] = $this->input->post('from_id');
//        $data['to_id'] = $this->input->post('to_id');
//        $data['status'] = $this->input->post('status');
//        $data['date_send'] = $this->input->post('date_send');
//        $chat['message'] = $this->message_model->load_last($data);
//        foreach ($chat['message'] as $message) {
//
//            echo $message['from_id'] . '&nbsp;' . $message['message'] . '<br>';
//        }
//
//    }

    public function set_status()
    {

        $this->load->model('message_model');
        $this->message_model->set_status();
    }


}