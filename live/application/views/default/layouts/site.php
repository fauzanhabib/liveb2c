<?php $login = $this->db->select('*')
            ->from('users')
            ->where('id', $this->auth_manager->userid())
            ->get()->result();

            $login_type = @$login[0]->login_type;

            if($login_type == 0){
                $this->load->view('default/layouts/site_b2i');
            }else{
                $this->load->view('default/layouts/site_b2c');
            }
?>