    <div class="help__content">
        <div class="dashboard__menubookingcoachresult">
            <a href="<?php echo site_url('b2c/student/find_coaches/single_date'); ?>">
                <div class="bookkacoach">Book a Coach</div>
            </a>
            <a href="<?php echo site_url('b2c/student/session'); ?>">
                <div class="session ">Session</div>
            </a>
            <a href="<?php echo site_url('b2c/student/token'); ?>">
                <div class="token">Token</div>
            </a>
            <a href="<?php echo site_url('b2c/student/help'); ?>">
                <div class="help activediv">Help</div>
            </a>
        </div>
        <div class="help__accordion">
            <ul class="accordion">
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2>Set Time Automaticaly</h2>
                    <div class="accordion__menu">
                        Our system uses a time zone converter to locate you automatically.<br>
                    </div>
                    <div class="accordion__menu">
                        How to find your time zone: Click on the map closest to your location, then choose a city from the menu. You can also have the time zone set automatically, based on your current location.
                    </div>
                </li>
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2>Token Rules</h2>
                    <div class="accordion__menu">
                        If your coach does not show up for the session, or is more than 5 minutes late, your tokens will be refunded, whether you attended the session or not.
                    </div>
                </li>
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2>Token System</h2>
                    <div class="accordion__menu">
                        <b>Check Current Token Status & Buy More Tokens.</b><br>
                        You’ll see your current balance and buy more tokens in Token Menu.
                    </div>
                    <div class="accordion__menu">
                        Check Cost of Coach<br>
                        You can check the cost of each coach before you book a session.
                    </div>
                </li>
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2>How To Book A Coach</h2>
                    <div class="accordion__menu">
                        To book a coach, go to side menu or to your dashboard. You can search for a coach in 4 ways:<br>
                    </div>
                    <div class="accordion__menu">
                        <b>Date</b><br>
                            Displays all available coaches for the date you have selected.
                    </div>
                    <div class="accordion__menu">
                        <b>Name</b><br>
                            Displays all available coaches that match the name you have entered.
                    </div>
                    <div class="accordion__menu">
                        <b>Country</b><br>
                            Displays all available coaches that match the country you have entered.
                    </div>
                    <div class="accordion__menu">
                      <b>Language Spoken</b><br>
                          Displays all available coaches that match the language preference you have entered.
                    </div>
                    <div class="accordion__menu">
                      You can also choose the time you would like by clicking on View Schedule.
                    </div>
                </li>
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2>Check Email & Notification</h2>
                    <div class="accordion__menu">
                        Check your e-mail for notifications about all your activities in NEO.
                    </div>
                </li>
            </ul>
            <ul class="accordion">
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2>Access To Live Session</h2>
                    <div class="accordion__menu">
                        Enter your session from the Dashboard. If your session is scheduled on the same day, a countdown display will appear with the time remaining until the session begins. When the play button appeared, it means your session has begun. Click on the play button to enter your Live session.
                    </div>
                </li>
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2>Live Session Guides</h2>
                    <div class="accordion__menu">
                        Once your session begins, your coach will appear on the screen. The screen will display a blank black screen until then. To show your video and resize it to a full display, hover your mouse over the screen.
                    </div>
                    <div class="accordion__menu">
                        Your study data appears on the lower part of the screen.
                    </div>
                    <div class="accordion__menu">
                        TA chat feature appears on the lower right part of the screen. From this chat window, you may communicate with your coach by writing.
                    </div>
                    <div class="accordion__menu">
                        After the session ends, the screen will redirect you to a Session Summaries page.
                    </div>
                </li>
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2>Session Summary Guides</h2>
                    <div class="accordion__menu">
                        This page gives a summary of the session. Here you can rate your coach on a scale from 1 to 5, with 5 being the highest rating. You will not be able to rate your coach again if you leave this page.
                    </div>
                    <div class="accordion__menu">
                        Your lesson has been recorded, and it will be available to you approximately 15-20 minutes after the session has ended. The recording is only available for up to 72 hours after the session has been completed. However, you may download the session and access it later in your Session History.
                    </div>
                </li>
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2>Download Recorded Session</h2>
                    <div class="accordion__menu">
                        Session History allows you to see all of your previous sessions. To download a session, go to Recorded Sessions and click on the Check Availability button for that session.
                    </div>
                    <div class="accordion__menu">
                        If you click on Recorded Sessions you can see whether your recorded session can be downloaded or not. Recorded sessions usually appear approximately 20-30 minutes after the session has ended. Finally, recorded sessions will only be available for viewing or download for 72 hours after the session has ended.
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
window.__lc = window.__lc || {};
window.__lc.license = 8633729;
(function() {
  var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
  lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>
<!-- End of LiveChat code -->
