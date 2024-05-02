<?php include("./_dbconnect.php") ?>
<?php
 if (isset($_POST['submit'])) {
    $citizenship_number = mysqli_real_escape_string($conn, $_POST['citizenship-number']);
    $party_name = mysqli_real_escape_string($conn, $_POST['party_name']);
    $party_id = mysqli_real_escape_string($conn, $_POST['party_id']);

    // checking  voter
    $check_data = "SELECT sno, vote_count FROM voters_data WHERE citizenship = '$citizenship_number'";
    $data_check_result = mysqli_query($conn, $check_data) or die("Query Failed.");

    if (mysqli_num_rows($data_check_result) == 1) {
        $row = mysqli_fetch_assoc($data_check_result);
        $voter_id = $row['sno'];
        $voter_count = $row['vote_count'];
        if ($voter_count == 1) {
            $_SESSION['alert'] = "you have already voted";
                header('location:details.php');
                ob_end_flush();
                die();
        }else{

            // codes to getting total votes from table

        $sql_query = "UPDATE voters_data SET vote_count='1', party_name='$party_name', party_id='$party_id' WHERE sno='$voter_id'";
        $query = mysqli_query($conn, $sql_query);
  
        if($query){

            $query = "SELECT total_voting FROM party WHERE sno='$party_id'";
            $sql = mysqli_query($conn, $query);
            if (mysqli_num_rows($sql) > 0) {
                $row = mysqli_fetch_assoc($sql);
                $total_votes = $row['total_voting'];
                $newTotalVotes = $total_votes + 1;
            }

            $add_party_count = "UPDATE party SET total_voting='$newTotalVotes' WHERE sno='$party_id'";
            $party_count_query = mysqli_query($conn, $add_party_count);

            if ($party_count_query) {
                $_SESSION['alert_success'] = "your have voted !";
                header('location:details.php');
                die();
            }
        }else{
            echo"error found";
            $_SESSION['alert'] = "Failed to insert your data";
                header('location:details.php');
                ob_end_flush();
                die();
        }

        }

    }else{
        
        // codes to getting total votes from table
        $_SESSION['alert'] = "You are not registered!";
        header('location:details.php');
        ob_end_flush();
        die();
        
    }
    }else{
        echo "error found";
    }

?>