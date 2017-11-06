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
    var validator= /^[6-9]{1,1}[0-9]{9,9}$/;
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
    var val_phone= /^[6-9]{1,1}[0-9]{9,9}$/;
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
            $('#safedocx_header').load(document.URL +  ' #safedocx_header');
            Lobibox.notify('success', {
              delay:5000,
              title: 'Details Updated',
              msg: 'Your details has been updated successfully..!'
            });
          }
          else{
            Lobibox.notify('error', {
              delay:5000,
              title: 'No Details Updated',
              msg: 'No any details has been updated right now..!'
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
            Lobibox.notify('success', {
              delay:5000,
              title: 'Password Changed',
              msg: 'Your password hasbeen updated. You can login with new password..!'
            });
          }
          else{
            Lobibox.notify('error', {
              delay:5000,
              title: 'Password Changing Failed',
              msg: 'Sorry, we can\' update your password right now. Please try again later..!'
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
  * check file in docx upload
  * @return error message
  */
  $("#multiDocx").on("change",function(){
    if(this.files.length>0){
      $("#docx_upload_error").removeClass('is-visible');
    }
    else{
      $("#docx_upload_error").addClass('is-visible');
      $("#docx_upload_error").html('Select atleast one Document');
    }
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
            $('#varification_div').load(document.URL +  ' #varification_div');
            Lobibox.notify('success', {
              delay:5000,
              title: 'Phone Varified',
              msg: "Your phone number has been varified successfully...!"
            });
          }
          else{
            Lobibox.notify('error', {
              delay:5000,
              title: 'Invalid OTP',
              msg: "Your OTP does not matching. Please check the OTP..!"
            });
          }
        }
      });
    }
  });
  $('#varify-email-btn').on('click', function(event){
    event.preventDefault();
    $fun="varify-email-otpsend";
    Lobibox.notify('info', {
      delay:5000,
      title: 'E-mail varification',
      msg: "We are trying to send varification link for Varify your email."
    });
    $.ajax({
      type:'post',
      url:'./actions.php',
      data:{fun:$fun},
      success:function(response)
      {
        var obj = JSON.parse(response)[0]['val'];
        if(obj){
          Lobibox.notify('success', {
            delay:5000,
            title: 'Varification link Sent to Email',
            msg: "We just sent you an email with varification link. Varify your email id using this varification link."
          });
          $.fn.myFunction();
        }
        else{
          Lobibox.notify('error', {
            delay:5000,
            title: 'Network error',
            msg: "Due to network issues, we can't send varification link to your email id. Please try again later."
          });
        }
      }
    });
  });
  //open popup-phone rsend
  $('#var-phone-resend').on('click', function(event){
    event.preventDefault();
    $('#varify-phone').addClass('is-visible');
    $fun="varify-phone-otpsend";
    Lobibox.notify('info', {
      delay:5000,
      title: 'OTP Senting to Phone',
      msg: "We are trying to send OTP to your phone. Please wait."
    });
    $.ajax({
      type:'post',
      url:'./actions.php',
      data:{fun:$fun},
      success: function (response) {
        Lobibox.notify('success', {
          delay:5000,
          title: 'OTP Sent to Phone',
          msg: "We just sent you an SMS with OTP. Varify your Mobile using this OTP."
        });
      }
    });
  });
  /**
  * Directory name validate
  * @return error message
  */
  $("#dir_name_add").focusout(function(){
    $name = $("#dir_name_add").val();
    var validator= /^[A-Za-z0-9_\s]{3,40}$/;
    if(!validator.test($name)){
      $("#dir_name_add_error").addClass('is-visible');
    }
    else {
      $("#dir_name_add_error").removeClass('is-visible');
    }
  });
  /**
  * Directory name validate
  * @return error message
  */
  $("#dir_description_add").focusout(function(){
    $desc= $("#dir_description_add").val();
    var validator= /^[^&]{6,100}$/;
    if(!validator.test($desc)){
      $("#dir_description_add_error").addClass('is-visible');
    }
    else {
      $("#dir_description_add_error").removeClass('is-visible');
    }
  });
  $.fn.myFunction = function(){
    setInterval(function(){
      $('#varification_div').load(document.URL +  ' #varification_div');
    },1000);
  }
  /**
  * Add new directory
  * @return error message
  */
  $("#directory_add_form").on("submit", function(){
    $dir_name = $('#dir_name_add').val();
    $dir_description = $('#dir_description_add').val();
    $dir_parent = $('#directory_id').val();
    var name_val=/^[A-Za-z0-9_\s]{3,40}$/;
    var desc_val=/^[^&]{6,100}$/;
    if(!name_val.test($dir_name)){
      $("#dir_name_add").focusout();
    }
    else if (!desc_val.test($dir_description)) {
      $("#dir_description_add").focusout();
    }
    else{
      $fun="add-new-directory";
      $('#add_directory_pop').removeClass('is-visible');
      $.ajax({
        type:'post',
        url:'./actions.php',
        data:{fun:$fun,dir_name:$dir_name,dir_description:$dir_description,dir_parent:$dir_parent},
        success: function (response) {
          var obj = JSON.parse(response)[0]['val'];
          if(obj){
            $('#doc-list-div').load(document.URL +  ' #doc-list-div');
            Lobibox.notify('success', {
              delay:5000,
              title: 'Directory Added',
              msg: "Your new directory has been Added successfully!"
            });
          }
          else{
            Lobibox.notify('error', {
              delay:5000,
              title: 'Directory Error',
              msg: "An error occured while creating a directory"
            });
          }
        }
      });
    }
  });
  //docs upload
  $('#upload-docx').on('click', function () {
    var form_data = new FormData();
    $dir_parent = $('#doc_directory_id').val();
    var ins = document.getElementById('multiDocx').files.length;
    if(ins>0){
      $("#docx_upload_error").removeClass('is-visible');
      $('#doc_add_pop').removeClass('is-visible');
      for (var x = 0; x < ins; x++) {
        form_data.append("files[]", document.getElementById('multiDocx').files[x]);
      }
      form_data.append("doc_directory_id", $dir_parent);
      form_data.append("fun", "safedocx-add-docs");
      $.ajax({
        url: './actions.php', // point to server-side PHP script
        dataType: 'text', // what to expect back from the PHP script
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (response) {
          if(response==ins){
            $('#doc-list-div').load(document.URL +  ' #doc-list-div');
            Lobibox.notify('success', {
              delay:5000,
              title: 'Doucuments Uploaded',
              msg: 'All of your documents has been uploaded successfully..!'
            });
          }
          else if(response>0){
            $('#doc-list-div').load(document.URL +  ' #doc-list-div');
            Lobibox.notify('warning', {
              delay:5000,
              title: (ins-response)+' documents not uploaded',
              msg: 'Due to invalid/curruped document, '+(ins-response)+' documents has not been uploaded'
            });
          }
          else {
            Lobibox.notify('error', {
              delay:5000,
              title: 'Upload Error',
              msg: 'No documents has been uploaded due to invalid/curruped document'
            });
          }
        }
      });
    }
    else{
      $("#docx_upload_error").addClass('is-visible');
      $("#docx_upload_error").html('Select atleast one Document');
    }
  });
  /**
  * User enable submit
  * @return error message
  */
  $(".form_user_enable").each(function(){
    $(this).on("submit",function (event) {
      event.preventDefault();
      $id = $(this).children('#user_id').val();
      $user=$(this).children('#user_val').val();
      $user_type=$(this).children('#user_type_id').val();
      $fun="enable_user";
      $.ajax({
        type:'post',
        url:'./actions.php',
        data:{id:$id,fun:$fun},
        success:function(response)
        {
          var obj = JSON.parse(response)[0]['val'];
          if(obj){
            $('#datatable_data').load('./datatable_users.php?user='+$user_type);
            Lobibox.notify('success', {
              delay:5000,
              title: $user+' Unlocked',
              msg: $user+" has been Unlocked...!"
            });
          }
          else{
            Lobibox.notify('error', {
              delay:5000,
              title: $user+' Unlock Error',
              msg: $user+" has not been Unlocked...!"
            });
          }
        }
      });
    });
  });
  /**
  * User disable submit
  * @return error message
  */
  $(".form_user_disable").each(function(){
    $(this).on("submit",function (event) {
      event.preventDefault();
      $id = $(this).children('#user_id').val();
      $user=$(this).children('#user_val').val();
      $user_type=$(this).children('#user_type_id').val();
      $fun="disable_user";
      $.ajax({
        type:'post',
        url:'./actions.php',
        data:{id:$id,fun:$fun},
        success:function(response)
        {
          var obj = JSON.parse(response)[0]['val'];
          if(obj){
            $('#datatable_data').load('./datatable_users.php?user='+$user_type);
            Lobibox.notify('success', {
              delay:5000,
              title: $user+' Locked',
              msg: $user+" has been Locked...!"
            });

          }
          else{
            Lobibox.notify('error', {
              delay:5000,
              title: $user+' Lock Error',
              msg: $user+" has not been Locked...!"
            });
          }
        }
      });
    });
  });

  /**
  * Admin reset password
  * @return error message
  */
  $(".form_user_reset_pw").each(function(){
    $(this).on("submit",function (event) {
      event.preventDefault();
      $id = $(this).children('#user_id').val();
      $fun="reset_user_pw";
      $.ajax({
        type:'post',
        url:'./actions.php',
        data:{id:$id,fun:$fun},
        success:function(response)
        {

          var obj = JSON.parse(response)[0]['val'];
          if(obj){
            Lobibox.notify('success', {
              delay:5000,
              title: ' Password Reset',
              msg: " Reset Password has been Generated as 'Qwerty@123'...!"
            });

          }
          else{
            Lobibox.notify('error', {
              delay:5000,
              title: 'Password Error',
              msg: "Reset Password has not been generated...!"
            });
          }
        }
      });
    });
  });
  /**
  * Phone edit focusout
  * @return error message
  */
  $(".u_edit_phone").focusout(function(){
    $phone=$(this).val();
    $id=  $(this).closest('form').children('.user_id').val();
    var validator= /^[6-9]{1,1}[0-9]{9,9}$/;
    if(!validator.test($phone)){
      $(".u_phone_edit_error").html('Invalid phone Format');
      $(".u_phone_edit_error").addClass('is-visible');
    }
    else {
      $(".u_phone_edit_error").removeClass('is-visible');
      $fun="profile-phone-validate";
      $.ajax({
        type:'post',
        url:'./actions.php',
        data:{phone:$phone,user_id:$id,fun:$fun},
        success:function(response)
        {
          var obj = JSON.parse(response)[0]['val'];
          if(obj){
            $(".u_phone_edit_error").html('Phone number Already Registerd');
            $(".u_phone_edit_error").addClass('is-visible');
          }
          else{
            $(".u_phone_edit_error").removeClass('is-visible');
          }
        }
      });
    }
  });
  /**
  * Email edit focusout
  * @return error message
  */
  $(".u_edit_email").focusout(function(){
    $email=$(this).val();
    $id=  $(this).closest('form').children('.user_id').val();
    var validator= /^[A-Za-z0-9._]*\@[A-Za-z0-9._]*\.[A-Za-z]{2,5}$/;
    if(!validator.test($email)){
      $(".u_email_edit_error").html('Invalid Email Format');
      $(".u_email_edit_error").addClass('is-visible');
    }
    else {
      $(".u_email_edit_error").removeClass('is-visible');
      $fun="profile-email-validate";
      $.ajax({
        type:'post',
        url:'./actions.php',
        data:{email:$email,user_id:$id,fun:$fun},
        success:function(response)
        {
          var obj = JSON.parse(response)[0]['val'];
          if(obj){
            $(".u_email_edit_error").html('Email Id Already Registerd');
            $(".u_email_edit_error").addClass('is-visible');
          }
          else{
            $(".u_email_edit_error").removeClass('is-visible');
          }
        }
      });
    }
  });
  /**
  * User edit
  * @return error message
  */
  $(".user_edit_form").each(function(){
    $(this).on("submit",function (event) {
      event.preventDefault();
      $id = $(this).children('.user_id').val();
      $phone=$(this).children('.form-group').children('.u_edit_phone').val();
      $email=$(this).children('.form-group').children('.u_edit_email').val();
      $user_type=$(this).children('#user_type_id').val();
      var val_email= /^[A-Za-z0-9._]*\@[A-Za-z0-9._]*\.[A-Za-z]{2,5}$/;
      var val_phone= /^[6-9]{1,1}[0-9]{9,9}$/;
      if(!val_phone.test($phone)){
        $(".u_edit_phone").focusout();
        return false;
      }
      else if (!val_email.test($email)) {
        $(".u_edit_email").focusout();
        return false;
      }
      else{
        $fun="edit_user_admin";
        $.ajax({
          type:'post',
          url:'./actions.php',
          data:{id:$id,phone:$phone,email:$email,fun:$fun},
          success:function(response)
          {
            $('.edit_user').removeClass('is-visible');
            var obj = JSON.parse(response)[0]['val'];
            if(obj){
              $('#datatable_data').load('./datatable_users.php?user='+$user_type);
              Lobibox.notify('success', {
                delay:5000,
                title: 'Details Updated',
                msg: " User Details has been updated...!"
              });
            }
            else{
              Lobibox.notify('error', {
                delay:5000,
                title: 'No details Updated',
                msg: "User Details has not been updated...!"
              });
            }
          }
        });
      }
    });
  });
});
