<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'vendor/autoload.php';

use OpenTok\OpenTok;
use OpenTok\ArchiveMode;
use OpenTok\MediaMode;
use OpenTok\Session;
use OpenTok\Role;

class Checkrecord extends MY_Site_Controller {

    // Constructor
    public function __construct() {
        parent::__construct();
        $this->load->model('appointment_model');
        $this->load->model('class_member_model');
        $this->load->library('downloadrecord');
        //checking user role and giving action
    }

    // Index
    public function index() {
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
                $note = "<span class='trn' data-trn-key='norecorded'> No recorded session. Both student and coach didn't attend the session.</span>";
            }else{
                $note = "<span class='trn' data-trn-key='downloadex'>This download link has expired. Recordings are only available for 72 hours after session.</span>";
            }
        }else{
            $note = "<span class='trn' data-trn-key='recordinglinks'>Recording links are only available for 72 hours after end of session.</span>";
        }

        $check = array(
            'status' => @$stat,
            'note'   => @$note,
            'downloadurl'   => @$downloadurl
        );

        // echo "<pre>";print_r($check);exit();

        $this->template->title = "Download Record";
        $this->template->content->view('contents/opentok/checkrecord', $check);
        $this->template->publish();
    }


}
