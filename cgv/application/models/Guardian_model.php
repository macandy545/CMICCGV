<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guardian_model extends CI_Model {

	public function view_profile(){
	$parent_id = $this->session->userdata('parent_id');
	$this->db->select('*')->from('parents')->where('parent_id', $parent_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_student(){
	$parent_id = $this->session->userdata('parent_id');
	$this->db->select('student.*,parents.parent_id')->from('student');	
	$this->db->join('parents','parents.parent_id = student.parent_id');
	$this->db->where('student.parent_id', $parent_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_basic(){
	$parent_id = $this->session->userdata('parent_id');
	$this->db->select('basic_students.*,parents.parent_id')->from('basic_students');	
	$this->db->join('parents','parents.parent_id = basic_students.parent_id');
	$this->db->where('basic_students.parent_id', $parent_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function student_grades($stud_id){
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('subjects.*, grades.*, student_subjects.*, teacher.*, sbjt.*')->from('student_subjects');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('teacher', 'teacher.teacher_id = student_subjects.teacher_id');
	$this->db->join('grades', 'grades.sub_id = student_subjects.sub_id');
	$this->db->where('sy', $curr_sy);
	$this->db->where('semester', $curr_sem);
	$this->db->where('student_subjects.stud_id', $stud_id);
	$this->db->where('grades.stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function basic_grades($stud_id){
	$curr_sy = $this->session->userdata('curr_sy');
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
	public function view_single_student($stud_id){
	$this->db->select('*')->from('student')->where('stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_single_basic($stud_id){
	$this->db->select('*')->from('basic_students')->where('stud_id', $stud_id);
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
	public function schol_years(){
	$this->db->select('sy')->from('basic_subjects');
	$this->db->order_by('sy', 'desc');
	$this->db->distinct();
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_search($semester,$stud_id){
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
	public function basic_search($stud_id){
	$sy = $this->input->post('sy');
	$this->db->select('basic_subjects.*, basic_grade.*, basic_student_subjects.*, teacher.*')->from('basic_student_subjects');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->join('teacher', 'teacher.teacher_id = basic_student_subjects.teacher_id');
	$this->db->join('basic_grade', 'basic_grade.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->where('sy', $sy);
	$this->db->where('basic_student_subjects.stud_id', $stud_id);
	$this->db->where('basic_grade.stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;	
	}
}
	