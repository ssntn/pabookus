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

<p><?php if(isset($udata)) echo $udata['email'] ?></p>
