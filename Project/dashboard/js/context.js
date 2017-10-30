$(function() {
  $.contextMenu({
    selector: '.sd-directory',
    items: {
      copy: {
        name: "Copy",
        icon: "fa-edit",
        callback: function(key){
          alert("Clicked on " + key);
        }
      },
      cut: {
        name: "Cut",
        icon: "fa-cut",
        callback: function(key){
          alert("Clicked on " + key);
        }
      }
    }
  })
  $.contextMenu({
    selector: '.sd-document',
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
