<?php
ini_set('display_errors', 1);
error_reporting(~0);
require_once ('../database/config.php');
if(isset($_REQUEST['del'])){
    $input = intval($_GET['del']);
   
    $sql = "DELETE from input  WHERE id=$inputId";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('record deleted successfully');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Error deleted record');</script>";
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <style>

        
        </style>
    </head>
    <body>
       
        <?php
         $sql = "SELECT * FROM input";
         $result = $conn->query($sql);


         if ($result->num_rows > 0) {
			// output data of each row
            ?>
			<table style="width:100%" border="1">
                <tr>
                    <th>price</th>
                    <th>customerId</th>
                    <th>description</th>
                    <th>date</th>
                </tr>   

                <?php
                while($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row["price"]; ?>
                        </td>

                        <td>
                            <?php echo $row["customer_id"]; ?>
                        </td>
                      
                        <td>
                            <?php echo $row["description"]; ?>
                        </td>
                        <td>
                            <?php echo $row["created_at"]; ?>
                        </td>

                            <?php
                
                            $sqlCar= "SELECT name FROM customers WHERE id=".$row['customer_id'];
                            $resultCustomer = $conn->query($sqlCar);
                            while($rowCustomer = $resultCustomer->fetch_assoc()) {
                                    echo $rowCustomer["name"];
                            }
                            // echo "category_id: " . $row["category_id"]."<br>";
                            echo "<br><br>";
                            ?>
                            <td><a href="update.php?id=<?php echo $row ['id']; ?>">edit</a></td>
                            <td><a href="index.php?del=<?php echo  $row ['id']; ?>">delete</a></td>
                    </tr>
                    <?php
                }
	    	} else {
			echo "0 results";
		}
		$conn->close();
		?>
         <a href="create.php">Visit create.php</a>

        
 </body>
 </html>