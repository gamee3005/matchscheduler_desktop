<html>
	<head>
		<title>New Match Schedule</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>New Schedule</title>
		<script src="res/jquery-3.2.1.min.js" type="text/javascript"></script>
		<script src="res/bootstrap.min.js" type="text/javascript"></script>
		<link href="res/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	</head>
	<body style="background-color: skyblue">
		<div style="margin:2% 26% 0 26%;width: 48%;background-color: white;padding: 10px 4% 10px 4%;border: 0px;border-radius: 5px">
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
		<div style="margin:3% 26% 0 26%;width: 48%;background-color: white;padding: 30px 4% 20px 4%;border: 0px;border-radius: 5px;box-shadow: 3px 3px 5px #888888;">
			<!-- <form action="new1.php" method="POST"> -->
				<div class="form-group">
					<label for="exampleFormControlInput1">Tournament Name</label>
					<input type="text" class="form-control" name="t_name" id="t_name">
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">Organizer Name</label>
					<input type="text" class="form-control" name="o_name" id="o_name">
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">Number of Teams</label>
					<input type="number" class="form-control" min="1" id="no_teams" name="no_teams">
					<br>
					
					<!-- <button  id="calcbye" class="btn btn-warning" style="box-shadow: 3px 3px 5px #888888;">Calculate Byes</button> -->
				</div>
				<div class="form-group">
					<hr style="height:3px;border:none;color:#333;background-color:#333;">
				</div>
				<!-- ********************************** -->
				
				<div class="form-group">
					<label for="exampleFormControlInput1">Number of Byes</label>
					<span style="margin-left: 35px;color:red;font-size:18px;font-weight: bold" id="t_no_byes"></span>
				</div>

				<div class="form-group">
					<label for="exampleFormControlInput1">Number of Rounds</label>
					<span style="margin-left: 17px;color:red;font-size:18px;font-weight: bold" id="t_no_rounds"></span>
				</div>
				
				<input type="hidden" name="no_byes" id="no_byes">
				<input type="hidden" name="no_rounds" id="no_rounds">
				
				<div class="form-group">
					<center>
						<!-- <input style="width: 200px;font-size: 20px;box-shadow: 3px 3px 5px #888888;" type="submit" class="btn btn-success" value="Next"> -->
						<button id="submit_new" style="width: 200px;font-size: 20px;box-shadow: 3px 3px 5px #888888;"  class="btn btn-success" >Next</button>
					</center>
				</div>
			<!-- </form> -->
			<form id="myform" action="new1.php" method="post">
				<input type="hidden" name="p_t_name" id="p_t_name">
				<input type="hidden" name="p_o_name" id="p_o_name">
				<input type="hidden" name="p_no_teams" id="p_no_teams">
				<input type="hidden" name="p_no_byes" id="p_no_byes">
				<input type="hidden" name="p_no_rounds" id="p_no_rounds">
			</form>

		</div>
		<div style="margin:3% 26% 0 26%;width: 48%;background-color: white;padding: 10px 4% 10px 4%;border: 0px;border-radius: 5px;box-shadow: 3px 3px 5px #888888;">
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
		var cal_count = 0;
		
		/* $('#calcbye').click(function (e)
		{
			e.preventDefault();
			var v_no_teams = document.getElementById("no_teams").value;
			if(v_no_teams <= 0)
			{
				alert("No of Teams Can't Be Empty");
			}
			else
			{
				
				console.log(v_no_teams);
				var ceil_pow_of_2 = Math.ceil(Math.log2(v_no_teams));
				console.log(ceil_pow_of_2);
				var v_no_byes = (Math.pow(2,ceil_pow_of_2)) - v_no_teams ;
				console.log(v_no_byes);
				var v_no_rounds = ceil_pow_of_2;
				console.log(v_no_rounds);

				document.getElementById("t_no_byes").innerHTML = v_no_byes;
				document.getElementById("t_no_rounds").innerHTML = v_no_rounds;
				
				document.getElementById("no_byes").value = v_no_byes;
				document.getElementById("no_rounds").value = v_no_rounds;
				
				cal_count=1;
			}
		}); */


		$('#submit_new').click(function (e)
		{
			e.preventDefault();

			var v_no_teams = document.getElementById("no_teams").value;
			if(v_no_teams <= 0)
			{
				alert("No of Teams Can't Be Empty");
			}
			else
			{
				
				console.log(v_no_teams);
				var ceil_pow_of_2 = Math.ceil(Math.log2(v_no_teams));
				console.log(ceil_pow_of_2);
				var v_no_byes = (Math.pow(2,ceil_pow_of_2)) - v_no_teams ;
				console.log(v_no_byes);
				var v_no_rounds = ceil_pow_of_2;
				console.log(v_no_rounds);

				document.getElementById("t_no_byes").innerHTML = v_no_byes;
				document.getElementById("t_no_rounds").innerHTML = v_no_rounds;
				
				document.getElementById("no_byes").value = v_no_byes;
				document.getElementById("no_rounds").value = v_no_rounds;
				
				cal_count=1;
			}

			if(cal_count !=0)
			{
				//gather data
				var  t_name = $('#t_name').val();
				var o_name = $('#o_name').val();
				var no_teams = $('#no_teams').val();
				var no_byes = $('#no_byes').val();
				var no_rounds = $('#no_rounds').val();

				var d = new Date();
				/* var add_date = d.getDate()+'/'+(d.getMonth()+1)+'/'+d.getFullYear();
				var add_time = d.getHours()+':'+d.getMinutes(); */
				var add_date = new Date().toLocaleDateString();
				var add_time = new Date().toLocaleTimeString();
				
				/* <input type="hidden" name="p_t_name" id="p_t_name">
				<input type="hidden" name="p_o_name" id="p_o_name">
				<input type="hidden" name="p_no_teams" id="p_no_teams">
				<input type="hidden" name="p_no_byes" id="p_no_byes">
				<input type="hidden" name="p_no_rounds" id="p_no_rounds">
				 */
		

				$('#p_t_name').val(t_name)  ;
				$('#p_o_name').val(o_name)  ;
				$('#p_no_teams').val(no_teams) ;
				$('#p_no_byes').val(no_byes) ;
				$('#p_no_rounds').val(no_rounds);
				$('#myform').submit();


				
				/* localStorage.setItem("t_name",t_name);
				localStorage.setItem("o_name",o_name);
				localStorage.setItem("no_teams",no_teams);
				localStorage.setItem("no_byes",no_byes);
				localStorage.setItem("no_rounds",no_rounds);

				localStorage.setItem("add_date",add_date);
				localStorage.setItem("add_time",add_time); */

				//database operations
				/* var db = openDatabase('matchscheduler', '1.0', 'Test DB', 2 * 1024 * 1024);
				db.transaction(function (tx) {
					tx.executeSql('CREATE TABLE IF NOT EXISTS tournament_schedules ( add_date , add_time , tournament_name , organizer_name , number_teams , number_byes , number_rounds , html , teams)');
					
					
					tx.executeSql('INSERT INTO tournament_schedules (add_date,add_time,tournament_name,organizer_name,number_teams,number_byes,number_rounds) VALUES ("'+add_date+'", "'+add_time+'", "'+t_name+'", "'+o_name+'", "'+no_teams+'", "'+no_byes+'", "'+no_rounds+'")');
					
				
					msg = '<p>Log message created and row inserted.</p>';
					//document.querySelector('#status').innerHTML =  msg;
					//alert(msg);
					window.location = 'new1.html';
				}); */
			}
			else
			{
				alert('Click on "Calculate Byes" First !');
			}
		});
		
		
	</script>
</html>