
<?php 
    if($this->session->userdata('UserLoginSession'))
        $udata = $this->session->userdata('UserLoginSession'); 
?>
<!-- THIS IS PROFILE PICTURE -->
<div id="" style="width:200px;height:200px;background-color:red">
    <img src="#" alt="Profile Picture">
</div>

<button id="edit_btn">Edit info</button>
<button id="save_btn">Save</button>

<p class="inf_title">Name:</p>
<p class="u_inf" id="name_lbl"><?php 
    echo isset($key_details['fullname'])
        ? $key_details['fullname']
        : "user_".$key_details['client_id'];
    ?>
</p>
<input class="edit_box" type="text" name="name_edt" id="name_edt">

<p class="inf_title">Email:</p>
<p class="u_inf" id="email_lbl"><?php echo $key_details['email']; ?></p>
<input class="edit_box" type="text" name="email_edt" id="email_edt">

<p class="inf_title">Contact numbers:</p>
<p class="u_inf" id="contact_lbl"><?php 
    echo isset($key_details['contact'])
        ? $key_details['contact']
        : "Not set"
    ?>
</p>
<input class="edit_box" type="text" name="contact_edt" id="contact_edt">

<p class="inf_title">Address</p>
<p class="u_inf" id="address_lbl"><?php 
    echo isset($key_details['contact'])
        ? $key_details['address']
        : "Not set"
    ?>
</p>
<input class="edit_box" type="text" name="address_edt" id="address_edt">

<p class="inf_title">Birthdate</p>
<p class="u_inf" id="birthdate_lbl"><?php 
    echo isset($key_details['birthdate'])
        ? $key_details['birthdate']
        : "Not set"
    ?>
</p>
<input class="edit_box" type="date" name="birthdate_edt" id="birthdate_edt">

<button onclick="sett()">set</button>
<button onclick="unsett()">unset</button>
<script type="text/javascript">
    function sett(){
        $("#birthdate_edt").val("2000-07-22");
    }

    function unsett(){
        $("#birthdate_edt").val(null);
    }

    $(document).ready(function(){
        $('.edit_box').css("display", "none");    
        $("#save_btn").css("display", "none");
    });

    function edit_profile(){

        $('#name_edt').val($('#name_lbl').html());
        $('#email_edt').val($('#email_lbl').html());
        $('#contact_edt').val($('#contact_lbl').html());
        $('#address_edt').val($('#address_lbl').html());

        var bd = '<?php echo $key_details['birthdate'] ?>';
        if(bd == "" ) $("#birthdate_edt").val(bd);
        else $("#birthdate_edt").val($('#birthdate_lbl').html());
    }

    //===================== AJAX ===========================
    function edit_user(){
        $.post("<?=base_url('Profile/edit_client')?>",{
            
            id: <?php echo $key_details['client_id']; ?>,
            name: $('#name_edt').val(),
            email: $('#email_edt').val(),
            contact: $('#contact_edt').val(),
            address: $('#address_edt').val(),
            birthdate: $('#birthdate_edt').val()
        }, function(data){
            console.log(data);
        });
    }

    //================= on change =======================
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
    });

    $("#save_btn").click(function(){
        edit_user();
    });
    

</script>