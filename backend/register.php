<! To display all user accounts>
<?php
  session_start();

   $conn = mysqli_connect("localhost","root","","time_crunch_planner");
   //check connection
   if(!$conn){
       die("Connection failed" . mysqli_connect_error());
   }

   $message = "";

/*SELECT FROM TABLES BELOW, EDIT AS NEEDED*/
$table = "SELECT * FROM useraccounts";
$tableresult = mysqli_query($conn, $table);
      /*
      $userID = $_SESSION['userID'];
      $table = "SELECT * FROM accounts WHERE userID='$userID'";
      $tableresult = mysqli_query($conn, $table);
   */

   $conn->close();
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>
  </head>

  <body>
    <br>

  <div class = "row">
      <div class = "loginform">
        <h2>Register</h2>
        <form action = "register.php" method="post">
            <div class = "form-group">
              <label for ="First name"> First name:</label>
              <input name = "fname" type = "text" required>
            </div>
            <div class = "form-group">
              <label for = "Last name"> Last name: </label>
              <input name = "lname" type = "text" required>
          </div>
          <div class = "form-group">
            <label for = "Username"> Username: </label>
            <input name = "username" type = "text" required>
          </div>
            <div class = "form-group">
              <label for = "Pin"> PIN: </label>
              <input name = "pin" type = "password" required>
            </div>

      <div class = "form-group">
        <label for = "Email"> Email: </label>
        <input name = "email" type = "text" required>
      </div>
          <p><button type = "submit" name= "login-submit">Submit</button></p>
   </form>
      <?php echo $message ?>
               <h1> View Accounts </h1>
               <div class= display>
                <?php
                       if ($tableresult->num_rows > 0) {
                           echo "<table id=customers><tr><th>User ID</th><th>First Name</th><th>Last Name</th><th>Username</th><th>PIN</th><th>Email</th></tr>";
                           // output data of each row
                           while($row = $tableresult->fetch_assoc()) {
                               echo "<tr><td>".$row["userID"]."</td><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["username"]."</td><td>".$row["pin"]."</td><td>".$row["email"]."</td></tr>";
                           }
                           echo "</table>";
                       } else {
                           echo "0 results";
                       }
                ?>
               </table>
                <button onclick="document.location='login.php'">Login page</button>
  </div>
</div>
<?php
  if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["username"])
      /*&& isset($_POST["password"])*/ && isset($_POST["pin"]) && isset($_POST["email"])){
    if ($_POST["fname"] && $_POST["lname"] && $_POST["username"] && /*$_POST["password"] &&*/ $_POST["pin"]
        && $_POST["email"]){

             $valid = TRUE;
    $userID = rand(100000,199999); //expand random number range if needed
    $fname = $_POST["fname"];
    $fnameValidation = $_POST["fname"];
    if (!preg_match("/^[a-zA-Z ]*$/",$fnameValidation)) {
      $nameErr = "Only letters and white space allowed";
      die("Only letters and white space allowed in first name");
    }

    $lname = $_POST["lname"];
    $lnameValidation = $_POST["lname"];
    if (!preg_match("/^[a-zA-Z ]*$/",$lnameValidation)) {
      $nameErr = "Only letters and white space allowed";
      die("Only letters and white space allowed in last name");
    }

    $username = $_POST["username"];
    //$password = $_POST["password"]; //Commented out password just in case

    $pin = $_POST["pin"];
    $pinValidation = $_POST["pin"];
    if (!preg_match("/^[0-9]*$/",$pinValidation)) {
      $nameErr = "Only letters and white space allowed";
      die ("only numbers are allowed into pin ");
}
/*
    pin input validation
    if it not a number it is invalid
    */

    $email = $_POST["email"];
    $emailValidation = $_POST["email"];
    if (!filter_var($emailValidation, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      die("invalid email");
    }
    /*
    email input validation
    if it does not have the @ and the . in emails, it will be invalid
    */
    //$acctnum = rand(100000,199999);


    //Create connection
    $conn = mysqli_connect("localhost", "root", "", "time_crunch_planner"); //change "time_crunch_planner" based on database name

    //Check connection
    if(!$conn){
        die("Connection failed" . mysqli_connect_error());
    }

    $validation = "SELECT username, email FROM useraccounts";

    $valresult = $conn->query($validation);

    if ($valresult->num_rows > 0) {
     while($valrow = $valresult->fetch_assoc()) {
          if ($valrow["username"] == $username){      //if there's already an acct with that name
                 $valid = FALSE;
          }
          else if($valrow["email"] == $email){
                $valid = FALSE;
          }
     }
    }
          if ($valid){
                //Register user
                $sql = "INSERT INTO useraccounts (userID, fname, lname, username, /*password,*/ pin, email) VALUES
                        ('$userID','$fname','$lname','$username','$pin','$email')";
                //$sql2 = "INSERT INTO accounts (userID) VALUES ('$userID')";


                // echo $sql;
                $results = mysqli_query($conn, $sql);


                /*if ($results) {
                    $accounts = "SELECT * FROM accounts";
                    $initialize = mysqli_query($conn, $accounts);
                    /*BEGIN: initializing the checking and savings accounts*/

                if ($results) {
                    echo "Registered."; //As a toast message
                    $sql2 = "INSERT INTO accounts (userID, acctname, balance) VALUES
                            ('$userID','Savings','0.00')"; //starting balance in each account is zero
                        $message = "Success! Account registered.";
                        $results2 = mysqli_query($conn, $sql2);
                        echo "<meta http-equiv='refresh' content='0'>";
                    //header('Location: login.php');
                    //Change location based on where project folder is saved.
                  } else {
                  echo mysqli_error($conn);
                  echo "Error.";
                }

                      mysqli_close($conn);
               }
                else {
                      echo "Error: that username or email is already in use.";
               }

    } else {
      echo "A field is empty."; //Also as a toast message
    }
  }
    /*else {
      echo "Form was not submitted.";
    }*/
    ?>
  </body>
</html>
