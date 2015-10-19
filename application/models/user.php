<?php
class User extends CI_Model
{
	function get_user($email)
	{
		return $this->db->query('SELECT * FROM users WHERE email = ?', array($email))->row_array();
	}

	function insert_new_user($user)
	{
		$query = "INSERT INTO users (name, email, password, username, created_at, updated_at) VALUES (?,?,?,?, now(), now())";
		$values = array($user['name'], $user['email'], $user['password'], $user['username']);
		return $this->db->query($query, $values);
	}

	function get_user_by_id($id)
	{
		$query = ('SELECT users.id, name, email, username, COUNT(review) FROM users
					LEFT JOIN reviews
					ON users.id = reviews.users_id 
					WHERE users.id = ?');
		$value = $id;
		return $this->db->query($query, $value)->row_array();
	}











}
?>