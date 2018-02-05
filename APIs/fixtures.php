<?php 
	
	//echo $_SERVER["REQUEST_METHOD"];
	// Connect to database
	$connection=mysqli_connect('localhost','root','','sports');
	if($connection)
		//echo 'connected';
	//echo $_GET['sno'];
	$request_method=$_SERVER["REQUEST_METHOD"];
	//echo $request_method;
	if($request_method === 'GET')
	{
		//echo $request_method;
		if(empty($_GET["sno"]) && empty($_GET['eventname'])&&empty($_GET["event-type"]))
		{
			$today = date("Y-m-d H:i:s");
	//$query = "select * from fixtures where (time > '$today');";

			$query = "select * from fixtures where (time > '$today') order by `time` asc;";
			//echo $query;
			$result = mysqli_query($connection,$query);
			$final= array();
			while($row=mysqli_fetch_array($result))
			{
				//echo json_encode($row);
				$res['sno']= $row['sno'];
				$res['eventname']=  $row["eventname"];
				$res['event-type'] = $row['event-type'];
				$res['A-team']=$row['A-team'];
				$res['B-team']=$row['B-team'];
				$res['Gender']=$row['Gender'];
				$res['time']=$row['time'];
				$res['isresult']=$row['isresult'];
				$res['result']=$row['result'];
				$res['match-type']=$row['match-type'];
				$res['venue'] = $row['venue'];
				$final[] = $res;
				
			}
			echo json_encode($final);
		}
		else if(empty($_GET["sno"]) && empty($_GET['eventname'])&&(!empty($_GET["event-type"])))
		{
			$eventType=$_GET['event-type'];
			$query = "select * from fixtures WHERE `event-type`='$eventType' order by `time` asc;";
			//echo $query;
			$result = mysqli_query($connection,$query);
			$final= array();
			while($row=mysqli_fetch_array($result))
			{
				//echo json_encode($row);
				$res['sno']= $row['sno'];
				$res['eventname']=  $row["eventname"];
				$res['event-type'] = $row['event-type'];
				$res['A-team']=$row['A-team'];
				$res['B-team']=$row['B-team'];
				$res['Gender']=$row['Gender'];
				$res['time']=$row['time'];
				$res['isresult']=$row['isresult'];
				$res['result']=$row['result'];
				$res['match-type']=$row['match-type'];
				$res['venue'] = $row['venue'];
				$final[] = $res;
				
			}
			echo json_encode($final);
		}
		else
		{
			if(!empty($_GET['sno']))
			{
				$sno = $_GET['sno'];	
				$query = "select * from fixtures WHERE `sno`='$sno';";
				//echo $query;
				$result = mysqli_query($connection,$query);
				$final = array();
				while($row=mysqli_fetch_array($result))
					{
						$res['sno']= $row['sno'];
						$res['eventname']=  $row["eventname"];
						$res['event-type'] = $row['event-type'];
						$res['A-team']=$row['A-team'];
						$res['B-team']=$row['B-team'];
						$res['Gender']=$row['Gender'];
						$res['time']=$row['time'];
						$res['isresult']=$row['isresult'];
						$res['result']=$row['result'];
						$res['match-type']=$row['match-type'];
						$res['venue'] = $row['venue'];
						$final[] = $res;
						
					}
					echo json_encode($final);	
			}
			else if (!empty($_GET['eventname']))
			{
				//echo $_GET['eventname'];
				$eventname = $_GET['eventname'];	
				$query = "select * from fixtures WHERE `eventname`='$eventname' order by time asc;";
				$result = mysqli_query($connection,$query);
				$final = array();
				while($row=mysqli_fetch_array($result))
					{
						$res['sno']= $row['sno'];
						$res['eventname']=  $row["eventname"];
						$res['event-type'] = $row['event-type'];
						$res['A-team']=$row['A-team'];
						$res['B-team']=$row['B-team'];
						$res['Gender']=$row['Gender'];
						$res['time']=$row['time'];
						$res['isresult']=$row['isresult'];
						$res['result']=$row['result'];
						$res['match-type']=$row['match-type'];
						$res['venue'] = $row['venue'];
						$final[] = $res;
						
					}
					echo json_encode($final);	

			}
			
			
			
		}
	}
	else if($request_method === 'POST')
	{
		
		$result=$_POST['result'];
		$no = $_POST['sno'];
		$query = "UPDATE fixtures SET result='$result',isresult=1 WHERE sno=$no;";
		//echo "$query";
		$res = mysqli_query($connection,$query);
		if($res)
			echo 'updated';
		else
			echo 'cant update';
		
	}
	
	mysqli_close($connection);

?>