<body>
	<?php 
        if($this->session->userdata('UserLoginSession'))
            $udata = $this->session->userdata('UserLoginSession');
    ?>

	<div class="topnav" id="myTopnav">
		<a href="newsfeed" class="active">PABOOKUS</a>
		<a href=<?php if(isset($udata)){
                    $ut = ($udata['user_type']=='client')?'1':'2'; 
                    echo "profile?id=".$udata['id']."&ut=".$ut;
                }else echo 'signin'; ?>>Profile
		</a>
		    <?php if(!isset($udata)){ ?>
		<a href="signin">Sign in</a>
		<a href="signup">Sign up</a>
		    <?php } else { ?>
		<button>notifications</button>
		    <?php } ?>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
			<!-- user type: 1 = client, 2 = company -->
			<a href="logout">Logout</a>
		</a>
	</div>

	<div style="padding-left:16px">
		
	</div>
    <script>
    function myFunction() {
    	var x = document.getElementById("myTopnav");
    	if (x.className === "topnav") {
    		x.className += " responsive";
    	} else {
    		x.className = "topnav";
    	}
    }
    </script>