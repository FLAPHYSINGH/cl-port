<?php

class Billing_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getallArtist()
	{
		$row = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_ARTIST.' a');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}
		return $row;
	}
	function allAlbum()
	{
		$row = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_ALBUM.' a');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}
		return $row;
	}
	function getallAlbum()
	{
		$row = array();
		$fields = "a.name asartist_name,ab.name as album_name,ab.year as album_year";
		$this->db->select($fields);
		$this->db->from(TBL_ARTIST.' a');
		$this->db->join(TBL_ALBUM.' ab','a.id = ab.id_artist');
		$query = $this->db->get();
		//print_r($this->db->last_query());
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}
		return $row;
	}
	function getalbumwithSong($postVal=[])
	{
		$row = array();
		$fields = "a.name as album_name,s.year as song_year,s.name as song_name";
		if(isset($postVal['query_type']) && !empty($postVal['query_type'])){
			$fields = "count(DISTINCT(s.id)) as total_counts, a.name as album_name,s.name as song_name";
		}
		$this->db->select($fields);
		$this->db->from(TBL_ALBUM.' a');
		$this->db->join(TBL_SONG.' s','s.songable_id = a.id_artist');
		if(isset($postVal['query_type']) && !empty($postVal['query_type'])){
			$this->db->group_by(array("a.name"));
		}
		$query = $this->db->get();
		if($query->num_rows() > 0){
			if(isset($postVal['query_type']) && $postVal['query_type']=="count"){
				//$row = $query->num_rows();
				$row = $query->result_array();
			}else{
				$row = $query->result_array();
			}
		}
		return $row;
	}

	function getallSong()
	{
		$row = array();
		$fields = "s.year as song_year,s.name as song_name,a.name as album_name,at.name as artist_name";
		$this->db->select($fields);
		$this->db->from(TBL_SONG.' s');
		$this->db->join(TBL_ALBUM.' a','a.id_artist = s.songable_id');
		$this->db->join(TBL_ARTIST.' at','at.id = a.id_artist');
		$this->db->group_by(array("s.name"));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}
		return $row;
	}

	function getSong($postVal){
		$row = array();
		$fields = "s.*";
		$this->db->select($fields);
		$this->db->from(TBL_SONG.' s');
		if(isset($postVal['name']) && !empty($postVal['name'])){
			$where = array("s.name" => $postVal['name']);
			$this->db->where($where);
		}
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->result_array();
		}
		return $row;
	}

	function saveArtist($postVal)
	{
		$data = ['name'=>$postVal['name']];
		if ((isset($postVal['name']) && $postVal['name'])) {
			$this->db->insert(TBL_ARTIST,$data);
			return array('status' => STATUS_SUCCESS, 'msg' => 'Added successfully!', 'data' => array());
		} else {
			return array('status' => STATUS_FAIL, 'msg' => 'Something went wrong', 'data' => array());
		}
	}

	function saveAlbum($postVal)
	{
		$data = [
			'name'=>$postVal['name'],
			'year'=>$postVal['year'],
			'id_artist'=>$postVal['id_artist']
	
	];
		if ((isset($postVal['name']) && $postVal['name'])) {
			$this->db->insert(TBL_ALBUM,$data);
			return array('status' => STATUS_SUCCESS, 'msg' => 'Added successfully!', 'data' => array());
		} else {
			return array('status' => STATUS_FAIL, 'msg' => 'Something went wrong', 'data' => array());
		}
	}

	function saveSong($postVal)
	{
		$data = [
			'name'=>$postVal['name'],
			'year'=>$postVal['year'],
			'songable_type'=>$postVal['songable_type'],
			'songable_id'=>$postVal['songable_id']

		];
		if ((isset($postVal['name']) && $postVal['name'])) {
			$this->db->insert(TBL_SONG,$data);
			return array('status' => STATUS_SUCCESS, 'msg' => 'Added successfully!', 'data' => array());
		} else {
			return array('status' => STATUS_FAIL, 'msg' => 'Something went wrong', 'data' => array());
		}
	}


	function deteData($id,$table){
		$this->db->where('id', $id);
		$this->db->delete($table);
		return array('status' => STATUS_FAIL, 'msg' => 'Deleted successfully!', 'data' => array());
	}


}
?>
