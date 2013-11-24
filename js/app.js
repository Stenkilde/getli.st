$(document).ready(function(){
	$("#accountExists, #accountNone").click(function(){
		$(".create-profile, .login-user").toggleClass('is-visible');
	});
});