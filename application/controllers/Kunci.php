<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunci extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('kunci_model','kun');
	}

	public function GetKunci() {
		$query = $this->kun->get_all();
		$i=1;
		foreach ($query as $kunci) {
			$row = array();
			$row[] = $i;
			$row[] = $kunci->nama_kunci;
			$row[] = $kunci->status_kunci;

			$row[] = "<button class='btn btn-primary' type='button' onclick='EditKunci(".$kunci->id.")'>Edit</button> <button type='button' onclick='DeleteKunci(".$kunci->id.")' class='btn btn-danger'>Delete</button>";

			$data[] = $row;
			$i++;
		}

		$output = array(
			"data" => $data,
		);
		
		echo json_encode($output);
	}

	public function GetKunciID() {
		$id = $this->input->get('id');
		$query = $this->kun->get_many_by('id',$id);
		foreach ($query as $val) {
			$row = array();
			$row['id'] = $val->id;
			$row['nama_kunci'] = $val->nama_kunci;
			$row['status_kunci'] = $val->status_kunci;

			$data[] = $row;
		}

		$output = $data;
		
		echo json_encode($output);
	}

	public function AddKunci() {
		$data = array(
			'nama_kunci' => $this->input->post('nama_kunci'),
			'status_kunci' => $this->input->post('status_kunci')
			);
		$query = $this->kun->insert($data, TRUE);

		$output['message']='Data berhasil ditambah';
		
		echo json_encode($output);
	}

	public function DeleteKunci() {
		$id=$this->input->get('id');
		$data=$this->kun->delete_by(array('id'=>$id));
		$output['message']='Data berhasil diupdate';
		echo json_encode($output);
	}

	public function UpdateKunci() {
		$id = $this->input->get('id');
		$data = array(
			'nama_kunci' => $this->input->post('nama_kunci'),
			'status_kunci' => $this->input->post('status_kunci')
			);
		$query = $this->kun->update($id, $data, TRUE);

		$output['message']='Data berhasil ditambah';
		
		echo json_encode($output);
	}
}


