<?php
    require_once("database.php");
    require_once("class.php");

    
    $err="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $district_name = $_POST["dname"] ?? '';
        $provices_id= intval($_POST["sl_provices"]);
        $conn=get_connection();
        $district=new District($conn,$district_name,$provices_id);
        $result=$district->saveDistrict($district_name,$provices_id);

         
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
    <div>District Name:</div>
    <div><input type="text" name="dname"></div>
    <div>Provices_id:</div>
    <div>
    <div>
        <select name="sl_provices" id="sl_provices">
            <option value="1">Ha Noi</option>
            <option value="2">Thanh Pho Ho Chi Minh</option>
        </select>
    </div>
    </div>
    <div><input type="submit" value="Save"></div>
    <div><a href="district.php">Back</a></div>
    <span><?php echo $err; ?></span>
    </form>
</body>
</html>