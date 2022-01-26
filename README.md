# Codeigniter 4 MySQLi Database Backup Utility
I ported it from CodeIgniter 3 MySQLi Database Utils.php, adjust here and there to make it work with Codeigniter 4.

All credit belongs to Codeigniter 4 development team !

## Installation

Simply download, copy and overwrite Utils.php to your_project/system/Database/MySQLi/ folder. You may backup the original file, just in case.

## Usage
Then use it in controller like this :
```php
public function backupDB(){
   $db = \Config\Database::connect();

   //Here I just set the filename, for complete use see default preferences below
   $prefs = ['filename' => 'backup-'.date('dMY_Hi').'.sql'];

   $util = (new \CodeIgniter\Database\Database())->loadUtils($db);
   $backupData = $util->backup($prefs,$db);
   $writablePath = WRITEPATH.'uploads/';
   write_file($writablePath.'backup-'.date('dMY_Hi').'.gz', $backupData); 
   return $this->response->download($writablePath.'backup-'.date('dMY_Hi').'.gz',null);
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
