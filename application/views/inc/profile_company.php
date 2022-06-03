
<body>
<!-- THIS IS PROFILE PICTURE -->
<div id="" style="width:200px;height:200px;background-color:red">
    <img src="#" alt="Profile Picture">
</div>

<button id="edit_btn">Edit info</button>
<p class="inf_title">Name:</p>
<p  class="u_inf" id="name_lbl">
    <?php echo isset($key_details['firstname'])
        ? $key_details['first_name']." ".$key_details['last_name']
        : "user_".$key_details['company_id'];
    ?>
</p>
<input class="edit_box" type="text" name="name_edt" id="name_edt">

<p class="inf_title">Email:</p>
<p class="u_inf" id="email_lbl"><?php echo $key_details['email']; ?></p>
<input class="edit_box" type="text" name="email_edt" id="email_edt">

<p class="inf_title">Contact numbers:</p>
<p class="u_inf" id="contact_lbl">
    <?php echo isset($key_details['contact'])
        ? $key_details['contact']
        : "Not set"
    ?>
</p>
<input class="edit_box" type="text" name="contact_edt" id="contact_edt">

<p class="inf_title">Address</p>
<p class="u_inf" id="address_lbl">
    <?php echo isset($key_details['contact'])
        ? $key_details['address']
        : "Not set"
    ?>
</p>
<input class="edit_box" type="text" name="address_edt" id="address_edt">

<p class="inf_title">Industry</p>
<p class="u_inf" id="industry_lbl">Entertainment</p>
<input class="edit_box" type="text" name="industry_edt" id="industry_edt">
<select  class="edit_box" name="industry_list" id="industry_edts">
    <option value="null">Select</option>
</select>

<p class="inf_title">Owner</p>
<p class="u_inf" id="owner_lbl">YAGOO</p>
<input class="edit_box" type="text" name="owner_edt" id="owner_edt">

<p>Birthday</p> 
<input type="date" name="birthdate" id="birthdate_lbl">
<p>Bio</p>
<ul>links
    <li><a href="#">Twitter</a></li>
    <li><a href="#">Facebook</a></li>
    <li><a href="#">Instagram</a></li>
</ul>
<p><button><a href="schedule">Schedule</a></button></p>
<p>Reviews</p>

<script type="text/javascript">
    $('.edit_box').css("display", "none");
    $('#industry_edt').attr("readonly", "true");
    


    function edit_profile(){

        $('#name_edt').val($('#name_lbl').html());
        $('#email_edt').val($('#email_lbl').html());
        $('#contact_edt').val($('#contact_lbl').html());
        $('#address_edt').val($('#address_lbl').html());
        $('#industry_edt').val($('#industry_lbl').html());
        $('#owner_edt').val($('#owner_lbl').html());
    }

    $('#edit_btn').click(function(){
        if ($('.edit_box').css("display") == "none"){

            // REMOVE INFOS, DISPLAY TEXT BOX
            $('.edit_box').css("display", "");
            $('.u_inf').css("display", "none");
            
            edit_profile();
        }else {

            // REMOVE TEXTBOX, DISPLAY INFO
            $('.edit_box').css("display", "none");
            $('.u_inf').css("display", "");

        }
    })

</script>