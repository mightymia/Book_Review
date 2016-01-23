<?php
class book_review extends CI_Model
{
	function get_book($title)
	{
		return $this->db->query('SELECT id as book_id, title, author FROM books WHERE title = ?', array($title))->row_array();
	}

	function get_book_by_id($id)
	{
		return $this->db->query('SELECT * FROM books WHERE id = ?', array($id))->row_array();
	}

	function book_list()
	{
		return $this->db->query('SELECT title, id FROM books ORDER BY created_at DESC')->result_array();
	}

	function add_book($book)
	{
		$query = "INSERT INTO books (title, author, image, created_at, updated_at) VALUES (?, ?, ?, now(), now())";
		$values = array($book['title'], $book['author'], $book['image']);
		return $this->db->query($query, $values);
	}

	function add_review($review)
	{
		$query = "INSERT INTO reviews (books_id, review, rating, users_id, created_at, updated_at) VALUES (?, ?, ?, ?, now(), now())";
		$values = array($review['id'], $review['review'], $review['rating'], $review['user']);
		return $this->db->query($query, $values);
	}

	function get_reviews_by_book($book_id)
	{
		$query = "SELECT reviews.id, review, rating, reviews.created_at, users_id, users.name FROM reviews
				  LEFT JOIN books
				  ON reviews.books_id = books.id
				  LEFT JOIN users
				  ON reviews.users_id = users.id
				  WHERE reviews.books_id = ?
				  ORDER BY reviews.created_at DESC";
		$value = $book_id;
		return $this->db->query($query, $value)->result_array();
	}

	function get_reviews_by_user($id)
	{
		$query = 'SELECT title, books_id FROM books
					LEFT JOIN reviews
					ON books.id = reviews.books_id
					LEFT JOIN users
					ON reviews.users_id = users.id
					WHERE users.id = ?';
		$value = $id;
		return $this->db->query($query, $value)->result_array();
	}

	function delete_review($id)
	{
		$query = "DELETE FROM reviews WHERE id = ?";
		$value = $id;
		return $this->db->query($query, $value);
	}

	function get_all_reviews()
	{
		return $this->db->query("SELECT title, reviews.books_id, users_id, users.name, rating, reviews.created_at, review 
									 FROM reviews
									 LEFT JOIN books
									 ON reviews.books_id = books.id
									 LEFT JOIN users
									 ON reviews.users_id = users.id
									 ORDER BY reviews.created_at DESC")->result_array();
	}
	function author_list()
	{
		return $this->db->query('SELECT DISTINCT author FROM books')->result_array();
	}

}
?>