<?php

	class Items extends CI_Controller{

		public function index(){
			$data['title']='Items';

			$data['items']=$this->Item_model->get_items();

			$this->load->view('templates/header');
			$this->load->view('items/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug= NULL){

			$data['item']=$this->Item_model->get_items($slug);

			if(empty($data['item'])){
				show_404();
			}

			$data['title']=$data['item']['title'];
			$data['description']=$data['item']['description'];

			$this->load->view('templates/header');
			$this->load->view('items/view', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			$data['title']='Create Item';

			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('description','Description','required');

			if($this->form_validation->run()===FALSE){
				$this->load->view('templates/header');
				$this->load->view('items/create', $data);
				$this->load->view('templates/footer');
			}else{
				$this->Item_model->create_item();
				redirect('items');
			}


		}

		public function delete($id){

			$this->Item_model->delete_item($id);
			redirect('items');
		}

		public function edit($slug){


			$data['item']=$this->Item_model->get_items($slug);

			if(empty($data['item'])){
				show_404();
			}

			$data['title']='Edit Item';

			$this->load->view('templates/header');
			$this->load->view('items/edit', $data);
			$this->load->view('templates/footer');
		}

		public function update(){
			$this->Item_model->update_item();
			redirect('items');
		}
	}