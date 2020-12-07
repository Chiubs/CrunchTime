<!To create a new event>
<?php
  session_start();
echo "A field is empty.";
  $message = "BUTTS"; //used for confirmation messages, etc

  if (isset($_POST["eventName"]))
  {
          if ($_POST["eventName"])
          {
            $valid = TRUE;
            $userid = 	171524; //CHANGE THIS TO BE SESSION ID
            $eventName= $_POST['eventName'];
            $date = $_POST['date']; //the date of the event

              $message =  "You input: $eventName"; // [date: $$date]
            }
    } else {
      echo "A field is empty.";
    }
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
      <form action = "testDateStuff.php" method="post">
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
