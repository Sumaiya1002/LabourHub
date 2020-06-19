<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="CSS/signin.css">
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script>
		function pass(){
			var pass=Math.random().toString(20).substr(5, 9);
			var email=document.getElementById("email").value;
			$.ajax({
				type: 'post',
				url: 'sending_pass.php',
				data: {
				email:email,
                pass:pass},
				success: function (html) {
					alert("We Send a Code in Your mail!");
                }
            });
		}
	</script>
	<script>
		function check_mail(){
			var email=document.getElementById("email").value;
			$.ajax({
				type: 'post',
				url: 'check_mail.php',
				data: {
				email:email},
				success: function (html) {
					$('#result').html(html);
			    },
			});
		}
	</script>
</head>
<body>
	<div class="signin-form">
		<form>
			<div class="form-header">
				<h2>LabourHub</h2>
				<p>Forgot Password</p>
			</div>
			<div class="form-group">
				<input style="border-bottom: 1px solid #999;" type="email" class="form-control" id="email" name="email" placeholder="Email"
				autocomplete="off" onblur="check_mail()">
				<span id="result" style="color:red;"></span>
			</div>			
			<div class="form-group">
				<button class="btn" id="sentbtn" name="sent" disabled onclick="pass()">Sent</button>
			</div>
			<div class="form-group">
				<a href="signin.php">SignIn</a>
			</div>
			
			
		</form>
	</div>
		

</body>
</html>