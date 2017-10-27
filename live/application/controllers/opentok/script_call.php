<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'vendor/autoload.php';

class Script_call extends MY_Site_Controller {

    // Constructor
    public function __construct() {
        parent::__construct();
        $this->load->model('appointment_model');
        $this->load->model('class_member_model');
        $this->load->model('user_model');
        $this->load->library('Auth_manager');
        $this->load->library('call1');
        $this->load->library('call2');
        $this->load->model('coaching_script_model');
    }

    // Index
    public function call_ajax() {
        // $std_id_for_cert = isset($_POST['std_id']);
        $std_id_for_cert=$this->input->post('std_id');

        $get_gl_users = $this->db->select('cl_id')
                ->from('users')
                ->where('id', $std_id_for_cert)
                ->get()->result();

        $id_gl_users = $get_gl_users[0]->cl_id+1;

        $get_gl_dsa = $this->db->select('cl_name')
                ->from('dsa_cert_levels')
                ->where('cl_id', $id_gl_users)
                ->get()->result();

        $script = $this->db->distinct()
                ->select('s.unit')
                ->from('coaching_scripts cs')
                ->join('script s', 's.id = cs.script_id')
                ->where('cs.user_id', $std_id_for_cert)
                ->where('s.certificate_plan', $get_gl_dsa)
                ->get()->result();

        if(!@$script){
            $scripts = $this->db->select('*')
              ->from('script')
              ->where('certificate_plan', $student_cert)
              ->get()->result();

            $script_total = count($scripts);
            $data =array();
            $n = 0;

            // echo "<pre>";print_r($scripts);exit();

            for($i=0; $i < $script_total; $i++)
            {
                @$datascript[$i] = array(
                'user_id'   => $std_id_for_cert,
                'script_id' => $scripts[$n]->id,
                'cert_plan' => $student_cert,
                'status'    => '0'
                );
                $n++;
            }


            $this->db->insert_batch('coaching_scripts', @$datascript);


        }

        $bag = $this->db->select('*')
             ->from('bag_of_tricks')
             ->get()->result();
        $content = $bag['0']->content;




    $data = array(
          'content'   => @$content,
          'script'    => @$script,
          'student_vrm'    => @$student_vrm,
          'std_id_for_cert'  => @$std_id_for_cert,
          'student_vrm_json' => @$student_vrm_json
    );
    // echo "<pre>";print_r($script);exit();

    $this->load->view('contents/opentok/call_loader_view_script', $data);


}
