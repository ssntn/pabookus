<?php 
    if($this->session->userdata('UserLoginSession'))
        $udata = $this->session->userdata('UserLoginSession');
?>

<body>
<p><?php if(isset($udata)) echo $udata['email']; ?></p>

<?php 
if(isset($key_services)){
    foreach($key_services as $s){?>
    <div style="background-color:#99f;width:50%">
        <img src="#" alt="Service Picture"><br><br><br>

        <p><a href="schedule/<?php echo $s["company_id"]."/".$s["id"];?>"><?php 
            echo $s["name"];?></a>
        </p>
        
        <p><a href="<?php echo base_url()."profile/company/".$s["company_id"];?>"><?php 
            echo $s["company_name"];?></a>
        </p>

    </div>
<?php }}else{?>
<p>No Services</p>

<?php } ?>
<div>

</div>