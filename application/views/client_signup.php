<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Sign Up</title>
</head>
<body>
    <p>Client Sign-up: </p>
    <form  method="post" autocomplete="off" action="<?= base_url('Register/add_client')?>">
        <input type="text" name="user_type" id="user_type" value="client" style="display: none;">
    
        <label>Email: </label>
        <input type="email" id="email" name="email" required /><br>

        <label>Password:</label>
        <input type="password" id="password" name="password" required /><br>

        <label>Confirm Password:</label>
        <input type="password" id="password_c" name="password_c" required /><br>
        
        <button type="submit">Submit</button>
    </form>
    <button><a href="signup">Back</a></button>
</body>


</html>

<script>

</script>