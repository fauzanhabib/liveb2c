<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_wa extends MY_Controller {

    // Constructor
    public function __construct() {
        parent::__construct();
        $this->load->model('appointment_model');
        $this->load->model('class_member_model');
        $this->load->library('send_sms');
        $this->load->library('send_email');
        $this->load->library('email');
        $this->load->library('Study_progress');
        //checking user role and giving action
        // if (!$this->auth_manager->role() || $this->auth_manager->role() != 'STD') {
        //     $this->messages->add('ERROR');
        //     redirect('account/identity/detail/profile');
        // }
    }

    // Index
    public function index() {
        $this->template->title = "Dashboard";
        // var_dump($username);
        // exit();
        //http://localhost:8088/index.php/b2c/student/dashboard_wa?token=asddfsdg&username=asdasf


        // $user = "<script language=\"javascript\">alert('a')</script>";
        // echo $this->session->userdata('u_u');exit();

        //------------wm
        $id    = $this->auth_manager->userid();

        //save study data ------------------------------------------

        $check_study_data = $this->db->select('*')
                          ->from('b2c_student_progress')
                          ->where('user_id',$id)
                          ->get()->result();

        $last_upd_date = @$check_study_data[0]->updated_date;
        $last_upd_time = @$check_study_data[0]->updated_time;

        $decode_gcp = json_decode(@$check_study_data[0]->json_gcp);
        $decode_gsp = json_decode(@$check_study_data[0]->json_gsp);
        $decode_gwp = json_decode(@$check_study_data[0]->json_gwp);

        $err_gcp = @$decode_gcp->error;
        $err_gsp = @$decode_gsp->error;
        $err_gwp = @$decode_gwp->error;

        // echo "<pre>";print_r($err_gcp);exit();
        // $tokenresult = $this->session->userdata('token_api');
        // $tokenresult = $this->study_progress->GenerateToken();
        //
        // $gsp = $this->study_progress->GetStudyProgress($tokenresult);
        // $gcp = $this->study_progress->GetCurrentProgress($tokenresult);
        // $gwp = $this->study_progress->GetWeeklyProgress($tokenresult);
        //
        // $check_study_data = $this->db->select('user_id')
        //                   ->from('b2c_student_progress')
        //                   ->where('user_id',$id)
        //                   ->get()->result();
        //
        // echo "<pre>";print_r($this->session->userdata('u_p'));exit();
        // if(@$check_study_data){
        //   $array_study = array(
        //     'json_gsp' => $gsp,
        //     'json_gcp' => $gcp,
        //     'json_gwp' => $gwp
        //   );
        //
        //   $this->db->where('user_id', $id);
        //   $this->db->update('b2c_student_progress', $array_study);
        // }else{
        //   $array_study = array(
        //     'json_gsp' => $gsp,
        //     'json_gcp' => $gcp,
        //     'json_gwp' => $gwp,
        //     'user_id' => $id
        //   );
        //
        //   $this->db->insert('b2c_student_progress', $array_study);
        //
        //   // exit();
        // }
        //save study data ------------------------------------------
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
            ->where('user_id', $id)
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
                      ->where($tipe, $id)
                      ->where('date =', $nowdate)
                      ->where('end_time >=', $hour_start_db)
                      ->where('status', 'active')
                      ->order_by('date', 'ASC')
                      ->order_by('start_time', 'ASC')
                      // ->limit(5)
                      ->get()->result();

        $pull_appoint2 = $this->db->select('*')
                      ->from('appointments')
                      ->where($tipe, $id)
                      ->where('date =', $nowdate)
                      ->where('end_time >=', $hour_start_db)
                      ->where('status', 'active')
                      ->order_by('date', 'ASC')
                      ->order_by('start_time', 'ASC')
                      // ->limit(5)
                      ->get()->result();

        $pull_appoint3 = $this->db->select('*')
                      ->from('appointments')
                      ->where($tipe, $id)
                      ->where('date >', $nowdate)
                      ->where('status', 'active')
                      ->or_where($tipe, $id)
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
        // $data = $this->appointment_model->get_appointment_for_upcoming_session('student_id','','',  $this->auth_manager->userid());
        $data_class = $this->class_member_model->get_appointment_for_upcoming_session('', '', $this->auth_manager->userid());

        if ($data) {
            foreach ($data as $d) {
                $data_schedule = $this->convertBookSchedule($this->identity_model->new_get_gmt($this->auth_manager->userid())[0]->minutes, strtotime($d->date), $d->start_time, $d->end_time);
                $d->date = date('Y-m-d', $data_schedule['date']);
                $d->start_time = $data_schedule['start_time'];
                $d->end_time = $data_schedule['end_time'];

            }
        }

        if ($data_class) {
            foreach ($data_class as $d) {
                // echo date('H:i:s');
                // exit();
                $data_schedule = $this->convertBookSchedule($this->identity_model->new_get_gmt($this->auth_manager->userid())[0]->minutes, strtotime($d->date), $d->start_time, $d->end_time);
                // print_r($data_schedule);
                // echo date('H:i:s');
                // exit();

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
        // wimo----------------------
        $wm2         = @$pull_appoint2[0];
        $he_pull2    = strtotime(@$wm2->end_time) - (5 * 60);
        $hourend2    = date("H:i:s", $he_pull2);

        $n;

        if (strtotime(date("H:i:s")) > strtotime($hourend2)) {
            $n = 1;
        }else{
            $n = 0;
        }

        // echo "<pre>";print_r($n);exit();

        $wm   = @$pull_appoint[$n];
        $wm_id = @$wm->id;
        //User Hour
        date_default_timezone_set('UTC');
        $hourstart  = @$wm->start_time;
        $datestart  = @$wm->date;
        $he_pull    = strtotime(@$wm->end_time) - (5 * 60);
        $hourend    = date("H:i:s", $he_pull);

        // echo "<pre>";print_r($hourend);exit();
        $date     = date('h:i:s');
        $default2 = strtotime($date);
        $usertime2 = $default2+(60*$minutes);
        $nowh  = date("H:i:s", $usertime2);
        // $nowh  = "09:40:01";
        $dates     = date('Y-m-d h:i:s');
        $def       = strtotime($dates);
        $datetime  = $def+(60*$minutes);
        $nowd      = date("Y-m-d", $datetime);


        $nowc  = $nowd.' '.$nowh;
        $countdown = $datestart.' '.$hourstart;

        // wimo----------------------

        //Check Already Opened Live Session -------------------------------
        $checksess = $this->db->select('*')
                    ->from('session_live')
                    ->where('user_id', $id)
                    ->where('appointment_id', $wm_id)
                    ->get()->result();

        $statuscheck = @$checksess[0]->status;

        // echo "<pre>";print_r($nowdate);exit();
        //Check Already Opened Live Session -------------------------------

        $pull_notif = $this->db->select('*')
                      ->from('user_notifications')
                      ->where('user_id', $id)
                      ->get()->result();

        $pull_name = $this->db->select('*')
                      ->from('user_profiles')
                      ->where('user_id', $id)
                      ->get()->result();

        if(!$pull_notif){

            $user_notification = array(
                'user_id' => $id,
                'description' => 'Congratulations and Welcome to neo LIVE, '.$pull_name[0]->fullname.'!',
                'status' => 2,
                'dcrea' => time(),
                'dupd' => time(),
            );

            $this->user_notification_model->insert($user_notification);
        }

        $sp_difftime_updated_unix = strtotime($hour_start_db) - strtotime(@$last_upd_time);
        $sp_difftime_updated = date("H", $sp_difftime_updated_unix);
        // echo "<pre>";print_r($sp_difftime_updated);exit();

        $userdata = $this->session->userdata;
    		$isWebVal = $userdata['isWebview'];

        $coach_id = @$wm->coach_id;

        $data_ch = $this->identity_model->get_coach_identity($coach_id);

        $ch_name = $data_ch[0]->fullname;
        $ch_spoken_language = $data_ch[0]->spoken_language;
        $ch_gender = $data_ch[0]->gender;
        $ch_profile_picture = $data_ch[0]->profile_picture;

        $vars = array(
            'title' => 'Upcoming Session',
            'role'  => 'Coach',
            'userid'    => $id,
            'wm'    => $wm,
            'nowh'  => $nowh,
            'data'  => $data,
            'dataupcoming' => $dataupcoming,
            'nowd'  => $nowd,
            'nowc'  => $nowc,
            'wm_id' => $wm_id,
            'gmt_val' => @$gmt_val,
            'statuscheck'  => @$statuscheck,
            'hourend'    => $hourend,
            'hourstart'  => $hourstart,
            'hour_start_db'  => $hour_start_db,
            'data_class' => $data_class,
            'countdown'  => $countdown,
            'last_upd_date'  => @$last_upd_date,
            'last_upd_time'  => @$last_upd_time,
            'sp_difftime_updated'  => $sp_difftime_updated,
            'id_to_name' => $this->identity_model->get_identity('profile')->dropdown('user_id', 'fullname'),
            'err_gcp' => @$err_gcp,
            'err_gsp' => @$err_gsp,
            'err_gwp' => @$err_gwp,
            'isWebVal' => @$isWebVal,
            'ch_name' => $ch_name,
            'ch_spoken_language' => $ch_spoken_language,
            'ch_gender' => $ch_gender,
            'ch_profile_picture' => $ch_profile_picture,
        );

        // echo "<pre>ch_";print_r($vars);exit();
        $this->template->content->view('contents/b2c/student/dashboard_wa/index',$vars);
        $this->template->publish();
    }

    public function get_id(){
        $id  = $this->auth_manager->userid();

        $tz = $this->db->select('*')
            ->from('user_timezones')
            ->where('user_id', $id)
            ->get()->result();

        $minutes = @$tz[0]->minutes_val;

        $tipe = '';
        if($this->auth_manager->role() == "STD"){
            $tipe = 'student_id';
        } else if($this->auth_manager->role() == "CCH"){
            $tipe = 'coach_id';
        }

        $nowdate  = date("Y-m-d");
        // $nowd  = "2016-08-21";
        $hour_start_db  = date('H:i:s');
        // $hour_start_db  = "02:40:01";
        // print_r($hour_start_db);
        // exit();
        $pull_appoint = $this->db->select('*')
                      ->from('appointments')
                      ->where($tipe, $id)
                      ->where('date =', $nowdate)
                      ->where('end_time >=', $hour_start_db)
                      ->where('status', 'active')
                      ->order_by('date', 'ASC')
                      ->order_by('start_time', 'ASC')
                      // ->limit(5)
                      ->get()->result();


        $he_pull2    = strtotime(@$pull_appoint[0]->end_time) - (5 * 60);
        $hourend2    = date("H:i:s", $he_pull2);

        $n;

        if (strtotime(date("H:i:s")) > strtotime($hourend2)) {
            $n = 1;
        }else{
            $n = 0;
        }

        $wm    = @$pull_appoint[$n];
        $wm_id = @$wm->id;
        echo $wm_id;
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

    public function clear_live(){
        $id    = $this->auth_manager->userid();

        $this->db->where('user_id', $id);
        $this->db->delete('session_live');
    }

    public function update_studyprog(){
      $id    = $this->auth_manager->userid();

      $time  = date('H:i:s');
      $date  = date('Y-m-d');

      if($this->session->userdata('u_u') != NULL && $this->session->userdata('u_p') != NULL){

        $tokenresult = $this->study_progress->GenerateToken();

        $gsp = $this->study_progress->GetStudyProgress($tokenresult);
        $gcp = $this->study_progress->GetCurrentProgress($tokenresult);
        $gwp = $this->study_progress->GetWeeklyProgress($tokenresult);

        $check_study_data = $this->db->select('user_id')
                          ->from('b2c_student_progress')
                          ->where('user_id',$id)
                          ->get()->result();

        // echo "<pre>";print_r($gsp);exit();
        if(@$check_study_data){
          $check_gsp = @$gsp->data->certification_level;
          $check_gcp = @$gcp->data->certification_level;
          $check_gwp = @$gwp->status;

          if(empty(@$check_gsp) || empty(@$check_gcp) || empty(@$check_gwp)){
            $array_study = array(
              'json_gsp' => $gsp,
              'json_gcp' => $gcp,
              'json_gwp' => $gwp,
              'updated_date' => $date,
              'updated_time' => $time
            );
            $this->db->where('user_id', $id);
            $this->db->update('b2c_student_progress', $array_study);
          }
        }else{
          $array_study = array(
            'json_gsp' => $gsp,
            'json_gcp' => $gcp,
            'json_gwp' => $gwp,
            'user_id' => $id,
            'updated_date' => $date,
            'updated_time' => $time
          );

          $this->db->insert('b2c_student_progress', $array_study);

          // exit();
        }

        // echo "string";
      }else{}

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


}
