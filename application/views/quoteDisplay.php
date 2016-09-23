<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quote Entry</title>
	<style type="text/css">
		#topLinks{
			margin-left: 400px;
		}
	</style>
</head>
<body>
	<div id='topLinks'>
		<a href='/quotes'>Dashboard</a>
		<a href='#'>Logout</a>
	</div>
	<h2>Posts by <?=$this->session->userdata('name')?></h2>
	<h2>Count: <?=$this->session->userdata('quotesEntered')?></h2>
	<div class='singleQuote'>
		<p><span color:red>author</span>quote</p>
	</div>
</body>
</html>