<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abhishek
 */
class MY_Controller extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}

	/*Load View*/
    function loadView($data=array()){
	 $this->load->view('theme/main_view',$data);
    }

	function setSuccessFailMessage($data){
		$css_class = ADDED_MSG_FAIL_CLASS;
		if($data['status']==STATUS_SUCCESS) {
			$css_class = ADDED_MSG_SUCC_CLASS;
		}
		$this->session->set_flashdata('message', $data['msg']);
		$this->session->set_flashdata('color', $css_class);
		return true;
	}
	/*Generate csv file*/
	function generateCsvFiles($file_name='test.csv',$data=array()){
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename='.$file_name);
		$output = fopen('php://output', 'w');
		if (count($data) > 0) {
			foreach ($data as $row) {
				fputcsv($output, $row);
			}
		}
		exit();
	}

}
?>
