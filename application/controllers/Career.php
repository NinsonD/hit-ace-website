<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends CI_Controller {

	function __construct() 
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_career');
    }

	public function index()
	{
		$header['setting'] = $this->Model_common->get_setting_data();
		$header['page'] = $this->Model_common->get_page_data();
		$header['comment'] = $this->Model_common->get_comment_code();
		$header['social'] = $this->Model_common->get_social_data();
		$header['language'] = $this->Model_common->get_language_data();
		$header['latest_news'] = $this->Model_common->get_latest_news();
		$header['popular_news'] = $this->Model_common->get_popular_news();

		$data['career'] = $this->Model_career->get_all_careers();
		$data['search'] = '';

		if(isset($_GET['search'])) {
			$search_keyword = $_GET['search'];
			$data['career'] = $this->Model_career->search_careers($search_keyword);
			$data['search'] = $search_keyword;
		}

		$this->load->view('view_header', $header);
		$this->load->view('view_career', $data);
		$this->load->view('view_footer', $header);
	}

	public function view($id)
	{
		$header['setting'] = $this->Model_common->get_setting_data();
		$header['page'] = $this->Model_common->get_page_data();
		$header['comment'] = $this->Model_common->get_comment_code();
		$header['social'] = $this->Model_common->get_social_data();
		$header['language'] = $this->Model_common->get_language_data();
		$header['latest_news'] = $this->Model_common->get_latest_news();
		$header['popular_news'] = $this->Model_common->get_popular_news();

		$data['career'] = $this->Model_career->get_career_detail($id);

		if(empty($data['career'])) {
			$this->output->set_status_header(404);
			$this->load->view('errors/html/error_404');
			return;
		}

		$this->load->view('view_header', $header);
		$this->load->view('view_career_detail', $data);
		$this->load->view('view_footer', $header);
	}
}
?>
