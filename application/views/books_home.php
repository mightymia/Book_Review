<?php date_default_timezone_set('America/Los_angeles');
?>
<html>
<head>
	<title>Books Home</title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'> 
	<meta charset='utf-8'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script> 
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>
	<link rel="stylesheet" type="text/css" href="/assets/css/BH_style.css">
</head>
<body>
<div class='row'>
	<h3>Welcome <?= $this->session->userdata['name'];?></h3>
	<div id='book_reviews' class="col-md-8">
		<h4>Recent Book Reviews:</h4>
		<?php $i = 0;
			foreach ($reviews as $review) { 
				if (++$i === 3){ break; }?>
				<a href="/book_profile/<?= $review['books_id']; ?>"><?= $review['title']; ?></a>
				<p>Rating: <?php for ($i=0; $i < $review['rating'] ; $i++) { 
						echo '<span class="glyphicon glyphicon-star" aria-hidden="true">';
					} ?> </p>
				<div class="well well-sm">
					<a href="/profile/<?=$review['users_id'];?>"><?= $review['name'];?></a>
					<p>says: <?= $review['review']; ?></p>
					<p>Posted on <?= date("F j, Y", strtotime($review['created_at'])); ?></p>
				</div>
		<?php } ?>
	</div>
	<div class="col-md-4">
		<div class="list-group">
			<h4 id='list_title'>Other Books with Reviews:</h4>
			<?php $i = 0;
			foreach ($list as $book) { 
				if (++$i === 6){ break; }?>
				<a href="/book_profile/<?= $book['id']; ?>" class="list-group-item"><?= $book['title'];?></a>
			<?php } ?>
		</div>
	</div>
</div>
</body>
</html>