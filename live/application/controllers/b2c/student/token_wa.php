<?php

/**
 * Class    : Histories.php
 * Author   : Ponel Panjaitan (ponel@pistarlabs.co.id)
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Token_wa extends MY_Site_Controller {

    // Constructor
    public function __construct() {
        parent::__construct();

        // Loading models
        $this->load->model('token_histories_model');
        $this->load->model('token_request_model');
        $this->load->model('identity_model');
        $this->load->library('schedule_function');
        $this->load->model('user_model');
        $this->load->model('user_token_model');
        $this->load->model('specific_settings_model');
        $this->load->model('global_settings_model');
        // for messaging action and timing
        $this->load->library('queue');
        $this->load->library('email_structure');
        $this->load->library('send_email');

        // Checking user role and giving action
        if (!$this->auth_manager->role() || $this->auth_manager->role() != 'STD') {
            $this->messages->add('ERROR');
            redirect('home');
        }
    }

    public function index($page=''){
        $this->template->title = 'Student Token';
        $date_from = strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-12 month");

        $offset = 0;
        $per_page = '';
        $uri_segment = 4;
        $histories = $this->token_histories_model->get_token_histories_for_student($date_from, time(), '', $offset);

        $id    = $this->auth_manager->userid();
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
        $hour_start_db  = date('H:i:s');

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

        $datasession = @$pull_appoint;

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

        $pull_used_t = $this->db->select('token_amount')
                      ->from('token_histories')
                      ->where('user_id', $id)
                      ->where('token_status_id', 1)
                      ->get()->result();

        $used_tokens = 0;
        foreach($pull_used_t as $key){
           $used_tokens+= $key->token_amount;
        }

        $ts_id = array('13', '21', '23');
        $pull_refu_t = $this->db->select('token_amount')
                      ->from('token_histories')
                      ->where('user_id', $id)
                      ->where_in('token_status_id', $ts_id)
                      ->get()->result();

        $refu_tokens = 0;
        foreach($pull_refu_t as $key){
           $refu_tokens+= $key->token_amount;
        }
        // echo $sum;

        // echo "<pre>";print_r($refu_tokens);exit();

        $vars = array(
            'histories' => $histories,
            'start_date' => date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-2 month")),
            'minutes' => $minutes,
            'data' => $this->token_request_model->select('id, token_amount')->where('user_id', $this->auth_manager->userid())->where('status', 'requested')->get(),
            'remain_token' => $this->identity_model->select('id, token_amount')->get_identity('token')->where('user_id', $this->auth_manager->userid())->get(),
            'datasession' => $datasession,
            'used_token' => $used_tokens,
            'refu_token' => $refu_tokens
        );



        $this->template->content->view('contents/b2c/student/token_wa/index', $vars);
        $this->template->publish();
    }

    public function search($page=''){
        $this->template->title = 'Student Token';

        if($this->input->post('date_from') && $this->input->post('date_to')){
            $this->session->set_userdata('date_from', $this->input->post('date_from'));
            $this->session->set_userdata('date_to', $this->input->post('date_to'));
        }
        $rules = array(
            array('field'=>'date_from', 'label' => 'Start Date', 'rules'=>'trim|required|xss_clean'),
            array('field'=>'date_to', 'label' => 'End Date', 'rules'=>'trim|required|xss_clean')
        );
        if(($this->input->post('__submit'))){
            if (!$this->common_function->run_validation($rules)) {
                $this->messages->add(validation_errors(), 'warning');
                    redirect('student/token_wa');
            }
        }

        $date_from = ($this->input->post('date_from') ? $this->input->post('date_from') : $this->session->userdata('date_from'));
        $date_to = ($this->input->post('date_to') ? $this->input->post('date_to') : $this->session->userdata('date_to'));

        if(!$date_from || !$date_to || $date_from > $date_to){
            $this->messages->add('Invalid time period', 'danger');
            redirect('student/token_wa');
        }

        $stringdate = strtotime($date_to);
        $stringdatetoday = $stringdate+85399;

        $offset = 0;
        $per_page = 5;
        $uri_segment = 4;
        $pagination = $this->common_function->create_link_pagination($page, $offset, site_url('student/token_wa/search'), count($this->token_histories_model->get_token_histories_for_student(strtotime($date_from), $stringdatetoday)), $per_page, $uri_segment);
        $histories = $this->token_histories_model->get_token_histories_for_student(strtotime($date_from), $stringdatetoday, $per_page, $offset);

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
            'histories' => $histories,
            'start_date' => date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-2 month")),
            'pagination' => @$pagination,
            'minutes' => $minutes
        );

        $this->template->content->view('default/contents/student/token_wa/index', $vars);
        $this->template->publish();
    }

    public function create() {
        date_default_timezone_set('Etc/GMT+0');

        if (!$this->input->post('token_amount') || $this->input->post('token_amount') <=0) {
            $this->messages->add('Token Request Value Must be More than Zero', 'Warning');
            redirect('b2c/student/token_wa');
        }

        $req_token = $this->input->post('token_amount');

        // $get_idsp = $this->db->select('id_student_supplier')->from('student_supplier_to_student')->where('id_student',$this->auth_manager->userid())->get()->result();
        $get_idsp = $this->db->select('creator_id')->from('creator_members')->where('member_id',$this->auth_manager->userid())->get()->result();

        if(!$get_idsp){
            $this->messages->add('Invalid action', 'danger');
            redirect('b2c/student/token_wa');
        }
        $idsp = $get_idsp[0]->creator_id;

        $partner_id = $this->auth_manager->partner_id($idsp);


        // check status token
        $ctr = $this->db->select('id')
                        ->from('token_requests')
                        ->where('user_id',$this->auth_manager->userid())
                        ->where('status','requested')
                        ->get()->result();
        if($ctr){
            $this->messages->add('Sorry, your has already request token', 'warning');
            redirect('b2c/student/token_wa');
        }

        $partner = $this->user_model->select('id, email')->where('id', $idsp)->get_All();
        $emailpartner = $partner[0]->email;
        $user = $this->user_profile_model->select('user_id, fullname')->where('user_id', $this->auth_manager->userid())->get_All();
        $userfullname = $user[0]->fullname;
        $users = $this->user_model->select('email')->where('id', $this->auth_manager->userid())->get();
        $useremail = $users->email;


        // check token user
        $check_token = $this->user_token_model->get_token($this->auth_manager->userid(),'user');
        $user_token = $check_token[0]->token_amount;
        $total_req_token = $req_token+$user_token;

        // check apakah status setting region allow atau disallow
        $region_id = $this->auth_manager->region_id($partner_id);

        $get_status_setting_region = $this->specific_settings_model->get_specific_settings($region_id,'region');

        $max_token_for_student = '';
        if($get_status_setting_region[0]->status_set_setting == 0){
            $get_setting = $this->global_settings_model->get_partner_settings();
            $max_token_for_student = $get_setting[0]->max_token_for_student;
        } else {
            $get_setting = $this->specific_settings_model->get_partner_settings($partner_id);
            $max_token_for_student = $get_setting[0]->max_token_for_student;
        }

        if($max_token_for_student < $total_req_token){
            $this->messages->add('Sorry, your request token exceeded max token', 'warning');
            redirect('b2c/student/token_wa');
        }


        $partner = $this->user_model->select('id, email')->where('id', $idsp)->get_All();
        $emailpartner = $partner[0]->email;
        $user = $this->user_profile_model->select('user_id, fullname')->where('user_id', $this->auth_manager->userid())->get_All();
        $userfullname = $user[0]->fullname;

        // inserting user data
        $token_request = array(
            'approve_id' => $idsp,
            'user_id' => $this->auth_manager->userid(),
            'token_amount' => $this->input->post('token_amount'),
            'status' => 'requested',
        );

        $get_token_user = $this->db->select('token_amount')
                                   ->from('user_tokens')
                                   ->where('user_id',$this->auth_manager->userid())
                                   ->get()->result();
        $token_balance = $get_token_user[0]->token_amount;


        // insert to token history
        $data_token_history = array('user_id' => $this->auth_manager->userid(),
                               'transaction_date' => time(),
                               'token_amount' => $this->input->post('token_amount'),
                               'description' => 'Request token',
                               'token_status_id' => 17,
                               'balance' => $token_balance,
                               'dcrea' => time(),
                               'dupd' => time());

        // Inserting and checking to partner table
        $this->db->trans_begin();
        $this->db->insert('token_histories',$data_token_history);

        if (!$this->token_request_model->insert($token_request)) {
            $this->db->trans_rollback();
            $this->messages->add(validation_errors(), 'danger');
            redirect('student/token_wa_requests');
        }
        else {
            // messaging partner
            // $this->messaging_partner('requested');
        }
            $this->db->trans_commit();

                    // notification
            $get_name = $this->db->select('user_profiles.fullname as fullname, users.email as email')->from('user_profiles')->join('users','users.id = user_profiles.user_id')->where('user_profiles.user_id',$this->auth_manager->userid())->get()->result();
            $fullname = $get_name[0]->fullname;


            // =============
            if($idsp){
                $partner_notification = array(
                    'user_id' => $idsp,
                    'description' => $fullname.' request for additional token. Please Approve/Decline.',
                    'status' => 2,
                    'dcrea' => time(),
                    'dupd' => time(),
                );
                // coach's data for reminder messaging
                // IMPORTANT : array index in content must be in mutual with table field in database
                $data_partner = array(
                    'table' => 'user_notifications',
                    'content' => $partner_notification,
                );
            }

             $partnername = $this->user_profile_model->select('user_id, fullname')->where('user_id', $idsp)->get_All();
             $name_partner = $partnername[0]->fullname;

            $this->user_notification_model->insert($partner_notification);
            $this->send_email->student_request($emailpartner, $this->input->post('token_amount'), $userfullname, 'requested', $name_partner);
            $this->send_email->add_token_student($useremail, $this->input->post('token_amount'), 'requested');


        // =======

        $this->messages->add('Request Token Succeeded', 'success');
        redirect('b2c/student/token_wa');
    }

    public function cancel() {
        $data = array(
            'status' => 'cancelled',
        );

        $id = $this->isRequested();
        if ($id) {
            //get token
            $get_token = $this->token_request_model->select('token_requests.token_amount as token_amount, users.email as email')->join('users','users.id = token_requests.user_id')->where('token_requests.id',$id)->where('token_requests.status','requested')->get();

                // update tken history

                $data_token_history = array('description' => 'Cancel request token',
                           'token_status_id' => 19,
                           'dupd' => time());

                $this->db->where('user_id', $this->auth_manager->userid());
                $this->db->where('token_status_id', 17);
                $this->db->update('token_histories', $data_token_history);

                $this->db->flush_cache();
            $this->token_request_model->update($id, $data);
            // messaging partner
             $get_idsp = $this->db->select('id_student_supplier')->from('student_supplier_to_student')->where('id_student',$this->auth_manager->userid())->get()->result();
            if(!$get_idsp){
                $this->messages->add('Invalid action', 'danger');
                redirect('b2c/student/token_wa');
            }

            $idsp = $get_idsp[0]->id_student_supplier;

            $partnername = $this->user_profile_model->select('user_id, fullname')->where('user_id', $idsp)->get_All();
            $name_partner = $partnername[0]->fullname;

            $partner = $this->user_model->select('id, email')->where('id', $idsp)->get_All();
            $emailpartner = $partner[0]->email;
            $user = $this->user_profile_model->select('user_id, fullname')->where('user_id', $this->auth_manager->userid())->get_All();
            $userfullname = $user[0]->fullname;
            $users = $this->user_model->select('email')->where('id', $this->auth_manager->userid())->get();
            $useremail = $users->email;

            $this->send_email->student_request($emailpartner, $get_token->token_amount, $userfullname, 'cancelled', $name_partner);
            $this->send_email->add_token_student($useremail, $get_token->token_amount, 'cancelled');

            $this->messages->add('Request Token Cancelled', 'success');
            redirect('b2c/student/token_wa');

        }
        else {
            $this->messages->add('Invalid Action', 'danger');
            redirect('b2c/student/token_wa');
        }
    }

    function isRequested() {
        $id = $this->token_request_model->where('user_id', $this->auth_manager->userid())->where('status', 'requested')->get();
        return (@$id->id);
    }

}
