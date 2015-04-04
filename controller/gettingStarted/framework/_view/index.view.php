<br>
<ol>
	<li>
		<h4>Структура аппера</h4>
		<pre>
<b>appers.dev/</b>
├── <b>config/</b> - директория с конфигами
│   ├── <b>parent.php</b> - главный конфиг
│   └── <b>env.php</b> - настройки окружения (опционально, к примеру на компьютере разработчика)
├── <b>controller/</b> - директория с контроллерами и всеми относящимся к ним файлами
│   ├── <b>_view/</b> - директория с содержимым для представления
│   │   ├── <b>index.view.php</b> - представление для index_controller
│   │   ├── <b>index.coffee</b> (или index.js) - скрипты для index_controller
│   │   ├── <b>scripts.coffee</b> (или scripts.js) - скрипты для всех контроллеров данного уровня
│   │   ├── <b>index.less</b> (или index.css) - стили для index_controller
│   │   └── <b>styles.less</b> (или styles.css) - стили для всех контроллеров данного уровня
│   └── <b>index.php</b> - контроллер index_controller
├── <b>layout/</b> - директория с макетами
│   ├── <b>default.view.php</b> - макет по умолчанию
│   └── <b>mail.view.php</b> - макет по умолчанию для писем
├── <b>lib/</b> - директория с библиотеками
├── <b>model/</b> - директория с моделями
├── <b>public/</b> - директория с публичным содержимым (url: http://example.com/public/ )
├── <b>static/</b> - директория с глобальными статическими файлами
│   ├── <b>scripts/</b> - глобальные скрипты, Вы можете использовать .js или .coffee
│   ├── <b>styles/</b> - глобальные стили, Вы можете использовать .css или .less
├── <b>tasks/</b> - директория с консольными командами
└── <b>exec</b> - скрипт для запуска консольных команд
		</pre>
	</li>
	<li>
		<h4>Конфиги</h4>
		Конфиги (конфиг - обычный ассоциативный php массив) загружаются в следующем порядке:
		<ol>
			<li>/platform/config/application/parent.php</li>
			<li>/platform/config/application/env.php</li>
			<li>/appres/appers.dev/config/parent.php</li>
			<li>/appres/appers.dev/config/env.php</li>
		</ol>
		<br>
		Для автозагрузки некоторых функций, Вы можете указать это в конфиге:
		<?=solutions\highlighter::out("'autoLoad' => [
	['className', 'functionName'],
	['className2', 'functionName2']
],")?>
	Для удобства ведения разработки, можно указать парамерт, после установки которого при любом обращении к системе, будет проверяться, не были ли изменены файлы.
	В случае, если изменения были, все фоновые задачи будут перезапущены.
	Незначительно замедляет скорость работы системы, рекомендуется использовать только в среде разработки:
		<?=solutions\highlighter::out("'restartWorkersOnChange' => true,")?>
		API:
		<ul>
			<li>static config::get($param = null) - возвращает значение параметра, а случае если имя параметра не указно - весь конфиг</li>
		</ul>
	</li>
	<li>
		<h4>Контроллер</h4>
		Контроллет - это одна из ключевых частей приложения. Он определеяет как будут обрабатываться входящие запросы и создаваться ответ.
		<h5>Общее</h5>
		<?=solutions\highlighter::out("<?
class index_controller extends controller {
	public function first() {
		\$this->title = 'Welcome to Appers!';
	}
}
")?>
		<i><span class="glyphicon glyphicon-flash"></span> Вы можете создать только прдеставление (файл .view.php), не создавая сам файл контроллера, при этом будет создан виртуальный контроллер.</i><br>
		<i><span class="glyphicon glyphicon-flash"></span> Вы можете создать только конроллер (без прдеставления .view.php, оно не обязательно).</i><br>
		<i><span class="glyphicon glyphicon-flash"></span> Вы можете создать контроллер без определения класса - просто пометите код прямо в файл: <?=solutions\highlighter::out("<?
\$this->title = 'Welcome to Appers!';
")?></i><br>

		<h5>Маршрутизация</h5>
		Каждый контроллер имеет свой собственный URL, определяемый именем класса-конроллера.
		К примеру, если Вы используете "my_page_controller" - URL будет /my/page<br>
		Так же, Вы можете определить дополнительные настройки в конфиге:
		<?=solutions\highlighter::out("
'routes' => [
	'/catalog/<string>/<int>' => '/catalog?category=$1&id=$2'
]
")?>
		Типы принимаемых значений: string, int, float

		<h5>API</h5>
		Вы можете переопределить в контроллере:
		<ol>
			<li>function first(){} - выполняется сначала</li>
			<li>function post(){} - выполняется когда контроллер вызывается методом POST</li>
			<li>function get(){} - выполняется когда контроллер вызывается методом GET</li>
			<li>function last(){} - выполняется в конце</li>
		</ol>
		Методы:
		<ul>
			<li>returnJson($json) - если Вы вызовите этот метод, JSON будет возвращен (без HTML).</li>
			<li>setLayout($layout) - указать макет (имя без '.view.php'), по умолчанию - 'default'.</li>
			<li>disableWrappers() - отключить обертки</li>
			<li>enableWrappers() - включить обертки</li>
			<li>isWrappersEnabled() - проверить, включены ли обертки</li>
		</ul>
		<h5>Передача данных</h5>
		Контроллер является дочерним классом stdClass.<br>
		Если Вы хотите передать данные в представление, Вы можете вызвать $this->var_name = 'value';<br>
		В представлении, данные будут доступны как $var_name.<br>
	</li>
	<li>
		<h4>Модель</h4>
		Все модели должны иметь название, которое заканчивается на 'Model', и наследует класс 'model'.
		<?=solutions\highlighter::out("
class testModel extends model {

}
")?>
		Вы можете переопределить настройки по умолчанию:
<?=solutions\highlighter::out("
const db_PK = 'id';
const db_table = null;
const db_connection = null;
const db_class = 'dbMysql';
")?>
		<i><span class="glyphicon glyphicon-flash"></span>  Когда Вы обращаетесь к таблице, или полю, они будут созданы в базе данных автоматически.</i><br>
		<i><span class="glyphicon glyphicon-flash"></span>  If call non-defined model, it will be create virtually.</i><br>
		<i><span class="glyphicon glyphicon-flash"></span>  Если вы обращаетесь к модели, которая не определа (не объявлен класс), она будет создана виртуально.</i><br>
		<i><span class="glyphicon glyphicon-flash"></span>  TModel - как Model, но включает поля 'update_dt' и 'create_dt' - время изменения и создания записи.</i><br>
		<br>
		Соглашения по названиям полей и типам данных в базе:
		<ul>
			<li><i>/^(.*)_id$/</i> - INT(11) NULL DEFAULT NULL</li>
			<li><i>/^(.*)_dbl$/</i> - DOUBLE NULL DEFAULT NULL</li>
			<li><i>/^(.*)_text$/</i> - LONGTEXT NULL DEFAULT NULL</li>
			<li><i>/^is_(.*)$/</i> - TINYINT(1) NULL DEFAULT NULL</li>
			<li><i>/^(.*)_dt$/</i> - DATETIME NULL DEFAULT NULL</li>
			<li><i>/^(.*)_ts$/</i> - TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP</li>
			<li><i>Другое</i> - TEXT NULL DEFAULT NULL</li>
		</ul>
	</li>
	<li>
		<h4>Представление</h4>
		Поместите в директорию '_view'.
		Должно называться так же, как и контроллер (к примеру, для конроллера 'some_controller' - это будет файл '/controller/_view/some.view.php').
		Вывод переменных:
		<?=solutions\highlighter::out('<?=$defined_in_controller?>')?>
	</li>
	<li>
		<h4>Обертка</h4>
		Обертка - это обертка для представления. Поместите ее в директорию _view (с представлением). Назовите '_wrapper.php'. Контент будет доступен следующим образом:
		<?=solutions\highlighter::out('<?=$content?>')?>
	</li>
	<li>
		<h4>Макет</h4>
		Макет - это базовое представление. Поместите его в директорию 'PROJECT_ROOT/layout/' (если не будет найдено - система будет его искать по пути 'ROOT/layout/').
		Содержимое можно вывести следующим образом:
		<?=solutions\highlighter::out('<?=$content?>')?>
		По умолчанию, будет использован файл 'default.view.php'. Так же, вы можете указать специальный макет в контроллере:
		<?=solutions\highlighter::out('self::setLayout("custom.view.php");')?>
	</li>
	<li>
		<h4>Статика</h4>
		JS, CoffeeScript, CSS и LessCss. Вы должны поместить его в ту же директорию, что и представление.<br>
		Автоматически, будут загружены файлы которые имеют такое же имя, как и контроллер (к примеру, для контроллера 'some_controller' будет загружен файл 'some.less').
		Так же в любом случае загружаются файлы: 'styles.less', 'styles.css', 'scripts.coffee', 'scripts.js'.<br>
		<br>
		Фреймворк включает по умолчанию:
		<ul>
			<li><a href="http://getbootstrap.com" target="_blank">Bootstrap</a></li>
			<li><a href="http://jquery.org" target="_blank">jQuery</a></li>
			<li><span class="glyphicon glyphicon-flash"></span> <a href="/gettingStarted/framework/js">Appers.JS</a></li>
		</ul>
		<br>
		API статики:
		<ul>
			<li>static (abstract)staticParent::GROUP_PUBLIC</li>
			<li>static (abstract)staticParent::GROUP_CONTROLLER</li>
			<li>static (abstract)staticParent::GROUP_SOLUTIONS</li>
			<li>static (abstract)staticParent::addUrl($url, $group_id = self::GROUP_PUBLIC) - добавляет внешний URL.</li>
		</ul>
		<br>
		API JS/CoffeeScript:
		<ul>
			<li>static js::setVar($name, $value) - установить переменную. На клиенте переменная будет доступна $$.getVar(name)</li>
			<li>static js::getVar($name) - получить переменную.</li>
		</ul>
	</li>
	<li>
		<h4>Класс 'Application'</h4>
		Центральная точка приложения.<br>
		API:
		<ul>
			<li>static application::getController() - созвращает экземпляр текущего контроллера.</li>
			<li>static application::getExecutingTime() - возвращает время выполнения.</li>
			<li>static application::getMemoryUsage() - возвращает объем памяти, используемой текущим процессом.</li>
			<li>static application::getMemoryLimit() - возвращает лимит доступной памяти.</li>
			<li>static application::echoException(Exception $error) - выводит Exception.</li>
			<li>static application::getControllerName() - возвращает имя текущего контроллера.</li>
			<li>static application::getUrl($controller_name = null, array $get_params = []) - строит URL к указанному контроллеру с учетом настроек роутинга и передаваемых параметров.</li>
		</ul>
	</li>
	<li>
		<h4>События</h4>
		API:
		<ul>
			<li>static event::addCallback($name, $callback) - добавляет коллбек к событию</li>
			<li>static event::fire($name) - вызывает событие</li>
			<li>static event::removeCallbacks($name) - удаляет все коллбеки события</li>
		</ul>
		<br>
		События платформы:
		<ul>
			<li>beforeControllerRun</li>
			<li>afterControllerRun</li>
			<li>beforeControllerRender</li>
			<li>afterControllerRender</li>
		</ul>
	</li>
	<li>
		<h4>I18n</h4>
		Use method __() for all phrases, that will be translated. Syntax of this method similar to 'sprintf'.<br>
		Используйте метод __() для всех фраз, которые должны быть переведены. Синтаксис метода схож с 'sprintf'.<br>
		For example, to translate phrase 'Hi, {$username}!' you should use __('Hi, %s!', $username);<br>
		К примеру, для перевода фразы 'Hi, {$username}!' Вы должны написать: __('Hi, %s!', $username);<br>
		<br>
		Все переводы сохраняются в формате YAML в следующих директориях:
		<ul>
			<li>PROJECT_ROOT/i18n for all project</li>
			<li>PROJECT_ROOT/solutions/i18n</li>
			<li>ROOT/solutions/yourSolution/i18n</li>
		</ul>
		<br>
		Алгоритм перевода:<br>
		Фраза
		<span class="glyphicon glyphicon-arrow-right"></span>
		Оригинальный язык
		<span class="glyphicon glyphicon-arrow-right"></span>
		Целевой язык (если оригинальный язык != целевой).
	</li>
	<li>
		<h4>Константы</h4>
		<ul>
			<li>TTL_MINUTE - минута в секундах</li>
			<li>TTL_5_MIN - 5 минут в секундах</li>
			<li>TTL_10_MIN - 10 минут в секундах</li>
			<li>TTL_HOUR - час в секундах</li>
			<li>TTL_DAY - сутки в секундах</li>
			<li>TTL_WEEK - неделя в секундах</li>
			<li>TTL_MONTH - месяц в секундах</li>
			<li>TTL_3_MONTH - квартал месяца в секундах</li>
			<li>TTL_YEAR - год в секундах</li>
			<li>TTL_FOREVER - 0</li>
		</ul>
	</li>
	<li>
		<h4>Консольные команды</h4>
		Вызываются ./exec commandName [param1[=value1]]
		<ul>
			<li>app::clearCache - чистит кэш аппера или всех (если вызван из директории платформы)</li>
			<li>app::generateAction - генерирует конроллер</li>
			<li>app::generateApper - генерирует аппер</li>
			<li>app::generateSolution - генерирует солюшн</li>
			<li>app::generateTask - генерирует консольный скрипт (таск)</li>
			<li>app::i18nGenerate - генерирует YAML базу фраз для солюшина/аппера</li>
			<li>app::regenerateLoad - перегенерирует кэш загрузчика</li>
		</ul>
	</li>
	<li>
		<h4>Фоновая обработка</h4>
		Любую функцию можно передать в фоновую обработку в отложенном режиме.
		Платформа все сделает сама.<br>
		Для этого нужно вызвать:<br>
		bg::run(string $callback, array $arguments = [])
	</li>
</ol>

<center>
	<a href="/gettingStarted/installation">
		<span class="glyphicon glyphicon-arrow-left"></span>
		Установка
	</a>
	<span>&nbsp;&nbsp;&nbsp;</span>
	<a href="/solutions">
		Солюшины
		<span class="glyphicon glyphicon-arrow-right"></span>
	</a>
</center>
