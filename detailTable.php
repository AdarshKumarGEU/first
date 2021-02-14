<?php
include('config.php');
?>

<?php
    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($conn, $sql);

    if($result->num_rows > 0){
    ?>

    <table class="table table-striped">  
		<thead>
			<tr>
				<th class="table-success">ID</th>
				<th class="table-light">USERNAME</th>
				<th class="table-light">EMAIL</th>
				<th class="table-light">GENDER</th>
				<th class="table-light">CITY</th>
                <th class="table-light">EDIT</th>
                <th class="table-light">DELETE</th>
			</tr>
		</thead>
		<tbody>
			
            <?php
			while($row = $result->fetch_assoc()){?>
			<tr>
				<td class="table-success"><?php echo $row['id']?></td>
				<td class="table-success"><?php echo $row['username']?></td>
				<td class="table-success"><?php echo $row['email']?></td>
				<td class="table-success"><?php echo $row['gender']?></td>
				<td class="table-success"><?php echo $row['city']?></td>
                <td><a href="edit.php?id=<?php echo $row['id']?>">
                <input type="button" value="Edit"></a></td>
                <td><a href="delete.php?id=<?php   echo $row['id']  ?>">
				<input type="button" onclick="return del()" value="Delete" name="Delete" ></a></td>

            </tr>
           <?php } ?>
		</tbody>
	</table>
<?php    }
?>
<html>
    <head>
        <title>User Details</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
<body>

<script type="text/javascript">	
function del()
{
  if(confirm("Do you really want to delete this RECORD ? ")){
       return true ;
  }
  else{
    return false;
  }
}
</script>
</body>
</html>