<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model {
	public function check_if_part_of_com_candidate($stud_id){
		$this->db->where("stud_id", $stud_id);   
		$query = $this->db->get("student");
		foreach($query->result() as $rows){
			if($rows->cl_qualified == 'true'){
				return TRUE;
			}
		}
		return false;
	}
	public function check_if_part_of_deans_list($stud_id){
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$curr_term = $this->session->userdata('curr_term');

	if ($curr_term == 'PRELIM') {
		$curr_term = 'prelim';
	}
	if ($curr_term == 'MIDERM') {
		$curr_term = 'midterm';
	}
	if ($curr_term == 'SEMI-FINAL') {
		$curr_term = 'semifinal';
	}
	if ($curr_term == 'FINAL') {
		$curr_term = 'final';
	}
	$this->db->where("stud_id", $stud_id);  
	$this->db->where("sy", $curr_sy); 
	$this->db->where("semester", $curr_sem);
	$this->db->where("period", $curr_term);   
	$query = $this->db->get("deans_list")->result_array();
	return $query;
		
	}
	public function view_all_subjects(){
	$stud_id = $this->session->userdata('stud_id');
	$this->db->select('subjects.*, grades.*, student_subjects.*, teacher.*, sbjt.*')->from('student_subjects');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('teacher', 'teacher.teacher_id = student_subjects.teacher_id');
	$this->db->join('grades', 'grades.sub_id = student_subjects.sub_id');
	$this->db->where('student_subjects.stud_id', $stud_id);
	$this->db->where('grades.stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
	}

	public function view_current_subjects(){
	$curr_sy = $this->session->userdata('curr_sy');
	$stud_id = $this->session->userdata('stud_id');
	$this->db->select('subjects.*, grades.*, student_subjects.*, teacher.*, sbjt.*')->from('student_subjects');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('teacher', 'teacher.teacher_id = student_subjects.teacher_id');
	$this->db->join('grades', 'grades.sub_id = student_subjects.sub_id');
	$this->db->where('sy', $curr_sy);
	$this->db->where('student_subjects.stud_id', $stud_id);
	$this->db->where('grades.stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function current_prelim_grade(){
	$curr_sy = $this->session->userdata('curr_sy');
	$stud_id = $this->session->userdata('stud_id');
	$prelim = 'prelim';
	$this->db->select('subjects.*, grades.prelim, student_subjects.*, teacher.*, sbjt.*')->from('student_subjects');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('teacher', 'teacher.teacher_id = student_subjects.teacher_id');
	$this->db->join('grades', 'grades.sub_id = student_subjects.sub_id');
	$this->db->where('sy', $curr_sy);
	$this->db->where('student_subjects.stud_id', $stud_id);
	$this->db->where('grades.stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function current_midterm_grade(){
	$curr_sy = $this->session->userdata('curr_sy');
	$stud_id = $this->session->userdata('stud_id');
	$this->db->select('subjects.*, grades.midterm, student_subjects.*, teacher.*, sbjt.*')->from('student_subjects');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('teacher', 'teacher.teacher_id = student_subjects.teacher_id');
	$this->db->join('grades', 'grades.sub_id = student_subjects.sub_id');
	$this->db->where('sy', $curr_sy);
	$this->db->where('student_subjects.stud_id', $stud_id);
	$this->db->where('grades.stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function current_sfinal_grade(){
	$curr_sy = $this->session->userdata('curr_sy');
	$stud_id = $this->session->userdata('stud_id');
	$prelim = 'prelim';
	$this->db->select('subjects.*, grades.semi_final, student_subjects.*, teacher.*, sbjt.*')->from('student_subjects');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('teacher', 'teacher.teacher_id = student_subjects.teacher_id');
	$this->db->join('grades', 'grades.sub_id = student_subjects.sub_id');
	$this->db->where('sy', $curr_sy);
	$this->db->where('student_subjects.stud_id', $stud_id);
	$this->db->where('grades.stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function current_final_grade(){
	$curr_sy = $this->session->userdata('curr_sy');
	$stud_id = $this->session->userdata('stud_id');
	$prelim = 'prelim';
	$this->db->select('subjects.*, grades.final, student_subjects.*, teacher.*, sbjt.*')->from('student_subjects');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('teacher', 'teacher.teacher_id = student_subjects.teacher_id');
	$this->db->join('grades', 'grades.sub_id = student_subjects.sub_id');
	$this->db->where('sy', $curr_sy);
	$this->db->where('student_subjects.stud_id', $stud_id);
	$this->db->where('grades.stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function ave_grade(){		
	$stud_id = $this->session->userdata('stud_id');
	$this->db->select('subjects.*, grades.*, student_subjects.*, teacher.*')->from('student_subjects');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->join('teacher', 'teacher.teacher_id = student_subjects.teacher_id');
	$this->db->join('grades', 'grades.sub_id = student_subjects.sub_id');
	$this->db->where('student_subjects.stud_id', $stud_id);
	$this->db->where('grades.stud_id', $stud_id);
	$this->db->where('grades.final !=', 0);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_students_units(){		
	$stud_id = $this->session->userdata('stud_id');
	$this->db->select('total_units')->from('student');
	$this->db->where('stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_profile($stud_id){
	$this->db->select('*')->from('student')->where('stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_search($semester){
	$stud_id = $this->session->userdata('stud_id');
	$sy = $this->input->post('sy');
	$semester = $this->input->post('semester');
		if ($semester != "All Semester") {
		$this->db->select('subjects.*, grades.*, student_subjects.*, teacher.*, sbjt.*')->from('student_subjects');
		$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
		$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
		$this->db->join('teacher', 'teacher.teacher_id = student_subjects.teacher_id');
		$this->db->join('grades', 'grades.sub_id = student_subjects.sub_id');
		$this->db->where('student_subjects.stud_id', $stud_id);
		$this->db->where('grades.stud_id', $stud_id);
		$this->db->where('sy', $sy);
		$this->db->where('semester', $semester);
		$query = $this->db->get()->result_array();
		return $query;
		}else{
			$this->db->select('subjects.*, grades.*, student_subjects.*, teacher.*, sbjt.*')->from('student_subjects');
			$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
			$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
			$this->db->join('teacher', 'teacher.teacher_id = student_subjects.teacher_id');
			$this->db->join('grades', 'grades.sub_id = student_subjects.sub_id');
			$this->db->where('student_subjects.stud_id', $stud_id);
			$this->db->where('grades.stud_id', $stud_id);
			$this->db->where('sy', $sy);
			$query = $this->db->get()->result_array();
			return $query;
		}
	}
	public function print_single_stud_grade($stud_id, $sub_id){
	$this->db->select('subjects.*, grades.*, student_subjects.*, teacher.*, sbjt.*')->from('student_subjects');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('teacher', 'teacher.teacher_id = student_subjects.teacher_id');
	$this->db->join('grades', 'grades.sub_id = student_subjects.sub_id');
	$this->db->where('student_subjects.stud_id', $stud_id);
	$this->db->where('grades.stud_id', $stud_id);
	$this->db->where('subjects.sub_id', $sub_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_sub_taken(){	
	$stud_id = $this->session->userdata('stud_id');	
	$this->db->select('grades.*, student_subjects.*, sbjt.*')->from('student_subjects');
	$this->db->join('sbjt', 'student_subjects.sub_id = sbjt.sbjt_id');
	$this->db->join('grades', 'student_subjects.sub_id = grades.sub_id');
	$this->db->where('student_subjects.stud_id', $stud_id);
	$this->db->where('student_subjects.teacher_id', '');
	$query = $this->db->get()->result_array();
	return $query;		
	}
	public function sub_taken_ave(){	
	$stud_id = $this->session->userdata('stud_id');	
	$this->db->select('grades.*, student_subjects.*, sbjt.*')->from('student_subjects');
	$this->db->join('sbjt', 'student_subjects.sub_id = sbjt.sbjt_id');
	$this->db->join('grades', 'student_subjects.sub_id = grades.sub_id');
	$this->db->where('student_subjects.stud_id', $stud_id);
	$this->db->where('grades.final !=', 0);
	$this->db->where('student_subjects.teacher_id', '');
	$query = $this->db->get()->result_array();
	return $query;		
	}
	public function school_years(){
	$this->db->select('sy')->from('subjects');
	$this->db->order_by('sy', 'desc');
	$this->db->distinct();
	$query = $this->db->get()->result_array();
	return $query;
	}

	//----------------basic----------------
	public function view_basic_subjects(){
	$stud_id = $this->session->userdata('stud_id');
	$this->db->select('basic_subjects.*, basic_grade.*, basic_student_subjects.*, teacher.*')->from('basic_student_subjects');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->join('teacher', 'teacher.teacher_id = basic_student_subjects.teacher_id');
	$this->db->join('basic_grade', 'basic_grade.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->where('basic_student_subjects.stud_id', $stud_id);
	$this->db->where('basic_grade.stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function profile_view($stud_id){
	$this->db->select('*')->from('basic_students')->where('stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function school_yrs(){
	$this->db->select('sy')->from('basic_subjects');
	$this->db->order_by('sy', 'desc');
	$this->db->distinct();
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function basic_current_subjects(){
	$curr_sy = $this->session->userdata('curr_sy');
	$stud_id = $this->session->userdata('stud_id');
	$this->db->select('basic_subjects.*, basic_grade.*, basic_student_subjects.*, teacher.*')->from('basic_student_subjects');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->join('teacher', 'teacher.teacher_id = basic_student_subjects.teacher_id');
	$this->db->join('basic_grade', 'basic_grade.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->where('sy', $curr_sy);
	$this->db->where('basic_student_subjects.stud_id', $stud_id);
	$this->db->where('basic_grade.stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function avrg_grade(){		
	$stud_id = $this->session->userdata('stud_id');
	$this->db->select('basic_subjects.*, basic_grade.*, basic_student_subjects.*, teacher.*')->from('basic_student_subjects');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->join('teacher', 'teacher.teacher_id = basic_student_subjects.teacher_id');
	$this->db->join('basic_grade', 'basic_grade.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->where('basic_student_subjects.stud_id', $stud_id);
	$this->db->where('basic_grade.stud_id', $stud_id);
	$this->db->where('basic_grade.fourth_grading !=', 0);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function search_sub(){
	$stud_id = $this->session->userdata('stud_id');
	$sy = $this->input->post('sy');
	$this->db->select('basic_subjects.*, basic_grade.*, basic_student_subjects.*, teacher.*')->from('basic_student_subjects');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->join('teacher', 'teacher.teacher_id = basic_student_subjects.teacher_id');
	$this->db->join('basic_grade', 'basic_grade.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->where('basic_student_subjects.stud_id', $stud_id);
	$this->db->where('basic_grade.stud_id', $stud_id);
	$this->db->where('basic_subjects.sy', $sy);
	$query = $this->db->get()->result_array();
	return $query;
	}
	
}