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
});
