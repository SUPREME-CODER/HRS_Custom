<!DOCTYPE html>
<html>
<head>
    <title>Manager Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/user_page.css">

    <link href="https://fonts.googleapis.com/css?family=Acme|Berkshire+Swash|Lobster|PT+Sans+Narrow|Patua+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Black+Ops+One" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/cards.css ">
    <link rel="stylesheet" href="css/w3schools.css ">
    <link rel="stylesheet" href="css/w3schools2.css ">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<div class=container>
<h3 style="margin-left:15px;font-family:'Acme';"><strong>Hostel Details</strong></h3>

<?php
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "hrs";
    $conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);
    $manager_email = $_SESSION['manager_email'];
    $query = "SELECT * FROM hostel WHERE man_email='$manager_email'";
    $hostels = mysqli_query($conn,$query);
    if(mysqli_num_rows($hostels) > 0)
    {
        $row = mysqli_fetch_assoc($hostels);

?>

<div class="container">
    <p >
        <h5 style="font-family: 'Acme', sans-serif; font-size:22px; margin-bottom:15px;"><?php echo $row['facilities'];?></h5>
        <br>
        <div class="row" style="font-size:18px">
        <?php
            
            if($row['mess'] == 1)
            {
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-group'></i>&nbsp;Mess</strong>";
                echo'</div>';
            }
            
            
            if($row['wifi'] == 1)
            {
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-wifi'></i>&nbsp;Free Wifi</strong>";
                echo'</div>';
            }
            
            
            if($row['gym'] == 1)
            {
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-hand-rock-o'></i>&nbsp;Gym</strong>";
                echo'</div>';
            }
            
            
            if($row['bank'] == 1)
            {
                echo"<div class='col-md-3'>";
                echo"<strong style='color:green;'><i class='fa fa-bank'></i>&nbsp;Bank Facility</strong>";
                echo'</div>';
            }
            
            
            if($row['medical'] == 1)
            {
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-medkit'></i>&nbsp;Medical Facility</strong>";
                echo'</div>';
            }
            
            echo'</div>';
            echo "<br>";
            echo'<div class="row" style="font-size:18px">';
            
            if($row['telephone'] == 1)
            {
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-mobile'></i>&nbsp;Telephone</strong>";
                echo'</div>';
            }
            
            
            if($row['amphi'] == 1)
            {
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-square'></i>&nbsp;Amphitheatre</strong>";
                echo'</div>';
            }
            
            
            if($row['transport'] == 1)
            {
                echo"<div class='col-md-3'>";
                echo"<strong style='color:green;'><i class='fa fa-cab'></i>&nbsp;Transportation</strong>";
                echo'</div>';
            }
            
            
            if($row['laundry'] == 1)
            {
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-circle'></i>&nbsp;Laundry</strong>";
                echo'</div>';
            }
            
            
            if($row['study'] == 1)
            {
                echo"<div class='col-md-2'>";
                echo"<strong style='color:green;'><i class='fa fa-book'></i>&nbsp;Study Room</strong>";
                echo'</div>';
            }
        ?>
        </div>
    </p>
</div>
<br>
<div class="container">
    <table style="font-family: 'Acme', sans-serif; font-size:20px;">
        <tr>
            <td>FLOORS</td>
            <td style="padding-left: 100px;"><?php echo$row['floors']?></td>
        </tr>
        <tr>
            <td>AVAILABLE ROOMS</td>
            <td style="padding-left: 100px;"><strong><?php echo $row['no_of_rooms']?></strong></td>
        </tr>
        <tr>
            <td>CAPACITY</td>
            <td style="padding-left: 100px;"><?php echo $row['floors']?></td>
        </tr>
        <tr>
            <td>FEES PER YEAR</td>
            <td style="padding-left: 100px;"><?php echo$row['fees']?></td>
        </tr>
    </table>
<?php
}
?>
<br><br>
<a href="hostel_update.php"><button class='btn btn-primary' style="font-family: 'Acme'">Update</button></a>
<br><br>
</div>
</body>
</html>