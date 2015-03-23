<h3>Vertica</h3>

Отложенный вызов:
<?solutions\highlighter::out("\solutions\vertica::push('table', ['field1' => 'data1', 'field2' => 'data2']);")?>

Синхронный вызов:
<?solutions\highlighter::out("\solutions\vertica::syncPush('table', ['field1' => 'data1', 'field2' => 'data2']);")?>

Пример конфига:
<?solutions\highlighter::out("
'verticaSolution' => [
	'connection' => [
		'host' 		=> '127.0.0.1',
		'port' 		=> 5433,
		'user' 		=> 'dbadmin',
		'password' 	=> 'password',
		'db' 		=> 'dbase'
	]
],
")?>