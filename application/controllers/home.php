<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->config('flickr');
		$this->load->library("flickr");
		$this->load->helper('url');
		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('samurai');
	}

	public function index($view,$data=NULL,$class=NULL){
		$this->load->section('header', 'samurai/inc/header',array("title"=>ucfirst($view),"class"=>$class));
		$this->load->section('menu', 'samurai/inc/menu');
		$this->load->section('footer', 'samurai/inc/footer');
		$this->load->section('scripts', 'samurai/inc/scripts',array("init"=>$view));
		$this->load->view('samurai/'.$view,array("data"=>$data));
	}
	
	// Solo muestra fotos de un determinado album
	public function homepage($section) {
		$params = array("user_id"=>$this->config->item("flickr_user"),"photoset_id"=>"72157650224856848");
		$fotos = $this->flickr->get("flickr.photosets.getPhotos",$params);
		$favs = array();
		
		foreach ($fotos["photoset"]["photo"] as $item) {
					$info["farm"] = $item["farm"];
					$info["secret"] = $item["secret"];
					$info["title"] = $item["title"];
					$info["server"] = $item["server"];
					$info["id"] = $item["id"];
					$info["pic"] = "https://farm".$item["farm"].".staticflickr.com/".$item["server"]."/".$item["id"]."_".$item["secret"]."_c.jpg";
					array_push ($favs,$info);
		}

		return $this->{$section}("home",$favs,"homepage");
	}
	
	// Muestra 1 foto de cada uno de los albums que tenga.
	public function albums($section)
	{
		$params = array("user_id"=>$this->config->item("flickr_user"));
		$rsp = $this->flickr->get("flickr.photosets.getList",$params);
		$photosets = $rsp["photosets"]["photoset"];

		$album = array();
		
		if ($rsp['stat'] == 'ok') {
		
		// Array con Titulo y Fotos de cada album
			foreach ($photosets as $i => $v ) {
				$info["title"] = $v["title"]["_content"];
				$info["album_id"] = $v["id"];
		
				$params = array("photoset_id"=>"{$v['id']}");
				$fotos = $this->flickr->get("flickr.photosets.getPhotos",$params);
		
				$info["farm"] = $fotos["photoset"]["photo"][0]["farm"];
				$info["secret"] =$fotos["photoset"]["photo"][0]["secret"];
				$info["server"] = $fotos["photoset"]["photo"][0]["server"];
				$info["id"] = $fotos["photoset"]["photo"][0]["id"];
				$info["pic"] = "https://farm".$info["farm"].".staticflickr.com/".$info["server"]."/".$info["id"]."_".$info["secret"].".jpg";
				
				array_push ($album,$info);
			}
			return $this->{$section}("albums",$album,"portfoliopage");
			
		} else {
			print_r($rsp);	
		}
	}

	// Muestra todas las fotos de todos los albumes.
	public function view_album($section)
	{
		$params = array("user_id"=>$this->config->item("flickr_user"));
		$rsp = $this->flickr->get("flickr.photosets.getList",$params);
		$photosets = $rsp["photosets"]["photoset"];

		$album = array();
		
		if ($rsp['stat'] == 'ok') {
		
		// Array con Titulo y Fotos de cada album
			foreach ($photosets as $i => $v ) {
				$info["title"] = $v["title"]["_content"];
				$info["album_id"] = $v["id"];
		
				$params = array("photoset_id"=>"{$v['id']}");
				$fotos = $this->flickr->get("flickr.photosets.getPhotos",$params);
		
				foreach ($fotos["photoset"]["photo"] as $item) {
					$info["farm"] = $item["farm"];
					$info["secret"] = $item["secret"];
					$info["server"] = $item["server"];
					$info["id"] = $item["id"];
					$info["pic"] = "https://farm".$item["farm"].".staticflickr.com/".$item["server"]."/".$item["id"]."_".$item["secret"]."_s.jpg";
					array_push ($album,$info);
				}
				
			}
			
			return $this->{$section}("albums",$album);
			
		} else {
			print_r($rsp);	
		}
	}
	
}
