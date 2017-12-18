<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Study_dashboard_wa extends MY_Controller {

    // Constructor
    public function __construct() {
        parent::__construct();
        $this->load->library('Study_progress');
    }

    public function mobile($t, $token, $u, $username){
      // echo $username;

      $pull_user_id = $this->db->select('id')
                    ->from('users')
                    ->where('sso_username', $username)
                    ->get()->result();

      $id = $pull_user_id[0]->id;

      $is_verified = $this->study_progress->TokenVerify($token);

      if(!$is_verified){
        $this->load->view('contents/b2c/student/study_dashboard_wa/nodata');
        // exit();
      }else{
        // http://localhost:8088/index.php/b2c/student/study_dashboard_wa/mobile/token/eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE1MTI5ODYzNjQsImV4cGlyYXRpb24iOjE1MTI5ODYzNjQsInVzZXJuYW1lIjoiYW5kcm9pZCIsInV1aWQiOiIyNzA3NjY4Mzc5NDMwNzQ4MTcifQ.dH5ErPVy5pahZCbRbmVCykcqdhMPKOBAOPZdo305MD-TV4YK9bDMpDTz6EAYp3ORuyytGosVrYqMZGM8m8IfYgMR4Cp2MiZVxcBqFf9dv5gH3tQhLcwlHWkpmCVJdp6LhSMqZbHMsKGNDPq8E7o0qUrmQE8Amkq5Hn4OK3kTGRAv1iKUP-lC8QTobAXgFRt4KXLjXy8fgOz9oa4jeNbzxtqjz49LNRehYdKb6NSOWw8W7QJkBpXm8E8gvZNUsmHhsXOFSmlwxU8gNXyXrbjbTwr8jOoe-yCIHUn6kvVXm-b-CaMS4LFzv8FiCoJ1a1JlOVa2Q4WXwbuUrFKPYXSmxw/username/android

        $gcp = json_decode($this->study_progress->GetCurrentProgress_wa($token, $username));
        $gsp = json_decode($this->study_progress->GetStudyProgress_wa($token, $username));
        $gwp = json_decode($this->study_progress->GetWeeklyProgress_wa($token, $username));

        $mt_status_to_colour = array(
          "passed" => "bg-green-gradient",
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
        $time  = date('H:i:s');
        $date  = date('Y-m-d');

        $check_study_data = $this->db->select('user_id')
                          ->from('b2c_student_progress')
                          ->where('user_id',$id)
                          ->get()->result();

        if(@$check_study_data){
          $array_study = array(
            'json_gsp' => json_encode($gsp),
            'json_gcp' => json_encode($gcp),
            'json_gwp' => json_encode($gwp),
            'updated_date' => $date,
            'updated_time' => $time
          );

          // echo('<pre>');print_r($array_study); exit;
          $this->db->where('user_id', $id);
          $this->db->update('b2c_student_progress', $array_study);
        }else{
          $array_study = array(
            'json_gsp' => json_encode($gsp),
            'json_gcp' => json_encode($gcp),
            'json_gwp' => json_encode($gwp),
            'user_id' => $id,
            'updated_date' => $date,
            'updated_time' => $time
          );

          $this->db->insert('b2c_student_progress', $array_study);

          // exit();
        }

        $vars = array(
            'gsp' => @$gsp,
            'gcp' => @$gcp,
            'gwp' => @$gwp,
            'student_color' => @$student_color,
            'coach_color' => @$coach_color,
            'max_buletan' => @$max_buletan,
            'max_buletan_student' => @$max_buletan_student
        );

        $this->load->view('contents/b2c/student/study_dashboard_wa/index',$vars);
      }


    }
}
