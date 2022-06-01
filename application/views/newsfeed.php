<?php 
if($this->session->userdata('UserLoginSession'))
{
    $udata = $this->session->userdata('UserLoginSession');
}
else
{
    redirect(base_url('signin'));
}
?>

<body>
<p>Newsfeed</p>
<p><?php echo $udata['email'] ?></p>