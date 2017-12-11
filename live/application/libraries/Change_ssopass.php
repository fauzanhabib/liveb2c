<?php
class Change_ssopass {
    // var $tokenresult;
    function __construct() {


    }


    public function ch_pass($data){
      $super_user_u = 'tebetutara2';
      $super_user_p = '!@#DynEd12810*()';
      $ch_url = "https://myneo.space/api/v1/sso";
      $url = $ch_url . '/user/' . $super_user_u . '/userpass/' . $data['username'];
      // $url = 'https://b2ctest.dyned.com/api/v1/jwt/token-request';
      // $this->CI = &get_instance();
      $su_token = $this->GenerateToken();
      // print_r($url);exit();

      $ch = curl_init($url);

	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_DNS_USE_GLOBAL_CACHE, false );
	    curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 2 );
	    # curl_setopt($ch, CURLOPT_POST,1);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
	    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	    curl_setopt($ch, CURLOPT_VERBOSE, true);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	        'Content-Type: application/json',
	        'X-Dyned-Tkn: ' . $su_token)
	    );

	    $resp = curl_exec($ch);

	    curl_close($ch);
      // print_r($resp);exit();

 		return $resp;

      // return $tokenresult;
    }

    public function GenerateToken(){

    // public function GenerateToken($std_email='', $std_paswd=''){

        $this->CI = &get_instance();

      $useraccount = json_encode(array(
          'username'=>'tebetutara2',
          'password'=>'!@#DynEd12810*()'
      ));
      // Preparing API URL
      $rt = curl_init();
      curl_setopt_array($rt, array(
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_URL => 'https://myneo.space/api/v1/jwt/token-request',
          CURLOPT_HTTPHEADER => array(
            'Content-Type' => 'application/json'),
          CURLOPT_POSTFIELDS => $useraccount
      ));
      $tokenconnect = curl_exec($rt) ;
      $pulltr = json_decode($tokenconnect);
      $tokenresult = @$pulltr->token;
      // echo $tokenresult;exit('');
      return $tokenresult;
    }

}


?>
