
<?php

function printtable($sql)
{
$servername = "localhost";
$username = "root";
$password = "";
$count = 1;
$conn = new PDO("mysql:host=$servername;dbname=phpsamples", $username, $password);


    $sql = "select * from posts";
    $res = $conn -> query($sql);
    $tab = $res -> fetchall(PDO::FETCH_ASSOC);
    // print_r($tab);

        foreach ($tab as $value => $field)
        {
        $id = $field['id'];
        $title ="<td>".$field['post_title']."</td>";
        $description = "<td>".$field['description']."</td>";
        $postdate = "<td>".$field['post_at']."</td>";
        $action = "<td><a href= 'edit.php?{$id}'> <img src='crud-icon/edit.png'></a>
        <a href='delete.php?{$id}'> <img src='crud-icon/delete.png'></a>
        </td>";
        $row ="<tr>".$title.$description.$postdate.$action."</tr>";
        echo $row; 
        }
}

?>
<!DOCTYPE html>
<html>
<body>
    <style>
div.mg1 {
  margin-left: 70em;
}
</style>
<div class="mg1"><a href="add.php"><button type="button">Create</button></a></div>
<h2>Basic HTML Table</h2>

<table border style="width:100%">
  <tr>
    <th>Title</th>
    <th>Description</th> 
    <th>Date</th>
    <th>Actions</th>
  </tr>
<?= printtable("select * from posts")?>
       
</table>

</body>
</html>