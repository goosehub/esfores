<?php
//Codeigniter Setup
class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index()
	{
//Get news index
		$data['news'] = $this->news_model->get_news();
//Page title
		$data['title'] = 'News';
//Index View
		$this->load->view('templates/header', $data);
		$this->load->view('news/index');
		$this->load->view('templates/ad');
		$this->load->view('templates/footer');
	}

	public function view($slug)
	{
//Codeigniter help
		$this->load->helper('form');
		$this->load->library('form_validation');
//Get news and comments
		$data['news_item'] = $this->news_model->get_news($slug);
		$data['comments'] = $this->news_model->get_news_comments($slug);
//Requirements for comments
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[1]|max_length[32]');
		$this->form_validation->set_rules('text', 'text', 'required|min_length[1]|max_length[2048]');

		if (empty($data['news_item']))
		{
//404
			show_404();
		}
//Title
		$data['title'] = $data['news_item']['title'];
//Slug Variable Load
		$slug = $data['news_item']['slug'];

		if ($this->form_validation->run() === FALSE)
		{
//Load article view
		$this->load->view('templates/header', $data);
		$this->load->view('news/view');
		$this->load->view('templates/ad');
		$this->load->view('templates/footer');
		}
		else
		{
//Enter Comments
			$this->news_model->set_news_comment($slug);
//Load index data
			$data['news'] = $this->news_model->get_news();
//Load index page title
			$data['title'] = 'News';
//Load index
			$this->load->view('templates/header', $data);
			$this->load->view('news/index');
			$this->load->view('templates/ad');
			$this->load->view('templates/footer');	
		}
	}

// Category Functions
		public function s4s()
	{
// Category
		$category = 'S4S';
// Get the index data
		$data['news'] = $this->news_model->get_news_category($category);
// Page Title
		$data['title'] = 'S4S News';
//Load index
		$this->load->view('templates/header', $data);
		$this->load->view('news/s4s', $data);
		$this->load->view('templates/ad');
		$this->load->view('templates/footer');
	}
// functions can't start with a number, so fourchan instead of 4chan
		public function fourchan()
	{
		$category = '4chan';
		$data['news'] = $this->news_model->get_news_category($category);
		$data['title'] = '4Chan News';

		$this->load->view('templates/header', $data);
		$this->load->view('news/4chan', $data);
		$this->load->view('templates/ad');
		$this->load->view('templates/footer');
	}
		public function www()
	{
		$category = 'World Wide Web';
		$data['news'] = $this->news_model->get_news_category($category);
		$data['title'] = 'World Wide Web News';

		$this->load->view('templates/header', $data);
		$this->load->view('news/www', $data);
		$this->load->view('templates/ad');
		$this->load->view('templates/footer');
	}
		public function opinion()
	{
		$category = 'Opinion';
		$data['news'] = $this->news_model->get_news_category($category);
		$data['title'] = 'Opinion';

		$this->load->view('templates/header', $data);
		$this->load->view('news/opinion', $data);
		$this->load->view('templates/ad');
		$this->load->view('templates/footer');
	}
		public function advice()
	{
		$category = 'Advice';
		$data['news'] = $this->news_model->get_news_category($category);
		$data['title'] = 'Advice';

		$this->load->view('templates/header', $data);
		$this->load->view('news/advice', $data);
		$this->load->view('templates/ad');
		$this->load->view('templates/footer');
	}
		public function reviews()
	{
		$category = 'Reviews';
		$data['news'] = $this->news_model->get_news_category($category);
		$data['title'] = 'Reviews';

		$this->load->view('templates/header', $data);
		$this->load->view('news/reviews', $data);
		$this->load->view('templates/ad');
		$this->load->view('templates/footer');
	}
		public function interviews()
	{
		$category = 'Interviews';
		$data['news'] = $this->news_model->get_news_category($category);
		$data['title'] = 'Interviews';

		$this->load->view('templates/header', $data);
		$this->load->view('news/interviews', $data);
		$this->load->view('templates/ad');
		$this->load->view('templates/footer');
	}
		public function investigations()
	{
		$category = 'Investigations';
		$data['news'] = $this->news_model->get_news_category($category);
		$data['title'] = 'Investigations';

		$this->load->view('templates/header', $data);
		$this->load->view('news/investigations', $data);
		$this->load->view('templates/ad');
		$this->load->view('templates/footer');
	}
		public function showcase()
	{
		$category = 'Showcase';
		$data['news'] = $this->news_model->get_news_category($category);
		$data['title'] = 'Showcase';

		$this->load->view('templates/header', $data);
		$this->load->view('news/showcase', $data);
		$this->load->view('templates/ad');
		$this->load->view('templates/footer');
	}

// Contribute page function
	public function contribute()
	{
		$data['title'] = 'Contribute';

// Error warnings
		$data['errorCode'] = '';
		$data['errorExists'] = '';
		$data['errorInvalid'] = '';
		$data['uploadName'] = '';
		$data['uploadType'] = '';
		$data['uploadSize'] = '';
		$data['uploadFilename'] = '';
		$data['uploadLocation'] = '';

// Form Validation
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'title', 'required|min_length[1]|max_length[48]');
		$this->form_validation->set_rules('text', 'body', 'required|min_length[1]|max_length[64000]');
		$this->form_validation->set_rules('caption', 'caption', 'required|min_length[1]|max_length[256]');
		// $this->form_validation->set_rules('userfile', 'cover image', 'required');


//Image upload
	if(
		//Required to detect image submission
		$_SERVER['REQUEST_METHOD'] == 'POST'
		//Required to validate forms before posting
		&& $this->form_validation->run() === TRUE
		//Required to prevent non image files causing php errors
		&& ! empty($_FILES["userfile"]["tmp_name"]))
		{
// Image info
		$image_info = getimagesize($_FILES["userfile"]["tmp_name"]);
		$image_width = $image_info[0];
		$image_height = $image_info[1];
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["userfile"]["name"]);
		$extension = end($temp);

//Validate
		if ((($_FILES["userfile"]["type"] == "image/gif")
		|| ($_FILES["userfile"]["type"] == "image/jpeg")
		|| ($_FILES["userfile"]["type"] == "image/jpg")
		|| ($_FILES["userfile"]["type"] == "image/pjpeg")
		|| ($_FILES["userfile"]["type"] == "image/x-png")
		|| ($_FILES["userfile"]["type"] == "image/png"))
		&& ($_FILES["userfile"]["size"] < 1600000)
		&& ($image_height < 3200)
		&& ($image_width < 3200)
		&& ($image_height > 200)
		&& ($image_width > 200)
		&& in_array($extension, $allowedExts)) {	
// Error check
		  if ($_FILES["userfile"]["error"] > 0) {
		    $data['errorCode'] = "Return Code: " . $_FILES["userfile"]["error"] . "<br>";
		  } else {
//File info stored
		    $data['uploadName'] = "Upload: " . $_FILES["userfile"]["name"] . "<br>";
		    $data['uploadType'] = "Type: " . $_FILES["userfile"]["type"] . "<br>";
		    $data['uploadSize'] = "Size: " . ($_FILES["userfile"]["size"] / 1024) . " kB<br>";
		    $data['uploadFilename'] = "Temp file: " . $_FILES["userfile"]["tmp_name"] . "<br>";
// Rename file to UNIX time
	        $filename = time().'.'.$extension;
// Move File
		      move_uploaded_file($_FILES["userfile"]["tmp_name"],
		      "../tribune/images/" . $filename);
		      $data['uploadLocation'] = "Stored in: " . "/tribune/images/" . $filename;
// Insert into model
		      $this->news_model->set_news($filename);
//Load success view
		      $this->load->view('templates/header', $data);
		      $this->load->view('news/success');
			  $this->load->view('templates/ad');
		      $this->load->view('templates/footer');	
		  }
		}
		else
		{
// General error Reporting
			$data['errorInvalid'] = 'Invalid File Size. 200 by 200 pixels is the minimum. 3200 by 3200 is the maximum.';
			$this->load->view('templates/header', $data);
			$this->load->view('news/contribute');
			$this->load->view('templates/footer');
		}
	}
// Specifically for reporting non image file types that are not accepted
// Could potentially cause a wrong error report, but have need seen it under testing
	else if($_SERVER['REQUEST_METHOD'] == 'POST'
		&& ! isset($_FILES['userfile']) )
	{
		$data['errorInvalid'] = 'Invalid File Type. JPG, PNG, and GIF only';
	}
		//Form validation and view loading
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('news/contribute');
			$this->load->view('templates/footer');
		}
	}

}