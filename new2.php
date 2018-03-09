<?php 
require_once('res/dbConnect.php');

if(isset($_POST['team_names']))
{
	$team_names = $_POST['team_names'];
	$t_id = $_COOKIE['t_id'];

	/* $o_name = $_POST['p_o_name'];
	$no_teams = $_POST['p_no_teams'];
	$no_byes = $_POST['p_no_byes'];
	$no_rounds = $_POST['p_no_rounds']; */

	/* $tz = 'Asia/Kolkata';
	$timestamp = time();
	$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
	$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
	$add_date =  $dt->format('Y/m/d');
	$add_time =  $dt->format('H:i:s'); */


	$sql1 = "update schedules set team_names= '".$team_names."' where t_id = '".$t_id."' ";

	mysqli_query($con, $sql1);

	$sql2 = "SELECT * FROM schedules where t_id = '".$t_id."'  ";
	$result2 = mysqli_query($con, $sql2);

	$t_name = '';
	$team_names = '';
	$no_teams = 0;
	$no_byes = 0;

	if (mysqli_num_rows($result2) > 0)
	{
		while($row2 = mysqli_fetch_assoc($result2)) 
		{
			$t_name = $row2['t_name'];
			$team_names = $row2['team_names'];
			$no_teams = $row2['no_teams'];
			$no_byes = $row2['no_byes'];
		}
	}
	else 
	{
		echo "0 results";
	}

	$indi_teams = explode("_",$team_names);


	$arr_team_names = $indi_teams;
	//console.log(arr_team_names);
	$arr_bye_names = array();
	

	for($i=1;$i<=$no_byes;$i++)
	{
		/* arr_bye_names.push('Bye-'+i);
		arr_team_names.push('Bye-'+i); */
		$abc = 'Bye-'. $i ;
		$xyz = 'Bye-'. $i ;
		array_push($arr_bye_names,$abc);
		array_push($arr_team_names,$xyz);
	}
	
	//var final_teams = [];
	$total = $no_teams+$no_byes;
	
	//console.log("total "+total);
	$array_index = array();
	$s=0;
	$e=$total-1;
	$j=0;
	while($s<$total/2 || $e>$total/2)
	{
		$array_index[$j]=$arr_team_names[$s];
		$j+=1;
		$s+=1;
		$array_index[$j]=$arr_team_names[$e];
		$j+=1;
		$e-=1;
	}
	
	/* if (mysqli_query($con, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	} */
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
		  
		<style>
			/*
			*  Flex Layout Specifics
			*/
			main{
			display:flex;
			flex-direction:row;
			}
			.round{
			display:flex;
			flex-direction:column;
			justify-content:center;
			width:200px;
			list-style:none;
			padding:0;
			}
			.round .spacer{ flex-grow:1; }
			.round .spacer:first-child,
			.round .spacer:last-child{ flex-grow:.5; }

			.round .game-spacer{
				flex-grow:1;
			}

			/*
			*  General Styles
			*/
			body{
			font-family:sans-serif;
			font-size:small;
			padding:10px;
			line-height:1.4em;
			}

			li.game{
			padding-left:20px;
			}

			li.game.winner{
				font-weight:bold;
			}
			li.game span{
				float:right;
				margin-right:5px;
			}

			li.game-top{ border-bottom:1px solid #aaa; }

			li.game-spacer{ 
				border-right:1px solid #aaa;
				min-height:40px;
			}

			li.game-bottom{ 
				border-top:1px solid #aaa;
			}

		</style>
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
		<div id="bracket" style="background-color:white;margin:20px 0 0 0;padding:10px;">
		<h1 id="tname"><?php echo $t_name;?></h1>
			<main id="tournament">
				<ul class="round round-1">
					<li class="spacer">&nbsp;</li>
					
					<?php
					for($i = 0; $i < $total; $i++)
					{
						print '
						<li class="game game-top winner">'.$array_index[$i].'<span>58</span></li>
						<li class="game game-spacer">&nbsp;</li>
						<li class="game game-bottom ">'.$array_index[$i+1].'<span>48</span></li>

						<li class="spacer">&nbsp;</li>
						';
						$i++;
					}
					?>
				</ul>
				<ul class="round round-2">
					<li class="spacer">&nbsp;</li>
					
					<!-- <li class="game game-top winner">Lousville <span>82</span></li>
					<li class="game game-spacer">&nbsp;</li>
					<li class="game game-bottom ">Colo St <span>56</span></li>

					<li class="spacer">&nbsp;</li>
					
					<li class="game game-top winner">Oregon <span>74</span></li>
					<li class="game game-spacer">&nbsp;</li>
					<li class="game game-bottom ">Saint Louis <span>57</span></li>

					<li class="spacer">&nbsp;</li>
					
					<li class="game game-top ">Memphis <span>48</span></li>
					<li class="game game-spacer">&nbsp;</li>
					<li class="game game-bottom winner">Mich St <span>70</span></li>

					<li class="spacer">&nbsp;</li>
					
					<li class="game game-top ">Creighton <span>50</span></li>
					<li class="game game-spacer">&nbsp;</li>
					<li class="game game-bottom winner">Duke <span>66</span></li>

					<li class="spacer">&nbsp;</li> -->
				</ul>
				<ul class="round round-3">
					<li class="spacer">&nbsp;</li>
					
					<!-- <li class="game game-top winner">Lousville <span>77</span></li>
					<li class="game game-spacer">&nbsp;</li>
					<li class="game game-bottom ">Oregon <span>69</span></li>

					<li class="spacer">&nbsp;</li>
					
					<li class="game game-top ">Mich St <span>61</span></li>
					<li class="game game-spacer">&nbsp;</li>
					<li class="game game-bottom winner">Duke <span>71</span></li>

					<li class="spacer">&nbsp;</li> -->
				</ul>
				<ul class="round round-4">
					<li class="spacer">&nbsp;</li>
					
					<!-- <li class="game game-top winner">Lousville <span>85</span></li>
					<li class="game game-spacer">&nbsp;</li>
					<li class="game game-bottom ">Duke <span>63</span></li>
					
					<li class="spacer">&nbsp;</li> -->
				</ul>		
			</main>
		</div>

		<div style="margin:5% 30% 0 40%;width: 20%;background-color: white;padding: 20px 4% 20px 4%;border: 0px;border-radius: 5px">
			<div class="row">
					<div class="col-md-6 col-lg-6">
						<span onclick="saveSchedule()" class="btn btn-warning" style="width:160px;font-size: 18px;font-family: verdana;">Print</span>
					</div>
					
			</div>    
		</div>
	
	</body>
	<script>
		//setting some values
		
		/*
		var no_teams = localStorage.getItem("no_teams");
		var no_byes = localStorage.getItem("no_byes");

		$('#tname').text(localStorage.getItem("t_name"));
		var arr_team_names = JSON.parse( localStorage.getItem("team_names") );
		console.log(arr_team_names);
		var arr_bye_names = [];
		

		for(var i=1;i<=no_byes;i++)
		{
			arr_bye_names.push('Bye-'+i);
			arr_team_names.push('Bye-'+i);
		}
		
		var final_teams = [];
		var total = parseInt(no_teams)+ parseInt(no_byes);
		
		console.log("total "+total);
		array_index = new Array(total);
		var s=0,e=total-1;
		var j=0;
		while(s<total/2 || e>total/2)
		{
			array_index[j]=arr_team_names[s];
			j+=1;
			s+=1;
			array_index[j]=arr_team_names[e];
			j+=1;
			e-=1;
		}

		console.log(array_index);


		//showing the schedule
		var ul1 = $('ul.round-1');
		
		for(var i = 0; i < total; i++) 
		{
			ul1.append('<li class="game game-top winner">'+array_index[i]+'<span>58</span></li>'
			+'<li class="game game-spacer">&nbsp;</li>'
			+'<li class="game game-bottom ">'+array_index[i+1]+'<span>48</span></li>'

			+'<li class="spacer">&nbsp;</li>');

			i++;
		}

		var ul2 = $('ul.round-2');
		
		for(var i = 0; i < total/2; i++) 
		{
			ul2.append('<li class="game game-top winner">'+array_index[i]+'<span>58</span></li>'
			+'<li class="game game-spacer">&nbsp;</li>'
			+'<li class="game game-bottom ">'+array_index[i+1]+'<span>48</span></li>'

			+'<li class="spacer">&nbsp;</li>');

			i++;
		}

		var ul3 = $('ul.round-3');
		//Math.pow(4, 3)
		for(var i = 0; i < total/4; i++) 
		{
			ul3.append('<li class="game game-top winner">'+array_index[i]+'<span>58</span></li>'
			+'<li class="game game-spacer">&nbsp;</li>'
			+'<li class="game game-bottom ">'+array_index[i+1]+'<span>48</span></li>'

			+'<li class="spacer">&nbsp;</li>');

			i++;
		}

		var ul4 = $('ul.round-4');
		
		for(var i = 0; i < total/8; i++) 
		{
			ul4.append('<li class="game game-top winner">'+array_index[i]+'<span>58</span></li>'
			+'<li class="game game-spacer">&nbsp;</li>'
			+'<li class="game game-bottom ">'+array_index[i+1]+'<span>48</span></li>'

			+'<li class="spacer">&nbsp;</li>');

			i++;
		}
		 */
		
	</script>
</html>