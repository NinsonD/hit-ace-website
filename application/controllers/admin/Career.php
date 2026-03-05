<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_header');
        $this->load->model('admin/Model_career');
    }

	public function index()
	{
		$data['error'] = '';
		$data['success'] = '';

		$header['setting'] = $this->Model_header->get_setting_data();
		$data['career'] = $this->Model_career->get_all_careers();

		$this->load->view('admin/view_header', $header);
		$this->load->view('admin/view_career', $data);
		$this->load->view('admin/view_footer');
	}

	public function add()
	{
		$data['error'] = '';
		$data['success'] = '';

		$header['setting'] = $this->Model_header->get_setting_data();

		if(isset($_POST['form_career'])) {
			$valid = 1;

			if(PROJECT_MODE == 0) {
				$valid = 0;
				$data['error'] = PROJECT_NOTIFICATION;
			}

			if($valid == 1) {
				$form_data = array(
					'position_name' => $_POST['position_name'],
					'department' => $_POST['department'],
					'experience_required' => $_POST['experience_required'],
					'job_description' => $_POST['job_description'],
					'salary_range' => $_POST['salary_range'],
					'job_type' => $_POST['job_type'],
					'location' => $_POST['location'],
					'number_of_positions' => $_POST['number_of_positions'],
					'status' => $_POST['status']
				);
				$this->Model_career->insert($form_data);
				$data['success'] = 'Career position added successfully!';
				redirect(base_url().'admin/career');
			}
		}

		$this->load->view('admin/view_header', $header);
		$this->load->view('admin/view_career_add', $data);
		$this->load->view('admin/view_footer');
	}

	public function edit($id)
	{
		$data['error'] = '';
		$data['success'] = '';

		$header['setting'] = $this->Model_header->get_setting_data();
		$data['career'] = $this->Model_career->get_career_by_id($id);

		if(empty($data['career'])) {
			redirect(base_url().'admin/career');
		}

		if(isset($_POST['form_career_edit'])) {
			$valid = 1;

			if(PROJECT_MODE == 0) {
				$valid = 0;
				$data['error'] = PROJECT_NOTIFICATION;
			}

			if($valid == 1) {
				$form_data = array(
					'position_name' => $_POST['position_name'],
					'department' => $_POST['department'],
					'experience_required' => $_POST['experience_required'],
					'job_description' => $_POST['job_description'],
					'salary_range' => $_POST['salary_range'],
					'job_type' => $_POST['job_type'],
					'location' => $_POST['location'],
					'number_of_positions' => $_POST['number_of_positions'],
					'status' => $_POST['status']
				);
				$this->Model_career->update($id, $form_data);
				$data['success'] = 'Career position updated successfully!';
				$data['career'] = $this->Model_career->get_career_by_id($id);
			}
		}

		$this->load->view('admin/view_header', $header);
		$this->load->view('admin/view_career_edit', $data);
		$this->load->view('admin/view_footer');
	}

	public function delete($id)
	{
		if(PROJECT_MODE == 0) {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->Model_career->delete($id);
		redirect(base_url().'admin/career');
	}
}
?>
