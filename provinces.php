<?php
    require_once("database.php");
    require_once("class.php");
    $conn=get_connection();
    $getAllProvices=new Provices($conn);
    $rows=$getAllProvices->getAllProvices();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table, tr, td{border: 1px solid black}
</style>
<body>
    <table>
    <form method="post">
        <?php foreach($rows as $row) { ?>
            <tr>
                <td><a href=""></a><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'];?></a>
                <td><a href="provicesDelete.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                <td><a href="proviceEdit.php?id=<?php echo $row['id'] ?>">Edit</a></td>
            <tr>
    <?php } ?>
    </table>
    
    </form>

        <a href="add-provices.php">Add</a>
    <a href="provicesform.php">Log Out</a>
</body>
</html>