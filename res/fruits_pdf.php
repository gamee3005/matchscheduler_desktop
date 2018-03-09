<?php


include('../tcpdf/tcpdf.php');
require_once('../../../dbConnect.php');
mysqli_set_charset($con,'utf8');
	header('Access-Control-Allow-Origin: *; charset=UTF-8');
	/*mysqli_set_charset($con,'utf8');*/
	if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        
            {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

    $postdata = file_get_contents("php://input");
	if (isset($postdata)) 
	{
		$request = json_decode($postdata);
		$table_html = $request->table_html;

		$head_html = '<!DOCTYPE html><html> <head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><style>.odd{background-color:#ECE8E6}.even{background-color:#FFF}.format,td{border-right:1px solid #fff;border-bottom:1px solid #fff;margin:7% 2% 2%;padding:2%}</style></head><body ><div style="width: 100%;background-color: #54d0c2;color: white;padding: 20px 10px 20px 10px;font-weight: bold;font-family: verdana;font-size: 18px;text-align: center;text-transform: uppercase;"><img src="http://payalstore.com/android/products/daily_rates/logo.png" width="70" height="50"><span>PayalStore Daily Fruit\'s Price</span></div><div ng-app="starter" ng-controller="myCtrl"> <div  id="actual_table_veg">';

		$temp1 = '
		<table style="font-family: verdana">
			<tr style="background-color: #00C75E;color: #FFFFFF;font-size: 105%;font-weight: bold">
					<th class="format" style="width: 34%;">Items</th>
					<th class="format" style="width: 22%;">Market Price<br>1 KG</th>
					<th class="format" style="width: 22%;">Our Price <br>250 Grams</th>
					<th class="format" style="width: 22%;">Our Price <br>1 KG</th>
			</tr>';
        
		$sql2 = "SELECT product_name,product_name_gu,unit_market_price,unit_store_price FROM product where category_id='1'";
      $r2 = mysqli_query($con,$sql2);
      $result2 = array();
		$count =0;
		$temp2;

		while($row = mysqli_fetch_array($r2))
		{
			$market_price = explode("_",$row['unit_market_price']);
			$store_price = explode("_",$row['unit_store_price']);

			if($count % 2 == 0)
			{
			$temp2 .=	'<tr class="even" style="background-color: #ECE8E6">
								<td class="format" style=" border-right: 1px solid #fff;border-bottom: 1px solid #fff;margin: 7% 2% 2%;padding: 2%;"><b>'.$row['product_name'].' </b><br>'.$row['product_name_gu'].' </td>
								<td class="format" style=" border-right: 1px solid #fff;border-bottom: 1px solid #fff;margin: 7% 2% 2%;padding: 2%;">Rs. '.$market_price[1].'</td>
								<td class="format" style=" border-right: 1px solid #fff;border-bottom: 1px solid #fff;margin: 7% 2% 2%;padding: 2%;">Rs. '.$store_price[0].'</td>
								<td class="format" style=" border-right: 1px solid #fff;border-bottom: 1px solid #fff;margin: 7% 2% 2%;padding: 2%;">Rs. '.$store_price[1].'</td>
							</tr>';
			}
			else
			{
			$temp2 .=	'<tr class="odd" style="background-color: #FFF">
								<td class="format"><b>'.$row['product_name'].' </b><br>'.$row['product_name_gu'].' </td>
								<td class="format">Rs. '.$market_price[1].'</td>
								<td class="format">Rs. '.$store_price[0].'</td>
								<td class="format">Rs. '.$store_price[1].'</td>
							</tr>';
			}
			$count++;
		}    
		
		$temp_final = '</table></div>';
		
		$end_html = '</div></body></html>';

		$temp_final = $temp1.$temp2.$temp_final;

		$finaallll = $head_html.$temp_final.$end_html ;

		echo $head_html.$temp_final.$end_html;
        
        $pdf = new TCPDF('P', 'pt', 'A4', true, 'UTF-8', false);
            $pdf->SetCreator('');
            $pdf->SetAuthor('');
            $pdf->SetTitle('');
            $pdf->SetSubject('');
            $pdf->SetKeywords('');
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->SetDefaultMonospacedFont('');
            $pdf->SetMargins(10, 10, 10, true);
            $pdf->SetAutoPageBreak(TRUE, 10);
            $pdf->setLanguageArray($l);
            $pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
            $pdf->SetTextColor(119, 119, 119);
            $pdf->SetDrawColor(119, 119, 119, false, '');
            /*$pdf->setFont('freeserif');*/
            $pdf->setFont('hindvadodara');
            $pdf->AddPage('P', 'A4');

		  //$html = $head_html.$table_html.$end_html; 
		  $html = $head_html.$temp_final.$end_html ;
        $pdf->writeHTML($html, true, false, true, false, ''); 
        $pdf->Output($_SERVER['DOCUMENT_ROOT'].'/android/products/daily_rates/'.'daily_fruit_price.pdf', 'F');
	}


 ?>