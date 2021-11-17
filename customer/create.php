<?php
ini_set('display_errors', 1);
error_reporting(~0);
require_once ('../database/config.php');
?>
   

    <?php
            if (isset($_POST['insert'])) {
    
                $stmt = $conn->prepare("INSERT INTO customers (name,family,age,phone,car_id) VALUES (?, ?, ?, ?, ?)");
    
                $stmt->bind_param("sssss", $name,$family, $age, $phone,$carId);
                $name = $_POST['name'];
                $family = $_POST['family'];
                $age= $_POST['age'];
                $phone= $_POST['phone'];
                $carId = $_POST['cars'];
            

                $stmt->execute();
    
                $lastInsertId = $conn->insert_id;
    
                if ($lastInsertId) {
                    echo "<script>alert('record insert successfully');</script>";
                    echo "<script>window.location.href='index.php'</script>";
                } else {
                    echo "<script>alert('Error');</script>";
                    echo "<script>window.location.href='index.php'</script>";
                }
            }
    
    
                ?>
                    
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <title>create a car</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        </head>
        <body>

        <div class="container">
            <h2>create customer</h2>
                <form method="post">
                    <input type="hidden" name="insert" value = "true"/>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="  name of customer">
                        </div>
                        <div class="form-group">
                        <label class="control-label col-sm-2" for="family">family:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="family" placeholder=" family">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="age">age:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="age" placeholder=" age">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="phone">phone:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" placeholder=" phone"> 

                        </div>        
                    </div>
        

            
       
                    <?php
                    echo "<select name='cars'>";
                    $sql2 = "SELECT * FROM cars" ;
                                $result2 = $conn->query($sql2);
                                while($row2 = $result2->fetch_assoc()) {
                                    echo "<option value='" . $row2['id'] . "'>" . $row2['name'] . "</option>";
                                }
                            echo "</select>";
                    ?>
                    
                    <br><br>
                    <input type="submit" value="Submit">
                </form>
   
        </div>

</body>
</html>