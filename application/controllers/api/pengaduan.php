<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class pengaduan extends RestController
{

	/**
	 * Get All Data from this method.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Get All Data from this method.
	 */
	public function index_get($id = 0)
	{
		if (!empty($id)) {
			$data = $this->db->get_where("pengaduan", ['id_pengaduan' => $id])->row_array();
			if ($data) {
				$this->response($data, 200);
			} else {
				$this->response([
					'status' => 404,
					'message' => 'No data were found'
				], 404);
			}
		} else {
			$data = $this->db->get("pengaduan")->result();
			if ($data) {
				$this->response($data, 200);
			} else {
				$this->response([
					'status' => 404,
					'message' => 'No data were found'
				], 404);
			}
		}
	}

	/**
	 * Get All Data from this method.
	 */
	public function index_post()
	{
		$input = $this->input->post();
		$this->db->insert('pengaduan', $input);

		$this->response(['Item created is successfully.'], RestController::HTTP_OK);
	}

	/**
	 * Get All Data from this method.
	 */
	public function index_put($id)
	{
		$input = $this->put();
		$this->db->update('pengaduan', $input, array('id_pengaduan' => $id));

		$this->response(['Item updated is successfully.'], RestController::HTTP_OK);
	}

	/**
	 * Get All Data from this method.
	 */
	public function index_delete($id)
	{
		$this->db->delete('pengaduan', array('id_pengaduan' => $id));

		$this->response(['Item deleted is successfully.'], RestController::HTTP_OK);
	}
}