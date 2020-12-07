<!To create a new event>
<?php
  session_start();
  //connnect to localhost
  $conn = mysqli_connect("localhost","root","","time_crunch_planner");
  //check connection
  if(!$conn){
      die("Connection failed" . mysqli_connect_error());
  }
  //sql to list events
  $query = "SELECT * FROM events";
  $result1 = mysqli_query($conn, $query);

  $message = ""; //used for confirmation messages, etc

  /*BEGIN: ADD A NEW TASK*/
  if (isset($_POST["eventName"]))
  {
          if ($_POST["eventName"])
          {
            $valid = TRUE;
            $userid = 	171524; //CHANGE THIS TO BE SESSION ID
            $eventName= $_POST['eventName'];
            $date = $_POST['event_date']; //the date of the event
            $time = $_POST['event_time'];

            $event = date('Y-m-d H:i:s', strtotime("$date $time"));
            $end = date('Y-m-d H:i:s', strtotime("$date $time")); //placeholder, needs its own date and time variables
      }
            //validation not necessary for date?
            if ($valid){
                  $sql = "INSERT INTO events (date, end, userID, eventName) VALUES ('$event', '$end', '$userid','$eventName')";
                  $results = mysqli_query($conn, $sql);
                  if ($results) {
                    $message =  "New event added: $eventName [$date at $time]";
                    //we can output the event info after
                  } else {
                    echo mysqli_error($conn);
                    echo "<br>Connection error";
                  }
            }
            else {
                  $message =  "Error: You already have an event with that name. Please choose a new name.";
                  //NOTE: Will need to change this later, repeated events must be allowed
            }
    } else {
      echo ""; //for welcome message, if any
    }

  // Close connection
  mysqli_close($conn);
  /*==================END: PHP ADD EVENT ==================*/
?>

<html>
  <head> <!This is the title of the webpage>
    <meta charset="utf-8">
    <title>Add Event</title>
  </head>

  <body>
<br>
      <h1>Add Event</h1>
      <form action = "addEvent.php" method="post">
        <div class = "form-group">
          <label for = "eventName"> Event Name: </label>
          <input name = "eventName" type = "text" required>
          <p></p>
           <!NEED: Input date, input time, choose alarm or no alarm>
          <label for="eventDate">Event:</label>
          <input type="date" id="date" name="event_date">
          <br>
          <br>

          <label for="event_time">Select a time:</label>
          <input type="time" id="time_id" name="event_time">

          <p></p>
        </div>
        <button type = "submit" name = "submit" id = "submit">Add Event</button>
      </form>
      <?php
            echo $message;
       ?>
                <h1> View Events </h1>
                <div class= display>
                 <?php
                        if ($result1->num_rows > 0) {
                            echo "<table id=event_table><tr><th>Date</th><th>End Date</th><th>User ID</th><th>EventNum</th><th>Event Name</th></tr>";
                            // output data of each row
                            while($row = $result1->fetch_assoc()) {
                                echo "<tr><td>".$row["date"]."</td><td>".$row["end"]."</td><td>".$row["userID"]."</td><td>".$row["eventNum"]."</td><td>".$row["eventName"]."</td></tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "0 results";
                        }
                 ?>
</body>
</html>
