
<body>
<p>
    Sign In
</p>
<form method="post" autocomplete="off" action="<?= base_url('Login/check_account')?>">
    <label for="email" class="loginFormEmail form-label">Email</label>					
    <input type="email" id="email" name="email"  required /><br>

    <label for="password" class="loginFormPassword form-label">Password</label>
    <input type="password" id="password" name="password"  required /><br>

    <label><a>Forgot Password?</a></label><br>
    <button type="button"><a href="newsfeed">Back</a></button>

    <button type="submit">LOG IN</button>
</form>