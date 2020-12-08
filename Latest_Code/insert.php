<?php

//insert.php

$connect = new PDO('mysql:host=localhost;dbname=time_crunch_planner', 'root', '');

if(isset($_POST["title"]))
{
$ID = 171524; //TO DO: Change to session ID 

 $query = "
 INSERT INTO events
 (date, end, userID, eventName)
 VALUES (:start_event, :end_event, '$ID', :title)
 ";

 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}


?>
