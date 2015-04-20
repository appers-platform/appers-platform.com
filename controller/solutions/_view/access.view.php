<h3>Распределение прав доступа для пользователей</h3>
Пример кода:

<?solutions\highlighter::out("
'autoLoad' => [
	['\\solutions\\access', 'init']
],
'accessSolution' => [
	'enabled' => true,
	'protect' => [
		'/desk' => 'admin'
	]
],
")?>

Управление с помощью терминала:
<?solutions\highlighter::out("./exec ::access::admin
[8965 2015.04.20 16:53:29]:	 Task \"::access::admin\" was launched.
[8965 2015.04.20 16:53:29]:	 

Options:
	list [access=type] [limit=50] - list all users with access (limit 50 by default)
	show user_id=000
	edit user_id=000 [add=type[,type2]]
	edit user_id=000 [delete=type[,type2]]


[8965 2015.04.20 16:53:29]:	 Task \"::access::admin\" was finished. Time: 0.0003 s.
")?>
