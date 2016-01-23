<html>
<head>
	<title>Add Book and Review</title>
	<meta charset='utf-8'>
	<link rel="stylesheet" type="text/css" href="/assets/css/AB_style.css">
</head>
<body>
	<div id='container'>
		<h3>Add a new book and a review</h3>
		<form action='/book_reviews/add_book_review' method='post'>
			<input type='hidden' name='user' value=<?= $this->session->userdata('id');?>>
			<label>Book Title</label>
			<input type='text' name='title'>
			<label>Author:</label>
				<label>Choose from the list:</label>
				<select name="author">
					<?php foreach ($list as $row) { ?>
						<option value='<?= $row['author'];?>'><?= $row['author'];?></option>
					<?php } ?>
				</select>
				<label>Or add a new author</label>
				<input type='text' name='new_author'>
			<label>Cover Image:</label>
				<input type='text' name='image'>
			<label>Review:</label>
			<textarea name='review' rows='4' cols='15'></textarea>
			<label>Rating:</label>
			<select name="rating">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
			<input type='submit' value='Add Book and Review'>
		</form>
	</div>
</body>
</html>