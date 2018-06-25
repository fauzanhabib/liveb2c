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
                        <a href="<?php echo site_url('b2c/student/find_coaches/single_date'); ?>"> 
                            <div class="bookkacoach activediv trn" data-trn-key="bookcoach">Book a Coach</div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/session'); ?>">
                            <div class="session trn" data-trn-key="session">Session</div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/token'); ?>">
                            <div class="token trn" data-trn-key="tokens">Token</div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/help'); ?>">
                            <div class="help trn" data-trn-key="help">Help</div>
                        </a>
                    </div>

                    <!-- web display -->
                    <div class="dashboard__bookacoach">
                        <div class="booking__tabs tabs">
                            <div class="c-dropdown__item trn current" data-tab="tab-1" data-dropdown-value="Name" data-trn-key="name1">NAME</div>
                            <div class="c-dropdown__item trn" data-tab="tab-2" data-dropdown-value="Date" data-trn-key="date1">DATE</div>
                            <div class="c-dropdown__item trn" data-tab="tab-3" data-dropdown-value="Country" data-trn-key="country1">COUNTRY</div>
                            <div class="c-dropdown__item trn" data-tab="tab-4" data-dropdown-value="Language" data-trn-key="language1">LANGUAGE</div>
                        </div>

                        <div id="tab-1" class="tab-content alt1 current">
                            <?php echo form_open('b2c/student/find_coaches/search/name', 'class="pure-form search-b-2 margin-auto border-2-primary border-rounded-5 width100perc"'); ?>
                            <div class="bookcoach__flexing">
                                <input type="text" name="name" class="trn"  placeholder=" Search Coach..." data-trn-holder="searchcoach">
                                <div class="btnsearch">
                                    <button type="submit" class="neobutton trn" data-trn-key="searchcoach1">Search Coach</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>

                        <div id="tab-2" class="tab-content alt2 hide">
                            <?php echo form_open('b2c/student/find_coaches/book_by_single_date', 'id="date_value" role="form" class="pure-g pure-form"'); ?>
                            <div class="recurring__book">
                                <div class="bycountry" style="padding: 0 15px;">
                                    <div class='border-2-primary border-rounded-5'>
                                        <span class='custom-dropdown'>
                                            <select class="select--recurring" name="selector" id="selector" style="width:100%;">
                                                <option class="trn" disabled selected data-trn-key="typebook">Booking Type</option>
                                                <option class="trn" value="single-book" data-trn-key="singlebook">Single Book</option>
                                                <option class="trn" value="multiple-book" data-trn-key="multiplebook">Recurring Book</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="bycountry" id="multi-book2" style="padding: 10px 15px 0;">
                                    <div class='border-2-primary border-rounded-5'>
                                        <span class='custom-dropdown'>
                                            <select class="select--recurring" name="type_booking" style="width:100%;">
                                                <option value="2" selected>2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="bookcoach__flexing">
                                <input type="text" name="date" id="datepicker" autocomplete="off" placeholder="Date.." class="dateavailable datepicker trn" data-trn-holder="searchdate">
                                <style>
                                    #ui-datepicker-div {
                                        top: 0!important;
                                        left: -140px!important;
                                    }
                                </style>
                                <div class="datepicker__here"></div>
                                <div class="btnsearch">
                                    <button type="submit" class="neobutton trn" data-trn-key="searchcoach1">Search Coach</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>

                        <div id="tab-3" class="tab-content alt3 hide">
                            <div class="bookcoach__flexing">
                                <div class="bycountry">
                                    <div class="c-dropdown js-dropdown">
                                        <?php echo form_open('b2c/student/find_coaches/search/country', 'class="pure-form search-b-2 margin-auto border-2-primary border-rounded-5 width100perc"'); ?>
                                        <input type="hidden" name="country" id="country" class="js-dropdown__input">
                                        <span class="c-button c-button--dropdown js-dropdown__current trn" data-trn-key="searchcountry">Country..</span>
                                        <ul class="c-dropdown__list">
                                            <!-- <li class="c-dropdown__item" data-dropdown-value="Indonesia">Indonesia</li>
                                            <li class="c-dropdown__item" data-dropdown-value="India">India</li>
                                            <li class="c-dropdown__item" data-dropdown-value="Prancis">Prancis</li>
                                            <li class="c-dropdown__item" data-dropdown-value="Portugal">Portugal</li>
                                            <li class="c-dropdown__item" data-dropdown-value="Jepang">Jepang</li> -->
                                            <?php foreach($countrylist as $cl){ ?>
                                            <li class="c-dropdown__item" data-dropdown-value="<?php echo $cl; ?>"><?php echo $cl; ?></li>
                                            <? } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="btnsearch">
                                    <button type="submit" class="neobutton trn" data-trn-key="searchcoach1">Search Coach</button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>

                        <div id="tab-4" class="tab-content alt4 hide">
                            <div class="bookcoach__flexing">
                                <div class="bylanguage">
                                    <div class="c-dropdown js-dropdown">
                                        <?php echo form_open('b2c/student/find_coaches/search/spoken_language', 'class="pure-form search-b-2 margin-auto border-2-primary border-rounded-5 width100perc"'); ?>
                                        <input type="hidden" name="language" id="language" class="js-dropdown__input">
                                        <span class="c-button c-button--dropdown js-dropdown__current trn" data-trn-key="searchlanguage">Language..</span>
                                        <ul class="c-dropdown__list">
                                            <!-- <li class="c-dropdown__item" data-dropdown-value="Indonesia">Indonesia</li>
                                            <li class="c-dropdown__item" data-dropdown-value="India">India</li>
                                            <li class="c-dropdown__item" data-dropdown-value="Prancis">Prancis</li>
                                            <li class="c-dropdown__item" data-dropdown-value="Portugal">Portugal</li>
                                            <li class="c-dropdown__item" data-dropdown-value="Jepang">Jepang</li> -->
                                            <?php foreach($languagelist as $ll){ ?>
                                            <li class="c-dropdown__item" data-dropdown-value="<?php echo $ll; ?>"><?php echo $ll; ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="btnsearch">
                                    <button type="submit" class="neobutton trn" data-trn-key="searchcoach1">Search Coach</button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script>
            $(function(){
                $('#multi-book2').hide(); 
                $('#selector').change(function(){
                    if($('#selector').val() == 'multiple-book') {
                        $('#multi-book2').show(); 
                    } else {
                        $('#multi-book2').hide(); 
                    } 
                });
            });
        </script>
        <script>
            $("#datepicker").each(function() {
                $(this).datepicker({
                    minDate: 0,
                    beforeShow:function(textbox, instance){
                        $('.datepicker__here').append($('#ui-datepicker-div'));
                        $('#ui-datepicker-div').hide();
                    }
                });
            });

            //DROPDOWN COUNTRY AND LANGUAGES BOOKING A COACH
            (function($, window, document, undefined) {

                'use strict';

                var $html = $('html');

                $html.on('click.ui.dropdown', '.js-dropdown', function(e) {
                    e.preventDefault();
                    $(this).toggleClass('is-open');
                });

                $html.on('click.ui.dropdown', '.js-dropdown [data-dropdown-value]', function(e) {
                    e.preventDefault();
                    var $item = $(this);
                    var $dropdown = $item.parents('.js-dropdown');
                    $dropdown.find('.js-dropdown__input').val($item.data('dropdown-value'));
                    $dropdown.find('.js-dropdown__current').text($item.text());
                });

                $html.on('click.ui.dropdown', function(e) {
                    var $target = $(e.target);
                    if (!$target.parents().hasClass('js-dropdown')) {
                        $('.js-dropdown').removeClass('is-open');
                    }
                });

            })(jQuery, window, document);
        </script>
        <script type="text/javascript">
        //     $(function () {
        //     var now = new Date();
        //     var day = ("0" + (now.getDate() + 1)).slice(-2);
        //     var month = ("0" + (now.getMonth() + 1)).slice(-2);
        //     var resultDate = now.getFullYear() + "-" + (month) + "-" + (day);
        //     $('.datepicker').datepicker({
        //     startDate: resultDate,
        //     format: 'yyyy-mm-dd',
        //     autoclose: true,
        //     });
        //         $('.dateavailable').change(function(){
        //         $('.dateavailable').parsley().reset();
        //     });
        // });
    
        document.getElementById("datepicker").onchange = function() {
            // console.log(this.value);
            var date = this.value;
            var newdate = date.split('/');
            var dateformat = newdate[2]+'-'+newdate[0]+'-'+newdate[1];
            // console.log(dateformat);
            var newurl = "<?php echo site_url('b2c/student/find_coaches/book_by_single_date'); ?>"+"/"+dateformat;
            $('#date_value').attr('action', newurl);
        };

        </script>