<?php
    include('../config/_dbconnect.php'); ?>
<?php 
    if (isset($_POST['submit'])) {
    $pName = mysqli_real_escape_string($conn, $_POST['p_name']);
    $pDescription = mysqli_real_escape_string($conn, $_POST['p_description']);

    // Images Uploading part

    $vaild_format = array('png', 'jpg', 'jpeg');

    //  Picture

    if ($_FILES['picture']['name']) {
        $pic_name = $_FILES['picture']['name'];
        $pic_size = $_FILES['picture']['size'];
        $pic_temp = $_FILES['picture']['tmp_name'];

        $pic_split = explode(".", $pic_name);
        $pic_ext_check = strtolower(end($pic_split));
        $pic_new_name = time().".".$pic_ext_check;

        if (in_array($pic_ext_check, $vaild_format)) {
            if ($pic_size / 1000 > 250) {
                $_SESSION['alert'] = "File size is greater than 2 MB";
                header('location:parties.php');
                die();
            
            }else{
                $pic_path = "../uploaded/picture/";
                move_uploaded_file($pic_temp, $pic_path.$pic_new_name);
            }
        }else{
            $_SESSION['alert'] = "Only png, jpg, jpej files are allowed !";
            header('location:parties.php');
            die();
        }                      
    }

    // Picture


        $sql = "INSERT INTO party SET party_name='$pName', description='$pDescription', image='$pic_new_name' ";

        $query = mysqli_query($conn, $sql);
        if ($query == true) {
        $_SESSION['alert_success'] = "your data Successfully added";
        header('location:parties-list.php');
        die();

        }else{
            $_SESSION['alert'] = "Failed to insert your data";
            header('location:parties.php');
            die();
        }
                                              
    }
?>