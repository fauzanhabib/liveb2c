<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	// Constructor
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Study_progress');
		$this->load->library('phpass');
	  $this->load->library('auth');
	  $this->load->library('auth_manager');
	  $this->load->model('user_role_model');
	}

	// Index
	public function index(){

		//Generate Token API --
		// $tokenresult = $this->study_progress->GenerateToken();
		// if(@$tokenresult){
		// 	$this->load->library('session');
		// 	$this->session->set_userdata(array(
		// 		'token_api'  => $tokenresult
		// 	));
		// }

      // User is already logged in
      // if ($this->auth->loggedin()) {
			// 		$this->auth_manager->logout();
      //     // check user_id dan session
      //     $user_id = $this->auth_manager->userid();
      //     session_start();
      //     $session_user_login = session_id();
			//
      //     $check_session = $this->db->select('user_login.user_id, user_login.session')
      //                           ->from('user_login')
      //                           ->where('user_login.user_id',$user_id)
      //                           ->where('user_login.session',$session_user_login)
      //                           ->get()->result();
			//
      //     if($check_session){
      //         if((!$check_session[0]->user_id) && (!$check_session[0]->session)){
			// 					// exit('a');
      //             $this->session->set_userdata('user_id_session',$user->id);
      //             redirect('home/confirmation');
      //         } else if (!$check_session){
			// 					// exit('b');
      //             redirect('login');
      //         } else {
			// 					// exit('c');
      //             if($this->auth_manager->role() == 'STD'){
      //                 redirect('b2c/student/dashboard');
      //             } else if($this->auth_manager->role() == 'CCH'){
      //                 redirect('coach/dashboard');
      //             } else{
      //                 redirect('account/identity/detail/profile');
      //             }
      //         }
      //     } else {
			// 			session_start();
		  //       $session_user_login = session_id();
			//
		  //       $this->db->where('user_id',$user_id);
		  //       $this->db->where('session',$session_user_login);
		  //       $this->db->delete('user_login');
			//
			// 			if($this->auth_manager->role() == 'STD'){
			// 					redirect('b2c/student/dashboard');
			// 			} else if($this->auth_manager->role() == 'CCH'){
			// 					redirect('coach/dashboard');
			// 			} else{
			// 					redirect('account/identity/detail/profile');
			// 			}
			// 			// echo $this->auth->loggedin();
			// 			// exit('d');
      //         // redirect('logout');
      //     }
			//
      // }
			$this->auth_manager->logout();
      // Checking user's login attempt
      if($this->input->post('__submit')) {

				$check_login = $this->db->select('*')
													->from('users')
													->where('email', $this->input->post('email'))
													->get()->result();

				$sso_enabled  = $check_login[0]->sso_enabled;
				$sso_username = $check_login[0]->sso_username;

				if($sso_enabled == 0){
					$this->messages->add('Not Registered on SSO', 'warning');
					redirect('login');
					exit;
				}

			// print_r($sso_enabled);exit();
         // Success to identify
       else if( $this->auth_manager->login( $this->input->post('email'), $this->input->post('password')) && $sso_enabled == 1) {
					// echo "<pre>";print_r($check_login);exit();
          // insert timezone

      		$min_raw = $this->input->post("min_raw");
          $userid  = $this->auth_manager->userid();

          $this->session->set_userdata('u_p',$this->input->post('password'));

          // get_sso_username;
          $g_u_u = $this->db->select('sso_username')
                            ->from('users')
                            ->where('email',$this->input->post('email'))
                            ->get()->result();


          $this->session->set_userdata('u_u',$g_u_u[0]->sso_username);
          // =====

          if ($min_raw < 0) {
            $minutes = abs($min_raw);
          }else if($min_raw > 0){
            $minutes = $min_raw * -1;
          }

          $gmt_val = @$minutes / 60;

          if(@$minutes == NULL){
              $minutes = 0;
          }

          $timezone = array(
                 'user_id' => $userid,
                 'gmt_val' => $gmt_val,
                 'minutes_val' => @$minutes,
                 'log_date' => date('Y-m-d H:i:s')
              );
          $this->db->replace('user_timezones', $timezone);
          // ====

          $check_login_type = $this->db->select('*')
                              ->from('users')
                              ->where('id', $this->auth_manager->userid())
                              ->get()->result();

          $login_type = $check_login_type[0]->login_type;
            //=====
			// print_r($sso_enabled);exit();
				if($this->auth_manager->role() == 'CCH'){
               redirect('coach/dashboard');
					// exit;
            } else if($this->auth_manager->role() == 'STD' && $login_type == 1){
               redirect('b2c/student/dashboard');
					// exit;
            } else {
               redirect('account/identity/detail/profile');
					// exit;
            }

          }
          // Not valid user
          redirect('login');
			 exit;
      }

		// Set Template
		// $this->template->content->view('default/contents/login/index');
		$this->template->title = 'Login';

		$this->template->set_template('default/layouts/login');
		$this->template->publish();
	}

    function update_login(){
        session_start();
        $session_user_login = session_id();
        $user_id = $this->input->post('user_id');

        $update = $this->db->where('user_id',$user_id)
                           ->update('user_login',array('session' => $session_user_login));

        if($update){
            echo true;
        } else {
            echo false;
        }
    }

	public function mobile($t, $token, $u, $username){
		//http://localhost:8088/index.php/login/mobile/token/eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE1MTMyMzcxOTEsImV4cGlyYXRpb24iOjE1MTMyMzcxOTEsInVzZXJuYW1lIjoiaW9zIiwidXVpZCI6IjI3MDc2ODM1NDQzMzY5NTc0NSJ9.jX2rFfPTFhBWxBp6uglMGl4hYqbRxWJ8Lfi6ZyHtLmMJgwiNqQrU0ejWbOus4PnDeLVPADB_K9wCgysvokBVidmp_YkTATs94Lsd8rXJkXjICrGj4L981Rlt2D_If2_JXtVbexlPCLQbt0L1SBTb8yFuzdaWp1AMrhd7toYIn6YfMahSxPsH0fnyllGbkcGU0TBgLRX6DNw4yaVhF1am-mfd2xgidqqTepZ_NAXPSSNCDHowjW7Wfo0bR1JHULU9ZxlWbgzp6LvqqnnMKYuwTOgL0LfsBVwAmQ9dRINkZxJyUR0fWrLkNuvVb6QyvlHZR5WToaunaP-H9Q4BOL87Zg/username/ios

		$is_verified = $this->study_progress->TokenVerify($token);

		if(!$is_verified){
			exit('Cannot access right now');
			// echo $is_verified;
		}else{
			// exit('a');
			$pull_user = $this->db->select('*')
                 ->from('users')
                 ->where('sso_username', $username)
                 ->get()->result();

			$user_id    = @$pull_user[0]->id;
			$user_eml   = @$pull_user[0]->password;
			$login_type = @$pull_user[0]->sso_enabled;

			$this->auth->login($user_id, TRUE);
			$role_code = $this->user_role_model->dropdown('id', 'code');
			$this->session->set_userdata("auth_role", @$role_code[$pull_user[0]->role_id]);

			// $remember = TRUE;
			//
			// if ($remember) {
			// 		$this->create_autologin($id);
			// }
			$this->session->set_userdata(array('auth_user' => $user_id, 'auth_loggedin' => TRUE));

			$id 	= $this->auth_manager->userid();
			$role = $this->auth_manager->role();

			// print_r($role);exit();

			if($this->auth_manager->role() == 'STD' && $login_type == 1){
				 redirect('b2c/student/dashboard_wa');
				//  exit;
			}

			// echo "<pre>";print_r($role);exit();
		}

		// print_r($is_verified);exit();
	}


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
