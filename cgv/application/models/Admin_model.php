<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {


//------------------------- Student-------------------------------------//
	public function api_info(){
	$this->db->select('*')->from('api');
	$query = $this->db->get()->result_array();
  	return $query;
  	}
  public function get_parent_number($stud_id){
	$this->db->select('parents.parent_id,parents.contact_num,parents.fname,parents.middle,parents.lname,student.stud_id')->from('parents');
	$this->db->join('student', 'student.parent_id = parents.parent_id');
	$this->db->where('student.stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
  	}
  public function getParentNumber($stud_id){
	$this->db->select('parents.parent_id,parents.contact_num,parents.fname,parents.middle,parents.lname,basic_students.stud_id')->from('parents');
	$this->db->join('basic_students', 'basic_students.parent_id = parents.parent_id');
	$this->db->where('basic_students.stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
  	}	
	public function get_sy(){
	$this->db->select('*')->from('subjects');
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
	public function getSchoolYear(){
	$this->db->select('sy')->from('basic_subjects');
	$this->db->order_by('sy', 'desc');
	$this->db->distinct();
	$query = $this->db->get()->result_array();
  return $query;
	}
	public function view_all_subjects($stud_id){		
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
	public function student_current_subjects($stud_id){		
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');	
	$this->db->select('subjects.*, grades.*, student_subjects.*, teacher.*, sbjt.*')->from('student_subjects');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('teacher', 'teacher.teacher_id = student_subjects.teacher_id');
	$this->db->join('grades', 'grades.sub_id = student_subjects.sub_id');
	$this->db->where('student_subjects.stud_id', $stud_id);
	$this->db->where('grades.stud_id', $stud_id);
	$this->db->where('subjects.sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem);
	$query = $this->db->get()->result_array();
	return $query;		
	}
	public function studentCurrentSubjects($stud_id){		
	$curr_sy = $this->session->userdata('curr_sy');
	$this->db->select('basic_subjects.*, basic_grade.*, basic_student_subjects.*, teacher.*')->from('basic_student_subjects');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->join('teacher', 'teacher.teacher_id = basic_student_subjects.teacher_id');
	$this->db->join('basic_grade', 'basic_grade.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->where('basic_student_subjects.stud_id', $stud_id);
	$this->db->where('basic_grade.stud_id', $stud_id);
	$this->db->where('basic_subjects.sy', $curr_sy);
	$query = $this->db->get()->result_array();
	return $query;		
	}

	public function ave_grade($stud_id){		
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

	public function view_students_units($stud_id){	
	$this->db->select('total_units')->from('student');
	$this->db->where('stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
	}

	public function view_students(){		
	$this->db->select('*')->from('student')->order_by('lname', 'asc');
	$query = $this->db->get()->result_array();
	return $query;
	}

	public function view_student(){		
	$this->db->select('deans_list.*, student.*')->from('student')->order_by('lname', 'asc');
	$this->db->join('deans_list', 'deans_list.stud_id = student.stud_id');
	$query = $this->db->get()->result_array();
	return $query;
	}

	public function view_all_student(){		
	$this->db->select('*')->from('student')->order_by('lname', 'asc');
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_current_students(){		
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');			
	$this->db->select('student_subjects.stud_id, student.*, subjects.sy, subjects.semester')->from('student_subjects')->order_by('lname', 'asc');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function search_college_student($semester,$school_year){		
	$semester = $this->input->post('semester');
	$school_year = $this->input->post('school_year');	
	$this->db->select('student_subjects.stud_id, student.*, subjects.sy, subjects.semester')->from('student_subjects')->order_by('lname', 'asc');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('subjects.sy', $school_year);
	$this->db->where('subjects.semester', $semester );
	$query = $this->db->get()->result_array();
	return $query;
	}
	//--------parent------------
	public function add_parent(){
	$add = '+63';
	$contact = $this->input->post('contact_num');
	$contact_num = $add . $contact;
	$rand_pass = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8);
	$data = array(
		'parent_pass' => $rand_pass,
		'parent_image' => $this->input->post('_studimagename'),
		'fname' => ucwords($this->input->post('fname')),
		'lname' => ucwords($this->input->post('lname')),
		'middle' => $this->input->post('middle'),
		'contact_num' => $contact_num,
		'address' => $this->input->post('address')
	);
	$this->db->insert('parents', $data);
	} 
	public function view_parents(){		
	$this->db->select('*')->from('parents');
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_single_parent($parent_id){
	$this->db->select('*')->from('parents')->where('parent_id', $parent_id);
	$query = $this->db->get()->result_array();
	return $query;
	}   
	public function update_parent($parent_id){
		$add = '+63';
		$contact = $this->input->post('contact_num');
		$contact_num = $add . $contact;
		$data = array(
		'parent_image' => $this->input->post('_studimagename'),
		'fname' => ucwords($this->input->post('fname')),
		'lname' => ucwords($this->input->post('lname')),
		'middle' => $this->input->post('middle'),
		'contact_num' => $contact_num,
		'address' => $this->input->post('address')
		);
		$this->db->where('parent_id', $parent_id);
		$this->db->update('parents', $data);
	}
	public function delete_parent($parent_id){		
  $this->db->where('parent_id', $parent_id);			
	$this->db->delete('parents');
	}
	public function parent_name($stud_id){
		$this->db->select('parents.*,student.parent_id')->from('parents');
		$this->db->join('student','parents.parent_id = student.parent_id');
		$this->db->where('student.stud_id',$stud_id);
		$query = $this->db->get()->result_array();
		return $query;
	}
	public function get_name($stud_id){
		$this->db->select('parents.*,basic_students.parent_id')->from('parents');
		$this->db->join('basic_students','parents.parent_id = basic_students.parent_id');
		$this->db->where('basic_students.stud_id',$stud_id);
		$query = $this->db->get()->result_array();
		return $query;
	}
	//--------end parent---------
	//--------basic--------------
	public function basic_student_search_sub($stud_id){
	$sy = $this->input->post('sy');
	
	$this->db->select('basic_subjects.*, basic_grade.*, basic_student_subjects.*, teacher.*')->from('basic_student_subjects');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->join('teacher', 'teacher.teacher_id = basic_student_subjects.teacher_id');
	$this->db->join('basic_grade', 'basic_grade.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->where('basic_subjects.sy', $sy);
	$this->db->where('basic_student_subjects.stud_id', $stud_id);
	$this->db->where('basic_grade.stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;		
	}
	
	public function view_all_basic_subjects($stud_id){
	$sy = $this->session->userdata('curr_sy');		
	$this->db->select('basic_subjects.*, basic_grade.*, basic_student_subjects.*, teacher.*')->from('basic_student_subjects');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->join('teacher', 'teacher.teacher_id = basic_student_subjects.teacher_id');
	$this->db->join('basic_grade', 'basic_grade.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->where('basic_subjects.sy', $sy);
	$this->db->where('basic_student_subjects.stud_id', $stud_id);
	$this->db->where('basic_grade.stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;		
	}
	public function current_basic_students($basic_subject_id){	
	$this->db->select('basic_subjects.*, basic_grade.*, basic_student_subjects.*, teacher.*')->from('basic_student_subjects');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->join('teacher', 'teacher.teacher_id = basic_student_subjects.teacher_id');
	$this->db->join('basic_grade', 'basic_grade.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->where('basic_subjects.basic_subject_id', $basic_subject_id);
	$query = $this->db->get()->result_array();
	return $query;		
	}
	public function searchBulkStudents($department, $sy){	
	$this->db->select('basic_student_subjects.stud_id, basic_students.*, basic_subjects.sy')->from('basic_student_subjects')->order_by('lname', 'asc');
	$this->db->join('basic_students', 'basic_student_subjects.stud_id = basic_students.stud_id');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->distinct();
	$this->db->where('basic_students.dept', $department);
	$this->db->where('basic_subjects.sy', $sy);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function seniorHigh(){	
	$sy = $this->session->userdata('curr_sy');	
	$this->db->select('basic_student_subjects.stud_id, basic_students.*, basic_subjects.sy')->from('basic_student_subjects')->order_by('lname', 'asc');
	$this->db->join('basic_students', 'basic_student_subjects.stud_id = basic_students.stud_id');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->distinct();
	$this->db->where('basic_students.dept', 'senior high');
	$this->db->where('basic_subjects.sy', $sy);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function highSchoolStudents(){	
	$sy = $this->session->userdata('curr_sy');	
	$this->db->select('basic_student_subjects.stud_id, basic_students.*, basic_subjects.sy')->from('basic_student_subjects')->order_by('lname', 'asc');
	$this->db->join('basic_students', 'basic_student_subjects.stud_id = basic_students.stud_id');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->distinct();
	$this->db->where('basic_students.dept', 'high school');
	$this->db->where('basic_subjects.sy', $sy);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function elementaryStudents(){
	$sy = $this->session->userdata('curr_sy');	
	$this->db->select('basic_student_subjects.stud_id, basic_students.*, basic_subjects.sy')->from('basic_student_subjects')->order_by('lname', 'asc');
	$this->db->join('basic_students', 'basic_student_subjects.stud_id = basic_students.stud_id');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->distinct();
	$this->db->where('basic_students.dept', 'elementary');
	$this->db->where('basic_subjects.sy', $sy);
	$query = $this->db->get()->result_array();
	return $query;		
	}
	public function preSchoolStudents(){
	$sy = $this->session->userdata('curr_sy');	
	$this->db->select('basic_student_subjects.stud_id, basic_students.*, basic_subjects.sy')->from('basic_student_subjects')->order_by('lname', 'asc');
	$this->db->join('basic_students', 'basic_student_subjects.stud_id = basic_students.stud_id');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->distinct();
	$this->db->where('basic_students.dept', 'pre_school');
	$this->db->where('basic_subjects.sy', $sy);
	$query = $this->db->get()->result_array();
	return $query;	
	}
	public function add_basic_student(){

	$data = array(
		'stud_image' => $this->input->post('_studimagename'),
		'fname' => ucwords($this->input->post('fname')),
		'lname' => ucwords($this->input->post('lname')),
		'middle' => $this->input->post('middle'),
		'gender' => $this->input->post('gender'),
		'age' => $this->input->post('age'),
		'contact_num' => $this->input->post('contact_num'),
		'address' => $this->input->post('address'),
		'year_level' => $this->input->post('year_level'),
		'parent_id' => $this->input->post('parent_id'),
		// 'stud_image' => $this->input->post('stud_image')
	);
	$this->db->insert('basic_students', $data);
	// return $this->db->insert_id();
	// $data1 = array(
	// 	'stud_id' => $this->db->insert_id(),
	// 	'address' => $this->input->post('address'),
	// 	'name' => $this->input->post('name'),
	// 	'contact_number' => $this->input->post('contact_number'),
	// );
	// $this->db->insert('parents', $data1);	
	} 
	public function view_single_basic_student($stud_id){
	$this->db->select('*')->from('basic_students')->where('stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
	}   
	public function update_basic_student($stud_id){
	$add = '+63';
	$contact = $this->input->post('contact_num');
	$contact_num = $add . $contact;
		$data = array(
			'stud_image' => $this->input->post('_studimagename'),
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
			'middle' => $this->input->post('middle'),
			'gender' => $this->input->post('gender'),
			'age' => $this->input->post('age'),
			'contact_num' => $contact_num,
			'address' => $this->input->post('address'),
			'year_level' => $this->input->post('year_level'),
			'parent_id' => $this->input->post('parent_id'),
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->update('basic_students', $data);
	}
	public function add_basic_subject(){
		$curr_sy = $this->input->post('from')."-".$this->input->post('to');
		$sub_name = $this->input->post('sub_name');
		$data = array(
			'sub_name' => $this->input->post('sub_name'),
			'teacher_id' => $this->input->post('teacher_id'),
			'sched' => implode(', ', $_POST['sched']),
			'time_start' => $this->input->post('time_start'),
			'time_end' => $this->input->post('time_end'),
			'sy' => $this->input->post('from_year')."-".$this->input->post('to_year'),
			'semester' => $this->input->post('semester')
			);
			$this->db->insert('basic_subjects', $data);
			$sy = array(
				'curr_sy' => $curr_sy,
				'curr_sem' => $curr_sem,
			);
			$this->session->set_userdata($sy);
	}
	public function view_basic_subjects(){
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');

	$this->db->select('basic_subjects.*, teacher.*')->from('basic_subjects');
	$this->db->join('teacher', 'teacher.teacher_id = basic_subjects.teacher_id');
	// $this->db->where('sy', $curr_sy);
	// $this->db->where('semester', $curr_sem);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_basic_students(){

	$this->db->select('*')->from('basic_students');
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_single_basic_subject($basic_subject_id){
	$this->db->select('basic_subjects.*, teacher.*')->from('basic_subjects');
	// $this->db->join('sbjt', 'sbjt.sbjt_id = basicsubjects.sbjt_id');
	$this->db->join('teacher', 'basic_subjects.teacher_id = teacher.teacher_id');
	$this->db->where('basic_subjects.basic_subject_id', $basic_subject_id);
	$query = $this->db->get()->result_array();
	return $query;		
	}
	public function update_basic_subject($basic_subject_id, $teacher_name){
		$data = array(
			'sub_name' => $this->input->post('sub_name'),
			'sched' => implode(', ', $_POST['sched']),	
			'time_start' => $this->input->post('time_start'),
			'time_end' => $this->input->post('time_end'),
			'teacher_id' => $this->input->post('teacher_id'),
			'sy' => $this->input->post('sy')
			// 'semester' => $this->input->post('semester')
		);
		$this->db->where('basic_subject_id', $basic_subject_id);			
		$this->db->update('basic_subjects', $data);
	}
	public function add_basic_grade($stud_id, $basic_subject_id){
		$this->db->where("stud_id", $stud_id);
		$query = $this->db->get("basic_students");
		if($query->num_rows() > 0){
			foreach($query->result() as $rows){  
				$data1 = array(
					'stud_id' => $rows->stud_id
				);
			}
		}
		$this->db->where("basic_subject_id", $basic_subject_id);
		$query2 = $this->db->get("basic_subjects");
		if($query2->num_rows() > 0){
			foreach($query2->result() as $rows2){    
				$data2 = array(
					'basic_subject_id' => $rows2->basic_subject_id,
				);
			}
		}
		$data3 = array(
			'teacher_id' => $rows2->teacher_id,
			'first_grading' => '0',
			'second_grading' => '0',
			'third_grading' => '0',
			'fourth_grading' => '0'
		);
		$this->db->insert('basic_grade', $data1 + $data2 + $data3);
	}

	public function add_basic_students_to_subject($stud_id, $basic_subject_id){ 
		$this->db->where("stud_id", $stud_id);
		$query = $this->db->get("basic_students");

		if($query->num_rows() > 0){

			foreach($query->result() as $rows){    
				$data1 = array(
					'stud_id' => $rows->stud_id
				);
			}
		}
		$this->db->where("basic_subject_id", $basic_subject_id);
		$query2 = $this->db->get("basic_subjects");

		if($query2->num_rows() > 0){

			foreach($query2->result() as $rows2){    
				$data2 = array(
					'basic_subject_id' => $rows2->basic_subject_id,
					'teacher_id' => $rows2->teacher_id,
				);
			}
			$this->db->insert('basic_student_subjects', $data1 + $data2);
		}

	}
	public function students_of_this_subject($basic_subject_id){		
	$this->db->select('*')->from('basic_student_subjects')->where('basic_subject_id', $basic_subject_id);
	$this->db->where('bin', 0);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function basic_grade($basic_subject_id){
	$this->db->select('basic_grade.*, basic_student_subjects.*, basic_students.*, basic_subjects.*')->from('basic_grade')->order_by('lname', 'asc');
	$this->db->join('basic_student_subjects', 'basic_student_subjects.stud_id = basic_grade.stud_id');
	$this->db->join('basic_students', 'basic_students.stud_id = basic_student_subjects.stud_id');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->where('basic_grade.basic_subject_id', $basic_subject_id);
	$this->db->where('basic_subjects.basic_subject_id', $basic_subject_id);
	$result = $this->db->get()->result_array();
	return $result;
	}
	public function update_basic_student_grade($stud_id, $basic_subject_id, $sub_name){
	$period = $this->input->post('period');
	$grade = $this->input->post('grade');
	$sy = $this->input->post('sy');
	// $semester = $this->input->post('semester');

	if ($period == 'first_grading') {
		$data = array(
			'first_grading' => $this->input->post('grade')
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->where('basic_subject_id', $basic_subject_id);
		$this->db->update('basic_grade', $data);
	}
	if ($period == 'second_grading') {
		$data = array(
			'second_grading' => $this->input->post('grade')
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->where('basic_subject_id', $basic_subject_id);
		$this->db->update('basic_grade', $data);
	}
	if ($period == 'third_grading') {
		$data = array(
			'third_grading' => $this->input->post('grade')
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->where('basic_subject_id', $basic_subject_id);
		$this->db->update('basic_grade', $data);
	}
	if ($period == 'fourth_grading') {
		$data = array(
			'fourth_grading' => $this->input->post('grade')
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->where('basic_subject_id', $basic_subject_id);
		$this->db->update('basic_grade', $data);
	}
	
		// if ($grade <= 1.74 && $grade != 0) {

		// 	$this->db->where('stud_id', $stud_id);
		// 	$this->db->where('period', $period);
		// 	$this->db->where('sy', $sy);
		// 	$this->db->where('semester', $semester);			
		// 	$this->db->delete('deans_list');

		// 	$data = array(
		// 		'stud_id' => $stud_id,
		// 		'period' => $period,
		// 		'sy' => $sy,
		// 		'semester' => $semester
		// 	);
		// 	$this->db->insert('deans_list', $data);

		// 	if ($cl_qualified != 'false') {

		// 		$data2 = array(
		// 			'cl_qualified' => 'true',
		// 		);
		// 		$this->db->where('stud_id', $stud_id);
		// 		$this->db->update('student', $data2);
		// 	}
		// }
		// else{
		// 	$data2 = array(
		// 		'cl_qualified' => 'false',
		// 	);
		// 	$this->db->where('stud_id', $stud_id);
		// 	$this->db->update('student', $data2);

		// 	$this->db->where('stud_id', $stud_id);
		// 	$this->db->where('period', $period);
		// 	$this->db->where('sy', $sy);
		// 	$this->db->where('semester', $semester);
		// 	$this->db->delete('deans_list');

		// }
	}
	public function delete_subjects_students($stud_id, $basic_subject_id){		
		$this->db->where('stud_id', $stud_id);
		$this->db->where('basic_subject_id', $basic_subject_id);
		$data1 = array('bin' => '1');
		$this->db->update('basic_student_subjects', $data1);

		$this->db->where('stud_id', $stud_id);
		$this->db->where('basic_subject_id', $basic_subject_id);
		$data2 = array('bin' => '1');
		$this->db->update('basic_grade', $data2);
	}
	public function basic_subjectz(){
    $this->db->like('sy', $this->input->post('sy'));
    $this->db->select('basic_subjects.*, teacher.*')->from('basic_subjects')->order_by('sy', 'asc');
    // $this->db->join('sbjt', 'subjects.sbjt_id = sbjt.sbjt_id');
    $this->db->join('teacher', 'basic_subjects.teacher_id = teacher.teacher_id');
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
	public function has_subject_recordss($basic_subject_id){	
	$this->db->select('basic_student_subjects.basic_subject_id')->from('basic_student_subjects');
 	$this->db->where('basic_student_subjects.basic_subject_id', $basic_subject_id);		
	$res = $this->db->count_all_results();
	return ($res > 0) ? false : true;
	}
	public function delete_basic_subject($basic_subject_id){		
	$this->db->where('basic_subject_id', $basic_subject_id);			
	$this->db->delete('basic_subjects');
	$this->db->select('*')->from('basic_subjects')->order_by('sy', 'desc')->limit(1);
	$query = $this->db->get()->result_array();
		foreach ($query as $view) {
		$curr_sy = array('curr_sy' => $view['sy']);
		}
	$this->session->set_userdata($curr_sy);
	}
	public function count_basic_students(){
	$curr_sy = $this->session->userdata('curr_sy');
	// $curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('basic_student_subjects.stud_id, basic_students.*, basic_subjects.sy')->from('basic_student_subjects');
	$this->db->join('basic_students', 'basic_student_subjects.stud_id = basic_students.stud_id');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->distinct();
	$this->db->where('sy', $curr_sy);
	// $this->db->where('basic_subjects.semester', $curr_sem );
	$res = $this->db->get()->result();
	return count($res);
	}
	//---------------end basic----------------------
	public function view_bsit_students(){	
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');	
	$this->db->select('student_subjects.stud_id, student.*, subjects.sy, subjects.semester')->from('student_subjects')->order_by('lname', 'asc');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'BSIT' );
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$query = $this->db->get()->result_array();
	return $query;
	}

	public function view_ab_english_students(){	
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');		
	$this->db->select('student_subjects.stud_id, student.*, subjects.sy, subjects.semester')->from('student_subjects')->order_by('lname', 'asc');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'AB-English' );
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_bsba_students(){	
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');	
	$this->db->select('student_subjects.stud_id, student.*, subjects.sy, subjects.semester')->from('student_subjects')->order_by('lname', 'asc');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'BSBA' );
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_polsci_students(){	
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');			
	$this->db->select('student_subjects.stud_id, student.*, subjects.sy, subjects.semester')->from('student_subjects')->order_by('lname', 'asc');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'AB Pol-Sci' );
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_ab_psychology_students(){	
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');			
	$this->db->select('student_subjects.stud_id, student.*, subjects.sy, subjects.semester')->from('student_subjects')->order_by('lname', 'asc');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'AB Psychology' );
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_bs_crim_students(){	
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');			
	$this->db->select('student_subjects.stud_id, student.*, subjects.sy, subjects.semester')->from('student_subjects')->order_by('lname', 'asc');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'BS Criminology' );
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_hrm_students(){	
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');			
	$this->db->select('student_subjects.stud_id, student.*, subjects.sy, subjects.semester')->from('student_subjects')->order_by('lname', 'asc');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'HRM' );
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_beed_students(){	
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');			
	$this->db->select('student_subjects.stud_id, student.*, subjects.sy, subjects.semester')->from('student_subjects')->order_by('lname', 'asc');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'BEEd' );
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_bsed_students(){	
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');			
	$this->db->select('student_subjects.stud_id, student.*, subjects.sy, subjects.semester')->from('student_subjects')->order_by('lname', 'asc');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'BSEd' );
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$query = $this->db->get()->result_array();
	return $query;
	}

	public function add_student(){
	$add = '+63';
	$contact = $this->input->post('contact_num');
	$contact_num = $add . $contact;
	// $units = $this->input->post('year');
	$year = $this->input->post('year');
	$stud_id = $this->input->post('stud_id');
	$curr_sy = $this->session->userdata('curr_sy');
	$dept = '';
	// if ($units == '1st Year') {
	//   $data = array(
	// 		'stud_image' => $this->input->post('_studimagename'),
	// 		'fname' => ucwords($this->input->post('fname')),
	// 		'lname' => ucwords($this->input->post('lname')),
	// 		'middle' => $this->input->post('middle'),
	// 		'gender' => $this->input->post('gender'),
	// 		'age' => $this->input->post('age'),
	// 		'contact_num' => $contact_num,
	// 		'address' => $this->input->post('address'),
	// 		'course' => $this->input->post('course'),
	// 		'year' => $this->input->post('year'),
	// 		'cl_qualified' => 'not yet',
	// 		'total_units' => 0,
	// 		'school_year' => $curr_sy,
	// 		'parent_id' => $this->input->post('parent_id'),
	// 	);
	// }else{
	if ($year == 'pre_school') {
		$dept = 'pre_school';
	}
	if ($year == 'grade1' || $year == 'grade2' || $year == 'grade3' || $year == 'grade4' || $year == 'grade5' || $year == 'grade6') {
		$dept = 'elementary';
	}
	elseif ($year == 'grade7' || $year == 'grade8' || $year == 'grade9' || $year == 'grade10') {
		$dept = 'high school';
	}
	if ($year == 'grade11' || $year == 'grade12') {
		$dept = 'senior high';
	}
	if ($year == '1st Year' || $year == '2nd Year' || $year == '3rd Year' || $year == '4th Year') {
		$dept = 'college';
	}
	if ($year == '1st Year' || $year == '2nd Year' || $year == '3rd Year' || $year == '4th Year') {
		 $data = array(
			'stud_image' => $this->input->post('_studimagename'),
			'fname' => ucwords($this->input->post('fname')),
			'lname' => ucwords($this->input->post('lname')),
			'middle' => $this->input->post('middle'),
			'gender' => $this->input->post('gender'),
			'age' => $this->input->post('age'),
			'contact_num' => $this->input->post('contact_num'),
			'address' => $this->input->post('address'),
			'course' => $this->input->post('course'),
			'year' => $this->input->post('year'),
			'cl_qualified' => 'not yet',
			'total_units' => $this->input->post('total_units'),
			'school_year' => $curr_sy,
			'dept' => $dept,
			'parent_id' => $this->input->post('parent_id')
		);
		$this->db->insert('student', $data);
		return $this->db->insert_id();
	}else{
		$data = array(
			'stud_image' => $this->input->post('_studimagename'),
			'fname' => ucwords($this->input->post('fname')),
			'lname' => ucwords($this->input->post('lname')),
			'middle' => $this->input->post('middle'),
			'gender' => $this->input->post('gender'),
			'age' => $this->input->post('age'),
			'contact_num' => $this->input->post('contact_num'),
			'address' => $this->input->post('address'),
			'year_level' => $this->input->post('year'),
			'dept' => $dept,
			'parent_id' => $this->input->post('parent_id')
		);
		$this->db->insert('basic_students', $data);
		return $this->db->insert_id();
	}	  
	
	}
	public function view_single_student($stud_id){
	$this->db->select('*')->from('student')->where('stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function getstudInfo($stud_id)
	{
		$this->db->select('*')->from('student')->where('stud_id', $stud_id);
		$query = $this->db->get()->row_array();
		return $query;
	}
	public function getstud_Info($stud_id)
	{
		$this->db->select('*')->from('basic_students')->where('stud_id', $stud_id);
		$query = $this->db->get()->row_array();
		return $query;
	}
	public function update_student($stud_id){
		$add = '+63';
		$contact = $this->input->post('contact_num');
		$contact_num = $add . $contact;
		$course = $this->input->post('course');
		$data = array(
			'stud_image' => $this->input->post('_studimagename'),
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
			'middle' => $this->input->post('middle'),
			'gender' => $this->input->post('gender'),
			'age' => $this->input->post('age'),
			'contact_num' => $contact_num,
			'address' => $this->input->post('address'),
			'course' => $this->input->post('course'),
			'year' => $this->input->post('year'),
			'parent_id' => $this->input->post('parent_id')
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->update('student', $data);
	}

	public function delete_student($stud_id){		
  $this->db->where('stud_id', $stud_id);			
	$this->db->delete('student');
	}
	public function has_student_records($stud_id){		
	$this->db->select('student_subjects.stud_id')->from('student_subjects');
	$this->db->where('stud_id', $stud_id);			
	$res = $this->db->count_all_results();
	return ($res > 0) ? true : false;
	}
	public function has_student_record($stud_id){		
	$this->db->select('basic_student_subjects.stud_id')->from('basic_student_subjects');
	$this->db->where('stud_id', $stud_id);			
	$res = $this->db->count_all_results();
	return ($res > 0) ? true : false;
	}

	public function view_teacher(){		
	$this->db->select('*')->from('teacher');
	$query = $this->db->get()->result_array();
	return $query;		
	}

	public function view_current_teachers(){		
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('subjects.teacher_id, teacher.*')->from('subjects')->order_by('lname', 'asc');
	$this->db->join('teacher', 'teacher.teacher_id = subjects.teacher_id');
	$this->db->distinct();
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$query = $this->db->get()->result_array();
	return $query;
	}

	public function add_teacher(){
		$add = '+63';
		$contact = $this->input->post('contact_num');
		$contact_num = $add . $contact;
		$data = array(
			'teacher_pass' => md5('password'),
			'teacher_image' => $this->input->post('_teacherimagename'),
			'fname' => ucwords($this->input->post('fname')),
			'lname' => ucwords($this->input->post('lname')),
			'middle' => $this->input->post('middle'),
			'gender' => $this->input->post('gender'),
			'age' => $this->input->post('age'),
			'contact_num' => $contact,
			'email_address' => $this->input->post('email_address'),
			'address' => $this->input->post('address')
		);
		$this->db->insert('teacher', $data);
	}
	public function view_single_teacher($teacher_id){
	$this->db->select('*')->from('teacher')->where('teacher_id', $teacher_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function update_teacher($teacher_id){
		$add = '+63';
		$contact = $this->input->post('contact_num');
		$contact_num = $add . $contact;
		$teacher_name = $this->input->post('fname')." ".$this->input->post('lname');
		$data = array(
			'teacher_image' => $this->input->post('_teacherimagename'),
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
			'middle' => $this->input->post('middle'),
			'gender' => $this->input->post('gender'),
			'age' => $this->input->post('age'),
			'contact_num' => $contact_num,
			'email_address' => $this->input->post('email_address'),
			'address' => $this->input->post('address')
		);
		$this->db->where('teacher_id', $teacher_id);			
		$this->db->update('teacher', $data);	
	}

	public function delete_teacher($teacher_id){		
	$this->db->where('teacher_id', $teacher_id);			
	$this->db->delete('teacher');
	}
	public function has_data($teacher_id)
	{	
		$this->db->select('subjects.teacher_id')->from('subjects');
		$this->db->where('subjects.teacher_id', $teacher_id);
		$res = $this->db->count_all_results();
		return ($res > 0) ? false : true;
	}
	public function add_new_sbjt(){
		$data = array(
			'sub_name' => $this->input->post('sub_name'),
			'units' => $this->input->post('units'),
			'course_description' => $this->input->post('course_description'),
			'pre_requisite' => $this->input->post('pre_requisite')
		);
		$this->db->insert('sbjt', $data);
	}
	public function add_new_time_frame(){
		$data = array(
				'from_date' => $this->input->post('from_date'),
				'to_date' => $this->input->post('to_date'),
				'term' => $this->input->post('term')
			);
			$this->db->insert('time_frame', $data);
	}

	public function view_basic_time_frame(){
		$this->db->select('*')->from('basic_time_frame');
		$query = $this->db->get()->result_array();
		return $query;
	}
	public function late_first_grading_grades(){
	$this->db->distinct();
	$this->db->select('basic_subjects.sy, basic_subjects.sub_name, basic_grade.first_grading, teacher.fname, teacher.lname')->from('basic_grade');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_grade.basic_subject_id');
	$this->db->join('teacher', 'teacher.teacher_id = basic_grade.teacher_id');
	$this->db->where('basic_grade.first_grading', '0');
	$query = $this->db->get()->result_array();
	return $query;	

	}

	public function late_second_grading_grades(){
	$this->db->distinct();
	$this->db->select('basic_subjects.sy, basic_subjects.sub_name, basic_grade.second_grading, teacher.fname, teacher.lname')->from('basic_grade');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_grade.basic_subject_id');
	$this->db->join('teacher', 'teacher.teacher_id = basic_grade.teacher_id');
	$this->db->where('basic_grade.second_grading', '0');
	$query = $this->db->get()->result_array();
	return $query;	

	}

	public function late_third_grading_grades(){
	$this->db->distinct();
	$this->db->select('basic_subjects.sy, basic_subjects.sub_name, basic_grade.third_grading, teacher.fname, teacher.lname')->from('basic_grade');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_grade.basic_subject_id');
	$this->db->join('teacher', 'teacher.teacher_id = basic_grade.teacher_id');
	$this->db->where('basic_grade.third_grading', '0');
	$query = $this->db->get()->result_array();
	return $query;	
	}

	public function late_fourth_grading_grades(){
	$this->db->distinct();
	$this->db->select('basic_subjects.sy, basic_subjects.sub_name, basic_grade.fourth_grading, teacher.fname, teacher.lname')->from('basic_grade');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_grade.basic_subject_id');
	$this->db->join('teacher', 'teacher.teacher_id = basic_grade.teacher_id');
	$this->db->where('basic_grade.fourth_grading', '0');
	$query = $this->db->get()->result_array();
	return $query;	
	}
	public function update_basic_time_frame($tf_id){

		$term = $this->input->post('term');
		$data = array(
				'status' => 'false'
		);
		$this->db->update('basic_time_frame', $data);

		$data = array(
			'from_date' => $this->input->post('from_date'),
			'to_date' => $this->input->post('to_date'),
			'status' => 'true'
		);
		$this->db->where('term', $term);
		$this->db->update('basic_time_frame', $data);		
	}
	public function view_time_frame(){
		$this->db->select('*')->from('time_frame');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function update_time_frame($tf_id){

		$term = $this->input->post('term');
		$data = array(
				'status' => 'false'
		);
		$this->db->update('time_frame', $data);

		$data = array(
			'from_date' => $this->input->post('from_date'),
			'to_date' => $this->input->post('to_date'),
			'status' => 'true'
		);
		$this->db->where('term', $term);
		$this->db->update('time_frame', $data);		
	}

	public function disable_all_frames(){
	$data = array(
		'status' => 'false',
		'from_date' => '',
		'to_date' => ''
	);
	$this->db->update('time_frame', $data);
	}
	public function disable_all_framess(){
	$data = array(
		'status' => 'false',
		'from_date' => '',
		'to_date' => ''
	);
	$this->db->update('basic_time_frame', $data);
	}

	public function enable_all_frames(){
		$data = array(
			'status' => 'true',
			'from_date' => $this->input->post('from_date'),
			'to_date' => $this->input->post('to_date')
		);
		$this->db->update('time_frame', $data);
	}
	public function enable_all_framess(){
		$data = array(
			'status' => 'true',
			'from_date' => $this->input->post('from_date'),
			'to_date' => $this->input->post('to_date')
		);
		$this->db->update('basic_time_frame', $data);
	}

	public function enable_custom_frames(){

		$data = array(
				'status' => 'false',
				'from_date' => "",
				'to_date' => ""		
		);

		$this->db->update('time_frame', $data);
		$count_term = count($this->input->post('term'));
		for($i=0; $i < $count_term; $i++){
		$data = array(
			'status' => 'true',
			'from_date' => $this->input->post('from_date'),
			'to_date' => $this->input->post('to_date')
		);
		$this->db->where('term', $this->input->post('term')[$i]);
		$this->db->update('time_frame', $data);
		}
	}
	public function enable_custom_framess(){

		$data = array(
				'status' => 'false',
				'from_date' => "",
				'to_date' => ""		
		);

		$this->db->update('basic_time_frame', $data);
		$count_term = count($this->input->post('term'));
		for($i=0; $i < $count_term; $i++){
		$data = array(
			'status' => 'true',
			'from_date' => $this->input->post('from_date'),
			'to_date' => $this->input->post('to_date')
		);
		$this->db->where('term', $this->input->post('term')[$i]);
		$this->db->update('basic_time_frame', $data);
		}
	}

	public function late_prelim_grades(){
	$this->db->distinct();
	$this->db->select('subjects.sy, subjects.semester, grades.prelim, teacher.fname, teacher.lname, sbjt.sub_name')->from('grades');
	$this->db->join('subjects', 'subjects.sub_id = grades.sub_id');
	$this->db->join('teacher', 'teacher.teacher_id = grades.teacher_id');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->where('grades.prelim', '0');
	$query = $this->db->get()->result_array();
	return $query;	

	}

	public function late_midterm_grades(){
	$this->db->distinct();
	$this->db->select('subjects.sy, subjects.semester, grades.midterm, teacher.fname, teacher.lname, sbjt.sub_name')->from('grades');
	$this->db->join('subjects', 'subjects.sub_id = grades.sub_id');
	$this->db->join('teacher', 'teacher.teacher_id = grades.teacher_id');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->where('grades.midterm', '0');
	$query = $this->db->get()->result_array();
	return $query;	

	}

	public function late_semi_final_grades(){
	$this->db->distinct();
	$this->db->select('subjects.sy, subjects.semester, grades.semi_final, teacher.fname, teacher.lname, sbjt.sub_name')->from('grades');
	$this->db->join('subjects', 'subjects.sub_id = grades.sub_id');
	$this->db->join('teacher', 'teacher.teacher_id = grades.teacher_id');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->where('grades.semi_final', '0');
	$query = $this->db->get()->result_array();
	return $query;	
	}

	public function late_final_grades(){
	$this->db->distinct();
	$this->db->select('subjects.sy, subjects.semester, grades.final, teacher.fname, teacher.lname, sbjt.sub_name')->from('grades');
	$this->db->join('subjects', 'subjects.sub_id = grades.sub_id');
	$this->db->join('teacher', 'teacher.teacher_id = grades.teacher_id');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->where('grades.final', '0');
	$query = $this->db->get()->result_array();
	return $query;	
	}
	public function update_sbjt($sbjt_id){
		$data = array(
			'sub_name' => $this->input->post('sub_name'),
			'units' => $this->input->post('units'),
			'course_description' => $this->input->post('course_description'),
			'pre_requisite' => $this->input->post('pre_requisite')
		);
		$this->db->where('sbjt_id', $sbjt_id);			
		$this->db->update('sbjt', $data);
	}
	public function view_sbjt(){		
	$this->db->select('*')->from('sbjt');
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_single_sbjt($sbjt_id){		
	$this->db->select('*')->from('sbjt')->where('sbjt_id', $sbjt_id);
	$query = $this->db->get()->result_array();
	return $query;
	}		
	public function delete_sbjt($sbjt_id){		
	$this->db->where('sbjt_id', $sbjt_id);			
	$this->db->delete('sbjt');
	}
	public function add_new_subject(){
		$curr_sy = $this->input->post('from')."-".$this->input->post('to');
		$curr_sem = $this->input->post('semester');
		$data = array(
			'sbjt_id' => $this->input->post('sbjt_id'),
			'teacher_id' => $this->input->post('teacher_id'),
			'schedule' => implode(', ', $_POST['schedule']),
			'time_start' => $this->input->post('time_start'),
			'time_end' => $this->input->post('time_end'),
			'sy' => $this->input->post('from')."-".$this->input->post('to'),
			'semester' => $this->input->post('semester')
			);
			$this->db->insert('subjects', $data);
			$sy = array(
				'curr_sy' => $curr_sy,
				'curr_sem' => $curr_sem,
			);
			$this->session->set_userdata($sy);
	}
	public function view_single_subject($sub_id){
	$this->db->select('subjects.*, teacher.*, sbjt.*')->from('subjects');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('teacher', 'subjects.teacher_id = teacher.teacher_id');
	$this->db->where('subjects.sub_id', $sub_id);
	$query = $this->db->get()->result_array();
	return $query;		
	}

	public function update_subject($sub_id, $sbjt, $teacher_name){
		$data = array(
			'sbjt_id' => $this->input->post('sbjt_id'),
			'schedule' => implode(', ', $_POST['schedule']),	
			'time_start' => $this->input->post('time_start'),
			'time_end' => $this->input->post('time_end'),
			'teacher_id' => $this->input->post('teacher_id'),
			'sy' => $this->input->post('sy'),
			'semester' => $this->input->post('semester')
		);
		$this->db->where('sub_id', $sub_id);			
		$this->db->update('subjects', $data);
	}

	public function view_teacher_id($teacher_id){
		$this->db->where("teacher_id", $teacher_id); 
		$query = $this->db->get("teacher");
		if($query->num_rows() > 0){
			$teacher_name = "";
			foreach($query->result() as $rows){    	
				$teacher_name = $rows->fname." ".$rows->lname;
			}   
			return $teacher_name;
		}	
	}

	public function view_teacher_subjects($teacher_id){		
	$this->db->select('subjects.*, sbjt.*')->from('subjects');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->where('teacher_id', $teacher_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function teacher_basic_sub($teacher_id){	
	$this->db->select('*')->from('basic_subjects');
	$this->db->where('teacher_id', $teacher_id);
	$query = $this->db->get()->result_array();
	return $query;
	}

	public function view_subjects(){
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');

	$this->db->select('subjects.*, teacher.*, sbjt.*')->from('subjects');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('teacher', 'teacher.teacher_id = subjects.teacher_id');
	$this->db->where('sy', $curr_sy);
	$this->db->where('semester', $curr_sem);
	$query = $this->db->get()->result_array();
	return $query;

	}

	public function search_teacher_subjects($teacher_id){
	$semester = $this->input->post('semester');
	$sy = $this->input->post('sy');

	$this->db->select('subjects.*, teacher.*, sbjt.*')->from('subjects');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('teacher', 'teacher.teacher_id = subjects.teacher_id');
	$this->db->where('sy', $sy);
	$this->db->where('semester', $semester);
	$this->db->where('subjects.teacher_id', $teacher_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_searchss($teacher_id){
	$sy = $this->input->post('sy');
	$this->db->where('teacher_id', $teacher_id);
    $this->db->where('sy', $this->input->post('sy'));
    $this->db->select('*')->from('basic_subjects');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function view_all_sub(){
	$this->db->select('subjects.*, teacher.*, sbjt.*')->from('subjects');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('teacher', 'teacher.teacher_id = subjects.teacher_id');
	$query = $this->db->get()->result_array();
	return $query;

	}
	public function view_subjectopened(){
	$curr_sy = $this->session->userdata('curr_sy');

	$this->db->select('*')->from('subjects');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('teacher', 'teacher.teacher_id = subjects.teacher_id');
	$this->db->where('sy', $curr_sy);
	$query = $this->db->get()->result_array();
	return $query;
	}

	public function view_subject($sub_id){		
	$this->db->select('*')->from('subjects')->where('sub_id', $sub_id);
	$query = $this->db->get()->result_array();
	return $query;
	}	

	public function delete_subject($sub_id){		
	$this->db->where('sub_id', $sub_id);			
	$this->db->delete('subjects');
	$this->db->select('*')->from('subjects')->order_by('sy', 'desc')->limit(1);
	$query = $this->db->get()->result_array();
		foreach ($query as $view) {
		$curr_sy = array('curr_sy' => $view['sy']);
		}
	$this->session->set_userdata($curr_sy);
	}
	public function has_subject_records($sub_id){	
	$this->db->select('student_subjects.sub_id')->from('student_subjects');
 	$this->db->where('student_subjects.sub_id', $sub_id);		
	$res = $this->db->count_all_results();
	return ($res > 0) ? false : true;
	}

	public function taken_subject($sbjt_id){	
	$this->db->select('sbjt.sbjt_id')->from('sbjt');
 	$this->db->where('sbjt.sbjt_id', $sbjt_id);		
	$res = $this->db->count_all_results();
	return ($res > 0) ? false : true;
	}

	public function view_students_of_this_subject($sub_id){		
	$this->db->select('*')->from('student_subjects')->where('sub_id', $sub_id);
	$this->db->where('bin', 0);
	$query = $this->db->get()->result_array();
	return $query;
	}
	// public function students_under_this_subject($basic_subject_id){		
	// $this->db->select('*')->from('basic_student_subjects')->where('basic_subject_id', $basic_subject_id);
	// $this->db->where('bin', 0);
	// $query = $this->db->get()->result_array();
	// return $query;
	// }

	public function check_student($stud_id, $sub_id){
	$this->db->where("stud_id", $stud_id);
	$this->db->where("sub_id", $sub_id);
	$this->db->where('bin', 0);
	$query = $this->db->get("student_subjects");
		if($query->num_rows() > 0){
			return false;
		} else{
			return true;
		}
	}
	public function add_student_to_subject($stud_id, $sub_id){ 
		$this->db->where("stud_id", $stud_id);
		$query = $this->db->get("student");

		if($query->num_rows() > 0){

			foreach($query->result() as $rows){    
				$data1 = array(
					'stud_id' => $rows->stud_id
				);
			}
		}
		$this->db->where("sub_id", $sub_id);
		$query2 = $this->db->get("subjects");

		if($query2->num_rows() > 0){

			foreach($query2->result() as $rows2){    
				$data2 = array(
					'sub_id' => $rows2->sub_id,
					'teacher_id' => $rows2->teacher_id,
				);
			}
			$this->db->insert('student_subjects', $data1 + $data2);
		}

	}
	public function update_total_units($stud_id, $sub_id){
		$this->db->select('*')->from('subjects');
		$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
		$this->db->where("subjects.sub_id", $sub_id);
		$query2 = $this->db->get()->row_array();
		$sub_units = $query2['units']; 

		$this->db->select('*')->from('student');
		$this->db->where("stud_id", $stud_id);
		$res = $this->db->get()->row_array();
		$stud_unit = $res['total_units'];
		$total = $sub_units+$stud_unit;
		$data2 = array(
			'total_units' => $total
		);
		if ($total <= 44) {
        	$data = array(
			'year' => '1st Year'
			);
           	$this->db->where('stud_id', $stud_id);			
			$this->db->update('student', $data+$data2);
        }elseif ($total >= 45 && $total <=88) {
        	$data = array(
			'year' => '2nd Year'
			);
           	$this->db->where('stud_id', $stud_id);			
			$this->db->update('student', $data+$data2);
        }elseif ($total >= 89 && $total <=130) {
        	$data = array(
			'year' => '3rd Year'
			);
           	$this->db->where('stud_id', $stud_id);			
			$this->db->update('student', $data+$data2);
        }elseif ($total >= 131 && $total <169) {
        	$data = array(
			'year' => '4th Year'
			);
           	$this->db->where('stud_id', $stud_id);			
			$this->db->update('student', $data+$data2);
        }else{
        	$this->db->where("stud_id", $stud_id);
			$this->db->update("student", $data2);
        }
	}


	public function add_studtoDean($stud_id)	
	{
		$datas = array(
			'stud_id' => $stud_id,
			'period' => $this->input->post('period')
		);
		$query = $this->db->insert('deans_list', $datas);
		return ($query == true) ? true : false;
	}
	public function add_grade($stud_id, $sub_id){
		$this->db->where("stud_id", $stud_id);
		$query = $this->db->get("student");
		if($query->num_rows() > 0){
			foreach($query->result() as $rows){  
				$data1 = array(
					'stud_id' => $rows->stud_id
				);
			}
		}
		$this->db->where("sub_id", $sub_id);
		$query2 = $this->db->get("subjects");
		if($query2->num_rows() > 0){
			foreach($query2->result() as $rows2){    
				$data2 = array(
					'sub_id' => $rows2->sub_id,
				);
			}
		}
		$data3 = array(
			'teacher_id' => $rows2->teacher_id,
			'prelim' => '0',
			'midterm' => '0',
			'semi_final' => '0',
			'final' => '0'
		);
		$this->db->insert('grades', $data1 + $data2 + $data3);
	}

	public function join_Grades($sub_id){
		$this->db->select('grades.*, student_subjects.*, student.*, subjects.*')->from('grades')->order_by('lname', 'asc');
		$this->db->join('student_subjects', 'student_subjects.stud_id = grades.stud_id');
		$this->db->join('student', 'student.stud_id = student_subjects.stud_id');
		$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
		$this->db->where('grades.sub_id', $sub_id);
		$this->db->where('subjects.sub_id', $sub_id);
		$result = $this->db->get()->result_array();
		return $result;
	}
	public function prelim_grades($sub_id){
		$this->db->select('grades.prelim, student_subjects.*, student.*, subjects.*')->from('grades')->order_by('lname', 'asc');
		$this->db->join('student_subjects', 'student_subjects.stud_id = grades.stud_id');
		$this->db->join('student', 'student.stud_id = student_subjects.stud_id');
		$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
		$this->db->where('grades.sub_id', $sub_id);
		$this->db->where('subjects.sub_id', $sub_id);
		$this->db->where('student_subjects.bin', 0);
		$this->db->where('grades.bin', 0);
		$result = $this->db->get()->result_array();
		return $result;
	}
	public function midterm_grades($sub_id){
		$this->db->select('grades.midterm, student_subjects.*, student.*, subjects.*')->from('grades')->order_by('lname', 'asc');
		$this->db->join('student_subjects', 'student_subjects.stud_id = grades.stud_id');
		$this->db->join('student', 'student.stud_id = student_subjects.stud_id');
		$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
		$this->db->where('grades.sub_id', $sub_id);
		$this->db->where('subjects.sub_id', $sub_id);
		$this->db->where('student_subjects.bin', 0);
		$this->db->where('grades.bin', 0);
		$result = $this->db->get()->result_array();
		return $result;
	}
	public function semi_final_grades($sub_id){
		$this->db->select('grades.semi_final, student_subjects.*, student.*, subjects.*')->from('grades')->order_by('lname', 'asc');
		$this->db->join('student_subjects', 'student_subjects.stud_id = grades.stud_id');
		$this->db->join('student', 'student.stud_id = student_subjects.stud_id');
		$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
		$this->db->where('grades.sub_id', $sub_id);
		$this->db->where('subjects.sub_id', $sub_id);
		$this->db->where('student_subjects.bin', 0);
		$this->db->where('grades.bin', 0);
		$result = $this->db->get()->result_array();
		return $result;
	}
	public function final_grades($sub_id){
		$this->db->select('grades.final, student_subjects.*, student.*, subjects.*')->from('grades')->order_by('lname', 'asc');
		$this->db->join('student_subjects', 'student_subjects.stud_id = grades.stud_id');
		$this->db->join('student', 'student.stud_id = student_subjects.stud_id');
		$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
		$this->db->where('grades.sub_id', $sub_id);
		$this->db->where('subjects.sub_id', $sub_id);
		$this->db->where('student_subjects.bin', 0);
		$this->db->where('grades.bin', 0);
		$result = $this->db->get()->result_array();
		return $result;
	}

	public function delete_subjects_student($stud_id, $sub_id){		
		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$data1 = array('bin' => '1');
		$this->db->update('student_subjects', $data1);

		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$data2 = array('bin' => '1');
		$this->db->update('grades', $data2);
	}

	public function view_profile(){		
    $this->db->select('*')->from('user_admin');
		$query = $this->db->get()->row_array();
		return $query;
	}

	public function update_profile($admin_id){

		$data = array(
				'image' => $this->input->post('_imagename'),
				'name' => $this->input->post('name'),
				'mobile' => $this->input->post('mobile'),
				'address' => $this->input->post('address'),
				'about' => $this->input->post('about'),
				'email' => $this->input->post('email')
			);

			$this->db->where('admin_id', $admin_id);			
			$this->db->update('user_admin', $data);
			$newName = array(
					'admin_name' => $this->input->post('name'),
					'username' => $this->input->post('username')
				);
			$this->session->set_userdata($newName);
	}

	public function update_user_pass($admin_id){

	$data = array(
		'password' => md5($this->input->post('password'))
	);
	$this->db->where('admin_id', $admin_id);			
	$this->db->update('user_admin', $data);
	}

	public function update_profile_picture($admin_id){

	$data = array('image' => str_replace(' ', '_', $this->input->post('image2')));
	$this->db->where('admin_id', $admin_id);			
	$this->db->update('user_admin', $data);
	$newName = array('image' => str_replace(' ', '_', $this->input->post('image2')));
	$this->session->set_userdata($newName);

	}
	public function update_student_grade($stud_id, $sub_id, $sub_name, $cl_qualified){
	$period = $this->input->post('period');
	$grade = $this->input->post('grade');
	$sy = $this->input->post('sy');
	$semester = $this->input->post('semester');

	if ($period == 'prelim') {
		$data = array(
			'prelim' => $this->input->post('grade')
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$this->db->update('grades', $data);
	}
	if ($period == 'midterm') {
		$data = array(
			'midterm' => $this->input->post('grade')
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$this->db->update('grades', $data);
	}
	if ($period == 'semifinal') {
		$data = array(
			'semi_final' => $this->input->post('grade')
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$this->db->update('grades', $data);
	}
	if ($period == 'final') {
		$data = array(
			'final' => $this->input->post('grade')
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$this->db->update('grades', $data);
	}
	
		if ($grade <= 1.74 && $grade != 0) {

			$this->db->where('stud_id', $stud_id);
			$this->db->where('period', $period);
			$this->db->where('sy', $sy);
			$this->db->where('semester', $semester);			
			$this->db->delete('deans_list');

			$data = array(
				'stud_id' => $stud_id,
				'period' => $period,
				'sy' => $sy,
				'semester' => $semester
			);
			$this->db->insert('deans_list', $data);

			if ($cl_qualified != 'false') {

				$data2 = array(
					'cl_qualified' => 'true',
				);
				$this->db->where('stud_id', $stud_id);
				$this->db->update('student', $data2);
			}
		}
		else{
			$data2 = array(
				'cl_qualified' => 'false',
			);
			$this->db->where('stud_id', $stud_id);
			$this->db->update('student', $data2);

			$this->db->where('stud_id', $stud_id);
			$this->db->where('period', $period);
			$this->db->where('sy', $sy);
			$this->db->where('semester', $semester);
			$this->db->delete('deans_list');

		}
	}

	public function update_student_grade2($stud_id, $sub_id, $sub_name, $cl_qualified){

	$period = $this->input->post('period');
	$grade = $this->input->post('grade');
	$sy = $this->input->post('sy');
	$semester = $this->input->post('semester');

	if ($period == 'prelim' || $period == 'Prelim') {
		$data = array(
			'prelim' => $this->input->post('grade')
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$this->db->update('grades', $data);

		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$this->db->where('teacher_id', $this->input->post('teacher_id'));
		$this->db->where('sy', $this->input->post('sy'));
		$this->db->delete('reports');
	}
	if ($period == 'midterm' || $period == 'Midterm') {
		$data = array(
			'midterm' => $this->input->post('grade')
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$this->db->update('grades', $data);

		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$this->db->where('teacher_id', $this->input->post('teacher_id'));
		$this->db->where('sy', $this->input->post('sy'));
		$this->db->delete('reports');
	}
	if ($period == 'semifinal' || $period == 'semi-final' || $period == 'Semifinal' || $period == 'Semi-final' || $period == 'SemiFinal' || $period == 'Semi-Final') {
		$data = array(
			'semi_final' => $this->input->post('grade')
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$this->db->update('grades', $data);

		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$this->db->where('teacher_id', $this->input->post('teacher_id'));
		$this->db->where('sy', $this->input->post('sy'));
		$this->db->delete('reports');
	}
	if ($period == 'final' || $period == 'Final' || $period == 'finals' || $period == 'Finals') {
		$data = array(
			'final' => $this->input->post('grade')
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$this->db->update('grades', $data);

		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$this->db->where('teacher_id', $this->input->post('teacher_id'));
		$this->db->where('sy', $this->input->post('sy'));
		$this->db->delete('reports');
	}
	
		if ($grade <= 1.74 && $grade != 0) {

			$this->db->where('stud_id', $stud_id);
			$this->db->where('period', $period);
			$this->db->where('sy', $sy);
			$this->db->where('semester', $semester);			
			$this->db->delete('deans_list');

			$data = array(
				'stud_id' => $stud_id,
				'period' => $period,
				'sy' => $sy,
				'semester' => $semester

			);
			$this->db->insert('deans_list', $data);

			if ($cl_qualified != 'false') {

				$data2 = array(
					'cl_qualified' => 'true',
				);
				$this->db->where('stud_id', $stud_id);
				$this->db->update('student', $data2);
			}
		}
		else{
			$data2 = array(
				'cl_qualified' => 'false',
			);
			$this->db->where('stud_id', $stud_id);
			$this->db->update('student', $data2);

			$this->db->where('stud_id', $stud_id);
			$this->db->where('period', $period);
			$this->db->where('sy', $sy);
			$this->db->where('semester', $semester);
			$this->db->delete('deans_list');

		}
	}

	public function insert_deanslist_candid($stud_id, $sub_id)
	{
		$period = $this->input->post('period');

		if ($period == 'prelim') {
			$data = array(
				'prelim' => $this->input->post('grade')
			);
			$this->db->where('stud_id', $stud_id);
			$this->db->update('deans_list', $data);
		}
		if ($period == 'midterm') {
			$data = array(
				'midterm' => $this->input->post('grade')
			);
			$this->db->where('stud_id', $stud_id);
			$this->db->update('deans_list', $data);
		}
		if ($period == 'semifinal') {
			$data = array(
				'semi_final' => $this->input->post('grade')
			);
			$this->db->where('stud_id', $stud_id);
			$this->db->update('deans_list', $data);
		}
		if ($period == 'final') {
			$data = array(
				'final' => $this->input->post('grade')
			);
			$this->db->where('stud_id', $stud_id);
			$this->db->update('deans_list', $data);
		}	
	}

	public function count_students(){
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('student_subjects.stud_id, student.*, subjects.sy, subjects.semester')->from('student_subjects');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$res = $this->db->get()->result();
	return count($res);
	}
	public function count_teachers(){
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('subjects.teacher_id')->from('subjects');
	$this->db->distinct();
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$res = $this->db->get()->result();
	return count($res);
	}

	public function count_subjects(){
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('subjects.*, teacher.*, sbjt.*')->from('subjects');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('teacher', 'teacher.teacher_id = subjects.teacher_id');
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	return $this->db->count_all_results();
	}
	public function count_bsit(){
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('student_subjects.stud_id, subjects.sy, subjects.semester')->from('student_subjects');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'BSIT' );
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$res = $this->db->get()->result();
	return count($res);
	}
	public function count_abenglish(){
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('student_subjects.stud_id, subjects.sy, subjects.semester')->from('student_subjects');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'AB-English');
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$res = $this->db->get()->result();
		return count($res);
	}
	public function count_bsba(){
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('student_subjects.stud_id, subjects.sy, subjects.semester')->from('student_subjects');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'BSBA');
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$res = $this->db->get()->result();
	return count($res);
	}
	public function count_ab_polsci(){
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('student_subjects.stud_id, subjects.sy, subjects.semester')->from('student_subjects');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'AB Pol-Sci');
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$res = $this->db->get()->result();
	return count($res);
	}

	public function count_ab_psychology(){
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('student_subjects.stud_id, subjects.sy, subjects.semester')->from('student_subjects');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'AB Psychology');
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$res = $this->db->get()->result();
	return count($res);
	}

	public function count_bs_criminology(){
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('student_subjects.stud_id, subjects.sy, subjects.semester')->from('student_subjects');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'BS Criminology');
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$res = $this->db->get()->result();
	return count($res);
	}
	public function count_hrm(){
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('student_subjects.stud_id, subjects.sy, subjects.semester')->from('student_subjects');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'HRM');
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$res = $this->db->get()->result();
	return count($res);
	}
	public function count_beed(){
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('student_subjects.stud_id, subjects.sy, subjects.semester')->from('student_subjects');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'BEEd');
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$res = $this->db->get()->result();
	return count($res);
	}

	public function count_bsed(){
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('student_subjects.stud_id, subjects.sy, subjects.semester')->from('student_subjects');
	$this->db->join('student', 'student_subjects.stud_id = student.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('course', 'BSEd');
	$this->db->where('sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$res = $this->db->get()->result();
	return count($res);
	}
	public function view_search($semester){
		if($semester != "All Semester"){
		    $this->db->where('semester', $this->input->post('semester'));
		    $this->db->like('sy', $this->input->post('sy'));
		    $this->db->select('subjects.*, sbjt.*, teacher.*')->from('subjects')->order_by('sy', 'asc');
		    $this->db->join('sbjt', 'subjects.sbjt_id = sbjt.sbjt_id');
		    $this->db->join('teacher', 'subjects.teacher_id = teacher.teacher_id');
	  			$query = $this->db->get()->result_array();
		    		return $query;
		} else{
		    $this->db->like('sy', $this->input->post('sy'));
		    $this->db->select('subjects.*, sbjt.*, teacher.*')->from('subjects')->order_by('sy', 'asc');
		    $this->db->join('sbjt', 'subjects.sbjt_id = sbjt.sbjt_id');
		    $this->db->join('teacher', 'subjects.teacher_id = teacher.teacher_id');
	  			$query = $this->db->get()->result_array();
		    		return $query;
		}
	}
	public function student_search_sub($stud_id){
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

	public function search_honors($sy = null){
		if($sy != null)
		{
			$this->db->select('student.stud_id, student.stud_image, student.lname, student.fname, student.middle, student.course, student.year')->from('student')->limit(15);
		    $this->db->join('deans_list', 'deans_list.stud_id = student.stud_id');
		    $this->db->where('deans_list.period', 'final');
		    $this->db->where('deans_list.sy', $sy);
		    $this->db->where('student.year', '4th Year');
		    $this->db->where('student.cl_qualified', 'true');
		    $this->db->distinct('student.stud_id');
		    $query = $this->db->get()->result_array();
			return $query;
		}else{
			$school_year = $this->input->post('sy');
			$this->db->select('student.stud_id, student.stud_image, student.lname, student.fname, student.middle, student.course, student.year')->from('student')->limit(15);
		    $this->db->join('deans_list', 'deans_list.stud_id = student.stud_id');
		    $this->db->where('deans_list.period', 'final');
		    $this->db->where('deans_list.sy', $school_year);
		    $this->db->where('student.year', '4th Year');
		    $this->db->where('student.cl_qualified', 'true');
		    $this->db->distinct('student.stud_id');
		    $query = $this->db->get()->result_array();
			return $query;
		}
	    
	}
	public function search_prelim_dlist(){
	$school_year = $this->input->post('sy');
	$sem = $this->input->post('semester');
	    
	$this->db->select('deans_list.*, student.*')->from('deans_list')->limit(15);
	$this->db->join('student', 'student.stud_id = deans_list.stud_id');
	$this->db->where('deans_list.period', 'prelim');
	$this->db->where('sy', $school_year);
	$this->db->where('semester', $sem);
	$query = $this->db->get()->result_array();
	return $query;

	}
	public function print_search_prelim_dlist($school_year,$sem){
	$this->db->select('deans_list.*, student.*')->from('deans_list')->limit(15);
	$this->db->join('student', 'student.stud_id = deans_list.stud_id');
	$this->db->where('deans_list.period', 'prelim');
	$this->db->where('sy', $school_year);
	$this->db->where('semester', $sem);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function search_midterm_dlist(){
	$school_year = $this->input->post('sy');
	$sem = $this->input->post('semester');

	$this->db->where('semester', $this->input->post('semester'));
	$this->db->where('sy', $this->input->post('sy'));
	$this->db->select('deans_list.*, student.*')->from('deans_list')->limit(15);
	$this->db->join('student', 'student.stud_id = deans_list.stud_id');
	$this->db->where('deans_list.period', 'midterm');
	$this->db->where('sy', $school_year);
	$this->db->where('semester', $sem);
	$query = $this->db->get()->result_array();
	return $query;

	}
	public function print_search_midterm_dlist($sem, $school_year){
	$this->db->select('deans_list.*, student.*')->from('deans_list')->limit(15);
	$this->db->join('student', 'student.stud_id = deans_list.stud_id');
	$this->db->where('deans_list.period', 'midterm');
	$this->db->where('sy', $school_year);
	$this->db->where('semester', $sem);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function search_sfinal_dlist(){
	$school_year = $this->input->post('sy');
	$sem = $this->input->post('semester');

	$this->db->where('semester', $this->input->post('semester'));
	$this->db->where('sy', $this->input->post('sy'));
	$this->db->select('deans_list.*, student.*')->from('deans_list')->limit(15);
	$this->db->join('student', 'student.stud_id = deans_list.stud_id');
	$this->db->where('deans_list.period', 'semifinal');
	$this->db->where('sy', $school_year);
	$this->db->where('semester', $sem);
	$query = $this->db->get()->result_array();
	return $query;

	}
	public function print_search_sfinal_dlist($sem, $school_year){
	$this->db->select('deans_list.*, student.*')->from('deans_list')->limit(15);
	$this->db->join('student', 'student.stud_id = deans_list.stud_id');
	$this->db->where('deans_list.period', 'sfinal');
	$this->db->where('sy', $school_year);
	$this->db->where('semester', $sem);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function search_final_dlist(){
	$school_year = $this->input->post('sy');
	$sem = $this->input->post('semester');

	$this->db->where('semester', $this->input->post('semester'));
	$this->db->where('sy', $this->input->post('sy'));
	$this->db->select('deans_list.*, student.*')->from('deans_list')->limit(15);
	$this->db->join('student', 'student.stud_id = deans_list.stud_id');
	$this->db->where('deans_list.period', 'semi_final');
	$this->db->where('sy', $school_year);
	$this->db->where('semester', $sem);
	$query = $this->db->get()->result_array();
	return $query;

	}
	public function print_search_final_dlist($sem, $school_year){
	$this->db->select('deans_list.*, student.*')->from('deans_list')->limit(15);
	$this->db->join('student', 'student.stud_id = deans_list.stud_id');
	$this->db->where('deans_list.period', 'final');
	$this->db->where('sy', $school_year);
	$this->db->where('semester', $sem);
	$query = $this->db->get()->result_array();
	return $query;
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
	
	public function admin_print_teacher_subjects($teacher_id){
	$this->db->select('subjects.*, teacher.*, sbjt.*')->from('subjects');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('teacher', 'teacher.teacher_id = subjects.teacher_id');
	$this->db->where('subjects.teacher_id', $teacher_id);
	$query = $this->db->get()->result_array();
	return $query;

	}

	public function print_single_student_grade_under_this_subject($sub_id, $stud_id){
	$this->db->select('grades.*, student_subjects.*, student.*, subjects.*')->from('grades');
	$this->db->join('student_subjects', 'student_subjects.stud_id = grades.stud_id');
	$this->db->join('student', 'student.stud_id = student_subjects.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->where('grades.sub_id', $sub_id);
	$this->db->where('subjects.sub_id', $sub_id);
	$this->db->where('student.stud_id', $stud_id);
	$result = $this->db->get()->result_array();
	return $result;
	}

	public function prelim_dlist()
	{
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('deans_list.*, student.*')->from('deans_list')->order_by('lname', 'asc')->limit(15);
	$this->db->join('student', 'student.stud_id = deans_list.stud_id');
	$this->db->where('deans_list.period', 'prelim');
	$this->db->where('sy', $curr_sy);
	$this->db->where('semester', $curr_sem);
	$query = $this->db->get()->result_array();
	return $query;
	}
	
	public function midterm_dlist()
	{
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('deans_list.*, student.*')->from('deans_list')->order_by('lname', 'asc')->limit(15);
	$this->db->join('student', 'student.stud_id = deans_list.stud_id');
	$this->db->where('deans_list.period', 'midterm');
	$this->db->where('sy', $curr_sy);
	$this->db->where('semester', $curr_sem);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function sfinal_dlist()
	{
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('deans_list.*, student.*')->from('deans_list')->order_by('lname', 'asc')->limit(15);
	$this->db->join('student', 'student.stud_id = deans_list.stud_id');
	$this->db->where('deans_list.period', 'semifinal');
	$this->db->where('sy', $curr_sy);
	$this->db->where('semester', $curr_sem);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function final_dlist()
	{
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('deans_list.*, student.*')->from('deans_list')->order_by('lname', 'asc')->limit(15);
	$this->db->join('student', 'student.stud_id = deans_list.stud_id');
	$this->db->where('deans_list.period', 'final');
	$this->db->where('sy', $curr_sy);
	$this->db->where('semester', $curr_sem);
	$query = $this->db->get()->result_array();
	return $query;
	}


	public function com_laude_candidates()
	{
	$this->db->select('student.*, grades.*')->from('student')->limit(15);
	$this->db->join('grades', 'grades.stud_id = student.stud_id');
	$this->db->where('cl_qualified', 'true');
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function distinct_cl_candid()
	{
	$this->db->select('student.*, grades.stud_id')->from('student')->order_by('lname', 'asc');
	$this->db->join('grades', 'grades.stud_id = student.stud_id');
	$this->db->distinct();
	$this->db->where('grades.final !=', 0);
	$this->db->where('student.cl_qualified', 'true');
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function current_cl_candid()
	{
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$this->db->select('student.*, subjects.*, student_subjects.*')->from('student')->limit(15);;
	$this->db->join('student_subjects', 'student.stud_id = student_subjects.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->distinct();
	$this->db->where('student.year', '4th Year');
	$this->db->where('subjects.sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem );
	$this->db->where('student.cl_qualified', 'true');
	$query = $this->db->get()->result_array();
	return $query;
// $this->db->select('deans_list.*, student.*')->from('deans_list')->order_by('lname', 'asc')->limit(15);
//     $this->db->join('student', 'student.stud_id = deans_list.stud_id');
//     $this->db->where('deans_list.period', 'final');
//     $this->db->where('sy', $curr_sy);
//     $this->db->where('semester', $curr_sem);
//     $this->db->where('year', '4th Year');
//     $this->db->where('cl_qualified', 'true');
//     // $this->db->order_by('lname', 'dsc');
// 		 $query = $this->db->get()->result_array();
//    	return $query;
	}
	public function sub_taken_average(){	
	$this->db->select('grades.*, student_subjects.*, sbjt.*')->from('student_subjects');
	$this->db->join('sbjt', 'student_subjects.sub_id = sbjt.sbjt_id');
	$this->db->join('grades', 'student_subjects.sub_id = grades.sub_id');
	$this->db->where('grades.final !=', 0);
	$this->db->where('student_subjects.teacher_id', '');
	$query = $this->db->get()->result_array();
	return $query;		
	}
	public function view_all_reports(){	
	$this->db->select('reports.*,  subjects.*, teacher.*, student.*, sbjt.*')->from('reports');
	$this->db->join('student', 'student.stud_id = reports.stud_id');
	$this->db->join('teacher', 'teacher.teacher_id = reports.teacher_id');
	$this->db->join('subjects', 'subjects.sub_id = reports.sub_id');
	$this->db->join('sbjt', 'subjects.sbjt_id = sbjt.sbjt_id');
	$this->db->where('reports.updated', 'false');
	$query = $this->db->get()->result_array();
	return $query;
	}

	public function count_reports(){
	$this->db->select('*')->from('reports');
	return $this->db->count_all_results();
	}
	public function message(){
	$this->db->select('*')->from('message')->where('status', 0);
	return $this->db->count_all_results();
	}
	public function view_all_message(){	
	$this->db->select('message.*, teacher.*')->from('message');
	$this->db->join('teacher', 'teacher.teacher_id = message.teacher_id');
	$this->db->where('message.status', 0);
	$query = $this->db->get()->result_array();
	return $query;
	}

	public function mark_as_read($msg_id){
	$data = array(
			'status' => 1
	);

	$this->db->where('msg_id', $msg_id);
	$this->db->update('message', $data);
	}
	public function add_sub_taken(){
		$data = array(
				'stud_id' => $this->input->post('stud_id'),
				'sub_id' => $this->input->post('sbjt_id')
		);
		$this->db->insert('student_subjects', $data);
		$data = array(
			'stud_id' => $this->input->post('stud_id'),
			'sub_id' => $this->input->post('sbjt_id'),
			'final' => $this->input->post('final')
		);
		$this->db->insert('grades', $data);
	}
	public function view_sub_taken($stud_id){		
  $this->db->select('grades.*, student_subjects.*, sbjt.*')->from('student_subjects');
  $this->db->join('sbjt', 'student_subjects.sub_id = sbjt.sbjt_id');
  $this->db->join('grades', 'student_subjects.sub_id = grades.sub_id');
  $this->db->distinct();
  $this->db->where('student_subjects.stud_id', $stud_id);
  $this->db->where('student_subjects.teacher_id', '');
	$query = $this->db->get()->result_array();
	return $query;		
	}
	public function sub_taken_ave($stud_id){		
  $this->db->select('grades.*, student_subjects.*, sbjt.*')->from('student_subjects');
  $this->db->join('sbjt', 'student_subjects.sub_id = sbjt.sbjt_id');
  $this->db->join('grades', 'student_subjects.sub_id = grades.sub_id');
  $this->db->where('student_subjects.stud_id', $stud_id);
  $this->db->where('grades.final !=', 0);
  $this->db->where('student_subjects.teacher_id', '');
	$query = $this->db->get()->result_array();
	return $query;		
	}
	public function delete_sub_taken($id, $stud_id, $sub_id){		
  $this->db->where('stud_id', $stud_id);
  $this->db->delete('grades');		
  $this->db->where('id', $id);
  $this->db->where('sub_id', $sub_id);	
  $this->db->delete('student_subjects');
	}
	
}

