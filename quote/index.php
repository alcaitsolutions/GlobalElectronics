<?php

$code = $_GET['code'];


        //The url you wish to send the POST request to
    $url = "https://api.digikey.com/v1/oauth2/authorize?response_type=code&client_id=3bL3kGpYQBZMr5QBauPphMyEdbWUCN4X&redirect_uri=http://localhost/globalelectronics/";

    //The data you want to send via POST
    $fields = [
        '__VIEWSTATE '      => $state,
        '__EVENTVALIDATION' => $valid,
        'btnSubmit'         => 'Submit'
    ];

    //url-ify the data for the POST
    $fields_string = http_build_query($fields);

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

    //So that curl_exec returns the contents of the cURL; rather than echoing it
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

    //execute post
    $result = curl_exec($ch);
    echo $result;
    


?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
        <title>Selectricom Administration</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="images/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="images/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="images/morris.css">
        <link rel="stylesheet" type="text/css" href="images/style.css">
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
        <div class="main-wrapper">

             <!-- BEGIN HEADER -->
            <div class="header">
                <div class="header-left">
                    <a href="index.html" class="logo">
						<img src="images/logo.png" width="40" height="40" alt="">
					</a>
                </div>
                <div class="page-title-box pull-left">
					<h3>Selectricom</h3>
                </div>
				<a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>
				<ul class="nav navbar-nav navbar-right user-menu pull-right">
				
					<li class="dropdown">
						<a href="profile.html" class="dropdown-toggle user-link" data-toggle="dropdown" title="Admin">
							<span class="user-img"><img class="img-circle" src="images/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
							<span>Luis</span>
							<i class="caret"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="profile.html">My Profile</a></li>
							<li><a href="edit-profile.html">Edit Profile</a></li>
							<li><a href="settings.html">Settings</a></li>
							<li><a href="logout.html">Logout</a></li>
						</ul>
					</li>
				</ul>
				<div class="dropdown mobile-user-menu pull-right">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<ul class="dropdown-menu pull-right">
						<li><a href="profile.html">My Profile</a></li>
						<li><a href="edit-profile.html">Edit Profile</a></li>
						<li><a href="settings.html">Settings</a></li>
						<li><a href="logout.html">Logout</a></li>
					</ul>
				</div>
            </div>
            <!-- // END HEADER -->


            <!-- MAIN MENU BEGIN -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="active"> 
								<a class="noti-dot" href="index.html">Dashboard</a>
							</li>
							<li class="submenu">
								<a href="#" ><span> Quotes</span> <span class="menu-arrow"></span></a>
								<ul class="list-unstyled" style="display: none;">
									<li><a href="quotes.html">All Quotes</a></li>
									<li><a href="quotes-create.html">Create New Quote</a></li>
									
								</ul>
							</li>
							<li> 
								<a href="clients.html">Clients</a>
                            </li>
                            <li class="submenu">
                                    <a href="#"><span> Users</span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled" style="display: none;">
                                        <li><a href="users.html">Manage Users</a></li>
                                    </ul>
                                </li>
							<li> 
								<a href="settings.html">Settings</a>
							</li>
						
					
					
							
						</ul>
					</div>
                </div>
            </div>
            <!-- // END MAIN MENU BEGIN -->

            <!-- PAGE CONTENT BEGIN -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-lg-3">
							<div class="dash-widget clearfix card-box">
								<span class="dash-widget-icon"><i class="fa fa-cubes" aria-hidden="true"></i></span>
								<div class="dash-widget-info">
									<h3>12</h3>
									<span>Quotes</span>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-3">
							<div class="dash-widget clearfix card-box">
								<span class="dash-widget-icon"><i class="fa fa-usd" aria-hidden="true"></i></span>
								<div class="dash-widget-info">
									<h3>$44</h3>
									<span>Revenue</span>
								</div>
							</div>
						</div>
					
					</div>
				
					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-table">
								<div class="panel-heading">
									<h3 class="panel-title">Invoices</h3>
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped custom-table m-b-0">
											<thead>
												<tr>
													<th>Invoice ID</th>
													<th>Client</th>
													<th>Due Date</th>
													<th>Total</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><a href="invoice-view.html">#INV-0001</a></td>
													<td>
														<h2><a href="#">Hazel Nutt</a></h2>
													</td>
													<td>8 Aug 2017</td>
													<td>$380</td>
													<td>
														<span class="label label-warning-border">Partially Paid</span>
													</td>
												</tr>
												<tr>
													<td><a href="invoice-view.html">#INV-0002</a></td>
													<td>
														<h2><a href="#">Paige Turner</a></h2>
													</td>
													<td>17 Sep 2017</td>
													<td>$500</td>
													<td>
														<span class="label label-success-border">Paid</span>
													</td>
												</tr>
												<tr>
													<td><a href="invoice-view.html">#INV-0003</a></td>
													<td>
														<h2><a href="#">Ben Dover</a></h2>
													</td>
													<td>30 Nov 2017</td>
													<td>$60</td>
													<td>
														<span class="label label-danger-border">Unpaid</span>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="panel-footer">
									<a href="invoices.html" class="text-primary">View all invoices</a>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-table">
								<div class="panel-heading">
									<h3 class="panel-title">Payments</h3>
								</div>
								<div class="panel-body">
									<div class="table-responsive">	
										<table class="table table-striped custom-table m-b-0">
											<thead>
												<tr>
													<th>Invoice ID</th>
													<th>Client</th>
													<th>Payment Type</th>
													<th>Paid Date</th>
													<th>Paid Amount</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><a href="invoice-view.html">#INV-0004</a></td>
													<td>
														<h2><a href="#">Barry Cuda</a></h2>
													</td>
													<td>Paypal</td>
													<td>11 Jun 2017</td>
													<td>$380</td>
												</tr>
												<tr>
													<td><a href="invoice-view.html">#INV-0005</a></td>
													<td>
														<h2><a href="#">Tressa Wexler</a></h2>
													</td>
													<td>Paypal</td>
													<td>21 Jul 2017</td>
													<td>$500</td>
												</tr>
												<tr>
													<td><a href="invoice-view.html">#INV-0006</a></td>
													<td>
														<h2><a href="#">Ruby Bartlett</a></h2>
													</td>
													<td>Paypal</td>
													<td>28 Aug 2017</td>
													<td>$60</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="panel-footer">
									<a href="payments.html" class="text-primary">View all payments</a>
								</div>
							</div>
						</div>
					</div>
					
					
				</div>
						
            </div>
            <!--// END PAGE CONTENT -->
        </div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        <script  src="images/jquery-3.2.1.min.js"></script>
        <script  src="images/bootstrap.min.js"></script>
		<script  src="images/jquery.slimscroll.js"></script>
		<script  src="images/morris.min.js"></script>
		<script  src="images/raphael-min.js"></script>
        <script  src="images/app.js"></script>
        <script  src="js/knockout-3.4.2.js"></script>
        <script  src="js/common.js"></script>
        <script>
        // On ready script
        $("document").ready(function(){

        })
        </script>

		<script>
				var data = [
			  { y: '2014', a: 50, b: 90},
			  { y: '2015', a: 65,  b: 75},
			  { y: '2016', a: 50,  b: 50},
			  { y: '2017', a: 75,  b: 60},
			  { y: '2018', a: 80,  b: 65},
			  { y: '2019', a: 90,  b: 70},
			  { y: '2020', a: 100, b: 75},
			  { y: '2021', a: 115, b: 75},
			  { y: '2022', a: 120, b: 85},
			  { y: '2023', a: 145, b: 85},
			  { y: '2024', a: 160, b: 95}
			],
			config = {
			  data: data,
			  xkey: 'y',
			  ykeys: ['a', 'b'],
			  labels: ['Total Income', 'Total Outcome'],
			  fillOpacity: 0.6,
			  hideHover: 'auto',
			  behaveLikeLine: true,
			  resize: true,
			  pointFillColors:['#ffffff'],
			  pointStrokeColors: ['black'],
				gridLineColor: '#eef0f2',
			  lineColors:['gray','#00c5fb']
		  };
		config.element = 'area-chart';
		Morris.Area(config);
		config.element = 'line-chart';
		Morris.Line(config);
		config.element = 'bar-chart';
		Morris.Bar(config);
		config.element = 'stacked';
		config.stacked = true;
		Morris.Bar(config);
		Morris.Donut({
		  element: 'pie-chart',
		  data: [
			{label: "Employees", value: 30},
			{label: "Clients", value: 15},
			{label: "Projects", value: 45},
			{label: "Tasks", value: 10}
		  ]
		});
		</script>
    </body>


</html>