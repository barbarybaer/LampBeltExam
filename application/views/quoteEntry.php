<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quotes</title>
	<style type="text/css">
		#nonFavorites, #favorites{
			display: inline-block;
			border: 1px solid black;
			padding:10px;
			margin-left: 20px;
		}
		.singleQuote{
			display:block;
			border: 1px solid black;
			padding:5px;
		}
	</style>
</head>
<body>

	<h1>Welcome, <?=$this->session->userdata('alias')?></h1>
<?php		if($this->session->flashdata("quote_errors"))
			{
				echo $this->session->flashdata("quote_errors");
				
			}
?>
	<div id="nonFavorites">
		<h3>Quotable Quotes</h3>
		<div class='quote'>
<?php foreach($quotes as $quote){
?>			<form action='addToList' class='singleQuote'>
				<p><?=$quote['author']?>: <?=$quote['quote']?></p>
				Posted by <a href='#'><?=$quote['poster']?></a>
				<input type="submit" name="addToList" value="Add to My List">
			</form>
<?php			
}			
 ?>					
		</div>

	</div>

	<div id='favorites'>
		<h3>Your Favorites</h3>
		<div class='quote'>
			<form action='removeList' class='singleQuote'>
				<p></p>
				Posted by <a href='#'>name</a>
				<input type="submit" name="removeFromList" value="Remove from My List">
			</form>
		</div>
		<div>
			<h3>Contribute a Quote:</h3>	
			<form action= 'addQuote' name='contribute' method="post">
				Quoted By:<input type="text" name="author">
				Message:<input type="text" name="message">
				<input type="submit" name="submitQuote">
			</form>
		</div>
	</div>
	
</body>
</html>