<body>
<p>
    Schedule
</p>

<img src="#" alt="Service Image"><br><br><br>
<p><?php echo $key_service['name'];?></p>
<p><?php echo $key_service['price'];?></p>
<p><?php echo $key_service["duration"];?> mins</p>
<p><?php echo $key_company['company_name']; ?></p>


<div id="calendar"></div>

<script>
    $(document).ready(function(){
        $('#calendar').css("width", "25%");
        $('#calendar').css("margin", "auto");

        $.post("<?=base_url('Calendar/get_calendar')?>",{
            company_id: <?php echo $key_company['company_id']; ?>,
            service_id: <?php echo $key_service['id']; ?>
        }, function(data){
            $("#calendar").append(data);
        });

    });
             
</script>