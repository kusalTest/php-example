<?php
	
	class Item_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_items($slug= FALSE){

			if($slug===FALSE){
				$this->db->order_by('id','DESC');
				$query=$this->db->get('items');
				return $query->result_array();
			}

			$query=$this->db->get_where('items', array('slug'=>$slug));
			return $query->row_array();
		}

		public function create_item(){
			$slug=url_title($this->input->post('title'));

			$data=array(
				'title'=>$this->input->post('title'),
				'slug'=>$slug,
				'description'=>$this->input->post('description')
			);

			return $this->db->insert('items',$data);
		}

		public function delete_item($id){

			$this->db->where('id',$id);
			$this->db->delete('items');
			return true;
		}

		public function update_item(){
			
			$slug=url_title($this->input->post('title'));
			$data=array(
				'title'=>$this->input->post('title'),
				'slug'=>$slug,
				'description'=>$this->input->post('description')
			);
			$this->db->where('id',$this->input->post('id'));
			return $this->db->update('items',$data);
		}
	}