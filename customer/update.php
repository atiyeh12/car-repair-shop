<?php
ini_set('display_errors', 1);
error_reporting(~0);
require_once ('../database/config.php');
$carId = intval($_GET['id']);

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $age= $_POST['age'];
    $phone= $_POST['phone'];
    $carId=$_POST['car_id'];
    $sql = "UPDATE customers SET name='$name', age='$age', phone='$phone',car_id='$carId' WHERE id=$carId";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('record updated successfully');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Error updating record');</script>";
        echo "Error updating record: " . mysqli_error($conn);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
   
<div class="container border p-4 mt-4">

<div class="row">
    <div class="col-md-12">
        <h3 class="p-4">update informatin</h3>
        <hr />
    </div>
</div>

     <?php   
     
      
      $sql = "SELECT * from customers where  id=".$carId;
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $age= $row['age'];
        $phone=$row['phone'];
        $carId=$row['car_id'];
        // $id=$row['id'];
      
      }
      ?>
         <form method="post">
            <div class="form-row">
            <input type="hidden" name="update" value = "true"/>
                <div class="form-group col-md-3">
                    <label>name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
                    
                </div>

                <div class="form-group col-md-3">
                    <label>age</label>
                    <input type="text" class="form-control" name="age" value="<?php echo $age ?>">
                    
                </div>
                <div class="form-group col-md-3">
                    <label>phone</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone ?>">
                    
                </div>

            </div>   
            <input type="submit" class="btn btn-warning" value="edit" name="update">
            <?php
               
               echo "<select name='car_id'>";
               $sql2 = "SELECT * FROM cars" ;
                           $result2 = $conn->query($sql2);
                           while($row2 = $result2->fetch_assoc()) {
                               $selected = '';
                               if ($row2['id'] == $carId) {
                                   $selected = 'selected';
                               }
                               echo "<option value='" . $row2['id'] . "' $selected>" . $row2['name'] . "</option>";
                           }
                       echo "</select>";
               ?>
               
            
        </form>
       
</div>
</body>
</html>

