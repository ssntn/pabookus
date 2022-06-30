<body>
	<?php 
        if($this->session->userdata('UserLoginSession'))
            $udata = $this->session->userdata('UserLoginSession');
		$page = $this->session->userdata('page');
    ?>

	<div class="topnav" id="myTopnav">
		<a href="<?php echo base_url();?>" >PABOOKUS</a>
		
		<a href="<?php echo base_url();?>"
		<?php if($page=="home") echo"class=active";?>>Home</a>

		<a href="<?php 
			if(isset($udata)) echo  base_url()."my_account";
			else echo 'login'; ?>"
			<?php if($page=="profile") echo"class=active";?>>Profile
		</a>

		<?php if(!isset($udata)){ ?>
			<a href="<?php echo base_url();?>/login">Log-in</a>
		<?php } else { ?>
		    
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
			<a href="<?php echo base_url();?>/logout">Logout</a>
		</a>
			<?php } ?>
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