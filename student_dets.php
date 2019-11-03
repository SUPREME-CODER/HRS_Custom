<!DOCTYPE html>
<html>
<head>
    <title>Manager Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/user_page.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Acme|Berkshire+Swash|Lobster|PT+Sans+Narrow|Patua+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Black+Ops+One" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/cards.css ">
    <link rel="stylesheet" href="css/w3schools.css ">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

<div class=container>
<h3 style="margin-left: 94px;font-family:'Acme';"><strong>Registered Students</strong></h3>
<?php
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "hrs";
    $conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

    $manager_email = $_SESSION['manager_email'];
    $query = "SELECT * FROM hostel WHERE man_email='$manager_email'";
    $hostel_dets = mysqli_query($conn,$query);
    while ($hostel_det = mysqli_fetch_assoc($hostel_dets))
    {
      $urn=$urn_str['reg_no'];
      break;
    }
    $query = "SELECT * FROM student_regd WHERE reg_no='$urn'";
    $reg_stu = mysqli_query($conn,$query);
    $i=0;
    if(mysqli_num_rows($reg_stu) > 0)
    {
    while($student = mysqli_fetch_assoc($reg_stu))
    {
        $mail = $student['email'];
        $query = "SELECT * FROM users WHERE e_mail='$mail'";
        $users = mysqli_query($conn,$query);
        $user = mysqli_fetch_assoc($users);
        $image_url="uploads/".$student["file_name"];
?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-3">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="<?php echo $image_url;?>" alt="Student" style="width:300px;height:300px;">
            </div>
            <div class="flip-card-back">
              <h3><strong><?php echo $user['name']; ?></strong></h3> 
              <p></p>
              <p><strong>Institute</strong> - <?php echo $student['institute']?></p>
              <p><strong>Course</strong> - <?php echo $student['course']?></p>
              <p><strong>Degree</strong> - <?php echo $student['degree']?></p>
              <p><strong>Year of Study</strong> - <?php echo $student['year']?></p>
              <p><strong>Check-in Date</strong> - <?php echo $student['check_in']?></p>
              <p><strong>Check-out Date</strong> - <?php echo $student['check_out']?></p>
            </div>
          </div>
        </div>
        <input type="checkbox" name="vehicle2" style="margin-left:145px;margin-top:10px;width:20px; height:20px;"><br>
    </div>
<?php
        $i = $i + 1;
        if ($i == 3)
        {
            $i=0;
            echo '<br><br><br>';
        }
    }
}
else
{
    echo '<h1>No students have yet reserved a room in your hostel!</h1>';
}
?>

</div>
</body>
</html>