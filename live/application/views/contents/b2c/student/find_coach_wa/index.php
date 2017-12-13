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
                    <span>You Have <?php echo count($datasession); ?> Session Left For Today</span>
                    <?php }else{ ?>
                    <span>You Have <?php echo count($datasession); ?> Sessions Left For Today</span>
                    <?php } ?>
                    <i class="fa fa-times"></i>
                </div>
                <?php } ?>

                <div class="dashboard">
                    <div class="dashboard__menubookingcoachresult">
                        <a href="<?php echo site_url('b2c/student/find_coaches_wa/single_date'); ?>">
                            <div class="bookkacoach activediv">Book a Coach</div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/session_wa'); ?>">
                            <div class="session ">Session</div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/token_wa'); ?>">
                            <div class="token">Token</div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/help_wa'); ?>">
                            <div class="help">Help</div>
                        </a>
                    </div>

                    <!-- web display -->
                    <div class="dashboard__bookacoach">
                        <div class="booking__tabs tabs">
                            <div class="c-dropdown__item current" data-tab="tab-1" data-dropdown-value="Name">NAME</div>
                            <div class="c-dropdown__item" data-tab="tab-2" data-dropdown-value="Date">DATE</div>
                            <div class="c-dropdown__item" data-tab="tab-3" data-dropdown-value="Country">COUNTRY</div>
                            <div class="c-dropdown__item" data-tab="tab-4" data-dropdown-value="Language">LANGUAGE</div>
                        </div>

                        <div id="tab-1" class="tab-content alt1 current">
                            <?php echo form_open('b2c/student/find_coaches_wa/search/name', 'class="pure-form search-b-2 margin-auto border-2-primary border-rounded-5 width100perc"'); ?>
                            <div class="bookcoach__flexing">
                                <input type="text" name="name" placeholder=" Search Coach...">
                                <div class="btnsearch">
                                    <button type="submit" class="neobutton ">Search Coach</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>

                        <div id="tab-2" class="tab-content alt2 hide">
                            <?php echo form_open('b2c/student/find_coaches_wa/book_by_single_date', 'id="date_value" role="form" class="pure-g pure-form"'); ?>
                            <div class="bookcoach__flexing">
                                <input type="text" name="date" id="datepicker" placeholder="Date.." class="dateavailable datepicker">
                                <style>
                                    #ui-datepicker-div {
                                        top: 0!important;
                                        left: -140px!important;
                                    }
                                </style>
                                <div class="datepicker__here"></div>
                                <div class="btnsearch">
                                    <button type="submit" class="neobutton ">Search Coach</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>

                        <div id="tab-3" class="tab-content alt3 hide">
                            <div class="bookcoach__flexing">
                                <div class="bycountry">
                                    <div class="c-dropdown js-dropdown">
                                        <?php echo form_open('b2c/student/find_coaches_wa/search/country', 'class="pure-form search-b-2 margin-auto border-2-primary border-rounded-5 width100perc"'); ?>
                                        <input type="hidden" name="country" id="country" class="js-dropdown__input">
                                        <span class="c-button c-button--dropdown js-dropdown__current">Country..</span>
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
                                    <button type="submit" class="neobutton ">Search Coach</button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>

                        <div id="tab-4" class="tab-content alt4 hide">
                            <div class="bookcoach__flexing">
                                <div class="bylanguage">
                                    <div class="c-dropdown js-dropdown">
                                        <?php echo form_open('b2c/student/find_coaches_wa/search/spoken_language', 'class="pure-form search-b-2 margin-auto border-2-primary border-rounded-5 width100perc"'); ?>
                                        <input type="hidden" name="language" id="language" class="js-dropdown__input">
                                        <span class="c-button c-button--dropdown js-dropdown__current">Language..</span>
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
                                    <button type="submit" class="neobutton ">Search Coach</button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
            var newurl = "<?php echo site_url('b2c/student/find_coaches_wa/book_by_single_date'); ?>"+"/"+dateformat;
            $('#date_value').attr('action', newurl);
        };

        </script>
