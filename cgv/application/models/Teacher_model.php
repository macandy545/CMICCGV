<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Teacher_model extends CI_Model {
	public function view_profile($teacher_id){
	$this->db->select('*')->from('teacher')->where('teacher_id', $teacher_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function update_teacher_pass($teacher_id){
	$data = array(
			'teacher_pass' => md5($this->input->post('teacher_pass'))
		);
		$this->db->where('teacher_id', $teacher_id);			
		$this->db->update('teacher', $data);
	}
	public function school_years(){
	$this->db->select('sy')->from('subjects');
	$this->db->order_by('sy', 'desc');
	$this->db->distinct();
	$query = $this->db->get()->result_array();
	return $query;
	}

	public function term_avail(){
	$this->db->select('*')->from('time_frame')->where('status','true');
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_subjects(){		
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('subjects.*, sbjt.*')->from('subjects');
	$this->db->join('sbjt', 'subjects.sbjt_id = sbjt.sbjt_id');
	$this->db->where('teacher_id', $teacher_id);
	$this->db->where('subjects.sy', $curr_sy);
	$this->db->where('subjects.semester', $curr_sem);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_all_subjects(){		
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('subjects.*, sbjt.*')->from('subjects');
	$this->db->join('sbjt', 'subjects.sbjt_id = sbjt.sbjt_id');
	$this->db->where('teacher_id', $teacher_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_basic_subjects(){		
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('*')->from('basic_subjects');
	$this->db->where('teacher_id', $teacher_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_current_basic_subjects(){		
	$curr_sy = $this->session->userdata('curr_sy');
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('*')->from('basic_subjects');
	$this->db->where('teacher_id', $teacher_id);
	$this->db->where('sy', $curr_sy);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_curr_subjects(){		
	$curr_sy = $this->session->userdata('curr_sy');
	$curr_sem = $this->session->userdata('curr_sem');
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('subjects.*, sbjt.*')->from('subjects');
	$this->db->join('sbjt', 'subjects.sbjt_id = sbjt.sbjt_id');
	$this->db->where('teacher_id', $teacher_id);
	$this->db->where('sy', $curr_sy);
	$this->db->where('semester', $curr_sem);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_subject($sub_id){		
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('*')->from('subjects')->where('sub_id', $sub_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function basic_subject($basic_subject_id){		
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('*')->from('basic_subjects')->where('basic_subject_id', $basic_subject_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function add_new_subject(){
	$teacher_name = $this->session->userdata('fname')." ".$this->session->userdata('lname');
	$data = array(
		'sub_name' => $this->input->post('sub_name'),
		'units' => $this->input->post('units'),
		'course_description' => $this->input->post('course_description'),
		'schedule' => implode(', ', $_POST['schedule']),
		'time_start' => $this->input->post('time_start'),
		'time_end' => $this->input->post('time_end'),
		'teacher_id' => $this->session->userdata('teacher_id'),
		'teacher_name' => $teacher_name,
		'sy' => $this->input->post('sy'),
		'semester' => $this->input->post('semester')
		
	);
	$this->db->insert('subjects', $data);
	}

	public function view_single_subject($sub_id){
	$this->db->select('subjects.*, teacher.*')->from('subjects');
	$this->db->join('teacher', 'subjects.teacher_id = teacher.teacher_id');
	$this->db->where('subjects.sub_id', $sub_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function update_subject($sub_id){
	$teacher_name = $this->session->userdata('fname')." ".$this->session->userdata('lname');
	$data = array(
	'sub_name' => $this->input->post('sub_name'),
	'units' => $this->input->post('units'),
	'course_description' => $this->input->post('course_description'),
	'schedule' => implode(', ', $_POST['schedule']),	
	'time_start' => $this->input->post('time_start'),
	'time_end' => $this->input->post('time_end'),
	'teacher_id' => $this->session->userdata('teacher_id'),
	'sy' => $this->input->post('sy'),
	'semester' => $this->input->post('semester')
	);
	$this->db->where('sub_id', $sub_id);			
	$this->db->update('subjects', $data);
	}

	public function delete_subject($sub_id){		
	$this->db->where('sub_id', $sub_id);			
	$this->db->delete('subjects');
	}
	public function view_student_subjects($sub_id){		
	$this->db->select('*')->from('student_subjects')->where('sub_id', !$sub_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_student(){		
	$this->db->select('*')->from('student');
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function basic_students(){		
	$this->db->select('*')->from('basic_students');
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_students_of_this_subject($sub_id){		
  $this->db->select('*')->from('student_subjects')->where('sub_id', $sub_id);
  $this->db->where('bin', 0);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function students_of_this_subject($basic_subject_id){		
  $this->db->select('*')->from('basic_student_subjects')->where('basic_subject_id', $basic_subject_id);
  $this->db->where('bin', 0);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function for_approvalgrades($sub_id, $stud_id){		
	$this->db->select('*')->from('student_subjects');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('grades', 'grades.stud_id = student_subjects.stud_id');
	$this->db->join('student', 'student.stud_id = student_subjects.stud_id');
	$this->db->where('subjects.teacher_id', $this->session->userdata('teacher_id'));
	$this->db->where('student_subjects.teacher_id', $this->session->userdata('teacher_id'));
	$this->db->where('grades.sub_id', $sub_id);
	$this->db->where('student_subjects.sub_id', $sub_id);
	$this->db->where('student_subjects.stud_id', $stud_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
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
		$data = array(
			'stud_id' => $stud_id,
			'sub_id' => $sub_id,
			'teacher_id' => $this->session->userdata('teacher_id')
		);
		$this->db->insert('student_subjects', $data);
	}
	public function add_basic_student_to_subject($stud_id, $basic_subject_id){
		$data = array(
			'stud_id' => $stud_id,
			'basic_subject_id' => $basic_subject_id,
			'teacher_id' => $this->session->userdata('teacher_id')
		);
		$this->db->insert('basic_student_subjects', $data);
	}
	public function add_studtoDean($stud_id, $sub_id)	
	{
		$datas = array(
			'stud_id' => $stud_id,
			'sub_id'	=> $sub_id,
			'prelim'	=> 0,
			'midterm'	=> 0,
			'semi_final'	=> 0,
			'final'	=> 0
		);
		$query = $this->db->insert('deans_list', $datas);
		return ($query == true) ? true : false;
	}

	public function add_grade($stud_id, $sub_id){
		$data = array(
			'stud_id' => $stud_id,
			'sub_id' => $sub_id,
			'teacher_id' => $this->session->userdata('teacher_id'),
			'prelim' => '0',
			'midterm' => '0',
			'semi_final' => '0',
			'final' => '0'
		);
		$this->db->insert('grades', $data);
	}
	public function add_basic_grade($stud_id, $basic_subject_id){
		$data = array(
			'stud_id' => $stud_id,
			'basic_subject_id' => $basic_subject_id,
			'teacher_id' => $this->session->userdata('teacher_id'),
			'first_grading' => '0',
			'second_grading' => '0',
			'third_grading' => '0',
			'fourth_grading' => '0'
		);
		$this->db->insert('basic_grade', $data);
	}
	public function join_Grades($sub_id){
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('grades.*, student_subjects.*, student.*, subjects.*')->from('grades')->order_by('lname', 'asc');
	$this->db->join('student_subjects', 'student_subjects.stud_id = grades.stud_id');
	$this->db->join('student', 'student.stud_id = student_subjects.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->where('grades.sub_id', $sub_id);
	$this->db->where('subjects.sub_id', $sub_id);
	$this->db->where('subjects.teacher_id', $teacher_id);
	$result = $this->db->get()->result_array();
	return $result;
	}
	public function basic_grades($basic_subject_id){
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('basic_grade.*, basic_student_subjects.*, basic_students.*, basic_subjects.*')->from('basic_grade')->order_by('lname', 'asc');
	$this->db->join('basic_student_subjects', 'basic_student_subjects.stud_id = basic_grade.stud_id');
	$this->db->join('basic_students', 'basic_students.stud_id = basic_student_subjects.stud_id');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->where('basic_grade.basic_subject_id', $basic_subject_id);
	$this->db->where('basic_subjects.basic_subject_id', $basic_subject_id);
	$this->db->where('basic_subjects.teacher_id', $teacher_id);
	$result = $this->db->get()->result_array();
	return $result;
	}
	public function join_basic_Grades($basic_subject_id){
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('basic_grade.*, basic_student_subjects.*, basic_students.*, basic_subjects.*')->from('basic_grade')->order_by('lname', 'asc');
	$this->db->join('basic_student_subjects', 'basic_student_subjects.stud_id = basic_grade.stud_id');
	$this->db->join('basic_students', 'basic_students.stud_id = basic_student_subjects.stud_id');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->where('basic_grade.basic_subject_id', $basic_subject_id);
	$this->db->where('basic_subjects.basic_subject_id', $basic_subject_id);
	$this->db->where('basic_subjects.teacher_id', $teacher_id);
	$result = $this->db->get()->result_array();
	return $result;
	}
	public function first_grading_grades($basic_subject_id){
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('basic_grade.first_grading, basic_student_subjects.*, basic_students.*, basic_subjects.*')->from('basic_grade')->order_by('lname', 'asc');
	$this->db->join('basic_student_subjects', 'basic_student_subjects.stud_id = basic_grade.stud_id');
	$this->db->join('basic_students', 'basic_students.stud_id = basic_student_subjects.stud_id');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->where('basic_grade.basic_subject_id', $basic_subject_id);
	$this->db->where('basic_subjects.basic_subject_id', $basic_subject_id);
	$this->db->where('basic_subjects.teacher_id', $teacher_id);
	$result = $this->db->get()->result_array();
	return $result;
	}
	public function second_grading_grades($basic_subject_id){
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('basic_grade.second_grading, basic_student_subjects.*, basic_students.*, basic_subjects.*')->from('basic_grade')->order_by('lname', 'asc');
	$this->db->join('basic_student_subjects', 'basic_student_subjects.stud_id = basic_grade.stud_id');
	$this->db->join('basic_students', 'basic_students.stud_id = basic_student_subjects.stud_id');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->where('basic_grade.basic_subject_id', $basic_subject_id);
	$this->db->where('basic_subjects.basic_subject_id', $basic_subject_id);
	$this->db->where('basic_subjects.teacher_id', $teacher_id);
	$result = $this->db->get()->result_array();
	return $result;
	}
	public function third_grading_grades($basic_subject_id){
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('basic_grade.third_grading, basic_student_subjects.*, basic_students.*, basic_subjects.*')->from('basic_grade')->order_by('lname', 'asc');
	$this->db->join('basic_student_subjects', 'basic_student_subjects.stud_id = basic_grade.stud_id');
	$this->db->join('basic_students', 'basic_students.stud_id = basic_student_subjects.stud_id');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->where('basic_grade.basic_subject_id', $basic_subject_id);
	$this->db->where('basic_subjects.basic_subject_id', $basic_subject_id);
	$this->db->where('basic_subjects.teacher_id', $teacher_id);
	$result = $this->db->get()->result_array();
	return $result;
	}
	public function fourth_grading_grades($basic_subject_id){
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('basic_grade.fourth_grading, basic_student_subjects.*, basic_students.*, basic_subjects.*')->from('basic_grade')->order_by('lname', 'asc');
	$this->db->join('basic_student_subjects', 'basic_student_subjects.stud_id = basic_grade.stud_id');
	$this->db->join('basic_students', 'basic_students.stud_id = basic_student_subjects.stud_id');
	$this->db->join('basic_subjects', 'basic_subjects.basic_subject_id = basic_student_subjects.basic_subject_id');
	$this->db->where('basic_grade.basic_subject_id', $basic_subject_id);
	$this->db->where('basic_subjects.basic_subject_id', $basic_subject_id);
	$this->db->where('basic_subjects.teacher_id', $teacher_id);
	$result = $this->db->get()->result_array();
	return $result;
	}
	public function prelim_grades($sub_id){
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('grades.prelim, student_subjects.*, student.*, subjects.*')->from('grades')->order_by('lname', 'asc');
	$this->db->join('student_subjects', 'student_subjects.stud_id = grades.stud_id');
	$this->db->join('student', 'student.stud_id = student_subjects.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->where('grades.sub_id', $sub_id);
	$this->db->where('subjects.sub_id', $sub_id);
	$this->db->where('subjects.teacher_id', $teacher_id);
	$result = $this->db->get()->result_array();
	return $result;
	}
	public function midterm_grades($sub_id){
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('grades.midterm, student_subjects.*, student.*, subjects.*')->from('grades')->order_by('lname', 'asc');
	$this->db->join('student_subjects', 'student_subjects.stud_id = grades.stud_id');
	$this->db->join('student', 'student.stud_id = student_subjects.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->where('grades.sub_id', $sub_id);
	$this->db->where('subjects.sub_id', $sub_id);
	$this->db->where('subjects.teacher_id', $teacher_id);
	$result = $this->db->get()->result_array();
	return $result;
	}
	public function semi_final_grades($sub_id){
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('grades.semi_final, student_subjects.*, student.*, subjects.*')->from('grades')->order_by('lname', 'asc');
	$this->db->join('student_subjects', 'student_subjects.stud_id = grades.stud_id');
	$this->db->join('student', 'student.stud_id = student_subjects.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->where('grades.sub_id', $sub_id);
	$this->db->where('subjects.sub_id', $sub_id);
	$this->db->where('subjects.teacher_id', $teacher_id);
	$result = $this->db->get()->result_array();
	return $result;
	}
	public function final_grades($sub_id){
	$teacher_id = $this->session->userdata('teacher_id');
	$this->db->select('grades.final, student_subjects.*, student.*, subjects.*')->from('grades')->order_by('lname', 'asc');
	$this->db->join('student_subjects', 'student_subjects.stud_id = grades.stud_id');
	$this->db->join('student', 'student.stud_id = student_subjects.stud_id');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->where('grades.sub_id', $sub_id);
	$this->db->where('subjects.sub_id', $sub_id);
	$this->db->where('subjects.teacher_id', $teacher_id);
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
	public function delete_student_to_subject($stud_id, $basic_subject_id){	
	$this->db->where('stud_id', $stud_id);
	$this->db->where('basic_subject_id', $basic_subject_id);
	$data1 = array('bin' => '1');
	$this->db->update('basic_student_subjects', $data1);

	$this->db->where('stud_id', $stud_id);
	$this->db->where('basic_subject_id', $basic_subject_id);
	$data2 = array('bin' => '1');
	$this->db->update('basic_grade', $data2);
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
	
		if ($grade <= 1.7 && $grade != 0) {
			$this->db->where('stud_id', $stud_id);
			$this->db->where('period', $period);			
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
			$this->db->delete('deans_list');
		}
	}
	public function update_basic_grade($stud_id, $basic_subject_id, $sub_name){
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
	
		// if ($grade <= 1.7 && $grade != 0) {
		// 	$this->db->where('stud_id', $stud_id);
		// 	$this->db->where('period', $period);			
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
			// $this->db->delete('deans_list');
		//}
	}
	public function insert_deanslist_candid($stud_id, $sub_id)
	{
	$period = $this->input->post('period');

	if ($period == 'prelim') {
		$data = array(
			'prelim' => $this->input->post('grade')
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$this->db->update('deans_list', $data);
	}
	if ($period == 'midterm') {
		$data = array(
			'midterm' => $this->input->post('grade')
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$this->db->update('deans_list', $data);
	}
	if ($period == 'semifinal') {
		$data = array(
			'semi_final' => $this->input->post('grade')
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$this->db->update('deans_list', $data);
	}
	if ($period == 'final') {
		$data = array(
			'final' => $this->input->post('grade')
		);
		$this->db->where('stud_id', $stud_id);
		$this->db->where('sub_id', $sub_id);
		$this->db->update('deans_list', $data);
	}	
	}

	public function view_search($semester){
	$teacher_id = $this->session->userdata('teacher_id');
	$sy = $this->input->post('sy');
	$semester = $this->input->post('semester');

	if($semester != "All Semester"){
		$this->db->join('sbjt', 'subjects.sbjt_id = sbjt.sbjt_id');
		$this->db->where('teacher_id', $teacher_id);
	    $this->db->where('semester', $this->input->post('semester'));
	    $this->db->where('sy', $this->input->post('sy'));
	    $this->db->select('*')->from('subjects');
  			$query = $this->db->get()->result_array();
	    		return $query;
	} else{
		$this->db->join('sbjt', 'subjects.sbjt_id = sbjt.sbjt_id');
		$this->db->where('teacher_id', $teacher_id);
	    $this->db->where('sy', $this->input->post('sy'));
	    $this->db->select('*')->from('subjects');
  			$query = $this->db->get()->result_array();
	    		return $query;
	}
	}
	public function view_searchss(){
	$teacher_id = $this->session->userdata('teacher_id');
	$sy = $this->input->post('sy');
	$this->db->where('teacher_id', $teacher_id);
    $this->db->where('sy', $this->input->post('sy'));
    $this->db->select('*')->from('basic_subjects');
			$query = $this->db->get()->result_array();
    		return $query;
	}
	public function teacher_print_subjects($teacher_id){
	$this->db->select('subjects.*, teacher.*, sbjt.*')->from('subjects');
	$this->db->join('sbjt', 'sbjt.sbjt_id = subjects.sbjt_id');
	$this->db->join('teacher', 'subjects.teacher_id = teacher.teacher_id');
	$this->db->where('subjects.teacher_id', $teacher_id);
	$query = $this->db->get()->result_array();
	return $query;

	}

	public function print_single_stud_grade($sub_id, $sub_name, $stud_id){
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

	public function teacher_print_student_grades($sub_id, $teacher_id){
	$this->db->select('grades.*, student_subjects.*, subjects.*, student.* ,teacher.*')->from('student_subjects');
	$this->db->join('subjects', 'subjects.sub_id = student_subjects.sub_id');
	$this->db->join('grades', 'grades.stud_id = student_subjects.stud_id');
	$this->db->join('student', 'student.stud_id = student_subjects.stud_id');
	$this->db->join('teacher', 'teacher.teacher_id = student_subjects.teacher_id');
	$this->db->where('subjects.sub_id', $sub_id);
	$this->db->where('subjects.teacher_id', $teacher_id);
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function send_report(){
	$this->db->where('teacher_id', $this->input->post('teacher_id'));
	$this->db->where('stud_id', $this->input->post('stud_id'));
	$this->db->where('sub_id', $this->input->post('sub_id'));
	$this->db->where('sy', $this->input->post('sy'));
	$this->db->where('period', $this->input->post('_period'));
	$this->db->delete('reports');
	$data = array(
		'teacher_id' => $this->input->post('teacher_id'),
		'stud_id' =>$this->input->post('stud_id'),
		'sub_id' => $this->input->post('sub_id'),
		'message' => $this->input->post('message'),
		'grade' => $this->input->post('grade'),
		'old_grade' => $this->input->post('old_grade'),
		'sy' => $this->input->post('sy'),
		'period' => $this->input->post('_period'),
		'updated' => 'false'
	);
	$this->db->insert('reports', $data);
	}
	public function send_reports(){
	$this->db->where('teacher_id', $this->input->post('teacher_id'));
	$this->db->where('stud_id', $this->input->post('stud_id'));
	$this->db->where('basic_subject_id', $this->input->post('basic_subject_id'));
	$this->db->where('sy', $this->input->post('sy'));
	$this->db->where('period', $this->input->post('_period'));
	$this->db->delete('basic_report');
	$data = array(
		'teacher_id' => $this->input->post('teacher_id'),
		'stud_id' =>$this->input->post('stud_id'),
		'basic_subject_id' => $this->input->post('basic_subject_id'),
		'message' => $this->input->post('message'),
		'grade' => $this->input->post('grade'),
		'old_grade' => $this->input->post('old_grade'),
		'sy' => $this->input->post('sy'),
		'period' => $this->input->post('_period'),
		'updated' => 'basic_report'
	);
	$this->db->insert('reports', $data);
	}
	public function get_time_frame(){
	$this->db->select('*')->from('time_frame')->where('status', 'true');
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function basic_time_frame(){
	$this->db->select('*')->from('basic_time_frame')->where('status', 'true');
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function view_time_frame(){
	$this->db->select('*')->from('time_frame')->where('status', 'true');
	$query = $this->db->get()->result_array();
	return $query;
	}
	public function message_to_admin(){
		$data = array(
			'teacher_id' => $this->input->post('teacher_id'),
			'message' => $this->input->post('message_to_admin')
		);
		$this->db->insert('message', $data);
	}
	public function send_message_to_admin(){
		$data = array(
			'teacher_id' => $this->input->post('teacher_id'),
			'message' => $this->input->post('send_message_to_admin')
		);
		$this->db->insert('message', $data);
	}
}