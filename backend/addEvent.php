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
            $date = $_POST['date']; //the date of the event
      }
            //validation not necessary for date?
            if ($valid){
                  $sql = "INSERT INTO events (userID, eventName, date) VALUES
                  ('$userid','$eventName','$date')";
                  $results = mysqli_query($conn, $sql);
                  if ($results) {
                    $message =  "New account added: $eventName [date: $$date]";
                    //we can output the account info after
                  } else {
                    echo mysqli_error($conn);
                    echo "something 1";
                  }
            }
            else {
                  $message =  "Error: You already have an event with that name. Please choose a new name.";
                  //NOTE: Will need to change this later, repeated events must be allowed
            }
    } else {
      echo "A field is empty.";
    }
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
          <p></p>
        </div>
        <button type = "submit" name = "submit" id = "submit">Add Event</button>
      </form>
      <?php
            echo $message;
       ?>
</body>
</html>
