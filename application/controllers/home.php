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

	public function index($view,$data=NULL,$class=NULL,$title=NULL){
		// Get Albums list
		$params = array("user_id"=>$this->config->item("flickr_user"));
		$rsp = $this->flickr->get("flickr.photosets.getList",$params);
		$photosets = $rsp["photosets"]["photoset"];
		$albumlist = array();
		if ($rsp['stat'] == 'ok') {
			foreach ($photosets as $i => $v ) {
				$info["title"] = $v["title"]["_content"];
				$info["album_id"] = $v["id"];
				array_push ($albumlist,$info);
			}
		}
		
		$this->load->section('header', 'samurai/inc/header',array("title"=>ucfirst($title),"class"=>$class));
		$this->load->section('menu', 'samurai/inc/menu');
		$this->load->section('footer', 'samurai/inc/footer',array("albumlist"=>$albumlist));
		$this->load->section('scripts', 'samurai/inc/scripts',array("init"=>$view));
		$this->load->view('samurai/'.$view,array("data"=>$data));
	}
	
	// Solo muestra fotos de un determinado album
	public function homepage($section) {
		$params = array("user_id"=>$this->config->item("flickr_user"),"photoset_id"=>"72157651903822606");
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

		return $this->{$section}("home",$favs,"homepage","Inicio");
	}
	
	public function contacto($section) {
		return $this->{$section}("contact",NULL,"contactpage","Contacto");
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
			
			return $this->{$section}("albums",$album,"portfoliopage","Albums");
			
		} else {
			print_r($rsp);	
		}
	}

	// Muestra todas las fotos de todos los albumes.
	public function view_album($section,$photoset)
	{

			// Get album title
			$params = array("user_id"=>$this->config->item("flickr_user"),"photoset_id"=>$photoset);
			$rsp = $this->flickr->get("flickr.photosets.getList",$params);
			$alb = $rsp["photosets"]["photoset"];
			//print_r($alb);
			// Get Pictures
			$params = array("user_id"=>$this->config->item("flickr_user"),"photoset_id"=>$photoset,"extras"=>"date_upload");
			$fotos = $this->flickr->get("flickr.photosets.getPhotos",$params);
			$favs = array();
			
			// Obtener titulo del album
			$sel = array_values(array_filter($alb,function($a) use ($photoset){ return ($a["id"]==$photoset);}));

		if ($fotos['stat'] == 'ok') {
			
			foreach ($fotos["photoset"]["photo"] as $item) {
						$info["farm"] = $item["farm"];
						$info["secret"] = $item["secret"];
						$info["title"] = $item["title"];
						$info["server"] = $item["server"];
						$info["dateupload"] = date('d/m/Y', $item["dateupload"]);
						$info["id"] = $item["id"];
						$info["pic"] = "https://farm".$item["farm"].".staticflickr.com/".$item["server"]."/".$item["id"]."_".$item["secret"]."_c.jpg";
						$info["alb_title"] = $sel[0]["title"]["_content"];
						$info["create_alb"] = $sel[0]["date_create"];
						array_push ($favs,$info);
			}
			
			return $this->{$section}("album_detail",$favs,"gallerypage","Albums - ".$sel[0]["title"]["_content"]);

			
		} else {
			print_r($fotos);	
		}
	}
	
}
