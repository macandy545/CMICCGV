<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

public function check_if_admin($login_user){
$this->db->where("username", $login_user);   
$query = $this->db->get("user_admin");
	if($query->num_rows() > 0){
		foreach($query->result() as $rows){
			$newdata = array(
				'username' => $rows->username,
				'name' => $rows->name,
				'admin_image' => $rows->image
			);
		}   
		$this->session->set_userdata($newdata);
		return true; 
	}
	return false;
}

public function check_if_teacher($login_user){
$this->db->where("teacher_id", $login_user);   
$query = $this->db->get("teacher");
	if($query->num_rows() > 0){
		foreach($query->result() as $rows){
			$newdata = array(
				'teacher_id' => $rows->teacher_id,
				'teacher_name' => $rows->lname.', '.$rows->fname.' '.$rows->middle,
				'teacher_image' => $rows->teacher_image
			);
		}   
		$this->session->set_userdata($newdata);
		return true; 
	}
	return false;
}
public function check_if_parent($login_user){
$this->db->where("parent_id", $login_user);   
$query = $this->db->get("parents");
	if($query->num_rows() > 0){
		foreach($query->result() as $rows){
			$newdata = array(
				'parent_id' => $rows->parent_id,
				'parent_name' => $rows->lname.', '.$rows->fname.' '.$rows->middle,
				'parent_image' => $rows->parent_image
			);
		}   
		$this->session->set_userdata($newdata);
		return true; 
	}
	return false;
}
	public function check_if_student($login_user){
	$this->db->where("stud_id", $login_user);   
	$query = $this->db->get("student");
		if($query->num_rows() > 0){
			foreach($query->result() as $rows){
				$newdata = array(
					'stud_id' => $rows->stud_id,
					'stud_image' => $rows->stud_image,
					'student_name' => $rows->lname.', '.$rows->fname.' '.$rows->middle,
					'year' => $rows->year,
					'course' => $rows->course,
					'student_is_logged_in' => TRUE,
				);
			}   
			$this->session->set_userdata($newdata);
			$this->db->select('*')->from('subjects')->order_by('sy', 'desc')->limit(1);
	      $query = $this->db->get()->result_array();
	      	foreach ($query as $view) {
	      		$curr_sy = array('curr_sy' => $view['sy']);
	      	}
    	$this->session->set_userdata($curr_sy);
	    $this->db->select('*')->from('subjects')->order_by('semester', 'desc')->limit(1);
	      $query = $this->db->get()->result_array();
	      	foreach ($query as $view) {
	      		$curr_sem = array('curr_sem' => $view['semester']);
	      	}
    	$this->session->set_userdata($curr_sem);  
	    $this->db->select('*')->from('time_frame')->where('status', 'true');
	      $query = $this->db->get()->result_array();
	      	foreach ($query as $view) {
	      		$curr_term = array('curr_term' => $view['term']);
	      	}
    	$this->session->set_userdata($curr_term);  	  		
			return true; 
		}
		return false;		
	}
	public function check_if_basic_student($login_user){
	$this->db->where("stud_id", $login_user);   
	$query = $this->db->get("basic_students");
		if($query->num_rows() > 0){
			foreach($query->result() as $rows){
				$newdata = array(
					'stud_id' => $rows->stud_id,
					'stud_image' => $rows->stud_image,
					'student_name' => $rows->lname.', '.$rows->fname.' '.$rows->middle,
					'year_level' => $rows->year_level,
					// 'course' => $rows->course,
					'student_is_logged_in' => TRUE,
				);
			}   
			$this->session->set_userdata($newdata);
			$this->db->select('*')->from('subjects')->order_by('sy', 'desc')->limit(1);
	      $query = $this->db->get()->result_array();
	      	foreach ($query as $view) {
	      		$curr_sy = array('curr_sy' => $view['sy']);
	      	}
    	$this->session->set_userdata($curr_sy);
	    $this->db->select('*')->from('subjects')->order_by('semester', 'desc')->limit(1);
	      $query = $this->db->get()->result_array();
	      	foreach ($query as $view) {
	      		$curr_sem = array('curr_sem' => $view['semester']);
	      	}
    	$this->session->set_userdata($curr_sem);  
	    $this->db->select('*')->from('time_frame')->where('status', 'true');
	      $query = $this->db->get()->result_array();
	      	foreach ($query as $view) {
	      		$curr_term = array('curr_term' => $view['term']);
	      	}
    	$this->session->set_userdata($curr_term);  	  		
			return true; 
		}
		return false;		
	}
	public function check_admin($username, $password){
		$this->db->where("username", $username);
		$this->db->where("password", $password);   
		$query = $this->db->get("user_admin");
		if($query->num_rows() > 0){
			foreach($query->result() as $rows){ 
				$newdata = array(
					'admin_id' => $rows->admin_id,
					'username' => $rows->username,
					'name' => $rows->name,
					'admin_image' => $rows->image,
					'password' => $this->input->post('password'),
					'admin_is_logged_in' => TRUE
				);
			}   
		$this->session->set_userdata($newdata);
		$this->db->select('*')->from('subjects')->order_by('sy', 'desc')->limit(1);
      $query = $this->db->get()->result_array();
      	foreach ($query as $view) {
      		$curr_sy = array('curr_sy' => $view['sy']);
      	}
		$this->session->set_userdata($curr_sy);
	  $this->db->select('*')->from('subjects')->order_by('semester', 'desc')->limit(1);
      $query = $this->db->get()->result_array();
      	foreach ($query as $view) {
      		$curr_sem = array('curr_sem' => $view['semester']);
      	}
  	$this->session->set_userdata($curr_sem);  	
		return true; 
		}
		return false;	
	}
	public function check_teacher($username, $password){
		$this->db->where("teacher_id", $username);
		$this->db->where("teacher_pass", $password); 
		$query = $this->db->get("teacher");
		if($query->num_rows() > 0){
			foreach($query->result() as $rows){ 
				$newdata = array(
					'teacher_id' => $rows->teacher_id,
					'teacher_name' => $rows->lname.', '.$rows->fname.' '.$rows->middle,
					'teacher_image' => $rows->teacher_image,
					'teacher_pass' => $this->input->post('password'),
					'teacher_is_logged_in' => TRUE
				);
			}   
			$this->session->set_userdata($newdata);
			$this->db->select('*')->from('subjects')->order_by('sy', 'desc')->limit(1);
	      $query = $this->db->get()->result_array();
	      	foreach ($query as $view) {
	      		$curr_sy = array('curr_sy' => $view['sy']);
	      	}
    	$this->session->set_userdata($curr_sy);
	    $this->db->select('*')->from('subjects')->order_by('semester', 'desc')->limit(1);
	      $query = $this->db->get()->result_array();
	      	foreach ($query as $view) {
	      		$curr_sem = array('curr_sem' => $view['semester']);
	      	}
    	$this->session->set_userdata($curr_sem); 
			return true; 
		}
		return false;	
	}
	public function check_parent($username, $password){
		$this->db->where("parent_id", $username);
		$this->db->where("parent_pass", $password); 
		$query = $this->db->get("parents");
		if($query->num_rows() > 0){
			foreach($query->result() as $rows){ 
				$newdata = array(
					'parent_id' => $rows->parent_id,
					'parent_name' => $rows->lname.', '.$rows->fname.' '.$rows->middle,
					'parent_image' => $rows->parent_image,
					'parent_pass' => $this->input->post('password'),
					'parent_is_logged_in' => TRUE
				);
			}   
			$this->session->set_userdata($newdata);
			$this->db->select('*')->from('subjects')->order_by('sy', 'desc')->limit(1);
	      $query = $this->db->get()->result_array();
	      	foreach ($query as $view) {
	      		$curr_sy = array('curr_sy' => $view['sy']);
	      	}
    	$this->session->set_userdata($curr_sy);
	    $this->db->select('*')->from('subjects')->order_by('semester', 'desc')->limit(1);
	      $query = $this->db->get()->result_array();
	      	foreach ($query as $view) {
	      		$curr_sem = array('curr_sem' => $view['semester']);
	      	}
    	$this->session->set_userdata($curr_sem); 
			return true; 
		}
		return false;	
	}
}