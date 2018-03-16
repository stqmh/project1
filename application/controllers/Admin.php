<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model','adm');
	}

	public function GetAdmin()
	{
		$query = $this->adm->get_all();
		$i = 1;
		foreach ($query as $val) {
			$row = array();
			$row[] = $i;
			$row[] = $val->nama_admin;
			$row[] = $val->username_admin;

			$row[] = '<button type="button" class="btn btn-primary" onclick="EditAdmin('.$val->id.')">Edit</button> <button type="button" class="btn btn-danger" onclick="DeleteAdmin('.$val->id.')">Delete</button>';
			$i++;
			$data[] = $row;
		}

		$output = array(
			"data" => $data,
		);
		
		echo json_encode($output);
	}

	public function GetAdminID()
	{
		$id = $this->input->get('id');
		$query = $this->adm->get_many_by('id',$id);
		foreach ($query as $val) {
			$row = array();
			$row['id'] = $val->id;
			$row['nama_admin'] = $val->nama_admin;
			$row['username_admin'] = $val->username;
			$row['pass_admin'] = $val->password;

			$data[] = $row;
		}

		$output = $data;
		
		echo json_encode($output);
	}

	public function AddAdmin()
	{
		$data = array(
			'username_admin' => $this->input->post('username'),
			'pass_admin' => $this->input->post('password'),
			'nama_admin' => $this->input->post('nama_admin')
			);
		$query = $this->adm->insert($data, TRUE);

		$output['message']='Data berhasil ditambah';
		
		echo json_encode($output);
	}

	public function UpdateAdmin()
	{
		$id = $this->input->get('id');
		$data = array(
			'username_admin' => $this->input->post('username'),
			'pass_admin' => $this->input->post('password'),
			'nama_admin' => $this->input->post('nama_admin')
			);
		$query = $this->adm->update($id, $data, TRUE);

		$output['message']='Data berhasil diupdate';
		
		echo json_encode($output);
	}

	public function DeleteAdmin() 
	{
		$id=$this->input->get('id');
		$data=$this->adm->delete_by(array('id'=>$id));
		$output['message']='Data berhasil diupdate';
		echo json_encode($output);
	}
}
