<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Student_model'); 
	}
	
	public function student_profile($stud_id)
	{
		if(($this->session->userdata('student_is_logged_in')==TRUE) && ($this->session->userdata('stud_id')!="")){
			$view_profile = $this->Student_model->view_profile($stud_id);
			$data = array('view_profile' => $view_profile);
			$this->load->view('header');
			$this->load->view('student/student_profile', $data);
			$this->load->view('footer');

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function current_subjects()
	{
		if(($this->session->userdata('student_is_logged_in')==TRUE) && ($this->session->userdata('stud_id')!="")){
			$stud_id = $this->session->userdata('stud_id');
			$view_profile = $this->Student_model->view_profile($stud_id);
			$view_current_subjects = $this->Student_model->view_current_subjects();
			$part_of_deans_list = $this->Student_model->check_if_part_of_com_candidate($stud_id);

			$data = array(
				'view_profile' => $view_profile,
				'view_current_subjects' => $view_current_subjects,
				'stud_id' => $stud_id
			);

			$this->load->view('header');
				$this->load->view('student/current_subjects', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function student_index()
	{
		if(($this->session->userdata('student_is_logged_in')==TRUE) && ($this->session->userdata('stud_id')!="")){
			$stud_id = $this->session->userdata('stud_id');
			$view_profile = $this->Student_model->view_profile($stud_id);
			$view_all_subjects = $this->Student_model->view_all_subjects();
			$view_students_units = $this->Student_model->view_students_units();
			$ave_grade = $this->Student_model->ave_grade();
			$part_of_deans_list = $this->Student_model->check_if_part_of_com_candidate($stud_id);
			$check_if_part_of_deans_list = $this->Student_model->check_if_part_of_deans_list($stud_id);
			$school_years = $this->Student_model->school_years();
			$view_sub_taken = $this->Student_model->view_sub_taken();
			$sub_taken_ave = $this->Student_model->sub_taken_ave();


			if ($part_of_deans_list) {
				$message = '
					<div class="alert alert-icon alert bg-pink alert-dismissible fade in " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong><i class="material-icons">thumb_up</i> Congratulations!</strong> You are a candidate for becoming an Honor Student.
          </div>
				';
			} else{
				$message = "";
			}
			$data = array(
				'view_profile' => $view_profile,
				'view_all_subjects' => $view_all_subjects,
				'view_students_units' => $view_students_units,
				'ave_grade' => $ave_grade,
				'stud_id' => $stud_id,
				'message' => $message,
				'check_if_part_of_deans_list' => $check_if_part_of_deans_list,
				'school_years' => $school_years,
				'view_sub_taken' => $view_sub_taken,
				'sub_taken_ave' => $sub_taken_ave
			);

			$this->load->view('header');
				$this->load->view('student/student_all_subject', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	//---------------basic-------------
	public function basic_profile($stud_id)
	{
		if(($this->session->userdata('student_is_logged_in')==TRUE) && ($this->session->userdata('stud_id')!="")){
			$profile_view = $this->Student_model->profile_view($stud_id);
			$data = array('profile_view' => $profile_view);
			$this->load->view('header');
			$this->load->view('student/basic_profile', $data);
			$this->load->view('footer');

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function basic_student_index()
	{
		if(($this->session->userdata('student_is_logged_in')==TRUE) && ($this->session->userdata('stud_id')!="")){
			$stud_id = $this->session->userdata('stud_id');
			$profile_view = $this->Student_model->profile_view($stud_id);
			$view_basic_subjects = $this->Student_model->view_basic_subjects();
			$school_yrs = $this->Student_model->school_yrs();
			$avrg_grade = $this->Student_model->avrg_grade();
			$data = array(
				'profile_view' => $profile_view,
				'view_basic_subjects' => $view_basic_subjects,
				'stud_id' => $stud_id,
				'school_yrs' => $school_yrs,
				'avrg_grade' => $avrg_grade
			);

			$this->load->view('header');
				$this->load->view('student/basic_student_index', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function basic_current_subjects()
	{
		if(($this->session->userdata('student_is_logged_in')==TRUE) && ($this->session->userdata('stud_id')!="")){
			$stud_id = $this->session->userdata('stud_id');
			$profile_view = $this->Student_model->profile_view($stud_id);
			$basic_current_subjects = $this->Student_model->basic_current_subjects();

			$data = array(
				'profile_view' => $profile_view,
				'basic_current_subjects' => $basic_current_subjects,
				'stud_id' => $stud_id
			);

			$this->load->view('header');
				$this->load->view('student/basic_current_subjects', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function search_sub(){

		if(($this->session->userdata('student_is_logged_in')==TRUE) && ($this->session->userdata('stud_id')!="")){
				
			$stud_id = $this->session->userdata('stud_id');
			$sy = $this->input->post('sy');
			$profile_view = $this->Student_model->profile_view($stud_id);
			$search_sub = $this->Student_model->search_sub();
			$school_yrs = $this->Student_model->school_yrs();
			$data = array(
				'search_sub' => $search_sub, 
				'profile_view' => $profile_view, 
				'school_yrs' => $school_yrs,
				'sy' => $sy,
				'stud_id' => $stud_id
			);
			$this->load->view('header');
			$this->load->view('student/basic_subjects', $data);
			$this->load->view('footer');
			
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function print_subjects()
	{
		if(($this->session->userdata('student_is_logged_in')==TRUE) && ($this->session->userdata('stud_id')!="")){
			$stud_id = $this->session->userdata('stud_id');
			$view_profile = $this->Student_model->view_profile($stud_id);
			$view_basic_subjects = $this->Student_model->view_basic_subjects();
			$data = array(
				'view_profile' => $view_profile,
				'view_basic_subjects' => $view_basic_subjects,
				'stud_id' => $stud_id
			);
			
			$this->load->view('student/print_subjects', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function print_current_grade()
	{
		if(($this->session->userdata('student_is_logged_in')==TRUE) && ($this->session->userdata('stud_id')!="")){
			$stud_id = $this->session->userdata('stud_id');
			$view_profile = $this->Student_model->view_profile($stud_id);
			$basic_current_subjects = $this->Student_model->basic_current_subjects();
			$data = array(
				'view_profile' => $view_profile,
				'basic_current_subjects' => $basic_current_subjects,
				'stud_id' => $stud_id
			);
			
			$this->load->view('student/print_current_grade', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	//---end Basic
	public function student_search(){

		if(($this->session->userdata('student_is_logged_in')==TRUE) && ($this->session->userdata('stud_id')!="")){
				
				$stud_id = $this->session->userdata('stud_id');
				$sy = $this->input->post('sy');
				$semester = $this->input->post('semester');
				$view_profile = $this->Student_model->view_profile($stud_id);
				$school_years = $this->Student_model->school_years();
				$data = array(
					'view_profile' => $view_profile, 
					'school_years' => $school_years,
					'sy' => $sy
				);

				if ($sy == null && $semester == null) {
					$this->load->view('header');
					$this->load->view('student/student_search');
					$this->load->view('footer');

				} else{
					$view_profile = $this->Student_model->view_profile($stud_id);
					$view_search = $this->Student_model->view_search($semester);
					$school_years = $this->Student_model->school_years();
					$data = array(
						'view_search' => $view_search, 
						'view_profile' => $view_profile, 
						'school_years' => $school_years,
						'sy' => $sy
					);

					$this->load->view('header');
					$this->load->view('student/student_search', $data);
					$this->load->view('footer');
				}

			
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function print_single_stud_grade($stud_id, $sub_id)
	{
		if(($this->session->userdata('student_is_logged_in')==TRUE) && ($this->session->userdata('stud_id')!="")){
			$print_single_stud_grade = $this->Student_model->print_single_stud_grade($stud_id,$sub_id);
			$data = array('print_single_stud_grade' => $print_single_stud_grade);
			


			$this->load->view('student/print_single_stud_grade', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function student_print_subjects()
	{
		if(($this->session->userdata('student_is_logged_in')==TRUE) && ($this->session->userdata('stud_id')!="")){
			$stud_id = $this->session->userdata('stud_id');
			$view_profile = $this->Student_model->view_profile($stud_id);
			$view_all_subjects = $this->Student_model->view_all_subjects();
			$view_students_units = $this->Student_model->view_students_units();
			$ave_grade = $this->Student_model->ave_grade();
			$part_of_deans_list = $this->Student_model->check_if_part_of_com_candidate($stud_id);
			$school_years = $this->Student_model->school_years();
			$view_sub_taken = $this->Student_model->view_sub_taken();
			$sub_taken_ave = $this->Student_model->sub_taken_ave();
			$data = array(
				'view_profile' => $view_profile,
				'view_all_subjects' => $view_all_subjects,
				'view_students_units' => $view_students_units,
				'ave_grade' => $ave_grade,
				'stud_id' => $stud_id,
				'school_years' => $school_years,
				'view_sub_taken' => $view_sub_taken,
				'sub_taken_ave' => $sub_taken_ave
			);
			
			$this->load->view('student/student_print_subjects', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function print_present_sub()
	{
		if(($this->session->userdata('student_is_logged_in')==TRUE) && ($this->session->userdata('stud_id')!="")){
			$stud_id = $this->session->userdata('stud_id');
			$view_profile = $this->Student_model->view_profile($stud_id);
			$view_current_subjects = $this->Student_model->view_current_subjects();
			$data = array(
				'view_profile' => $view_profile,
				'view_current_subjects' => $view_current_subjects,
				'stud_id' => $stud_id
			);
			
			$this->load->view('student/print_present_sub', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function print_current_prelim_grades()
	{
		if(($this->session->userdata('student_is_logged_in')==TRUE) && ($this->session->userdata('stud_id')!="")){
			$stud_id = $this->session->userdata('stud_id');
			$view_profile = $this->Student_model->view_profile($stud_id);
			$current_prelim_grade = $this->Student_model->current_prelim_grade();
			$data = array(
				'view_profile' => $view_profile,
				'current_prelim_grade' => $current_prelim_grade,
				'stud_id' => $stud_id
			);
			
			$this->load->view('student/print_current_prelim_grades', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function print_current_midterm_grades()
	{
		if(($this->session->userdata('student_is_logged_in')==TRUE) && ($this->session->userdata('stud_id')!="")){
			$stud_id = $this->session->userdata('stud_id');
			$view_profile = $this->Student_model->view_profile($stud_id);
			$current_midterm_grade = $this->Student_model->current_midterm_grade();
			$data = array(
				'view_profile' => $view_profile,
				'current_midterm_grade' => $current_midterm_grade,
				'stud_id' => $stud_id
			);
			
			$this->load->view('student/print_current_midterm_grades', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function print_current_sfinal_grades()
	{
		if(($this->session->userdata('student_is_logged_in')==TRUE) && ($this->session->userdata('stud_id')!="")){
			$stud_id = $this->session->userdata('stud_id');
			$view_profile = $this->Student_model->view_profile($stud_id);
			$current_sfinal_grade = $this->Student_model->current_sfinal_grade();
			$data = array(
				'view_profile' => $view_profile,
				'current_sfinal_grade' => $current_sfinal_grade,
				'stud_id' => $stud_id
			);
			
			$this->load->view('student/print_current_sfinal_grades', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function print_current_final_grades()
	{
		if(($this->session->userdata('student_is_logged_in')==TRUE) && ($this->session->userdata('stud_id')!="")){
			$stud_id = $this->session->userdata('stud_id');
			$view_profile = $this->Student_model->view_profile($stud_id);
			$current_final_grade = $this->Student_model->current_final_grade();
			$data = array(
				'view_profile' => $view_profile,
				'current_final_grade' => $current_final_grade,
				'stud_id' => $stud_id
			);
			
			$this->load->view('student/print_current_final_grades', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function student_logout(){
		
		$this->session->sess_destroy();
		$this->session->set_flashdata(
			'msg',
			'<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<b><i class="fa fa-check"></i> Thank You For Visting WEBOGS, God Bless! </b> 
			 </div>'
		  ); 


		redirect("login/index");
	}

	function check_if_part_of_deans_list()
	{
		$datas = $this->Student_model->check_if_part_of_deans_list($stud_id);
		echo json_encode($datas);
	}


	
}
