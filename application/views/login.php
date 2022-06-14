<div class="form-modal">
	<h2 style="text-align: center; padding: 15px; background-color: #274C77; color: white; border-radius: 10px;">SIGN-UP/SIGN-IN</h2>
	<div class="form-toggle">
		<button id="login-toggle" onclick="toggleLogin()">log in</button>
		<button id="signup-toggle" onclick="toggleSignup()">sign up</button>
	</div>

	<div id="login-form">
		<form method="post" autocomplete="off" action="<?= base_url('Login/check_account')?>">
			<input type="email" id="email" name="email" placeholder="Enter your email" required />
			<input type="password" id="password" name="password" placeholder="Enter password" required />
			<button type="submit" class="btn login">login</button>
			<p><a href="javascript:void(0)">Forgot your password?</a></p>
			<hr />

		</form>
	</div>

	<div id="signup-form">
		<form method="post" autocomplete="off" action="<?= base_url('Register/add_user')?>">
			<input type="email" id="email" name="email" placeholder="Enter your email" required />
			<input type="password" id="password" name="password" placeholder="Enter password" required />
			<input type="password" id="password_c" name="password_c" placeholder="Confirm password" required />
			<span style="display: flex; justify-content: space-around; padding: 15px;">
				<span>
					<input type="radio" name="user_type" id="user_type" value="company" style="width: auto;" required>
					<label>Sign-up as company</label>
				</span>
				<span>
					<input type="radio" name="user_type" id="user_type" value="client" style="width: auto;" required>
					<label>Sign-up as client</label>
				</span>
			</span>
			<button type="submit" class="btn signup">create account</button>
			<p>Clicking <strong>create account</strong> means that you are agree to our <a
					href="javascript:void(0)">terms of services</a>.</p>
			<hr />

		</form>
	</div>

</div>

<script>
function toggleSignup() {
	document.getElementById("login-toggle").style.backgroundColor = "#fff";
	document.getElementById("login-toggle").style.color = "#222";
	document.getElementById("signup-toggle").style.backgroundColor = "#6096BA";
	document.getElementById("signup-toggle").style.color = "#fff";
	document.getElementById("login-form").style.display = "none";
	document.getElementById("signup-form").style.display = "block";
}

function toggleLogin() {
	document.getElementById("login-toggle").style.backgroundColor = "#6096BA";
	document.getElementById("login-toggle").style.color = "#fff";
	document.getElementById("signup-toggle").style.backgroundColor = "#fff";
	document.getElementById("signup-toggle").style.color = "#222";
	document.getElementById("signup-form").style.display = "none";
	document.getElementById("login-form").style.display = "block";
}

</script>