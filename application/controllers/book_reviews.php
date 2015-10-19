<?php
class book_reviews extends CI_Controller
{
	function add_book()
	{
		$this->load->model('book_review');
		if ($this->input->post('new_author'))
		{
			$author = $this->input->post('new_author', TRUE);	
		}
		else
		{
			$author = $this->input->post('author');
		}
		$book_details = array('title' =>$this->input->post('title', TRUE),
					   'author' => $author);

		$this->book_review->add_book($book_details);
		$book = $this->book_review->get_book($book_details['title']);
		return $book;
	}

	function add_review()
	{
		$this->load->model('book_review');
		$review_details = array('id' => $this->input->post('id'), 
								'review' => $this->input->post('review', TRUE),
								'rating' => $this->input->post('rating'),
								'user' => $this->input->post('user'));
		$this->book_review->add_review($review_details);
		redirect('/book_profile/'.$review_details['id']);
	}
	
	function delete_review($id)
	{
		$this->load->model('book_review');
		$this->book_review->delete_review($id);
		redirect('/books');
	}

	function add_book_review()
	{
		$this->load->model('book_review');
		$new_book = $this->add_book();
		$new_info = $this->book_review->get_book_by_id($new_book['book_id']);
		$review_details = array('id' => $new_book['book_id'], 
								'review' => $this->input->post('review', TRUE),
								'rating' => $this->input->post('rating'),
								'user' => $this->input->post('user'));
		$this->book_review->add_review($review_details);
		redirect('/book_profile/'.$review_details['id']);
	}

}
?>