
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('admin_is_logged_in'))
		{
			redirect('admin/admin_index');
		}else if($this->session->userdata('teacher_is_logged_in')){
			redirect('teacher/teacher_all_subjects');
		}else if($this->session->userdata('student_is_logged_in')){
			redirect('student/student_index');
		}else if($this->session->userdata('parent_is_logged_in')){
			redirect('guardian/guardian_index');
		}else{
			$this->load->view('login/login_user');
		}
		
	}

	public function login_password()
	{	
		if($this->session->userdata('admin_is_logged_in')){
			redirect('admin/admin_index');
		}else if($this->session->userdata('teacher_is_logged_in')){
			redirect('teacher/teacher_all_subjects');
		}else if($this->session->userdata('student_is_logged_in')){
			redirect('student/student_index');
		}else if($this->session->userdata('parent_is_logged_in')){
			redirect('guardian/guardian_index');
		}else{
			$this->load->view('login/login_password');
		}
	}

	public function check_login(){

		if($this->session->userdata('admin_is_logged_in'))
		{
			redirect('admin/admin_index');
		}else if($this->session->userdata('teacher_is_logged_in')){
			redirect('teacher/teacher_all_subjects');
		}else if($this->session->userdata('student_is_logged_in')){
			redirect('student/student_index');
		}else if($this->session->userdata('parent_is_logged_in')){
			redirect('guardian/guardian_index');
		}else{
			$login_user = $this->input->post('login_user');

			$check_if_admin = $this->login_model->check_if_admin($login_user);

			if ($check_if_admin) {
				$data['username'] = $this->session->userdata('username');
				$data['name'] = $this->session->userdata('name');
				$data['admin_image'] = $this->session->userdata('admin_image');

				$this->load->view('login/login_password', $data);

			} else {
				
				if(!$check_if_admin){
					$check_if_teacher = $this->login_model->check_if_teacher($login_user);
					if ($check_if_teacher) {
						$data['teacher_id'] = $this->session->userdata('teacher_id');
						$data['teacher_name'] = $this->session->userdata('teacher_name');
						$data['teacher_image'] = $this->session->userdata('teacher_image');

						$this->load->view('login/teacher_login_password', $data);
					} else{
					if(!$check_if_teacher){
					$check_if_parent = $this->login_model->check_if_parent($login_user);
					if ($check_if_parent) {
						$data['parent_id'] = $this->session->userdata('parent_id');
						$data['parent_name'] = $this->session->userdata('parent_name');
						$data['parent_image'] = $this->session->userdata('parent_image');

						$this->load->view('login/parent_login_password', $data);
					} else{
						if (!$check_if_parent) {
							$check_if_student = $this->login_model->check_if_student($login_user);

							if ($check_if_student) {
								$this->session->set_flashdata(
									'alert','
										<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>Welcome!</strong> You are now login.
	                  </div>
									'
									);
								redirect('student/student_index');
							}
						if (!$check_if_student) {
							$check_if_basic_student = $this->login_model->check_if_basic_student($login_user);

							if ($check_if_basic_student) {
								$this->session->set_flashdata(
									'alert','
										<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>Welcome!</strong> You are now login.
	                  </div>
									'
									);
								redirect('student/basic_student_index');
							}
							else{
								$this->session->set_flashdata(
									'alert','
										<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>Sorry!</strong> The Username or ID you entered is invalid..
                    </div>
									'
									);
								redirect('login/index');
							}
						}
						if (!$check_if_basic_student) {
							$check_parent = $this->login_model->check_parent($login_user);

							if ($check_parent) {
								$this->session->set_flashdata(
									'alert','
										<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>Welcome!</strong> You are now login.
	                  </div>
									'
									);
								redirect('student/basic_student_index');
							}
							else{
								$this->session->set_flashdata(
									'alert','
										<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>Sorry!</strong> The Username or ID you entered is invalid..
                    </div>
									'
									);
								redirect('login/index');
							}
						}	 	 
						else{
						$this->session->set_flashdata(
							'alert','
								<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  <strong>Sorry!</strong> The Username or ID you entered is invalid..
                </div>
							'
							);
						redirect('login/index');
							}
						}
					}
				}
			}
		}}}

	}

	public function check_password(){
		if($this->session->userdata('admin_is_logged_in'))
		{
			redirect('admin/admin_index');
		}else if($this->session->userdata('teacher_is_logged_in')){
			redirect('teacher/teacher_all_subjects');
		}else if($this->session->userdata('student_is_logged_in')){
			redirect('student/student_index');
		}else{
			$password = md5($this->input->post('password'));
			$username = $this->session->userdata('username');

			$check_admin = $this->login_model->check_admin($username,$password);

			if ($check_admin) {
				$this->session->set_flashdata(
					'alert','
						<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
             <strong>Welcome Admin!</strong> Have a great day!
            </div>
					'
				);
				redirect('admin/admin_index');
			}else{
				$this->session->set_flashdata(
					'alert','
						<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	              </button>
	             	<strong>Sorry!</strong> The Password you entered is incorrect.
	          </div>
					'
				);
				$data['username'] = $this->session->userdata('username');
				$data['name'] = $this->session->userdata('name');
				$data['admin_image'] = $this->session->userdata('admin_image');

				$this->load->view('login/login_password', $data);
			}
		}
	}
	public function check_teacher_password(){
		if($this->session->userdata('admin_is_logged_in'))
		{
			redirect('admin/admin_index');
		}else if($this->session->userdata('teacher_is_logged_in')){
			redirect('teacher/teacher_all_subjects');
		}else if($this->session->userdata('student_is_logged_in')){
			redirect('student/student_index');
		}else{
			$password = md5($this->input->post('password'));
			$username = $this->session->userdata('teacher_id');

			$check_teacher = $this->login_model->check_teacher($username,$password);

			if ($check_teacher) {
				$this->session->set_flashdata(
					'alert','
						<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              <h3>
                <strong>Welcome Teacher!</strong> Have a great day!
                <i class="fa fa-smile-o"></i>
              </h3>
            </div>
					'
					);
				redirect('teacher/teacher_all_subjects');
			}else{
				$this->session->set_flashdata(
					'alert','
						<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert"
              aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              <strong>Sorry!</strong> The Password you entered is incorrect.
            </div>
					'
					);
				$data['teacher_name'] = $this->session->userdata('teacher_name');
				$data['teacher_image'] = $this->session->userdata('teacher_image');

				$this->load->view('login/teacher_login_password', $data);
			}
		}
	}
	public function check_parent_password(){
		if($this->session->userdata('admin_is_logged_in'))
		{
			redirect('admin/admin_index');
		}else if($this->session->userdata('parent_is_logged_in')){
			redirect('admin/teacher_index');
		}else if($this->session->userdata('student_is_logged_in')){
			redirect('student/student_index');
		}else if($this->session->userdata('parent_is_logged_in')){
			redirect('guardian/guardian_index');
		}else{
			$password = $this->input->post('password');
			$username = $this->session->userdata('parent_id');

			$check_parent = $this->login_model->check_parent($username,$password);

			if ($check_parent) {
				$this->session->set_flashdata(
					'alert','
						<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              <h4>
                <strong>Welcome to Cebu Mary Immaculate College Computerize Grade Viewer!
                <i class="fa fa-smile-o"></i>
              </h4>
            </div>
					'
					);
				redirect('guardian/guardian_index');
			}else{
				$this->session->set_flashdata(
					'alert','
						<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert"
              aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              <strong>Sorry!</strong> The Password you entered is incorrect.
            </div>
					'
					);
				$data['parent_name'] = $this->session->userdata('parent_name');
				$data['parent_image'] = $this->session->userdata('parent_image');

				$this->load->view('login/parent_login_password', $data);
			}
		}
	}
	
}
