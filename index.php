<!--<html>
	<head>
		<title>Connexion</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets1/css/main.css" />
		<noscript><link rel="stylesheet" href="assets1/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

			<div id="wrapper" class="divided">
					<section class="wrapper style1 align-center">
						<div class="inner medium">
							<h2>Connexion</h2>
							<form action="login.php" method="post">
								<?php if (isset($_GET['error'])) { ?>
					     		<p class="error"><?php echo $_GET['error']; ?></p>
					     	<?php } ?>
		                    Email/UserName<input type="text"  name="uname"><br>
		                    Mot de passe<input type="password" name="password" ><br>
												<button type="submit">Login</button>
							</form>
							<form class="" action="creercompte.php" method="post">
								<button type="submit" onclick="creercompte.html">Creer Compte</button>
							</form>




</body>

</html>
-->
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


	<head>
		<title>Connexion</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="css/indexcss.css" />
		<noscript><link rel="stylesheet" href="assets1/css/noscript.css" /></noscript>
	</head>

	<body class="is-preload">
  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Forgot Password</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Username or Email</label>
					<input id="user" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
				<div class="hr"></div>
			</div>
			<div class="for-pwd-htm">
				<div class="group">
					<label for="user" class="label">Username or Email</label>
					<input id="user" type="text" class="input">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Reset Password">
				</div>
				<div class="hr"></div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
