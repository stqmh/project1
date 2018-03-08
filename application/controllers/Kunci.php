<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunci extends CI_Controller {

	public function GetKunci() {
		$this->load->model('kunci_model','kun');
		$query = $this->kun->get_all();
		$i=1;
		foreach ($query as $kunci) {
			$row = array();
			$row[] = $i;
			$row[] = $kunci->nama_kunci;
			$row[] = $kunci->status_kunci;

			$row[] = "<button class='btn btn-primary' type='button' onclick='EditKategori(".$kunci->id.")'>Edit</button> <button type='button' onclick='DelKategori(".$kunci->id.")' class='btn btn-danger'>Delete</button>";

			$data[] = $row;
			$i++;
		}

		$output = array(
			"data" => $data,
		);
		
		echo json_encode($output);
	}

	public function AddKunci() {
		$this->load->model('kunci_model','kun');

		$kun = $this->input->post('kunci');
		$sta = $this->input->post('stat');

		$this->kun->insert(array(
			'nama_kunci' => $kun,
			'status_kunci' => $sta
		));

		$output = array(
			"status" => 'Sukses',
		);
		echo json_encode($output);
	}
}


