<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @package     ModelBase - Select
 * @author      Diinggo Sirojudin
 * @contact     085 7484 50 160
 * @website     https://diinggo.id
 * @copyright   Copyright (c) 2020.
 * @link        https://github.com/Diinggo/Codeigniter-ModelBase
 * @since       Version 1.0.0
 * @filesource
 */

class Select extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * ROW DATA TABLE
	 *
	 * @param      <type>  $tabel   The tabel
	 * @param      <type>  $where   The where
	 * @param      <type>  $order   The order
	 * @param      <type>  $select  The select
	 * @param      <type>  $limit   The limit
	 * @param      <type>  $offset  The offset
	 * @param      <type>  $row     The row
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	public function row($tabel,
						$where 	= NULL, 
						$order 	= NULL, 
						$select = NULL, 
						$limit  = NULL, 
						$offset = NULL, 
						$result = 'array')
	{
		// definisi logika
		$this->select($select);
		$this->table($tabel);
		$this->where($where);
		$this->order($order, $tabel);
		$this->limit($limit);
		$this->offset($offset);
		$hasil = $this->db->get();

		// pilih array
		if ($result == 'array') {
			$data = $hasil->row_array();
		} else {
			$data = $hasil->row();
		}

		// return
		return $data;
	}

	/**
	 * GET DATA TABLE
	 *
	 * @param      <type>  $tabel   The tabel
	 * @param      <type>  $where   The where
	 * @param      <type>  $order   The order
	 * @param      <type>  $select  The select
	 * @param      <type>  $limit   The limit
	 * @param      <type>  $offset  The offset
	 * @param      string  $result  The result
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	public function get($tabel,
						$where 	= NULL, 
						$order 	= NULL, 
						$select = NULL, 
						$limit 	= NULL, 
						$offset = NULL, 
						$result = 'array')
	{
		// definisi logika
		$this->select($select);
		$this->table($tabel);
		$this->where($where);
		$this->order($order, $tabel);
		$this->limit($limit);
		$this->offset($offset);
		$hasil = $this->db->get();

		// pilih array
		if ($result == 'array') {
			$data = $hasil->result_array();
		} else {
			$data = $hasil->result();
		}

		// return
		return $data;
	}

	/**
	 * NUM ROWS
	 *
	 * @param      <type>  $tabel   The tabel
	 * @param      <type>  $where   The where
	 * @param      <type>  $order   The order
	 * @param      <type>  $select  The select
	 * @param      <type>  $limit   The limit
	 * @param      <type>  $offset  The offset
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	public function num_rows($tabel,
							$where 	= NULL, 
							$order 	= NULL, 
							$select = NULL, 
							$limit 	= NULL, 
							$offset = NULL)
	{
		// definisi logika
		$this->select($select);
		$this->table($tabel);
		$this->where($where);
		$this->order($order, $tabel);
		$this->limit($limit);
		$this->offset($offset);
		$data = $this->db->get()->num_rows();

		// return
		return $data;
	}

	/**
	 * NUM FIELDS
	 *
	 * @param      <type>  $tabel   The tabel
	 * @param      <type>  $where   The where
	 * @param      <type>  $order   The order
	 * @param      <type>  $select  The select
	 * @param      <type>  $limit   The limit
	 * @param      <type>  $offset  The offset
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	public function num_fields(	$tabel,
								$where 	= NULL, 
								$order 	= NULL, 
								$select = NULL, 
								$limit 	= NULL, 
								$offset = NULL)
	{
		// definisi logika
		$this->select($select);
		$this->table($tabel);
		$this->where($where);
		$this->order($order, $tabel);
		$this->limit($limit);
		$this->offset($offset);
		$data = $this->db->get()->num_fields();

		// return
		return $data;
	}
	
	/**
	 * INSERT ID
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	public function insert_id()
	{
		$data = $this->db->insert_id();
		return $data;
	}

	/**
	 * AFFECTED ROWS
	 */
	public function affected_rows()
	{
		$data = $this->db->affected_rows();
		return $data;
	}

	/**
	 * LAST QUERY
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	public function last_query()
	{
		$data = $this->db->last_query();
		return $data;
	}

	/**
	 * COUNT ALL
	 */
	public function count_all()
	{
		$data = $this->db->count_all();
		return $data;
	}

	/**
	 * PLATFORM
	 */
	public function platform()
	{
		$data = $this->db->platform();
		return $data;
	}

	/**
	 * VERSION
	 */
	public function version()
	{
		$data = $this->db->version();
		return $data;
	}

	/* ============================== THIS PRIVATE FUNCTION ============================== */

	/**
	 * SELECT FIELDS
	 *
	 * @param      <type>  $select  The select
	 */
	private function select($select)
	{
		// jika tidak kosong
		if (!empty($select)) {

			// jika array
			if (is_array($select)) {
				foreach ($select as $sname => $sitem) {

					// jika max
					if ($sname == 'max') {
						$this->db->select_max($sitem);

					// jika min
					} elseif ($sname == 'min') {
						$this->db->select_min($sitem);

					// jika avg
					} elseif ($sname == 'avg') {
						$this->db->select_avg($sitem);

					// jika sum
					} elseif ($sname == 'sum') {
						$this->db->select_sum($sitem);

					// distinct
					} elseif ($sname == 'distinct') {
						if (empty($sitem)) {
							$this->db->distinct();
						} else {
							$this->db->distinct($sitem);
						}
					} else {
						$this->db->select($select);
					}
				}

			// jika bukan array
			} else {
				$this->db->select($select);
			}

		// jika kosong
		} else {
			$this->db->select('*');		
		}
	}

	/**
	 * SELECT TABEL
	 *
	 * @param      <type>  $tabel  The tabel
	 */
	private function table($tabel)
	{
		if (is_array($tabel)) {
			foreach ($tabel as $tsatu => $tdua) {
				if (is_array($tdua)) {
					foreach ($tdua as $ttiga => $tempat) {
						if (is_array($tempat) || is_object($tempat)) {
							if (empty($tempat['2'])) {
								$this->db->join($tempat['0'], $tempat['1']);
							} else {
								$this->db->join($tempat['0'], $tempat['1'], $tempat['2']);
							}
						} 
					}
				} else {
					$this->db->from($tdua);
				}	
			}
		} else {
			$this->db->from($tabel);
		}
	}

	/**
	 * WHERE FIELDS
	 *
	 * @param      <type>  $where  The where
	 */
	private function where($where)
	{
		// Where
		if (!empty($where)) {
			if (is_array($where)) {
				foreach ($where as $w_name => $w_item)
				{
					// where
					if ($w_name == 'where') {
						foreach ($w_item as $w_field => $w_value) {
							$this->db->where($w_field, $w_value);
						}

					// or where
					} elseif ($w_name == 'orwhere') {
						foreach ($w_item as $w_field => $w_value) {
							$this->db->or_where($w_field, $w_value);
						}

					// where in
					} elseif ($w_name == 'wherein') {
						foreach ($w_item as $w_field => $w_value) {
							$this->db->where_in($w_field, $w_value);
						}
					
					// or where in
					} elseif ($w_name == 'orwherein') {
						foreach ($w_item as $w_field => $w_value) {
							$this->db->or_where_in($w_field, $w_value);
						}

					// where not in
					} elseif ($w_name == 'wherenotin') {
						foreach ($w_item as $w_field => $w_value) {
							$this->db->where_not_in($w_field, $w_value);
						}

					// or where not in
					} elseif ($w_name == 'orwherenotin') {
						foreach ($w_item as $w_field => $w_value) {
							$this->db->or_where_not_in($w_field, $w_value);
						}

					// like
					} elseif ($w_name == 'like') {
						foreach ($w_item as $w_field => $w_value) {
							// cek opsi
							if (empty($where['opsi'])) {
								$this->db->like($w_field, $w_value, 'BOTH');

							// with opsi
							} else {
								$this->db->like($w_field, $w_value, $where['opsi']);
							}
						}

					// or_like()
					} elseif ($w_name == 'orlike') {
						foreach ($w_item as $w_field => $w_value) {
							
							// cek opsi
							if (empty($where['opsi'])) {
								$this->db->or_like($w_field, $w_value, 'BOTH');

							// with opsi
							} else {
								$this->db->or_like($w_field, $w_value, $where['opsi']);
							}
						}

					// not_like()
					} elseif ($w_name == 'notlike') {
						foreach ($w_item as $w_field => $w_value) {
							
							// cek opsi
							if (empty($where['opsi'])) {
								$this->db->not_like($w_field, $w_value, 'BOTH');

							// with opsi
							} else {
								$this->db->not_like($w_field, $w_value, $where['opsi']);
							}
						}

					// or_not_like
					} elseif ($w_name == 'or_not_like') {
						foreach ($w_item as $w_field => $w_value) {
							
							// cek opsi
							if (empty($where['opsi'])) {
								$this->db->or_not_like($w_field, $w_value, 'BOTH');

							// with opsi
							} else {
								$this->db->or_not_like($w_field, $w_value, $where['opsi']);
							}
						}

					// group_by
					} elseif ($w_name == 'groupby') {
						$this->db->group_by($w_item);

					} else {
						$this->db->where($w_name, $w_item);
					}

					// having
					// or_having()
					
				}

			// default where
			} else {
				$this->db->where('id', $where);
			}
		}
		
	}

	/**
	 * ORDER TABLE
	 *
	 * @param      <type>  $order  The order
	 */
	private function order($order, $tabel = null)
	{
		if (!empty($order)) {
			if (is_array($order)) {
				foreach ($order as $order_title => $order_value)
				{
					$this->db->order_by($order_title, $order_value);
				}
			} else {
				$this->db->order_by('id', $order);
			}
		} else {
			if (!is_array($tabel)) {
				$this->db->order_by('id', 'DESC');
			}
		}
	}

	/**
	 * LIMIT TABLE
	 *
	 * @param      <type>  $limit  The limit
	 */
	private function limit($limit)
	{
		// limit()
		if (!empty($limit)) {
			$this->db->limit($limit);
		}
	}

	/**
	 * OFFSET TABLE
	 *
	 * @param      <type>  $offset  The offset
	 */
	private function offset($offset)
	{
		// offset
		if (!empty($offset)) {
			$this->db->offset($offset);
		}
	}

}

/* End of file select.php */
/* Location: ./application/models/select.php */