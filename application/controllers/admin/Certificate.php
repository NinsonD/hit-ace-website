<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_header');
        $this->load->model('admin/Model_certificate');
    }

	public function index()
	{
		$header['setting'] = $this->Model_header->get_setting_data();

		$data['certificate'] = $this->Model_certificate->show();

		$this->load->view('admin/view_header',$header);
		$this->load->view('admin/view_certificate',$data);
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

			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('description', 'Description', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error .= validation_errors();
            }

            $path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];

		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_header->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error .= 'You must have to upload jpg, jpeg, gif or png file for photo<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error .= 'You must have to select a photo<br>';
		    }

		    if($valid == 1) 
		    {
				$ai_id = $this->Model_certificate->get_auto_increment_id();
				$next_id = $ai_id[0]['Auto_increment'];
				$final_name = 'certificate-'.$next_id.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

		        $form_data = array(
					'title'       => $_POST['title'],
					'image'       => $final_name,
					'description' => $_POST['description'],
					'order_by'    => $_POST['order_by']
		        );
		        $this->Model_certificate->add($form_data);

		        $data['success'] = 'Certificate is added successfully!';
		    } 
		    else
		    {
		    	$data['error'] = $error;
		    }

            $this->load->view('admin/view_header',$header);
			$this->load->view('admin/view_certificate_add',$data);
			$this->load->view('admin/view_footer');
		} else {
            $this->load->view('admin/view_header',$header);
			$this->load->view('admin/view_certificate_add',$data);
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

			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('description', 'Description', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error .= validation_errors();
            }

            $path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];

		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_header->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error .= 'You must have to upload jpg, jpeg, gif or png file for photo<br>';
		        }
		    }

		    if($valid == 1) 
		    {
		    	$data['certificate'] = $this->Model_certificate->getData($id);

		    	if($path == '') {
		    		$form_data = array(
						'title'       => $_POST['title'],
						'description' => $_POST['description'],
						'order_by'    => $_POST['order_by']
			        );
		    	} else {
		    		unlink('./public/uploads/'.$data['certificate']['image']);

					$ai_id = $this->Model_certificate->get_auto_increment_id();
					$next_id = $ai_id[0]['Auto_increment'];
					$final_name = 'certificate-'.$next_id.'.'.$ext;
			        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

			        $form_data = array(
						'title'       => $_POST['title'],
						'image'       => $final_name,
						'description' => $_POST['description'],
						'order_by'    => $_POST['order_by']
			        );
		    	}
		        
		        $this->Model_certificate->update($id,$form_data);

		        $data['success'] = 'Certificate is updated successfully!';
		    } 
		    else
		    {
		    	$data['error'] = $error;
		    }

		    $data['certificate'] = $this->Model_certificate->getData($id);
            $this->load->view('admin/view_header',$header);
			$this->load->view('admin/view_certificate_edit',$data);
			$this->load->view('admin/view_footer');
		} else {
			$data['certificate'] = $this->Model_certificate->getData($id);
            $this->load->view('admin/view_header',$header);
			$this->load->view('admin/view_certificate_edit',$data);
			$this->load->view('admin/view_footer');
		}
		
	}


	public function delete($id)
	{
		$tot = $this->Model_certificate->certificate_check($id);
		if(!$tot) {
			redirect(base_url().'admin/certificate');
			exit;
		}

        $data['certificate'] = $this->Model_certificate->getData($id);
        if($data['certificate']) {
            unlink('./public/uploads/'.$data['certificate']['image']);
        }

        $this->Model_certificate->delete($id);
        redirect(base_url().'admin/certificate');
	}

}