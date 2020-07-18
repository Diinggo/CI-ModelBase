<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @package     ModelBase - Update
 * @author      Diinggo Sirojudin
 * @contact     085 7484 50 160
 * @website     https://diinggo.id
 * @copyright   Copyright (c) 2020.
 * @link        https://github.com/Codeigniter-ModelBase
 * @since       Version 1.0.0
 * @filesource
 */

class Update extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	/**
	 * UPDATE ROW
	 *
	 * @param      <type>  $tabel  The tabel
	 * @param      <type>  $input  The input
	 * @param      array   $where  The where
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	public function row($tabel, $input, $where)
	{
		// Where
		if (is_array($where)) {
			foreach ($where as $where_field => $where_value)
			{
				$this->db->where($where_field, $where_value);
			}
		} else {
			$this->db->where('id', $where);
		}

		// Update
		$data = $this->db->update($tabel, $input);
		return $data;
	}

	/**
	 * UPDATE ROW
	 *
	 * @param      <type>  $tabel  The tabel
	 * @param      <type>  $input  The input
	 * @param      <type>  $where  The where
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	public function batch($tabel, $input, $where)
	{
		// Update	
		$data = $this->db->update($tabel, $input, $where);
		return $data;
	}

	/**
	 * REPLACE TABLE (DELETE + UPDATE TABLE)
	 *
	 * @param      <type>  $tabel  The tabel
	 * @param      <type>  $data   The data
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	public function replace($tabel, $data)
	{
		$return = $this->db->replace('table', $data);
		return $return;
	}

}

/* End of file Update.php */
/* Location: ./application/models/Update.php */