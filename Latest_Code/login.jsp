<jsp:include page="main.jsp"/> 

<head>
	
		<style>
			
			/* Style the content */
			.content {
			  margin-left: 400px;
			  padding-left: 0px;
			  
			}
			
			.loginBox{
				position: absolute;
				top:50%;
				left:0%;
				transform: translate(-50%,-50%);
				width:350px;
				height:300px;
				padding: 40px 40px;
				box-sizing:border-box;
				background: rgba(0,0,0,.5);
			}
			
			.body {
			  margin-left: 0px;
			  padding-left: 20px;
			  background: url(https://content.thriveglobal.com/wp-content/uploads/2019/02/GettyImages-1005983884.jpg);
			  background-repeat: no-repeat;
  			  background-size: 1400px 1000px;
  			  background-attachment: fixed;
			}
			
			body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
		</style>
</head>

<body class="body">		
		<div class="content">
			  <h2>Login</h2>

<form action="loginVerification.jsp" method="post">
  
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
	</div>	

</body>