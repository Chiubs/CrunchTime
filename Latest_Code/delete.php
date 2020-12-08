
<?php

//delete.php

if(isset($_POST["id"]))
{
      $connect = new PDO('mysql:host=localhost;dbname=time_crunch_planner', 'root', '');

 $query = "
 DELETE from events WHERE eventNum=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>
