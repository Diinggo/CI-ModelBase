<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @package     ModelBase - Upload
 * @author      Diinggo Sirojudin
 * @contact     085 7484 50 160
 * @website     https://diinggo.id
 * @copyright   Copyright (c) 2020.
 * @link        https://github.com/Codeigniter-ModelBase
 * @since       Version 1.0.0
 * @filesource
 */

class Upload extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		
	}

	/**
	 * UPLOAD FILE
	 *
	 * @param      string  $folder  
	 * @param      <type>  $file    The file
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	public function file($folder, 
		$file, 
		$maxsize 	= '10000', 
		$type 		= 'gif|jpg|png', 
		$encrypt 	= 'false', 
		$over 		= 'false')
	{
		
	}


	/**
	 * UPLOAD IMAGE
	 *
	 * @param      <type>  $folder   The folder
	 * @param      <type>  $file     The file
	 * @param      string  $maxsize  The maxsize
	 * @param      string  $type     The type
	 * @param      string  $encrypt  The encrypt
	 * @param      string  $over     The over
	 *
	 * @return     array   ( description_of_the_return_value )
	 */
	public function image($folder, 
		$file, 
		$maxsize 	= '10000', 
		$type 		= 'gif|jpg|png', 
		$encrypt 	= 'false', 
		$over 		= 'false')
	{
		// load librasy
		$this->load->library('upload');

		// define
		$config['upload_path']          = $folder;
        $config['allowed_types']        = $type;        
        $config['encrypt_name']         = $encrypt;
        $config['overwrite']         	= $over;
        $config['file_ext_tolower']		= TRUE;
        $config['max_size']     		= $maxsize;
        $this->upload->initialize($config);

        // upload
        if($this->upload->do_upload($file)) {
        	$data = array('status' => '1',
        		'file' => $this->upload->data(),
        		'error' => '');

        } else {
	      	$data = array('status' => '0',
	      		'file' => '',
	      		'error' => $this->upload->display_errors());

        }

        // return
        return $data;
	}


	/**
	 * RESIZE IMAGE
	 *
	 * @param      <type>  $folder  The folder
	 * @param      <type>  $file    The file
	 * @param      string  $width   The width
	 * @param      string  $height  The height
	 * @param      string  $param   The parameter
	 */
	public function resize($folder, 
		$file, 
		$width 		= null, 
		$height 	= null,
		$thumb 		= FALSE,
		$ratio 		= TRUE,
		$param 		= null)
	{
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= $folder.$file;
		$config['create_thumb'] 	= $thumb;
		$config['maintain_ratio'] 	= $ratio;
		
		// set ratio
		if (!empty($param)) {
			$config['width']    	= $param;
			$config['height']      	= $param;
		} else {
			$config['width']    	= $width;
			$config['height']      	= $width;
		}
		
		// resize
		$this->load->library('image_lib', $config);
		$data = $this->image_lib->resize();
		return $data;
	}

	/**
	 * ATURAN
	 */
	public function aturan()
	{
		
	}
}

/* End of file Upload.php */
/* Location: ./application/models/Upload.php */