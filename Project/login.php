<link href="css/login_css.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/login_js.js"></script>
<div class="cd-user-modal" style="z-index: 300;"> <!-- this is the entire modal form, including the background -->
  <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
    <ul class="cd-switcher" type="none">
      <li><a class="link_btn">Sign in</a></li>
      <li><a class="link_btn">New account</a></li>
    </ul>

    <div id="cd-login"> <!-- log in form -->
      <form class="cd-form cform" id="login_form" onsubmit="return false;">
        <p class="fieldset">
          <label class="image-replace cd-email" for="login-email_phone">Phone / Email</label>
          <input class="full-width has-padding has-border" id="login-email_phone" maxlength="60" type="text" placeholder="E-mail / Phone">
          <span class="cd-error-message" id="login-email_phone-error" >Invalid Email or Phone number!</span>
        </p>

        <p class="fieldset">
          <label class="image-replace cd-password" for="login-password">Password</label>
          <input class="full-width has-padding has-border" id="login-password" maxlength="35" type="password"  placeholder="Password">
          <a class="hide-password link_btn">Show</a>
          <span class="cd-error-message" id="login-password-error">Invalid Password</span>
        </p>

        <p class="fieldset">
          <input class="full-width" type="submit" value="Login">
        </p>
        <p class="reset-message"><a class="link_btn">Forgot your password?</a></p>
      </form>

      <!-- <a class="link_btn" class="cd-close-form">Close</a> -->
    </div> <!-- cd-login -->

    <div id="cd-varify"> <!-- log in form -->
      <p class="cd-form-message">We send varification code to your email and phone number. Please varify both email and phone.</p>
      <div class="countdown" id="countdown"></div>
      <form class="cd-form cform" id="varify_form" onsubmit="return false;">
        <p class="fieldset">
          <label class="image-replace cd-email" for="login-email_phone">OTP</label>
          <input class="full-width has-padding has-border" id="varify_email" maxlength="6" type="text" placeholder="Enter OTP received to your Email">
          <span class="cd-error-message" id="varify-email-error" >OPT Must contains 6 Numerical Digits</span>
        </p>
        <p class="fieldset">
          <label class="image-replace cd-email" for="login-password">OTP</label>
          <input class="full-width has-padding has-border" id="varify_phone" maxlength="6" type="text"  placeholder="Enter OTP received to your Phone">
          <span class="cd-error-message" id="varify-phone-error">OPT Must contains 6 Numerical Digits</span>
        </p>
        <p class="fieldset">
          <input class="full-width" type="submit" value="Varify">
        </p>
      </form>

      <!-- <a class="link_btn" class="cd-close-form">Close</a> -->
    </div> <!-- cd-login -->

    <div id="cd-signup"> <!-- sign up form -->
      <form class="cd-form cform" id="signup_form" onsubmit="return false;">
        <p class="fieldset">
          <label class="image-replace cd-username" for="signup-phone">Phone</label>
            <a class="country-code">Country code not required </a>
          <input class="full-width has-padding has-border" id="signup-phone" maxlength="30" type="text" placeholder="Mobile Number">
          <span class="cd-error-message" id="signup-phone-error" >Phone already taken</span>
        </p>

        <p class="fieldset">
          <label class="image-replace cd-email" for="signup-email">E-mail</label>
          <input class="full-width has-padding has-border" id="signup-email" maxlength="50" type="email" placeholder="E-mail">
          <span class="cd-error-message" id="signup-email-error">Email already registerd</span>
        </p>

        <p class="fieldset">
          <label class="image-replace cd-password" for="signup-password">Password</label>
          <input class="full-width has-padding has-border" id="signup-password" maxlength="40" type="password"  placeholder="Password">
          <a class="hide-password link_btn">Show</a>
          <span class="cd-error-message" id="signup-password-error" style="z-index: 3 !important;">Password must be 6-30 charactors</span>
        </p>
        <p class="fieldset">
          <input class="full-width has-padding" type="submit" value="Create account">
        </p>
      </form>

      <!-- <a class="link_btn" class="cd-close-form">Close</a> -->
    </div> <!-- cd-signup -->

    <div id="cd-reset-password"> <!-- reset password form -->
      <p class="cd-form-message ">Lost your password? Use your Registered Email or Mobile number to reset password</p>

      <form class="cd-form cform" id="resetpw_form" onsubmit="return false;">
        <p class="fieldset">
          <label class="image-replace cd-email" for="resetpw-email_phone">Email / Phone</label>
          <input class="full-width has-padding has-border" id="resetpw-email_phone" maxlength="60" type="text" placeholder="Phone / E-mail">
          <span class="cd-error-message" id="resetpw-email_phone-error" >Invalid Email or Phone number!</span>
        </p>

        <p class="fieldset">
          <input class="full-width has-padding" type="submit" value="Reset password">
        </p>
      </form>

      <p class="reset-message back-to-log"><a class="link_btn">Back to Login</a></p>
    </div> <!-- cd-reset-password -->
    <a class="cd-close-form link_btn">Close</a>
  </div> <!-- cd-user-modal-container -->
</div> <!-- cd-user-modal -->
<script>

</script>
