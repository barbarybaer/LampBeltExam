<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quote Display</title>
	<style type="text/css">
		#topLinks{
			margin-left: 400px;
		}
	</style>
</head>
<body>
	<div id='topLinks'>
		<a href='/quotes'>Dashboard</a>
		<a href='/logoff'>Logout</a>
	</div>
	<h2>Posts by <?=$quotes[0]['alias']?></h2>
	<!-- <h2>Count: <?=$count['count(id)']?></h2>    -->
	<h2>Count: <?=count($quotes)?></h2>
<?php foreach($quotes as $quote){
?>	<div class='singleQuote'>
		<p><span style="color:red"><?=$quote['author']?></span>: <?=$quote['quote']?></p>
	</div>
<?php	}
?>
</body>
</html>