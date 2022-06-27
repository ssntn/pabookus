
<?php 
    if($this->session->userdata('UserLoginSession'))
        $udata = $this->session->userdata('UserLoginSession');
?>

<div class="flexbox-main-container">

    <div class="flexbox-container">
        <div class="flexbox-item flexbox-item-1" id="dp">
            <img src="<?php echo base_url(); ?>public/img/profile/ayaka_heh.jpg" alt="Profile Picture" style="border: 3px solid black; height: 200px; width: 200px; border-radius: 10000px;">
            <button>Change profile picture</button>
        </div>

        <div class="flexbox-item flexbox-item-2">
            <div id="service_section">
            	<div id="service_view">
            		<p class="service_title">SERVICES:</p><br>
                    
            		<?php 
                        foreach($key_service as $s){?>
                        <div class="service_group" id="service_<?php echo $s['id']; ?>">
                            <p class="service_label">Name:</p>
                            <p class="service_label_data" id="<?php echo $s['id']; ?>_n_lbl"><?php 
                                        echo $s['name'] ?></p>
                            <br>
                            <p class="service_label">Price:</p>
                            <p class="service_label_data" id="<?php echo $s['id']; ?>_p_lbl"><?php
                                        echo $s['price'] ?></p>
                        </div>

            		<?php if($udata['id'] == $key_details["company_id"]){ ?>
                        <div class="service_edt" id="service_<?php echo $s['id']; ?>_edt">

                            <label class="service_label" for="<?php echo $s['id']; ?>_n_edt">Name:</label>
                            <input class="service_label_data" type="text" name="<?php echo $s['id']; ?>_n_edt" id="<?php echo $s['id']; ?>_n_edt"
                                placeholder="Service Name"><br>

                            <label class="service_label" for="<?php echo $s['id']; ?>_p_edt">Price:</label>
                            <input class="service_label_data" type="number" name="<?php echo $s['id']; ?>_p_edt" id="<?php echo $s['id']; ?>_p_edt"
                                placeholder="Service Price">
                        </div>

            		<button class="so_btn" id="so_<?php echo $s['id']; ?>">. . .</button>

            		<div class="service_menu" id="so_<?php echo $s['id']; ?>_menu">

            			<button class="so_edit" id="so_<?php echo $s['id']; ?>_edit">
            				Edit
            			</button>
            			<button class="so_save" id="so_<?php echo $s['id']; ?>_save">
            				Save
            			</button>
            			<button class="so_delete" id="so_<?php echo $s['id']; ?>_delete">
            				Delete
            			</button>

            		</div>
            		<br><br>
            		<?php } ?>
            		<?php } ?>
            	</div>

            	<?php if(isset($udata)){
                    if($udata['id'] == $key_details['company_id']){?>
            	<div id="service_items">
            		<label class="service_label" for="service_name">Name:</label>
            		<input class="service_item" type="text" name="service_name" id="s_name_edt"
            			placeholder="Service Name" required>

            		<br>
            		<label class="service_label" for="service_price">Price:</label>
            		<input class="service_item" type="number" name="service_price" id="s_price_edt" min='1'
            			placeholder="Price">
            	</div>

                <br>
            	<button id="service_btn">Add service</button>
            	<button id="new_service">Save service</button>
            	<?php }} ?>

            </div>
            

            <br>
            <p>Links:</p>
            <ul>
            <?php

                $links = ["link 1","link 2","link 3"];
                foreach($links as $link){?>
                    
                <li><a href="#"><?php echo $link ?></a></li>
                    
            <?php } ?>
            </ul>   

            <p><button><a href="schedule">Schedule</a></button></p>

            <p>Reviews</p>
        </div>
    </div>

    <div class="flexbox-item flexbox-item-3">
        <?php if(isset($udata)){
        if($udata['id'] == $key_details['company_id'] ){?>
            <button id="edit_btn">Edit info</button>
            <button id="save_btn">Save</button>
        <?php }} ?>
        <br><br><br><br>

        <p class="inf_title">Name:</p>
        <p  class="u_inf" id="name_lbl"><?php 
            echo isset($key_details['company_name'])
                ? $key_details['company_name']
                : "company_".$key_details['company_id'];
        ?>
        </p>
        <input class="edit_box" type="text" name="name_edt" id="name_edt">
        <br>


        <p class="inf_title">Email:</p>
        <p class="u_inf" id="email_lbl"><?php echo $key_details['email']; ?></p>
        <input class="edit_box" type="text" name="email_edt" id="email_edt">
        <br>


        <p class="inf_title">Contact numbers:</p>
        <p class="u_inf" id="contact_lbl"><?php
            echo isset($key_details['contact'])
                ? $key_details['contact']
                : "Not set"
        ?>
        </p>
        <input class="edit_box" type="text" name="contact_edt" id="contact_edt">
        <br>


        <p class="inf_title">Address:</p>
        <p class="u_inf" id="address_lbl"><?php
            echo isset($key_details['address'])
                ? $key_details['address']
                : "Not set"
        ?>
        </p>
        <input class="edit_box" type="text" name="address_edt" id="address_edt">
        <br>


        <p class="inf_title">Industry:</p>
        <p class="u_inf" id="industry_lbl"><?php 
            echo isset($key_details['industry'])
                ? $key_industry_default[$key_details['industry']]['name']
                : "Not set"
        ?>
        </p>
        <select class="edit_box" name="industry_list" id="industry_edt">
        <option value="null">Select</option>
        <?php
            foreach($key_industry as $i){?>
                
            <option value="<?php echo $i['id'] ?>"><?php echo $i['name'] ?></option>
                
        <?php } ?>
        </select>
        <br>


        <p class="inf_title">Owner:</p>
        <p class="u_inf" id="owner_lbl">
        <?php echo isset($key_details['owner'])
            ? $key_details['owner']
            : "Not set"
        ?>
        </p>
        <input class="edit_box" type="text" name="owner_edt" id="owner_edt">
        <br>

                
        <p class="inf_title">Founding Date:</p>

        <p class="u_inf" id="founding_date_lbl"><?php 
            echo isset($key_details['founding_date'])
                ? $key_details['founding_date']
                : "Not set"
        ?>
        </p>
        <input class="edit_box" type="date" name="founding_date_edt" id="founding_date_edt">
    </div>

</div>




<script type="text/javascript">
    
    $(document).ready(function(){
        hide($('.edit_box'));
        hide($(".service_menu"));
        hide($('.so_save'));
        hide($('.service_edt'));
        hide($("#save_btn"));
        hide($("#service_items"));
        hide($("#new_service"));
    });

    function hide(sel){ sel.css("display", "none"); }
    function show(sel){ sel.css("display", "");}

    function edit_profile(){
        $('#name_edt').val($('#name_lbl').html());
        $('#email_edt').val($('#email_lbl').html());
        $('#contact_edt').val($('#contact_lbl').html());
        $('#address_edt').val($('#address_lbl').html());
        $('#industry_edt').val(<?php echo $key_details['industry'] ?>);
        $('#owner_edt').val($('#owner_lbl').html());

        var bd = '<?php echo $key_details['founding_date'] ?>';
        if(bd == "" ) $("#founding_date_edt").val(bd);
        else $("#founding_date_edt").val($('#founding_date_lbl').html());
    }
    
    function service_switch(){        
        if ($("#service_items").css("display") == "none"){
            show($("#service_items"));
            show($("#new_service"));
            $("#service_btn").html("Cancel");
        }else{
            hide($("#service_items"));
            hide($("#new_service"));
            $("#service_btn").html("Add service");
        }
    }

    function so_switch(id){
        if ($('#'+id+"_menu").css("display") == "none"){
            show($('#'+id+"_menu"));
            $("#"+id).html("&#x274c;");
        }else {
            hide($('#'+id+"_menu"));
            $("#"+id).html(". . .");

            if($("#"+id+"_edit").html() == "Cancel")
                so_edit_switch(id+"_edit");
            
        }
    }

    function so_edit_switch(id){
        s_id = id.replace("edit", "save");
        d_id = id.replace("edit", "delete");
        c_id = id.replace("so_","").replace("_edit", "");

        if($("#"+s_id).css("display")=="none"){
            $("#"+id).html("Cancel");
            show($('#'+s_id));
            hide($('#'+d_id));

            show($("#service_"+c_id+"_edt"));
            hide($("#service_"+c_id));
            $("#"+c_id+"_n_edt").val($("#"+c_id+"_n_lbl").html());
            $("#"+c_id+"_p_edt").val($("#"+c_id+"_p_lbl").html());
        }else {
            $("#"+id).html("Edit");
            hide($('#'+s_id));
            show($('#'+d_id));

            hide($("#service_"+c_id+"_edt"));
            show($("#service_"+c_id));
        }
    }

    function checkValue(theVar){
        return (theVar == "Not set") ?null :theVar;
    }

    function so_save(id){
        c_id = id.replace("so_","").replace("_save", "");
        name = $("#"+c_id+"_n_edt").val();
        price = $("#"+c_id+"_p_edt").val();
        edit_service(c_id, name, price);
    }

    function so_delete(id){        
        c_id = id.replace("so_","").replace("_delete", "");
        delete_service(c_id);
    }

    //===================== AJAX ===========================
    function edit_user(){
        
        $.post("<?=base_url('Profile/edit_company')?>",{

            id: <?php echo $key_details['company_id']; ?>,
            name: checkValue($('#name_edt').val()),
            email: checkValue($('#email_edt').val()),
            contact: checkValue($('#contact_edt').val()),
            address: checkValue($('#address_edt').val()),
            industry: checkValue($('#industry_edt').val()),
            owner: checkValue($('#owner_edt').val()),
            founding_date: checkValue($('#founding_date_edt').val())
        }, function(data){
            location.reload();
        });
    }

    function add_service(name, price){
        
        $.post("<?=base_url('Service/add_service')?>",{
            user_id: <?php echo $key_details['company_id']; ?>,
            name: name,
            price: price 
        }, function(data){
            var tr = $("#service_table").append("<tr></tr>");
            $(tr).append("<td>"+name+"</td>");
            $(tr).append("<td>"+price+"</td>");
            location.reload();
        });
    }

    function edit_service(id, name, price){
        $.post("<?=base_url('Service/edit_service')?>",{
            user_id: <?php echo $key_details['company_id']; ?>,
            service_id: id,
            name: name,
            price: price
        }, function(data){
            location.reload();
        });
    }

    function delete_service(id){
        $.post("<?=base_url('Service/delete_service')?>",{
            table: "<?php echo $key_details['services_id']; ?>",
            id: id,
        }, function(data){
            if(data)
                location.reload();
            else 
                alert("delete failed");
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

    $('#service_btn').click(function(){
        service_switch();
    });

    $("#new_service").click(function(){
        var name = $("#s_name_edt").val();
        var price = $("#s_price_edt").val();

        add_service(name, price);

        $("#s_name_edt").val("");
        $("#s_price_edt").val("");
        service_switch();
    });

    $("#save_btn").click(function(){
        edit_user();
    });

    $(".so_btn").click(function(){
        so_switch(this.id);
    });

    $(".so_edit").click(function(){
        so_edit_switch(this.id);
    });

    $(".so_save").click(function(){
        so_save(this.id);
    });

    $(".so_delete").click(function(){
        so_delete(this.id);
    });
    

</script>