<?php 
    if($this->session->userdata('UserLoginSession'))
        $udata = $this->session->userdata('UserLoginSession');
?>

<div class="container">

	<div class="search">
		<form class="search-form">
			<input type="text" placeholder="Search...">
			<input type="submit" value="Submit">
		</form>
	</div>

</div>
<div class="container">
	<div style="category-container">
		<div class="dropdown">
			<p>Beauty and Wellness</p>
			<ul class="dropdown-content">
				<li>Beauty Salon</li>
				<li>Hair Salon</li>
				<li>Nail Salon</li>
				<li>Massage and Body Treatments</li>
			</ul>
		</div>
		<div class="dropdown">
			<p>Educational Services</p>
			<ul class="dropdown-content">
				<li>Tutorial Lessons</li>
			</ul>
		</div>
		<div class="dropdown">
			<p>Medical and Health Services</p>
			<ul class="dropdown-content">
				<li>Dental Clinic</li>
				<li>Medical Clinic</li>
			</ul>
		</div>
		<div class="dropdown">
			<p>Sports and Fitness</p>
			<ul class="dropdown-content">
				<li>Gyms</li>
				<li>Yoga Classes</li>
				<li>Fitness Classes</li>
			</ul>
		</div>
		<div class="dropdown">
			<p>Other Services</p>
			<ul class="dropdown-content">
				<li>Child Care</li>
				<li>Pet Services</li>
				<li>Auto Services</li>
				<li>Detailing Services</li>
			</ul>
		</div>
	</div>
</div>

<div class="card_container">
	<?php 
	if(isset($key_services)){
		foreach($key_services as $s){?>
		<div class="service_card">
			<img src="<?php echo base_url(); ?>public/img/category/teaching.jpg" 
				height="200" width="200" alt="Service Picture">

			<br><br><br>

			<div class="service_details"> 
				<p><a href="schedule/<?php echo $s["company_id"]."/".$s["id"];?>">
					<?php echo $s["name"];
				?></a></p><br>
				
				<p><a href="<?php echo base_url()."profile/company/".$s["company_id"];?>"><?php 
					echo $s["company_name"];
				?></a></p>
			</div>
			
		</div>
	<?php }}else{?>
	<p>No Services</p>	

<?php } ?>

