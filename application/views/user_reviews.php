
<html>
<head>
	<title>User Reviews</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/UR_style.css">
	<meta charset='utf-8'>
</head>
<body>
	<div id='container'>
		<h3>UserName: <?= $user['username']; ?></h3>
		<p>Name: <?= $user['name'];?></p>
		<p>Email: <?= $user['email'];?></p>
		<p>Total Reviews: <?= $user['COUNT(review)'];?></p>
		<div id='review_list'>
			<h4>Posted Reviews on the following books:</h4>
			<ul>
				<?php foreach ($reviews as $review) { ?>
					<li><a href="/book_profile/<?= $review['books_id'];?>"><?= $review['title'];?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</body>
</html>