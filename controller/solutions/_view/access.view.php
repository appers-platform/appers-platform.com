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