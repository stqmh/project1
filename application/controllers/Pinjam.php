<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('vw_pinjam_model','vw');
	}

	public function GetData() {
		$query = $this->vw->get_all();
		$i=1;
		foreach ($query as $trx) {
			$row = array();
			$row[] = $i;
			$row[] = $trx->nama_user;
			$row[] = $trx->warna_kunci;
			$row[] = $trx->nama_admin;
			

			$row[] = "<button class='btn btn-primary' type='button' onclick='EditPinjam(".$trx->id.")'>Edit</button> <button type='button' onclick='DeletePinjam(".$trx->id.")' class='btn btn-danger'>Delete</button>";

			$data[] = $row;
			$i++;
		}

		$output = array(
			"data" => $data,
		);
		
		echo json_encode($output);
	}
// 
	// public function GetDataID() {
	// 	$id = $this->input->get('id');
	// 	$query = $this->kun->get_many_by('id',$id);
	// 	foreach ($query as $val) {
	// 		$row = array();
	// 		$row['id'] = $val->id;
	// 		$row['nama_kunci'] = $val->nama_kunci;
	// 		$row['status_kunci'] = $val->status_kunci;

	// 		$data[] = $row;
	// 	}

	// 	$output = $data;
		
	// 	echo json_encode($output);
	// }

	// public function AddData() {
	// 	$data = array(
	// 		'nama_kunci' => $this->input->post('nama_kunci'),
	// 		'status_kunci' => $this->input->post('status_kunci')
	// 		);
	// 	$query = $this->kun->insert($data, TRUE);

	// 	$output['message']='Data berhasil ditambah';
		
	// 	echo json_encode($output);
	// }

	// public function DeleteData() {
	// 	$id=$this->input->get('id');
	// 	$data=$this->kun->delete_by(array('id'=>$id));
	// 	$output['message']='Data berhasil diupdate';
	// 	echo json_encode($output);
	// }

	// public function UpdateData() {
	// 	$id = $this->input->get('id');
	// 	$data = array(
	// 		'nama_kunci' => $this->input->post('nama_kunci'),
	// 		'status_kunci' => $this->input->post('status_kunci')
	// 		);
	// 	$query = $this->kun->update($id, $data, TRUE);

	// 	$output['message']='Data berhasil ditambah';
		
	// 	echo json_encode($output);
	// }
}


