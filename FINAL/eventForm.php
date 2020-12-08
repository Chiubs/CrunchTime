<?php
      //eventForm.php
      session_start();

      $connect = new PDO('mysql:host=localhost;dbname=time_crunch_planner', 'root', '');

            if(isset($_POST["eventName"]))
            {
                  $start = $_SESSION['start'];
                  $end = $_SESSION['end'];

                  $ID = $_SESSION['userID']; //user id to divide calendar functions by user

                  $title = $_POST['eventName'];

                  if(!isset($_POST["allday_box"])) {
                        $start_time = $_POST['event_time']; //taking event_time from post
                        $end_time = $_POST['event_time_end'];

                        $event = date('Y-m-d H:i:s', strtotime("$start $start_time")); //adding times to the date, allowing time of event to be set
                        $event_end = date('Y-m-d H:i:s', strtotime("$start $end_time")); //using start twice is deliberate

                        $query = "
                        INSERT INTO events
                        (date, end, userID, eventName)
                        VALUES ('$event', '$event_end', '$ID', '$title')
                        ";

                        $statement = $connect->query($query);
                  }
                  else { //all day

                        $query = "
                        INSERT INTO events
                        (date, end, userID, eventName)
                        VALUES ('$start', '$end', '$ID', '$title')
                        ";

                        $statement = $connect->query($query);
                  }


                  header('Location: /homepage.php'); //redirect
            }
?>

<!DOCTYPE html>
<html>
<head>
      <script type="text/javascript">
      function handleClick(checkBox) {
      	if(checkBox.checked){
                  document.getElementById("time_id").disabled = false;
                  document.getElementById("time_id2").disabled = false;
      	}
            else {
                  document.getElementById("time_id").disabled = true;
                  document.getElementById("time_id2").disabled = true;
            }
      }
      </script>

<title>Add Event Form</title>

<link rel="stylesheet" href="eventFormStyle.css" />

</head>
<body>
    <!--Contact Form-->
    <div >
        <form class="contact-form" action="eventForm.php" id="contact-form"
            method="post" enctype="multipart/form-data">
            <h1>Create New Event</h1>
            <div>
                <div>
                    <label>Event Name: </label>
                </div>
                <div>
                    <input type="text" name="eventName"
                        class="inputBox" value="New Event" required>
                </div>
            </div>
            <div>
                <div>
                      <input type="checkbox" id="allday_box" name="allday_box" value="true" onclick="handleClick(this);" >
                      <label for="duration">Disable 'All Day'</label><br>

                </div>
                <div>
                      <! Time inputs need styling>
                      <label for="event_time">Start time:</label>
                     <input type="time" disabled="disabled" id="time_id" name="event_time" />
                </div>
            </div>
            <div>
                <div>
                </div>
                <div>
                      <label for="event_time_end">End time:</label>
                    <input type="time" disabled="disabled" id="time_id2" name="event_time_end">
                </div>
            </div>
            <div>
                <input type="submit" id="send" name="reate" value="Create"/>
            </div>
        </form>
    </div>
</body>
</html>
