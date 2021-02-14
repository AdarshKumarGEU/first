<?php
include('config.php');
?>

<?php
$id=$_GET['id'];
$sql = "SELECT * FROM `users` WHERE `id`=$id";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
$username = $row['username'];
$email = $row['email'];
$gender = $row['gender'];
$city = $row['city'];
?>
<?php
if(isset($_POST['update'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];

    $sql = "UPDATE `users` SET username='$username', email='$email', gender='$gender', city='$city' WHERE id='$id'";
    if(mysqli_query($conn, $sql)){
        echo "Data updated successfully...";
        header("Location:detailTable.php");
    }
    else{
        echo "Updation failed..";
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Assignment 3</title>
</head>
<body>

    <h1> PLEASE FILL THIS FORM</h1>
    <form method="POST" action="edit.php?id=<?php   echo "$id";    ?>">
       
        USERNAME  <input type="text" name="username" value=<?php echo "$username" ?> placeholder="ENTER THE USERNAME" required><br><br>
        EMAIL  <input type="email" name="email" value=<?php echo "$email" ?> placeholder="ENTER THE EMAIL" required><br><br>
        <input type="radio" id="male" name="gender" value="male" <?php if($gender == "male"){echo "checked";}?> >
        <label for="male">Male</label><br><br>
        <input type="radio" id="female" name="gender" value="female" <?php if($gender == "female"){echo "checked";}?> >
        <label for="female">Female</label><br><br>
        <input type="radio" id="other" name="gender" value="other" required="required">
        <label for="other">Other</label><br><br>
        CITY  <select name = "city"> required>
                <option value = "Dehradun" <?php if($city == "Dehradun"){echo "selected";}?> >DEHRADUN</option>
                <option value = "Rishikesh" <?php if($city == "Rishikesh"){echo "selected";}?>>RISHIKESH</option>
                <option value = "Haridwar" <?php if($city == "Haridwar"){echo "selected";}?>>HARIDWAR</option>
              </select>
        <br><br>
        <input type="submit" name="update" value=" CLICK TO UPDATE">
    </form>
    
</body>
</html>
