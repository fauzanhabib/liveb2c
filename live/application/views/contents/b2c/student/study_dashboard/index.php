<style>
	.last__upd{
		margin-top: 10px;
		width: 100%;
		font-size: 14px;
		padding: 5px 0px;
	}
	.btn_u_sd{
		color: #49C5FE;
	}
	.btn_u_sd:hover{
		cursor: pointer;
	}
	/*.header__profile {
		-webkit-box-flex: 1.1;
		-ms-flex: 1.1;
		flex: 1.1;
	}*/
	@media only screen and (max-device-width: 768px) and (min-device-width: 320px){
		.mobile__menu {
			-webkit-box-flex: 1;
			-ms-flex: 1;
			flex: 1;
		}
	}
</style>
	<div class="study__dashboard__top">
		<!-- achievement goal step -->
		<div class="progress__step">
		  	<div class="donut__progress">
		  		<div class="outter--circle circle"
			         data-thickness="15"
			         data-size="140">
			        <div class="inner--circle circle"
				         data-thickness="15"
				         data-size="110">
				        <!-- <svg id="donut_devider" class="devider-five hide">
				          	<g class="progress_border" stroke="#222a42" stroke-width="4" fill="none">
				            	<line x1="70" y1="70" x2="70"y2="14" transform="rotate(60 70 70)"/>
				            	<line x1="70" y1="70" x2="70"y2="14" transform="rotate(120 70 70)"/>
				            	<line x1="70" y1="70" x2="70"y2="14" transform="rotate(180 70 70)"/>
				            	<line x1="70" y1="70" x2="70"y2="14" transform="rotate(240 70 70)"/>
				            	<line x1="70" y1="70" x2="70"y2="14" transform="rotate(300 70 70)"/>
				          	</g>
				          	<circle class="progress_border" fill="#3e4d79" cx="70" cy="70" r="40"/>
			        	</svg>

				        <svg id="donut_devider" class="devider-six hide">
				          	<g class="progress_border" stroke="#222a42" stroke-width="4" fill="none">
				            	<line x1="70" y1="70" x2="70"y2="14" transform="rotate(52 70 70)"/>
				            	<line x1="70" y1="70" x2="70"y2="14" transform="rotate(104 70 70)"/>
				            	<line x1="70" y1="70" x2="70"y2="14" transform="rotate(156 70 70)"/>
				            	<line x1="70" y1="70" x2="70"y2="14" transform="rotate(212 70 70)"/>
				            	<line x1="70" y1="70" x2="70"y2="14" transform="rotate(264 70 70)"/>
				            	<line x1="70" y1="70" x2="70"y2="14" transform="rotate(316 70 70)"/>
				          	</g>
				          	<circle class="progress_border" fill="#3e4d79" cx="70" cy="70" r="40"/>
				        </svg>

				        <svg id="donut_devider" class="devider-seven">
				          	<g class="progress_border" stroke="#222a42" stroke-width="4" fill="none">
				            	<line x1="70" y1="70" x2="70"y2="15" transform="rotate(45 70 70)"/>
				            	<line x1="70" y1="70" x2="70"y2="15" transform="rotate(90 70 70)"/>
				            	<line x1="70" y1="70" x2="70"y2="15" transform="rotate(135 70 70)"/>
				            	<line x1="70" y1="70" x2="70"y2="15" transform="rotate(180 70 70)"/>
				            	<line x1="70" y1="70" x2="70"y2="15" transform="rotate(225 70 70)"/>
				            	<line x1="70" y1="70" x2="70"y2="15" transform="rotate(270 70 70)"/>
				            	<line x1="70" y1="70" x2="70"y2="15" transform="rotate(315 70 70)"/>
				          </g>
				          <circle class="progress_border" fill="#3e4d79" cx="70" cy="70" r="40"/>
				        </svg> -->

				        <div class="donut__progress__info">
				            <div class="point__progress__info"><?php echo $gsp->data->certification_level;?></div>
				        </div>
				    </div>
				</div>

				<div class="progress__info__label">
					<?php echo number_format($gsp->data->total_points_until_today);?> / <?php echo number_format($gsp->data->total_points_to_pass);?>
				</div>
		  	</div>

		  	<div class="progress__achievement">
		  		<div class="study__progress__achievement">
					<!--<div class="bullet__achievement <?php echo $mt_color['mt1']; ?>"></div>
		  			<div class="bullet__achievement <?php echo $mt_color['mt2']; ?>"></div>
		  			<div class="bullet__achievement <?php echo $mt_color['mt3']; ?>"></div>
		  			<div class="bullet__achievement <?php echo $mt_color['mt4']; ?>"></div>
		  			<div class="bullet__achievement <?php echo $mt_color['mt5']; ?>"></div>
		  			<div class="bullet__achievement <?php echo $mt_color['mt6']; ?>"></div> -->

					<!-- =======edited by rendy bustari========== -->
					<?php
					for($l=1;$l<=$max_buletan_student;$l++){ ?>
						<div class="bullet__achievement <?php echo @$student_color['mt'.$l];?>"></div>
					<?php
						}
					?>


					<!-- ========================================= -->

		  			<div class="achievement__point__info">
		  				<h5><?php echo number_format($gsp->data->study->points_until_today);?></h5>
		  				<h3 class="trn" data-trn-key="study">Study</h3>
		  			</div>
		  		</div>
		  		<div class="coach__progress__achievement">
		  			<!-- <div class="bullet__achievement bg-green-gradient"></div>
		  			<div class="bullet__achievement bg-green-gradient"></div>
		  			<div class="bullet__achievement bg-green-gradient"></div>
		  			<div class="bullet__achievement bg-green-gradient"></div>
		  			<div class="bullet__achievement bg-red-gradient"></div> -->
					<!-- =========edited by rendy bustar============== -->
					<?php
					for($i=1;$i<=$max_buletan;$i++){ ?>
						<div class="bullet__achievement <?php echo @$coach_color['cc'.$i];?>"></div>
					<?php
						}
					?>
					<!-- ================================ -->


		  			<div class="achievement__point__info">
		  				<h5><?php echo number_format($gsp->data->coach->points_until_today);?></h5>
		  				<h3 class="trn" data-trn-key="coach">Coach</h3>
		  			</div>
		  		</div>
		  	</div>
		</div>
		<!-- end achievement goal step -->

		<!-- top point graph -->
		<div class="progress__point__top">
			<h5 class="trn" data-trn-key="points">Points</h5>
			<div class="graph__wrap">
			  	<div class="bar__graph">
						<?php
						$bar_now = ( $gwp->data[0]->points_goal == 0 ? 0 : $gwp->data[0]->points / $gwp->data[0]->points_goal) * 100;
						$bar_w1  = ( $gwp->data[1]->points_goal == 0 ? 0 : $gwp->data[1]->points / $gwp->data[1]->points_goal) * 100;
						$bar_w2  = ( $gwp->data[2]->points_goal == 0 ? 0 : $gwp->data[2]->points / $gwp->data[2]->points_goal) * 100;
						$bar_w3  = ( $gwp->data[3]->points_goal == 0 ? 0 : $gwp->data[3]->points / $gwp->data[3]->points_goal) * 100;
						?>
			    	<ul class="graph b2">
			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $bar_now; ?>">
			          		<span class="graph__legend trn"  data-trn-key="now">Now</span>
			          		<label><?php echo number_format($gwp->data[0]->points);?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($bar_w1 > 125){echo "125";}else{ echo $bar_w1;} ?>">
			          		<span class="graph__legend">w 1</span>
			          		<label><?php echo number_format($gwp->data[1]->points);?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($bar_w2 > 125){echo "125";}else{ echo $bar_w2;} ?>">
			          		<span class="graph__legend">w 2</span>
			          		<label><?php echo number_format($gwp->data[2]->points);?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($bar_w3 > 125){echo "125";}else{ echo $bar_w3;} ?>">
			          		<span class="graph__legend">w 3</span>
			          		<label><?php echo number_format($gwp->data[3]->points);?></label>
			        		</li>
			      		</span>

			      		<div class="v__bar">
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			      		</div>
			    	</ul>
			  	</div>
			</div>
		</div>
		<!-- end top point graph -->

		<!-- daily progress donut graph -->
		<div class="progress__step">
    		<h5 class="trn" data-trn-key="progresstogoal">Progress to goals</h5>
		  	<div class="donut__progress">
		  		<div class="step--circle circle"
			         data-thickness="15"
			         data-size="150">
		            <svg>
		                <path stroke-linecap="round" id="arc1" fill="none" stroke="transparent" stroke-width="10" />
		            </svg>
		            <svg>
		                <path stroke-linecap="round" id="arc2" fill="none" stroke="#fafafa" stroke-width="20" />
		            </svg>
		            <div class="step__progress__info">
		               	<div class="step__info__label">
							<?php if($gsp->data->total_points_until_today >= $gsp->data->total_points_expected_today){?>
		               		<!-- kondisi point telah ketemu goal -->
		               		<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 61.8 61.8" style="enable-background:new 0 0 61.8 61.8;" xml:space="preserve">
                                <style type="text/css">
                                    .st0{fill:#49C5FE;}
                                    .st1{fill:#49C5FE;stroke:#49C5FE;stroke-miterlimit:10;}
                                </style>
                                <title>icHelp</title>
                                <desc>Created with Sketch.</desc>
                                <title>icHelp</title>
                                <desc>Created with Sketch.</desc>
                                <g>
                                    <g>
                                        <g>
                                            <g>
                                                <path class="st0" d="M37.1,27.9c-0.7,0-1.2-0.6-1.2-1.3v-1.1c0-0.7,0.6-1.3,1.2-1.3h7.3c0.7,0,1.2,0.6,1.2,1.3v1.1
                                                    c0,0.7-0.6,1.3-1.2,1.3H37.1z M37.1,24.9c-0.3,0-0.5,0.3-0.5,0.6v1.1c0,0.3,0.2,0.6,0.5,0.6h7.3c0.3,0,0.5-0.3,0.5-0.6v-1.1
                                                    c0-0.3-0.2-0.6-0.5-0.6H37.1z"/>
                                                <path class="st0" d="M44.4,24.3c0.6,0,1.1,0.6,1.1,1.2v1.1c0,0.7-0.5,1.2-1.1,1.2h-7.3c-0.6,0-1.1-0.6-1.1-1.2v-1.1
                                                    c0-0.7,0.5-1.2,1.1-1.2H44.4 M37.1,27.3h7.3c0.3,0,0.6-0.3,0.6-0.7v-1.1c0-0.4-0.3-0.7-0.6-0.7h-7.3c-0.3,0-0.6,0.3-0.6,0.7v1.1
                                                    C36.4,27,36.7,27.3,37.1,27.3 M44.4,24.1h-7.3c-0.7,0-1.3,0.6-1.3,1.4v1.1c0,0.8,0.6,1.4,1.3,1.4h7.3c0.7,0,1.3-0.6,1.3-1.4
                                                    v-1.1C45.7,24.7,45.1,24.1,44.4,24.1L44.4,24.1z M37.1,27.1c-0.2,0-0.4-0.2-0.4-0.5v-1.1c0-0.3,0.2-0.5,0.4-0.5h7.3
                                                    c0.2,0,0.4,0.2,0.4,0.5v1.1c0,0.3-0.2,0.5-0.4,0.5H37.1L37.1,27.1z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path class="st0" d="M37.1,32.2c-0.7,0-1.2-0.6-1.2-1.3v-1.1c0-0.7,0.6-1.3,1.2-1.3h8.7c0.7,0,1.2,0.6,1.2,1.3v1.1
                                                    c0,0.7-0.6,1.3-1.2,1.3H37.1z M37.1,29.2c-0.3,0-0.5,0.3-0.5,0.6v1.1c0,0.3,0.2,0.6,0.5,0.6h8.7c0.3,0,0.5-0.3,0.5-0.6v-1.1
                                                    c0-0.3-0.2-0.6-0.5-0.6H37.1z"/>
                                                <path class="st0" d="M45.8,28.6c0.6,0,1.1,0.6,1.1,1.2v1.1c0,0.7-0.5,1.2-1.1,1.2h-8.7c-0.6,0-1.1-0.6-1.1-1.2v-1.1
                                                    c0-0.7,0.5-1.2,1.1-1.2H45.8 M37.1,31.6h8.7c0.3,0,0.6-0.3,0.6-0.7v-1.1c0-0.4-0.3-0.7-0.6-0.7h-8.7c-0.3,0-0.6,0.3-0.6,0.7v1.1
                                                    C36.5,31.3,36.8,31.6,37.1,31.6 M45.8,28.4h-8.7c-0.7,0-1.3,0.6-1.3,1.4v1.1c0,0.8,0.6,1.4,1.3,1.4h8.7c0.7,0,1.3-0.6,1.3-1.4
                                                    v-1.1C47.1,29,46.5,28.4,45.8,28.4L45.8,28.4z M37.1,31.4c-0.2,0-0.4-0.2-0.4-0.5v-1.1c0-0.3,0.2-0.5,0.4-0.5h8.7
                                                    c0.2,0,0.4,0.2,0.4,0.5v1.1c0,0.3-0.2,0.5-0.4,0.5H37.1L37.1,31.4z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path class="st0" d="M37.1,36.5c-0.7,0-1.2-0.6-1.2-1.3v-1.1c0-0.7,0.6-1.3,1.2-1.3h7.3c0.7,0,1.2,0.6,1.2,1.3v1.1
                                                    c0,0.7-0.6,1.3-1.2,1.3H37.1z M37.1,33.5c-0.3,0-0.5,0.3-0.5,0.6v1.1c0,0.3,0.2,0.6,0.5,0.6h7.3c0.3,0,0.5-0.3,0.5-0.6v-1.1
                                                    c0-0.3-0.2-0.6-0.5-0.6H37.1z"/>
                                                <path class="st0" d="M44.4,32.8c0.6,0,1.1,0.6,1.1,1.2v1.1c0,0.7-0.5,1.2-1.1,1.2h-7.3c-0.6,0-1.1-0.6-1.1-1.2v-1.1
                                                    c0-0.7,0.5-1.2,1.1-1.2H44.4 M37.1,35.8h7.3c0.3,0,0.6-0.3,0.6-0.7v-1.1c0-0.4-0.3-0.7-0.6-0.7h-7.3c-0.3,0-0.6,0.3-0.6,0.7v1.1
                                                    C36.4,35.5,36.7,35.8,37.1,35.8 M44.4,32.6h-7.3c-0.7,0-1.3,0.6-1.3,1.4v1.1c0,0.8,0.6,1.4,1.3,1.4h7.3c0.7,0,1.3-0.6,1.3-1.4
                                                    v-1.1C45.7,33.3,45.1,32.6,44.4,32.6L44.4,32.6z M37.1,35.6c-0.2,0-0.4-0.2-0.4-0.5v-1.1c0-0.3,0.2-0.5,0.4-0.5h7.3
                                                    c0.2,0,0.4,0.2,0.4,0.5v1.1c0,0.3-0.2,0.5-0.4,0.5H37.1L37.1,35.6z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path class="st0" d="M37.3,40.7c-0.7,0-1.2-0.6-1.2-1.3v-1.1c0-0.7,0.6-1.3,1.2-1.3h4.2c0.7,0,1.2,0.6,1.2,1.3v1.1
                                                    c0,0.7-0.6,1.3-1.2,1.3H37.3z M37.3,37.7c-0.3,0-0.5,0.3-0.5,0.6v1.1c0,0.3,0.2,0.6,0.5,0.6h4.2c0.3,0,0.5-0.3,0.5-0.6v-1.1
                                                    c0-0.3-0.2-0.6-0.5-0.6H37.3z"/>
                                                <path class="st0" d="M41.4,37.1c0.6,0,1.1,0.6,1.1,1.2v1.1c0,0.7-0.5,1.2-1.1,1.2h-4.2c-0.6,0-1.1-0.6-1.1-1.2v-1.1
                                                    c0-0.7,0.5-1.2,1.1-1.2H41.4 M37.3,40.1h4.2c0.3,0,0.6-0.3,0.6-0.7v-1.1c0-0.4-0.3-0.7-0.6-0.7h-4.2c-0.3,0-0.6,0.3-0.6,0.7v1.1
                                                    C36.6,39.8,36.9,40.1,37.3,40.1 M41.4,36.9h-4.2c-0.7,0-1.3,0.6-1.3,1.4v1.1c0,0.8,0.6,1.4,1.3,1.4h4.2c0.7,0,1.3-0.6,1.3-1.4
                                                    v-1.1C42.8,37.5,42.2,36.9,41.4,36.9L41.4,36.9z M37.3,39.9c-0.2,0-0.4-0.2-0.4-0.5v-1.1c0-0.3,0.2-0.5,0.4-0.5h4.2
                                                    c0.2,0,0.4,0.2,0.4,0.5v1.1c0,0.3-0.2,0.5-0.4,0.5H37.3L37.3,39.9z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path class="st0" d="M30.5,41.1c-2.3,0-4.3-0.6-5.7-1.1c-1.1-0.4-1.9-1.7-1.9-3.1v-8.3c0-1.2,0.7-2.2,1.7-2.7
                                                    c2.1-0.9,2.6-3.7,2.6-4.6c0-1.9,0.4-3.3,1.2-4c0.4-0.4,0.9-0.6,1.5-0.6c0.2,0,0.4,0,0.5,0.1c0.5,0.1,0.9,0.4,1.2,1
                                                    c1.1,1.9,0.4,5.9,0.2,7.3h3.2c0.2,0,0.3,0.2,0.3,0.4s-0.2,0.4-0.3,0.4h-3.6c-0.1,0-0.2-0.1-0.3-0.1c-0.1-0.1-0.1-0.2-0.1-0.3
                                                    c0-0.1,1.1-5.3,0-7.2c-0.2-0.4-0.5-0.6-0.8-0.6c-0.1,0-0.3,0-0.4,0c-0.4,0-0.7,0.1-1,0.4c-0.6,0.6-0.9,1.8-0.9,3.5
                                                    c0,1.1-0.5,4.3-3,5.3c-0.7,0.3-1.2,1.1-1.2,2v8.3c0,1.1,0.6,2,1.5,2.4c1.3,0.5,3.2,1.1,5.4,1.1c1.6,0,3-0.3,4.3-0.9
                                                    c0,0,0.1,0,0.1,0c0.1,0,0.3,0.1,0.3,0.2c0.1,0.2,0,0.4-0.2,0.5C33.7,40.8,32.1,41.1,30.5,41.1z"/>
                                                <path class="st0" d="M29.8,16.7c0.2,0,0.3,0,0.5,0.1c0.5,0.1,0.9,0.4,1.2,0.9c1.1,1.9,0.4,6.1,0.2,7.4h3.3
                                                    c0.1,0,0.2,0.1,0.2,0.3c0,0.2-0.1,0.3-0.2,0.3h-3.6c-0.1,0-0.1,0-0.2-0.1c0-0.1-0.1-0.2,0-0.2c0-0.1,1.1-5.3,0-7.3
                                                    c-0.2-0.4-0.5-0.6-0.9-0.7c-0.1,0-0.3,0-0.4,0c-0.4,0-0.8,0.1-1.1,0.4c-0.6,0.6-1,1.8-1,3.5c0,1.1-0.5,4.2-2.9,5.3
                                                    c-0.8,0.3-1.3,1.1-1.3,2.1v8.3c0,1.1,0.6,2.1,1.5,2.5c1.3,0.5,3.3,1.1,5.5,1.1c1.4,0,2.9-0.2,4.4-0.9c0,0,0.1,0,0.1,0
                                                    c0.1,0,0.2,0.1,0.2,0.2c0.1,0.1,0,0.3-0.1,0.4c-1.5,0.7-3.1,1-4.6,1c-2.3,0-4.3-0.6-5.6-1.1c-1.1-0.4-1.9-1.6-1.9-3v-8.3
                                                    c0-1.1,0.6-2.2,1.6-2.6c2.1-0.9,2.6-3.8,2.6-4.7c0-1.9,0.4-3.3,1.1-4C28.8,16.9,29.2,16.7,29.8,16.7 M29.8,16.5
                                                    c-0.6,0-1.1,0.2-1.5,0.6c-0.8,0.8-1.2,2.2-1.2,4.1c0,0.9-0.5,3.7-2.5,4.6c-1,0.5-1.7,1.5-1.7,2.8v8.3c0,1.4,0.8,2.7,2,3.2
                                                    c1.3,0.5,3.4,1.1,5.7,1.1c1.7,0,3.2-0.3,4.7-1c0.2-0.1,0.3-0.4,0.2-0.6c-0.1-0.2-0.2-0.3-0.4-0.3c-0.1,0-0.1,0-0.2,0
                                                    c-1.3,0.6-2.7,0.9-4.3,0.9c-2.2,0-4.1-0.6-5.4-1.1c-0.8-0.3-1.4-1.2-1.4-2.3v-8.3c0-0.8,0.5-1.6,1.2-1.9
                                                    c2.5-1.1,3.1-4.3,3.1-5.4c0-1.7,0.3-2.8,0.9-3.4c0.3-0.3,0.6-0.4,0.9-0.4c0.1,0,0.3,0,0.4,0c0.3,0.1,0.5,0.3,0.7,0.6
                                                    c1.1,1.9,0,7.1,0,7.2c0,0.1,0,0.3,0.1,0.4c0.1,0.1,0.2,0.2,0.4,0.2h3.6c0.2,0,0.4-0.2,0.4-0.5c0-0.3-0.2-0.5-0.4-0.5h-3
                                                    c0.3-1.5,0.8-5.4-0.2-7.3c-0.3-0.6-0.8-0.9-1.3-1C30.1,16.5,29.9,16.5,29.8,16.5L29.8,16.5z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path class="st0" d="M17.7,40.6c-0.8,0-1.5-0.7-1.5-1.6v-11c0-0.9,0.7-1.6,1.5-1.6h2.9c0.8,0,1.5,0.7,1.5,1.6v11
                                                    c0,0.9-0.7,1.6-1.5,1.6H17.7z M17.7,27c-0.5,0-0.9,0.4-0.9,0.9v11c0,0.5,0.4,0.9,0.9,0.9h2.9c0.5,0,0.9-0.4,0.9-0.9v-11
                                                    c0-0.5-0.4-0.9-0.9-0.9H17.7z"/>
                                                <path class="st0" d="M20.7,26.3c0.8,0,1.4,0.7,1.4,1.5v11c0,0.9-0.6,1.5-1.4,1.5h-2.9c-0.8,0-1.4-0.7-1.4-1.5v-11
                                                    c0-0.9,0.6-1.5,1.4-1.5H20.7 M17.7,39.9h2.9c0.5,0,1-0.5,1-1v-11c0-0.6-0.4-1-1-1h-2.9c-0.5,0-1,0.5-1,1v11
                                                    C16.8,39.5,17.2,39.9,17.7,39.9 M20.7,26.2h-2.9c-0.9,0-1.6,0.8-1.6,1.7v11c0,1,0.7,1.7,1.6,1.7h2.9c0.9,0,1.6-0.8,1.6-1.7v-11
                                                    C22.3,26.9,21.6,26.2,20.7,26.2L20.7,26.2z M17.7,39.7c-0.4,0-0.8-0.4-0.8-0.8v-11c0-0.5,0.3-0.8,0.8-0.8h2.9
                                                    c0.4,0,0.8,0.4,0.8,0.8v11c0,0.5-0.3,0.8-0.8,0.8H17.7L17.7,39.7z"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
							<?php }else{?>
                            <!-- kondisi point belom ketemu goal -->
                            <h5><?php echo ($gsp->data->total_points_expected_today - $gsp->data->total_points_until_today);?></br>Points to Goal</h5>
							<?php } ?>
		               	</div>
		            </div>
				</div>
		  	</div>
			<?php if($gsp->data->total_points_until_today >= $gsp->data->total_points_expected_today){?>
				<!-- kondisi point telah ketemu goal -->
  			<h5 class="trn" data-trn-key="congratulation">Congratulation!</h5>
			<?php }else{?>
				<!-- kondisi point belom ketemu goal -->
				<h5 class="trn" data-trn-key="keepup">Keep up the good work!</h5>
			<?php } ?>
		</div>
		<!-- end daily progress donut graph -->
	</div>
	<div class="study__dashboard__bottom">
		<!-- comprehension graph -->
		<div class="study__progress__graph">
			<h5 class="trn" data-trn-key="comprehension">Comprehension</h5>
			<div class="graph__wrap">
			  	<div class="bar__graph">
			    	<ul class="graph b2">
			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($gwp->data[0]->comprehension_grammar >125){echo "125";}else{echo $gwp->data[0]->comprehension_grammar;}?>">
			          		<span class="graph__legend trn" data-trn-key="now">Now</span>
			        		<label><?php echo strtok($gwp->data[0]->comprehension_grammar, '.');?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($gwp->data[1]->comprehension_grammar >125){echo "125";}else{echo $gwp->data[1]->comprehension_grammar;}?>">
			          		<span class="graph__legend">w 1</span>
			        		<label><?php echo strtok($gwp->data[1]->comprehension_grammar, '.');?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($gwp->data[2]->comprehension_grammar >125){echo "125";}else{echo $gwp->data[2]->comprehension_grammar;}?>">
			          		<span class="graph__legend">w 2</span>
			        		<label><?php echo strtok($gwp->data[2]->comprehension_grammar, '.');?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($gwp->data[3]->comprehension_grammar >125){echo "125";}else{echo $gwp->data[3]->comprehension_grammar;}?>">
			          		<span class="graph__legend">w 3</span>
			        		<label><?php echo strtok($gwp->data[3]->comprehension_grammar, '.');?></label>
			        		</li>
			      		</span>

			      		<div class="v__bar">
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			      		</div>
			    	</ul>
			  	</div>
			</div>
		</div>
		<!-- end comprehension graph -->

		<!-- pronunciation graph -->
		<div class="study__progress__graph">
			<h5 class="trn" data-trn-key="pronun">Pronunciation</h5>
			<div class="graph__wrap">
			  	<div class="bar__graph">
			    	<ul class="graph b2">
			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($gwp->data[0]->pronunciation >125){echo "125";}else{echo $gwp->data[0]->pronunciation;}?>">
			          		<span class="graph__legend trn" data-trn-key="now">Now</span>
			        		<label><?php echo strtok($gwp->data[0]->pronunciation, '.');?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($gwp->data[1]->pronunciation >125){echo "125";}else{echo $gwp->data[1]->pronunciation;}?>">
			          		<span class="graph__legend">w 1</span>
			        		<label><?php echo strtok($gwp->data[1]->pronunciation, '.');?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($gwp->data[2]->pronunciation >125){echo "125";}else{echo $gwp->data[2]->pronunciation;}?>">
			          		<span class="graph__legend">w 2</span>
			        		<label><?php echo strtok($gwp->data[2]->pronunciation, '.');?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($gwp->data[3]->pronunciation >125){echo "125";}else{echo $gwp->data[3]->pronunciation;}?>">
			          		<span class="graph__legend">w 3</span>
			        		<label><?php echo strtok($gwp->data[3]->pronunciation, '.');?></label>
			        		</li>
			      		</span>

			      		<div class="v__bar">
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			      		</div>
			    	</ul>
			  	</div>
			</div>
		</div>
		<!-- end pronunciation graph -->

		<!-- listening graph -->
		<div class="study__progress__graph">
			<h5 class="trn" data-trn-key="listening">Listening</h5>
			<div class="graph__wrap">
			  	<div class="bar__graph">
			    	<ul class="graph b2">
			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($gwp->data[0]->listening >125){echo "125";}else{echo $gwp->data[0]->listening;}?>">
			          		<span class="graph__legend trn" data-trn-key="now">Now</span>
			        		<label><?php echo strtok($gwp->data[0]->listening, '.');?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($gwp->data[1]->listening >125){echo "125";}else{echo $gwp->data[1]->listening;}?>">
			          		<span class="graph__legend">w 1</span>
			        		<label><?php echo strtok($gwp->data[1]->listening, '.');?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($gwp->data[2]->listening >125){echo "125";}else{echo $gwp->data[2]->listening;}?>">
			          		<span class="graph__legend">w 2</span>
			        		<label><?php echo strtok($gwp->data[2]->listening, '.');?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($gwp->data[3]->listening >125){echo "125";}else{echo $gwp->data[3]->listening;}?>">
			          		<span class="graph__legend">w 3</span>
			        		<label><?php echo strtok($gwp->data[3]->listening, '.');?></label>
			        		</li>
			      		</span>

			      		<div class="v__bar">
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			      		</div>
			    	</ul>
			  	</div>
			</div>
		</div>
		<!-- end listening graph -->

		<!-- speaking graph -->
		<div class="study__progress__graph">
			<h5 class="trn" data-trn-key="speaking">Speaking</h5>
			<div class="graph__wrap">
			  	<div class="bar__graph">
			    	<ul class="graph b2">
			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($gwp->data[0]->speaking >125){echo "125";}else{echo $gwp->data[0]->speaking;}?>">
			          		<span class="graph__legend trn" data-trn-key="now">Now</span>
			        		<label>
									<?php echo strtok($gwp->data[0]->speaking, '.');?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($gwp->data[1]->speaking >125){echo "125";}else{echo $gwp->data[1]->speaking;}?>">
			          		<span class="graph__legend">w 1</span>
			        		<label>
									<?php echo strtok($gwp->data[1]->speaking, '.');?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php if($gwp->data[2]->speaking >125){echo "125";}else{echo $gwp->data[2]->speaking;}?>">
			          		<span class="graph__legend">w 2</span>
			        		<label>
									<?php echo strtok($gwp->data[2]->speaking, '.');?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="
									<?php if($gwp->data[3]->speaking >125){echo "125";}else{echo $gwp->data[3]->speaking;}?>">
			          		<span class="graph__legend">w 3</span>
			        		<label>
									<?php echo strtok($gwp->data[3]->speaking, '.');?></label>
			        		</li>
			      		</span>

			      		<div class="v__bar">
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			        		<div class="v__line"></div>
			      		</div>
			    	</ul>
			  	</div>
			</div>
		</div>
		<!-- end speaking graph -->
	</div>

	<div class="progress__step last__upd">
		<span class="trn" data-trn-key="lastupdate">Last updated on: </span><?php echo $echo_upd;?>
		<p class="btn_u_sd trn" data-trn-key="update">Update</p>
	</div>
</section>
</main>

<!-- <div class="page__loader" id='loading'>
    <div class="loader" id="loader">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <span class="trn" data-trn-key="updatingyour">Updating your study dashboard...</span>
</div> -->

<div class="page__loader">
    <div class="loader" id="loader">
        <span></span>
        <span></span>
        <span></span>
    </div>
    Updating your study dashboard...
</div>
<!-- <div class="page__loader" id='updated'>
		<i class="fa fa-check-circle fa-5x" aria-hidden="true" style="color: #a5f3c9;"></i>
    <font style="color: #a5f3c9;font-size:20px;">Success</font> <br>
		Please reload the page to see changes.
</div> -->
<div class="page__loader trn" id='inserted' data-trn-key="sccess">
    Success
</div>
<!-- ClickUpdate -->
<script>

$(window).ready(function(){
	update_study();
});
function update_study(){
	$.ajax({
	 type:"POST",
	 url:"<?php echo site_url('b2c/student/study_dashboard/update_studyprog');?>",
	 success: function(data){
			// $('.page__loader').hide();
			 //document.getElementById('chat_audio').play();
			//  $('#isi_chat').html(data);
			 // console.log(data);
			 // console.log('update');
			 data_checker();
		 }
	});
}

function data_checker(){ setInterval(
	function(){
		$.get('<?php echo site_url('b2c/student/study_dashboard/check_study');?>', function(data){
			// console.log('checker');
			// console.log(data);
			if(data == '1'){
				$('.page__loader').css('display', 'flex').delay(3000).queue(function(){
					// alert('kj')
					location.reload();
				});
				// location.reload();
			}
		})
	},1000)
}
</script>

<script>
$(".btn_u_sd").click(function() {
	$('#loading').css('display', 'flex');
	$.ajax({
	 type:"POST",
	 url:"<?php echo site_url('b2c/student/study_dashboard/update_studyprog');?>",
	 success: function(data){
	    $('#loading').hide();
			if(data == '1'){
				$('#updated').css('display', 'flex');
			}else if(data == '2'){
				$('#inserted').css('display', 'flex');
			}
			window.location.href="<?php echo site_url('b2c/student/study_dashboard');?>";
	     // console.log(data);
	   }
	});
});
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/b2c/js/circle-progress.js"></script>

<script>
	// lingkaran bulat pertama

	var innerupcoach   = '<?php echo $gsp->data->coach->points_until_today;?>';
	var innerdowncoach = '<?php echo $gsp->data->coach->points_to_pass;?>';
	var innerperccoach = innerupcoach / innerdowncoach;

	var outter = $('.outter--circle.circle');
	outter.circleProgress({
    startAngle: -Math.PI / 2,
    value: innerperccoach,
    lineCap: 'round',
    fill: {gradient: ['green', 'yellow']}
});

var inner = $('.inner--circle.circle');

var innerup   = '<?php echo $gsp->data->study->points_until_today;?>';
var innerdown = '<?php echo $gsp->data->study->points_to_pass;?>';
var innerperc = innerup / innerdown;
// console.log(innerperc);
inner.circleProgress({
    startAngle: -Math.PI / 2,
    value: innerperc,
    // value: 0.3,
    lineCap: 'round',
    fill: {gradient: ['#49c0fe', '#4b80fc']}
});

// daily step progress
var step = $('.step--circle.circle');

    var stepVal = '<?php echo $gsp->data->percentage_points;?>';

    var titikVal = '<?php echo $gsp->data->percentage_days;?>';

    var newstepVal = stepVal/100;
    var newtitikVal = titikVal/100;

    if (titikVal >= 100) {
    	titikVal = 100;		//To prevent the dial to overlap
  	}

	step.circleProgress({
	    startAngle: -Math.PI / 2,
	    value: newstepVal,
	    lineCap: 'round',
	    fill: {gradient: ['#5f6b8e', '#bcc2d3']}
	});
      // circle step value condition to meet the goal

      if(newstepVal >= newtitikVal) {
          step.circleProgress({
              fill: {gradient: ['green', 'yellow']}
          });
      }

      // Source https://jsbin.com/yaqaxotete/edit?html,css,js,output
      function polarToCartesian(centerX, centerY, radius, angleInDegrees) {
        var angleInRadians = (angleInDegrees + 90);
        var dailyGoal = (angleInRadians + 360 / 100 * titikVal) * Math.PI / 180.0; //where to put the goal value
        return {
          x: centerX + (radius * Math.cos(dailyGoal)),
          y: centerY + (radius * Math.sin(dailyGoal))
        };
      }

      function describeArc(x, y, radius, startAngle, endAngle){
          var start = polarToCartesian(x, y, radius, endAngle);
          var end = polarToCartesian(x, y, radius, startAngle);
          var arcSweep = endAngle - startAngle <= 180 ? "0" : "1";
          var d = [
              "M", start.x, start.y,
              "A", radius, radius, 0, arcSweep, 0, end.x, end.y
          ].join(" ");
          return d;
      }

      window.onload = function() {
        document.getElementById("arc1").setAttribute("d", describeArc(80, 80, 67, 180, 539));
        document.getElementById("arc2").setAttribute("d", describeArc(80, 80, 67, 180, 180));

      };
</script>
