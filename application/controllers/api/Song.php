<?php
require APPPATH . 'libraries/REST_Controller.php';
class Song extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Billing_model');
	}

	function index_get()
	{
		$this->response(array('status' => STATUS_FAIL, 'message' => 'Something wrong', 'data' => array()), REST_Controller::HTTP_BAD_REQUEST);
	}
	/**
	 * Get Post Data From API Request
	 */
	public function getAPIRequestPostData()
	{
		$json = file_get_contents('php://input');

		$jsonData = array();
		if(!empty($json)) {
			$jsonData = (array)json_decode($json);
		}
		if(empty($jsonData)) {
			$jsonData = $_REQUEST;
			//$jsonData = parse_url($json);
		}
		if(empty($jsonData)) {
			if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='GET') {
				$jsonData = $this->input->get();
			} elseif(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST') {
				$jsonData = $this->input->post();
			}
		}
		return $jsonData;
	}


	function showArtist_get()
	{
		$jsonObj =  $this->getAPIRequestPostData();
		$url = explode('/',$jsonObj['url']);unset($jsonObj['url']);
		if(end($url) == 'showArtist') {
			$data = $this->Billing_model->getallAlbum();
			$this->response(array('status'=>STATUS_SUCCESS,'message'=>'Show Artist Details','data'=>$data), REST_Controller::HTTP_OK);
		}else{
			$this->response(array('status' => STATUS_FAIL, 'message' => 'Please try again!'), REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	function getalbumwithSong_get()
	{
		$jsonObj =  $this->getAPIRequestPostData();
		$url = explode('/',$jsonObj['url']);unset($jsonObj['url']);
		if(end($url) == 'getalbumwithSong') {
			$data = $this->Billing_model->getalbumwithSong();
			$this->response(array('status'=>STATUS_SUCCESS,'message'=>'Album With Song Details','data'=>$data), REST_Controller::HTTP_OK);
		}else{
			$this->response(array('status' => STATUS_FAIL, 'message' => 'Please try again!'), REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	function showSongs_get()
	{
		$jsonObj =  $this->getAPIRequestPostData();
		$url = explode('/',$jsonObj['url']);unset($jsonObj['url']);
		if(end($url) == 'showSongs') {
			$data = $this->Billing_model->getallSong();
			$this->response(array('status'=>STATUS_SUCCESS,'message'=>'Song List Details','data'=>$data), REST_Controller::HTTP_OK);
		}else{
			$this->response(array('status' => STATUS_FAIL, 'message' => 'Please try again!'), REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	function listArtist_get()
	{
		$jsonObj =  $this->getAPIRequestPostData();
		$url = explode('/',$jsonObj['url']);unset($jsonObj['url']);
		if(end($url) == 'listArtist') {
			$post['query_type'] = 'count';
			$data = $this->Billing_model->getalbumwithSong($post);
			$this->response(array('status'=>STATUS_SUCCESS,'message'=>'Artist List Details','data'=>$data), REST_Controller::HTTP_OK);
		}else{
			$this->response(array('status' => STATUS_FAIL, 'message' => 'Please try again!'), REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	function getSongbyName_get()
	{
		$jsonObj =  $this->getAPIRequestPostData();
		unset($jsonObj['url']);
		if(!empty($jsonObj)) {
			$post['name'] = $jsonObj['name'];
			$data = $this->Billing_model->getSong($post);
			$this->response(array('status'=>STATUS_SUCCESS,'message'=>'Song List Details','data'=>$data), REST_Controller::HTTP_OK);
		}else{
			$this->response(array('status' => STATUS_FAIL, 'message' => 'Please try again!'), REST_Controller::HTTP_BAD_REQUEST);
		}
	}
}
?>
