<?php
    require_once("database.php");
    require_once("class.php");

    $conn=get_connection();
    $id=intval($_GET['id']);
    $row=new District($conn,$id);
    $rows=$row->getDistrict($conn, $id);
    $err="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
            $district=new District($conn,$id);
            $district->deleteDistrict($conn,$id);  
    } 

    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<style>
    div{padding: 5px}
    span{color: red}
</style>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
    <div><h2>Add District</h2></div>
    <div>District Name: <?php echo $rows['name']?></div>
    <div>Provices_id: <?php echo $rows['provices_id']?></div>
    <div>
    </div>
    <div><input type="submit" value="confirm"></div>
    <div><a href="district.php">Back</a></div>
    <span><?php echo $err; ?></span>
    </form>
</body>
</html>