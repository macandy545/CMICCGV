<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guardian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Guardian_model'); 
	}
	public function guardian_index(){
	if(($this->session->userdata('parent_is_logged_in')==TRUE) && ($this->session->userdata('parent_id')!="")){
		$view_profile = $this->Guardian_model->view_profile();
		$view_student = $this->Guardian_model->view_student();
		$view_basic = $this->Guardian_model->view_basic();
		$data = array(
			'view_profile' => $view_profile,
			'view_basic' => $view_basic,
			'view_student' => $view_student
		);
		$this->load->view('header');					
		$this->load->view('guardian/guardian_index',$data);
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
	public function apismsphp(){					
		$this->load->view('guardian/apismsphp');
	
	}
	public function student_grades($stud_id){
	if(($this->session->userdata('parent_is_logged_in')==TRUE) && ($this->session->userdata('parent_id')!="")){
		$view_profile = $this->Guardian_model->view_profile();
		$student_grades = $this->Guardian_model->student_grades($stud_id);
		$view_single_student = $this->Guardian_model->view_single_student($stud_id);
		$school_years = $this->Guardian_model->school_years();
		$data = array(
			'view_profile' => $view_profile,
			'student_grades' => $student_grades,
			'view_single_student' => $view_single_student,
			'school_years' => $school_years
		);
		$this->load->view('header');					
		$this->load->view('guardian/student_grades',$data);
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
	public function basic_grades($stud_id){
	if(($this->session->userdata('parent_is_logged_in')==TRUE) && ($this->session->userdata('parent_id')!="")){
		$view_profile = $this->Guardian_model->view_profile();
		$basic_grades = $this->Guardian_model->basic_grades($stud_id);
		$view_single_basic = $this->Guardian_model->view_single_basic($stud_id);
		$schol_years = $this->Guardian_model->schol_years();
		$data = array(
			'view_profile' => $view_profile,
			'basic_grades' => $basic_grades,
			'view_single_basic' => $view_single_basic,
			'schol_years' => $schol_years
		);
		$this->load->view('header');					
		$this->load->view('guardian/basic_grades',$data);
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
	public function guardian_search($stud_id){
	if(($this->session->userdata('parent_is_logged_in')==TRUE) && ($this->session->userdata('parent_id')!="")){	
		$sy = $this->input->post('sy');
		$semester = $this->input->post('semester');
		$view_profile = $this->Guardian_model->view_profile($stud_id);
		$school_years = $this->Guardian_model->school_years();
		$student_grades = $this->Guardian_model->student_grades($stud_id);
		$view_single_student = $this->Guardian_model->view_single_student($stud_id);
		$data = array(
			'view_profile' => $view_profile, 
			'view_single_student' => $view_single_student,
			'student_grades' => $student_grades,
			'school_years' => $school_years,
			'school_year' => $sy,
			'semester' => $semester
		);
		if ($sy == null && $semester == null) {
			$this->load->view('header');
			$this->load->view('guardian/guardian_search');
			$this->load->view('footer');
		} else{
			$view_profile = $this->Guardian_model->view_profile($stud_id);
			$view_search = $this->Guardian_model->view_search($semester,$stud_id);
			$school_years = $this->Guardian_model->school_years();
			$data = array(
				'view_search' => $view_search, 
				'view_profile' => $view_profile,
				'view_single_student' => $view_single_student,
				'student_grades' => $student_grades, 
				'school_years' => $school_years,
				'school_year' => $sy,
				'semester' => $semester
			);
			$this->load->view('header');
			$this->load->view('guardian/guardian_search', $data);
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
	public function basic_search($stud_id){
	if(($this->session->userdata('parent_is_logged_in')==TRUE) && ($this->session->userdata('parent_id')!="")){	
		$sy = $this->input->post('sy');
		$view_profile = $this->Guardian_model->view_profile($stud_id);
		$schol_years = $this->Guardian_model->schol_years();
		$basic_grades = $this->Guardian_model->basic_grades($stud_id);
		$view_single_basic = $this->Guardian_model->view_single_basic($stud_id);
		$data = array(
			'view_profile' => $view_profile, 
			'basic_grades' => $basic_grades,
			'view_single_basic' => $view_single_basic,
			'schol_years' => $schol_years,
			'school_year' => $sy
		);
		if ($sy == null) {
			$this->load->view('header');
			$this->load->view('guardian/basic_search');
			$this->load->view('footer');
		} else{
			$view_profile = $this->Guardian_model->view_profile($stud_id);
			$basic_search = $this->Guardian_model->basic_search($stud_id);
			$schol_years = $this->Guardian_model->schol_years();
			$data = array(
				'basic_search' => $basic_search, 
				'view_profile' => $view_profile,
				'basic_grades' => $basic_grades,
			'view_single_basic' => $view_single_basic,
				'schol_years' => $schol_years,
				'school_year' => $sy
			);
			$this->load->view('header');
			$this->load->view('guardian/basic_search', $data);
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
	public function guardian_logout(){
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
}	
	
	