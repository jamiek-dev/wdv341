<?php 
/**
 * Create a folder in the same directory called 'includes'. Inside of that
 * folder create a file called unit-3.php. Then include that file here. We're going
 * to create some variables in unit-3.php to use in this file.
 */
include './includes/unit-3.php';
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>WDv341 Intro PHP</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        *,:after,:before{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}body{font:normal 15px/25px 'Open Sans',Arial,Helvetica,sans-serif;color:#444;text-align:left}h1,h2,h3{font-weight:400}h1{font:normal 40px/120px 'Open Sans',Arial,Helvetica,sans-serif;text-align:center;color:#444;margin:0}h1 span{color:#484c9b}h2{font-size:25px;line-height:30px;color:#484c9b;margin:50px 0 10px}h3{font-size:18px;line-height:35px;margin:50px 0 0}a{color:#484c9b;text-decoration:none}a:focus,a:hover{text-decoration:underline}p{margin:0 0 2rem}p span{color:#aaa}header{width:98%;margin:40px auto 0;border-bottom:1px solid #ddd;padding-bottom:40px;text-align:center}header p{margin:0}section{width:95%;max-width:910px;margin:40px auto}pre{background:#f9f9f9;padding:10px;font-size:12px;border:1px solid #eee;white-space:pre-wrap;border-radius:10px}table{border:1px solid #eee;background:#f9f9f9;width:100%;border-collapse:collapse;border-spacing:0;margin-bottom:3rem}thead{background:#5965af;color:#fff}tbody tr td,thead td{padding:.5rem .75rem}tbody tr:nth-child(even){background:#efefef}tbody tr td:first-child{padding-left:1.25rem}tbody tr td:first-child,tbody tr td:nth-child(3),thead td:first-child,thead td:nth-child(3){width:15%}tbody tr td:nth-child(2),thead td:nth-child(2){width:20%}tbody tr td:last-child,thead td:last-child{width:50%}@media only screen and (min-width:768px){body{font-size:20px;line-height:30px}h2{font-size:30px;line-height:45px}h3{font-size:22px;line-height:45px;margin-top:50px}p{margin-bottom:2rem}h1{font-size:60px}pre{padding:20px;font-size:15px}}
    </style>
</head>

<body>
	<header>
		<h1>WDV341 Intro <span>PHP</span></h1>
		<p>PHP Basics</p>
	</header>

	<section>
		<h2>Conditional HTML responses</h2>
		<p><b>Inline - If Statement</b></p>

		<?php
		/**
		 * Create a couple different HTML string variables and echo them 
		 * in the conditional below.
		 */
		$inventoryCount = 11; //use this variable for the if statement

		if ($inventoryCount == 0) {
			echo '<h3>Uh oh, no inventory!</h3>';
		} else {
			echo '<h3>Horray! We have inventory!</h3>';
		}
		?>

		<p><b>External File - If Statement &amp; Buffer</b></p>
		<?php 
		/**
		 * Display HTML content here using a conditional in unit-3.php. 
		 * Use a buffer to create HTML content
		 */
		echo $response;
		?>

		<p><b>Dynamic Variable (URL)</b></p>
		<?php 
		/**
		 * Populate the variable below using a URL parameter and the global $_GET.
		 * Use an if statement to check if the URL parameter is available and use it. If
		 * it's not, then set the variable to 'variable'
		 */
		$url_variable = $_GET['test'];
		?>
		<p>This word right here <?=$url_variable?> changes depending on the URL.</p>

		<!-- use PHP to set a class to this section if the inventoryCount is greater than 10 -->
		<div <?php echo $inventoryCount > 10 ? 'class="positive-inventory"' : ''?>>
			This is the greater than 10 box!
		</div>
	</section>
</body>

</html>