<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(APPPATH . '/libraries/RestController.php');
require(APPPATH . '/libraries/Format.php');

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('car_model');
    }

    public function cars_get()
    {
        $r = $this->car_model->get_all();
        $this->response($r);
    }

    public function car_get()
    {
        $id = $this->uri->segment(3);
        $r = $this->car_model->get_user($id);
        $this->response($r);
    }

    public function car_post()
    {
        $_POST = json_decode($this->input->raw_input_stream, true);
       
        $data = array(
            'make' => $this->input->post('make'),
            'model' => $this->input->post('model'),
            'type' => $this->input->post('type')
        );
        $r = $this->car_model->insert($data);
        $this->response($r);
    }

    public function car_put()
    {
        $id = $this->uri->segment(3);
        $_POST = json_decode($this->input->raw_input_stream, true);
       
        $data = array(
            'make' => $this->input->post('make'),
            'model' => $this->input->post('model'),
            'type' => $this->input->post('type')
        );
        $r = $this->car_model->update($id, $data);
        $this->response($r);
    }
    
    public function car_delete()
    {
        $id = $this->uri->segment(3);
        $r = $this->car_model->delete($id);
        $this->response($r);
    }

}