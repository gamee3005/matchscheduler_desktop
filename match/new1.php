<?php 
require_once('res/dbConnect.php');

if(isset($_POST['p_t_name']))
{
	$t_name = $_POST['p_t_name'];
	$o_name = $_POST['p_o_name'];
	$no_teams = $_POST['p_no_teams'];
	$no_byes = $_POST['p_no_byes'];
	$no_rounds = $_POST['p_no_rounds'];
	

	$tz = 'Asia/Kolkata';
	$timestamp = time();
	$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
	$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
	$add_date =  $dt->format('Y/m/d');
	$add_time =  $dt->format('H:i:s');

	$t_id = $t_name."_".$add_date."_".$add_time;

	$sql = "INSERT INTO schedules ( t_id, t_name, o_name, no_teams, no_byes, no_rounds)
	VALUES ('".$t_id."', '".$t_name."', '".$o_name."', ".$no_teams.", ".$no_byes.", ".$no_rounds.")";

	mysqli_query($con, $sql);
	
	setcookie('t_id', $t_id, time() + (60*10), "/"); // 86400 = 1 day
	
	/* if (mysqli_query($con, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	} */
}
else
{
	
}


?>
<html>
	<head>
		<title>New Schedule</title>	
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>New Schedule</title>
		<script src="res/jquery-3.2.1.min.js" type="text/javascript"></script>
		<script src="res/bootstrap.min.js" type="text/javascript"></script>
		<link href="res/bootstrap.min.css" rel="stylesheet" type="text/css"/>

		
	</head>
	<body style="background-color: skyblue">
		
		<div style="margin:2% 25% 0 25%;width: 50%;background-color: white;padding: 10px 4% 10px 4%;border: 0px;border-radius: 5px;box-shadow: 3px 3px 5px #888888;">
			<div class="row">
			<center>
				<div style="margin:0% 20% 0 20%;">
					<span style="font-family: verdana;font-size: 24px;width: 60%;font-weight: bold">
						Match Scheduler
					</span>
				</div>
			</center>
			</div>    
		</div>
		<div style="margin:3% 25% 0 25%;width: 50%;background-color: white;padding: 30px 4% 20px 4%;border: 0px;border-radius: 5px;box-shadow: 3px 3px 5px #888888;">
			
				
			<div class="abcd form-group">
				<?php
				print '<input type="hidden" id="hi_no_teams" value="'.$no_teams.'">';
				for($i=0;$i<$no_teams;$i++)
				{
					print '
					<label >Team-'.($i+1).'</label>
					<input type="text" class="form-control" id="team'.$i.'" name="teams[]"><br>
					';
				}
				?>
			</div>

			<form action="new2.php" method="POST" id="new1_form">
				<input type="hidden" id="team_names" name="team_names">
			</form>

			<div class="form-group">
				<center>
					<input style="width: 200px;font-size: 20px;box-shadow: 3px 3px 5px #888888;" type="submit" id="new1_submit" class="btn btn-success" value="Next">
				</center>
			</div>
			
		</div>


		 <!-- footer -->
		 
		<div style="margin:3% 25% 0 25%;width: 50%;background-color: white;padding: 10px 4% 10px 4%;border: 0px;border-radius: 5px;box-shadow: 3px 3px 5px #888888;">
			<div>
				<a href="" style="margin:0 0 0 10px;">
					<span style="font-weight: bold;font-size: 18px">Step-1 Add Teams</span>
				</a>
				<span style="margin:0 0 0 10px;font-weight: bold;font-size: 18px">|</span>
				<a href="" style="margin:0 0 0 10px"><span style="font-weight: bold;font-size: 18px">Step-2 Draw Schedule</span> </a>
				<span style="margin:0 0 0 10px;font-weight: bold;font-size: 18px">|</span>
				<a href="" style="margin:0 0 0 10px"><span style="font-weight: bold;font-size: 18px">Step-3 Print Pdf</span> </a>
			</div>
			
		</div>
		
	</body>
	<script>
			
		/* var no_teams = localStorage.getItem("no_teams");
		// localStorage.setItem("no_byes",no_byes);
		// localStorage.setItem("no_rounds",no_rounds);
		
		var arr_team_names = [];
		console.log(no_teams);
		var ul = $('div.abcd');
		var count = 15; // number of images

		for(var i = 1; i <= no_teams; i++) 
		{
			ul.append('<label >Team-'+i+'</label>'
			+'<input type="text" class="form-control" id="team'+i+'" name="teams[]"><br>');
		} */
		
		
		$('#new1_submit').click(function (e)
		{
			e.preventDefault();
			var arr_team_names = [];
			var team_names = '';
			var no_teams = $('#hi_no_teams').val();
			for(var i = 0; i < no_teams; i++) 
			{
				//console.log($('#team'+i).val());
				if(i == (no_teams-1))
				{
					team_names = team_names +$('#team'+i).val();
				}
				else
				{
					team_names = team_names +$('#team'+i).val()+'_';
				}
				//arr_team_names.push($('#team'+i).val());
			}
			// console.log(team_names);
			$('#team_names').val(team_names);
			$('#new1_form').submit();

			/* localStorage.setItem("team_names", JSON.stringify(arr_team_names));
			window.location = 'new2.html'; */
		});

	</script>
</html>