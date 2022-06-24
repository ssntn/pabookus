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


	<div class="card-container">
		<div class="service-card" style="background-color: red;">

		</div>
	</div>



</div>

<p><?php if(isset($udata)) echo $udata['email'] ?></p>