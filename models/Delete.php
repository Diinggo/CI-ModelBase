<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @package     ModelBase - Delete
 * @author      Diinggo Sirojudin
 * @contact     085 7484 50 160
 * @website     https://diinggo.id
 * @copyright   Copyright (c) 2020.
 * @link        https://github.com/Codeigniter-ModelBase
 * @since       Version 1.0.0
 * @filesource
 */

class Delete extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	/**
	 * DELETE ROW
	 *
	 * @param      <type>  $tabel  The tabel
	 * @param      <type>  $where  The where
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	public function row($tabel, $where)
	{
		// Where
		if (is_array($where)) {
			foreach ($where as $where_field => $where_value) {
				$this->db->where($where_field, $where_value);
			}
		} else {
			$this->db->where('id', $where);
		}

		// Delete
		$data = $this->db->delete($tabel);
		return $data;
	}

	/**
	 * EMPTY TABEL
	 *
	 * @param      <type>  $tabel  The tabel
	 */
	public function empty($tabel)
	{
		$data = $this->db->empty_table($tabel);
		return $data;
	}

	/**
	 * DESTROY FILE
	 *
	 * @param      string  $folder  The folder
	 * @param      <type>  $file    The file
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	public function file($folder, $file)
	{
		$data = unlink($folder.'/'.$file);
		return $data;
	}
}

/* End of file Delete.php */
/* Location: ./application/models/Delete.php */