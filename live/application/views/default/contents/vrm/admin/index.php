    <div class="heading text-cl-primary border-b-1 padding15">

        <h2 class="margin0">Student Progress Report</h2>

    </div>

    <div class="box clearfix">
    <div class="content">
        <div class="box-capsule m-t-20 margin-auto width190 font-14">
            <span>Spider Graph</span>
        </div>
        <div class="box pure-g">
            <div class="margin-auto" style="display: flex;">
                <div class="spdr-graph">
                  <div id="chart-area" class="radar-ainner font-12">
                      <div class="hexagonal height-0 prelative">
                          <div class="hexagonBlue position-absolute"></div>
                          <div class="hexagonGreen position-absolute"></div>
                          <div class="hexagonYellow position-absolute"></div>
                          <div class="hexagonRed position-absolute"></div>
                      </div>
                      <canvas id="bar" class="radar" style="width: 600px; height: 300px;" width="1200" height="600"></canvas>
                  </div>
                </div>
            </div>
            <div class="pure-u-md-12-24">
                <div class="box-capsule m-t-20 margin-auto font-14 width190">
                    <span>Study Data Average</span>
                </div>
                <div class="text-center">
                        <ul class="coaching-info-big m-tb-0 padding-l-0 padding-t-25">
                            <li class="coaching-info-box-big margin-auto clearfix">
                                <div class="coaching-box-left-big">
                                    <span>Last PT</span>
                                </div>
                                <div class="coaching-box-right-big">
                                    <div class="last-pt"></div>
                                </div>
                            </li>
                            <li class="coaching-info-box-big margin-auto clearfix">
                                <div class="coaching-box-left-big">
                                    <span>Hours/Week</span>
                                </div>
                                <div class="coaching-box-right-big">
                                    <div class="hw"></div>
                                </div>
                            </li>
                        </ul>

                        <ul class="coaching-info-big m-tb-0 padding-l-0">
                            <li class="coaching-info-box-big margin-auto clearfix">
                                <div class="coaching-box-left-big">
                                    <span>Level Study</span>
                                </div>
                                <div class="coaching-box-right-big">
                                    <div class="sl"></div>
                                </div>
                            </li>
                            <li class="coaching-info-box-big margin-auto clearfix">
                                <div class="coaching-box-left-big">
                                    <span>PT 1</span>
                                </div>
                                <div class="coaching-box-right-big">
                                    <div class="pt"></div>
                                </div>
                            </li>
                        </ul>
                    </div>

                <div class="box-capsule m-t-20 margin-auto width190 font-14">
                    <span>Previous Notes</span>
                </div>
                <div class="comment-section height-200 m-t-20">
                    <div class="comment-message clearfix">
                    <?php 
                    if($cchnote){
                    foreach($cchnote as $n){ ?>
                        <div class="padding-t-5">
                            <span><?php echo @$n->fullname; ?> on <?php echo $n->date; ?> :</span>
                            <p><?php echo $n->cch_notes; ?></p>
                        </div>
                    <?php } }else { ?>
                        <span>No Notes Yet</span>
                     <?php } ?>
                    </div>
                </div>
            </div>
            <?php $cert_level = $student_vrm2->cert_level_completion; ?>
            <div class="pure-u-md-12-24">

                <div class="box-capsule m-t-20 margin-auto font-14 width190">
                    <span>Certificate Plan</span>
                </div>
                <div class="tabs1 cert_plan padding-t-20 text-center">
                    <a href="#content-a1" class="block-rm-data progress-value square-tabs-2 bg-white-fff">
                        <h5 class="m-b-5 m-t-0 font-semi-bold">A1</h5>
                        <div class="block ac-blue a1">
                            <span class="progress-value"><i class="val"><?php echo $cert_level->A1; ?>%</i></span>
                            <progress value="<?php echo $cert_level->A1; ?>" max="100"></progress>
                        </div>
                    </a>
                    <a href="#content-b1" class="block-rm-data progress-value square-tabs-2 bg-white-fff">
                        <h5 class="m-b-5 m-t-0 font-semi-bold">A2</h5>
                        <div class="block ac-blue a1">
                            <span class="progress-value"><i class="val"><?php echo $cert_level->A2; ?>%</i></span>
                            <progress value="<?php echo $cert_level->A2; ?>" max="100"></progress>
                        </div>
                    </a>
                    <a href="#content-c1" class="block-rm-data progress-value square-tabs-2 bg-white-fff">
                        <h5 class="m-b-5 m-t-0 font-semi-bold">B1</h5>
                        <div class="block ac-blue a1">
                            <span class="progress-value"><i class="val"><?php echo $cert_level->B1; ?>%</i></span>
                            <progress value="<?php echo $cert_level->B1; ?>" max="100"></progress>
                        </div>
                    </a>
                    <a href="#content-a2" class="block-rm-data progress-value square-tabs-2 bg-white-fff">
                        <h5 class="m-b-5 m-t-0 font-semi-bold">B2</h5>
                        <div class="block ac-blue a1">
                            <span class="progress-value"><i class="val"><?php echo $cert_level->B2; ?>%</i></span>
                            <progress value="<?php echo $cert_level->B2; ?>" max="100"></progress>
                        </div>
                    </a>
                    <a href="#content-b2" class="block-rm-data progress-value square-tabs-2 bg-white-fff">
                        <h5 class="m-b-5 m-t-0 font-semi-bold">C1</h5>
                        <div class="block ac-blue a1">
                            <span class="progress-value"><i class="val"><?php echo $cert_level->C1; ?>%</i></span>
                            <progress value="<?php echo $cert_level->C1; ?>" max="100"></progress>
                        </div>
                    </a>
                    <a href="#content-c2" class="block-rm-data progress-value square-tabs-2 bg-white-fff">
                        <h5 class="m-b-5 m-t-0 font-semi-bold">C2</h5>
                        <div class="block ac-blue a1">
                            <span class="progress-value"><i class="val"><?php echo $cert_level->C2; ?>%</i></span>
                            <progress value="<?php echo $cert_level->C2; ?>" max="100"></progress>
                        </div>
                    </a>
                </div>            

                <div id="content-a1">
                <?php
                $nde1 = @$allmodule1['nde1'];
                $fe1  = @$allmodule1['fe1'];
        
                // echo "<pre>";
                // print_r($fe1);
                // exit();
                ?>
                    <div class="tabs-two tabs2 padding-t-20 padding-b-5 clearfix w3-animate-opacity">
                        <a href="#tabs-content1" class="square-tabs w3-animate-opacity active">
                            <h5 class="m-t-20">First English</h5>
                        </a>
                        <a href="#tabs-content2" class="square-tabs w3-animate-opacity">
                            <h5 class="m-t-13">New Dynamic English</h5>
                        </a>
                    </div>

                    <div id="tabs-content1" class="tabs-c clearfix square-tabs" style="display: block;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $fe1['pcfe1']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $fe1['fe1']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $fe1['pcfe2']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $fe1['fe2']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $fe1['pcfe3']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $fe1['fe3']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $fe1['pcfe4']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $fe1['fe4']; ?></h5>
                        </div>
                    </div>
                    <div id="tabs-content2" class="tabs-c clearfix" style="display: none;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $nde1['pcnde1']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $nde1['nde1']; ?></h5>
                        </div>
                    </div>
                </div>

                <div id="content-b1">
                <?php
                $nde2 = @$allmodule2['nde2'];
                $tls2  = @$allmodule2['tls2'];
        
                // echo "<pre>";
                // print_r($fe1);
                // exit();
                ?>
                    <div class="tabs-two tabs2 padding-t-20 padding-b-5 clearfix w3-animate-opacity">
                        <a href="#content-b1-lia" class="square-tabs w3-animate-opacity active">
                            <h5 class="m-t-13">New Dynamic English</h5>
                        </a>
                        <a href="#content-b1-fe" class="square-tabs w3-animate-opacity">
                            <h5 class="m-t-13">The Lost<br>Secret</h5>
                        </a>
                    </div>

                    <div id="content-b1-lia" class="tabs-c clearfix" style="display: block;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $nde2['pcnde2']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $nde2['nde2']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $nde2['pcnde3']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $nde2['nde3']; ?></h5>
                        </div>
                    </div>
                    <div id="content-b1-fe" class="tabs-c clearfix" style="display: none;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $tls2['pctls1']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $tls2['tls1']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $tls2['pctls2']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $tls2['tls2']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $tls2['pctls3']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $tls2['tls3']; ?></h5>
                        </div>
                    </div>
                </div>

                <div id="content-c1">
                <?php
                $nde3  = @$allmodule3['nde3'];
                $dbe3  = @$allmodule3['dbe3'];
                $tls3  = @$allmodule3['tls3'];
                $ebn3  = @$allmodule3['ebn3'];
        
                // echo "<pre>";
                // print_r($fe1);
                // exit();
                ?>
                    <div class="tabs-two tabs2 padding-t-20 padding-b-5 clearfix w3-animate-opacity">
                        <a href="#tabs-nde3" class="square-tabs w3-animate-opacity active">
                            <h5 class="m-t-13">New Dynamic English</h5>
                        </a>
                        <a href="#tabs-dbe3" class="square-tabs w3-animate-opacity">
                            <h5 class="m-t-5">Dynamic Business English</h5>
                        </a>
                        <a href="#tabs-tls3" class="square-tabs w3-animate-opacity">
                            <h5 class="m-t-13">The Lost<br>Secret</h5>
                        </a>
                        <a href="#tabs-ebn3" class="square-tabs w3-animate-opacity">
                            <h5 class="m-t-13">English By The Numbers</h5>
                        </a>
                    </div>

                    <div id="tabs-nde3" class="tabs-c clearfix" style="display: block;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $nde3['pcnde4']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $nde3['nde4']; ?></h5>
                        </div>
                    </div>
                    <div id="tabs-dbe3" class="tabs-c clearfix" style="display: none;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $dbe3['pcdbe1']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $dbe3['dbe1']; ?></h5>
                            
                        </div>
                    </div>
                    <div id="tabs-tls3" class="tabs-c clearfix" style="display: none;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $tls3['pctls4']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $tls3['tls4']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $tls3['pctls5']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $tls3['tls5']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $tls3['pctls6']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $tls3['tls6']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $tls3['pctls7']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $tls3['tls7']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $tls3['pctls8']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $tls3['tls8']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $tls3['pctls9']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $tls3['tls9']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $tls3['pctls10']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $tls3['tls10']; ?></h5>
                        </div>
                    </div>
                    <div id="tabs-ebn3" class="tabs-c clearfix" style="display: none;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $ebn3['pcebn1']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $ebn3['ebn1']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $ebn3['pcebn2']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $ebn3['ebn2']; ?></h5>
                        </div>
                    </div>
                </div>

                <div id="content-a2">
                <?php
                $nde4  = @$allmodule4['nde4'];
                $dbe4  = @$allmodule4['dbe4'];
                $fib4  = @$allmodule4['fib4'];
                $ebn4  = @$allmodule4['ebn4'];
        
                // echo "<pre>";
                // print_r($fe1);
                // exit();
                ?>
                    <div class="tabs-two tabs2 padding-t-20 padding-b-5 clearfix w3-animate-opacity">
                        <a href="#content-nde4" class="square-tabs w3-animate-opacity active">
                            <h5 class="m-t-13">New Dynamic English</h5>
                        </a>
                        <a href="#content-dbe4" class="square-tabs w3-animate-opacity">
                            <h5 class="m-t-5">Dynamic Business English</h5>
                        </a>
                        <a href="#content-fib4" class="square-tabs w3-animate-opacity">
                            <h5 class="m-t-13">Functioning In Business</h5>
                        </a>
                        <a href="#content-ebn4" class="square-tabs w3-animate-opacity">
                            <h5 class="m-t-13">English By The Numbers</h5>
                        </a>
                    </div>

                    <div id="content-nde4" class="tabs-c clearfix" style="display: block;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $nde4['pcnde5']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $nde4['nde5']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $nde4['pcnde6']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $nde4['nde6']; ?></h5>
                        </div>
                    </div>
                    <div id="content-dbe4" class="tabs-c clearfix" style="display: none;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $dbe4['pcdbe2']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $dbe4['dbe2']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $dbe4['pcdbe3']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $dbe4['dbe3']; ?></h5>
                        </div>
                    </div>
                    <div id="content-fib4" class="tabs-c clearfix" style="display: none;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $fib4['pcfib1']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $fib4['fib1']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $fib4['pcfib2']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $fib4['fib2']; ?></h5>
                        </div>
                    </div>
                    <div id="content-ebn4" class="tabs-c clearfix" style="display: none;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $ebn4['pcebn3']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $ebn4['ebn3']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $ebn4['pcebn4']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $ebn4['ebn4']; ?></h5>
                        </div>
                    </div>
                </div>

                <div id="content-b2">
                <?php
                $nde5  = @$allmodule5['nde5'];
                $dbe5  = @$allmodule5['dbe5'];
                $fib5  = @$allmodule5['fib5'];
                $ebn5  = @$allmodule5['ebn5'];
                $dlg5  = @$allmodule5['dlg5'];
                $als5  = @$allmodule5['als5'];
        
                // echo "<pre>";
                // print_r($fe1);
                // exit();
                ?>
                    <div class="tabs-two tabs2 padding-t-20 padding-b-5 clearfix w3-animate-opacity">
                        <a href="#tabs-nde5" class="square-tabs w3-animate-opacity active">
                            <h5 class="m-t-13">New Dynamic English</h5>
                        </a>
                        <a href="#tabs-dbe5" class="square-tabs w3-animate-opacity">
                            <h5 class="m-t-5">Dynamic Business English</h5>
                        </a>
                        <a href="#tabs-fib5" class="square-tabs w3-animate-opacity">
                            <h5 class="m-t-13">Functioning In Business</h5>
                        </a>
                        <a href="#tabs-ebn5" class="square-tabs w3-animate-opacity">
                            <h5 class="m-t-13">English By The Numbers</h5>
                        </a>
                        <a href="#tabs-dlg5" class="square-tabs w3-animate-opacity">
                            <h5 class="m-t-20">Dialogue</h5>
                        </a>
                        <a href="#tabs-als5" class="square-tabs w3-animate-opacity">
                            <h5 class="m-t-13">Advanced Listening</h5>
                        </a>
                    </div>

                    <div id="tabs-nde5" class="tabs-c clearfix square-tabs" style="display: block;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $nde5['pcnde7']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $nde5['nde7']; ?></h5>
                        </div>
                    </div>
                    <div id="tabs-dbe5" class="tabs-c clearfix" style="display: none;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $dbe5['pcdbe4']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $dbe5['dbe4']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $dbe5['pcdbe5']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $dbe5['dbe5']; ?></h5>
                        </div>
                    </div>
                    <div id="tabs-fib5" class="tabs-c clearfix square-tabs" style="display: block;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $fib5['pcfib3']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $fib5['fib3']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $fib5['pcfib4']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $fib5['fib4']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $fib5['pcfib5']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $fib5['fib5']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $fib5['pcfib6']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $fib5['fib6']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $fib5['pcfib7']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $fib5['fib7']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $fib5['pcfib8']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $fib5['fib8']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $fib5['pcfib9']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $fib5['fib9']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $fib5['pcfib10']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $fib5['fib10']; ?></h5>
                        </div>
                    </div>
                    <div id="tabs-ebn5" class="tabs-c clearfix square-tabs" style="display: block;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $ebn5['pcebn5']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $ebn5['ebn5']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $ebn5['pcebn6']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $ebn5['ebn6']; ?></h5>
                        </div>
                    </div>
                    <div id="tabs-dlg5" class="tabs-c clearfix square-tabs" style="display: block;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $dlg5['pcdlg1']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $dlg5['dlg1']; ?></h5>
                        </div>
                    </div>
                    <div id="tabs-als5" class="tabs-c clearfix square-tabs" style="display: block;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $als5['pcals1']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $als5['als1']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $als5['pcals2']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $als5['als2']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                            <h5 class="m-b-5 font-20 text-cl-white"><?php echo $als5['pcals3']; ?>%</h5>
                            <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $als5['als3']; ?></h5>
                        </div>
                    </div>
                </div>

                <div id="content-c2">
                <?php
                $nde6  = @$allmodule6['nde6'];
                $dbe6  = @$allmodule6['dbe6'];
                $ebn6  = @$allmodule6['ebn6'];
                $dlg6  = @$allmodule6['dlg6'];
                $als6  = @$allmodule6['als6'];
        
                // echo "<pre>";
                // print_r($fe1);
                // exit();
                ?>
                    <div class="tabs-two tabs2 padding-t-20 padding-b-5 clearfix w3-animate-opacity">
                        <a href="#content-nde6" class="square-tabs w3-animate-opacity active">
                            <h5 class="m-t-13">New Dynamic English</h5>
                        </a>
                        <a href="#content-dbe6" class="square-tabs w3-animate-opacity">
                            <h5 class="m-t-5">Dynamic Business English</h5>
                        </a>
                        <a href="#content-dlg6" class="square-tabs w3-animate-opacity">
                            <h5 class="m-t-20">Dialogue</h5>
                        </a>
                        <a href="#content-ebn6" class="square-tabs w3-animate-opacity">
                            <h5 class="m-t-13">English By The Numbers</h5>
                        </a>
                        <a href="#content-als6" class="square-tabs w3-animate-opacity">
                            <h5 class="m-t-13">Advanced Listening</h5>
                        </a>
                    </div>

                    <div id="content-nde6" class="tabs-c clearfix square-tabs" style="display: block;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $nde6['pcnde8']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $als5['als3']; ?></h5>
                        </div>
                    </div>
                    <div id="content-dbe6" class="tabs-c clearfix square-tabs" style="display: block;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $dbe6['pcdbe6']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $dbe6['dbe6']; ?></h5>
                        </div>
                    </div>
                    <div id="content-dlg6" class="tabs-c clearfix square-tabs" style="display: block;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $dlg6['pcdlg2']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $dlg6['dlg2']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $dlg6['pcdlg3']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $dlg6['dlg3']; ?></h5>
                        </div>
                    </div>
                    <div id="content-ebn6" class="tabs-c clearfix square-tabs" style="display: block;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $ebn6['pcebn7']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $ebn6['ebn7']; ?></h5>
                        </div>
                    </div>
                    <div id="content-als6" class="tabs-c clearfix square-tabs" style="display: block;">
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $als6['pcals4']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $als6['als4']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $als6['pcals5']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $als6['als5']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $als6['pcals6']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $als6['als6']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $als6['pcals7']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $als6['als7']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $als6['pcals8']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $als6['als8']; ?></h5>
                        </div>
                        <div class="square-tabs w3-animate-opacity bg-forthblue">
                             <h5 class="m-b-5 font-20 text-cl-white"><?php echo $als6['pcals9']; ?>%</h5>
                             <h5 class="margin0 padding-b-5 font-12 text-cl-white"><?php echo $als6['als9']; ?></h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>  
</div>

</div>




        <script type="text/javascript">
            $(document).ready(function(){
                $(".listTop > a").prepend($("<span/>"));
                $(".listBottom > a").prepend($("<span/>"));
                $(".listTop, .listBottom").click(function(event){
                 event.stopPropagation(); 
                 $(this).children("ul").slideToggle();
               });
            });
        </script>



        <script src="<?php echo base_url(); ?>assets/vendor/chartjs/Chart.Core.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/chartjs/Chart.Radar.js"></script>
        <!--<script src="<?php //echo base_url(); ?>assets/js/vrm.js"></script>-->


      <script>

//TABS
$('.tab-link a').click(function(e){
    var currentValue = $(this).attr('href');

    $('.tab-link a').removeClass('active');
    $('.tab').removeClass('active');

    $(this).addClass('active');
    $(currentValue).addClass('active');

    e.preventDefault();

});

//RADAR

$('[data-tooltip]:after').css({'width':'115px'});

var student_vrm = <?php echo $student_vrm; ?>;

var get_cert_plan = student_vrm.cert_plan;
if(get_cert_plan == 1){
    $('.certificationplan').html('Academic I Plan');
} else if(get_cert_plan == 2){
    $('.certificationplan').html('Academic II Plan');
} else if(get_cert_plan == 3){
    $('.certificationplan').html('Professional Plan');
}

function Value(value, metadata){
    this.value= value;
    this.metadata = metadata;
}

Value.prototype.toString = function(){
    return this.value;
}

var wss = new Value(student_vrm.wss.percent_to_goal, {
    tooltipx : student_vrm.wss.raw_value + ' | Weighted Study Score'
})

var repeat = new Value(student_vrm.repeats.percent_to_goal, {
    tooltipx : student_vrm.repeats.raw_value + ' | Repeat'
})

var mic = new Value(student_vrm.mic.percent_to_goal, {
    tooltipx : student_vrm.mic.raw_value + ' | Speaking (Microphone)'
})

var headphone = new Value(student_vrm.headphone.percent_to_goal, {
    tooltipx : student_vrm.headphone.raw_value + ' | Review (Headphone)'
})
var sr = new Value(student_vrm.sr.percent_to_goal, {
    tooltipx : student_vrm.sr.raw_value + ' | Speech Recognition'
})

var mt = new Value(student_vrm.mt.percent_to_goal, {
    tooltipx : student_vrm.mt.raw_value + ' | Mastery Test'
})

var valueData = function(point){
    return point.value.metadata.tooltipx;
}

$('.last-pt').append('<div>'+student_vrm.last_pt_score+'</div>');
$('.sl').append('<div>'+student_vrm.study_level+'</div>');
$('.pt').append('<div>'+student_vrm.initial_pt_score+'</div>');
$('.hw').append('<div>'+student_vrm.hours_per_week.raw_value+'</div>');

var helpers = Chart.helpers;
var canvas = document.getElementById('bar');

var data = {
    pointLabelFontFamily: "webFont",
    labels: ["WSS", "\ue031", "\ue02f", "\ue030", '\ue02e', "x MT"],
    datasets: [

        {
            label: "Progress",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [wss, repeat, mic, headphone, sr, mt]
        }
    ]
};    

if($(document).width() < 490){
    var bar = new Chart(canvas.getContext('2d')).Radar(data, {
      
        tooltipTemplate : valueData,
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        responsive: true,
        pointLabelFontFamily : '"webFont"',
        pointLabelFontSize : 18,
        pointLabelFontColor : '#666',
        pointotRadius : 3,
        pointDotStrokeWidth : 1,
        pointHitDetectionRadius : 25,
        datasetStroke : true,
        datasetStrokeWidth : 2,
        datasetFill : true,
        scaleFontFamily: "'webFont'",
        pointDot:true,
        showtooltipx: true,
        scaleOverride: true,
        scaleSteps: 6,
        scaleStepWidth: 20,
        scaleStartValue: 0,
        scaleEndValue: 110,
        scaleLineColor : "#ededed",

    });
}
else {
    var bar = new Chart(canvas.getContext('2d')).Radar(data, {
      
        tooltipTemplate : valueData,
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        responsive: true,
        pointLabelFontFamily : '"webFont"',
        pointLabelFontSize : 18,
        pointLabelFontColor : '#666',
        pointotRadius : 3,
        pointDotStrokeWidth : 1,
        pointHitDetectionRadius : 25,
        datasetStroke : true,
        datasetStrokeWidth : 2,
        datasetFill : true,
        scaleFontFamily: "'webFont'",
        pointDot:true,
        showtooltipx: true,
        scaleOverride: true,
        scaleSteps: 6,
        scaleStepWidth: 20,
        scaleStartValue: 0,
        scaleEndValue: 110,
        scaleLineColor : "#ededed",
    });
}

var legendHolder = document.createElement('div');
legendHolder.innerHTML = bar.generateLegend();

document.getElementById('legend').appendChild(legendHolder.firstChild);

//certification

$('.no-data').hide();


function certificate(student_vrm){
    console.log(student_vrm.cert_level_completion.A2);
    $('.plan').append(cert_plan);
    $('.a1 .progress-value').append('<i class="val">'+student_vrm.cert_level_completion.A1+'%</i>');
    $('.a1 progress').val(student_vrm.cert_level_completion.A1);
    $('.a2 .progress-value').append('<i class="val">'+student_vrm.cert_level_completion.A2+'%</i>');
    $('.a2 progress').val(student_vrm.cert_level_completion.A2);
    $('.b1 .progress-value').append('<i class="val">'+student_vrm.cert_level_completion.B1+'%</i>');
    $('.b1 progress').val(student_vrm.cert_level_completion.B1);
    $('.b2 .progress-value').append('<i class="val">'+student_vrm.cert_level_completion.B2+'%</i>');
    $('.b2 progress').val(student_vrm.cert_level_completion.B2);
    $('.c1 .progress-value').append('<i class="val">'+student_vrm.cert_level_completion.C1+'%</i>');
    $('.c1 progress').val(student_vrm.cert_level_completion.C1);
    $('.c2 .progress-value').append('<i class="val">'+student_vrm.cert_level_completion.C2+'%</i>');
    $('.c2 progress').val(student_vrm.cert_level_completion.C2);
}

function certificate_2(student_vrm){
    //$('.plan').append(cert_plan);
    $('.a1p .progress-value').append('<i class="val">'+student_vrm.cert_level_completion.A1P+'%</i>');
    $('.a1p progress').val(student_vrm.cert_level_completion.A1);
    $('.a2p .progress-value').append('<i class="val">'+student_vrm.cert_level_completion.A2P+'%</i>');
    $('.a2p progress').val(student_vrm.cert_level_completion.A2P);
    $('.b1p .progress-value').append('<i class="val">'+student_vrm.cert_level_completion.B1P+'%</i>');
    $('.b1p progress').val(student_vrm.cert_level_completion.B1P);
    $('.b2p .progress-value').append('<i class="val">'+student_vrm.cert_level_completion.B2P+'%</i>');
    $('.b2p progress').val(student_vrm.cert_level_completion.B2P);
}



if (student_vrm.cert_plan == 1) {
    var cert_plan = 'ACADEMIC';
    $('.cert_plan2').remove();
    certificate(student_vrm);
}
else if (student_vrm.cert_plan == 2) {
    var cert_plan = 'ACADEMIC PLUS';
    $('.cert_plan').remove();

    certificate(student_vrm);
    certificate_2(student_vrm);
}
else if (student_vrm.cert_plan == 3) {
    var cert_plan = 'PRO';
    $('.cert_plan2').remove();
    certificate(student_vrm);
}
else if (student_vrm.cert_plan == 6) {
    var cert_plan = 'PRO EUROPE';
    $('.cert_plan2').remove();
    certificate(student_vrm);
}
else {
    $('.cert_plan').remove();
    $('.cert_plan2').remove();

    $('.no-data').show();
    $('.title').hide();
}
</script>
<script>
            // Wait until the DOM has loaded before querying the document
            $(document).ready(function(){
                $('div.tabs2').each(function(){
                    // For each set of tabs, we want to keep track of
                    // which tab is active and its associated content
                    var $active, $content, $links = $(this).find('a');

                    // If the location.hash matches one of the links, use that as the active tab.
                    // If no match is found, use the first link as the initial active tab.
                    $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                    $active.addClass('active');

                    $content = $($active[0].hash);

                    // Hide the remaining content
                    $links.not($active).each(function () {
                        $(this.hash).hide();
                    });

                    // Bind the click event handler
                    $(this).on('click', 'a', function(e){
                        // Make the old tab inactive.
                        $active.removeClass('active');
                        $content.hide();

                        // Update the variables with the new link and content
                        $active = $(this);
                        $content = $(this.hash);

                        // Make the tab active.
                        $active.addClass('active');
                        $content.show();

                        // Prevent the anchor's default click action
                        e.preventDefault();
                    });
                });
            });
        </script>
        <script>
            // Wait until the DOM has loaded before querying the document
            $(document).ready(function(){
                $('div.tabs1').each(function(){
                    // For each set of tabs, we want to keep track of
                    // which tab is active and its associated content
                    var $active, $content, $links = $(this).find('a');

                    // If the location.hash matches one of the links, use that as the active tab.
                    // If no match is found, use the first link as the initial active tab.
                    $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                    $active.addClass('active');

                    $content = $($active[0].hash);

                    // Hide the remaining content
                    $links.not($active).each(function () {
                        $(this.hash).hide();
                    });

                    // Bind the click event handler
                    $(this).on('click', 'a', function(e){
                        // Make the old tab inactive.
                        $active.removeClass('active');
                        $content.hide();

                        // Update the variables with the new link and content
                        $active = $(this);
                        $content = $(this.hash);

                        // Make the tab active.
                        $active.addClass('active');
                        $content.show();

                        // Prevent the anchor's default click action
                        e.preventDefault();
                    });
                });
            });
        </script>
