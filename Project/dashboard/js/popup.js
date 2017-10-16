$(document).ready(function(){
	//open popup-profile-pic
	$('.cd-popup-trigger').on('click', function(event){
		event.preventDefault();
		$('#profile-pic').addClass('is-visible');
	});

	//close popup-profile-pic
	$('#profile-pic').on('click', function(event){
		if( $(event.target).is('.cd-popup-close') || $(event.target).is('#profile-pic') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup when clicking the esc keyboard button-profile-pic
	$(document).keyup(function(event){
		if(event.which=='27'){
			$('#profile-pic').removeClass('is-visible');
		}
	});

	//open popup-change password
	$('#cpass-icon').on('click', function(event){
		event.preventDefault();
		$('#password-change').addClass('is-visible');
	});

	//close popup-change password
	$('#password-change').on('click', function(event){
		if( $(event.target).is('.cd-popup-close') || $(event.target).is('#password-change') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup when clicking the esc keyboard button-change password
	$(document).keyup(function(event){
		if(event.which=='27'){
			$('#password-change').removeClass('is-visible');
		}
	});
	//open popup-phone varification
	$('#varify-phone-btn').on('click', function(event){
		event.preventDefault();
		$('#varify-phone').addClass('is-visible');
		$fun="varify-phone-otpsend";
		$.ajax({
			type:'post',
			url:'./actions.php',
			data:{fun:$fun}
		});

	});
	//close popup-phone varification
	$('#varify-phone').on('click', function(event){
		if( $(event.target).is('.cd-popup-close') || $(event.target).is('#varify-phone') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup when clicking the esc keyboard button-phone varification
	$(document).keyup(function(event){
		if(event.which=='27'){
			$('#varify-phone').removeClass('is-visible');
		}
	});

	//open popup-docadd
	$('#doc_add_btn').on('click', function(event){
		event.preventDefault();
		$('#doc_add_form').trigger("reset");
		$('#docx_upload_error').removeClass('is-visible');
		$('#doc_add_pop').addClass('is-visible');
	});

	//close popup-docadd
	$('#doc_add_pop').on('click', function(event){
		if( $(event.target).is('.cd-popup-close') || $(event.target).is('#doc_add_pop') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup when clicking the esc keyboard button--docadd
	$(document).keyup(function(event){
		if(event.which=='27'){
			$('#doc_add_pop').removeClass('is-visible');
		}
	});

	$('#upload-docx').on('click', function () {
		var form_data = new FormData();
		var ins = document.getElementById('multiDocx').files.length;
		if(ins>0){
			$("#docx_upload_error").removeClass('is-visible');
			for (var x = 0; x < ins; x++) {
				form_data.append("files[]", document.getElementById('multiDocx').files[x]);
			}
			$.ajax({
				url: 'upload_docx.php', // point to server-side PHP script
				dataType: 'text', // what to expect back from the PHP script
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function (response) {
					if(response==ins){
						Lobibox.notify('success', {
                delay:5000,
              title: 'Doucuments Uploaded',
              msg: 'All of your documents has been uploaded successfully..!'
            });
					}
					else if(response>0){
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
	//open popup-do add directory
	$('#directory_add_btn').on('click', function(event){
		event.preventDefault();
		$('#directory_add_form').trigger("reset");
		$(".oh-autoval-error").remove();
		$('#add_directory_pop').addClass('is-visible');

	});

	//close popup-add directory
	$('#add_directory_pop').on('click', function(event){
		if( $(event.target).is('.cd-popup-close') || $(event.target).is('#add_directory_pop') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup when clicking the esc keyboard button--add directory
	$(document).keyup(function(event){
		if(event.which=='27'){
			$('#add_directory_pop').removeClass('is-visible');
		}
	});
});
