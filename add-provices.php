<?php
    require_once("database.php");
    require_once("class.php");
    $conn=get_connection();
    $name=$_POST['Pname'] ?? '';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $SaveProvices=new Provices($conn, $name);
        $SaveProvices->saveProvices($conn, $name);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>

    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <h2>Save provice</h2>
            <div class="row">
                <div>Name: </div>
                <div><input type="text" name="Pname" id="Pname"></div>
            </div>
            <p><div class="fsubmit"><input type="submit" value="Save"></div></p>
        </form>
    <a href="provinces.php">Back</a>
</body>
</html>