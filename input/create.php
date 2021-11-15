<?php
ini_set('display_errors', 1);
error_reporting(~0);
require_once ('../database/config.php');
?>
   

    <?php
            if (isset($_POST['insert'])) {
    
                $stmt = $conn->prepare("INSERT INTO customers (customer_id,prise,description) VALUES (?, ?, ?)");
    
                $stmt->bind_param("sss", $customerId, $prise, $description);
                $description= $_POST['description'];
                $prise= $_POST['prise'];
                $customerId = $_POST['customerId'];
            

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
            <h2>create input</h2>
                <form method="post">
                    <input type="hidden" name="insert" value = "true"/>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="customerId">customer_id:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="customerId" placeholder="  customerId">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="prise">prise:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="prise" placeholder=" show prise">
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