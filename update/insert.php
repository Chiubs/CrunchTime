<?php

//insert.php
session_start();
$connect = new PDO('mysql:host=localhost;dbname=time_crunch_planner', 'root', '');

if(isset($_POST["start"]))
{

      //$_SESSION['title']= $_POST['title'];
      $_SESSION['start']= $_POST['start'];
      $_SESSION['end']= $_POST['end'];

      //header('Location: /eventForm.php');
      /*
$ID = $_SESSION['userID'];

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
 */
}


?>
