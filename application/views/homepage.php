<html>
<head>
	<meta charset='utf-8'>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/HP_style.css">
</head>
<body>
	<div id='container'>
	<h2>Welcome to the Book Review App!</h2>
	<p id='tagline'>Register or log in to read and add reviews to your favorite and not so favorite books</p>
	<div id='registration'>
		<h5>Register</h5>
		<form action='/users/register' method='post'>
			<input type='text' name='name' placeholder='Your Name' >
			<input type='text' name='username' placeholder='Username'>
			<input type='text' name='email' placeholder='Email'>
			<input type='password' name='password' placeholder='Password'>
			<p>Your password must be at least 8 characters</p>
			<input type='password' name='confirm_pw' placeholder='Confirm Password'>
			<input type='submit' value='Register'>
		</form>
	</div>
	<div id='sign_in'>
		<h5>Login</h5>
		<form action='/users/login' method='post'>
			<input type='text' name='email' placeholder='Email'>
			<input type='password' name='password' placeholder='Password'>
			<input type='submit' value='Login'>
		</form>
	</div>
	<div id='errors'>
		<?php if ($this->session->userdata('errors')) 
		{ ?>
			<p><?= $this->session->userdata('errors');?></p>
			<?php $this->session->unset_userdata('errors');
		} ?>
		<?php if ($this->session->flashdata('login error')) 
		{ ?>
			<p><?= $this->session->flashdata('login error');?></p>
		<?php } ?>


	</div>
	</div>
</body>
</html>