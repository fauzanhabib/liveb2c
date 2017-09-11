<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Study_dashboard extends MY_Site_Controller {

    // Constructor
    public function __construct() {
        parent::__construct();
        // Load Model
        $this->load->model('user_role_model');
        $this->load->model('user_model');
        $this->load->model('user_profile_model');
        $this->load->model('identity_model');
        $this->load->model('partner_model');
        // To convert id to name of Social Media
        $this->load->model('timezone_model');

        $this->load->library('common_function');
        $this->load->library('Study_progress');
    }

    // Index
    public function index() {
      $id = $this->auth_manager->userid();
      $this->template->title = "Study Dashboard";

      $tokenresult = $this->session->userdata('token_api');
      // $tokenresult = $this->study_progress->GenerateToken();
      // echo('<pre>');print_r($tokenresult); exit;

      $gsp = $this->study_progress->GetStudyProgress($tokenresult);
      $gcp = $this->study_progress->GetCurrentProgress($tokenresult);
      $gwp = $this->study_progress->GetWeeklyProgress($tokenresult);

      $mt_status_to_colour = array(
        "passed" => "bg-blue-gradient",
        "open" => "bg-white-gradient",
        "locked" => "",
        "failed" => "bg-red-gradient"
      );
      $mt_color = array(
        'mt1' => $mt_status_to_colour[$gsp->data->mastery_tests[0]->status],
        'mt2' => $mt_status_to_colour[$gsp->data->mastery_tests[1]->status],
        'mt3' => $mt_status_to_colour[$gsp->data->mastery_tests[2]->status],
        'mt4' => $mt_status_to_colour[$gsp->data->mastery_tests[3]->status],
        'mt5' => $mt_status_to_colour[$gsp->data->mastery_tests[4]->status],
        'mt6' => $mt_status_to_colour[$gsp->data->mastery_tests[5]->status]
      );

      $vars = array(
          'gsp' => @$gsp,
          'gcp' => @$gcp,
          'gwp' => @$gwp,
          'mt_color' => @$mt_color
      );

      // echo $key;
      // echo('<pre>');print_r($vars); exit;
      $this->template->content->view('contents/b2c/student/study_dashboard/index',$vars);
      $this->template->publish();
    }

}
