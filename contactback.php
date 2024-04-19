<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['sms'];
   
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $database = "contact";
    # create a connection
    $con = mysqli_connect($servername,$username,$dbpassword,$database);
    
    # die if connection was unsuccessful
    if(!$con) {
        die("Sorry we failed to connect");
    }
    else{
        // echo "Connection Established<br><br>";
    }
    
    # create a table in the DB
    $sql = "INSERT INTO feedback values('$Name','$email','$message')";
    $result = mysqli_query($con,$sql);
    
    if($result) {
        echo '<div class="alert alert-success" role="alert">
        THANK YOU FOR YOUR FEEDBACK!
      </div>';
    }
    else {
        echo "Row not inserted in table succesfully because of this error ---> " . mysqli_error($con);
    }
}
?>