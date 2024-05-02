<?php
    include('../config/_dbconnect.php'); ?>
<?php
 if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $surname = mysqli_real_escape_string($conn, $_POST['surname']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $citizenship_number = mysqli_real_escape_string($conn, $_POST['citizenship-number']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);



            // checking multiple vote by same user 
        $check_data = "SELECT citizenship FROM voters_data WHERE citizenship = '$citizenship_number'";
        $data_check_result = mysqli_query($conn, $check_data) or die("Query Failed.");

        if (mysqli_num_rows($data_check_result)>0) {
            $_SESSION['alert'] = "Already registered!";
            header('location:add-voter.php');
            ob_end_flush();
            die();

        }else{

            $sql_query = "INSERT INTO voters_data SET name='$name', surname='$surname', address='$address', citizenship='$citizenship_number', dob='$dob'";
            $query = mysqli_query($conn, $sql_query);

            if($query){
                $_SESSION['alert_success'] = "your data Successfully added !";
                header('location:voters-list.php');
                die();
                    
            }else{
                echo"error found";
                $_SESSION['alert'] = "Failed to insert your data";
                    header('location:add-voter.php');
                    ob_end_flush();
                    die();
            }
        }
}
else{
    echo "error found";
}

?>

