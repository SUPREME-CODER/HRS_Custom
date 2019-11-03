<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "hrs";
$conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);
if(isset($_SESSION['manager_email']))
{
	$manager_email = $_SESSION['manager_email'];
	// echo $manager_email;
    $query = "SELECT * FROM hostel WHERE man_email='$manager_email'";
    $r_no = mysqli_query($conn,$query);
    while ($urn_str = mysqli_fetch_assoc($r_no))
    {
    	$urn=$urn_str['reg_no'];
    	break;
    }
    $query = "SELECT * FROM student_regd WHERE reg_no='$urn'";
    $reg_stu = mysqli_query($conn,$query);
    
    $query = "SELECT * FROM hostel WHERE man_email='$manager_email'";
    $hostels = mysqli_query($conn,$query);
}
?>