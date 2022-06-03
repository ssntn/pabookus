<body>
    <?php 
        if($this->session->userdata('UserLoginSession'))
            $udata = $this->session->userdata('UserLoginSession');
    ?>
<ul>
    <li>
        <a href="newsfeed">Home</a>
    </li>
    <li>
        <button>notifications</button>
    </li>
    <li>
        <a href="profile?id=<?php echo $udata['id']?>&ut=2">Profile</a>
    </li>
    <li>
        <a href="signin">Sign in</a>
    </li>
    <li>
        <a href="signup">Sign up</a>
    </li>
    <li>
        <!-- user type: 1 = company, 2 = clients -->
        <a href="logout">Logout</a>
    </li>
</ul>