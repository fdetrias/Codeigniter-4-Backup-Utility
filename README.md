# Codeigniter 4 MySQLi Database Backup Utility
It's a migration from CodeIgniter 3 MySQLi Utils.php, adjust some functions to make it work with Codeigniter 4.

All credit belongs to Codeigniter 4 development team !

## Installation

Simply download and copy Utils.php to your_project/system/Database/MySQLi/ folder. You may need to backup the original file before overwrite it, just in case.

## Usage
Then use it in controller like this :
```php
public function backup(){
	$db = \Config\Database::connect();
	$dbname = $db->database;
	$path = WRITEPATH.'uploads/';   		 // change path here
	$filename = $dbname.'_'.date('dMY_Hi').'.sql';   // change file name here
	$prefs = ['filename' => $filename];              // I only set the file name, for complete prefs see below 

	$util = (new \CodeIgniter\Database\Database())->loadUtils($db);
	$backup = $util->backup($prefs,$db);
		
	write_file($path.$filename.'.gz', $backup); 
	return $this->response->download($path.$filename.'.gz',null);
}
```
Codeigniter 4 system\Database\BaseUtils.php default preferences :
```php
   $prefs = [
      'tables'             => [],
      'ignore'             => [],
      'filename'           => '',
      'format'             => 'gzip', // gzip, txt
      'add_drop'           => true,
      'add_insert'         => true,
      'newline'            => "\n",
      'foreign_key_checks' => true,
   ];
```
## License
[MIT](https://choosealicense.com/licenses/mit/)
