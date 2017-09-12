<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Session extends MY_Site_Controller {

    // Constructor
    public function __construct() {
        parent::__construct();

        // Loading models
        $this->load->model('token_histories_model');
        $this->load->model('appointment_history_model');
        $this->load->model('appointment_model');
        $this->load->model('class_member_model');
        $this->load->model('identity_model');
        $this->load->library('downloadrecord');
        $this->load->library('schedule_function');

        // Checking user role and giving action
        if (!$this->auth_manager->role() || $this->auth_manager->role() != 'STD') {
            $this->messages->add('ERROR');
            redirect('account/identity/detail/profile');
        }
    }

    public function index($page=''){
        $this->template->title = 'Session Histories';
        $date_from = date('Y-m-d',strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-100 year"));
        $student_id = $this->auth_manager->userid();
        // date_default_timezone_set('Asia/Jakarta');
        // $pulltime = date('H:i:s');
        // $def_server  = strtotime($pulltime);
        // $addminutes = $def_server-(60*420);
        // $server_time = date('H:i:s', $addminutes);

        // $utz = $this->db->select('user_timezone')
        //     ->from('user_profiles')
        //     ->where('user_id', $id)
        //     ->get()->result();
        // $idutz = $utz[0]->user_timezone;
        $tz = $this->db->select('*')
            ->from('user_timezones')
            ->where('user_id', $student_id)
            ->get()->result();

        $minutes = @$tz[0]->minutes_val;
        $gmt_val = @$tz[0]->gmt_val;

        if(@$gmt_val > 0){
            @$gmt_val = "+".@$gmt_val;
        }

        $tipe = '';
        if($this->auth_manager->role() == "STD"){
            $tipe = 'student_id';
        } else if($this->auth_manager->role() == "CCH"){
            $tipe = 'coach_id';
        }

        $dates3     = date('Y-m-d H:i:s');
        $def3      = strtotime($dates3);
        $datetime3 = $def3+(60*$minutes);
        $nowdate  = date("Y-m-d");
        // $nowd  = "2016-08-21";
        $hour_start_db  = date('H:i:s');
        // $hour_start_db  = "02:40:01";
        // echo "<pre>";
        // print_r($tz);
        // exit();
        $pull_appoint = $this->db->select('*')
                      ->from('appointments')
                      ->where($tipe, $student_id)
                      ->where('date =', $nowdate)
                      ->where('end_time >=', $hour_start_db)
                      ->where('status', 'active')
                      ->order_by('date', 'ASC')
                      ->order_by('start_time', 'ASC')
                      // ->limit(5)
                      ->get()->result();

        $pull_appoint3 = $this->db->select('*')
                      ->from('appointments')
                      ->where($tipe, $student_id)
                      ->where('date >', $nowdate)
                      ->where('status', 'active')
                      ->or_where($tipe, $student_id)
                      ->where('date >=', $nowdate)
                      ->where('end_time >=', $hour_start_db)
                      ->where('status', 'active')
                      ->order_by('date', 'ASC')
                      ->order_by('start_time', 'ASC')
                      // ->limit(5)
                      ->get()->result();
        //------------wm

        $data = @$pull_appoint;
        $dataupcoming = @$pull_appoint3;

        if ($data) {
            foreach ($data as $d) {
                $data_schedule = $this->convertBookSchedule($this->identity_model->new_get_gmt($this->auth_manager->userid())[0]->minutes, strtotime($d->date), $d->start_time, $d->end_time);
                $d->date = date('Y-m-d', $data_schedule['date']);
                $d->start_time = $data_schedule['start_time'];
                $d->end_time = $data_schedule['end_time'];

            }
        }

        if ($dataupcoming) {
            foreach ($dataupcoming as $d) {
                $data_schedule = $this->convertBookSchedule($this->identity_model->new_get_gmt($this->auth_manager->userid())[0]->minutes, strtotime($d->date), $d->start_time, $d->end_time);
                $d->date = date('Y-m-d', $data_schedule['date']);
                $d->start_time = $data_schedule['start_time'];
                $d->end_time = $data_schedule['end_time'];

            }
        }

        $offset = 0;
        $per_page = '';
        $uri_segment = 4;
        $pagination = $this->common_function->create_link_pagination($page, $offset, site_url('student/histories/index'), count($this->appointment_model->get_session_histories('student_id', $this->auth_manager->userid(),$date_from, date('Y-m-d'))), $per_page, $uri_segment);
        $histories = $this->appointment_model->get_session_histories('student_id', $this->auth_manager->userid(), $date_from, date('Y-m-d'), $per_page, $offset);
        if ($histories) {
            foreach ($histories as $history) {
                $data_schedule = $this->schedule_function->convert_book_schedule($this->identity_model->new_get_gmt($this->auth_manager->userid())[0]->minutes, strtotime($history->date), $history->start_time, $history->end_time);
                $history->date = date('Y-m-d', $data_schedule['date']);
                $history->start_time = $data_schedule['start_time'];
                $history->end_time = $data_schedule['end_time'];
            }
        }
        foreach($histories as $his){
            $sessid[] = $his->session;
        }
        // CONVERT ATTENDANCE TIME
        // $id = $this->auth_manager->userid();
        // $utz = $this->db->select('user_timezone')
        //         ->from('user_profiles')
        //         ->where('user_id', $id)
        //         ->get()->result();
        // $idutz = $utz[0]->user_timezone;
        // $tz = $this->db->select('*')
        //         ->from('timezones')
        //         ->where('id', $idutz)
        //         ->get()->result();

        // $minutes = $tz[0]->minutes;
        $minutes = $this->identity_model->new_get_gmt($this->auth_manager->userid())[0]->minutes;


        // END

        // API FOR DOWNLOAD RECORD ----------------------------------
        // @$apirecord = $this->downloadrecord->init();

        // @$items = @$apirecord->items;
        // foreach(@$items as $a){
        //     $sessionID = $a->sessionId;
        //     $url       = $a->url;
        //     $archId    = $a->id;

        //     if($sessionID == @$sessid){
        //         $download = $url;
        //         $archiveId = $archId;
        //     }
        // }
        // API END ---------------------------------------------------
        $vars = array(
            'form_action' => 'search',
            'histories' => @$histories,
            'start_date' => date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month")),
            'pagination' => @$pagination,
            'minutes' => @$minutes,
            'student_id' => $student_id,
            'data' => $data,
            'dataupcoming' => $dataupcoming,
            'gmt_val' => $gmt_val

        );

        // echo "<pre>";
        // print_r($histories);
        // exit();
        $this->template->content->view('contents/b2c/student/session/index', $vars);
        $this->template->publish();
    }

    public function search($session='', $page=''){
        $this->template->title = 'Student Token';

        if($this->input->post('date_from') && $this->input->post('date_to')){
            $this->session->set_userdata('date_from', $this->input->post('date_from'));
            $this->session->set_userdata('date_to', $this->input->post('date_to'));
        }

        $rules = array(
            array('field'=>'date_from', 'label' => 'Start Date', 'rules'=>'trim|required|xss_clean'),
            array('field'=>'date_to', 'label' => 'End Date', 'rules'=>'trim|required|xss_clean')
        );
        $student_id = $this->auth_manager->userid();
        if(($this->input->post('__submit'))){
            if (!$this->common_function->run_validation($rules)) {
                $this->messages->add(validation_errors(), 'warning');
                if($session == 'one_to_one'){
                    redirect('student/histories');
                }elseif($session == 'class'){
                    redirect('student/histories/class_session');
                }
            }
        }

        $date_from = ($this->input->post('date_from') ? $this->input->post('date_from') : $this->session->userdata('date_from'));
        $date_to = ($this->input->post('date_to') ? $this->input->post('date_to') : $this->session->userdata('date_to'));

        if(!$date_from || !$date_to || $date_from > $date_to){
            $this->messages->add('Invalid time period', 'warning');
            if($session == 'one_to_one'){
                redirect('student/histories');
            }elseif($session == 'class'){
                redirect('student/histories/class_session');
            }
        }

        $offset = 0;
        $per_page = 5;
        $uri_segment = 5;

        if($session == 'one_to_one'){
            $form_action = "search/one_to_one";
            $pagination = $this->common_function->create_link_pagination($page, $offset, site_url('student/histories/search/one_to_one'), count($this->appointment_model->get_session_histories('student_id', $this->auth_manager->userid(), $date_from, $date_to, $per_page, $offset)), $per_page, $uri_segment);
            $histories = $this->appointment_model->get_session_histories('student_id', $this->auth_manager->userid(), $date_from, $date_to, $per_page, $offset);
            if ($histories) {
                foreach ($histories as $history) {
                    $data_schedule = $this->schedule_function->convert_book_schedule($this->identity_model->new_get_gmt($this->auth_manager->userid())[0]->minutes, strtotime($history->date), $history->start_time, $history->end_time);
                    $history->date = date('Y-m-d', $data_schedule['date']);
                    $history->start_time = $data_schedule['start_time'];
                    $history->end_time = $data_schedule['end_time'];
                }
            }
        }elseif($session == 'class'){
            $form_action = "search/class";
            $pagination = $this->common_function->create_link_pagination($page, $offset, site_url('student/histories/search/class'), count($this->class_member_model->get_session_histories('student_id', $this->auth_manager->userid(), $date_from, $date_to, $per_page, $offset)), $per_page, $uri_segment);
            $histories = $this->class_member_model->get_session_histories('student_id', $this->auth_manager->userid(), $date_from, $date_to, $per_page, $offset);
            if ($histories) {
                foreach ($histories as $history) {
                    $data_schedule = $this->schedule_function->convert_book_schedule($this->identity_model->get_gmt($this->auth_manager->userid())[0]->minutes, strtotime($h->date), $h->start_time, $h->end_time);
                    $history->date = date('Y-m-d', $data_schedule['date']);
                    $history->start_time = $data_schedule['start_time'];
                    $history->end_time = $data_schedule['end_time'];
                }
            }
        }

        // $id = $this->auth_manager->userid();
        // $utz = $this->db->select('user_timezone')
        //         ->from('user_profiles')
        //         ->where('user_id', $id)
        //         ->get()->result();
        // $idutz = $utz[0]->user_timezone;
        // $tz = $this->db->select('*')
        //         ->from('timezones')
        //         ->where('id', $idutz)
        //         ->get()->result();

        // $minutes = $tz[0]->minutes;
        $minutes = $this->identity_model->new_get_gmt($this->auth_manager->userid())[0]->minutes;

        $vars = array(
            'form_action' => 'search',
            'histories' => @$histories,
            'minutes' => @$minutes,
            'start_date' => date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-2 month")),
            'pagination' => @$pagination,
            'student_id' => $student_id
        );

        $this->template->content->view('default/contents/student/history_session/index', $vars);
        $this->template->publish();
    }

    public function class_session($page=''){
        $this->template->title = 'Class Session Histories';
        $date_from = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month"));

        $offset = 0;
        $per_page = 5;
        $uri_segment = 4;
        $pagination = $this->common_function->create_link_pagination($page, $offset, site_url('student/histories/class_session'), count($this->class_member_model->get_session_histories('student_id', $this->auth_manager->userid(), $date_from, date('Y-m-d'))), $per_page, $uri_segment);
        $histories = $this->class_member_model->get_session_histories('student_id', $this->auth_manager->userid(), $date_from, date('Y-m-d'), $per_page, $offset);
        if ($histories) {
            foreach ($histories as $h) {
                $data_schedule = $this->schedule_function->convert_book_schedule($this->identity_model->new_get_gmt($this->auth_manager->userid())[0]->minutes, strtotime($h->date), $h->start_time, $h->end_time);
                $h->date = date('Y-m-d', $data_schedule['date']);
                $h->start_time = $data_schedule['start_time'];
                $h->end_time = $data_schedule['end_time'];
            }
        }

        $vars = array(
            'form_action' => 'search/class',
            'histories' => @$histories,
            'user' => 'coach',
            'start_date' => date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-2 month")),
            'pagination' => @$pagination
        );

        $this->template->content->view('default/contents/student/history_session/class', $vars);
        $this->template->publish();
    }

    private function convertBookSchedule($minutes = '', $date = '', $start_time = '', $end_time = ''){
        // variable to get schedule out of date
        if($minutes > 0){
            if(strtotime(date("H:i:s", strtotime($minutes . 'minutes', strtotime($end_time)))) > strtotime($end_time) || date("H:i:s", strtotime($minutes . 'minutes', strtotime($end_time))) == '00:00:00'){
                $date = $date;
                $start_time = date("H:i:s", strtotime($minutes . 'minutes', strtotime($start_time)));
                $end_time = (date("H:i:s", strtotime($minutes . 'minutes', strtotime($end_time))) == '00:00:00' ? '23:59:59' : date("H:i:s", strtotime($minutes . 'minutes', strtotime($end_time))));
            }
            else if(strtotime(date("H:i:s", strtotime($minutes . 'minutes', strtotime($start_time)))) < strtotime($start_time)){
                $date = strtotime('+ 1days'.date('Y-m-d',$date));
                //$tomorrow = date('m-d-Y',strtotime($date . "+1 days"));
                $start_time = date("H:i:s", strtotime($minutes . 'minutes', strtotime($start_time)));
                $end_time = date("H:i:s", strtotime($minutes . 'minutes', strtotime($end_time)));

//                $date2 = strtotime('+ 1days'.date('Y-m-d',$date));
//                //$tomorrow = date('m-d-Y',strtotime($date . "+1 days"));
//                $start_time2 = date("H:i:s", strtotime($minutes . 'minutes', strtotime($start_time)));
//                $end_time2 = date("H:i:s", strtotime($minutes . 'minutes', strtotime($end_time)));
            }
        }
        else if($minutes < 0){
            if(strtotime(date("H:i:s", strtotime($minutes . 'minutes', strtotime($start_time)))) < strtotime($start_time)){
                $date = $date;
                $start_time = date("H:i:s", strtotime($minutes . 'minutes', strtotime($start_time)));
                $end_time = date("H:i:s", strtotime($minutes . 'minutes', strtotime($end_time)));
            }
            else if(strtotime(date("H:i:s", strtotime($minutes . 'minutes', strtotime($end_time)))) > strtotime($end_time) || date("H:i:s", strtotime($minutes . 'minutes', strtotime($end_time))) == '00:00:00'){
                $date = strtotime('- 1days'.date('Y-m-d',$date));
                $start_time = date("H:i:s", strtotime($minutes . 'minutes', strtotime($start_time)));
                $end_time = (date("H:i:s", strtotime($minutes . 'minutes', strtotime($end_time))) == '00:00:00' ? '23:59:59' : date("H:i:s", strtotime($minutes . 'minutes', strtotime($end_time))));

//                $date2 = strtotime('- 1days'.date('Y-m-d',$date));
//                $start_time2 = date("H:i:s", strtotime($minutes . 'minutes', strtotime($start_time)));
//                $end_time2 = (date("H:i:s", strtotime($minutes . 'minutes', strtotime($end_time))) == '00:00:00' ? '23:59:59' : date("H:i:s", strtotime($minutes . 'minutes', strtotime($end_time))));
            }
        }

        return array(
            'date' => $date,
            'start_time' => $start_time,
            'end_time' => $end_time,
//            'date2' => @$date2,
//            'start_time2' => @$start_time2,
//            'end_time2' => @$end_time2,
        );
    }

    public function coach_detail(){
        $coach_id = $this->input->post('coach_id');

        $data = $this->identity_model->get_coach_identity($coach_id);

        $name = $data[0]->fullname;
        $email = $data[0]->email;
        $birthdate = $data[0]->date_of_birth;
        $spoken_language = $data[0]->spoken_language;
        $gender = $data[0]->gender;
        $timezone = $data[0]->timezone;
        $profile_picture = $data[0]->profile_picture;

        $var[] = ['name' => $name,
                'email' => $email,
                'birthdate' => $birthdate,
                'spoken_language' => $spoken_language,
                'gender' => $gender,
                'timezone' => $timezone,
                'profile_picture' => $profile_picture,
                ];
        echo json_encode($var);
    }

    public function check_record(){
      $sessionID = $this->input->post("sessionid");

      $asd = $this->downloadrecord->init();

      $items = $asd->items;
      foreach($items as $a){
          $sess    = $a->sessionId;
          $status  = $a->status;
          $url     = $a->url;

          if($sessionID == $sess){
              $stat = $status;
              $downloadurl = $url;
          }
      }

      $pullsess = $this->db->select('*')
              ->from('appointments')
              ->where('session', $sessionID)
              ->get()->result();

      $cchatt = $pullsess[0]->cch_attend;
      $stdatt = $pullsess[0]->std_attend;

      if (@$downloadurl == Null) {
          if($cchatt == NULL && $stdatt == NULL){
              $note = "No recorded session. Both student and coach didn't attend the session.";
          }else{
              $note = "This download link has expired. Recordings are only available for 72 hours after session. ";
          }
      }else{
          $note = "Recording links are only available for 72 hours after end of session.";
      }

      $vars[] = [
        'status' => @$stat,
        'note'   => @$note,
        'downloadurl'   => @$downloadurl
      ];
      echo json_encode($vars);
    }
}
