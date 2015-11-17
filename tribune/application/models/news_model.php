<?php
class News_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_news($slug = FALSE)
	{
	if ($slug === FALSE)
	{
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get('news', 32);
		return $query->result_array();
	}

	$query = $this->db->get_where('news', array('slug' => $slug));
	$this->db->limit(1);
	return $query->row_array();
	}

	public function get_news_comments($slug)
	{
	$this->db->order_by("id", "asc"); 
	$query = $this->db->get_where('news_comments', array('news' => $slug), 1024);
	return $query->result_array();
	}



	public function set_news($filename)
{
	$this->load->helper('url');

	$slug = url_title($this->input->post('title'), 'dash', TRUE);

	date_default_timezone_set('America/New_York');
	$date = date("F j, Y, g:i a"); 

	$data = array(
		'title' => $this->input->post('title'),
		'slug' => $slug,
		'text' => $this->input->post('text'),
		'caption' => $this->input->post('caption'),
		'author' => $this->input->post('author'),
		'category' => $this->input->post('category'),
		'date' => $date,
		'filename' => $filename

	);

	return $this->db->insert('news', $data);
}

	public function set_news_comment($slug)
{

	$data = array(
		'name' => $this->input->post('name'),
		'news' => $slug,
		'text' => $this->input->post('text')
	);

	return $this->db->insert('news_comments', $data);
}

	public function get_news_category($category)
	{
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get_where('news', array('category' => $category), 32);
		return $query->result_array();
	}

}