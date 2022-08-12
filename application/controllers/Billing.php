<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Billing extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Billing_model');
	}
	public function index()
	{
		$data = array();
		$data['result'] = $this->Billing_model->getallSong();
		$view   =   "billing/list_page";
		$data['pvalue'] =   ["page_title"  => "Song Details", "view"   =>  $view];
		$this->loadView($data);
	}

	function addnewArtist()
	{
		if (isset($_POST['submit']) && ($_POST['submit'] == 'submit')) {
			$returnVal = $this->Billing_model->saveArtist($_POST);
			$this->setSuccessFailMessage($returnVal);
			header("Location:".WEB_URL);
			die();
		}
		$view = "billing/add_new_case";
		$data['pvalue'] = array("page_title" => "Add Artist", "page_sub_title" => "Add Artist", "view" => $view);
		$this->loadView($data);
	}

	function addAlbum()
	{
		$data['result'] = $this->Billing_model->getallArtist();
		if (isset($_POST['submit']) && ($_POST['submit'] == 'submit')) {
			$returnVal = $this->Billing_model->saveAlbum($_POST);
			$this->setSuccessFailMessage($returnVal);
			header("Location:".WEB_URL);
			die();
		}
		$view = "billing/add_new_album";
		$data['pvalue'] = array("page_title" => "Add Album", "page_sub_title" => "Add Album", "view" => $view);
		$this->loadView($data);
	}

	function addSong()
	{
		$data['result'] = $this->Billing_model->allAlbum();
		if (isset($_POST['submit']) && ($_POST['submit'] == 'submit')) {
			$returnVal = $this->Billing_model->saveSong($_POST);
			$this->setSuccessFailMessage($returnVal);
			header("Location:".WEB_URL);
			die();
		}
		$view = "billing/add_new_song";
		$data['pvalue'] = array("page_title" => "Add Song", "page_sub_title" => "Add Song", "view" => $view);
		$this->loadView($data);
	}
	function deleteData()
	{
		$id = $this->uri->segment(3);
		$table = $this->uri->segment(4);
		if ($id > 0) {
			$returnVal = $this->Billing_model->deteData($id,$table);
			$this->setSuccessFailMessage($returnVal);
			header("Location:".WEB_URL);
			die();
		}
	}

	function downloadAllReport() {
		$report = $this->Billing_model->getallSong();
		$csv_data[] = array('Song Name', 'Album Name', 'Artist Name','Year');
		foreach($report as $val){
			$csv_data[] = array($val['song_name'],$val['album_name'],$val['artist_name'],$val['song_year']);
		}
		$this->generateCsvFiles('report.csv',$csv_data);
		$returnVal = array('status' => STATUS_FAIL, 'msg' => 'Downloades successfully!', 'data' => array());
		$this->setSuccessFailMessage($returnVal);
		header("Location:".WEB_URL);
		die();
	}



}
?>
