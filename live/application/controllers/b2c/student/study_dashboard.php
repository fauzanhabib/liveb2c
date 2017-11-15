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

      $pull_std = $this->db->select('email,password')
                                 ->from('users')
                                 ->where('id', $id)
                                 ->get()->result();

      $std_email = $pull_std[0]->email;
      $std_paswd = $pull_std[0]->password;

      // echo('<pre>');print_r($pull_std); exit;

      $tokenresult = $this->session->userdata('token_api');

      // $tokenresult = $this->study_progress->GenerateToken();
      if(!@$tokenresult){
        $tokenresult = $this->study_progress->GenerateToken();
        // $tokenresult = $this->study_progress->GenerateToken($std_email, $std_paswd);
        // echo('<pre>');print_r($tokenresult); exit;
      }



      if(@$tokenresult){
        $tokenresult = $this->study_progress->GenerateToken();


        $gsp = json_decode(@$this->study_progress->GetStudyProgress($tokenresult));

        $gcp = json_decode(@$this->study_progress->GetCurrentProgress($tokenresult));
        $gwp = json_decode(@$this->study_progress->GetWeeklyProgress($tokenresult));

        // echo('<pre>');print_r($tokenresult); exit;
        $mt_status_to_colour = array(
          "passed" => "bg-blue-gradient",
          "open" => "bg-white-gradient",
          "locked" => "",
          "failed" => "bg-red-gradient"
        );
        // $mt_color = array(
        //   'mt1' => @$mt_status_to_colour[$gsp->data->study->mastery_tests[0]->status],
        //   'mt2' => @$mt_status_to_colour[$gsp->data->study->mastery_tests[1]->status],
        //   'mt3' => @$mt_status_to_colour[$gsp->data->study->mastery_tests[2]->status],
        //   'mt4' => @$mt_status_to_colour[$gsp->data->study->mastery_tests[3]->status],
        //   'mt5' => @$mt_status_to_colour[$gsp->data->study->mastery_tests[4]->status],
        //   'mt6' => @$mt_status_to_colour[$gsp->data->study->mastery_tests[5]->status]
        // );

        /*==============  
          rendy bustari
        ===============*/

        $student_color = [];
        $k = 1;
        $max_buletan_student = sizeof($gsp->data->study->mastery_tests);
        
        for($l=0;$l<$max_buletan_student;$l++){
          $student_color['mt'.$k] = @$mt_status_to_colour[$gsp->data->coach->sessions[$l]->status];
          $k++;
        }


        
        // bulatan coach color
        $coach_status_color = array(
          "passed" => "bg-green-gradient",
          "open" => "bg-white-gradient",
          "locked" => "",
          "failed" => "bg-red-gradient"
          );

        $coach_color = [];
        $j = 1;
        $max_buletan = sizeof($gsp->data->coach->sessions);
        
        for($i=0;$i<$max_buletan;$i++){
          $coach_color['cc'.$j] = @$coach_status_color[$gsp->data->coach->sessions[$i]->status];
          $j++;
        }

        /*============================
          end of edited rendy bustari
        =============================*/


        $vars = array(
            'gsp' => @$gsp,
            'gcp' => @$gcp,
            'gwp' => @$gwp,
            'student_color' => @$student_color,
            'coach_color' => @$coach_color,
            'max_buletan' => @$max_buletan,
            'max_buletan_student' => @$max_buletan_student
        );

        // echo $key;
        // echo('<pre>');print_r($vars); exit;
        $this->template->content->view('contents/b2c/student/study_dashboard/index',$vars);
        $this->template->publish();
      }else{
        $this->template->content->view('contents/b2c/student/study_dashboard/nodata');
        $this->template->publish();
      }
    }

}
