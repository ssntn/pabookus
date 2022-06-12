<?php 
    if($this->session->userdata('UserLoginSession'))
        $udata = $this->session->userdata('UserLoginSession');
?>

<body>
<p>Newsfeed</p>
<p><?php if(isset($udata)) echo $udata['email'] ?></p>