<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_model'); 
		$this->load->library('form_validation');
	}
	public function admin_index()
	{	
		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$data['count_teacher'] = $this->Admin_model->count_teachers();
			$data['count_student'] = $this->Admin_model->count_students();
			$data['count_basic_student'] = $this->Admin_model->count_basic_students();
			$data['count_subjects'] = $this->Admin_model->count_subjects();
			$data['count_bsit'] = $this->Admin_model->count_bsit();
			$data['count_abenglish'] = $this->Admin_model->count_abenglish();
			$data['count_bsba'] = $this->Admin_model->count_bsba();
			$data['count_ab_polsci'] = $this->Admin_model->count_ab_polsci();
			$data['count_ab_psychology'] = $this->Admin_model->count_ab_psychology();
			$data['count_bs_criminology'] = $this->Admin_model->count_bs_criminology();
			$data['count_hrm'] = $this->Admin_model->count_hrm();
			$data['count_beed'] = $this->Admin_model->count_beed();
			$data['count_bsed'] = $this->Admin_model->count_bsed();
			$data['view_profile'] = $this->Admin_model->view_profile();
			$data['message'] = $this->Admin_model->message();
			$data['view_all_message'] = $this->Admin_model->view_all_message();

			$count_bsit = $this->Admin_model->count_bsit();
			$count_abenglish = $this->Admin_model->count_abenglish();
			$count_bsba = $this->Admin_model->count_bsba();
			$count_ab_polsci = $this->Admin_model->count_ab_polsci();
			$count_ab_psychology = $this->Admin_model->count_ab_psychology();
			$count_bs_criminology = $this->Admin_model->count_bs_criminology();
			$count_hrm = $this->Admin_model->count_hrm();
			$count_beed = $this->Admin_model->count_beed();
			$count_bsed = $this->Admin_model->count_bsed();

			$datas = array(
					"name" => "Population",
					"data" => array(
						array('BSIT',$count_bsit),
						array('AB English',$count_abenglish),
						array('AB English',$count_abenglish),
						array('AB Pol-Sci',$count_ab_polsci),
						array('BS Criminology',$count_bs_criminology),
						array('HRM',$count_hrm),
						array('BEEd',$count_beed),
						array('BSEd',$count_bsed),
						array('AB Psychology',$count_ab_psychology)
					)
			);
			json_encode($datas);

			$data['count'] = json_encode($datas);
			$data['count_reports'] = $this->Admin_model->count_reports();
			$this->load->view('header',$data);
			$this->load->view('admin/admin_index', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	} 

	public function admin_profile()
	{
		if(($this->session->userdata('admin_is_logged_in')== TRUE) && ($this->session->userdata('admin_id')!="")){
		
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$data = array(
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message
			);
				$this->load->view('header');					
				$this->load->view('admin/admin_profile', $data);
				$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function admin_add_subject()
	{
		if(($this->session->userdata('admin_is_logged_in')== TRUE) && ($this->session->userdata('admin_id')!="")){
			$view_sbjt = $this->Admin_model->view_sbjt();
			$view_teacher = $this->Admin_model->view_teacher();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array(
				'view_teacher' => $view_teacher,
				'view_sbjt' => $view_sbjt,
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message
			);
				$this->load->view('header');					
				$this->load->view('admin/admin_add_subject', $data);
				$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function add_subject_validation(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
	
		$this->Admin_model->add_new_subject(); 
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<b><i class="fa fa-check"></i> Success: </b> New Subject was successfully added.
				 </div>'
			  ); 
			redirect("admin/view_subjects");
		} else {
			redirect('login/index');
		}
	}

	public function add_sbjt()
	{
		if(($this->session->userdata('admin_is_logged_in')== TRUE) && ($this->session->userdata('admin_id')!="")){
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array(
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message
			);
				$this->load->view('header');					
				$this->load->view('admin/add_sbjt', $data);
				$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function add_sbjt_validation(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			
			$this->Admin_model->add_new_sbjt(); 
				$this->session->set_flashdata(
  				'msg',
					'<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<b><i class="fa fa-check"></i> Success: </b> New Subject was successfully added.
					 </div>'
				  ); 
				redirect("admin/view_sbjt");
		}	
		else {
			redirect('login/index');
		}
	}

	public function view_sbjt(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_sbjt = $this->Admin_model->view_sbjt();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array(
				'view_sbjt' => $view_sbjt, 
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message
			);
			
			$this->load->view('header');					
			$this->load->view('admin/admin_view_sbjt', $data);
			$this->load->view('footer');

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		

	}
	public function admin_update_sbjt($sbjt_id){
			
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_single_sbjt = $this->Admin_model->view_single_sbjt($sbjt_id);
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array(
				'view_sbjt' => $view_single_sbjt,
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message
			);
				$this->load->view('header');					
				$this->load->view('admin/admin_update_sbjt', $data);
				$this->load->view('footer');

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		

	}

	public function update_sbjt_validation($sbjt_id){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$this->Admin_model->update_sbjt($sbjt_id); 
				$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	          </button>
	          <i class="fa fa-check"></i>
	          <strong>Success!</strong> subject was successfully updated.
	        </div>
			 	'
		  	); 
		redirect("admin/view_sbjt");
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function update_profile_picture($admin_id){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

			$config = array(
				'upload_path' => "webroot/images",
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE

			);

			$old_image = $this->input->post('old_image');
			unlink("webroot/images".$old_image);

			$this->load->library('upload', $config);
	    $this->upload->initialize($config);
	    $this->upload->set_allowed_types('*');

			$data['upload_data'] = '';

			if (!urldecode($this->upload->do_upload('image'))) {
					$data = array('msg' => $this->upload->display_errors());
				} else { 
					$data = array('msg' => "Upload success!");
		     	$data['upload_data'] = $this->upload->data();
				}

				$this->Admin_model->update_profile_picture($admin_id); 
				$this->session->set_flashdata(
  				'msg','
						<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              <i class="fa fa-check"></i>
              <strong>Changed!</strong> Profile image was change.
            </div>
				 '
			  ); 
					redirect("admin/admin_profile/".$admin_id."#");
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
	}

	public function update_profile_validation($admin_id){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

			$config = array(
			'upload_path' => "webroot/images",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => TRUE

			);

			$this->load->library('upload', $config);
		    $this->upload->initialize($config);
		    $this->upload->set_allowed_types('*');

			$data['upload_data'] = '';

			if (!urldecode($this->upload->do_upload('image'))) {
					$data = array('msg' => $this->upload->display_errors());

			} else {

				$data = array('msg' => "Upload success!");
	     		$data['upload_data'] = $this->upload->data();

			}
				$this->Admin_model->update_profile($admin_id); 
					$this->session->set_flashdata(
		  				'msg','
							<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	              </button>
	              <i class="fa fa-check"></i>
	              <strong>Success!</strong> Account was successfully updated.
	            </div>
						 '
					  ); 
					redirect("admin/admin_profile/".$admin_id);
			
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
	}

	public function update_user_pass($admin_id){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			
			$this->form_validation->set_rules('password','Password', 'trim|required');
			$this->form_validation->set_rules('confirm_pass','Confirm Password', 'trim|required|matches[password]');

			if($this->form_validation->run() == TRUE) //didnt validate
					{
					$this->Admin_model->update_user_pass($admin_id); 
					$this->session->set_flashdata(
	  				'msg','
						<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              <i class="fa fa-check"></i>
              <strong>Success!</strong> Account was successfully updated.
            </div>
					 '
				  	); 
				  	$data = array(
							"password" => $this->input->post('password')
						);
						$this->session->set_userdata($data);
					redirect("admin/admin_profile/".$admin_id);
				}else{
					$this->session->set_flashdata(
							'msg_acc',
							'<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
	              <button type="button" class="close" data-dismiss="alert"  aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	              </button>
	              <i class="fa fa-times"></i>
	              <strong>Error!</strong> Password did not match.
              </div>'
							);
						redirect("admin/admin_profile/".$admin_id);	
				}
			
		}else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
	}

	public function add_teacher()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array(
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message
			);
			$this->load->view('header');
			$this->load->view('admin/add_teacher',$data);
			$this->load->view('footer');

		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}			
		
	}

	public function view_teachers()
	{
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){


			$view_teacher = $this->Admin_model->view_teacher();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array('view_teacher' => $view_teacher, 
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message
			);

				$this->load->view('header');
				$this->load->view('admin/view_teachers', $data);
				$this->load->view('footer');

		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}				
	}
	public function view_current_teachers()
	{
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!=""))
		{
			$view_current_teachers = $this->Admin_model->view_current_teachers();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array('view_current_teachers' => $view_current_teachers, 
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message
			);

				$this->load->view('header');
				$this->load->view('admin/current_teachers', $data);
				$this->load->view('footer');

		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	          </button>
	          <i class="mdi mdi-block-helper"></i>
	          <strong>Sorry!</strong> You cannot access this page, please log in first.
	      </div>
				'
				);
			redirect('login/index');
		}				
	}

	public function teacher_validation(){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				
				$config = array(
				'upload_path' => "webroot/images",
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE

				);
				$this->load->library('upload', $config);
		    $this->upload->initialize($config);
		    $this->upload->set_allowed_types('*');

				$data['upload_data'] = '';

				if (!urldecode($this->upload->do_upload('teacher_image'))) {
						$data = array('msg' => $this->upload->display_errors());

				} else {
						$data = array('msg' => "Upload success!");
			     	$data['upload_data'] = $this->upload->data();
				}

				$this->Admin_model->add_teacher(); 
					$this->session->set_flashdata(
		  				'msg','
							<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="fa fa-check"></i>
                <strong> Teacher added succesfully!</strong>
              </div>
						 '
					  ); 
					redirect("admin/view_teachers");
			
			} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}
				
	}
	public function update_teacher($teacher_id)
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

			$view_teacher = $this->Admin_model->view_single_teacher($teacher_id);
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array('view_teacher' => $view_teacher, 
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message
			);

				$this->load->view('header');					
				$this->load->view('admin/admin_update_teacher', $data);
				$this->load->view('footer');
		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong> Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		} 		
	}

	public function update_teacher_validation($teacher_id){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

				$config = array(
				'upload_path' => "webroot/images",
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE

				);

				$this->load->library('upload', $config);
		    $this->upload->initialize($config);
		    $this->upload->set_allowed_types('*');

				$data['upload_data'] = '';

				if (!urldecode($this->upload->do_upload('teacher_image'))) {
						$data = array('msg' => $this->upload->display_errors());

				} else { 

					$data = array('msg' => "Upload success!");
		     	$data['upload_data'] = $this->upload->data();

				}

				$this->Admin_model->update_teacher($teacher_id); 
				$this->session->set_flashdata(
	  				'msg','
						<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <i class="fa fa-check"></i>
              <strong> Success!</strong> Teacher was successfully updated.
            </div>
					 '
				  ); 
				redirect("admin/view_teachers");
		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}			

	}
	public function delete_teacher($teacher_id){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$no_records = $this->Admin_model->has_data($teacher_id);
			if($no_records)
			{
				$this->Admin_model->delete_teacher($teacher_id);
				$this->session->set_flashdata(
					'msg',
					'<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	            </button>
	            <i class="fa fa-check"></i>
	            <strong>Deleted!</strong> Teacher was successfully deleted.
	        </div> '
			  ); 
		  	redirect("admin/view_teachers");
			}else{
				$this->session->set_flashdata(
					'msg',
					'<div class="alert alert-icon alert-warning alert-dismissible fade in" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	            </button>
	            <i class="fa fa-check"></i>
	            <strong>Ooopps! You cannot delete this teacher. Other datas will be affected if this is done.
	        </div> '
			  ); 
		  	redirect("admin/view_teachers");
			}	
		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert"
                    aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}					
	}

	public function view_teacher_subjects($teacher_id,$fname)
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

			$view_subjects = $this->Admin_model->view_teacher_subjects($teacher_id);
			$teacher_basic_sub = $this->Admin_model->teacher_basic_sub($teacher_id);
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$school_years = $this->Admin_model->school_years();

			$data = array(
				'view_subjects' => $view_subjects,
				'teacher_basic_sub' => $teacher_basic_sub,
				'fname' => urldecode($fname),	
				'teacher_id' => $teacher_id,
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'school_years' => $school_years
			);
				$this->load->view('header');					
				$this->load->view('admin/view_teacher_subjects', $data);
				$this->load->view('footer');
		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
	        </div>
				'
				);
			redirect('login/index');
		} 		
	}

	public function add_student()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$view_parents = $this->Admin_model->view_parents();

			$data = array(
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'view_parents' => $view_parents
			);	
			$this->load->view('header');
			$this->load->view('admin/add_student', $data);
			$this->load->view('footer');

		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
		
	}

	public function student_validation(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

			$config = array(
				'upload_path' => "webroot/images",
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE

			);

			$this->load->library('upload', $config);
	    $this->upload->initialize($config);
	    $this->upload->set_allowed_types('*');

			$data['upload_data'] = '';

			if (!urldecode($this->upload->do_upload('stud_image'))) {
				$data = array('msg' => $this->upload->display_errors());

			} else {

				$data = array('msg' => "Upload success!");
	     	$data['upload_data'] = $this->upload->data();

			}

			$stud_id = $this->Admin_model->add_student();
			$year = $this->input->post('year'); 
				$this->session->set_flashdata(
	  				'msg','
						<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              <i class="fa fa-check"></i>
              <strong> Student added succesfully!</strong> 
     	 			</div>
					 '
				  ); 
			 // if ($year == '1st Year') {
					redirect("admin/add_student");
			// }else{
			// 		redirect("admin/add_bulk_sub/".$stud_id);
			// }	
			} else {
				$this->session->set_flashdata(
					'msg','
						<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
	              <button type="button" class="close" data-dismiss="alert"
	                      aria-label="Close">
	                  <span aria-hidden="true">&times;</span>
	              </button>
	              <i class="mdi mdi-block-helper"></i>
	              <strong>Sorry!</strong> You cannot access this page, please log in first.
	          </div>
					'
					);
			redirect('login/index');
		}
				
	}

	public function view_students()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!=""))
		{
		$view_student = $this->Admin_model->view_all_student();
		$view_profile = $this->Admin_model->view_profile();
		$message = $this->Admin_model->message();
		$view_all_message = $this->Admin_model->view_all_message();

		$data = array(
			'view_student' => $view_student, 
			'view_profile' => $view_profile,
			'message' => $message,
			'view_all_message' => $view_all_message
		);
				$this->load->view('header');
				$this->load->view('admin/view_students', $data);
				$this->load->view('footer');

		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert"  aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
		
	}

	public function view_current_students()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
		
		$view_current_students = $this->Admin_model->view_current_students();
		$view_profile = $this->Admin_model->view_profile();
		$message = $this->Admin_model->message();
		$view_all_message = $this->Admin_model->view_all_message();
		$api_info = $this->Admin_model->api_info();
		$school_years = $this->Admin_model->school_years();

		$data = array(
			'view_current_students' => $view_current_students, 
			'view_profile' => $view_profile,
			'message' => $message,
			'view_all_message' => $view_all_message,
			'api_info' => $api_info,
			'school_years' => $school_years
		);

				$this->load->view('header');
				$this->load->view('admin/current_students', $data);
				$this->load->view('footer');

		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
	        </div>
				'
				);
			redirect('login/index');
		}		
		
	}

	public function search_college_student()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
		$semester = $this->input->post('semester');
		$school_year = $this->input->post('school_year');
		$search_college_student = $this->Admin_model->search_college_student($semester,$school_year);
		$view_profile = $this->Admin_model->view_profile();
		$message = $this->Admin_model->message();
		$view_all_message = $this->Admin_model->view_all_message();
		$school_years = $this->Admin_model->school_years();

		$data = array(
			'semester' => $semester,
			'school_year' => $school_year,
			'search_college_student' => $search_college_student, 
			'view_profile' => $view_profile,
			'message' => $message,
			'view_all_message' => $view_all_message,
			'school_years' => $school_years
		);

				$this->load->view('header');
				$this->load->view('admin/search_college_student', $data);
				$this->load->view('footer');

		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
	        </div>
				'
				);
			redirect('login/index');
		}		
		
	}
	public function searchBulkStudents()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
		$department = $this->input->post('dept');
		$sy = $this->input->post('school_year');
		$searchBulkStudents = $this->Admin_model->searchBulkStudents($department, $sy);
		$view_profile = $this->Admin_model->view_profile();
		$message = $this->Admin_model->message();
		$view_all_message = $this->Admin_model->view_all_message();
		$getSchoolYear = $this->Admin_model->getSchoolYear();

		$data = array(
			'school_year' => $sy,
			'department' => $department,
			'searchBulkStudents' => $searchBulkStudents, 
			'view_profile' => $view_profile,
			'message' => $message,
			'view_all_message' => $view_all_message,
			'getSchoolYear' => $getSchoolYear
		);

				$this->load->view('header');
				$this->load->view('admin/searchBulkStudents', $data);
				$this->load->view('footer');

		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
	        </div>
				'
				);
			redirect('login/index');
		}		
		
	}

	public function update_student($stud_id)
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

			$view_student = $this->Admin_model->view_single_student($stud_id);
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$parent_name = $this->Admin_model->parent_name($stud_id);
			$view_parents = $this->Admin_model->view_parents();

			$data = array('view_student' => $view_student, 
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'parent_name' => $parent_name,
				'view_parents' => $view_parents
			);

				$this->load->view('header');					
				$this->load->view('admin/admin_update_student', $data);
				$this->load->view('footer');
		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
		 		
	}

	public function update_student_validation($stud_id){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

			$config = array(
			'upload_path' => "webroot/images",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => TRUE

			);

			$this->load->library('upload', $config);
		    $this->upload->initialize($config);
		    $this->upload->set_allowed_types('*');

				$data['upload_data'] = '';

				if (!urldecode($this->upload->do_upload('stud_image'))) {
						$data = array('msg' => $this->upload->display_errors());

				} else {

					$data = array('msg' => "Upload success!");
		     	$data['upload_data'] = $this->upload->data();

				}
				$this->Admin_model->update_student($stud_id); 
				$this->session->set_flashdata(
				'msg','
				<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          <i class="fa fa-check"></i>
          <strong>Success!</strong> Student was successfully updated.
        </div>
				 '
			  ); 
					redirect("admin/view_students");	
		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
	        </div>
				'
				);
			redirect('login/index');
		}			
	}
	//-------------------------parent-------------------
	public function add_parent()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array(
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message
			);	
			$this->load->view('header');
			$this->load->view('admin/add_parent', $data);
			$this->load->view('footer');

		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function parent_validation(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

			$config = array(
				'upload_path' => "webroot/images",
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE

			);

			$this->load->library('upload', $config);
	    $this->upload->initialize($config);
	    $this->upload->set_allowed_types('*');

			$data['upload_data'] = '';

			if (!urldecode($this->upload->do_upload('stud_image'))) {
				$data = array('msg' => $this->upload->display_errors());

			} else {

				$data = array('msg' => "Upload success!");
	     	$data['upload_data'] = $this->upload->data();

			}

			$stud_id = $this->Admin_model->add_parent();
				$this->session->set_flashdata(
	  				'msg','
						<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              <i class="fa fa-check"></i>
              <strong> Parent added succesfully!</strong> 
     	 			</div>
					 '
				  ); 
					redirect("admin/view_parents");
			} else {
				$this->session->set_flashdata(
					'msg','
						<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
	              <button type="button" class="close" data-dismiss="alert"
	                      aria-label="Close">
	                  <span aria-hidden="true">&times;</span>
	              </button>
	              <i class="mdi mdi-block-helper"></i>
	              <strong>Sorry!</strong> You cannot access this page, please log in first.
	          </div>
					'
					);
			redirect('login/index');
		}
	}
	public function view_parents()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$view_parents = $this->Admin_model->view_parents();

			$data = array(
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'view_parents' => $view_parents
			);	
			$this->load->view('header');
			$this->load->view('admin/view_parents', $data);
			$this->load->view('footer');

		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function update_parent($parent_id)
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

			$view_parent = $this->Admin_model->view_single_parent($parent_id);
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array('view_parent' => $view_parent, 
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message
			);

				$this->load->view('header');					
				$this->load->view('admin/update_parent', $data);
				$this->load->view('footer');
		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
	}
	public function update_parent_validation($parent_id){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

			$config = array(
			'upload_path' => "webroot/images",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => TRUE

			);

			$this->load->library('upload', $config);
		    $this->upload->initialize($config);
		    $this->upload->set_allowed_types('*');

				$data['upload_data'] = '';

				if (!urldecode($this->upload->do_upload('stud_image'))) {
						$data = array('msg' => $this->upload->display_errors());

				} else {

					$data = array('msg' => "Upload success!");
		     	$data['upload_data'] = $this->upload->data();

				}
				$this->Admin_model->update_parent($parent_id); 
				$this->session->set_flashdata(
				'msg','
				<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          <i class="fa fa-check"></i>
          <strong>Success!</strong> Parent was successfully updated.
        </div>
				 '
			  ); 
					redirect("admin/view_parents");	
		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
	        </div>
				'
				);
			redirect('login/index');
		}			
	}
	public function delete_parent($parent_id){
		
	if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$this->Admin_model->delete_parent($parent_id);
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
	          <button type="button" class="close" data-dismiss="alert"
	                  aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	          </button>
	          <i class="fa fa-check"></i>
	          <strong>Deleted!</strong> Parent was successfully deleted.
	      </div>'
		  ); 
	  	redirect("admin/view_parents");
	  }else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
	}
	//-------------------------end parent---------------
	//-------------------------basic------------------------
	public function seniorHigh()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
		
		$seniorHigh = $this->Admin_model->seniorHigh();
		$view_profile = $this->Admin_model->view_profile();
		$message = $this->Admin_model->message();
		$view_all_message = $this->Admin_model->view_all_message();
		$getSchoolYear = $this->Admin_model->getSchoolYear();

		$data = array(
			'seniorHigh' => $seniorHigh, 
			'view_profile' => $view_profile,
			'message' => $message,
			'view_all_message' => $view_all_message,
			'getSchoolYear' => $getSchoolYear
		);

				$this->load->view('header');
				$this->load->view('admin/seniorHigh', $data);
				$this->load->view('footer');

		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
	        </div>
				'
				);
			redirect('login/index');
		}		
		
	}
	public function highSchoolStudents()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
		
		$highSchoolStudents = $this->Admin_model->highSchoolStudents();
		$view_profile = $this->Admin_model->view_profile();
		$message = $this->Admin_model->message();
		$view_all_message = $this->Admin_model->view_all_message();
		$getSchoolYear = $this->Admin_model->getSchoolYear();

		$data = array(
			'highSchoolStudents' => $highSchoolStudents, 
			'view_profile' => $view_profile,
			'message' => $message,
			'view_all_message' => $view_all_message,
			'getSchoolYear' => $getSchoolYear
		);

				$this->load->view('header');
				$this->load->view('admin/highSchoolStudents', $data);
				$this->load->view('footer');

		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
	        </div>
				'
				);
			redirect('login/index');
		}		
		
	}
	public function elementaryStudents()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
		
		$elementaryStudents = $this->Admin_model->elementaryStudents();
		$view_profile = $this->Admin_model->view_profile();
		$message = $this->Admin_model->message();
		$view_all_message = $this->Admin_model->view_all_message();
		$getSchoolYear = $this->Admin_model->getSchoolYear();

		$data = array(
			'elementaryStudents' => $elementaryStudents, 
			'view_profile' => $view_profile,
			'message' => $message,
			'view_all_message' => $view_all_message,
			'getSchoolYear' => $getSchoolYear
		);

				$this->load->view('header');
				$this->load->view('admin/elementaryStudents', $data);
				$this->load->view('footer');

		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
	        </div>
				'
				);
			redirect('login/index');
		}		
		
	}
	public function preSchoolStudents()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
		
		$preSchoolStudents = $this->Admin_model->preSchoolStudents();
		$view_profile = $this->Admin_model->view_profile();
		$message = $this->Admin_model->message();
		$view_all_message = $this->Admin_model->view_all_message();
		$getSchoolYear = $this->Admin_model->getSchoolYear();

		$data = array(
			'preSchoolStudents' => $preSchoolStudents, 
			'view_profile' => $view_profile,
			'message' => $message,
			'view_all_message' => $view_all_message,
			'getSchoolYear' => $getSchoolYear
		);

				$this->load->view('header');
				$this->load->view('admin/preSchoolStudents', $data);
				$this->load->view('footer');

		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
	        </div>
				'
				);
			redirect('login/index');
		}		
		
	}
	public function add_basic_student()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$view_parents = $this->Admin_model->view_parents();

			$data = array(
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'view_parents' => $view_parents
			);	
			$this->load->view('header');
			$this->load->view('admin/add_basic_student', $data);
			$this->load->view('footer');

		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
		
	}
	public function basic_student_validation(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

			$config = array(
				'upload_path' => "webroot/images",
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE

			);

			$this->load->library('upload', $config);
	    $this->upload->initialize($config);
	    $this->upload->set_allowed_types('*');

			$data['upload_data'] = '';

			if (!urldecode($this->upload->do_upload('stud_image'))) {
				$data = array('msg' => $this->upload->display_errors());

			} else {

				$data = array('msg' => "Upload success!");
	     	$data['upload_data'] = $this->upload->data();

			}

			$stud_id = $this->Admin_model->add_basic_student();
				$this->session->set_flashdata(
	  				'msg','
						<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              <i class="fa fa-check"></i>
              <strong> Student added succesfully!</strong> 
     	 			</div>
					 '
				  ); 
					redirect("admin/current_basic_students");
			} else {
				$this->session->set_flashdata(
					'msg','
						<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
	              <button type="button" class="close" data-dismiss="alert"
	                      aria-label="Close">
	                  <span aria-hidden="true">&times;</span>
	              </button>
	              <i class="mdi mdi-block-helper"></i>
	              <strong>Sorry!</strong> You cannot access this page, please log in first.
	          </div>
					'
					);
			redirect('login/index');
		}
				
	}
	public function updateStudentInfo($stud_id)
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

			$view_basic_student = $this->Admin_model->view_single_basic_student($stud_id);
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$view_parents = $this->Admin_model->view_parents();
			$get_name = $this->Admin_model->get_name($stud_id);

			$data = array('view_basic_student' => $view_basic_student, 
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'view_parents' => $view_parents,
				'get_name' => $get_name,
			);

				$this->load->view('header');					
				$this->load->view('admin/updateStudentInfo', $data);
				$this->load->view('footer');
		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
		 		
	}

	public function update_basic_student_validation($stud_id){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

			$config = array(
			'upload_path' => "webroot/images",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => TRUE

			);

			$this->load->library('upload', $config);
		    $this->upload->initialize($config);
		    $this->upload->set_allowed_types('*');

				$data['upload_data'] = '';

				if (!urldecode($this->upload->do_upload('stud_image'))) {
						$data = array('msg' => $this->upload->display_errors());

				} else {

					$data = array('msg' => "Upload success!");
		     	$data['upload_data'] = $this->upload->data();

				}
				$this->Admin_model->update_basic_student($stud_id); 
				$this->session->set_flashdata(
				'msg','
				<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          <i class="fa fa-check"></i>
          <strong>Success!</strong> Student was successfully updated.
        </div>
				 '
			  ); 
					redirect("admin/current_basic_students");	
		} else {

			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
	        </div>
				'
				);
			redirect('login/index');
		}			
	}

	public function basic_subjects(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_basic_subjects = $this->Admin_model->view_basic_subjects();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$school_yrs = $this->Admin_model->school_yrs();

			$data = array(
				'view_basic_subjects' => $view_basic_subjects, 
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'school_yrs' => $school_yrs
			);
			
			$this->load->view('header');					
			$this->load->view('admin/basic_subjects', $data);
			$this->load->view('footer');

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		

	}
	public function add_basic_subject()
	{
		if(($this->session->userdata('admin_is_logged_in')== TRUE) && ($this->session->userdata('admin_id')!="")){
			$view_sbjt = $this->Admin_model->view_sbjt();
			$view_teacher = $this->Admin_model->view_teacher();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array(
				'view_teacher' => $view_teacher,
				'view_sbjt' => $view_sbjt,
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message
			);
				$this->load->view('header');					
				$this->load->view('admin/add_basic_subject', $data);
				$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function add_basic_subject_validation(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
		$this->Admin_model->add_basic_subject(); 
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<b><i class="fa fa-check"></i> Success: </b> New Subject was successfully added.
				 </div>'
			  ); 
			redirect("admin/basic_subjects");
		} else {
			redirect('login/index');
		}
	}
	public function admin_update_basic_subject($basic_subject_id){
			
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_sbjt = $this->Admin_model->view_sbjt();
			$view_teacher = $this->Admin_model->view_teacher();
			$view_single_basic_subject = $this->Admin_model->view_single_basic_subject($basic_subject_id);
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array(
				'view_sbjt' => $view_sbjt,
				'view_single_basic_subject' => $view_single_basic_subject,
				'view_teacher' => $view_teacher,
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message
			);


				$this->load->view('header');					
				$this->load->view('admin/update_basic_subject', $data);
				$this->load->view('footer');

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		

	}

	public function update_basic_subject_validation($basic_subject_id){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			// $sbjt_id = $this->input->post('sbjt_id');
			$teacher_id = $this->input->post('teacher_id');
			$teacher_name = $this->Admin_model->view_teacher_id($teacher_id); 
				$this->Admin_model->update_basic_subject($basic_subject_id, $teacher_name); 
				$this->session->set_flashdata(
  				'msg','
						<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	              </button>
	              <i class="fa fa-check"></i>
	              <strong>Success!</strong> Subject was successfully updated.
	          </div>
				 '
			  ); 
				redirect("admin/basic_subjects");
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
	}

	public function students_of_this_subject($basic_subject_id = '',$sub_name = ''){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$current_basic_students = $this->Admin_model->current_basic_students($basic_subject_id);
				$students_of_this_subject = $this->Admin_model->students_of_this_subject($basic_subject_id);
				$basic_grade = $this->Admin_model->basic_grade($basic_subject_id);
				$view_subject = $this->Admin_model->view_subject($basic_subject_id);
				$view_basic_students = $this->Admin_model->view_basic_students();
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
				$view_all_message = $this->Admin_model->view_all_message();

				$data = array(
					'students_of_this_subject' => $students_of_this_subject, 
					'basic_subject_id' => $basic_subject_id, 
					'current_basic_students' => $current_basic_students,
					'view_subject' => $view_subject,
					'view_basic_students' => $view_basic_students,	
					'basic_grade'	=> $basic_grade,
					'sub_name' => urldecode($sub_name),
					'view_profile' => $view_profile,
					'message' => $message,
					'view_all_message' => $view_all_message
				);
				
					$this->load->view('header');					
					$this->load->view('admin/view_students_of_this_subject', $data);
					$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		

	}
	public function add_basic_student_to_subject_validation($stud_id='', $basic_subject_id='', $sub_name=''){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
				$check_student = $this->Admin_model->check_student($stud_id, $basic_subject_id);
				if (!$check_student) {
					redirect("admin/students_of_this_subject/".$basic_subject_id."/".$sub_name);
				} else{
					$this->Admin_model->add_basic_grade($stud_id, $basic_subject_id); 
					$this->Admin_model->add_basic_students_to_subject($stud_id, $basic_subject_id); 
					// $this->Admin_model->update_total_units($stud_id, $basic_subject_id); 
					$this->session->set_flashdata(
	  				'msg','
							<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <i class="fa fa-check"></i>
                <strong>Completed!</strong> Student was successfully added to this subject.
              </div>
					 '
				  ); 
					redirect("admin/students_of_this_subject/".$basic_subject_id."/".$sub_name);
			}
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
	}

	public function delete_subjects_students($stud_id='',$basic_subject_id='', $sub_name){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
		
			$this->Admin_model->delete_subjects_students($stud_id, $basic_subject_id);
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
				redirect("admin/students_of_this_subject/".$basic_subject_id."/".$sub_name);
			} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
	}
	public function update_basic_student_grade($stud_id, $basic_subject_id, $sub_name){
		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){

			$this->Admin_model->update_basic_student_grade($stud_id, $basic_subject_id, $sub_name); 
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<b><i class="fa fa-check"></i> Success: </b> Grade was Succesfully Updated.
				 </div>'
			); 
			redirect("admin/students_of_this_subject/".$basic_subject_id."/".$sub_name);
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
	public function basic_subjectz(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			// $semester = $this->input->post('semester');
			$school_year = $this->input->post('sy');

			$basic_subjectz = $this->Admin_model->basic_subjectz();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$school_yrs = $this->Admin_model->school_yrs();

			$data = array(
					'basic_subjectz' => $basic_subjectz, 
					'view_profile' => $view_profile,
					// 'semester' => $semester,
					'school_year' => $school_year,
					'message' => $message,
					'view_all_message' => $view_all_message,
					'school_yrs' => $school_yrs

				);

				$this->load->view('header');					
				$this->load->view('admin/basic_subjectz', $data);
				$this->load->view('footer');
				
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}
	public function delete_basic_subject($basic_subject_id){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$no_subrecords = $this->Admin_model->has_subject_recordss($basic_subject_id);
			if($no_subrecords)
			{
				$this->Admin_model->delete_basic_subject($basic_subject_id);
				$this->session->set_flashdata(
					'msg',
					'<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
	            <button type="button" class="close" data-dismiss="alert"
	                    aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	            <i class="fa fa-check"></i>
	            <strong>Deleted!</strong> Subject was successfully deleted.
	        </div>'
			  ); 
	  		redirect("admin/basic_subjects");
			}else{
				$this->session->set_flashdata(
					'msg',
					'<div class="alert alert-icon alert-warning alert-dismissible fade in" role="alert">
	            <button type="button" class="close" data-dismiss="alert"
	                    aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	            <i class="fa fa-check"></i>
	            <strong>Ooopps! You cannot delete this subject. Other datas will be affected if this is done.
	        </div> '
			  ); 
		  	redirect("admin/basic_subjects");
			}
				
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
	}
	public function view_basic_grade($stud_id){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
				$view_all_basic_subjects = $this->Admin_model->view_all_basic_subjects($stud_id);
				$view_single_basic_student = $this->Admin_model->view_single_basic_student($stud_id);
				$stud_info = $this->Admin_model->getstud_Info($stud_id);
				$api_info = $this->Admin_model->api_info();
				$parentNumber = $this->Admin_model->getParentNumber($stud_id);
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
				$view_all_message = $this->Admin_model->view_all_message();
				$school_yrs = $this->Admin_model->school_yrs();
				$data = array(
					'view_all_basic_subjects' => $view_all_basic_subjects,
					'view_single_basic_student' => $view_single_basic_student,
					'stud_info' => $stud_info,
					'api_info' => $api_info,
					'parentNumber' => $parentNumber,
					'stud_id' => $stud_id,
					'view_profile' => $view_profile,
					'message' => $message,
					'view_all_message' => $view_all_message,
					'school_yrs' => $school_yrs
				);

					$this->load->view('header');					
					$this->load->view('admin/view_basic_grade', $data);
					$this->load->view('footer');
				
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}
	public function admin_search_basic_stud_sub($stud_id){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$sy = $this->input->post('sy');

			$view_all_basic_subjects = $this->Admin_model->view_all_basic_subjects($stud_id);
			$view_single_basic_student = $this->Admin_model->view_single_basic_student($stud_id);
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$school_yrs = $this->Admin_model->school_yrs();
			$basic_student_search_sub = $this->Admin_model->basic_student_search_sub($stud_id);

			$data = array(
				'sy' => $sy,
				'view_all_basic_subjects' => $view_all_basic_subjects,
				'view_single_basic_student' => $view_single_basic_student,
				'stud_id' => $stud_id,
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'school_yrs' => $school_yrs,
				'basic_student_search_sub' => $basic_student_search_sub
			);	

				$this->load->view('header');					
				$this->load->view('admin/admin_search_basic_stud_sub', $data);
				$this->load->view('footer');
				
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}
	public function print_basic_student_grade($stud_id, $stud_name, $year_level)
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$stud_name = urldecode($stud_name); 
			$view_all_basic_subjects = $this->Admin_model->view_all_basic_subjects($stud_id);
			$view_single_basic_student = $this->Admin_model->view_single_basic_student($stud_id);
			$data = array(
				'stud_name' => urldecode($stud_name),
				'year_level' => urldecode($year_level),
				'stud_id' => $stud_id,
				'view_all_basic_subjects' => $view_all_basic_subjects,
				'view_single_basic_student' => $view_single_basic_student
			);
			
			$this->load->view('admin/print_basic_student_grade', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function delete_basic_student($stud_id){
		
	if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
		$no_studrecords = $this->Admin_model->has_student_record($stud_id);
		if(!$no_studrecords)
		{
			$this->Admin_model->delete_basic_student($stud_id);
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
	          <button type="button" class="close" data-dismiss="alert"
	                  aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	          </button>
	          <i class="fa fa-check"></i>
	          <strong>Deleted!</strong> Student was successfully deleted.
	      </div>'
		  ); 
	  	redirect("admin/current_basic_students");
		}else{
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-icon alert-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert"
                    aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-check"></i>
            <strong>Ooopps! You cannot delete this student. Other datas will be affected if this is done.
        </div> '
		  ); 
	  	redirect("admin/current_basic_students");
		}		
	} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
	}
	//---------------end basic--------------------
	public function view_student_grade($stud_id){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
				$view_all_subjects = $this->Admin_model->view_all_subjects($stud_id);
				$student_current_subjects = $this->Admin_model->student_current_subjects($stud_id);
				$studinfo = $this->Admin_model->getstudInfo($stud_id);
				$view_students_units = $this->Admin_model->view_students_units($stud_id);
				$view_single_student = $this->Admin_model->view_single_student($stud_id);
				$ave_grade = $this->Admin_model->ave_grade($stud_id);
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
				$view_sub_taken = $this->Admin_model->view_sub_taken($stud_id);
				$sub_taken_ave = $this->Admin_model->sub_taken_ave($stud_id);
				$view_all_message = $this->Admin_model->view_all_message();
				$school_years = $this->Admin_model->school_years();
				$api_info = $this->Admin_model->api_info();
				$parent_number = $this->Admin_model->get_parent_number($stud_id);
				$data = array(
					'view_all_subjects' => $view_all_subjects,
					'student_current_subjects' => $student_current_subjects,
					'view_single_student' => $view_single_student,
					'ave_grade' => $ave_grade,
					'view_students_units' => $view_students_units,
					'stud_id' => $stud_id,
					'view_profile' => $view_profile,
					'message' => $message,
					'view_all_message' => $view_all_message,
					'view_sub_taken' => $view_sub_taken,
					'sub_taken_ave' => $sub_taken_ave,
					'school_years' => $school_years,
					'api_info' => $api_info,
					'parent_number' => $parent_number,
					'studinfo'	=> $studinfo
				);

					$this->load->view('header');					
					$this->load->view('admin/view_student_grade', $data);
					$this->load->view('footer');
				
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}
	//for sending msg autoload
	public function getstudDatas($stud_id)
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$view_single_student = $this->Admin_model->getstudInfo($stud_id);
			$student_current_subjects = $this->Admin_model->student_current_subjects($stud_id);
			$datas = array(
				"info" => $view_single_student,
				"sbjct_grds" => $student_current_subjects
			);
			echo json_encode($datas);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}
	}
	public function get_student_info($stud_id)
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$viewSingleStudent = $this->Admin_model->getstud_Info($stud_id);
			$studentCurrentSubjects = $this->Admin_model->studentCurrentSubjects($stud_id);
			$datas = array(
				"student_info" => $viewSingleStudent,
				"studCurrentGrades" => $studentCurrentSubjects
			);
			echo json_encode($datas);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}
	}
	public function college_subjects(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$semester = $this->input->post('semester');
			$school_year = $this->input->post('sy');

			$view_search = $this->Admin_model->view_search($semester);
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$school_years = $this->Admin_model->school_years();

			$data = array(
					'view_search' => $view_search, 
					'view_profile' => $view_profile,
					'semester' => $semester,
					'school_year' => $school_year,
					'message' => $message,
					'view_all_message' => $view_all_message,
					'school_years' => $school_years

				);

				$this->load->view('header');					
				$this->load->view('admin/college_subjects', $data);
				$this->load->view('footer');
				
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}

	public function search_teacher_subjects($teacher_id,$fname){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$semester = $this->input->post('semester');
			$sy = $this->input->post('sy');

			$search_teacher_subjects = $this->Admin_model->search_teacher_subjects($teacher_id);
			$view_searchss = $this->Admin_model->view_searchss($teacher_id);
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$school_years = $this->Admin_model->school_years();

			$data = array(
				'semester' => $semester,
				'sy' => $sy,
				'search_teacher_subjects' => $search_teacher_subjects,
				'view_searchss' => $view_searchss, 
				'fname' => urldecode($fname),	
				'teacher_id' => $teacher_id,
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'school_years' => $school_years
			);

				$this->load->view('header');					
				$this->load->view('admin/search_teacher_subjects', $data);
				$this->load->view('footer');
				
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}
	public function admin_search_stud_sub($stud_id){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$semester = $this->input->post('semester');
			$sy = $this->input->post('sy');

			$view_all_subjects = $this->Admin_model->view_all_subjects($stud_id);
			$view_students_units = $this->Admin_model->view_students_units($stud_id);
			$view_single_student = $this->Admin_model->view_single_student($stud_id);
			$ave_grade = $this->Admin_model->ave_grade($stud_id);
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_sub_taken = $this->Admin_model->view_sub_taken($stud_id);
			$sub_taken_ave = $this->Admin_model->sub_taken_ave($stud_id);
			$view_all_message = $this->Admin_model->view_all_message();
			$school_years = $this->Admin_model->school_years();
			$student_search_sub = $this->Admin_model->student_search_sub($stud_id);

			$data = array(
				'semester' => $semester,
				'sy' => $sy,
				'view_all_subjects' => $view_all_subjects,
				'view_single_student' => $view_single_student,
				'ave_grade' => $ave_grade,
				'view_students_units' => $view_students_units,
				'stud_id' => $stud_id,
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'view_sub_taken' => $view_sub_taken,
				'sub_taken_ave' => $sub_taken_ave,
				'school_years' => $school_years,
				'student_search_sub' => $student_search_sub
			);	

				$this->load->view('header');					
				$this->load->view('admin/admin_search_stud_sub', $data);
				$this->load->view('footer');
				
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}

	public function delete_student($stud_id){
		
	if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
		$no_studrecords = $this->Admin_model->has_student_records($stud_id);
		if(!$no_studrecords)
		{
			$this->Admin_model->delete_student($stud_id);
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
	          <button type="button" class="close" data-dismiss="alert"
	                  aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	          </button>
	          <i class="fa fa-check"></i>
	          <strong>Deleted!</strong> Student was successfully deleted.
	      </div>'
		  ); 
	  	redirect("admin/view_students");
		}else{
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-icon alert-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert"
                    aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-check"></i>
            <strong>Ooopps! You cannot delete this student. Other datas will be affected if this is done.
        </div> '
		  ); 
	  	redirect("admin/view_students");
		}		
	} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
	}
	public function add_bulk_sub($stud_id){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_single_student = $this->Admin_model->view_single_student($stud_id);
			$view_sub_taken = $this->Admin_model->view_sub_taken($stud_id);
			$view_sbjt = $this->Admin_model->view_sbjt();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array(
				'view_single_student' => $view_single_student,
				'view_sub_taken' => $view_sub_taken,
				'view_profile' => $view_profile,
				'view_sbjt' => $view_sbjt,
				'message' => $message,
				'view_all_message' => $view_all_message
			);
			
			$this->load->view('header');					
			$this->load->view('admin/add_bulk_sub', $data);
			$this->load->view('footer');

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		

	}
	public function delete_sub_taken($id, $stud_id, $sub_id){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			
			$this->Admin_model->delete_sub_taken($id, $stud_id, $sub_id);
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
		            <button type="button" class="close" data-dismiss="alert"
		                    aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		            </button>
		            <i class="fa fa-check"></i>
		            <strong>Deleted!</strong> Subject was successfully deleted.
		        </div>'
		  ); 
  		redirect("admin/add_bulk_sub/".$stud_id);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
	}
	public function add_sub_taken(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$this->Admin_model->add_sub_taken();
			$stud_id = $this->input->post('stud_id');
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-check"></i>
            <strong>Success</strong> Subject Added Succesfully.
          </div>
				'
				);
			redirect('admin/add_bulk_sub/'.$stud_id);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
		

	}
	public function view_subjects(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_subjects = $this->Admin_model->view_subjects();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$school_years = $this->Admin_model->school_years();

			$data = array(
				'view_subjects' => $view_subjects, 
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'school_years' => $school_years
			);
			
			$this->load->view('header');					
			$this->load->view('admin/view_subjects', $data);
			$this->load->view('footer');

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		

	}
	public function view_all_sub(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_all_subjects = $this->Admin_model->view_all_sub();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$school_years = $this->Admin_model->school_years();
			$data = array(
				'view_all_subjects' => $view_all_subjects, 
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'school_years' => $school_years
			);
			
			$this->load->view('header');					
			$this->load->view('admin/view_all_sub', $data);
			$this->load->view('footer');

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		

	}

	public function admin_update_subject($sub_id){
			
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_sbjt = $this->Admin_model->view_sbjt();
			$view_teacher = $this->Admin_model->view_teacher();
			$view_subjects = $this->Admin_model->view_single_subject($sub_id);
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array(
				'view_sbjt' => $view_sbjt,
				'view_subjects' => $view_subjects,
				'view_teacher' => $view_teacher,
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message
			);


				$this->load->view('header');					
				$this->load->view('admin/admin_update_subject', $data);
				$this->load->view('footer');

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		

	}

	public function update_subject_validation($sub_id){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$sbjt_id = $this->input->post('sbjt_id');
			$teacher_id = $this->input->post('teacher_id');
			$teacher_name = $this->Admin_model->view_teacher_id($teacher_id); 
				$this->Admin_model->update_subject($sub_id, $sbjt_id, $teacher_name); 
				$this->session->set_flashdata(
  				'msg','
						<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	              </button>
	              <i class="fa fa-check"></i>
	              <strong>Success!</strong> Teacher was successfully updated.
	          </div>
				 '
			  ); 
				redirect("admin/view_all_sub");
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
	}

	public function delete_subject($sub_id){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$no_subrecords = $this->Admin_model->has_subject_records($sub_id);
			if($no_subrecords)
			{
				$this->Admin_model->delete_subject($sub_id);
				$this->session->set_flashdata(
					'msg',
					'<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
	            <button type="button" class="close" data-dismiss="alert"
	                    aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	            <i class="fa fa-check"></i>
	            <strong>Deleted!</strong> Subject was successfully deleted.
	        </div>'
			  ); 
	  		redirect("admin/view_subjects");
			}else{
				$this->session->set_flashdata(
					'msg',
					'<div class="alert alert-icon alert-warning alert-dismissible fade in" role="alert">
	            <button type="button" class="close" data-dismiss="alert"
	                    aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	            <i class="fa fa-check"></i>
	            <strong>Ooopps! You cannot delete this subject. Other datas will be affected if this is done.
	        </div> '
			  ); 
		  	redirect("admin/view_subjects");
			}
				
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
	}

	public function delete_sbjt($sbjt_id){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			
			$this->Admin_model->delete_sbjt($sbjt_id);
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
		            <button type="button" class="close" data-dismiss="alert"
		                    aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		            </button>
		            <i class="fa fa-check"></i>
		            <strong>Deleted!</strong> Subject was successfully deleted.
		        </div>'
		  ); 
  		redirect("admin/view_sbjt");
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
	}

	public function view_student_of_this_subject($sub_id = '',$sub_name = ''){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$view_students = $this->Admin_model->view_students();
				$view_students_of_this_subject = $this->Admin_model->view_students_of_this_subject($sub_id);
				$join_grades = $this->Admin_model->join_Grades($sub_id);
				$view_subject = $this->Admin_model->view_subject($sub_id);
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
				$view_all_message = $this->Admin_model->view_all_message();

				$data = array(
					'view_students_of_this_subject' => $view_students_of_this_subject, 
					'sub_id' => $sub_id, 
					'view_students' => $view_students,
					'view_subject' => $view_subject,	
					'join_grades'	=> $join_grades,
					'sub_name' => urldecode($sub_name),
					'view_profile' => $view_profile,
					'message' => $message,
					'view_all_message' => $view_all_message
				);
				
					$this->load->view('header');					
					$this->load->view('admin/view_subject_students', $data);
					$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		

	}

	public function update_student_grade($stud_id, $sub_id, $sub_name, $cl_qualified){
		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){

			$this->Admin_model->update_student_grade($stud_id, $sub_id, $sub_name, $cl_qualified); 
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<b><i class="fa fa-check"></i> Success: </b> Grade was Succesfully Updated.
				 </div>'
			); 
			redirect("admin/view_student_of_this_subject/".$sub_id."/".$sub_name);
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

	public function update_student_grade2($stud_id, $sub_id, $sub_name, $cl_qualified){
		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){

			$this->Admin_model->update_student_grade2($stud_id, $sub_id, $sub_name, $cl_qualified); 
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<b><i class="fa fa-check"></i> Success: </b> Grade was Succesfully Updated.
				 </div>'
			); 
			redirect("admin/admin_reports");
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

	public function add_student_to_subject_validation($stud_id='', $sub_id='', $sub_name=''){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
				$check_student = $this->Admin_model->check_student($stud_id, $sub_id);
				if (!$check_student) {
					redirect("admin/view_student_of_this_subject/".$sub_id."/".$sub_name);
				} else{
					$this->Admin_model->add_grade($stud_id, $sub_id); 
					$this->Admin_model->add_student_to_subject($stud_id, $sub_id); 
					$this->Admin_model->update_total_units($stud_id, $sub_id); 
					$this->session->set_flashdata(
	  				'msg','
							<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <i class="fa fa-check"></i>
                <strong>Completed!</strong> Student was successfully added to this subject.
              </div>
					 '
				  ); 
					redirect("admin/view_student_of_this_subject/".$sub_id."/".$sub_name);
			}
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
	}

	public function delete_subjects_student($stud_id='',$sub_id='', $sub_name){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
		
			$this->Admin_model->delete_subjects_student($stud_id, $sub_id);
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
				redirect("admin/view_student_of_this_subject/".$sub_id."/".$sub_name);
			} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}		
	}

	public function print_single_stud_grade($stud_id, $sub_id)
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$print_single_stud_grade = $this->Admin_model->print_single_stud_grade($stud_id, $sub_id);
			$data = array(
				'print_single_stud_grade' => $print_single_stud_grade,
				'stud_id' => $stud_id
			);
			$this->load->view('admin/print_single_stud_grade', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function print_student_grade($stud_id, $stud_name, $year, $course)
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$stud_name = urldecode($stud_name); 
			$view_all_subjects = $this->Admin_model->view_all_subjects($stud_id);
			$view_students_units = $this->Admin_model->view_students_units($stud_id);
			$view_single_student = $this->Admin_model->view_single_student($stud_id);
			$ave_grade = $this->Admin_model->ave_grade($stud_id);
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_sub_taken = $this->Admin_model->view_sub_taken($stud_id);
			$sub_taken_ave = $this->Admin_model->sub_taken_ave($stud_id);
			$view_all_message = $this->Admin_model->view_all_message();
			$school_years = $this->Admin_model->school_years();
			$data = array(
				'view_all_subjects' => $view_all_subjects,
				'view_single_student' => $view_single_student,
				'ave_grade' => $ave_grade,
				'view_students_units' => $view_students_units,
				'stud_id' => $stud_id,
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'view_sub_taken' => $view_sub_taken,
				'sub_taken_ave' => $sub_taken_ave,
				'school_years' => $school_years,
				'stud_name' => urldecode($stud_name),
				'year' => urldecode($year),
				'course' => urldecode($course),
				'stud_id' => $stud_id
			);
			
			$this->load->view('admin/print_student_grade', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function print_all_student()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$view_student = $this->Admin_model->view_all_student();
			$data = array('view_student' => $view_student);
			
			$this->load->view('admin/print_all_student', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function print_all_current_students()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$view_current_students = $this->Admin_model->view_current_students();
			$data = array('view_current_students' => $view_current_students);
			
			$this->load->view('admin/print_all_current_students', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function print_all_teachers()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

			$view_teacher = $this->Admin_model->view_teacher();
			$data = array('view_teacher' => $view_teacher);

				$this->load->view('admin/print_all_teachers', $data);

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function print_all_current_teachers()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

			$view_current_teachers = $this->Admin_model->view_current_teachers();
			$data = array('view_current_teachers' => $view_current_teachers);

				$this->load->view('admin/print_all_current_teachers', $data);

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function print_all_subjects(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_subjects = $this->Admin_model->view_subjects();
			$data = array('view_subjects' => $view_subjects);
								
			$this->load->view('admin/print_all_subjects', $data);

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}

	public function print_current_sub(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_subjects = $this->Admin_model->view_subjects();
			$data = array('view_subjects' => $view_subjects);
								
			$this->load->view('admin/print_current_sub', $data);

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}

	public function print_students_under_this_subject($sub_id = '',$sub_name = ''){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$view_student = $this->Admin_model->view_student();
				$view_students_of_this_subject = $this->Admin_model->view_students_of_this_subject($sub_id);
				$join_grades = $this->Admin_model->join_Grades($sub_id);
				$view_subject = $this->Admin_model->view_subject($sub_id);
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

				$data = array(
					'view_students_of_this_subject' => $view_students_of_this_subject, 
					'sub_id' => $sub_id, 
					'view_student' => $view_student,
					'view_subject' => $view_subject,	
					'join_grades'	=> $join_grades,
					'sub_name' => urldecode($sub_name),
					'view_profile' => $view_profile,
					);	
								
					$this->load->view('admin/print_students_under_this_subject', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}

	public function print_current_prelim_grades($sub_id = '',$sub_name = ''){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$view_student = $this->Admin_model->view_student();
				$view_students_of_this_subject = $this->Admin_model->view_students_of_this_subject($sub_id);
				$prelim_grades = $this->Admin_model->prelim_grades($sub_id);
				$view_subject = $this->Admin_model->view_subject($sub_id);
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
				$view_all_message = $this->Admin_model->view_all_message();

				$data = array(
					'view_students_of_this_subject' => $view_students_of_this_subject, 
					'sub_id' => $sub_id, 
					'view_student' => $view_student,
					'view_subject' => $view_subject,	
					'prelim_grades'	=> $prelim_grades,
					'sub_name' => urldecode($sub_name),
					'view_profile' => $view_profile,
					);	
								
					$this->load->view('admin/print_current_prelim_grades', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}
	public function print_current_midterm_grades($sub_id = '',$sub_name = ''){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$view_student = $this->Admin_model->view_student();
				$view_students_of_this_subject = $this->Admin_model->view_students_of_this_subject($sub_id);
				$midterm_grades = $this->Admin_model->midterm_grades($sub_id);
				$view_subject = $this->Admin_model->view_subject($sub_id);
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
				$view_all_message = $this->Admin_model->view_all_message();

				$data = array(
					'view_students_of_this_subject' => $view_students_of_this_subject, 
					'sub_id' => $sub_id, 
					'view_student' => $view_student,
					'view_subject' => $view_subject,	
					'midterm_grades'	=> $midterm_grades,
					'sub_name' => urldecode($sub_name),
					'view_profile' => $view_profile,
					);	
								
					$this->load->view('admin/print_current_midterm_grades', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}
	public function print_current_semi_final_grades($sub_id = '',$sub_name = ''){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$view_student = $this->Admin_model->view_student();
				$view_students_of_this_subject = $this->Admin_model->view_students_of_this_subject($sub_id);
				$semi_final_grades = $this->Admin_model->semi_final_grades($sub_id);
				$view_subject = $this->Admin_model->view_subject($sub_id);
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
				$view_all_message = $this->Admin_model->view_all_message();

				$data = array(
					'view_students_of_this_subject' => $view_students_of_this_subject, 
					'sub_id' => $sub_id, 
					'view_student' => $view_student,
					'view_subject' => $view_subject,	
					'semi_final_grades'	=> $semi_final_grades,
					'sub_name' => urldecode($sub_name),
					'view_profile' => $view_profile,
					);	
								
					$this->load->view('admin/print_current_semi_final_grades', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}
	public function print_current_final_grades($sub_id = '',$sub_name = ''){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$view_student = $this->Admin_model->view_student();
				$view_students_of_this_subject = $this->Admin_model->view_students_of_this_subject($sub_id);
				$final_grades = $this->Admin_model->final_grades($sub_id);
				$view_subject = $this->Admin_model->view_subject($sub_id);
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
				$view_all_message = $this->Admin_model->view_all_message();

				$data = array(
					'view_students_of_this_subject' => $view_students_of_this_subject, 
					'sub_id' => $sub_id, 
					'view_student' => $view_student,
					'view_subject' => $view_subject,	
					'final_grades'	=> $final_grades,
					'sub_name' => urldecode($sub_name),
					'view_profile' => $view_profile,
					);	
								
					$this->load->view('admin/print_current_final_grades', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}

	public function print_single_student_grade_under_this_subject($sub_id = '',$sub_name = '', $stud_id){
		
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$view_student = $this->Admin_model->view_student();
				$view_students_of_this_subject = $this->Admin_model->view_students_of_this_subject($sub_id);
				$print_single_student_grade_under_this_subject = $this->Admin_model->print_single_student_grade_under_this_subject($sub_id, $stud_id);
				$view_subject = $this->Admin_model->view_subject($sub_id);
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

				$data = array(
					'view_students_of_this_subject' => $view_students_of_this_subject, 
					'sub_id' => $sub_id, 
					'view_student' => $view_student,
					'view_subject' => $view_subject,	
					'print_single_student_grade_under_this_subject'	=> $print_single_student_grade_under_this_subject,
					'sub_name' => urldecode($sub_name),
					'stud_id' => $stud_id,

					'view_profile' => $view_profile
					);	
								
					$this->load->view('admin/print_single_student_grade_under_this_subject', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}


	public function admin_print_teacher_subjects($teacher_id, $fname)
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$admin_print_teacher_subjects = $this->Admin_model->admin_print_teacher_subjects($teacher_id);
			$data = array(
				'admin_print_teacher_subjects' => $admin_print_teacher_subjects,
				'fname' => urldecode($fname)
			);
			
			$this->load->view('admin/admin_print_teacher_subjects', $data);
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}


	public function view_bsit_students()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_bsit_students = $this->Admin_model->view_bsit_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array(
				'view_bsit_students' => $view_bsit_students,
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message
			);
			$this->load->view('header');
			$this->load->view('admin/view_bsit_students', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function print_all_bsit_student()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_bsit_students = $this->Admin_model->view_bsit_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array(
				'view_bsit_students' => $view_bsit_students,
				'view_profile' => $view_profile
			);
			$this->load->view('header');
			$this->load->view('admin/print_all_bsit_student', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function view_ab_english_students()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_ab_english_students = $this->Admin_model->view_ab_english_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array(
				'view_ab_english_students' => $view_ab_english_students,
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message
			);
			$this->load->view('header');
			$this->load->view('admin/view_ab_english_students', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function print_all_ab_english_student()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_ab_english_students = $this->Admin_model->view_ab_english_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array(
				'view_ab_english_students' => $view_ab_english_students,
				'view_profile' => $view_profile
			);
			$this->load->view('header');
			$this->load->view('admin/print_all_ab_english_student', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function view_bsba_students()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_bsba_students = $this->Admin_model->view_bsba_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array(
				'view_bsba_students' => $view_bsba_students,
				'view_profile' => $view_profile,
				'message' => $message,
				'view_all_message' => $view_all_message
			);
			$this->load->view('header');
			$this->load->view('admin/view_bsba_students', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function print_all_bsba_student()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_bsba_students = $this->Admin_model->view_bsba_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();


			$data = array(
				'view_bsba_students' => $view_bsba_students,
				'view_profile' => $view_profile

			);
			$this->load->view('header');
			$this->load->view('admin/print_all_bsba_student', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function view_polsci_students()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_polsci_students = $this->Admin_model->view_polsci_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$count_reports = $this->Admin_model->count_reports();
			$data = array(
				'view_polsci_students' => $view_polsci_students,
				'view_profile' => $view_profile,
				'count_reports' => $count_reports,
				'message' => $message,
				'view_all_message' => $view_all_message
			);
			$this->load->view('header');
			$this->load->view('admin/view_polsci_students', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function print_all_polsci_student()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_polsci_students = $this->Admin_model->view_polsci_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$count_reports = $this->Admin_model->count_reports();
			$data = array(
				'view_polsci_students' => $view_polsci_students,
				'view_profile' => $view_profile,
				'count_reports' => $count_reports
			);
			$this->load->view('header');
			$this->load->view('admin/print_all_polsci_student', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function view_ab_psychology_students()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_ab_psychology_students = $this->Admin_model->view_ab_psychology_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$count_reports = $this->Admin_model->count_reports();
			$data = array(
				'view_ab_psychology_students' => $view_ab_psychology_students,
				'view_profile' => $view_profile,
				'count_reports' => $count_reports,
				'message' => $message,
				'view_all_message' => $view_all_message
			);
			$this->load->view('header');
			$this->load->view('admin/view_ab_psychology_students', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function print_all_ab_psychology_student()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_ab_psychology_students = $this->Admin_model->view_ab_psychology_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$count_reports = $this->Admin_model->count_reports();
			$data = array(
				'view_ab_psychology_students' => $view_ab_psychology_students,
				'view_profile' => $view_profile,
				'count_reports' => $count_reports
			);
			$this->load->view('header');
			$this->load->view('admin/print_all_ab_psychology_student', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function view_bs_crim_students()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_bs_crim_students = $this->Admin_model->view_bs_crim_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$count_reports = $this->Admin_model->count_reports();
			$data = array(
				'view_bs_crim_students' => $view_bs_crim_students,
				'view_profile' => $view_profile,
				'count_reports' => $count_reports,
				'message' => $message,
				'view_all_message' => $view_all_message
			);
			$this->load->view('header');
			$this->load->view('admin/view_bs_crim_students', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function print_all_crim_student()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_bs_crim_students = $this->Admin_model->view_bs_crim_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$count_reports = $this->Admin_model->count_reports();
			$data = array(
				'view_bs_crim_students' => $view_bs_crim_students,
				'view_profile' => $view_profile,
				'count_reports' => $count_reports
			);
			$this->load->view('header');
			$this->load->view('admin/print_all_crim_student', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function view_hrm_students()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_hrm_students = $this->Admin_model->view_hrm_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$count_reports = $this->Admin_model->count_reports();
			$data = array(
				'view_hrm_students' => $view_hrm_students,
				'view_profile' => $view_profile,
				'count_reports' => $count_reports,
				'message' => $message,
				'view_all_message' => $view_all_message
			);
			$this->load->view('header');
			$this->load->view('admin/view_hrm_students', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function print_all_hrm_student()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_hrm_students = $this->Admin_model->view_hrm_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$count_reports = $this->Admin_model->count_reports();
			$data = array(
				'view_hrm_students' => $view_hrm_students,
				'view_profile' => $view_profile,
				'count_reports' => $count_reports,
				'message' => $message,
				'view_all_message' => $view_all_message
			);
			$this->load->view('header');
			$this->load->view('admin/print_all_hrm_student', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function view_beed_students()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_beed_students = $this->Admin_model->view_beed_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$count_reports = $this->Admin_model->count_reports();
			$data = array(
				'view_beed_students' => $view_beed_students,
				'view_profile' => $view_profile,
				'count_reports' => $count_reports,
				'message' => $message,
				'view_all_message' => $view_all_message
			);
			$this->load->view('header');
			$this->load->view('admin/view_beed_students', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function print_all_beed_student()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_beed_students = $this->Admin_model->view_beed_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$count_reports = $this->Admin_model->count_reports();
			$data = array(
				'view_beed_students' => $view_beed_students,
				'view_profile' => $view_profile,
				'count_reports' => $count_reports,
			);
			$this->load->view('header');
			$this->load->view('admin/print_all_beed_student', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function view_bsed_students()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_bsed_students = $this->Admin_model->view_bsed_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$count_reports = $this->Admin_model->count_reports();
			$data = array(
				'view_bsed_students' => $view_bsed_students,
				'view_profile' => $view_profile,
				'count_reports' => $count_reports,
				'message' => $message,
				'view_all_message' => $view_all_message	
			);
			$this->load->view('header');
			$this->load->view('admin/view_bsed_students', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function print_all_bsed_student()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$view_bsed_students = $this->Admin_model->view_bsed_students();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$count_reports = $this->Admin_model->count_reports();
			$data = array(
				'view_bsed_students' => $view_bsed_students,
				'view_profile' => $view_profile,
				'count_reports' => $count_reports
			);
			$this->load->view('header');
			$this->load->view('admin/print_all_bsed_student', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function com_laude_candidates()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$com_laude_candidates = $this->Admin_model->com_laude_candidates();
			$view_student = $this->Admin_model->view_student();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$school_years = $this->Admin_model->school_years();

			$count_reports = $this->Admin_model->count_reports();
			$distinct = $this->Admin_model->distinct_cl_candid();
			$current_cl_candid = $this->Admin_model->current_cl_candid();
			$sub_taken_average = $this->Admin_model->sub_taken_average();
			$data = array(
				'com_laude_candidates' => $com_laude_candidates,
				'view_student' => $view_student,
				'view_profile' => $view_profile,
				'count_reports' => $count_reports,
				'distinct'	=> $distinct,
				'sub_taken_average'	=> $sub_taken_average,
				'current_cl_candid'	=> $current_cl_candid,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'school_years' => $school_years
			);
			$this->load->view('header');
			$this->load->view('admin/com_laude_candidates', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function search_honors()
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$school_year = $this->input->post('sy');
			$search_honors = $this->Admin_model->search_honors();
			$view_student = $this->Admin_model->view_student();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$school_years = $this->Admin_model->school_years();

			$count_reports = $this->Admin_model->count_reports();
			$distinct = $this->Admin_model->distinct_cl_candid();
			$current_cl_candid = $this->Admin_model->current_cl_candid();
			$data = array(
				'school_year' => $school_year,
				'search_honors' => $search_honors,
				'view_student' => $view_student,
				'view_profile' => $view_profile,
				'count_reports' => $count_reports,
				'distinct'		=> $distinct,
				'current_cl_candid'		=> $current_cl_candid,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'school_years' => $school_years
			);
			$this->load->view('header');
			$this->load->view('admin/search_honors', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function print_search_honor_student($school_year)
	{
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			$print_search_honor_student = $this->Admin_model->search_honors($school_year);
			$view_student = $this->Admin_model->view_student();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$school_years = $this->Admin_model->school_years();

			$count_reports = $this->Admin_model->count_reports();
			$distinct = $this->Admin_model->distinct_cl_candid();
			$current_cl_candid = $this->Admin_model->current_cl_candid();
			$data = array(
				'school_year' => $school_year,
				'print_search_honor_student' => $print_search_honor_student,
				'view_student' => $view_student,
				'view_profile' => $view_profile,
				'count_reports' => $count_reports,
				'distinct'		=> $distinct,
				'current_cl_candid'		=> $current_cl_candid,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'school_years' => $school_years
			);
			$this->load->view('header');
			$this->load->view('admin/print_search_honor_student', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function prelim_dlist(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$view_student = $this->Admin_model->view_student();
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
				$view_all_message = $this->Admin_model->view_all_message();
				$school_years = $this->Admin_model->school_years();

				$prelim = $this->Admin_model->prelim_dlist();
				$count_reports = $this->Admin_model->count_reports();

				$data = array(
					'view_profile' => $view_profile,
					'view_student' => $view_student,
					'prelim' => $prelim,
					'count_reports' => $count_reports,
					'message' => $message,
					'view_all_message' => $view_all_message,
					'school_years' => $school_years
				);
				$this->load->view('header');					
				$this->load->view('admin/prelim_dlist', $data);
				$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
	          <button type="button" class="close" data-dismiss="alert"
	                  aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	          </button>
	          <i class="fa fa-times"></i>
	          <strong>Sorry!</strong> You cannot access this page, please log in first.
	      </div>'
			);
			redirect('login/index');
		}	
	}
	public function search_prelim_dlist(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$sem = $this->input->post('semester');
			$school_year = $this->input->post('sy');

			$view_student = $this->Admin_model->view_student();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$school_years = $this->Admin_model->school_years();
			$count_reports = $this->Admin_model->count_reports();
			$search_prelim_dlist = $this->Admin_model->search_prelim_dlist();

			$data = array(
				'sem' => $sem,
				'school_year' => $school_year,
				'view_profile' => $view_profile,
				'view_student' => $view_student,
				'count_reports' => $count_reports,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'school_years' => $school_years,
				'search_prelim_dlist' => $search_prelim_dlist
			);	

				$this->load->view('header');					
				$this->load->view('admin/prelim_dl_search', $data);
				$this->load->view('footer');
				
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}
	public function print_search_prelim_dl($school_year, $sem){
		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$print_search_prelim_dlist = $this->Admin_model->print_search_prelim_dlist($school_year, $sem);
			$data = array(
				'school_year' => $school_year,
				'sem' => urldecode($sem),
				'print_search_prelim_dlist' => $print_search_prelim_dlist,
			);	

				$this->load->view('header');					
				$this->load->view('admin/print_search_prelim_dl', $data);
				$this->load->view('footer');
				
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}
	public function print_prelim_dlist(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$prelim = $this->Admin_model->prelim_dlist();

				$data = array(
					'prelim' => $prelim
				);
				$this->load->view('header');					
				$this->load->view('admin/print_prelim_dlist', $data);
				$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
	          <button type="button" class="close" data-dismiss="alert"
	                  aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	          </button>
	          <i class="fa fa-times"></i>
	          <strong>Sorry!</strong> You cannot access this page, please log in first.
	      </div>'
			);
			redirect('login/index');
		}	
	}
	public function midterm_dlist(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$view_student = $this->Admin_model->view_student();
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
				$view_all_message = $this->Admin_model->view_all_message();
				$school_years = $this->Admin_model->school_years();

				$midterm = $this->Admin_model->midterm_dlist();
				$count_reports = $this->Admin_model->count_reports();

				$data = array(
					'view_profile' => $view_profile,
					'view_student' => $view_student,
					'midterm'=> $midterm,
					'count_reports' => $count_reports,
					'message' => $message,
					'view_all_message' => $view_all_message,
					'school_years' => $school_years
				);
				$this->load->view('header');					
				$this->load->view('admin/midterm_dlist', $data);
				$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
	          <button type="button" class="close" data-dismiss="alert"
	                  aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	          </button>
	          <i class="fa fa-times"></i>
	          <strong>Sorry!</strong> You cannot access this page, please log in first.
	      </div>'
			);
			redirect('login/index');
		}	
	}
	public function search_midterm_dlist(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$sem = $this->input->post('semester');
			$school_year = $this->input->post('sy');

			$view_student = $this->Admin_model->view_student();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$school_years = $this->Admin_model->school_years();
			$count_reports = $this->Admin_model->count_reports();
			$search_midterm_dlist = $this->Admin_model->search_midterm_dlist();

			$data = array(
				'sem' => $sem,
				'school_year' => $school_year,
				'view_profile' => $view_profile,
				'view_student' => $view_student,
				'count_reports' => $count_reports,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'school_years' => $school_years,
				'search_midterm_dlist' => $search_midterm_dlist
			);	

				$this->load->view('header');					
				$this->load->view('admin/midterm_dl_search', $data);
				$this->load->view('footer');
				
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}
	public function print_search_midterm_dl($sem, $school_year){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$print_search_midterm_dlist = $this->Admin_model->print_search_midterm_dlist($sem, $school_year);
			$data = array(
				'sem' => urldecode($sem),
				'school_year' => $school_year,
				'print_search_midterm_dlist' => $print_search_midterm_dlist,
			);	

				$this->load->view('header');					
				$this->load->view('admin/print_search_midterm_dl', $data);
				$this->load->view('footer');
				
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}
	public function print_midterm_dlist(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$view_student = $this->Admin_model->view_student();
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
				$view_all_message = $this->Admin_model->view_all_message();

				$midterm = $this->Admin_model->midterm_dlist();
				$count_reports = $this->Admin_model->count_reports();

				$data = array(
					'view_profile' => $view_profile,
					'view_student' => $view_student,
					'midterm'=> $midterm,
					'count_reports' => $count_reports,
					'message' => $message,
					'view_all_message' => $view_all_message

				);
				$this->load->view('header');					
				$this->load->view('admin/print_midterm_dlist', $data);
				$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
	          <button type="button" class="close" data-dismiss="alert"
	                  aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	          </button>
	          <i class="fa fa-times"></i>
	          <strong>Sorry!</strong> You cannot access this page, please log in first.
	      </div>'
			);
			redirect('login/index');
		}	
	}
	public function sfinal_dlist(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$view_student = $this->Admin_model->view_student();
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
				$view_all_message = $this->Admin_model->view_all_message();
				$sfinal = $this->Admin_model->sfinal_dlist();
				$count_reports = $this->Admin_model->count_reports();
				$school_years = $this->Admin_model->school_years();
				$data = array(
					'view_profile' => $view_profile,
					'view_student' => $view_student,
					'sfinal'=> $sfinal,
					'count_reports' => $count_reports,
					'message' => $message,
					'view_all_message' => $view_all_message,
					'school_years' => $school_years
				);
				$this->load->view('header');					
				$this->load->view('admin/sfinal_dlist', $data);
				$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
	          <button type="button" class="close" data-dismiss="alert"
	                  aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	          </button>
	          <i class="fa fa-times"></i>
	          <strong>Sorry!</strong> You cannot access this page, please log in first.
	      </div>'
			);
			redirect('login/index');
		}	
	}
	public function search_sfinal_dlist(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$sem = $this->input->post('semester');
			$school_year = $this->input->post('sy');

			$view_student = $this->Admin_model->view_student();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$school_years = $this->Admin_model->school_years();
			$count_reports = $this->Admin_model->count_reports();
			$search_sfinal_dlist = $this->Admin_model->search_sfinal_dlist();

			$data = array(
				'sem' => $sem,
				'school_year' => $school_year,
				'view_profile' => $view_profile,
				'view_student' => $view_student,
				'count_reports' => $count_reports,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'school_years' => $school_years,
				'search_sfinal_dlist' => $search_sfinal_dlist
			);	

				$this->load->view('header');					
				$this->load->view('admin/sfinal_dl_search', $data);
				$this->load->view('footer');
				
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}
	public function print_search_sfinal_dl($sem, $school_year){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$print_search_sfinal_dlist = $this->Admin_model->print_search_sfinal_dlist($sem, $school_year);
			$data = array(
				'sem' => urldecode($sem),
				'school_year' => $school_year,
				'print_search_sfinal_dlist' => $print_search_sfinal_dlist,
			);	

				$this->load->view('header');					
				$this->load->view('admin/print_search_sfinal_dl', $data);
				$this->load->view('footer');
				
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}
	public function print_sfinal_dlist(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$view_student = $this->Admin_model->view_student();
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

				$sfinal = $this->Admin_model->sfinal_dlist();
				$count_reports = $this->Admin_model->count_reports();
				$data = array(
					'view_profile' => $view_profile,
					'view_student' => $view_student,
					'sfinal'=> $sfinal,
					'count_reports' => $count_reports,
					'message' => $message,
					'view_all_message' => $view_all_message
				);
				$this->load->view('header');					
				$this->load->view('admin/print_sfinal_dlist', $data);
				$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
	          <button type="button" class="close" data-dismiss="alert"
	                  aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	          </button>
	          <i class="fa fa-times"></i>
	          <strong>Sorry!</strong> You cannot access this page, please log in first.
	      </div>'
			);
			redirect('login/index');
		}	
	}
	public function final_dlist(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$view_student = $this->Admin_model->view_student();
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
				$view_all_message = $this->Admin_model->view_all_message();

				$final = $this->Admin_model->final_dlist();
				$count_reports = $this->Admin_model->count_reports();
				$school_years = $this->Admin_model->school_years();
				$data = array(
					'view_profile' => $view_profile,
					'view_student' => $view_student,
					'final'=> $final,
					'count_reports' => $count_reports,
					'message' => $message,
					'view_all_message' => $view_all_message,
					'school_years' => $school_years
				);
				$this->load->view('header');					
				$this->load->view('admin/final_dlist', $data);
				$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	          </button>
	          <i class="fa fa-times"></i>
	          <strong>Sorry!</strong> You cannot access this page, please log in first.
	      </div>'
			);
			redirect('login/index');
		}	
	}
	public function search_final_dlist(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$sem = $this->input->post('semester');
			$school_year = $this->input->post('sy');

			$view_student = $this->Admin_model->view_student();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();
			$school_years = $this->Admin_model->school_years();
			$count_reports = $this->Admin_model->count_reports();
			$search_final_dlist = $this->Admin_model->search_final_dlist();

			$data = array(
				'sem' => $sem,
				'school_year' => $school_year,
				'view_profile' => $view_profile,
				'view_student' => $view_student,
				'count_reports' => $count_reports,
				'message' => $message,
				'view_all_message' => $view_all_message,
				'school_years' => $school_years,
				'search_final_dlist' => $search_final_dlist
			);	

				$this->load->view('header');					
				$this->load->view('admin/final_dl_search', $data);
				$this->load->view('footer');
				
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}
	public function print_search_final_dl($sem, $school_year){

		if(($this->session->userdata('admin_is_logged_in')==TRUE) && ($this->session->userdata('admin_id')!="")){
			$print_search_final_dlist = $this->Admin_model->print_search_final_dlist($sem, $school_year);
			$data = array(
				'sem' => urldecode($sem),
				'school_year' => $school_year,
				'print_search_final_dlist' => $print_search_final_dlist,
			);	

				$this->load->view('header');					
				$this->load->view('admin/print_search_final_dl', $data);
				$this->load->view('footer');
				
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	

	}
	public function print_final_dlist(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$view_student = $this->Admin_model->view_student();
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

				$final = $this->Admin_model->final_dlist();
				$count_reports = $this->Admin_model->count_reports();
				$data = array(
					'view_profile' => $view_profile,
					'view_student' => $view_student,
					'final'=> $final,
					'count_reports' => $count_reports
				);
				$this->load->view('header');					
				$this->load->view('admin/print_final_dlist', $data);
				$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
	          <button type="button" class="close" data-dismiss="alert"
	                  aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	          </button>
	          <i class="fa fa-times"></i>
	          <strong>Sorry!</strong> You cannot access this page, please log in first.
	      </div>'
			);
			redirect('login/index');
		}	
	}
	public function print_current_honor_stud(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$view_student = $this->Admin_model->view_student();
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

				$current_cl_candid = $this->Admin_model->current_cl_candid();
				$count_reports = $this->Admin_model->count_reports();
				$data = array(
					'view_profile' => $view_profile,
					'view_student' => $view_student,
					'current_cl_candid'=> $current_cl_candid,
					'count_reports' => $count_reports
				);
				$this->load->view('header');					
				$this->load->view('admin/print_current_honor_stud', $data);
				$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	          </button>
	          <i class="fa fa-times"></i>
	          <strong>Sorry!</strong> You cannot access this page, please log in first.
	      </div>'
			);
			redirect('login/index');
		}	
	}

	public function admin_reports(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
				$view_all_reports = $this->Admin_model->view_all_reports();
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
				$view_all_message = $this->Admin_model->view_all_message();

				$count_reports = $this->Admin_model->count_reports();
				$data = array(
					'view_all_reports' => $view_all_reports, 
					'view_profile' => $view_profile,
					'count_reports' => $count_reports,
					'message' => $message,
					'view_all_message' => $view_all_message
				);
				$this->session->set_flashdata(
				'msg_to_admin','
					<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-check"></i>
            <strong>Update Grade!</strong> Some Grades was approve and updated by the admin.
          </div>
				'
				);

				$this->load->view('header');					
				$this->load->view('admin/admin_reports', $data);
				$this->load->view('footer');

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function teacher_message(){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

				$view_all_message = $this->Admin_model->view_all_message();
				$view_profile = $this->Admin_model->view_profile();
				$message = $this->Admin_model->message();
				$view_all_message = $this->Admin_model->view_all_message();
				$data = array(
					'view_all_message' => $view_all_message, 
					'view_profile' => $view_profile,
					'message' => $message,
					'view_all_message' => $view_all_message
				);

			$this->load->view('header');					
			$this->load->view('admin/teacher_message', $data);
			$this->load->view('footer');

		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function mark_as_read($msg_id){
		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){

				$this->Admin_model->mark_as_read($msg_id);
				redirect('admin/teacher_message');


		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	
	public function add_time_frame()
	{
		if(($this->session->userdata('admin_is_logged_in')== TRUE) && ($this->session->userdata('admin_id')!="")){
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$data = array('view_profile' => $view_profile);
				$this->load->view('header');					
				$this->load->view('admin/add_time_frame', $data);
				$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}

	public function add_time_frame_validation(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			
			$this->Admin_model->add_new_time_frame(); 
				$this->session->set_flashdata(
  				'msg',
					'<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<b><i class="fa fa-check"></i> Success: </b> New Time Frame was successfully created.
					 </div>'
				  ); 
				redirect("admin/view_time_frame");
		}	
		else {
			redirect('login/index');
		}
	}
	public function view_basic_time_frame()
	{
		if(($this->session->userdata('admin_is_logged_in')== TRUE) && ($this->session->userdata('admin_id')!="")){
			$view_basic_time_frame = $this->Admin_model->view_basic_time_frame();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$late_first_grading_grades = $this->Admin_model->late_first_grading_grades();
			$late_second_grading_grades = $this->Admin_model->late_second_grading_grades();
			$late_third_grading_grades = $this->Admin_model->late_third_grading_grades();
			$late_fourth_grading_grades = $this->Admin_model->late_fourth_grading_grades();
			
			$data = array(
				'view_profile' => $view_profile, 
				'view_basic_time_frame' => $view_basic_time_frame, 
				'late_first_grading_grades' => $late_first_grading_grades,
				'late_second_grading_grades' => $late_second_grading_grades,
				'late_third_grading_grades' => $late_third_grading_grades,
				'late_fourth_grading_grades' => $late_fourth_grading_grades,
				'message' => $message,
				'view_all_message' => $view_all_message

			);

				$this->load->view('header');					
				$this->load->view('admin/view_basic_time_frame', $data);
				$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function view_time_frame()
	{
		if(($this->session->userdata('admin_is_logged_in')== TRUE) && ($this->session->userdata('admin_id')!="")){
			$view_time_frame = $this->Admin_model->view_time_frame();
			$view_profile = $this->Admin_model->view_profile();
			$message = $this->Admin_model->message();
			$view_all_message = $this->Admin_model->view_all_message();

			$late_prelim_grades = $this->Admin_model->late_prelim_grades();
			$late_midterm_grades = $this->Admin_model->late_midterm_grades();
			$late_semi_final_grades = $this->Admin_model->late_semi_final_grades();
			$late_final_grades = $this->Admin_model->late_final_grades();
			
			$data = array(
				'view_profile' => $view_profile, 
				'view_time_frame' => $view_time_frame, 
				'late_prelim_grades' => $late_prelim_grades,
				'late_midterm_grades' => $late_midterm_grades,
				'late_semi_final_grades' => $late_semi_final_grades,
				'late_final_grades' => $late_final_grades,
				'message' => $message,
				'view_all_message' => $view_all_message

			);

				$this->load->view('header');					
				$this->load->view('admin/view_time_frame', $data);
				$this->load->view('footer');
		} else {
			$this->session->set_flashdata(
				'msg','
					<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-block-helper"></i>
            <strong>Sorry!</strong> You cannot access this page, please log in first.
          </div>
				'
				);
			redirect('login/index');
		}	
	}
	public function update_basic_time_frame($tf_id){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			
			$this->Admin_model->update_basic_time_frame($tf_id); 
				$this->session->set_flashdata(
  				'msg',
					'<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<b><i class="fa fa-check"></i> Success: </b> New Time Frame was successfully created.
					 </div>'
				  ); 
				redirect("admin/view_basic_time_frame");
		}	
		else {
			redirect('login/index');
		}
	}
	public function update_time_frame($tf_id){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			
			$this->Admin_model->update_time_frame($tf_id); 
				$this->session->set_flashdata(
  				'msg',
					'<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<b><i class="fa fa-check"></i> Success: </b> New Time Frame was successfully created.
					 </div>'
				  ); 
				redirect("admin/view_time_frame");
		}	
		else {
			redirect('login/index');
		}
	}

	public function disable_all_frames(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			
			$this->Admin_model->disable_all_frames(); 
				$this->session->set_flashdata(
  				'msg',
					'<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<b><i class="fa fa-check"></i> Success: </b> All frames was reset to default.
					 </div>'
				  ); 
				redirect("admin/view_time_frame");
		}	
		else {
			redirect('login/index');
		}
	}
	public function disable_all_framess(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			
			$this->Admin_model->disable_all_framess(); 
				$this->session->set_flashdata(
  				'msg',
					'<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<b><i class="fa fa-check"></i> Success: </b> All frames was reset to default.
					 </div>'
				  ); 
				redirect("admin/view_basic_time_frame");
		}	
		else {
			redirect('login/index');
		}
	}

	public function enable_all_frames(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			
			$this->Admin_model->enable_all_frames(); 
				$this->session->set_flashdata(
  				'msg',
					'<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<b><i class="fa fa-check"></i> Updated: </b> All time frames was updated successfully.
					 </div>'
				  ); 
				redirect("admin/view_time_frame");
		}	
		else {
			redirect('login/index');
		}
	}
	public function enable_all_framess(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			
			$this->Admin_model->enable_all_framess(); 
				$this->session->set_flashdata(
  				'msg',
					'<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<b><i class="fa fa-check"></i> Updated: </b> All time frames was updated successfully.
					 </div>'
				  ); 
				redirect("admin/view_basic_time_frame");
		}	
		else {
			redirect('login/index');
		}
	}
	public function enable_custom_framess(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			
			$this->Admin_model->enable_custom_framess(); 
				$this->session->set_flashdata(
  				'msg',
					'<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<b><i class="fa fa-check"></i> Updated: </b> All time frames was updated successfully.
					 </div>'
				  ); 
				redirect("admin/view_basic_time_frame");
		}	
		else {
			redirect('login/index');
		}
	}
	public function enable_custom_frames(){

		if(($this->session->userdata('admin_is_logged_in')==TRUE)  && ($this->session->userdata('admin_id')!="")){
			
			$this->Admin_model->enable_custom_frames(); 
				$this->session->set_flashdata(
  				'msg',
					'<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<b><i class="fa fa-check"></i> Updated: </b> All time frames was updated successfully.
					 </div>'
				  ); 
				redirect("admin/view_time_frame");
		}	
		else {
			redirect('login/index');
		}
	}

	public function count_reports()
	{
		$reports = $this->Admin_model->count_reports();
		echo json_encode($reports);
	}
	
	public function admin_logout(){
		
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
	
