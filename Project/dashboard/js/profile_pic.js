$(document).ready(function () {
  /**
  * Profile pic changing
  * @return error message
  */
  $uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
      width: 202,
      height: 202,
      type: 'circle'
    },
    boundary: {
      width: 300,
      height: 300
    }
  });

  $('#upload').on('change', function () {
    try{
      var reader = new FileReader();
      reader.onload = function (e) {
        $uploadCrop.croppie('bind', {
          url: e.target.result
        }).then(function(){
        });
      }
      reader.readAsDataURL(this.files[0]);
    }
    catch(e){
      $('.cd-popup').removeClass('is-visible');
    }
  });
  $('.upload-result').on('click', function (ev) {
    $uploadCrop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function (resp) {
      $fun= "change_profile_pic";
      $.ajax({
        url: './actions.php',
        type: 'POST',
        data: {image:resp,fun:$fun},
        success: function (response) {
          var obj = JSON.parse(response)[0]['val'];
          if(obj){
            html = '<img src="' + resp + '" />';
            $("#upload-demo-i").html(html);
            $('.cd-popup').removeClass('is-visible');
          }
          else {
            Lobibox.alert('error', {
              msg: "Unsupported image file...!"
            });
          }
        }
      });
    });
  });
  $('#upload-demo-i').on('click', function (ev) {
    $('#upload').click();
    $('.cd-popup-trigger').click();
  });
  $('.upload-select').on('click', function (ev) {
    $('#upload').click();
    $('.cd-popup-trigger').click();
  });
  //profile pic ends here
});
