	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="/js/vendor/jquery.min.js"><\/script>')</script>
	<!--[if IE]><script src="/js/vendor/PIE.js"></script><![endif]-->
	<script src="js/app.js"></script>
	<script>
		$("#accountExists").click(function(){
		  $(".create-profile, .login-user").toggleClass('is-visible');
		});
		$("#accountNone").click(function(){
			$(".login-user, .create-profile").toggleClass('is-visible');
		});
	</script>
</body>
</html>