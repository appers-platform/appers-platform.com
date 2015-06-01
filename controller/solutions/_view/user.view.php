Система пользователей.<br>
<br>
<b>Методы</b>:
<ul>
	<li>
		<i>\solutions\user::getCurrent()</i>
		- Возвращает \solutions\user\userModel или \mock.
	</li>
	<li>
		<i>\solutions\user::isAuthorized()</i>
		- Возвращает true или false.
	</li>
	<li>
		<i>\solutions\user::isUserExists($id)</i>
		- Возвращает true или false.
	</li>
	<li>
		<i>\solutions\user::getCurrentId()</i>
		- Возвращает ID или false.
	</li>
	<li>
		<i>\solutions\user::getIdByEmail($email)</i>
		- Возвращает ID (0, если не найдено).
	</li>
	<li>
		<i>\solutions\user::setCurrent($user)</i>
		- $user может быть \solutions\user\userModel или integer или null.
	</li>
	<li>
		<i>\solutions\user::setAfterAuthUrl($url)</i>
		- Указывает целевую страницу после авторизации.
	</li>
	<li>
		<i>\solutions\user::setAfterAuthUrl()</i>
		- Возвращает целевую страницу после авторизации.
	</li>
</ul>
<b>Контроллеры</b>:
<ul>
	<li>confirm</li>
	<li>exit</li>
	<li>login</li>
	<li>oauth_mailru</li>
	<li>registration</li>
</ul>
Если Вы хотите быстро включить солюшн, Вы можете включить его из конфига:
<?=\solutions\highlighter::out("'userSolution' => [ 'enabled' => true ],")?>
При этом будут включены:
<?=\solutions\highlighter::out("'routes' => [
	'/user/registration'	=> '/__solutions/user/registration',
	'/user/login'		=> '/__solutions/user/login',
	'/user/exit'		=> '/__solutions/user/exit',
	'/user/confirm'		=> '/__solutions/user/confirm',
	'/user/oauth/mailru'	=> '/__solutions/user/oauth_mailru'
],")?>
<b>Параметры конфига:</b>
<ul>
	<li>
		Стили:
		<?=\solutions\highlighter::out("'css' => ['formClass' => 'col-xs-6 col-md-4'],")?>
	</li>
	<li>
		Секретный ключ, который будет использован для шифрования ссылок и cookie:
		<?=\solutions\highlighter::out("'secret' => '(74997s(&(&&^%$%^&',")?>
	</li>
	<li>
		Rjyabu Mail.ru OAuth:
<?=\solutions\highlighter::out("'oauth_mail_ru' => [
	'id'		=> 0,
	'private_key' 	=> 'your_private_key',
	'secret_key' 	=> 'your_secret_key'
],")?>
		</pre>
	</li>
	<li>
		Redirect after success auth:
		Переадрессация после успешной авторизации:
		<?=\solutions\highlighter::out("'afterAuthUrl' => '/'")?>
	</li>
</ul>
<b>Дополнительно:</b><br>
You can embed part of solion into different pages:
Вы можете встроить части солюшина в разные страницы:
<ol>
	<li>
		Вызовите конроллер солюшина из текущего контроллера:
		<?=\solutions\highlighter::out('$this->login_form = (string) \solutions\user::controller("login");')?>
		<i>(string) - когда Вы конвертируете экземпляр контроллера в строку, он будет автоматически выполнен и отрендерен.</i>
	</li>
	<li>
		Использовать вывод солюшина в текущем представлении:
		<?=\solutions\highlighter::out('<?=$login_form?>')?>
	</li>
</ol>
