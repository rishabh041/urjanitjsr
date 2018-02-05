
    <?php 
	//echo $_SERVER["REQUEST_METHOD"];
	// Connect to database
	$connection=mysqli_connect('localhost','root','','sports');
	if($connection)
		//echo 'connected';
	//echo $_GET['sno'];
	$request_method=$_SERVER["REQUEST_METHOD"];
	//echo $request_method;
	if($request_method==='GET')
	{
 		if(empty($_GET["sno"]))
 		{
 			$query="select * from points order by `point` desc;";
 			//echo $query;
 			$result= mysqli_query($connection,$query);
 			$final = array();
			while($row=mysqli_fetch_array($result))
			{
				$res['sno']=$row['sno'];
				$res['gold']=$row['gold'];
				$res['silver']=$row['silver'];
				$res['bronze']=$row['bronze'];
				$res['point']=$row['point'];
				$final[] = $res;
				
			}
			echo json_encode($final);

 		}
 		else if(!empty($_GET["sno"]))
 		{
 			$sno=$_GET['sno'];
 			$query="select * from points where sno=$sno;";
 			//echo $query;
 			$result= mysqli_query($connection,$query);
 			$final = array();
			while($row=mysqli_fetch_array($result))
			{
				$res['sno']=$row['sno'];
				$res['gold']=$row['gold'];
				$res['silver']=$row['silver'];
				$res['bronze']=$row['bronze'];
				$res['point']=$row['point'];
				$final[] = $res;
			}
			echo json_encode($final);
 		}
	}
	else if($request_method==='POST')
	{
		
		
		$sno = $_POST['sno'];
		$gold=$_POST['gold'];
		$silver=$_POST['silver'];
		$bronze=$_POST['bronze'];
		$point=$_POST['point'];
		
		
		$query="UPDATE points SET gold=$gold,silver=$silver,bronze=$bronze,point=$point WHERE sno=$sno;";
		//echo "$query";
		$mysqli=mysqli_query($connection,$query);
		if($mysqli)
			echo "updated";
		else
			echo "not updated";
	}

	?>

