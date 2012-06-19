<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Participant extends CI_Controller {

	//start function start takes md5 hash as argument
	function start($md5)
	{
		$this->load->library('subject'); //loads subject library
		$subject=$this->subject->verify_subject($md5); //Verifies that md5 passed is a valid subject number
		//echo var_dump($subject);
		if($subject==0){
			 echo "invalid subject number";
			 return false;
		}
		elseif($subject==-1){
			echo "subject has already started this task it is no longer accessible";
			return false;
		}
		else{
			//if subject number is valid, load task that is associated with the subject 			
			$this->subject->load_subject($subject['id'],$subject['task']);
			/**$set_id=$this->subject->create_result_set($subject['id'],$subject['task']);
			$this->subject->load_result_set($set_id);**/
			//load instructions
			$this->load->library('task');
			$this->task->run_next();
		}
	}
	function run_next()
	{
		$this->load->library('task');
		$this->task->run_next();
	}









}
?>