<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Teacher_model'); 
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function curr_sub()
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$teacher_id = $this->session->userdata('teacher_id');
			$time_frame = $this->Teacher_model->get_time_frame();
			$view_profile = $this->Teacher_model->view_profile($teacher_id);
			$view_subjects = $this->Teacher_model->view_subjects();
			$view_current_basic_subjects = $this->Teacher_model->view_current_basic_subjects();
			$data = array(
				'time_frame'	=> $time_frame,
				'view_profile' => $view_profile,
				'view_subjects' => $view_subjects,
				'view_current_basic_subjects' => $view_current_basic_subjects
			);

			$this->load->view('header');
			$this->load->view('teacher/curr_sub', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	public function teacher_all_subjects()
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$teacher_id = $this->session->userdata('teacher_id');
			$time_frame = $this->Teacher_model->get_time_frame();
			$basic_time_frame = $this->Teacher_model->basic_time_frame();
			$view_profile = $this->Teacher_model->view_profile($teacher_id);
			$view_all_subjects = $this->Teacher_model->view_all_subjects();
			$view_basic_subjects = $this->Teacher_model->view_basic_subjects();
			$school_years = $this->Teacher_model->school_years();
			$data = array(
				'time_frame' => $time_frame,
				'basic_time_frame' => $basic_time_frame,
				'view_profile' => $view_profile,
				'view_all_subjects' => $view_all_subjects,
				'view_basic_subjects' => $view_basic_subjects,
				'school_years' => $school_years
			);

			$this->load->view('header');
			$this->load->view('teacher/teacher_all_subjects', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	public function add_grade()
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$teacher_id = $this->session->userdata('teacher_id');
			$view_profile = $this->Teacher_model->view_profile($teacher_id);
			$view_subjects = $this->Teacher_model->view_subjects();
			$data = array(
				'view_profile' => $view_profile,
				'view_subjects' => $view_subjects
			);

			$this->load->view('header');
			$this->load->view('teacher/add_grade', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}

	public function teacher_profile($teacher_id)
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$view_profile = $this->Teacher_model->view_profile($teacher_id);
			$data = array('view_profile' => $view_profile);

			$this->load->view('header');
				$this->load->view('teacher/teacher_profile', $data);
			$this->load->view('footer');

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}

	public function update_teacher_pass($teacher_id){
		
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){

			$this->form_validation->set_rules('teacher_pass','Password', 'trim|required');
			$this->form_validation->set_rules('confirm_teacher_pass','Confirm Password', 'trim|required|matches[teacher_pass]');

			if($this->form_validation->run() == TRUE) //didnt validate
					{
					$this->Teacher_model->update_teacher_pass($teacher_id); 
					$this->session->set_flashdata(
	  				'msg','
						<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              <i class="fa fa-check"></i>
              <strong>Success!</strong> Teacher password was successfully changed.
            </div>
					 '
					); 
				  $data = array(
						"teacher_pass" => $this->input->post('teacher_pass')
					);
					$this->session->set_userdata($data);
					redirect("teacher/teacher_profile/".$teacher_id);	
				}else{
					$this->session->set_flashdata(
							'msg_acc',
							'<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <i class="fa fa-times"></i>
                <strong>Error!</strong> Password did not match.
              </div>'
							);
						redirect("teacher/teacher_profile/".$teacher_id);		
				}
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}

	public function teacher_search(){

		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
				
				$sy = $this->input->post('sy');
				$semester = $this->input->post('semester');
				$teacher_id = $this->session->userdata('teacher_id');
				$view_profile = $this->Teacher_model->view_profile($teacher_id);
				$school_years = $this->Teacher_model->school_years();
				$data = array(
					'view_profile' => $view_profile,
					'school_years' => $school_years,
					'sy' => $sy
				);

				if ($sy == null && $semester == null) {
					$this->load->view('header');
					$this->load->view('teacher/teacher_search');
					$this->load->view('footer');

				} else{
					$view_profile = $this->Teacher_model->view_profile($teacher_id);
					$view_search = $this->Teacher_model->view_search($semester);
					$view_searchss = $this->Teacher_model->view_searchss();
					$school_years = $this->Teacher_model->school_years();
					$data = array(
						'view_search' => $view_search, 
						'view_searchss' => $view_searchss, 
						'view_profile' => $view_profile, 
						'school_years' => $school_years,
						'sy' => $sy
					);

					$this->load->view('header');
					$this->load->view('teacher/teacher_search', $data);
					$this->load->view('footer');
				}

			
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	
	public function teacher_view_student($sub_id, $sub_name)
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$teacher_id = $this->session->userdata('teacher_id');
			$view_profile = $this->Teacher_model->view_profile($teacher_id);
			$view_student = $this->Teacher_model->view_student();
			$view_students_of_this_subject = $this->Teacher_model->view_students_of_this_subject($sub_id);
			$join_grades = $this->Teacher_model->join_Grades($sub_id);
			$view_subject = $this->Teacher_model->view_subject($sub_id);
			$time_frame = $this->Teacher_model->get_time_frame();
			$term_avail = $this->Teacher_model->term_avail();
			$data = array(
				'view_profile' => $view_profile,
				'view_students_of_this_subject' => $view_students_of_this_subject, 
				'sub_id' => $sub_id, 
				'view_student' => $view_student,
				'view_subject' => $view_subject,
				'sub_name' => urldecode($sub_name),	
				'join_grades' => $join_grades,
				'time_frame' => $time_frame,
				'term_avail' => $term_avail
			);

			$this->load->view('header');					
			$this->load->view('teacher/teacher_view_student', $data);
			$this->load->view('footer');

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}public function view_basic_students($basic_subject_id, $sub_name)
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$teacher_id = $this->session->userdata('teacher_id');
			$view_profile = $this->Teacher_model->view_profile($teacher_id);
			$basic_students = $this->Teacher_model->basic_students();
			$students_of_this_subject = $this->Teacher_model->students_of_this_subject($basic_subject_id);
			$basic_grades = $this->Teacher_model->basic_grades($basic_subject_id);
			$basic_subject = $this->Teacher_model->basic_subject($basic_subject_id);
			$time_frame = $this->Teacher_model->get_time_frame();
			$basic_time_frame = $this->Teacher_model->basic_time_frame();
			$term_avail = $this->Teacher_model->term_avail();
			$data = array(
				'view_profile' => $view_profile,
				'students_of_this_subject' => $students_of_this_subject, 
				'basic_subject_id' => $basic_subject_id, 
				'basic_students' => $basic_students,
				'basic_subject' => $basic_subject,
				'sub_name' => urldecode($sub_name),	
				'basic_grades' => $basic_grades,
				'time_frame' => $time_frame,
				'basic_time_frame' => $basic_time_frame,
				'term_avail' => $term_avail
			);

			$this->load->view('header');					
			$this->load->view('teacher/view_basic_students', $data);
			$this->load->view('footer');

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}

	public function add_student_to_subject_validation($stud_id, $sub_id, $sub_name){

		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
					$sub_name = urldecode($sub_name); 
					$this->Teacher_model->add_grade($stud_id, $sub_id); 
					$this->Teacher_model->add_student_to_subject($stud_id, $sub_id); 
					$this->session->set_flashdata(
	  				'msg',
							'<div class="alert alert-success">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<b><i class="fa fa-check"></i> Success: </b> New Student successfully added to this subject.
							</div>
						'
				  ); 
					redirect("teacher/teacher_view_student/".$sub_id."/".$sub_name);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	public function add_student_to_subject($stud_id, $basic_subject_id, $sub_name){

		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
					$sub_name = urldecode($sub_name); 
					$this->Teacher_model->add_basic_grade($stud_id, $basic_subject_id); 
					$this->Teacher_model->add_basic_student_to_subject($stud_id, $basic_subject_id); 
					$this->session->set_flashdata(
	  				'msg',
							'<div class="alert alert-success">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<b><i class="fa fa-check"></i> Success: </b> New Student successfully added to this subject.
							</div>
						'
				  ); 
					redirect("teacher/view_basic_students/".$basic_subject_id."/".$sub_name);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}

	public function delete_subjects_student($stud_id='',$sub_id='', $sub_name){
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
		
			$this->Teacher_model->delete_subjects_student($stud_id, $sub_id);
			$this->session->set_flashdata(
  				'msg','
					<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              <i class="fa fa-check"></i>
              <strong>Deleted!</strong> The Student was successfully deleted from this Subject.
          </div>
				 '
			  ); 
				redirect("teacher/teacher_view_student/".$sub_id."/".$sub_name);
			} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	public function delete_student_to_subject($stud_id='',$basic_subject_id='', $sub_name){
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
		
			$this->Teacher_model->delete_student_to_subject($stud_id, $basic_subject_id);
			$this->session->set_flashdata(
  				'msg','
					<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              <i class="fa fa-check"></i>
              <strong>Deleted!</strong> The Student was successfully deleted from this Subject.
          </div>
				 '
			  ); 
				redirect("teacher/view_basic_students/".$basic_subject_id."/".$sub_name);
			} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	
	public function update_student_grade($stud_id, $sub_id, $sub_name, $cl_qualified){
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){

			$this->Teacher_model->update_student_grade($stud_id, $sub_id, $sub_name, $cl_qualified); 
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<b><i class="fa fa-check"></i> Success! </b> Grade was Succesfully Updated.
				 </div>'
			); 
			redirect("teacher/teacher_view_student/".$sub_id."/".$sub_name);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	public function update_basic_grade($stud_id, $basic_subject_id, $sub_name){
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){

			$this->Teacher_model->update_basic_grade($stud_id, $basic_subject_id, $sub_name); 
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<b><i class="fa fa-check"></i> Success! </b> Grade was Succesfully Updated.
				 </div>'
			); 
			redirect("teacher/view_basic_students/".$basic_subject_id."/".$sub_name);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}

	public function teacher_print_subjects($teacher_id)
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$view_curr_subjects = $this->Teacher_model->view_curr_subjects($teacher_id);
			$view_current_basic_subjects = $this->Teacher_model->view_current_basic_subjects();
			$data = array(
				'view_curr_subjects' => $view_curr_subjects,
				'view_current_basic_subjects' => $view_current_basic_subjects
			);
			
			$this->load->view('teacher/teacher_print_subjects', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	public function teacher_print_all_subjects($teacher_id)
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$view_subjects = $this->Teacher_model->view_subjects($teacher_id);
			$data = array('view_subjects' => $view_subjects);
			
			$this->load->view('teacher/teacher_print_all_subjects', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	public function print_students_under_this_sub($teacher_id,$sub_id,$sub_name)
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$teacher_id = $this->session->userdata('teacher_id');
			$view_student = $this->Teacher_model->view_student();
			$view_students_of_this_subject = $this->Teacher_model->view_students_of_this_subject($sub_id);
			$join_grades = $this->Teacher_model->join_Grades($sub_id);
			$view_subject = $this->Teacher_model->view_subject($sub_id);
			$data = array(
				'view_students_of_this_subject' => $view_students_of_this_subject, 
				'sub_id' => $sub_id, 
				'view_student' => $view_student,
				'view_subject' => $view_subject,
				'sub_name' => urldecode($sub_name),	
				'join_grades'	=> $join_grades
			);
			
			$this->load->view('teacher/print_students_under_this_sub', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	public function print_basic_students_under_this_sub($teacher_id,$sub_id,$sub_name)
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$teacher_id = $this->session->userdata('teacher_id');
			$view_student = $this->Teacher_model->view_student();
			$view_students_of_this_subject = $this->Teacher_model->view_students_of_this_subject($sub_id);
			$join_basic_Grades = $this->Teacher_model->join_basic_Grades($sub_id);
			$view_subject = $this->Teacher_model->view_subject($sub_id);
			$data = array(
				'view_students_of_this_subject' => $view_students_of_this_subject, 
				'sub_id' => $sub_id, 
				'view_student' => $view_student,
				'view_subject' => $view_subject,
				'sub_name' => urldecode($sub_name),	
				'join_basic_Grades'	=> $join_basic_Grades
			);
			
			$this->load->view('teacher/print_basic_students_under_this_sub', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	public function print_current_prelim_grades($teacher_id,$sub_id,$sub_name)
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$teacher_id = $this->session->userdata('teacher_id');
			$view_student = $this->Teacher_model->view_student();
			$view_students_of_this_subject = $this->Teacher_model->view_students_of_this_subject($sub_id);
			$prelim_grades = $this->Teacher_model->prelim_grades($sub_id);
			$view_subject = $this->Teacher_model->view_subject($sub_id);
			$data = array(
				'view_students_of_this_subject' => $view_students_of_this_subject, 
				'sub_id' => $sub_id, 
				'view_student' => $view_student,
				'view_subject' => $view_subject,
				'sub_name' => urldecode($sub_name),	
				'prelim_grades'	=> $prelim_grades
			);
			
			$this->load->view('teacher/print_current_prelim_grades', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	public function print_current_first_grading_grades($teacher_id,$basic_subject_id,$sub_name)
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$teacher_id = $this->session->userdata('teacher_id');
			$first_grading_grades = $this->Teacher_model->first_grading_grades($basic_subject_id);
			$data = array(
				'basic_subject_id' => $basic_subject_id, 
				'sub_name' => urldecode($sub_name),	
				'first_grading_grades'	=> $first_grading_grades
			);
			
			$this->load->view('teacher/print_current_first_grading_grades', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	public function print_current_second_grading_grades($teacher_id,$basic_subject_id,$sub_name)
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$teacher_id = $this->session->userdata('teacher_id');
			$second_grading_grades = $this->Teacher_model->second_grading_grades($basic_subject_id);
			$data = array(
				'basic_subject_id' => $basic_subject_id, 
				'sub_name' => urldecode($sub_name),	
				'second_grading_grades'	=> $second_grading_grades
			);
			
			$this->load->view('teacher/print_current_second_grading_grades', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	public function print_current_third_grading_grades($teacher_id,$basic_subject_id,$sub_name)
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$teacher_id = $this->session->userdata('teacher_id');
			$third_grading_grades = $this->Teacher_model->third_grading_grades($basic_subject_id);
			$data = array(
				'basic_subject_id' => $basic_subject_id, 
				'sub_name' => urldecode($sub_name),	
				'third_grading_grades'	=> $third_grading_grades
			);
			
			$this->load->view('teacher/print_current_third_grading_grades', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	public function print_current_fourth_grading_grades($teacher_id,$basic_subject_id,$sub_name)
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$teacher_id = $this->session->userdata('teacher_id');
			$fourth_grading_grades = $this->Teacher_model->fourth_grading_grades($basic_subject_id);
			$data = array(
				'basic_subject_id' => $basic_subject_id, 
				'sub_name' => urldecode($sub_name),	
				'fourth_grading_grades'	=> $fourth_grading_grades
			);
			
			$this->load->view('teacher/print_current_fourth_grading_grades', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	public function print_current_midterm_grades($teacher_id,$sub_id,$sub_name)
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$teacher_id = $this->session->userdata('teacher_id');
			$view_student = $this->Teacher_model->view_student();
			$view_students_of_this_subject = $this->Teacher_model->view_students_of_this_subject($sub_id);
			$midterm_grades = $this->Teacher_model->midterm_grades($sub_id);
			$view_subject = $this->Teacher_model->view_subject($sub_id);
			$data = array(
				'view_students_of_this_subject' => $view_students_of_this_subject, 
				'sub_id' => $sub_id, 
				'view_student' => $view_student,
				'view_subject' => $view_subject,
				'sub_name' => urldecode($sub_name),	
				'midterm_grades'	=> $midterm_grades
			);
			
			$this->load->view('teacher/print_current_midterm_grades', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	public function print_current_semi_final_grades($teacher_id,$sub_id,$sub_name)
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$teacher_id = $this->session->userdata('teacher_id');
			$view_student = $this->Teacher_model->view_student();
			$view_students_of_this_subject = $this->Teacher_model->view_students_of_this_subject($sub_id);
			$semi_final_grades = $this->Teacher_model->semi_final_grades($sub_id);
			$view_subject = $this->Teacher_model->view_subject($sub_id);
			$data = array(
				'view_students_of_this_subject' => $view_students_of_this_subject, 
				'sub_id' => $sub_id, 
				'view_student' => $view_student,
				'view_subject' => $view_subject,
				'sub_name' => urldecode($sub_name),	
				'semi_final_grades'	=> $semi_final_grades
			);
			
			$this->load->view('teacher/print_current_semi_final_grades', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	public function print_current_final_grades($teacher_id,$sub_id,$sub_name)
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$teacher_id = $this->session->userdata('teacher_id');
			$view_student = $this->Teacher_model->view_student();
			$view_students_of_this_subject = $this->Teacher_model->view_students_of_this_subject($sub_id);
			$final_grades = $this->Teacher_model->final_grades($sub_id);
			$view_subject = $this->Teacher_model->view_subject($sub_id);
			$data = array(
				'view_students_of_this_subject' => $view_students_of_this_subject, 
				'sub_id' => $sub_id, 
				'view_student' => $view_student,
				'view_subject' => $view_subject,
				'sub_name' => urldecode($sub_name),	
				'final_grades'	=> $final_grades
			);
			
			$this->load->view('teacher/print_current_final_grades', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}

	public function print_single_stud_grade($sub_id, $sub_name, $stud_id)
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$view_student = $this->Teacher_model->view_student();
			$view_students_of_this_subject = $this->Teacher_model->view_students_of_this_subject($sub_id);
			$print_single_stud_grade = $this->Teacher_model->print_single_stud_grade($sub_id, $sub_name, $stud_id);
			$view_subject = $this->Teacher_model->view_subject($sub_id);
			$data = array(
				'view_students_of_this_subject' => $view_students_of_this_subject, 
				'sub_id' => $sub_id, 
				'view_student' => $view_student,
				'view_subject' => $view_subject,
				'sub_name' => urldecode($sub_name),	
				'stud_id' => $stud_id, 
				'print_single_stud_grade'	=> $print_single_stud_grade
			);
			$this->load->view('teacher/print_single_stud_grade', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}

	public function teacher_print_student_grades($sub_id, $sub_name)
	{
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$view_student = $this->Teacher_model->view_student();
			$view_students_of_this_subject = $this->Teacher_model->view_students_of_this_subject($sub_id);
			$join_grades = $this->Teacher_model->join_Grades($sub_id);
			$view_subject = $this->Teacher_model->view_subject($sub_id);
			$data = array(
				'view_students_of_this_subject' => $view_students_of_this_subject, 
				'sub_id' => $sub_id, 
				'view_student' => $view_student,
				'view_subject' => $view_subject,
				'sub_name' => urldecode($sub_name),	
				'join_grades'	=> $join_grades
			);
			$this->load->view('teacher/teacher_print_student_grades', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}		
	}
	
	public function send_report_grade($sub_id, $sub_name){	
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$sub_id = $this->input->post('sub_id');
			$sub_name = urldecode($this->input->post('sub_name'));
			$this->form_validation->set_rules('_period', 'Period', 'required');
			$this->form_validation->set_rules('grade', 'New Grade', 'required');
			$this->form_validation->set_rules('message', 'Message', 'required');
			if($this->form_validation->run() == true){
				$this->Teacher_model->send_report();
				$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-check"></i>
            <strong>Success!</strong> Your report was send to admin.
          </div>
				'
				);
				redirect('teacher/teacher_view_student/'.$sub_id.'/'.$sub_name);
			}else{
				$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Error!</strong> '.validation_errors().'
          </div>
				'
				);
				redirect('teacher/teacher_view_student/'.$sub_id.'/'.$sub_name);
			}
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}
	}
	public function report_grade($basic_subject_id, $sub_name){	
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$basic_subject_id = $this->input->post('basic_subject_id');
			$sub_name = urldecode($this->input->post('sub_name'));
			$this->form_validation->set_rules('_period', 'Period', 'required');
			$this->form_validation->set_rules('grade', 'New Grade', 'required');
			$this->form_validation->set_rules('message', 'Message', 'required');
			if($this->form_validation->run() == true){
				$this->Teacher_model->send_reports();
				$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-check"></i>
            <strong>Success!</strong> Your report was send to admin.
          </div>
				'
				);
				redirect('teacher/view_basic_students/'.$basic_subject_id.'/'.$sub_name);
			}else{
				$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-times"></i>
            <strong>Error!</strong> '.validation_errors().'
          </div>
				'
				);
				redirect('teacher/view_basic_students/'.$basic_subject_id.'/'.$sub_name);
			}
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}
	}
	public function teacher_logout(){
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
	public function message_to_admin($sub_id, $sub_name){
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$sub_name = urldecode($sub_name);
			$this->Teacher_model->message_to_admin();
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-check"></i>
            <strong>Message Sent successfully!</strong>
          </div>
				'
				);
			redirect('teacher/teacher_view_student/'.$sub_id.'/'.$sub_name);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}	
	}
	public function send_message_to_admin($basic_subject_id, $sub_name){
		if(($this->session->userdata('teacher_is_logged_in')==TRUE) && ($this->session->userdata('teacher_id')!="")){
			$sub_name = urldecode($sub_name);
			$this->Teacher_model->send_message_to_admin();
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-check"></i>
            <strong>Message Sent successfully!</strong>
          </div>
				'
				);
			redirect('teacher/view_basic_students/'.$basic_subject_id.'/'.$sub_name);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in with your ID first.
          </div>
				'
			);
			redirect('login/index');
		}	
	}
	
}
