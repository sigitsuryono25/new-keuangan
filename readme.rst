This project was included database migration to setting up
open config/migration.php and change this config

$config['migration_enabled'] = FALSE;
become to
$config['migration_enabled'] = TRUE;


$config['migration_auto_latest'] = FALSE;
become to
$config['migration_auto_latest'] = TRUE;

Create database on your server with name
db_new_keuangan
setting up the database config on
config/database.php
.....
If everthing is done,
access your project using browser 
and then access this from address bar
http://yourprojectpath/index.php/migrate
example
http://localhost/new-keuangan/index.php/migrate