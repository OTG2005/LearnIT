<?php
require 'Header.php';
?>
<head>	
	<link rel="stylesheet" type="text/css" href="./css/index.css">	
</head>

<div class="body">
	<div class="table" style="margin-right: auto; margin-left: auto;">
		<div class="tr">
			<div>
				<?php
					if (isset($_GET["login"])) {
						if ($_GET["login"] == "success"){
							echo '<div class="successmessage">Logged in successfully</div>';
						}
						else if ($_GET["login"] == "loggedout") {
							echo '<div class="errormessage">Logged out successfully</div>';
						}
					}
				?>
			</div>
			<form action="./php/homepage.php" name="homebttn" class="homebuttons" method="GET">
				<button class="homebutton" name="coursesbttn"><h1>Courses</h1>Click here to start<br>your learning jorney</button>	
				<button class="homebutton" name="schedulebttn"><h1>Schedule</h1>The schedule of all<br>the available Courses</button>	
				<button class="homebutton" name="contactbttn"><h1>Contact Us</h1>Have a question?<br>Click here to ask us
				</button>	
			<?php
				if (isset($_SESSION['userId'])) {
					echo'<button class="homebutton" name="userbttn"><h1>User Page</h1>Click here to view<br>your Information</button>';
				}
				else {
					echo'<button class="homebutton" name="signbttn"><h1>Signup/in</h1>Click here to<br>Sign up or Sign in</button>';
				}
			?>
		</tr>
	</table>
</div>