<br>
<ol>
	<li>
		<h4>Требования</h4>
		<ul>
			<li><a target="_blank" href="http://nginx.org">Nginx</a></li>
			<li><a target="_blank" href="http://php.net">PHP 5.4 +</a></li>
			<li><a target="_blank" href="http://www.mysql.com">MySQL</a></li>
			<li><a target="_blank" href="http://memcached.org">Memcached</a></li>
			<li><a target="_blank" href="http://gearman.org">Gearman</a></li>
			<li><a target="_blank" href="http://php.net/pdo_mysql">PHP PDO MySQL</a></li>
			<li><a target="_blank" href="http://pecl.php.net/package/gearman">PHP Gearman</a></li>
			<li>Опционально, <a target="_blank" href="http://pecl.php.net/package/APC">PHP APC</a></li>
		</ul>
		<br>
	</li>
	<li>
		<h4>Сначала,</h4>
		Скачайте <a href="/download">исходный код</a>.
	</li>
	<li>
		<h4>Установка системы</h4>
		<h5>Базовое</h5>
		- Создайте файл config/_env.php со следующим контентом:
		<?=solutions\highlighter::out('<? return \'env_name\';')?>
		<i>env_name - имя Вашего рабочего окружения, все что угодно</i>
		<h5>Настройка Nginx</h5>
		- Скопируйте файл platform/config/example.conf в config/env_name.conf.<br>
		- Используя симлинк, скажите nginx`у использовать его.
		<h5>MySQL</h5>
		- Создайте пользователя в MySQL<br>
		- Предоставьте пользователю права создания баз данных<br>
		- Установите настройки подключения в config/env_name.php
		<h5>PHP</h5>
		- Используя симлинк, или по-другому, укажите конфиг: platform/config/php.ini
	</li>
	<li>
		<h4>Первый проект</h4>
		<ol>
			<li>Перейдите в терминале в директорию фреймворка</li>
			<li>
				Выполните команду:
				<?=solutions\highlighter::out('./exec app::generateApper')?>
				Следуйте инструкциям
			</li>
			<li>
				Убедитесь что все корректно работает открыв проект в браузере
			</li>
		</ol>
	</li>
</ol>

<center>
	<span>&nbsp;&nbsp;&nbsp;</span>
	<a href="/gettingStarted/framework">
		Документация по фреймворку
		<span class="glyphicon glyphicon-arrow-right"></span>
	</a>
</center>