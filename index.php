<!DOCTYPE html>
<head>
<title>STOCK MARKET</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
			<link type="text/css" rel="stylesheet" href="assets/css/modules/materialadmin/css/theme-default/bootstrap94be.css" />

			<link type="text/css" rel="stylesheet" href="assets/css/modules/materialadmin/css/theme-default/materialadminb0e2.css" />

			<link type="text/css" rel="stylesheet" href="assets/css/modules/materialadmin/css/theme-default/css/fontawesome-all.min.css" />

			<link type="text/css" rel="stylesheet" href="assets/css/modules/materialadmin/css/theme-default/material-design-iconic-font.mine7ea.css" />

	
		<link type="text/css" rel="stylesheet" href="assets/css/modules/materialadmin/css/theme-default/libs/rickshaw/rickshawd56b.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link type="text/css" rel="stylesheet" href="assets/css/modules/materialadmin/css/theme-default/libs/morris/morris.core5e0a.css" />
			<link rel="stylesheet" href="assets/lib/lib/bootstrap.css">
	<link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="assets/css/creative.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <nav class="navbar navbar-fixed-top navbar-default ">
	<div class="container">
			<div class="main-nav">
				<button type="button" class="collapsed navbar-toggle" data-toggle="collapsed" data-target="#nav-toggle">
				<span class="sr-only">toggle</span>
				<i class="fa fa-bars"></i>
				</button>
				<a class="navbar-brand page-scroll logo" href="index.php"></a>
					<form class="navbar-form input-group" action="index.php" method="get">
						<div >
							<input type="text" placeholder="Enter Ticker Symbol" class="search-bar" name="searchdata">
							<button type="submit" class="submit"><i class="fa fa-search"> Search</i></button>
						</div>
					
				</form>			
			</div>
	</div>
</nav>	
<?php
if(isset($_GET['searchdata']))
{
	$search = $_GET['searchdata'];
	$search = strtoupper($search);
	$web_page_data = file_get_contents("https://www.investello.com/Analysis/Dashboard/".$search);
	
	
	
///////////////////////////////////////////////////	
	//technical indicator
	$web_page = file_get_contents("https://www.equitymaster.com/share-price/".$search);
$web_page = explode('REFRESH</a></div>',$web_page)[1];
$web_page_data1 = explode('Live NSE Quotes',$web_page)[0];
$web_page_datax = explode('Live NSE Quotes',$web_page)[1];
$web_page_data2 = explode('Valuation',$web_page_datax)[0];
//$web_page_data = explode('width="25%"',$web_page_data)[3];

$row1 = explode('class="c-yellow">',$web_page_data1)[1];

//first row
$price = explode('width="25%">',$row1)[0];
$price = explode('</td>',$price)[0];
$open = explode('width="25%">',$row1)[1];
$open = explode('</td>',$open)[0];
$high = explode('width="25%">',$row1)[2];
$high = explode('</td>',$high)[0];
$low1 = explode('width="25%">',$row1)[3];
$low = explode('</td>">',$low1)[0];


//////////////////////////////////////////////////



//overviw
////////////////////////
$overview = file_get_contents("https://in.tradingview.com/symbols/NSE-".$search);
$overview = explode('<div class="tv-widget-description__text">',$overview)[1];
$overview = explode('</div>',$overview)[0];

/////////////////////////
	
	$item_list = explode('<div class="mainpanel">', $web_page_data)[0]; 
	$item_list = explode('<div class="contentpanel">', $item_list )[1]; 
	$item_list = explode('<div class="custom-heading text-center">', $item_list )[0]; 
	$companyname = explode('<div class="clearfix">', $item_list )[0]; 
	$sector = explode('<div class="clearfix">', $item_list )[1]; 
	echo'<br>';
	echo'<br>';
	echo'<br>';
	echo '<strong>'.$companyname.'</strong>';
	echo'<br>';
	echo $sector;
	echo'<br>';
	//echo '<centre>'.$overview.'</centre>';
	echo'<br>';
	$item_list = explode('<div class="tab-content custom-tabs mb20">', $item_list )[0];
	$item_list = explode('<div class="tab-pane">', $item_list )[1];
	$item_list = explode('<div class="panel panel-profile custom-content list-view">', $item_list )[1];
	$item_list_divdend = explode('EPS Growth (5Y) ', $item_list )[1];
	$item_list = explode('EPS Growth (5Y) ', $item_list )[0];
	$item_list = explode('Key Metrics', $item_list )[1];
	$item_list1 = $item_list;//values after key metrics
	
	//BOOK VALUE
	$bookvalue=  explode('<div class="col-sm-3">', $item_list1 )[1];
	
	//PE RATIO ANNUAL 
	$PE_Ratio_Annual = explode('<div class="col-sm-3">', $item_list1 )[2];

	//PE RATIO TTM 
	$PE_RATIO_TTM = explode('<div class="col-sm-3">', $item_list1 )[3];
	
	
	//EPS TTM 
	$EPS_TTM = explode('<div class="col-sm-3">', $item_list1 )[4];
	
	
	//MARKET CAP 
	$MARKET_CAP = explode('<div class="col-sm-3">', $item_list1 )[5];
	
	
	//PBV RATIO
	$PBV_RATIO = explode('<div class="col-sm-3">', $item_list1 )[6];

	
	//MEDIAN PE
	$MEDIAN_PE  = explode('<div class="col-sm-3">', $item_list1 )[7];
	
	
	//DIVIDEND YIELD 
	$DIVIDEND_YIELD = explode('<div class="col-sm-3">',$item_list_divdend )[2];
	

	echo'<div class="col-md-3 col-sm-6">
					<div class="card">
						<div class="card-body no-padding">
							<div class="alert alert-callout alert-info no-margin">'.$bookvalue.'
								<div class="stick-bottom-left-right">
									<div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
								</div>
							</div>
						</div><!--end .card-body -->
					</div><!--end .card -->
	</div><!--end .col -->
	

	
	<div class="col-md-3 col-sm-6">
					<div class="card">
						<div class="card-body no-padding">
							<div class="alert alert-callout alert-info no-margin">'.$PE_Ratio_Annual.'
								<div class="stick-bottom-left-right">
									<div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
								</div>
							</div>
						</div><!--end .card-body -->
					</div><!--end .card -->
	</div><!--end .col -->
	

	
	
	<div class="col-md-3 col-sm-6">
					<div class="card">
						<div class="card-body no-padding">
							<div class="alert alert-callout alert-info no-margin">'.$PE_RATIO_TTM.'
								<div class="stick-bottom-left-right">
									<div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
								</div>
							</div>
						</div><!--end .card-body -->
					</div><!--end .card -->
	</div><!--end .col -->
	
	
		
	<div class="col-md-3 col-sm-6">
					<div class="card">
						<div class="card-body no-padding">
							<div class="alert alert-callout alert-info no-margin">'.$EPS_TTM.'
								<div class="stick-bottom-left-right">
									<div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
								</div>
							</div>
						</div><!--end .card-body -->
					</div><!--end .card -->
	</div><!--end .col -->
	

	
	
	<div class="col-md-3 col-sm-6">
					<div class="card">
						<div class="card-body no-padding">
							<div class="alert alert-callout alert-info no-margin">'.$MARKET_CAP.'
								<div class="stick-bottom-left-right">
									<div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
								</div>
							</div>
						</div><!--end .card-body -->
					</div><!--end .card -->
	</div><!--end .col -->
	

	
	<div class="col-md-3 col-sm-6">
					<div class="card">
						<div class="card-body no-padding">
							<div class="alert alert-callout alert-info no-margin">'.$PBV_RATIO.'
								<div class="stick-bottom-left-right">
									<div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
								</div>
							</div>
						</div><!--end .card-body -->
					</div><!--end .card -->
	</div><!--end .col -->
	
	
	
	<div class="col-md-3 col-sm-6">
					<div class="card">
						<div class="card-body no-padding">
							<div class="alert alert-callout alert-info no-margin">'.$MEDIAN_PE.'
								<div class="stick-bottom-left-right">
									<div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
								</div>
							</div>
						</div><!--end .card-body -->
					</div><!--end .card -->
	</div><!--end .col -->
	

	
	<div class="col-md-3 col-sm-6">
					<div class="card">
						<div class="card-body no-padding">
							<div class="alert alert-callout alert-info no-margin">'.$DIVIDEND_YIELD.'
								<div class="stick-bottom-left-right">
									<div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
								</div>
							</div>
						</div><!--end .card-body -->
					</div><!--end .card -->
	</div><!--end .col -->
	
	
	
				
				
	
	';
	echo'<br>';
	echo'<br>';
	echo'<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th align="left" scope="col">LIVE STOCK QUOTES</th>
  
    </tr>
  </thead>
  <tbody>
    <tr>
	  <td>'.$price.'</td>
      <td>'.$open.'</td>
      <td>'.$high.'</td>
      <td>'.$low.'</td>
    </tr>
  
  </tbody>
</table>';
	}
?>
	
	
	
	
	
	
	
	
	
	
	
	
	




</body>
				