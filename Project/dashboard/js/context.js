$(function() {
  $.contextMenu({
    selector: '.sd-document',
    items: {
      Priview: {
        name: "Priview",
        icon: "fa-eye",
        callback: function(key,option){
          $doc_id = option.$trigger.children(".idval").val();
          $fun="doc_priview";
          $.ajax({
            type:'post',
            url:'./context_actions.php',
            data:{doc_id:$doc_id,fun:$fun},
            success:function(response)
            {
              var obj = JSON.parse(response)[0]['val'];
              if(obj){
                var doc_name=JSON.parse(response)[1]['doc'];
                Lobibox.window({
                  title: 'Document Viewer',
                  horizontalOffset: 5,                //If the messagebox is larger (in width) than window's width. The messagebox's width is reduced to window width - 2 * horizontalOffset
                  verticalOffset: 5,                  //If the messagebox is larger (in height) than window's height. The messagebox's height is reduced to window height - 2 * verticalOffset
                  width: 550,
                  height: 780,
                  content:
                  '<embed src="docs/pdf/'+doc_name+'" type="application/pdf"   height="99%" width="99%">'
                });
              }
              else{
                Lobibox.notify('error', {
                  delay:5000,
                  title: 'Priview Failed',
                  msg: "You can't view this document right now..!"
                });
              }
            }
          });
        }
      },
      "sep0": "-",
      share: {
        name: "Share",
        icon: "fa-share",
        callback: function(key,option){
          $val = option.$trigger.children(".idval").val();
          $('#doc_share_form').trigger("reset");
      		$("#doc_share_email_phone_error").removeClass('is-visible');
      		$('#doc_share_pop').addClass('is-visible');
          $(".common-div-share-doc").hide();
          $('#share_doc_id').val($val);
        }
      },
      getlink: {
        name: "Get Sharable Link",
        icon: "fa-link",
        callback: function(key,option){
          $val = option.$trigger.children(".idval").val();
          $('#public_doc_link_form').trigger("reset");
      		$("#public_doc_link_error").removeClass('is-visible');
      		$('#public_doc_link_pop').addClass('is-visible');
          $(".common-div-share-doc").hide();
          $('#public_link_doc_id').val($val);
        }
      },
      Add_ShareBox: {
        name: "Add to ShareBox",
        icon: "fa-plus",
        callback: function(key,option){
          Lobibox.window({
            title: 'Window title',
            content: '...'
          });
        }
      },
      download: {
        name: "Download",
        icon: "fa-download",
        callback: function(key,option){
          $doc_id = option.$trigger.children(".idval").val();
          $fun="doc_download";
          $.ajax({
            type:'post',
            url:'./context_actions.php',
            data:{doc_id:$doc_id,fun:$fun},
            success:function(response)
            {
              var obj = JSON.parse(response)[0]['val'];
              if(obj){
                var doc_name=JSON.parse(response)[1]['doc'];
                var doc_caption=JSON.parse(response)[2]['cap'];
                var filepath = "docs/pdf/"+doc_name;
                var link = document.createElement("a");
                link.download = doc_caption;
                link.href = filepath;
                link.click();
                Lobibox.notify('success', {
                  delay:5000,
                  title: 'Download Success',
                  msg: "Your document will download shortly...!"
                });
              }
              else{
                Lobibox.notify('error', {
                  delay:5000,
                  title: 'Download Failed',
                  msg: "You can't download this document right now..!"
                });
              }
            }
          });
        }
      },
      "sep1": "-",
      Rename: {
        name: "Rename",
        icon: "fa-pencil",
        callback: function(key,option){
          $val = option.$trigger.children(".idval").val();
          Lobibox.prompt('text', //Any input type will be valid
          {
            title: 'Rename Document',
            attrs: {
              placeholder: "Enter New Name",
              min:"3",
              id:"newname"
            },
            callback: function ($this, type) {
              if (type === 'ok') {
                $name=$("#newname").val();
                if($name.length>=3){
                  $doc_id = option.$trigger.children(".idval").val();
                  $fun="doc_rename";
                  $.ajax({
                    type:'post',
                    url:'./context_actions.php',
                    data:{doc_id:$doc_id,fun:$fun,name:$name},
                    success:function(response)
                    {
                      var obj = JSON.parse(response)[0]['val'];
                      if(obj){
                        $('#doc-list-div').load(document.URL +  ' #doc-list-div');
                        Lobibox.notify('success', {
                          delay:5000,
                          title: 'Document Renamed',
                          msg: "Your document has been renamed successfully...!"
                        });
                      }
                      else{
                        Lobibox.notify('error', {
                          delay:5000,
                          title: 'Renaming Failed',
                          msg: "You can't rename this document right now..!"
                        });
                      }
                    }
                  });
                }
              }
            }
          });
        }
      },
      Change_Description: {
        name: "Change Description",
        icon: "fa-edit",
        callback: function(key,option){
          Lobibox.prompt('text', //Any input type will be valid
          {
            title: 'Change Description',
            attrs: {
              placeholder: "Enter Description",
              min:"3",
              id:"newdesc"
            },
            callback: function ($this, type) {
              if (type === 'ok') {
                $desc=$("#newdesc").val();
                if($desc.length>=3){
                  $doc_id = option.$trigger.children(".idval").val();
                  $fun="doc_change_desc";
                  $.ajax({
                    type:'post',
                    url:'./context_actions.php',
                    data:{doc_id:$doc_id,fun:$fun,desc:$desc},
                    success:function(response)
                    {
                      var obj = JSON.parse(response)[0]['val'];
                      if(obj){
                        $('#doc-list-div').load(document.URL +  ' #doc-list-div');
                        Lobibox.notify('success', {
                          delay:5000,
                          title: 'Description Changed',
                          msg: "Your document description has been changed successfully...!"
                        });
                      }
                      else{
                        Lobibox.notify('error', {
                          delay:5000,
                          title: 'Description not changed',
                          msg: "You can't change this document description right now..!"
                        });
                      }
                    }
                  });

                }
              }
            }
          });
        }
      },
      "sep2": "--",
      Delete: {
        name: "Remove",
        icon: "fa-trash",
        callback: function(key,option){
          $val = option.$trigger.children(".idval").val();
          Lobibox.confirm({
            msg: "Are you sure you want to delete this user?",
            callback: function ($this, type) {
              if (type === 'yes') {
                $doc_id = option.$trigger.children(".idval").val();
                $fun="doc_delete";
                $.ajax({
                  type:'post',
                  url:'./context_actions.php',
                  data:{doc_id:$doc_id,fun:$fun},
                  success:function(response)
                  {
                    var obj = JSON.parse(response)[0]['val'];
                    if(obj){
                      $('#doc-list-div').load(document.URL +  ' #doc-list-div');
                      Lobibox.notify('success', {
                        delay:5000,
                        title: 'Document Deleted',
                        msg: "Your document has been deleted successfully...!"
                      });
                    }
                    else{
                      Lobibox.notify('error', {
                        delay:5000,
                        title: 'Deletion Failed',
                        msg: "You can't delete this document right now..!"
                      });
                    }
                  }
                });
              }
            }
          });

        }
      }
    }
  })

  $.contextMenu({
    selector: '.shared-with-me-document',
    items: {
      Priview: {
        name: "Priview",
        icon: "fa-eye",
        callback: function(key,option){
          $doc_id = option.$trigger.children(".idval").val();
          $fun="doc_priview";
          $.ajax({
            type:'post',
            url:'./context_actions.php',
            data:{doc_id:$doc_id,fun:$fun},
            success:function(response)
            {
              var obj = JSON.parse(response)[0]['val'];
              if(obj){
                var doc_name=JSON.parse(response)[1]['doc'];
                Lobibox.window({
                  title: 'Document Viewer',
                  horizontalOffset: 5,                //If the messagebox is larger (in width) than window's width. The messagebox's width is reduced to window width - 2 * horizontalOffset
                  verticalOffset: 5,                  //If the messagebox is larger (in height) than window's height. The messagebox's height is reduced to window height - 2 * verticalOffset
                  width: 550,
                  height: 780,
                  content:
                  '<embed src="docs/pdf/'+doc_name+'" type="application/pdf"   height="99%" width="99%">'
                });
              }
              else{
                Lobibox.notify('error', {
                  delay:5000,
                  title: 'Priview Failed',
                  msg: "You can't view this document right now..!"
                });
              }
            }
          });
        }
      },
      download: {
        name: "Download",
        icon: "fa-download",
        callback: function(key,option){
          $doc_id = option.$trigger.children(".idval").val();
          $fun="doc_download";
          $.ajax({
            type:'post',
            url:'./context_actions.php',
            data:{doc_id:$doc_id,fun:$fun},
            success:function(response)
            {
              var obj = JSON.parse(response)[0]['val'];
              if(obj){
                var doc_name=JSON.parse(response)[1]['doc'];
                var doc_caption=JSON.parse(response)[2]['cap'];
                var filepath = "docs/pdf/"+doc_name;
                var link = document.createElement("a");
                link.download = doc_caption;
                link.href = filepath;
                link.click();
                Lobibox.notify('success', {
                  delay:5000,
                  title: 'Download Success',
                  msg: "Your document will download shortly...!"
                });
              }
              else{
                Lobibox.notify('error', {
                  delay:5000,
                  title: 'Download Failed',
                  msg: "You can't download this document right now..!"
                });
              }
            }
          });
        }
      }
    }
  })
  $.contextMenu({
    selector: '.sd-d',
    items: {
      copy: {
        name: "Copy",
        icon: "fa-edit",
        callback: function(key){
          alert("Clicked on " + key);
        }
      }
    }
  })
});
/**
* Receipient email_phone checking
* @return error message
*/
$("#doc_share_email_phone").focusout(function(){
  $email_phone = $('#doc_share_email_phone').val();
  var validator_email= /^[A-Za-z0-9._]*\@[A-Za-z0-9._]*\.[A-Za-z]{2,5}$/;
  var validator_phone= /^[6-9]{1,1}[0-9]{9,9}$/;
  if((!validator_email.test($email_phone))&&(!validator_phone.test($email_phone))){
    $("#doc_share_email_phone_error").addClass('is-visible');
    $("#doc_share_email_phone_error").html('Invalid Email or Phone number');
    $(".common-div-share-doc").hide();
  }
  else {
    $fun="check_doc_share_email_phone";
    $.ajax({
      type:'post',
      url:'./context_actions.php',
      data:{email_phone:$email_phone,fun:$fun},
      success:function(response)
      {
        var obj = JSON.parse(response)[0]['val'];
        if(obj){
          var u_name=JSON.parse(response)[1]['u_name'];
          var resp_id=JSON.parse(response)[2]['resp_id'];
          $("#doc_share_email_phone_error").removeClass('is-visible');
          $("#doc_resp_name").val(u_name);
          $("#share_resp_id").val(resp_id);
          $(".common-div-share-doc").show();
        }
        else{
          $("#doc_share_email_phone_error").addClass('is-visible');
          $("#doc_share_email_phone_error").html('Details not Matching any records');
          $(".common-div-share-doc").hide();
        }
      }
    });
  }
});


/**
* Public link checking
* @return error message
*/
$("#public_doc_link").focusout(function(){
  $link = $('#public_doc_link').val();
  var validator = /^[a-zA-Z0-9_]{3,20}$/;
  if(!validator.test($link)){
    $("#public_doc_link_error").addClass('is-visible');
    $("#public_doc_link_error").html('Invalid link format');
    $(".common-div-share-doc").hide();
  }
  else {
    $fun="check_doc_share_link";
    $.ajax({
      type:'post',
      url:'./context_actions.php',
      data:{link:$link,fun:$fun},
      success:function(response)
      {
        var obj = JSON.parse(response)[0]['val'];
        if(obj){
          $("#public_doc_link_error").removeClass('is-visible');
          $(".common-div-share-doc").show();
        }
        else{
          $("#public_doc_link_error").addClass('is-visible');
          $("#public_doc_link_error").html('Link Text already used..!');
          $(".common-div-share-doc").hide();
        }
      }
    });
  }
});

/**
* Doc share on submit
* @return error message
*/
$("#doc_share_form").on("submit", function(){
    $resp_id=$(this).children(".common-div-share-doc").children("#share_resp_id").val();
    $doc_id=$(this).children(".common-div-share-doc").children("#share_doc_id").val();
    $fun="doc_share_submit";
    $.ajax({
      type:'post',
      url:'./context_actions.php',
      data:{resp_id:$resp_id,doc_id:$doc_id,fun:$fun},
      success:function(response)
      {
        var obj = JSON.parse(response)[0]['val'];
        if(obj){
          $('#doc_share_pop').removeClass('is-visible');
          Lobibox.notify('success', {
            delay:5000,
            title: 'Document Shared',
            msg: 'Your Document has been Shared successfully..!'
          });
        }
        else{
          $('#doc_share_pop').removeClass('is-visible');
          Lobibox.notify('error', {
            delay:5000,
            title: 'Sharing Error',
            msg: 'Document already shared..!'
          });
        }
      }
    });
});

/**
* Doc share on submit
* @return error message
*/
$("#public_doc_link_form").on("submit", function(){
    $link_text=$(this).children(".form-group").children("#public_doc_link").val();
    $doc_id=$(this).children(".common-div-share-doc").children("#public_link_doc_id").val();
    $fun="public_doc_link_submit";
    $.ajax({
      type:'post',
      url:'./context_actions.php',
      data:{link_text:$link_text,doc_id:$doc_id,fun:$fun},
      success:function(response)
      {
        var obj = JSON.parse(response)[0]['val'];
        if(obj){
          $('#public_doc_link_pop').removeClass('is-visible');
          Lobibox.notify('success', {
            delay:5000,
            title: 'Link Generated',
            msg: 'Public Link ('+$link_text+') has been Generated successfully..!'
          });
        }
        else{
          $('#public_doc_link_pop').removeClass('is-visible');
          Lobibox.notify('error', {
            delay:5000,
            title: 'Link Error',
            msg: 'Link Generation Failed..!'
          });
        }
      }
    });
});
