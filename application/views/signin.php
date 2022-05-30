<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
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
</body>
</html>