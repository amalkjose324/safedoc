$(document).ready(function(){
  /**
  * signup-phone checking for alredy taken or not
  * @return error message
  */
  $("#signup-phone").focusout(function(){
    $fun="signup-phone-validate";
    $phone = $('#signup-phone').val();

    var validator= /^[6-9]{1,1}[0-9]{9,9}$/;
    if(!validator.test($phone)){
      $("#signup-phone-error").addClass('is-visible');
      $("#signup-phone-error").html('Invalid Phone Number');
    }
    else {
      $("#signup-phone-error").removeClass('is-visible');
      $("#signup-phone-error").html('Phone number already registerd');
      $.ajax({
        type:'post',
        url:'./actions.php',
        data:{phone:$phone,fun:$fun},
        success:function(response)
        {
          var obj = JSON.parse(response)[0]['val'];
          if(obj){
            $("#signup-phone-error").addClass('is-visible');
          }
          else{
            $("#signup-phone-error").removeClass('is-visible');
          }
        }
      });
    }
  });
  /**
  * Signup-email checking for alredy taken or not
  * @return error message
  */
  $("#signup-email").focusout(function(){
    $fun="signup-email-validate";
    $email = $('#signup-email').val();

    var validator= /^[A-Za-z0-9._]*\@[A-Za-z0-9._]*\.[A-Za-z]{2,5}$/;
    if(!validator.test($email)){
      $("#signup-email-error").addClass('is-visible');
      $("#signup-email-error").html('Invalid Email address');
    }
    else {
      $("#signup-email-error").removeClass('is-visible');
      $("#signup-email-error").html('Email already registerd');
      $.ajax({
        type:'post',
        url:'./actions.php',
        data:{email:$email,fun:$fun},
        success:function(response)
        {
          var obj = JSON.parse(response)[0]['val'];
          if(obj){
            $("#signup-email-error").addClass('is-visible');
          }
          else{
            $("#signup-email-error").removeClass('is-visible');
          }
        }
      });
    }
  });
  /**
  * Signup-password checking for alredy taken or not
  * @return error message
  */
  $("#signup-password").focusout(function(){
    $password = $('#signup-password').val();
    var validator= /^[^&\s]{6,30}$/;
    if(!validator.test($password)){
      $("#signup-password-error").addClass('is-visible');
    }
    else {
      $("#signup-password-error").removeClass('is-visible');
    }
  });
  /**
  * Signup validation
  * @return error message
  */
  $("#signup_form").on("submit", function(){
    var val_email= /^[A-Za-z0-9._]*\@[A-Za-z0-9._]*\.[A-Za-z]{2,5}$/;
    var val_phone= /^[6-9]{1,1}[0-9]{9,9}$/;
    var val_pword= /^[^&\s]{6,30}$/;
    $password = $('#signup-password').val();
    $email = $('#signup-email').val();
    $phone = $('#signup-phone').val();
    if(!(val_phone.test($phone))){
      $("#signup-phone").focusout();
      return false;
    }
    else if (!val_email.test($email)) {
      $("#signup-email").focusout();
      return false;
    }
    else if (!val_pword.test($password)) {
      $("#signup-password").focusout();
      return false;
    }
    else{
      $fun="signup-first-submit";
      $.ajax({
        type:'post',
        url:'./actions.php',
        data:{email:$email,phone:$phone,password:$password,fun:$fun},
        success:function(response)
        {
          var obj = JSON.parse(response)[0]['val'];
          if(obj){
            $('#signup_form').trigger("reset");
            Lobibox.notify('success', {
              delay:5000,
              title: 'Registration Successful',
              msg: 'Now you can login with given email/phone and password here..!'
            });
            var $form_modal = $('.cd-user-modal'),
            $form_login = $form_modal.find('#cd-login'),
            $form_signup = $form_modal.find('#cd-signup'),
            $form_modal_tab = $('.cd-switcher'),
            $tab_login = $form_modal_tab.children('li').eq(0).children('a'),
            $tab_signup = $form_modal_tab.children('li').eq(1).children('a');
            $form_login.addClass('is-selected');
            $form_signup.removeClass('is-selected');
            $tab_login.addClass('selected');
            $tab_signup.removeClass('selected');
          }
          else{
            Lobibox.notify('error', {
              delay:5000,
              title: 'Registration Failed',
              msg: 'Sorry we can\'t create your account right now. Please try again later!'
            });
          }
        }
      });
    }
  });

  /**
  * Signup-password checking for alredy taken or not
  * @return error message
  */
  $("#signup-password").focusout(function(){
    $password = $('#signup-password').val();
    var validator= /^[^&\s]{6,30}$/;
    if(!validator.test($password)){
      $("#signup-password-error").addClass('is-visible');
    }
    else {
      $("#signup-password-error").removeClass('is-visible');
    }
  });

  /**
  * login-email_phone checking
  * @return error message
  */
  $("#login-email_phone").focusout(function(){
    $email_phone = $('#login-email_phone').val();
    var validator_email= /^[A-Za-z0-9._]*\@[A-Za-z0-9._]*\.[A-Za-z]{2,5}$/;
    var validator_phone= /^[6-9]{1,1}[0-9]{9,9}$/;
    if((!validator_email.test($email_phone))&&(!validator_phone.test($email_phone))){
      $("#login-email_phone-error").addClass('is-visible');
      $("#login-email_phone-error").html('Invalid Email or Phone number');
    }else {
      $("#login-email_phone-error").removeClass('is-visible');
    }
  });
  /**
  * login-password checking
  * @return error message
  */
  $("#login-password").focusout(function(){
    $password = $('#login-password').val();
    var validator= /^[^&\s]{6,30}$/;
    if(!validator.test($password)){
      $("#login-password-error").addClass('is-visible');
    }
    else {
      $("#login-password-error").removeClass('is-visible');
    }
  });

  /**
  * Login validation
  * @return error message
  */
  $("#login_form").on("submit", function(){
    var val_email= /^[A-Za-z0-9._]*\@[A-Za-z0-9._]*\.[A-Za-z]{2,5}$/;
    var val_phone= /^[6-9]{1,1}[0-9]{9,9}$/;
    var val_pword= /^[^&\s]{6,30}$/;
    $password = $('#login-password').val();
    $email_phone = $('#login-email_phone').val();
    if((!val_email.test($email_phone))&&(!val_phone.test($email_phone))){
      $("#login-email_phone").focusout();
      return false;
    }
    else if (!val_pword.test($password)) {
      $("#login-password").focusout();
      return false;
    }
    else{
      $fun="login-submit";
      $.ajax({
        type:'post',
        url:'./actions.php',
        data:{email_phone:$email_phone,password:$password,fun:$fun},
        success:function(response)
        {
          var obj = JSON.parse(response)[0]['val'];
          if(obj==1){
            window.location.replace('dashboard') ;
          }
          else if(obj==2){
            $('#hidden_email_phone').val($email_phone);
            $('#countdown').html("03:00");
            $('#login_form').trigger("reset");
            for (var i = 0; i < 9999999; i++){
              window.clearInterval(i);
            }
            var $form_modal = $('.cd-user-modal'),
            $form_login = $form_modal.find('#cd-login'),
            $form_varify = $form_modal.find('#cd-varify'),
            $form_modal_tab = $('.cd-switcher'),
            $tab_login = $form_modal_tab.children('li').eq(0).children('a'),
            $tab_signup = $form_modal_tab.children('li').eq(1).children('a');
            $form_login.removeClass('is-selected');
            $form_varify.addClass('is-selected');
            $tab_signup.removeClass('selected');
            $tab_login.addClass('selected');
            var timer2 = "3:00";
            $fun="varify-email-phone-sendotp";
            $.ajax({
              type:'post',
              url:'./actions.php',
              data:{email_phone:$email_phone,fun:$fun}
            });
            var interval = setInterval(function() {
              var timer = timer2.split(':');
              var minutes = parseInt(timer[0], 10);
              var seconds = parseInt(timer[1], 10);
              --seconds;
              minutes = (seconds < 0) ? --minutes : minutes;
              if (minutes < 0){
                clearInterval(interval);
                $form_login.addClass('is-selected');
                $form_varify.removeClass('is-selected');
                $tab_signup.removeClass('selected');
                $tab_login.addClass('selected');
              }
              seconds = (seconds < 0) ? 59 : seconds;
              seconds = (seconds < 10) ? '0' + seconds : seconds;
              minutes = (minutes < 10) ?  '0' + minutes : minutes;
              $('#countdown').html(minutes + ':' + seconds);
              timer2 = minutes + ':' + seconds;
            }, 1000);
          }
          else{
            Lobibox.alert('error', {
              msg: "Provided login credentials are invalid..!"
            });
          }
        }
      });
    }
  });

  /**
  * Resetpw-email_phone checking
  * @return error message
  */
  $("#resetpw-email_phone").focusout(function(){
    $email_phone = $('#resetpw-email_phone').val();
    var validator_email= /^[A-Za-z0-9._]*\@[A-Za-z0-9._]*\.[A-Za-z]{2,5}$/;
    var validator_phone= /^[6-9]{1,1}[0-9]{9,9}$/;
    if((!validator_email.test($email_phone))&&(!validator_phone.test($email_phone))){
      $("#resetpw-email_phone-error").addClass('is-visible');
      $("#resetpw-email_phone-error").html('Invalid Email or Phone number');
    }else {
      $("#resetpw-email_phone-error").removeClass('is-visible');
    }
  });

  /**
  * Reset Password validation
  * @return error message
  */
  $("#resetpw_form").on("submit",function(){
    var val_email= /^[A-Za-z0-9._]*\@[A-Za-z0-9._]*\.[A-Za-z]{2,5}$/;
    var val_phone= /^[6-9]{1,1}[0-9]{9,9}$/;
    $email_phone = $('#resetpw-email_phone').val();

    if((!val_email.test($email_phone))&&(!val_phone.test($email_phone))){
      $("#resetpw-email_phone").focusout();
      return false;
    }
    else{
      $fun="check_mail_phone";
      $.ajax({
        type:'post',
        url:'./actions.php',
        data:{email_phone:$email_phone,fun:$fun},
        success:function(response)
        {
          var obj = JSON.parse(response)[0]['val'];
          if(obj){
            $('#resetpw_form').trigger("reset");
            Lobibox.notify('info', {
              delay:5000,
              title: 'Reset Password',
              msg: 'We are trying to send your new password. Please wait..!'
            });
            $('.cd-user-modal').removeClass('is-visible');
            $fun="resetpw-submit";
            $.ajax({
              type:'post',
              url:'./actions.php',
              data:{email_phone:$email_phone,fun:$fun},
              success:function(response)
              {
                try{
                  var obj = JSON.parse(response)[0]['val'];
                  if(obj){
                    Lobibox.notify('success', {
                      delay:5000,
                      title: 'Reset Password Sent',
                      msg: "Your new password has been sent to your Email and Mobile number. Please change password immediately after first login."
                    });
                  }
                  else{
                    Lobibox.notify('error', {
                      delay:5000,
                      title: 'Network Error',
                      msg: "Sorry, we can\' send password right now. Please try again later.!"
                    });
                  }
                }
                catch(e){
                  Lobibox.notify('warning', {
                    delay:5000,
                    title: 'Password sent to Email',
                    msg: "Due to network issues, we can't send password to your phone number.!"
                  });
                }
              }
            });
          }
          else{

            Lobibox.notify('error', {
              delay:5000,
              title: 'Invalid Details',
              msg: "Does not match any account with this provided details.!"
            });
          }
        }
      });
    }
  });
});
