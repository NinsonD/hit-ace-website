<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_header');
        $this->load->model('admin/Model_branch');
    }

	public function index()
	{
		$header['setting'] = $this->Model_header->get_setting_data();

		$data['branch'] = $this->Model_branch->show();

		$this->load->view('admin/view_header',$header);
		$this->load->view('admin/view_branch',$data);
		$this->load->view('admin/view_footer');
	}

	public function add()
	{
		$header['setting'] = $this->Model_header->get_setting_data();

		$data['error'] = '';
		$data['success'] = '';
		$error = '';

		if(isset($_POST['form1'])) {

			$valid = 1;

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error .= validation_errors();
            }

		    if($valid == 1) 
		    {
		        $form_data = array(
					'name'       => $_POST['name'],
					'address'    => $_POST['address'],
					'phone'      => $_POST['phone'],
					'email'      => $_POST['email'],
					'map_iframe' => $_POST['map_iframe'],
					'order_by'   => $_POST['order_by']
		        );
		        $this->Model_branch->add($form_data);

		        $data['success'] = 'Branch is added successfully!';
		    } 
		    else
		    {
		    	$data['error'] = $error;
		    }

            $this->load->view('admin/view_header',$header);
			$this->load->view('admin/view_branch_add',$data);
			$this->load->view('admin/view_footer');
		} else {
            $this->load->view('admin/view_header',$header);
			$this->load->view('admin/view_branch_add',$data);
			$this->load->view('admin/view_footer');
		}
		
	}


	public function edit($id)
	{
		$header['setting'] = $this->Model_header->get_setting_data();

		$data['error'] = '';
		$data['success'] = '';
		$error = '';

		if(isset($_POST['form1'])) {

			$valid = 1;

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error .= validation_errors();
            }

		    if($valid == 1) 
		    {
		    	$form_data = array(
					'name'       => $_POST['name'],
					'address'    => $_POST['address'],
					'phone'      => $_POST['phone'],
					'email'      => $_POST['email'],
					'map_iframe' => $_POST['map_iframe'],
					'order_by'   => $_POST['order_by']
		        );
		        
		        $this->Model_branch->update($id,$form_data);

		        $data['success'] = 'Branch is updated successfully!';
		    } 
		    else
		    {
		    	$data['error'] = $error;
		    }

		    $data['branch'] = $this->Model_branch->getData($id);
            $this->load->view('admin/view_header',$header);
			$this->load->view('admin/view_branch_edit',$data);
			$this->load->view('admin/view_footer');
		} else {
			$data['branch'] = $this->Model_branch->getData($id);
            $this->load->view('admin/view_header',$header);
			$this->load->view('admin/view_branch_edit',$data);
			$this->load->view('admin/view_footer');
		}
		
	}


	public function delete($id)
	{
		$tot = $this->Model_branch->branch_check($id);
		if(!$tot) {
			redirect(base_url().'admin/branch');
			exit;
		}

        $this->Model_branch->delete($id);
        redirect(base_url().'admin/branch');
	}

}