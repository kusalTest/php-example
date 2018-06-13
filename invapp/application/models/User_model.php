<?php
	
	class User_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function login($username,$password){
			//Validate
			$this->db->where('username',$username);
			$this->db->where('password',$password);

			$result=$this->db->get('users');

			if($result->num_rows()==1){
				return $result->row(0)->id;
			}else{
				return false;
			}
		}

		public function is_admin($username,$password){
			//Validate
			$this->db->where('username',$username);
			$this->db->where('password',$password);

			$result=$this->db->get('users');

			if($result->num_rows()==1){
				return $result->row(0)->isadmin;
			}else{
				return false;
			}
		}


		public function get_users($slug= FALSE){

			if($slug===FALSE){
				$this->db->order_by('id','DESC');
				$query=$this->db->get('users');
				return $query->result_array();
			}

			$query=$this->db->get_where('users', array('slug'=>$slug));
			return $query->row_array();
		}

		public function create_user(){
			$slug=url_title($this->input->post('name'));

			$data=array(
				'name'=>$this->input->post('name'),
				'username'=>$this->input->post('username'),
				'slug'=>$slug,
				'password'=>md5($this->input->post('password')),
				'zipcode'=>$this->input->post('zipcode'),
				'email'=>$this->input->post('email')
			);

			return $this->db->insert('users',$data);
		}

		public function delete_user($id){

			$this->db->where('id',$id);
			$this->db->delete('users');
			return true;
		}

		public function update_user(){
			
			$slug=url_title($this->input->post('name'));
			$data=array(
				'name'=>$this->input->post('name'),
				'username'=>$this->input->post('username'),
				'slug'=>$slug,
				'zipcode'=>$this->input->post('zipcode'),
				'email'=>$this->input->post('email')
			);
			$this->db->where('id',$this->input->post('id'));
			return $this->db->update('users',$data);
		}
	}