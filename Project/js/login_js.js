jQuery(document).ready(function($){
	var $form_modal = $('.cd-user-modal'),
	$form_login = $form_modal.find('#cd-login'),
	$form_signup = $form_modal.find('#cd-signup'),
	$form_forgot_password = $form_modal.find('#cd-reset-password'),
	$form_verify=$form_modal.find('#cd-verify'),
	$form_modal_tab = $('.cd-switcher'),
	$tab_login = $form_modal_tab.children('li').eq(0).children('a'),
	$tab_signup = $form_modal_tab.children('li').eq(1).children('a'),
	$forgot_password_link = $form_login.find('.reset-message a'),
	$back_to_login_link = $form_forgot_password.find('.reset-message a'),
	$main_nav = $('.login-btn'),
	$forms=$('.cform'),
	$errors=$('.cd-error-message');

	//open modal
	$main_nav.on('click', function(event){

		if( $(event.target).is($main_nav) ) {
			// on mobile open the submenu
			$(this).children('ul').toggleClass('is-visible');
		} else {
			// on mobile close submenu
			$main_nav.children('ul').removeClass('is-visible');
			//show modal layer
			$form_modal.addClass('is-visible');
			//show the selected form
			( $(event.target).is('.cd-signup') ) ? signup_selected() : login_selected();
			$forms.trigger("reset");
			$errors.removeClass('is-visible');
		}

	});

	//close modal
	$('.cd-user-modal').on('click', function(event){
		if( $(event.target).is($form_modal) || $(event.target).is('.cd-close-form') ) {
			$form_modal.removeClass('is-visible');
		}
	});
	//close modal when clicking the esc keyboard button
	$(document).keyup(function(event){
		if(event.which=='27'){
			$form_modal.removeClass('is-visible');
		}
	});

	//switch from a tab to another
	$form_modal_tab.on('click', function(event) {
		event.preventDefault();
		( $(event.target).is( $tab_login ) ) ? login_selected() : signup_selected();
		$forms.trigger("reset");
		$errors.removeClass('is-visible');
	});

	//hide or show password
	$('.hide-password').on('click', function(){
		var $this= $(this),
		$password_field = $this.prev('input');

		( 'password' == $password_field.attr('type') ) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
		( 'Hide' == $this.text() ) ? $this.text('Show') : $this.text('Hide');
		//focus and move cursor to the end of input field
		$password_field.putCursorAtEnd();
	});

	//show forgot-password form
	$forgot_password_link.on('click', function(event){
		event.preventDefault();
		forgot_password_selected();
		$forms.trigger("reset");
		$errors.removeClass('is-visible');
	});

	//back to login from the forgot-password form
	$back_to_login_link.on('click', function(event){
		event.preventDefault();
		login_selected();
		$forms.trigger("reset");
		$errors.removeClass('is-visible');
	});

	function login_selected(){
		$form_login.addClass('is-selected');
		$form_signup.removeClass('is-selected');
		$form_verify.removeClass('is-selected');
		$form_forgot_password.removeClass('is-selected');
		$tab_login.addClass('selected');
		$tab_signup.removeClass('selected');
	}

	function signup_selected(){
		$form_login.removeClass('is-selected');
		$form_signup.addClass('is-selected');
		$form_verify.removeClass('is-selected');
		$form_forgot_password.removeClass('is-selected');
		$tab_login.removeClass('selected');
		$tab_signup.addClass('selected');
	}

	function forgot_password_selected(){
		$form_login.removeClass('is-selected');
		$form_signup.removeClass('is-selected');
		$form_verify.removeClass('is-selected');
		$form_forgot_password.addClass('is-selected');
	}


	//IE9 placeholder fallback
	//credits http://www.hagenburger.net/BLOG/HTML5-Input-Placeholder-Fix-With-jQuery.html
	$('.log-btn-main').click(function(){
		$("#log-btn").click();
	})


});


//credits https://css-tricks.com/snippets/jquery/move-cursor-to-end-of-textarea-or-input/
jQuery.fn.putCursorAtEnd = function() {
	return this.each(function() {
		// If this function exists...
		if (this.setSelectionRange) {
			// ... then use it (Doesn't work in IE)
			// Double the length because Opera is inconsistent about whether a carriage return is one character or two. Sigh.
			var len = $(this).val().length * 2;
			this.setSelectionRange(len, len);
		} else {
			// ... otherwise replace the contents with itself
			// (Doesn't work in Google Chrome)
			$(this).val($(this).val());
		}
	});
};
