<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Agora extends MY_Site_Controller {

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    public function index() {
      // $id = $this->auth_manager->userid();
      $this->template->title = "Agora";
      $var = array(
        'uid' => '2450682799',
      );
      $this->template->content->view('contents/playground/agora/index', $var);
      $this->template->publish();
    }
    public function join() {
      // $id = $this->auth_manager->userid();
      $this->template->title = "Agora";

      $this->template->content->view('contents/playground/agora/join');
      $this->template->publish();
    }

}
