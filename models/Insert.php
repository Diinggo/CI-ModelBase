<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @package     ModelBase - Insert
 * @author      Diinggo Sirojudin
 * @contact     085 7484 50 160
 * @website     https://diinggo.id
 * @copyright   Copyright (c) 2020.
 * @link        https://github.com/Codeigniter-ModelBase
 * @since       Version 1.0.0
 * @filesource
 */

class Insert extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	/**
	 * INSERT ROW
	 *
	 * @param      <type>  $tabel  The tabel
	 * @param      <type>  $input  The input
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	public function row($tabel, $input)
	{
		$data = $this->db->insert($tabel, $input);
		return $data;
	}

	/**
	 * INSERT BATCH
	 *
	 * @param      <type>  $tabel  The tabel
	 * @param      <type>  $input  The input
	 */
	public function batch($tabel, $input)
	{
		$data = $this->db->insert_batch($tabel, $input);
		return $data;
	}

}

/* End of file Insert.php */
/* Location: ./application/models/Insert.php */