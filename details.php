<?php include("./_dbconnect.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal details</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="nav-container">
        <nav class="navbar">
            <div class="logo">
            <img src="./logo.png" alt="logo" height="80px">
            </div>
            <ul class="nav-links">
                <li><a href="./index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </div>
    <div class="form-container">
        <?php
             
             if (isset($_SESSION['alert'])) {       
                ?> <h4 class="text-danger">  <?php echo $_SESSION['alert'];?> </h4> <?php            
                unset($_SESSION['alert']);
              }  
             
             if (isset($_SESSION['alert_success'])) {
                ?> <h4 class="text-success">  <?php echo $_SESSION['alert_success'];  ?> </h4> <?php      
                unset($_SESSION['alert_success']);
              }  
             ?>
        <h2>Enter Citizenship number</h2>

        <?php
            if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT *FROM party WHERE sno=$id";
            $sql = mysqli_query($conn, $query);
            $count = mysqli_num_rows($sql);
            if ($count == 1) {
                $row = mysqli_fetch_assoc($sql);
                $party_id = $row['sno'];
                $party_name = $row['party_name'];

            }
        }
    
        ?>
        <form id="myForm" method="post" action="./add-voting.php" onsubmit="sendDetails(event)">
        
            <div class="form-group">
                <label for="citizenship-number">Citizenship Number:</label>
                <input type="number" id="citizenship-number" name="citizenship-number" required>
            </div>
            <input type="hidden" value="<?php echo $party_name; ?>" name="party_name" required>
             <input type="hidden" value="<?php echo $party_id; ?>" name="party_id" required>
            <button type="submit" name="submit">submit</button>
        
        </form>
    </div>
</body>
<script >
    function isAdult(dob) {

        const dobArray = dob.split("-");
        const birthYear = parseInt(dobArray[0]);
        const birthMonth = parseInt(dobArray[1]);
        const birthDay = parseInt(dobArray[2]);

        const today = new Date();
        const currentYear = today.getFullYear();
        const currentMonth = today.getMonth() + 1; 
        const currentDay = today.getDate();

        var age = currentYear - birthYear;
        if (currentMonth < birthMonth || (currentMonth === birthMonth && currentDay < birthDay)) {
            age--;
        }
        return age >= 18;
    }


    function sendDetails(event) {
        const date_of_birth = document.getElementById('dob').value;
        const alertmessage = document.getElementById('alertDob');

        const isUserAdult = isAdult(date_of_birth);
        if (isUserAdult) {
            alertmessage.style.display = "none";

            var userConfirmation = confirm("Are you sure? You have only one voting right..");

           
        } else {
            event.preventDefault();
            alertmessage.style.display = "block";
        }

        }
</script>
</html>