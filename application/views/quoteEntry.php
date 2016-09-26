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
<?php foreach($allQuotes as $quote){
?>			<form action='addToFavorites' class='singleQuote' method="post">
				<p name=''><?=$quote['author']?>: <?=$quote['quote']?></p>

				Posted by <a href='quotesDisp/<?=$quote['posted_id']?>'><?=$quote['poster']?></a>
				<input hidden name='id' value=<?=$quote['id']?>>
				<input type="submit" name="addToFavorites" value="Add to My List" >
			</form>
<?php			
}			
 ?>					
		</div>

	</div>

	<div id='favorites'>
		<h3>Your Favorites</h3>
		<div class='quote'>
<?php 	foreach($favorites as $favorite) {
 ?>			<form action='removeFromList' class='singleQuote' method="post">
				<p><?=$favorite['author']?>: <?=$favorite['quote']?></p>
				Posted by <a href=''><?=$favorite['author']?></a>
				<input hidden name='id' value=<?=$favorite['id']?>>
				<input type="submit" name="removeFromList" value="Remove from My List">
			</form>
<?php
}
?>
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