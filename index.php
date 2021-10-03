<html>



	<head>
		<title>QR code Hash</title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="css/indexcss.css" />

	</head>

	<body class="is-preload">

<!------ Include the above in your HEAD tag ---------->

<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Send a secure QR code</h3>
										<?php if (isset($_GET['error'])) { ?>
					     		<p class="error" style="color:red;"><?php echo $_GET['error']; ?></p>
					     	<?php } ?>
								<?php if (isset($_GET['success'])) { ?>
							<p class="success" style="color:green;"><?php echo $_GET['success']; ?></p>
						<?php } ?>
											<form action="send.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Receiver *" name="Email" />
                        </div>
												<div class="form-group">
														<input type="tel" placeholder="Your Phone Number Receiver *" name="phone"/>
                        </div>
												<div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email *" name="YEmail" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your URL to convert and send *" name="urlqr" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Send" />
                        </div>

											</form>
                </div>
                <div class="col-md-6 login-form-2">
                    <div class="login-logo">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                    </div>
                    <h3>Receive your secure QR code</h3>
										<?php if (isset($_GET['send'])) { ?>
									<p class="success" style="color:green;"><?php echo $_GET['send']; ?></p>
								<?php } ?>
								<?php if (isset($_GET['lost'])) { ?>
							<p class="success" style="color:red;"><?php echo $_GET['lost']; ?></p>
						<?php } ?>
												<form action="receive.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Code Receive by E-mail *" name="code" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Receive" />
                        </div>

                    </form>
                </div>
            </div>
        </div>

</body>
</html>
