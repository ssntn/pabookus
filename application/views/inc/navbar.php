<body>
    
<ul>
    <li>
        <a href="newsfeed">Home</a>
    </li>
    <li><button>notifications</button></li>
    <li>
        <a href="profile">Profile</a>
    </li>
    <li>
        <a href="signin">Sign in</a>
    </li>
    <li>
        <a href="signup">Sign up</a>
    </li>

    <button onclick="
    <?php
        $array_items = array($account.'_id' => '', 'email' => '');
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
    ?>">
        logout
    </button>
</ul>
    