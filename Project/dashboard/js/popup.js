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
	//open popup-do add directory
	$('#directory_add_btn').on('click', function(event){
		event.preventDefault();
		$('#directory_add_form').trigger("reset");
		$("#dir_name_add_error").removeClass('is-visible');
		$("#dir_description_add_error").removeClass('is-visible');
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


	//open popup-do edit user details
	$('.form_user_edit').each(function () {
		$(this).on('submit', function(event){
			$uid=$(this).children('#user_id').val();
			event.preventDefault();
			$user_type=$(this).children('#user_type_id').val();
			$('.user_area').load('./edit_users.php?user_id='+$uid+'&user_type_id='+$user_type);
			$('.edit_user').addClass('is-visible');
		});
	})
	//close popup-add directory
	$('.edit_user').on('click', function(event){
		if( $(event.target).is('.cd-popup-close') || $(event.target).is('.edit_user') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup when clicking the esc keyboard button--add directory
	$(document).keyup(function(event){
		if(event.which=='27'){
			$('.edit_user').removeClass('is-visible');
		}
	});
	//open popup-do add user details
	$('.form_user_add').each(function () {
		$(this).on('submit', function(event){
			event.preventDefault();
			$user_type=$(this).children('#user_type_id').val();
			$('.user_add_area').load('./add_users.php?user_type_id='+$user_type);
			$('.add_user').addClass('is-visible');
		});
	})
	//close popup-add directory
	$('.add_user').on('click', function(event){
		if( $(event.target).is('.cd-popup-close') || $(event.target).is('.add_user') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup when clicking the esc keyboard button--add directory
	$(document).keyup(function(event){
		if(event.which=='27'){
			$('.add_user').removeClass('is-visible');
		}
	});
});
