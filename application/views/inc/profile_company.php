
<body>
<!-- THIS IS PROFILE PICTURE -->
<div id="" style="width:200px;height:200px;background-color:red">
    <img src="#" alt="Profile Picture">
</div>

<button id="edit_btn">Edit info</button>
<button id="save_btn">Save</button>
<p class="inf_title">Name:</p>
<p  class="u_inf" id="name_lbl">
<?php echo isset($key_details['company_name'])
    ? $key_details['company_name']
    : "user_".$key_details['company_id'];
?>
</p>
<input class="edit_box" type="text" name="name_edt" id="name_edt">

<p class="inf_title">Email:</p>
<p class="u_inf" id="email_lbl">
<?php echo $key_details['email']; ?></p>
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
<?php echo isset($key_details['address'])
    ? $key_details['address']
    : "Not set"
?>
</p>
<input class="edit_box" type="text" name="address_edt" id="address_edt">

<p class="inf_title">Industry</p>
<p class="u_inf" id="industry_lbl">
<?php echo isset($key_details['industry'])
    ? $key_details['industry']
    : "Not set"
?>
</p>
<input class="edit_box" type="text" name="industry_edt" id="industry_edt">
<select class="edit_box" name="industry_list" id="industry_edts">
<option value="null">Select</option>
<?php
    $industry = ["Industry 1","Industry 2","Industry 3"];
    foreach($industry as $i){?>
        
    <option value="<?php echo $i ?>"><?php echo $i ?></option>
        
<?php } ?>
</select>

<p class="inf_title">Owner</p>
<p class="u_inf" id="owner_lbl">
<?php echo isset($key_details['owner'])
    ? $key_details['owner']
    : "Not set"
?>
</p>
<input class="edit_box" type="text" name="owner_edt" id="owner_edt">

<p>Founding Date</p>

<p class="u_inf" id="founding_date_lbl"><?php 
    echo isset($key_details['founding_date'])
        ? $key_details['founding_date']
        : "Not set"
?>
</p>
<input class="edit_box" type="date" name="founding_date_edt" id="founding_date_edt">
<button onclick="print()">print</button>
<p>Bio</p>

<p>Link</p>
<ul>
<?php
    $links = ["link 1","link 2","link 3"];
    foreach($links as $link){?>
        
    <li><a href="#"><?php echo $link ?></a></li>
        
<?php } ?>
</ul>   

<p><button><a href="schedule">Schedule</a></button></p>

<p>Reviews</p>

<script type="text/javascript">
    $('.edit_box').css("display", "none");    
    $("#save_btn").css("display", "none");
    $('#industry_lbl').attr("readonly", "true");
    
    $("#industry_lbl").change(function(){
        //$("#industry_lbl").value();
    });


    function print(){
        alert($('#founding_date_lbl').val());
    }

    function edit_profile(){

        $('#name_edt').val($('#name_lbl').html());
        $('#email_edt').val($('#email_lbl').html());
        $('#contact_edt').val($('#contact_lbl').html());
        $('#address_edt').val($('#address_lbl').html());
        $('#industry_edt').val($('#industry_lbl').html());
        $('#owner_edt').val($('#owner_lbl').html());
            
        var f_date = $("#founding_date_lbl").html();
        f_date = f_date.toString();
        $("#founding_date_edt").val(f_date);
    }

    $('#edit_btn').click(function(){
        if ($('.edit_box').css("display") == "none"){

            // EDIT MODE
            // REMOVE INFOS, DISPLAY TEXT BOX
            $('.edit_box').css("display", "");
            $('.u_inf').css("display", "none");
            $("#save_btn").css("display", "");
            $("#edit_btn").html("Cancel");
            
            edit_profile();
        }else {

            // REMOVE TEXTBOX, DISPLAY INFO
            $('.edit_box').css("display", "none");
            $('.u_inf').css("display", "");
            $("#save_btn").css("display", "none");
            $("#edit_btn").html("Edit info");
        }
    })

    function edit_user(){
        $.post("<?=base_url('Profile/edit_user')?>",
        {
            name: $('#name_lbl').html(),
            email: $('#email_lbl').html(),
            contact: $('#contact_lbl').html(),
            address: $('#address_lbl').html(),
            industry: $('#industry_lbl').html(),
            owner: $('#owner_lbl').html(),
            founding_date: $('#founding_date_lbl').html()
        },        
        function(data){
            
            
            
            window.location.reload();
        });
    }

</script>