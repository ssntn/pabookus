<body>
<p>
    Schedule
</p>

<img src="#" alt="Service Image"><br><br><br>
<p><?php  
    echo isset($key_service['name'])
        ?$key_service['name']
        :"error";
?></p><br>
<p> &#8369 <?php 
    echo isset($key_service['price'])
        ?$key_service['price']
        :"error";
?></p><br>
<p><?php 
    echo isset($key_service["duration"])
        ?$key_service['duration']
        :"error";
?> mins</p><br>
<p><?php 
    echo isset($key_company['company_name'])
        ?$key_company['company_name']
        :"error"; 
?></p><br>


<div id="sched">
<center>
    <div id="calendar"><?php 
        if(isset($calendar)) echo $calendar;
        else {?>
            <div>
                <p>Error loading calendar</p>
            </div>
        <?php } ?>
    </div>
</center>
</div>
    <!-- Trigger the modal with a button -->
    <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php
                    echo isset($key_service['name'])
                        ?$key_service['name']
                        :"error";
                ?>: Current Bookings</h4>
            </div>
            <div class="modal-body">
                <p id="slot_count">0</p><br>
                <button id="book_btn">Book now!</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        // $('#calendar').css("width", "25%");
        // $('#calendar').css("margin", "auto");

        function calendar_update(data){
            $("#calendar").remove();
            var calendar = $("<div></div>");

            if(data){
                calendar.attr("id", "calendar");
                calendar.append(data);
            }else {
                calendar.attr("id", "calendar-error");
                error.append("Error collecting data");
            }
            
            $("#sched").append(calendar);

        }

        $(".calendar_table td").each(function(){
            if($(this).html()!="&nbsp;"){
                $(this).attr("id", $(this).html());
                $(this).attr("data-toggle", "modal");
                $(this).attr("data-target", "#myModal");
            }
        });
    });

    

    //===================== AJAX ===========================
    function get_service_info(day){
        $.post("<?=base_url('Calendar/get_bookings')?>",{
            company_id : "<?php echo $key_company['company_id']; ?>",
            service_id : "<?php echo $key_service["id"]; ?>",
            day : day,
            month : "<?php echo $month; ?>",
            year : "<?php echo $year; ?>"
        }, function(data){
            if(data){ 
                $("#slot_count").html("Booked: "+data+"/<?php echo $key_service['slot'];?>");
            }
        });
    }

    //================== on change =========================
    $(".calendar_table td").click(function(){
        theDay = $(this).attr("id")
        get_service_info(theDay);
    })
</script>