<?php 
    if($this->session->userdata('UserLoginSession'))
        $udata = $this->session->userdata('UserLoginSession');
?>

<div class="container" style="justify-content: center; background-color: #A3CEF1; margin-top: 20px; border-radius: 10px;">
    
    <div class="search">
        <form class="search-form">
            <input type="text" placeholder="Search...">
            <input type="submit" value="Submit">
        </form>
    </div>

    <div>

    </div>
</div>

<p><?php if(isset($udata)) echo $udata['email'] ?></p>