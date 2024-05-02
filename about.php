<?php include("./_dbconnect.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Website</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<!-- this is a navbar part  -->
    <div class="nav-container">
        <nav class="navbar">
            <div class="logo">
                <img src="./logo.png" alt="logo" height="80px">
                <!-- <a href="#">Your Logo</a> -->
            </div>
            <ul class="nav-links">
                <li><a href="./index.php">Home</a></li>
                <li><a href="./about.php">About</a></li>
                <li><a href="./Contact.php">Contact</a></li>
            </ul>
        </nav>
    </div>
<!-- this is a navbar part  -->

<!-- this is a content of main content  -->

 
<!-- this is a content of main content  -->
<h2 id="voting" style="margin: 5vh 0;">You can vote any one of given policical party</h2>
<!-- this is all content for a party items  -->
    <?php
        $query = "SELECT *FROM party";
        $sql = mysqli_query($conn, $query);
        $i = 1;
       ?>
    <div class="card-container">

     <?php
        if ($sql == true) {
            $count = mysqli_num_rows($sql);
            if($count>0) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $id = $row['sno'];
                    $party_name = $row['party_name'];
                    $description = $row['description'];
                    $picture = $row['image'];
        ?>
        <div class="card">

            <!-- <img src="./images/p1.jpg" > -->

            <?php
                if ($picture != "") {
                    ?>
                    <img src="./backend/uploaded/picture/<?php echo $picture; ?>"     alt="Card Image" width="70px" height="auto">
                    <?php
                }else{
                    echo"<p style='color:red;'>Image is not added</p>";
                }
            ?>
            <div class="card-content">
                <h2 class="card-title"><?php echo $party_name; ?></h2>
                <p class="card-description"><?php echo substr($description,0, 120); ?></p>
                <a href="./details.php?id=<?php echo $id; ?>" class="card-button"> Vote</a>
            </div>
        </div>
        <?php
                }
            }else{
                echo"NO DATA INSERTED";
            }
        }
        ?> 
    </div>
<!-- this is all content for a party items  -->


    <?php include("./footer.php") ?>
</body>

</html>