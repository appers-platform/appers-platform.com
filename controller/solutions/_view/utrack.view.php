<h3>Utrack</h3>

Трекинг событий:
<?solutions\highlighter::out('\solutions\utrack::addData($key, $value, $source, $user_id = null);')?>

Трекинг данных:
<?solutions\highlighter::out('\solutions\utrack::trackEvent$name, $value = null, $user_id = null);')?>

Поддерживаются два драйвера:
<ul>
	<li>\solutions\utrack\mysql</li>
	<li>\solutions\vertica</li>
</ul>

Пример конфига:
<?solutions\highlighter::out("
'utrackSolution' => [
	'driver' => '\\solutions\\utrack\\mysql'
],
")?>