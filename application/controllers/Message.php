<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

    public function send_message()
    {
        $this->load->view('send_msg');
    }
}
