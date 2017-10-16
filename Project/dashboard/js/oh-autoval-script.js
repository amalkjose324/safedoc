$(document).ready(function() {
  $error_count=0;
  $('.av-phone').each(function(index){
    $(this).focusout(function(){
      var autoval_validator= /^[0-9]{9,12}$/;
      var msg="Invalid phone number";
      return $.fn.validate(this,autoval_validator,msg);
    });
  });
  $('.av-name').each(function(index){
    $(this).focusout(function(){
      var autoval_validator= /^[A-Za-z0-9._\-\s]{9,12}$/;
      var msg="Invalid name";
      return $.fn.validate(this,autoval_validator,msg);
    });
  });
  $('.av-email').each(function(index){
    $(this).focusout(function(){
      var msg="Invalid email";
      var autoval_validator= /^[A-Za-z0-9._]*\@[A-Za-z0-9._]*\.[A-Za-z]{2,5}$/;
      return $.fn.validate(this,autoval_validator,msg);
    });
  });
  $('.av-textarea-all').each(function(index){
    $(this).focusout(function(){
      var msg="Required Field";
      var autoval_validator= /^[^&]{10,60}$/;
      return $.fn.validate(this,autoval_validator,msg);
    });
  });

  $.fn.validate = function(object,validator,msg){
    $autoval_value = $(object).val();
    if(!validator.test($autoval_value)){
      if (!$(object).next("#oh-autoval-error").length) {
        $( "<span id='oh-autoval-error' class='cd-error-message is-visible'>"+msg+"</span>" ).insertAfter(object);
      }
      $error_count++;
    }
    else {
      $(object).next("#oh-autoval-error").remove();
    }
  }
  $('.oh-autoval-form').each(function(index){
    $(this).on("submit", function(){
      $error_count=0;
      $(this).find('.oh-autoval').each(function(){
        $(this).focusout();
     });
     if($error_count>0){
       return false;
     }
     else {
       return true;
     }
   });
 });
})
