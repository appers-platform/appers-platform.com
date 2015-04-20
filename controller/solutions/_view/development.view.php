<? /* Thanks to D.G. - in my thoughts, I will always call this page: "how to sculpt ravioli" :) */ ?>
<h3>Разработка солющинов</h3>
<br>
<ol>
	<li>
		<h4>Простой солюшн</h4>
		<ol>
			<li>
				Создайте директорию слюшина - ROOT/{your_solution}<br>
				Так же Вы можете сделать это скриптом: ./exec app::gereateSolution
			</li>
			<li>
				Создайте главный файл солюшина (если солюшн был создан скриптом, он уже будет существовать) - ROOT/{your_solution}/{your_solution}.php<br>
				Добавьте код солюшина:
				<?=\solutions\highlighter::out('<?
namespace solutions;
class your_solution extends solution {
	// Put your code here
}
')?>
			</li>
			<li>Затем, Вы можете вызвать метод солюшина: ROOT\solutions\your_solution::your_method();</li>
		</ol>
	</li>
	<li>
		<h4>Static</h4>
		Если Вы хотите загрузить статику, Вы можете это сделать так:
		<?=\solutions\highlighter::out('
\js::addUrl("https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js", \js::GROUP_SOLUTIONS);
		')?>
		<i>
			<span class="glyphicon glyphicon-flash"></span>
			Если Вы хотите использовать собственные статические файлы, поместите их в ROOT/{your_solution}/static - они будут загружены автоматически.
		</i><br><br>
		Для работы с изображениями, поместите их в ROOT/{your_solution}/public<br>
		Их URL будет: /solutions-public/{your_solution}/file.jpg
	</li>
	<li>
		<h4>Конфиг</h4>
		Вы можете назначить конфиг для солюшина - ROOT/{your_solution}/config.php.<br>
		Например:
		<?=\solutions\highlighter::out('
return [
	"param" => "value",
	"param2" => "value2"
];
		')?>
		Затем, Вы можете переопределить настройки из конфига Аппера:
		<?=\solutions\highlighter::out('
"your_solutionSolution" => [
	"param" => "new value"
]
		')?>
	</li>
	<li>
		<h4>API</h4>
		<ul>
			<li>static \solutions\your_solution::getConfig($param_name, $required = true); - Получить значение из конфига.</li>
			<li>static \solutions\your_solution::callScripts($scripts_data = null); - Вызвать клиентский скрипт солюшина, передав ему данные.</li>
			<li>static \solutions\your_solution::getCalledData($key = null, $required = false); - Получить кросс-данные вызова.</li>
			<li>static \solutions\your_solution::setScriptData(); - Получить кросс-данные скрипта.</li>
			<li>static \solutions\your_solution::getUrl($controller_name = null, array $get_params = []) - строит URL к указанному контроллеру с учетом настроек роутинга и передаваемых параметров.</li>
		</ul>
	</li>
	<li>
		<h4>JS</h4>
		JS код солюшина и его конроллеров запускаются в отдельном пространстве.
		Это позволяет избежать путаницы в коде, а так же позволяет добавить два экземпляра одного солюшина на одну страницу (к примеру, два блока комментариев относящихся к разным элементам).
		<h5>API:</h5>
		<ul>
			<li>
				$$ajax - специальный ajax метод, сохраняющий кросс-данные (описание ниже).
				Синтаксис метода $$ajax аналогичен
				<a href="http://api.jquery.com/jquery.post/" target="_blank">jquery.post</a>
			</li>
			<li>$$data - массив кросс-данных</li>
		</ul>
	</li>
	<li>
		<h4>Кросс-данные</h4>
		В случае, если нужно <u>безопасно</u> передать данные по схеме:
		"
		Сервер
		<span class="glyphicon glyphicon-arrow-right"></span>
		Клиент
		<span class="glyphicon glyphicon-arrow-right"></span>
		Сервер
		",
		это можно сделать следующим образом:
		<ol>
			<li>
				<b>Сервер</b><br>
				Вызвать клиентский скрипт солюшина, передав ему данные:
				<?=\solutions\highlighter::out('self::callScripts(["some_name" => "some_value"]);')?>
			</li>
			<li>
				<b>Клиент</b><br>
				Получить данные:
				<?=\solutions\highlighter::out('alert($$data.some_name);')?>
				Сделать AJAX запрос из солюшина так, что бы кросс-данные были сохранены:
				<?=\solutions\highlighter::out('$$ajax( "ajax/test.html", function( data ) {
	$( ".result" ).html( data );
});
')?>
			</li>
			<li>
				<b>Сервер</b><br>
				Получить данные можно обратившись к солюшину:
				<?=\solutions\highlighter::out('\solutions\your_solution::getCalledData($key = null, $required = false)')?>
				Так же можно обратится к контроллеру солюшина:
				<?=\solutions\highlighter::out('\solutions\your_solution_controller::getCalledData($key = null, $required = false)')?>
			</li>
		</ol>
		Под безопасной передачей данных подразумевается, что они подписываются на сервере специальным ключом.
		При их изменении на клиенте не совпадет контрольная сумма на сервере.
		Таким образом получается сохранить целостность данных, и гарантировать их оригинальность.
	</li>
	<li>
		<h4>MVC солюшины</h4>
		<pre>
<b>ROOT/solutions/your_solution/</b>
├── <b>static/</b> - директория со статикой
├── <b>controller/</b> - директория с контроллерами
├── <b>model/</b> - директория с моделями
├── <b>view/</b> - директория с представлениями
├── <b>config.php</b> - конфиг
└── <b>your_solution.php</b> - главный файл солюшина
		</pre>
		<i>
			<span class="glyphicon glyphicon-exclamation-sign"></span>
			Весь код (кроме главного файла) в MVC солюшинах должен быть помещен в namespace solutions\your_solution<br>
			Это необходимо для корректной работы солюшина.<br>
		</i>
		<br>
		<ol>
			<li>
				<b>Контроллер</b><br>
				Аналогично простому контроллеру в приложении.
				По умолчанию, это:
<?=\solutions\highlighter::out('
<?
namespace solutions\your_solution;
class your_solution_solutionController extends \\solutionController {
	public function first() {
		// some code
	}
}
')?>
				<i><span class="glyphicon glyphicon-flash"></span> Вы можете создать только прдеставление (файл .view.php), не создавая сам файл контроллера, при этом будет создан виртуальный контроллер.</i><br>
		<i><span class="glyphicon glyphicon-flash"></span> Вы можете создать только конроллер (без прдеставления .view.php, оно не обязательно).</i><br>
		<i><span class="glyphicon glyphicon-flash"></span> Вы можете создать контроллер без определения класса - просто пометите код прямо в файл (не забудьте указать название namespace`а):</i><br>
<?=\solutions\highlighter::out('
<?
namespace solutions\your_solution;
// some code
')?>
				<h5>Маршрутизация</h5>
				<h6>Конфиг аппера</h6>
				Вы можете указать дополнительные маршруты к контроллерам солюшина в конфиге аппера:
				<?=solutions\highlighter::out("
'routes' => [
	'/your_solution/controller' => '/__solutions/your_solution/controller'
]
")?>
				"__solutions" - ключевое слово, означающее солюшн.<br>
				<h6>Маршруты по умолчанию</h6>
				В конфиге солюшина, Вы можете указать пути по умолчанию:
				<?=solutions\highlighter::out("
'routes' => [
	'/your_solution_url/controller' => 'controller',
	'/your_solution_url/controller2' => 'controller2'
],
")?>
				И включить их из конфига аппера:
				<?=solutions\highlighter::out(" 'your_solutionSolution' => [ 'enabled' => true ], ")?>
				<h5>API</h5>
				Вы можете переопределить в контроллере:
				<ol>
					<li>function first(){} - выполняется сначала</li>
					<li>function post(){} - выполняется когда контроллер вызывается методом POST</li>
					<li>function get(){} - выполняется когда контроллер вызывается методом GET</li>
					<li>function last(){} - выполняется в конце</li>
				</ol>
				Methods:
				<ul>
					<li>returnJson($json) - если Вы вызовите этот метод, JSON будет возвращен (без HTML).</li>
					<li>
						setView($view) - указать макет (имя без '.view.php').
						Будет загружен 'PROJECT_ROOT/solutions/your_solution/some.view.php'
					</li>
					<li>
						setGlobalView($layout) - указать макет (имя без '.view.php').
						Будет загружен 'PROJECT_ROOT/controllers/_view/some.view.php'
					</li>
					<li>disableWrappers() - отключить обертки</li>
					<li>enableWrappers() - включить обертки</li>
					<li>isWrappersEnabled() - проверить, включены ли обертки</li>
				</ul>
				<h5>Передача данных</h5>
				Контроллер является дочерним классом stdClass.<br>
				Если Вы хотите передать данные в представление, Вы можете вызвать $this->var_name = 'value';<br>
				В представлении, данные будут доступны как $var_name.<br><br>
			</li>
			<li>
				<b>Представление</b><br>
				Поместите в директорию '_view'.
				Должно называться так же, как и контроллер (к примеру, для конроллера 'some_controller' - это будет файл '/controller/_view/some.view.php').
				Вывод переменных:
				<?=solutions\highlighter::out('<?=$defined_in_controller?>')?>
				<i>
					<span class="glyphicon glyphicon-flash"></span>
					Может быть переопределен из аппера - для этого поместите файл в аппер сюда: 'PROJECT_ROOT/solutions/your_solution/some.view.php'.
				</i>
				<br>
				<br>
			</li>
			<li>
				<b>Обертка</b><br>
				Обертка - это обертка для представления. Поместите ее в директорию _view (с представлением). Назовите '_wrapper.php'. Контент будет доступен следующим образом:
				<?=solutions\highlighter::out('<?=$content?>')?>
				<i>
					<span class="glyphicon glyphicon-flash"></span>
					Может быть переопределен из аппера - для этого поместите файл в аппер сюда: 'PROJECT_ROOT/solutions/your_solution/_wrapper.php'.
				</i><br>
				<i>
					<span class="glyphicon glyphicon-flash"></span>
					Вы можете создать так же обертку для конкретного контроллера.
					Используйте файл 'ROOT/solutions/your_solution/view/_wrapper_some.view.php'.
					Для переопределения из аппера поместите файл сюда: 'PROJECT_ROOT/solutions/your_solution/_wrapper_some.view.php'.
				</i>
				<br>
				<br>
			</li>
			<li>
				<b>Статика</b><br>
				Вы должны поместить его в ту же директорию, что и представление или в 'PROJECT_ROOT/solutions/your_solution/static/'.<br>
				Автоматически, будут загружены файлы которые имеют такое же имя, как и контроллер (к примеру, для контроллера 'some_controller' будет загружен файл 'some.less').
				Так же в любом случае загружаются файлы: 'styles.less', 'styles.css', 'scripts.coffee', 'scripts.js'.<br>
				<br>
			</li>
		</ol>
	</li>
	<li>
		<h4>Применение</h4>
		В случае, если солюшин встраивается блоком (а не самостоятельным контроллером),
		в обычный контроллер стоит вложить вызов конроллера солюшина одним из следующих способов:
		<ol>
			<li>$this->controller_output = \solutions\your_solution::controller('controllerName');</li>
			<li>$this->controller_output = \solutions\solution::controller('solutionName\\controllerName');</li>
			<li>$this->controller_output = \solutions::controller('solutionName', 'controllerName');</li>
		</ol>
		<br>
		Затем его стоит вывести в представлении:
		<?=solutions\highlighter::out('<?=$controller_output?>')?>
	</li>
</ol>
<br>
<br>
