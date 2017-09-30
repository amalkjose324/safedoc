$(document).ready(function(){

/**
* District selection
* @return error message
*/
  $('#profile-state').on('change',function () {
    $state = $('#profile-state').val();
    $fun= "select_district";
    $.ajax({
      type:'post',
      url:'actions.php',
      data:{state:$state,fun:$fun},
      success:function(response)
      {
        $str="<option selected='true' disabled='disabled'>Choose District</option>";
        var obj = JSON.parse(response);
        for (var i = 0; i < obj.length; i++)
        {
          $str += "<option value='"+ obj[i]['district_id']+"'>" + obj[i]['district_name'] + "</option>";
        }
        $('#profile-district').html($str);
      }
    });
  });
  /**
  * profile-edit-phone checking for alredy taken or not
  * @return error message
  */
  $("#profile-phone").focusout(function(){
    $fun="profile-phone-validate";
    $phone = $('#profile-phone').val();

    var validator= /^[0-9]{9,12}$/;
    if(!validator.test($phone)){
      $("#profile-phone-error").addClass('is-visible');
      $("#profile-phone-error").html('Invalid Phone Number');
    }
    else {
      $("#profile-phone-error").removeClass('is-visible');
      $("#profile-phone-error").html('Phone number already registerd');
      $.ajax({
        type:'post',
        url:'./actions.php',
        data:{phone:$phone,fun:$fun},
        success:function(response)
        {
          var obj = JSON.parse(response)[0]['val'];
          if(obj){
            $("#profile-phone-error").addClass('is-visible');
          }
          else{
            $("#profile-phone-error").removeClass('is-visible');
          }
        }
      });
    }
  });
  /**
  * Aadhar no  checking for alredy taken or not
  * @return error message
  */
  $("#profile-aadhaar").focusout(function(){
    $fun="profile-aadhaar-validate";
    $aadhaar = $('#profile-aadhaar').val();

    var validator= /^[0-9]{12}$/;
    if(!validator.test($aadhaar)){
      $("#profile-aadhaar-error").addClass('is-visible');
      $("#profile-aadhaar-error").html('Invalid Aadhaar Number');
    }
    else {
      $("#profile-aadhaar-error").removeClass('is-visible');
      $("#profile-aadhaar-error").html('Aadhaar number already registerd');
      $.ajax({
        type:'post',
        url:'./actions.php',
        data:{aadhaar:$aadhaar,fun:$fun},
        success:function(response)
        {
          var obj = JSON.parse(response)[0]['val'];
          if(obj){
            $("#profile-aadhaar-error").addClass('is-visible');
          }
          else{
            $("#profile-aadhaar-error").removeClass('is-visible');
          }
        }
      });
    }
  });
  /**
  * Profile-email checking for alredy taken or not
  * @return error message
  */
  $("#profile-email").focusout(function(){
    $fun="profile-email-validate";
    $email = $('#profile-email').val();

    var validator= /^[A-Za-z0-9._]*\@[A-Za-z0-9._]*\.[A-Za-z]{2,5}$/;
    if(!validator.test($email)){
      $("#profile-email-error").addClass('is-visible');
      $("#profile-email-error").html('Invalid Email address');
    }
    else {
      $("#profile-email-error").removeClass('is-visible');
      $("#profile-email-error").html('Email already registerd');
      $.ajax({
        type:'post',
        url:'./actions.php',
        data:{email:$email,fun:$fun},
        success:function(response)
        {
          var obj = JSON.parse(response)[0]['val'];
          if(obj){
            $("#profile-email-error").addClass('is-visible');
          }
          else{
            $("#profile-email-error").removeClass('is-visible');
          }
        }
      });
    }
  });
  /**
  * Name checking for alredy taken or not
  * @return error message
  */
  $("#profile-name").focusout(function(){
    $name = $('#profile-name').val();
    var validator= /^[A-Za-z.\s]{3,30}$/;
    if(!validator.test($name)){
      $("#profile-name-error").addClass('is-visible');
    }
    else {
      $("#profile-name-error").removeClass('is-visible');
    }
  });
  /**
  * Dob checking for alredy taken or not
  * @return error message
  */
  $("#profile-dob").focusout(function(){
    $dob = $('#profile-dob').val();
    var validator= /^[^&\s]{10}$/;
    if(!validator.test($dob)){
      $("#profile-dob-error").addClass('is-visible');
    }
    else {
      $("#profile-dob-error").removeClass('is-visible');
    }
  });
  /**
  * State for alredy taken or not
  * @return error message
  */
  $("#profile-state").focusout(function(){
    $state = $('#profile-state').val();
    var validator= /^[0-9]{1,5}$/;
    if(!validator.test($state)){
      $("#profile-state-error").addClass('is-visible');
    }
    else {
      $("#profile-state-error").removeClass('is-visible');
    }
  });
  /**
  * district for alredy taken or not
  * @return error message
  */
  $("#profile-district").focusout(function(){
    $district = $('#profile-district').val();
    var validator= /^[0-9]{1,5}$/;
    if(!validator.test($district)){
      $("#profile-district-error").addClass('is-visible');
    }
    else {
      $("#profile-district-error").removeClass('is-visible');
    }
  });
  /**
  * Profile form validation
  * @return error message
  */
  $("#profile_form").on("submit", function(){
    var val_email= /^[A-Za-z0-9._]*\@[A-Za-z0-9._]*\.[A-Za-z]{2,5}$/;
    var val_phone= /^[0-9]{9,12}$/;
    var val_name= /^[A-Za-z.\s]{3,30}$/;
    var val_dob= /^[^&\s]{10}$/;
    var val_aadhaar= /^[0-9]{12}$/;
    var val_state_district= /^[0-9]{1,5}$/;
    $email = $('#profile-email').val();
    $phone = $('#profile-phone').val();
    $name = $('#profile-name').val();
    $dob = $('#profile-dob').val();
    $aadhaar = $('#profile-aadhaar').val();
    $state = $('#profile-state').val();
    $district = $('#profile-district').val();
    if(!val_phone.test($phone)){
      $("#profile-phone").focusout();
      return false;
    }
    else if (!val_email.test($email)) {
      $("#profile-email").focusout();
      return false;
    }
    else if (!val_name.test($name)) {
      $("#profile-name").focusout();
      return false;
    }
    else if (!val_aadhaar.test($aadhaar)) {
      $("#profile-aadhaar").focusout();
      return false;
    }
    else if (!val_dob.test($dob)) {
      $("#profile-dob").focusout();
      return false;
    }
    else if (!val_state_district.test($state)) {
      $("#profile-state").focusout();
      return false;
    }
    else if (!val_state_district.test($district)) {
      $("#profile-district").focusout();
      return false;
    }
    else{
      $fun="profile-submit";
      $.ajax({
        type:'post',
        url:'./actions.php',
        data:{email:$email,phone:$phone,name:$name,dob:$dob,aadhaar:$aadhaar,state:$state,district:$district,fun:$fun},
        success:function(response)
        {
          var obj = JSON.parse(response)[0]['val'];
          if(obj){
            Lobibox.alert('success', {
              msg: "Your details has been updated...!"
            });
          }
          else{
            Lobibox.alert('error', {
              msg: "No details has been updated...!"
            });
          }
        }
      });
    }
  });
  /**
  * Password-old checking
  * @return error message
  */
  $("#pass-old").focusout(function(){
    $password = $('#pass-old').val();
    var validator= /^[^&\s]{6,30}$/;
    if(!validator.test($password)){
      $("#pass-old-error").addClass('is-visible');
    }
    else {
      $("#pass-old-error").removeClass('is-visible');
    }
  });
  /**
  * Password-new checking
  * @return error message.cd-error-message
  */
  $("#pass-new").focusout(function(){
    $password = $('#pass-new').val();
    $password_old = $('#pass-old').val();
    var validator= /^[^&\s]{6,30}$/;
    if(!validator.test($password)){
      $("#pass-new-error").html("Invalid Password");
      $("#pass-new-error").addClass('is-visible');
    }
    else if($password_old==$password){
      $("#pass-new-error").html("Old and New password must be different");
      $("#pass-new-error").addClass('is-visible');
    }
    else {
      $("#pass-new-error").removeClass('is-visible');
    }
  });
  /**
  * Password-conf checking
  * @return error message
  */
  $("#pass-conf").focusout(function(){
    $password1 = $('#pass-new').val();
    $password2 = $('#pass-conf').val();
    var validator= /^[^&\s]{6,30}$/;
    if(!validator.test($password2)){
      $("#pass-conf-error").html("Invalid Password");
      $("#pass-conf-error").addClass('is-visible');
    }
    else if($password1!=$password2){
      $("#pass-conf-error").html("Password does not matching");
      $("#pass-conf-error").addClass('is-visible');
    }
    else {
      $("#pass-conf-error").removeClass('is-visible');
    }
  });
  /**
  * Change password form validation
  * @return error message
  */
  $("#pass_change_form").on("submit", function(){
    var val_pass= /^[^&\s]{6,30}$/;
    $pass_old = $('#pass-old').val();
    $pass_new = $('#pass-new').val();
    $pass_conf = $('#pass-conf').val();
    if(!val_pass.test($pass_old)){
      $("#pass-old").focusout();
      return false;
    }
    else if(!val_pass.test($pass_new)){
      $("#pass-new").focusout();
      return false;
    }
    else if($pass_new==$pass_old){
      $("#pass-new").focusout();
      return false;
    }
    else if(!val_pass.test($pass_conf)){
      $("#pass-conf").focusout();
      return false;
    }
    else if($pass_new!=$pass_conf){
      $("#pass-conf").focusout();
      return false;
    }
    else{
      $fun="change-password-submit";
      $.ajax({
        type:'post',
        url:'./actions.php',
        data:{pass_new:$pass_new,pass_old:$pass_old,fun:$fun},
        success:function(response)
        {
          var obj = JSON.parse(response)[0]['val'];
          if(obj){
            $('#pass_change_form').trigger("reset");
            $('#password-change').removeClass('is-visible');
            Lobibox.alert('success', {
              msg: "Your password has been changed...!"
            });
          }
          else{
            Lobibox.alert('error', {
              msg: "Password updation failed...!"
            });
          }
        }
      });
    }
  });
  /**
  * Change Password icon click
  * @return error message
  */
  $("#cpass-btn").click(function(){
    $("#cpass-icon").click();
  });
  /**
  * Phone otp checking
  * @return error message
  */
  $("#var-phone").focusout(function(){
    $otp = $('#var-phone').val();
    var validator= /^[0-9]{6}$/;
    if(!validator.test($otp)){
      $("#var-phone-error").addClass('is-visible');
    }
    else {
      $("#var-phone-error").removeClass('is-visible');
    }
  });
  /**
  * Phone varification  form validation
  * @return error message
  */
  $("#var-phone_form").on("submit", function(){
    $otp = $('#var-phone').val();
    var validator= /^[0-9]{6}$/;
    if(!validator.test($otp)){
      $("#var-phone").focusout();
    }
    else{
      $fun="varify-phone-submit";
      $.ajax({
        type:'post',
        url:'./actions.php',
        data:{otp:$otp,fun:$fun},
        success:function(response)
        {
          var obj = JSON.parse(response)[0]['val'];
          if(obj){
            $('#var-phone_form').trigger("reset");
            $('#varify-phone').removeClass('is-visible');
            Lobibox.alert('success', {
              msg: "Your phone number has been varified...!"
            });
          }
          else{
            Lobibox.alert('error', {
              msg: "OTP does not matching...!"
            });
          }
        }
      });
    }
  });
});
