<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class reporting extends MY_Site_Controller {

    // Constructor
    public function __construct() {
        parent::__construct();

        $this->load->model('user_model');
        $this->load->model('identity_model');
        $this->load->model('user_geography_model');
        $this->load->model('region_model');
        $this->load->model('subgroup_model');
        $this->load->model('schedule_model');
        $this->load->model('offwork_model');
        $this->load->model('coach_token_cost_model');
        $this->load->model('creator_member_model');
        $this->load->model('user_education_model');
        $this->load->model('timezone_model');

        // for messaging action and timing
        $this->load->library('queue');
        $this->load->library('common_function');
        
        //checking user role and giving action
        if (!$this->auth_manager->role() || $this->auth_manager->role() != 'PRT') {
            $this->messages->add('Access Denied');
            redirect('account/identity/detail/profile');
        }
    }
    
        function generateRandomString($length = 5) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }
    

    public function index() {
        
        $this->template->title = 'Reporting';
        $partner = $this->auth_manager->partner_id();
        $coach = $this->db->select('*')
                            ->from('user_profiles up')
                            ->join('users u', 'u.id = up.user_id')
                            ->join('user_tokens ut', 'ut.user_id = up.user_id')
                            ->join('subgroup s', 's.id = up.subgroup_id')
                            ->where('u.role_id', 2)
                            ->where('u.status', 'active')
                            ->where('s.partner_id', $partner)
                            ->get()->result();
        
        // $vars = array(
        //     'coach' => $coach,
        //     // 'minutes' => $minutes
        //     );

        // $partner_id = $this->auth_manager->partner_id();

        $list_sg = $this->db->select('*')
                         ->from('subgroup')
                         ->where('partner_id',$partner)
                         ->where('type','coach')
                         ->get()->result();

        $vars = array(
            'list_sg' => $list_sg,
            'coach' => $coach
        );
        // echo "<pre>";
        // print_r($vars);exit();
        $this->template->content->view('default/contents/partner/reporting/index', $vars);
        $this->template->publish();
    
    }

    public function search() {
        $startdate = $this->input->post('date_from');
        $enddate = $this->input->post('date_to');
        if($this->input->post('date_from') && $this->input->post('date_to')){
            $this->session->set_userdata('date_from', $this->input->post('date_from'));
            $this->session->set_userdata('date_to', $this->input->post('date_to'));
        }
        
        $rules = array(
            array('field'=>'date_from', 'label' => 'Date From', 'rules'=>'trim|required|xss_clean'),
            array('field'=>'date_to', 'label' => 'Date To', 'rules'=>'trim|required|xss_clean')
        );

        if(($this->input->post('__submit')))
    {
        if (!$this->common_function->run_validation($rules)) {
            $this->messages->add(validation_errors(), 'warning');
            redirect('partner/reporting');
            
        }
    }
        
        $partner = $this->auth_manager->partner_id();
        $partnername = $this->db->select('name')->from('partners')->where('id', $partner)->get()->result();
        $name = $partnername[0]->name;
        $coach = $this->db->select('up.user_id, up.fullname, s.name, ut.minutes_val, ut.gmt_val')
                            ->from('user_profiles up')
                            ->join('users u', 'u.id = up.user_id')
                            ->join('subgroup s', 's.id = up.subgroup_id')
                            ->join('user_timezones ut', 'up.user_id = ut.user_id')
                            ->where('u.role_id', 2)
                            ->where('u.status', 'active')
                            ->where('s.partner_id', $partner)
                            ->get()->result();
        
            $vars = array(
            'coach' => $coach,
            'startdate' => $startdate,
            'enddate' => $enddate,
        );
        $this->template->content->view('default/contents/partner/reporting/index', $vars);

        //publish template
        $this->template->publish();
    }

    public function download($startdate='', $enddate=''){

        $partner = $this->auth_manager->partner_id();
        $partnername = $this->db->select('name')->from('partners')->where('id', $partner)->get()->result();
        $name = $partnername[0]->name;
        if($this->uri->segment(4) == ''){
                        $file = $name.'`s Late Coach Until Now';
                    }else{
                        $file = $name.'`s Late Coach From '.$startdate.' To '.$enddate.'';  
                    }
        $coach = $this->db->select('up.user_id, up.fullname, s.name, ut.minutes_val, ut.gmt_val')
                            ->from('user_profiles up')
                            ->join('users u', 'u.id = up.user_id')
                            ->join('subgroup s', 's.id = up.subgroup_id')
                            ->join('user_timezones ut', 'up.user_id = ut.user_id')
                            ->where('u.role_id', 2)
                            ->where('u.status', 'active')
                            ->where('s.partner_id', $partner)
                            ->get()->result();
        
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=$file.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo '<table border="1">
        <thead>
          <tr>
            <th>Coach Name</th>
            <th>Subgroup</th>
            <th>Appointment Date</th>
            <th>Start Time</th>
            <th>Coach Attendance</th>
          </tr>
        </thead>
        <tbody>';
        foreach(@$coach as $c) { 
            if($this->uri->segment(4) == ''){
                        $data = $this->db->select('id, coach_id, date, start_time, cch_attend')->from('appointments')->where('coach_id', $c->user_id)->where('status', 'completed')->get()->result();  
                    }else{
                        $data = $this->db->select('id, coach_id, date, start_time, cch_attend')->from('appointments')->where('coach_id', $c->user_id)->where('status', 'completed')->where('date BETWEEN "'. date('Y-m-d', strtotime($startdate)). '" and "'. date('Y-m-d', strtotime($enddate)).'"')->get()->result();
                    }
                        foreach(@$data as $d) { 
                    $minutes = $c->minutes_val;
                    $cch_att_dif = strtotime($d->cch_attend) - strtotime($d->start_time);
                    $cch_att_val = date("H:i:s", $cch_att_dif);
                    if($cch_att_dif > '300'){ ; echo '
          <tr>
            <td>';echo $c->fullname; echo '</td>
            <td>';echo $c->name; echo '</td>
            <td>';echo $d->date; echo '</td>
            <td>';  $defaultstart  = strtotime($d->start_time);
                    $usertimestart = $defaultstart+(60*$minutes);
                    $hourattstart  = date("H:i", $usertimestart); echo $hourattstart; echo '</td>
            <td>';  $defaultattend  = strtotime($d->cch_attend);
                    $usertimeattend = $defaultattend+(60*$minutes);
                    $hourattend  = date("H:i", $usertimeattend); echo $hourattend; echo '</td>
          </tr>';
      } } } echo '
          </tbody>
        </table>';
    }

    public function coach_token() {
        $this->template->title = 'Reporting Token';
        $partner = $this->auth_manager->partner_id();
        $coach = $this->db->select('up.user_id')
                            ->from('user_profiles up')
                            ->join('users u', 'u.id = up.user_id')
                            ->join('subgroup s', 's.id = up.subgroup_id')
                            ->where('u.role_id', 2)
                            ->where('u.status', 'active')
                            ->where('s.partner_id', $partner)
                            ->get()->result();
        $vars = array(
            'coach' => $coach
            );
        $this->template->content->view('default/contents/partner/reporting/token', $vars);
        $this->template->publish();
    }

    public function search_token() {
        $startdate = $this->input->post('date_from');
        $enddate = $this->input->post('date_to');
        if($this->input->post('date_from') && $this->input->post('date_to')){
            $this->session->set_userdata('date_from', $this->input->post('date_from'));
            $this->session->set_userdata('date_to', $this->input->post('date_to'));
        }
        
        $rules = array(
            array('field'=>'date_from', 'label' => 'Date From', 'rules'=>'trim|required|xss_clean'),
            array('field'=>'date_to', 'label' => 'Date To', 'rules'=>'trim|required|xss_clean')
        );

        if(($this->input->post('__submit')))
    {
        if (!$this->common_function->run_validation($rules)) {
            $this->messages->add(validation_errors(), 'warning');
            redirect('partner/reporting');
            
        }
    }
        
        $partner = $this->auth_manager->partner_id();
        $partnername = $this->db->select('name')->from('partners')->where('id', $partner)->get()->result();
        $name = $partnername[0]->name;
        $coach = $this->db->select('up.user_id')
                            ->from('user_profiles up')
                            ->join('users u', 'u.id = up.user_id')
                            ->join('subgroup s', 's.id = up.subgroup_id')
                            ->where('u.role_id', 2)
                            ->where('u.status', 'active')
                            ->where('s.partner_id', $partner)
                            ->get()->result();
        
            $vars = array(
            'coach' => $coach,
            'startdate' => $startdate,
            'enddate' => $enddate,
        );
        $this->template->content->view('default/contents/partner/reporting/token', $vars);

        //publish template
        $this->template->publish();
    }

    public function download_token($startdate='', $enddate=''){

        $partner = $this->auth_manager->partner_id();
        $partnername = $this->db->select('name')->from('partners')->where('id', $partner)->get()->result();
        $name = $partnername[0]->name;
        if($this->uri->segment(4) == ''){
                        $file = $name.'`s Coach Token Histories Until Now';
                    }else{
                        $file = $name.'`s Coach Token Histories '.$startdate.' To '.$enddate.'';  
                    }
        $coach = $this->db->select('up.user_id')
                            ->from('user_profiles up')
                            ->join('users u', 'u.id = up.user_id')
                            ->join('subgroup s', 's.id = up.subgroup_id')
                            ->where('u.role_id', 2)
                            ->where('u.status', 'active')
                            ->where('s.partner_id', $partner)
                            ->get()->result();
        
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=$file.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo '<table border="1">
        <thead>
        <tr>
            <th rowspan="2" class="padding15">COACH</th>
            <th rowspan="2" class="padding15">STUDENT</th>
            <th rowspan="2" class="padding15">TRANSACTION</th>
            <th rowspan="2" class="padding15">TIME</th>
            <th rowspan="2" class="padding15">STATUS</th>
            <th colspan="3" class="padding15">TOKEN</th>
            <!-- <th class="padding15">BALANCE</th> -->
        </tr>
        <tr>
            <td class="font-16 bordered-l text-center">DEBIT</td>
            <td class="font-16 bordered-m text-center">CREDIT</td>
            <td class="font-16 bordered-r text-center">BALANCE</td>
        </tr>
        </thead>
        <tbody>';
        foreach (@$coach as $c) {
                if($this->uri->segment(4) == ''){
                    $token_hist_pull = $this->db->select('thc.coach_id, thc.flag, thc.student_name, thc.description, thc.date, thc.time, thc.token_amount, thc.appointment_id, thc.upd_token, up.fullname, ut.minutes_val, ut.gmt_val')
                                        ->from('token_histories_coach thc')
                                        ->join('user_profiles up', 'up.user_id = thc.coach_id')
                                        ->join('user_timezones ut', 'ut.user_id = thc.coach_id')
                                        ->where('thc.coach_id', $c->user_id)
                                        ->order_by('thc.date', 'desc')
                                        ->order_by('thc.time', 'desc')
                                        ->get()->result();
                }else{
                    $token_hist_pull = $this->db->select('thc.coach_id, thc.flag, thc.student_name, thc.description, thc.date, thc.time, thc.token_amount, thc.appointment_id, thc.upd_token, up.fullname, ut.minutes_val, ut.gmt_val')
                    ->from('token_histories_coach thc')
                    ->join('user_profiles up', 'up.user_id = thc.coach_id')
                    ->join('user_timezones ut', 'ut.user_id = thc.coach_id')
                    ->where('thc.coach_id', $c->user_id)
                    ->where('thc.date BETWEEN "'. date('Y-m-d', strtotime($startdate)). '" and "'. date('Y-m-d', strtotime($enddate)).'"')
                    ->order_by('thc.date', 'desc')
                    ->order_by('thc.time', 'desc')
                    ->get()->result();
                }
                        foreach (@$token_hist_pull as $history) { 
                        $gmt_user = $this->identity_model->new_get_gmt($history->coach_id);
                        $new_gmt = 0;
                                if($gmt_user[0]->gmt > 0){
                                    $new_gmt = '+'.$gmt_user[0]->gmt;
                                }else{
                                    $new_gmt = $gmt_user[0]->gmt;    
                                } ; echo '
          <tr>
            <td>';echo $history->fullname; echo '</td>
            <td>';echo $history->student_name; echo '</td>
            <td>';echo $history->date; echo '</td>
            <td>';echo $history->time; echo '</td>
            <td>';if($history->token_amount == 0){ echo "Coach is late"; } else { echo "Successful"; } echo '</td>
            <td>';echo '</td>
            <td>';echo $history->token_amount; echo '</td>
            <td>';echo $history->upd_token; echo '</td>
          </tr>';
      } } echo '
          </tbody>
        </table>';
    }

}