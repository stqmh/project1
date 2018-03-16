<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','usr');
	}

	public function GetUser() {
		$query = $this->usr->get_all();
		$i = 1;
		foreach ($query as $user) {
			$row = array();
			$row[] = $i;
			$row[] = $user->nama_user;
			$row[] = $user->vendor_user;
			$row[] = $user->hp_user;

			$row[] = '<button type="button" class="btn btn-primary" onclick="EditUser('.$user->id.')">Edit</button> <button type="button" class="btn btn-danger" onclick="DeleteUser('.$user->id.')">Delete</button>';
			$i++;

			$data[] = $row;
		}

		$output = array('data' => $data );
		echo json_encode($output);
	}

	public function GetUserID() {
		$id = $this->input->get('id');
		$query = $this->usr->get_many_by('id',$id);
		foreach ($query as $val) {
			$row = array();
			$row['id'] = $val->id;
			$row['nama_user'] = $val->nama_user;
			$row['vendor_user'] = $val->vendor_user;
			$row['hp_user'] = $val->hp_user;

			$data[] = $row;
		}

		$output = $data;
		
		echo json_encode($output);
	}

	public function AddUser() {
		$data = array(
			'nama_user' => $this->input->post('nama_user'),
			'vendor_user' => $this->input->post('vendor_user'),
			'hp_user' => $this->input->post('hp_user')
			);
		$query = $this->usr->insert($data, TRUE);

		$output['message']='Data berhasil ditambah';
		
		echo json_encode($output);
	}

	public function DeleteUser() {
		$id=$this->input->get('id');
		$data=$this->usr->delete_by(array('id'=>$id));
		$output['message']='Data berhasil diupdate';
		echo json_encode($output);
	}

	public function UpdateUser() {
		$id = $this->input->get('id');
		$data = array(
			'nama_user' => $this->input->post('nama_user'),
			'vendor_user' => $this->input->post('vendor_user'),
			'hp_user' => $this->input->post('hp_user')
			);
		$query = $this->usr->update($id, $data, TRUE);

		$output['message']='Data berhasil ditambah';
		
		echo json_encode($output);
	}
}


