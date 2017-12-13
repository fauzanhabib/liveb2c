<script>
  $(".header__desktop").hide();
  $(".header__mobile").hide();
  $(".main__sidebar").hide();
</script>

    <!-- back button -->
    <div class="header__wa">
        <div class="backBtn">
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" viewBox="0 0 24 24"><path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z"/></svg>
                back
            </a>
        </div>
    </div>
    <!-- back button end -->

    <div class="help__content">
        <div class="dashboard__menubookingcoachresult">
            <a href="<?php echo site_url('b2c/student/find_coaches_wa/single_date'); ?>">
                <div class="bookkacoach">Book a Coach</div>
            </a>
            <a href="<?php echo site_url('b2c/student/session_wa'); ?>">
                <div class="session ">Session</div>
            </a>
            <a href="<?php echo site_url('b2c/student/token_wa'); ?>">
                <div class="token">Token</div>
            </a>
            <a href="<?php echo site_url('b2c/student/help_wa'); ?>">
                <div class="help activediv">Help</div>
            </a>
        </div>
        <div class="help__accordion">
            <ul class="accordion">
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2>Time Zone Setting</h2>
                    <div class="accordion__menu">
                        Our system detects your device's location and it will set time zone automatically according to your current location.<br>
                    </div>
                    <div class="accordion__menu">
                        If you are traveling, please check your time zone to make sure that it is correct.
                    </div>
                </li>
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2>Token System</h2>
                    <div class="accordion__menu">
                        Tokens are used to book sessions. Your tokens will be automatically deducted after you book a session. You can check your current token balance in token menu and check the cost of each coach before you book a session.
                    </div>
                </li>
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2>Token Refund</h2>
                    <div class="accordion__menu">
                        If your coach does not show up for a booked session, or is more than 5 minutes late, your tokens will be refunded whether you attended the session or not.
                    </div>
                </li>
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2>Book a Coach</h2>
                    <div class="accordion__menu">
                        To book a coach, go to dashboard or to the side menu. You can search for a coach by date, name, country, or languages spoken.<br>
                    </div>
                    <div class="accordion__menu">
                        <b>Date</b><br>
                        Display all available coaches for the date you have selected.
                    </div>
                    <div class="accordion__menu">
                        <b>Name</b><br>
                        Display all available coaches that match the name you have entered.
                    </div>
                    <div class="accordion__menu">
                        <b>Country</b><br>
                        Display all available coaches that match the country you have entered.
                    </div>
                    <div class="accordion__menu">
                      <b>Language Spoken</b><br>
                        Display all available coaches that match the language preference you have entered.
                    </div>
                    <div class="accordion__menu">
                        You can also choose the time you would like by clicking on "View Schedule"
                    </div>
                </li>
                <!-- <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2>Check Email & Notification</h2>
                    <div class="accordion__menu">
                        Check your e-mail for notifications about all your activities in NEO.
                    </div>
                </li> -->
            </ul>
            <ul class="accordion">
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2>Accessing neo LIVE Session</h2>
                    <div class="accordion__menu">
                        Enter your session from Dashboard. A countdown display will appear 24 hours before session begins and remain until the session begins.
                    </div>
                    <div class="accordion__menu">
                        When it's time to join session, countdown display will change into a play button. Click on the play button to enter your neo LIVE session.
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
                        Chat feature appears on the lower right part of the screen. From this chat window, you may communicate with your coach by writing.
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
                    <h2>Session History</h2>
                    <div class="accordion__menu">
                        Session History allows you to see all of your previous sessions. You can choose to download or watch your recorded neo LIVE session.
                    </div>
                    <div class="accordion__menu">
                        Recorded sessions usually appear approximately 20 - 30 minutes after the session has ended. Recorded session will be available to download or view for 72 hours after the session has ended.
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
