<?php include 'variables.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Database entry</title>
	
</head>
<body>

	<form method="post" action="fixtures1.php">
		event-type:
		<select id="et" name="event-type">
		<option value="sports">Sports</option>
		<option value="athletics">Athletics</option>
        </select>
		<span id="en">
		eventname:
		
		<select id="en1" name="eventname">
		<option value="basketball">Basketball</option>
		<option value="volleyball">Volleyball</option>
		<option value="hockey">Hockey</option>
		<option value="tableTennis">TableTennis</option>
		<option value="badminton">Badminton</option>
		<option value="cricket">Criket</option>
		<option value="chess">Chess</option>
		<option value="football">Football</option>
		</select>
		</span>
		A-team:
		<select name="A-team">
		<option value="NULL">NULL</option>
		<option value="CSE">CSE</option>
		<option value="CE">CE</option>
		<option value="ME">ME</option>
		<option value="MME">MME</option>
		<option value="ECE">ECE</option>
		<option value="EEE">EEE</option>
		<option value="PIE+IIIT">PIE+IIIT</option>
		<option value="MCA+MSc">MCA+MSc</option>
		<option value="PIE+IIIT+ECE">PIE+IIIT+ECE</option>
		<option value="CSE+EEE">CSE+EEE</option>
		<option value="MCA+ME">MCA+ME</option>
		<option value="CE+MME">CE+MME</option>
		<option value="PIE+CSE">PIE+CSE</option>
		<option value="ME+EEE+IIIT">ME+EEE+IIIT</option>
		<option value="CE+ECE">CE+ECE</option>
		<option value="MME+MCA">MME+MCA</option>
        </select>
		B-team:
		<select name="B-team">
		<option value="NULL">NULL</option>
		<option value="CSE">CSE</option>
		<option value="CE">CE</option>
		<option value="ME">ME</option>
		<option value="MME">MME</option>
		<option value="ECE">ECE</option>
		<option value="EEE">EEE</option>
		<option value="PIE+IIIT">PIE+IIIT</option>
		<option value="MCA+MSc">MCA+MSc</option>
		<option value="PIE+IIIT+ECE">PIE+IIIT+ECE</option>
		<option value="CSE+EEE">CSE+EEE</option>
		<option value="MCA+ME">MCA+ME</option>
		<option value="CE+MME">CE+MME</option>
		<option value="PIE+CSE">PIE+CSE</option>
		<option value="ME+EEE+IIIT">ME+EEE+IIIT</option>
		<option value="CE+ECE">CE+ECE</option>
		<option value="MME+MCA">MME+MCA</option>
        </select>
		Gender:
		<select name="gender">
		<option value="Male">Male</option>
		<option value="Female">Female</option>
		</select>
		</br>
		
		
		Date:
		<input type="datetime-local" name="date" class="date" required >
		
		
		
		Match-type:
		<input type="text" name="match-type" required>
		Venue:
		<input type="text" name="venue" required>
		
		<input type="submit" name="submit">
	</form>
    

</body>
</html>
<script language="Javascript" type="text/Javascript" src="<?php echo $root;?>js/jquery-3.2.1.min.js"></script>


<script>
$(document).ready(function() {

  $("#et").change(function() {

    var el = $(this) ;
    if(el.val() === "sports" ) {
    $("#en").html('eventname:<select id="en1" name="eventname"><option value="basketball">Basketball</option><option value="volleyball">Volleyball</option><option value="hockey">Hockey</option><option value="tabletennis">TableTennis</option><option value="badminton">Badminton</option><option value="cricket">Cricket</option><option value="chess">Chess</option><option value="football">Football</option></select>');
    }
      else if(el.val() === "athletics" ) {
        $("#en").html('eventname:<input type="text" name="eventname" required >');
	  }
  });

});
</script>






<?php

$connection=mysqli_connect('localhost','root','~@b%31#M','sports');

	$request_method=$_SERVER["REQUEST_METHOD"];
if(isset($_POST['submit']))
	{	
if($request_method=='POST')
{
	
		$eventtype=$_POST['event-type'];
	$eventname=$_POST['eventname'];
	$teamA=$_POST['A-team'];
	$teamB=$_POST['B-team'];
	$gender=$_POST['gender'];
	$s=$_POST['date'];
	
	
	
	
	
	$time=date("Y-m-d H:i:s",strtotime($s));
	
	
	$matchtype=$_POST['match-type'];
	$venue=$_POST['venue'];
	
	
	
	$query= "INSERT INTO `fixtures` (`eventname`,`event-type`,`A-team`,`B-team`,`Gender`,`time`,`match-type`,`venue`) VALUES ('$eventname','$eventtype','$teamA','$teamB','$gender','$time','$matchtype','$venue');";
	$res = mysqli_query($connection,$query);
	if($res)
		echo 'inserted';
		else
			echo 'not inserted';
		
	
	
	mysqli_close($connection);
	
}
	}
?>
