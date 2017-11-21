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


          alert($val);
          Lobibox.window({
            title: 'Document Viewer',
            horizontalOffset: 5,                //If the messagebox is larger (in width) than window's width. The messagebox's width is reduced to window width - 2 * horizontalOffset
            verticalOffset: 5,                  //If the messagebox is larger (in height) than window's height. The messagebox's height is reduced to window height - 2 * verticalOffset
            width: 550,
            height: 780,
            content:
            '<embed src="docs/pdf/1EC8.tmp15110781956427.pdf" type="application/pdf"   height="99%" width="99%">'
          });
        }
      },
      "sep0": "-",
      Private_Share: {
        name: "Share",
        icon: "fa-share",
        callback: function(key,option){
          $val = option.$trigger.children(".idval").val();
          alert("Clicked on " + $val);
        }
      },
      Public_Share: {
        name: "Get Sharable Link",
        icon: "fa-link",
        callback: function(key,option){
          $val = option.$trigger.children(".idval").val();
          alert("Clicked on " + $val);
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
              min:"5",
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
