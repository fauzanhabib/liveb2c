<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Language extends MY_Site_Controller {

    // Constructor
    public function __construct() {
        parent::__construct();
        $this->load->model('appointment_model');
        $this->load->model('user_model');
        $this->load->model('user_profile_model');

        //checking user role and giving action
        if (!$this->auth_manager->role() || $this->auth_manager->role() != 'STD') {
            $this->messages->add('ERROR');
            redirect('account/identity/detail/profile');
        }
    }

    // Index
    public function update() {
        $email       = $this->input->post('email');
        $language    = $this->input->post('language');

        $id = $this->auth_manager->userid();

        $data = array(
            'user_language' => $language,
        );

        $this->db->trans_begin();

        $this->db->where('user_id', $id);
        $this->db->update('user_profiles', $data); 

        $this->db->trans_commit();

        return true;
        
    }
    

}
