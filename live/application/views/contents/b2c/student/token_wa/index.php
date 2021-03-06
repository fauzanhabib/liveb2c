<script>
  $(".header__desktop").hide();
  $(".header__mobile").hide();
  $(".main__sidebar").hide();
</script>

    <!-- back button -->
    <div class="header__wa">
        <div class="backBtn">
            <a href="<?php echo site_url('b2c/student/dashboard_wa'); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" viewBox="0 0 24 24"><path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z"/></svg>
                back
            </a>
        </div>
    </div>
    <!-- back button end -->

    <?php if(count($datasession)!=0){ ?>
    <div class="dashboard__notif success__notif">
        <?php if(count($datasession)==1){ ?>
        <span class="trn" data-trn-key="youhave">You Have</span> <?php echo count($datasession); ?> <span  class="trn" data-trn-key="sessionleft">Session Left For Today</span>
        <?php }else{ ?>
        <span class="trn" data-trn-key="youhave">You Have</span> <?php echo count($datasession); ?> <span  class="trn" data-trn-key="sessionleft">Sessions Left For Today</span>
        <?php } ?>
        <i class="fa fa-times"></i>
    </div>
    <?php } ?>

    <div class="dashboard">
        <div class="dashboard__menubookingcoachresult">
            <a href="<?php echo site_url('b2c/student/find_coaches_wa/single_date'); ?>">
                <div class="bookkacoach trn"  data-trn-key="bookcoach">Book a Coach</div>
            </a>
            <a href="<?php echo site_url('b2c/student/session_wa'); ?>">
                <div class="session trn"  data-trn-key="session">Session</div>
            </a>
            <a href="<?php echo site_url('b2c/student/token_wa'); ?>">
                <div class="token trn activediv"  data-trn-key="tokens">Token</div>
            </a>
            <a href="<?php echo site_url('b2c/student/help_wa'); ?>">
                <div class="help trn"  data-trn-key="help">Help</div>
            </a>
        </div>

        <div class="dashboard__bxtokenstab">

            <div class="tabtokens">
                <ul class="tabs">
                <li class="tab-link current trn" data-tab="tab-1"  data-trn-key="tokens">Token</li>
                    <li class="tab-link trn" data-tab="tab-2" data-trn-key="history">History</li>
                </ul>
            </div>
            <div class="bxtabtokens">
                <div class="bxrequest tab-content current" id="tab-1">
                    <div class="bxrequest__requesttokens">
                        <div class="bxrequest__requesttokens__bxbalance">
                            <label class="trn" data-trn-key="balance">Balance</label>
                            <span><?php echo $remain_token->token_amount; ?></span>
                        </div>
                        <div class="bxrequest__requesttokens__bxbalance">
                            <label class="trn" data-trn-key="usedtokens">Used Tokens</label>
                            <span><?php echo @$real_used; ?></span>
                        </div>
                        <div class="bxrequest__requesttokens__bxbalance">
                            <label class="trn" data-trn-key="refundtokens">Refunded Tokens</label>
                            <span><?php echo @$refu_token; ?></span>
                        </div>
                        <?php if ($data){ ?>
                        <?php echo form_open('b2c/student/token/cancel', 'role="form" class="pure-form" data-parsley-validate');?>
                            <div class="bxrequest__requesttokens__buttonreq">
                                <input type="hidden" name="cancel">
                                <button type="submit" class="neobutton trn" data-trn-key="cancelreq">Cancel Request</button>
                            </div>
                        <?php echo form_close(); ?>
                            <span>You are requesting <?php echo $data->token_amount; ?> token right now</span>
                        <?php }else{ ?>
                        <div class="bxrequest__requesttokens__buttonreq">
                            <a class="neobutton" href="https://myneo.space" target="_blank">Buy Token</a>
                        </div>
                        <?php } ?>

                        <!-- MODAL -->
                    </div>
                </div>
                <div class="bxhistory tab-content flex__direction--col hide" id="tab-2">
                    <ul class="accordion_book">
                        <?php $detcount = 0; foreach (@$histories as $history) {
                            $gmt_user = $this->identity_model->new_get_gmt($this->auth_manager->userid());
                            $new_gmt = 0;
                                if($gmt_user[0]->gmt > 0){
                                    $new_gmt = '+'.$gmt_user[0]->gmt;
                                }else{
                                    $new_gmt = $gmt_user[0]->gmt;
                                }
                            $a = '';
                            if(substr($history->status, 0,4) == 'Refu'){
                                $a = 'Deli';
                            }
                        ?>
                        <li class="accordion-item article-loop">
                            <div class="bxhistory__boxnotifstatus">
                                <div class="flex__column">
                                    <i class="datestatus">
                                        <?php
                                            date_default_timezone_set('UTC');
                                            $dt     = date('H:i:s',$history->transaction_date);
                                            $default_dt  = strtotime($dt);
                                            $usertime = $default_dt+(60*$minutes);
                                            $hour = date("H:i:s", $usertime);


                                            $date     = date('F d, Y',$history->transaction_date);

                                            echo $date." ".$hour;
                                        ?>
                                    </i>
                                    <span>
                                        <?php
                                            // echo $history->description;
                                            $des = explode(" ",$history->description);
                                            if($des[0] == 'Session'){
                                            $t = count($des);

                                            $f_dt_at = $t-3;
                                            $f_dt_until = $t-1;
                                            if($des[$t-6] == 'on'){
                                                $f_date = $t-5;
                                            }else{
                                                $f_date = $t-4;
                                            }
                                            $CI =& get_instance();
                                            $CI->load->library('schedule_function');
                                            $convert = $CI->schedule_function->convert_book_schedule(($this->identity_model->new_get_gmt($this->auth_manager->userid())[0]->minutes), strtotime($des[$f_date]), $des[$f_dt_at], $des[$f_dt_until]);
                                            $date_token = $convert['date'];
                                            $dateconvert = date('Y-m-d', $date_token);


                                                $default_dt_at  = strtotime($des[$f_dt_at]);
                                                $usertime_at = $default_dt_at+(60*$minutes);
                                                $at = date("H:i", $usertime_at);

                                                $default_dt_until  = strtotime($des[$f_dt_until]);
                                                $usertime_until = $default_dt_until+(60*$minutes);
                                                $usertime_until_diff = $usertime_until-(60*5);
                                                $until = date("H:i", $usertime_until_diff);


                                                    $des[$f_dt_at] = $at;
                                                    $des[$f_dt_until] = $until;
                                                    $des[$f_date] = $dateconvert;


                                                for($a=0; $a<count($des); $a++){
                                                    echo $des[$a]." ";
                                                } echo '(UTC '.$new_gmt.')';
                                            } else {
                                                echo $history->status_description;
                                            }

                                            // if(@$history->status == 'Refund'){
                                            //     echo ' <a id="detail'.$detcount.'" class="detailsbtn">Details</a>';
                                            //     $detcount++;
                                            // }
                                        ?>
                                    </span>
                                </div>

                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                            </div>
                            <div class="accordion__panel--history" style="display: none;">
                                <div class="bxhistory__boxstatus">
                                    <div class="status">
                                        <label>Status</label>
                                        <span>
                                            <?php
                                                if($history->status == 'Booked'){
                                                ?>

                                                <?php echo($history->status); ?>
                                                <!-- <div class="status-disable bg-green m-l-20">
                                                    <span class="text-cl-white <?php echo $a;?> <?php echo substr($history->status, 0,4)?> tooltip-bottom" data-tooltip="<?php echo($history->status_description); ?>" style="width:75px"><?php echo($history->status); ?></span>
                                                </div> -->

                                                <?php }
                                                else{
                                                ?>

                                                <!-- <div class="status-disable bg-tertiary m-l-20">
                                                    <span class="text-cl-white <?php echo $a;?> <?php echo substr($history->status, 0,4)?> tooltip-bottom" data-tooltip="<?php echo($history->status_description); ?>" style="width:75px"><?php echo($history->status); ?></span>
                                                </div> -->
                                                <?php echo($history->status); ?>

                                            <?php } ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="bxhistory__boxdebit">
                                    <label> Debit</label>
                                    <?php if(@$history->status !== 'Refund'){ ?>
                                        <span><?php echo($history->token_amount); ?></span>
                                    <?php } else{ ?>
                                        <span>-</span>
                                    <?php } ?>
                                </div>
                                <div class="bxhistory__boxcredit">
                                    <label> Credit</label>
                                    <?php if(@$history->status == 'Refund'){ ?>
                                        <span><?php echo($history->token_amount); ?></span>
                                    <?php } else{ ?>
                                            <span>-</span>
                                    <?php } ?>
                                </div>
                                <div class="bxhistory__boxbalance">
                                    <label> Balance</label>
                                    <span><?php echo($history->balance); ?></span>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

numOnly = function(evt){
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
return true;
}

</script>
<script>
     $('.article-loop').paginate(3);
</script>
