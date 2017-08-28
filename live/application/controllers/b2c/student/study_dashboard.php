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
        $this->load->model('social_media_model');
        $this->load->model('timezone_model');

        $this->load->library('common_function');
    }

    // Index
    public function index() {
      $id = $this->auth_manager->userid();
      $this->template->title = "Study Dashboard";


      $vars = array(
          // 'name_region' => @$name_region,
      );

      // echo $key;
      // echo('<pre>');print_r($vars); exit;
      $this->template->content->view('contents/b2c/student/study_dashboard/index',$vars);
      $this->template->publish();
    }

    public function upd_text(){
        $id          = $this->auth_manager->userid();
        $fieldType   = $this->input->post("elPrev");
        $updatedVal  = $this->input->post("updatedVal");

        $mod_val = '';

        if($fieldType == 'City'){
          $column = 'city';
          $table  = 'user_geography';
          $txtUpd = 'City';
          $idCol  = 'user_id';
        }else if($fieldType == 'State/Province'){
          $column = 'state';
          $table  = 'user_geography';
          $txtUpd = 'State/Province';
          $idCol  = 'user_id';
        }else if($fieldType == 'Address'){
          $column = 'address';
          $table  = 'user_geography';
          $txtUpd = 'Address';
          $idCol  = 'user_id';
        }else if($fieldType == 'Likes'){
          $column = 'like';
          $table  = 'student_detail_profiles';
          $txtUpd = 'Likes';
          $idCol  = 'student_id';
        }else if($fieldType == 'Dislikes'){
          $column = 'dislike';
          $table  = 'student_detail_profiles';
          $txtUpd = 'Dislikes';
          $idCol  = 'student_id';
        }else if($fieldType == 'Gender'){
          $column = 'gender';
          $table  = 'user_profiles';
          $txtUpd = 'Gender';
          $idCol  = 'user_id';
        }else if($fieldType == 'spoken'){
          $column = 'spoken_language';
          $table  = 'user_profiles';
          $txtUpd = 'Home Languages';
          $idCol  = 'user_id';
        }else if($fieldType == 'birthdate'){
          $column = 'date_of_birth';
          $table  = 'user_profiles';
          $txtUpd = 'Date of Birth';
          $idCol  = 'user_id';
          $updatedVal = date("Y-m-d", strtotime($updatedVal));
          $mod_val = date("d - M - Y", strtotime($updatedVal));
        }

        $var[] = [
          'textUpd' => $txtUpd.' has been updated to '.$updatedVal,
          'upd_date' => $mod_val
        ];

        echo json_encode($var);
        // echo $txtUpd.' has been updated to '.$updatedVal;
        $upd_geograph = array(
           $column => $updatedVal
        );

        $this->db->where($idCol, $id);
        $this->db->update($table, $upd_geograph);

    }

}
