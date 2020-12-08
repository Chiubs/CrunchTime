<?php
//eventForm.php
session_start();

//$message ='';

$connect = new PDO('mysql:host=localhost;dbname=time_crunch_planner', 'root', '');

if(isset($_POST["eventName"]))
{

      //$title = $_SESSION['title']; //preset date, time, ect
      $start = $_SESSION['start'];
      $end = $_SESSION['end'];
      $ID = $_SESSION['userID'];

      $title = $_POST['eventName'];
      $start_time = $_POST['event_time']; //taking event_time from post
      $end_time = $_POST['event_time_end'];

      $event = date('Y-m-d H:i:s', strtotime("$start $start_time"));
      $event_end = date('Y-m-d H:i:s', strtotime("$start $end_time"));

      //$start->setTime($time);

/*
      $title = "title"; //preset date, time, ect
      $start = "2020-12-09 00:00:00";
      $end = "2020-12-09 00:00:00";
      $ID = 3333333;
*/
      //$time = $_POST['event_time']; //taking event_time from post

      //creates date from input values
      //$event = date('Y-m-d H:i:s', strtotime("$start $time"));

      //$message = $event;

 $query = "
 INSERT INTO events
 (date, end, userID, eventName)
 VALUES ('$event', '$event_end', '$ID', '$title')
 ";

$statement = $connect->query($query);

header('Location: /homepage.php');

 //$statement = $connect->prepare($query);
/*
 $statement->execute(
  array(
   '$title' => $_POST['eventName'], //parsing input from the form
   '$start' => $_POST['event_time'],
   '$end' => $_POST['event_time_end']
  )
 );
 */
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Add Event Form</title>

<link rel="stylesheet" href="eventFormStyle.css" />

</head>
<body>
    <!--Contact Form-->
    <div >
        <form class="contact-form" action="eventForm.php" id="contact-form"
            method="post" enctype="multipart/form-data">
            <h1>Create New Event</h1>
            <?php
            echo "Success! Title: " .$_SESSION['title']. " Start: " .$_SESSION['start']. " End: " .$_SESSION['end']. " and your userID: " .$_SESSION['userID']. ".";
            ?>

            <div>
                <div>
                    <label>Event Name: </label>
                    <!We already get event name?>
                </div>
                <div>
                    <input type="text" name="eventName"
                        class="inputBox" />
                </div>
            </div>
            <div>
                <div>
                </div>
                <div>
                      <! Time inputs need styling>
                      <label for="event_time">Start time:</label>
                     <input type="time" id="time_id" name="event_time">
                </div>
            </div>
            <div>
                <div>
                </div>
                <div>
                      <label for="event_time_end">End time:</label>
                    <input type="time" id="time_id" name="event_time_end">
                </div>
            </div>
            <div>
                <div>
                      <! Remove?>
                    <label>Comments (Optional):
                </div>
                <div>
                    <textarea id="message" name="comment"
                        class="inputBox"></textarea>
                </div>
            </div>
            <div>
                <input type="submit" id="send" name="reate" value="Create" />
            </div>
        </form>
    </div>
</body>
</html>
