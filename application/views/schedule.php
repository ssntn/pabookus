<body>
<?php 
    if($this->session->userdata('UserLoginSession'))
        $udata = $this->session->userdata('UserLoginSession');
?>

<div class="schedule-main-container">


    <div class="schedule-container">
        <img class="schedule-service-img" src="<?php echo base_url(); ?>public/img/category/teaching.jpg" alt="Service Image"><br><br><br>
        <div class="schedule-details">
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
            <p><a href="<?php echo base_url()."profile/company/".$key_company["company_id"];?>"><?php 
                echo isset($key_company['company_name'])
                    ?$key_company['company_name']
                    :"error"; 
            ?></a></p><br>
        </div>
        
    </div>

    <div class="flexbox-container">
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
    </div>


</div>





<!-- Book Modal -->
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
            <p id="book_date">Error loading Date</p><br>
            <p id="slot_count">Error loading slots data</p><br>
            <button id="book_btn">Book now!</button>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){

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

        set_current_date_color();
    });

    function set_current_date_color(){

        var month = parseInt("<?php echo $month; ?>");
        var year = parseInt("<?php echo $year; ?>");

        // RETURN CURRENT DATE
        var d = new Date();
        var dt = d.getDate();
        var mo = d.getMonth() + 1;
        var yr = d.getFullYear();

        if (month ==  mo && year == yr){
            $("#" + dt).css("background-color","yellow");
        }

    }

    function set_book_date(str){
        $("#book_date").html(str);
    }

    function count_days(month, day, year){
        return (month+((month-1)*((month%2)?30:31)))+day+year*365;
    }

    function month_name(month_in_digit){
        const month_list = {
            1: "January",
            2: "February",
            3: "March",
            4: "April",
            5: "May",
            6: "June",
            7: "July",
            8: "August",
            9: "September",
            10: "October",
            11: "November",
            12: "December"
        }
        return month_list[month_in_digit];
    }

    //===================== AJAX ===========================
    function get_service_info(day){
        $.post("<?=base_url('Calendar/get_bookings')?>",{
            company_id: "<?php echo $key_company['company_id']; ?>",
            service_id: "<?php echo $key_service["id"]; ?>",
            day: day,
            month: "<?php echo $month; ?>",
            year: "<?php echo $year; ?>"
        }, function(data){
            if(data){ 
                total_slot = parseInt("<?php echo $key_service['slot'];?>");
                $("#slot_count").html("Booked: "+data+"/"+total_slot);

                if(data==total_slot)
                    $("#book_btn").prop("disabled", true); // if full disable button
                    
            }
        });
    }

    function book_service(day){
        $.post("<?=base_url('Calendar/add_booking')?>",{
            client_id:  "<?php echo $udata['id']; ?>",
            company_id: "<?php echo $key_company['company_id']; ?>",
            service_id: "<?php echo $key_service["id"]; ?>",
            day: day,
            month: "<?php echo $month; ?>",
            year:"<?php echo $year; ?>"
        }, function(data){
            if(data){ 
                alert("Mission failed successfully");
            }
        });
    }

    //================== on change =========================
    var theDay = 0;
    $(".calendar_table td").click(function(){

        // RETURNS CLICKED DATA
        theDay = parseInt($(this).attr("id"));
        var month = parseInt("<?php echo $month; ?>");
        var year = parseInt("<?php echo $year; ?>");

        // RETURN CURRENT DATE
        var d = new Date();
        var dt = d.getDate();
        var mo = d.getMonth() + 1;
        var yr = d.getFullYear();

        if(count_days(month, theDay, year) < count_days(mo, dt, yr)){
            set_book_date("You can't just get back from the past!");
            $("#book_btn").prop("disabled", true);
        }else {
            set_book_date(month_name(month)+" "+theDay+", "+year);
        }
        
        get_service_info(theDay);
    });
    
    $("#book_btn").click(function(){
        book_service(theDay);
    });
</script>