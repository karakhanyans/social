<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {


    public function upload_image($id)
    {


        if(isset($_FILES) && !empty($_FILES)){
            $config['upload_path'] = './images/photo';

            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '1000';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $config['encrypt_name'] = true;


            $this->load->library('upload', $config);
            if( $this->upload->do_upload('image_name')){
                $name = $this->upload->data();
                $image['image_name'] = $name['file_name'];
                $image['user_id'] = $id;
                $this->db->insert('images',$image);
                header('Location:'.base_url());

            }else{
                $this->session->set_userdata('error_upload','Please choose the image');
                header('Location:'.base_url());

            }



        }else{
            $this->session->set_userdata('error_upload','Please choose the image');
            header('Location:'.base_url());

        }

    }
    public function load_images($id){

        $this->load->model('load_images_model');
        $result = $this->load_images_model->load_images($id);

        foreach($result as $images){

            echo '<img src="'.base_url().'images/photo/'.$images['image_name'].'">';
        }
    }


}