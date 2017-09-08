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

				<div class="progress__info__label"><?php echo $gsp->data->total_points_until_today;?></div>
		  	</div>

		  	<div class="progress__achievement">
		  		<div class="study__progress__achievement">
		  			<div class="bullet__achievement <?php echo $mt_color['mt1']; ?>"></div>
		  			<div class="bullet__achievement <?php echo $mt_color['mt2']; ?>"></div>
		  			<div class="bullet__achievement <?php echo $mt_color['mt3']; ?>"></div>
		  			<div class="bullet__achievement <?php echo $mt_color['mt4']; ?>"></div>
		  			<div class="bullet__achievement <?php echo $mt_color['mt5']; ?>"></div>
		  			<div class="bullet__achievement <?php echo $mt_color['mt6']; ?>"></div>

		  			<div class="achievement__point__info">
		  				<h5><?php echo $gsp->data->study_points_until_today;?></h5>
		  				<h3>Study</h3>
		  			</div>
		  		</div>
		  		<div class="coach__progress__achievement">
		  			<div class="bullet__achievement bg-green-gradient"></div>
		  			<div class="bullet__achievement bg-green-gradient"></div>
		  			<div class="bullet__achievement bg-green-gradient"></div>
		  			<div class="bullet__achievement bg-green-gradient"></div>
		  			<div class="bullet__achievement bg-red-gradient"></div>
		  			<div class="bullet__achievement"></div>
		  			<div class="bullet__achievement"></div>
		  			<div class="bullet__achievement"></div>
		  			<div class="bullet__achievement"></div>
		  			<div class="bullet__achievement"></div>
		  			<div class="bullet__achievement"></div>
		  			<div class="bullet__achievement"></div>
		  			<div class="bullet__achievement"></div>
		  			<div class="bullet__achievement"></div>
		  			<div class="bullet__achievement"></div>
		  			<div class="bullet__achievement"></div>
		  			<div class="bullet__achievement"></div>
		  			<div class="bullet__achievement"></div>

		  			<div class="achievement__point__info">
		  				<h5><?php echo $gsp->data->coach_points_until_today;?></h5>
		  				<h3>Coach</h3>
		  			</div>
		  		</div>
		  	</div>
		</div>
		<!-- end achievement goal step -->

		<!-- top point graph -->
		<div class="progress__point__top">
			<h5>Points</h5>
			<div class="graph__wrap">
			  	<div class="bar__graph">
						<?php
						$bar_now = ( $gwp->data[0]->points_goal == 0 ? 0 : $gwp->data[0]->points / $gwp->data[0]->points_goal);
						$bar_w1  = ( $gwp->data[1]->points_goal == 0 ? 0 : $gwp->data[1]->points / $gwp->data[1]->points_goal);
						$bar_w2  = ( $gwp->data[2]->points_goal == 0 ? 0 : $gwp->data[2]->points / $gwp->data[2]->points_goal);
						$bar_w3  = ( $gwp->data[3]->points_goal == 0 ? 0 : $gwp->data[3]->points / $gwp->data[3]->points_goal);
						?>
			    	<ul class="graph b2">
			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $bar_now; ?>">
			          		<span class="graph__legend">Now</span>
			          		<label><?php echo $gwp->data[0]->points;?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $bar_w1; ?>">
			          		<span class="graph__legend">w 1</span>
			          		<label><?php echo $gwp->data[1]->points;?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $bar_w2; ?>">
			          		<span class="graph__legend">w 2</span>
			          		<label><?php echo $gwp->data[2]->points;?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $bar_w3; ?>">
			          		<span class="graph__legend">w 3</span>
			          		<label><?php echo $gwp->data[3]->points;?></label>
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
                  <h5>Progress to goals</h5>
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
                  <div class="step__info__label"><?php echo ($gsp->data->total_points_expected_today - $gsp->data->total_points_until_today);?></div>
              </div>
					</div>
		  	</div>
      	<h5><font><?php echo ($gsp->data->total_points_to_pass - $gsp->data->total_points_until_today);?></font> points left</h5>
		</div>
		<!-- end daily progress donut graph -->
	</div>
	<div class="study__dashboard__bottom">
		<!-- comprehension graph -->
		<div class="study__progress__graph">
			<h5>Comprehension</h5>
			<div class="graph__wrap">
			  	<div class="bar__graph">
			    	<ul class="graph b2">
			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $gwp->data[0]->comprehension_grammar;?>">
			          		<span class="graph__legend">Now</span>
			        		<label><?php echo $gwp->data[0]->comprehension_grammar;?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $gwp->data[1]->comprehension_grammar;?>">
			          		<span class="graph__legend">w 1</span>
			        		<label><?php echo $gwp->data[1]->comprehension_grammar;?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $gwp->data[2]->comprehension_grammar;?>">
			          		<span class="graph__legend">w 2</span>
			        		<label><?php echo $gwp->data[2]->comprehension_grammar;?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $gwp->data[3]->comprehension_grammar;?>">
			          		<span class="graph__legend">w 3</span>
			        		<label><?php echo $gwp->data[3]->comprehension_grammar;?></label>
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
			<h5>Pronunciation</h5>
			<div class="graph__wrap">
			  	<div class="bar__graph">
			    	<ul class="graph b2">
			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $gwp->data[0]->pronunciation;?>">
			          		<span class="graph__legend">Now</span>
			        		<label><?php echo $gwp->data[0]->pronunciation;?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $gwp->data[1]->pronunciation;?>">
			          		<span class="graph__legend">w 1</span>
			        		<label><?php echo $gwp->data[1]->pronunciation;?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $gwp->data[2]->pronunciation;?>">
			          		<span class="graph__legend">w 2</span>
			        		<label><?php echo $gwp->data[2]->pronunciation;?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $gwp->data[3]->pronunciation;?>">
			          		<span class="graph__legend">w 3</span>
			        		<label><?php echo $gwp->data[3]->pronunciation;?></label>
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
			<h5>Listening</h5>
			<div class="graph__wrap">
			  	<div class="bar__graph">
			    	<ul class="graph b2">
			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $gwp->data[0]->listening;?>">
			          		<span class="graph__legend">Now</span>
			        		<label><?php echo $gwp->data[0]->listening;?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $gwp->data[1]->listening;?>">
			          		<span class="graph__legend">w 1</span>
			        		<label><?php echo $gwp->data[1]->listening;?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $gwp->data[2]->listening;?>">
			          		<span class="graph__legend">w 2</span>
			        		<label><?php echo $gwp->data[2]->listening;?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $gwp->data[3]->listening;?>">
			          		<span class="graph__legend">w 3</span>
			        		<label><?php echo $gwp->data[3]->listening;?></label>
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
			<h5>Speaking</h5>
			<div class="graph__wrap">
			  	<div class="bar__graph">
			    	<ul class="graph b2">
			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $gwp->data[0]->speaking;?>">
			          		<span class="graph__legend">Now</span>
			        		<label><?php echo $gwp->data[0]->speaking;?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $gwp->data[1]->speaking;?>">
			          		<span class="graph__legend">w 1</span>
			        		<label><?php echo $gwp->data[1]->speaking;?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $gwp->data[2]->speaking;?>">
			          		<span class="graph__legend">w 2</span>
			        		<label><?php echo $gwp->data[2]->speaking;?></label>
			        		</li>
			      		</span>

			      		<span class="graph__bar__cont">
			        		<li class="graph__bar__each" data-value="<?php echo $gwp->data[3]->speaking;?>">
			          		<span class="graph__legend">w 3</span>
			        		<label><?php echo $gwp->data[3]->speaking;?></label>
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
</section>
</main>

<script type="text/javascript" src="<?php echo base_url();?>assets/b2c/js/circle-progress.js"></script>

<script>

	var outter = $('.outter--circle.circle');
outter.circleProgress({
    startAngle: -Math.PI / 2,
    value: 0.9,
    lineCap: 'round',
    fill: {gradient: ['green', 'yellow']}
});

var inner = $('.inner--circle.circle');

var innerup   = '<?php echo $gsp->data->total_points_until_today;?>';
var innerdown = '<?php echo $gsp->data->study_points_to_pass;?>';
var innerperc = innerup / innerdown;
// console.log(innerperc);
inner.circleProgress({
    startAngle: -Math.PI / 2,
    value: innerperc,
    lineCap: 'round',
    fill: {gradient: ['#49c0fe', '#4b80fc']}
});

// daily step progress
var step = $('.step--circle.circle');
      var stepVal = 0.6 // circle step value
step.circleProgress({
    startAngle: -Math.PI / 2,
    value: stepVal,
    lineCap: 'round',
    fill: {gradient: ['#5f6b8e', '#bcc2d3']}
});
      // circle step value condition to meet the goal
      if(stepVal >= 0.4) {
          step.circleProgress({
              fill: {gradient: ['green', 'yellow']}
          });
      }

      // Source https://jsbin.com/yaqaxotete/edit?html,css,js,output
      function polarToCartesian(centerX, centerY, radius, angleInDegrees) {
        var angleInRadians = (angleInDegrees + 90);
        var dailyGoal = (angleInRadians + 360 / 100 * 40) * Math.PI / 180.0; //where to put the goal value
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
