<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign In</title>
</head>
<body>
    <p>
        Admin Sign In
    </p>
    <form method="POST" action="">
        <label for="email" class="loginFormEmail form-label">Email</label>					
        <input type="email" id="email" name="email"  required /><br>
        <label for="password" class="loginFormPassword form-label">Password</label>
        <input type="password" id="password" name="password"  required /><br>
        <label><a>Forgot Password?</a></label><br>
        <button type="button"><a href="AdminRegister">Register</a></button>
		<button type="submit">LOG IN</button>
    </form>
</body>
</html>