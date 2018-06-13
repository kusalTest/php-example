<?php

	class Users extends CI_Controller{

		public function login(){
			$data['title']='Sign in';

			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run()===FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			}else{

				//Get username
				$username=$this->input->post('username');
				//Get and encrypt password
				$password=md5($this->input->post('password'));

				//Logged in user
				$user_id=$this->User_model->login($username,$password);
				$isadmin=$this->User_model->is_admin($username,$password);
				if($user_id){
					//Create the session
					$user_data=array(
						'user_id'=>$user_id,
						'username'=>$username,
						'logged_in'=>true
					);

					$this->session->set_userdata($user_data);
					//Set flash data
					$this->session->set_flashdata('user_loggedin','You are now logged in');
					if($isadmin==1){
						redirect('users');
					}else{
						redirect('items');
					}
					

				}else{

					//Set flash data
					$this->session->set_flashdata('login_failed','Login is invalid');
					redirect('users/login');
				}

			}
		}

		//Log out
		public function logout(){
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			//Set flash data
			$this->session->set_flashdata('user_loggedout','You are now logged out');

			redirect('users/login');
		}


		public function index(){
			$data['title']='Users';

			$data['users']=$this->User_model->get_users();

			$this->load->view('templates/header');
			$this->load->view('users/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug= NULL){

			$data['user']=$this->User_model->get_users($slug);

			if(empty($data['user'])){
				show_404();
			}

			$data['name']=$data['user']['name'];
			$data['email']=$data['user']['email'];

			$this->load->view('templates/header');
			$this->load->view('users/view', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			$data['title']='Create User';

			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('email','Email','required');


			if($this->form_validation->run()===FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/create', $data);
				$this->load->view('templates/footer');
			}else{
				$this->User_model->create_user();

				//Set flash data
				$this->session->set_flashdata('user_created','User created successfuly!');
				redirect('users');
			}


		}

		public function delete($id){

			$this->User_model->delete_user($id);
			//Set flash data
			$this->session->set_flashdata('user_deleted','User deleted successfuly!');
			redirect('users');
		}

		public function edit($slug){


			$data['user']=$this->User_model->get_users($slug);

			if(empty($data['user'])){
				show_404();
			}

			$data['title']='Edit User';

			$this->load->view('templates/header');
			$this->load->view('users/edit', $data);
			$this->load->view('templates/footer');
		}

		public function update(){
			$this->User_model->update_user();
			redirect('users');
		}
	}