<?php 
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
?> 
<html>
    <Body style="background-repeat: no-repeat; background-size: cover; border-bottom-color: #000000; background-image: url('../img/slide1.jpg');">
        <h1>Reports</h1> 
        <div class="span4"> 
            <a href="farmer_monthly.php"><img src="../img/month.png"><br/> 
    Per Farmer Delivery</a>
        </div>         
        <div class="span4"> 
            <a href="all_farmers.php"><img src="../img/month.png"><br/> 
Total Farmers Delivery</a> 
        </div>         
    </Body>
</html>
<?php 
include  '../incl/footer.incl.php';
?>