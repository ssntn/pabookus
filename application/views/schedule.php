
<body>
<p>
    Schedule
</p>

<img src="#" alt="Service Image"><br><br><br>
<p><?php echo $key_service['name'];?></p>
<p><?php echo $key_service['price'];?></p>
<p><?php echo $key_company['company_name']; ?></p>
<div id="calendar_div">

</div>

<script>
    
    $.post("<?=base_url('Calendar/get_calendar')?>",{}, function(data){
        
        $("#calendar_div").append("<div>"+data+"</div");
    });
</script>