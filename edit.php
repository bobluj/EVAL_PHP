<!DOCTYPE html>
<html>
<body>
<style>
div.mg1 {
  margin-left: 35em;
}
</style>
<div class="mg1"><a href="index.php"><button type="button">Back to List</button></a></div>
<h2>Editer un article </h2>

<form action="" method ="POST">
  <label for="fname">Title</label><br>
  <input type="text" id="title" name="title" value="" ><br>
  <label for="lname">Description</label><br>
  <input type="text" id="description" name="description" ><br><br>
  <label for="lname">Date</label><br>
  <input type="date" id="date" name="date" ><br><br>
  <input type="submit" value="Add">
</form> 

<p>Click the Add button to submit it the database.</p>

</body>
</html>

<?php 
print_r($_GET);
if (!empty($_POST)) {
  // Only process if form is submitted
  require 'db.php';

  $servername = "localhost";
  $username = "root";
  $password = "";
  
    $conn = new PDO("mysql:host=$servername;dbname=phpsamples", $username, $password);



  $title = $_POST['title'];
  $description = $_POST['description'];
  $date = $_POST['date'];

    if (!empty($date))
    {
        $stmt = $conn->prepare("SELECT  post_title, description, post_at FROM posts where id = ".$_GET[0]);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':date', $date);
    }
    else
    {
        $stmt = $conn->prepare("SELECT  post_title, description FROM posts where id = ".$_GET[0]);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
    }
   

  $stmt->execute();
  exit;

}


?>