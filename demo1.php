<html lang="en">
<head>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
.a{
color: #ee82ee;
text-align : center;
}
.logo{
	float: left;
	margin-top : 30px;
}
.b{
	text-align: center;
	color: rgb(124,54,64);
}

	img{
		margin: auto;
		object-fit: contain;
	}

	
p.text {
    font-weight: bold;
	font-size: 30px;
	
}
.error {
		color: #FF0000;
}

body {
	background-color: rgba(450,200,205,6);
	
	}
	
	
.text1 {
	float: right;
	width: 400px;
    height: 300px;
    overflow: auto;
    outline-color : black;
	outline-style: solid;
	margin: auto;
	padding : 5px;
}

	
</style>
<body>

<div class="container">
  
<img class="img-responsive logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6HkoS59kOhqYXG6uPBmQ9lMP14SJjYdzpOLSNdQADtn6LdwQj_w" 
alt="logo" width="100" height= "100">

	<h1 class="a">Demo Flight ticket</h1>
	<h2 class="b"> Welcome to stew airlines</h2>
	
		<img class="img-responsive" src="http://moziru.com/images/comics-clipart-airplane-11.jpg" alt="flight">
		
	<br><br>

	<p class="text">Flight ticket form</p>

<?php

$nameErr = $emailErr = $genderErr = $ticketnumberErr = "";
$name = $email = $gender = $comment = $ticketnumber = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
    
  if (empty($_POST["ticketnumber"])) {
    $ticketnumber = "";
  } else {
    $ticketnumber = test_input($_POST["ticketnumber"]);
    
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$ticketnumber)) {
      $ticketnumberErr = "Invalid URL"; 
    }
  }

 

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="text1">
<h3 class="a">Instructions</h3>
<p>Baggage How and where you stow your carry-on baggage during a flight is a matter of flight safety. Any baggage stored in overhead
 compartments should fit appropriately, so that compartment doors latch securely. Baggage stored underneath the seat should not protrude,
 as any items underfoot might impede a quick exit in the case of an emergency. Should evacuation prove necessary, leave all your baggage 
 behind.Electronics The use of electronic devices on board an aircraft is subject to limitations by the Federal Aviation Administration 
 and the Federal Communications Commission. Use of cellular phones, for example, can interfere with important signaling devices used in 
 the cockpit. For this reason, cellphones, radios and hand-held televisions are all prohibited during the flight. Cellular phones must 
 be turned off or to a "airplane" setting during the duration of the flight. Use of laptops and other personal electronic devices is
 permissible at certain points during the flight. Flight attendants will signal when passengers are allowed to use them.
Emergency Procedures If the cabin air pressure changes dramatically, oxygen masks might fall from the ceiling directly in front of you.
 Follow the airline's instructions in operating their masks. If a child is seated beside you, put on your own mask before helping 
 to put a mask on the child. Should an emergency arise that requires you to evacuate the airplane, follow the lighting on the aisle or
 over the seats to the nearest exit. Follow any instructions you receive from flight attendants and remain calm. If you are sitting in an 
 emergency exit row, you might need to perform extra actions, such as opening the emergency door. If you must evacuate along a slide, 
 take off any high-heeled shoes before getting on the slide. Once you have evacuated the aircraft, move away from it. Never return to a 
 burning aircraft.
General Safety Procedures
Each time that you fly, consult the safety information card provided by your airline for any variations or changes in the recommended 
safety procedures. Look for the exit closest to your seat, noting that the nearest exit might be behind you and counting the number of 
rows between your seat and the exit. Only sit in an emergency exit row if you are capable of following the extra emergency actions. 
Locate the flotation device, typically beneath your seat.
</div>

<h2>please fill the form details properly :</h2>

<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
 
  Ticket number: <input type="text" name="ticket number" value="<?php echo $ticketnumber;?>">
  <span class="error"><?php echo $ticketnumberErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  
  </form>
<?php
require("PHPMailerAutoload.php");
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = "mail.smtp2go.com";;  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'gameboydrewy@gmail.com';                 // SMTP username
    $mail->Password = 'vegetachris93';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 2525;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('stewchris0293@gmail.com', 'Mailer');
    $mail->addAddress('gameboydrewy@gmail.com', 'chris stewart');     // Add a recipient
    
    
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'ticket confirmation';
    $mail->Body    = 'your ticket is been confirmed<b>and verified</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
      echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>


<form id="emailForm" name="emailForm" method="post" action="" >
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">
<tr>
  <td colspan="4"><strong>Verification E-mail</strong></td>
</tr>
<tr>
  <td>E-mail :</td>
  <td><input name="email" type="text" id="email"></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><input name="SubmitBtn" type="submit" id="SubmitBtn" value="Submit"></td>
</tr>
</table>
</form>
  
  <?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $ticketnumber;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>
</div>
</body>
</html>
