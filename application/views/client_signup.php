
<body>
<p>Client Sign-up: </p>
<form  method="post" autocomplete="off" action="<?= base_url('Register/add_user')?>">

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