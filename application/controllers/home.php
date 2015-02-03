<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('samurai');
	}

	public function index()
	{
		$this->load->section('header', 'samurai/inc/header',array("title"=>"Home Page"));
		$this->load->section('menu', 'samurai/inc/menu');
		$this->load->section('footer', 'samurai/inc/footer');
		$this->load->view('samurai/home');
	}

}
