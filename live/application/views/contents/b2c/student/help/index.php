    <style>
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
    
    <div class="help__content">
        <div class="dashboard__menubookingcoachresult">
            <a href="<?php echo site_url('b2c/student/find_coaches/single_date'); ?>">
                <div class="bookkacoach trn"  data-trn-key="bookcoach">Book a Coach</div>
            </a>
            <a href="<?php echo site_url('b2c/student/session'); ?>">
                <div class="session trn"  data-trn-key="session">Session</div>
            </a>
            <a href="<?php echo site_url('b2c/student/token'); ?>">
                <div class="token trn "  data-trn-key="tokens">Token</div>
            </a>
            <a href="<?php echo site_url('b2c/student/help'); ?>">
                <div class="help trn activediv"  data-trn-key="help">Help</div>
            </a>
        </div>
        <div class="help__accordion">
            <ul class="accordion">
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2 class="trn" data-trn-key="tzsetting">Time Zone Setting</h2>
                    <div class="accordion__menu trn" data-trn-key="oursystem">
                        Our system detects your device's location and it will set time zone automatically according to your current location.<br>
                    </div>
                    <div class="accordion__menu trn" data-trn-key="ifyouare">
                        If you are traveling, please check your time zone to make sure that it is correct.
                    </div>
                </li>
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2 class="trn" data-trn-key="tknsystem">Token System</h2>
                    <div class="accordion__menu trn" data-trn-key="tokensareusedto">
                        Tokens are used to book sessions. Your tokens will be automatically deducted after you book a session. You can check your current token balance in token menu and check the cost of each coach before you book a session.
                    </div>
                </li>
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2 class="trn" data-trn-key="tokenrefund">Token Refund</h2>
                    <div class="accordion__menu trn" data-trn-key="ifyourcoach">
                        If your coach does not show up for a booked session, or is more than 5 minutes late, your tokens will be refunded whether you attended the session or not.
                    </div>
                </li>
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2 class="trn" data-trn-key="bookacoach">Book a Coach</h2>
                    <div class="accordion__menu trn" data-trn-key="tobookacoach">
                        To book a coach, go to dashboard or to the side menu. You can search for a coach by date, name, country, or languages spoken.<br>
                    </div>
                    <div class="accordion__menu">
                        <b class="trn" data-trn-key="date">Date</b><br>
                        <span class="trn" data-trn-key="displayall">Display all available coaches for the date you have selected.</span>
                    </div>
                    <div class="accordion__menu">
                        <b class="trn" data-trn-key="names">Name</b><br>
                        <span class="trn" data-trn-key="displayall2">Display all available coaches that match the name you have entered.</span>
                    </div>
                    <div class="accordion__menu">
                        <b class="trn" data-trn-key="contry2">Country</b><br>
                        <span class="trn" data-trn-key="displayall3">Display all available coaches that match the country you have entered.<span>
                    </div>
                    <div class="accordion__menu">
                      <b class="trn" data-trn-key="laguagespoke2">Language Spoken</b><br>
                        <span class="trn" data-trn-key="displayall4">Display all available coaches that match the language preference you have entered.</span>
                    </div>
                    <div class="accordion__menu trn" data-trn-key="youcanalso">
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
                    <h2 class="trn"  data-trn-key="accessing">Accessing neo LIVE Session</h2>
                    <div class="accordion__menu trn" data-trn-key="enteryrsession">
                        Enter your session from Dashboard. A countdown display will appear 24 hours before session begins and remain until the session begins.
                    </div>
                    <div class="accordion__menu trn" data-trn-key="whentits">
                        When it's time to join session, countdown display will change into a play button. Click on the play button to enter your neo LIVE session.
                    </div>
                </li>
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2 class="trn"  data-trn-key="livessseionsgu">Live Session Guides</h2>
                    <div class="accordion__menu trn"  data-trn-key="onceyour">
                        Once your session begins, your coach will appear on the screen. The screen will display a blank black screen until then. To show your video and resize it to a full display, hover your mouse over the screen.
                    </div>
                    <div class="accordion__menu trn"  data-trn-key="yourstudydatta">
                        Your study data appears on the lower part of the screen.
                    </div>
                    <div class="accordion__menu trn"  data-trn-key="chatfeatures">
                        Chat feature appears on the lower right part of the screen. From this chat window, you may communicate with your coach by writing.
                    </div>
                    <div class="accordion__menu trn"  data-trn-key="affterthe">
                        After the session ends, the screen will redirect you to a Session Summaries page.
                    </div>
                </li>
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2 class="trn"  data-trn-key="sessionsumma">Session Summary Guides</h2>
                    <div class="accordion__menu trn"  data-trn-key="thispage">
                        This page gives a summary of the session. Here you can rate your coach on a scale from 1 to 5, with 5 being the highest rating. You will not be able to rate your coach again if you leave this page.
                    </div>
                    <div class="accordion__menu trn"  data-trn-key="yourlessonhass">
                        Your lesson has been recorded, and it will be available to you approximately 15-20 minutes after the session has ended. The recording is only available for up to 72 hours after the session has been completed. However, you may download the session and access it later in your Session History.
                    </div>
                </li>
                <li>
                    <input type="checkbox" checked>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <h2 class="trn"  data-trn-key="sesssionhistory">Session History</h2>
                    <div class="accordion__menu trn" data-trn-key="allowsyous">
                        Session History allows you to see all of your previous sessions. You can choose to download or watch your recorded neo LIVE session.
                    </div>
                    <div class="accordion__menu trn" data-trn-key="recordedsession">
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
