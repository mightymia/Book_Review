<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('homepage');	
	}

	function books_home()
	{
		$this->load->model('book_review');
		$reviews = $this->book_review->get_all_reviews();
		$list = $this->book_review->book_list();
		$this->load->view('header');
		$this->load->view('books_home', array('reviews' => $reviews, 'list' => $list));
	}

	function user_reviews($id)
	{
		$this->load->model('user');
		$user = $this->user->get_user_by_id($id);
		$this->load->model('book_review');
		$reviews = $this->book_review->get_reviews_by_user($id);
		$this->load->view('header');
		$this->load->view('user_reviews', array('user' => $user, 'reviews' => $reviews));	
	}

	function add_book()
	{
		$this->load->model('book_review');
		$list = $this->book_review->author_list();
		$this->load->view('header');
		$this->load->view('add_book', array('list' => $list));	
	}

	function book_profile($id)
	{
		$this->load->model('book_review');
		$book = $this->book_review->get_book_by_id($id);
		$reviews = $this->book_review->get_reviews_by_book($id);
		$this->load->view('header');
		$this->load->view('book_profile', array('book' => $book, 'reviews' => $reviews));	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */