<?php date_default_timezone_set('America/Los_angeles');?>
<html>
<head>
	<title>Add Book and Review</title>
	<meta charset='utf-8'>
	<link rel="stylesheet" type="text/css" href="/assets/css/BP_style.css">
	<meta name='viewport' content='width=device-width, initial-scale=1.0'> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script> 
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>
</head>
<body>
	<div id='container' class='row'>
		<h3><?= $book['title']; ?></h3>
		<p>Author: <?= $book['author'];?></p>
		<img src= "<?= $book['image'];?>" width="250" height="300" class="col-md-2">
		<div id='reviews'class="col-md-6">
			<?php foreach ($reviews as $review) { ?>
				<p>Rating: <?php for ($i=0; $i < $review['rating'] ; $i++) { 
					echo '<span class="glyphicon glyphicon-star" aria-hidden="true">';
				} ?> </p>
				<a href="/profile/<?= $review['users_id'];?>"><?= $review['name']; ?></a>
				<p>says: <?= $review['review'];?></p>
				<p>Posted on <?= date("F j, Y", strtotime($review['created_at'])); ?></p>

				<?php 
					if ($review['users_id'] === $this->session->userdata('id')) { ?>
						<a href="/book_reviews/delete_review/<?= $review['id'];?>">Delete this review</a>
					<?php } ?>
				<hr>
			<?php } ?>
		</div>
		<div id='new_review' class="col-md-4">
			<h4>Add a review:</h4>
			<form action='/book_reviews/add_review' method='post'>
				<input type='hidden' name='id' value=<?= $book['id']; ?>>
				<input type='hidden' name='user' value=<?= $this->session->userdata('id'); ?>>
				<textarea name='review' rows='4' cols='20'></textarea>
				<label>Rating:</label>
				<select name='rating'>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
				<input type='submit' value='Submit Review'>
			</form>

		</div>


	</div>
</body>
</html>


	