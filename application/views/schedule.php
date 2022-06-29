<body>
<p>
    Schedule
</p>

<img src="#" alt="Service Image"><br><br><br>
<p><?php echo $key_service['name'];?></p>
<p><?php echo $key_service['price'];?></p>
<p><?php echo $key_service["duration"];?> mins</p>
<p><?php echo $key_company['company_name']; ?></p>
<br>
<div id="sched">
<center>
    <button class="calendar_control" id="prev_month">prev</button>
    <button class="calendar_control" id="next_month">next</button>
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

<script>
    $(document).ready(function(){
        $('#calendar').css("width", "25%");
        $('#calendar').css("margin", "auto");

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
    });

    

    //===================== AJAX ===========================

    //================== on change =========================
             
</script>