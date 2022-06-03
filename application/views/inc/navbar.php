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
        <a href=
            <?php 
                if(isset($udata)){
                    
        

                    // company 
                    $ut = ($udata['user_type']=='client')?'1':'2'; 
                    echo "profile?id=".$udata['id']."&ut=".$ut;
                }else
                    echo 'signin';                
            ?>
        >Profile</a>
    </li>

    <?php if(!isset($udata)){ ?>
        <li>
            <a href="signin">Sign in</a>
        </li>
        <li>
            <a href="signup">Sign up</a>
        </li>
        
    <?php } else { ?>
        <li>
            <button>notifications</button>
        </li>
        <li>
            <!-- user type: 1 = client, 2 = company -->
            <a href="logout">Logout</a>
        </li>
    <?php } ?>
</ul>