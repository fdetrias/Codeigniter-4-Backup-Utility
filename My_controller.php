<?php
namespace App\Controllers;

class My_controller extends BaseController
{
    public function backup(){
	$db = \Config\Database::connect();
	$dbname = $db->database;
	$path = WRITEPATH.'uploads/';   	         // change path here
	$filename = $dbname.'_'.date('dMY_Hi').'.sql';   // change file name here
	$prefs = ['filename' => $filename];		 // I only set the file name, for complete prefs see README

	$util = (new \CodeIgniter\Database\Database())->loadUtils($db);
	$backup = $util->backup($prefs,$db);	
	write_file($path.$filename.'.gz', $backup); 
	return $this->response->download($path.$filename.'.gz',null);
    }
}
