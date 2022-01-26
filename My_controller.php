<?php
namespace App\Controllers;

class My_controller extends BaseController
{

	public function backup(){
		$db = \Config\Database::connect();

		$prefs = ['filename' => 'backup-'.date('dMY_Hi').'.sql'];

		$util = (new \CodeIgniter\Database\Database())->loadUtils($db);

		$backup = $util->backup($prefs,$db);
		$writablePath = WRITEPATH.'uploads/';
		write_file($writablePath.'backup-'.date('dMY_Hi').'.gz', $backup); 
		return $this->response->download($writablePath.'backup-'.date('dMY_Hi').'.gz',null);
	}
}