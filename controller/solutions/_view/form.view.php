
<h4>Пример:</h4>
<div class="row">
	<div class="col-xs-6 col-md-4"></div>
	<?=solutions\form::create(
		['Email', ['Password', 'password'] ],
		'Registration'
	)->setClass('col-xs-6 col-md-4')?>
	<div class="col-xs-6 col-md-4"></div>
</div>

Исходный код:
<?solutions\highlighter::out('
<?=solutions\form::create(
[\'Email\', [\'Password\', \'password\'] ],
\'Registration\'
)->setClass(\'col-xs-6 col-md-4\')?>')?>

<br>
<h4>API</h4>
Методы класса <b>\solutions\form</b>:
<ul>
	<li><b>__construct($header = null, $action = null, $method = 'GET')</b></li>
	<li><b>setSendButtonName($name)</b> return object</li>
	<li><b>setClass($class)</b> return object</li>
	<li><b>setHeader($header)</b> return object</li>
	<li>
		<b>static create(array $fields, $header = null, $action = null, $method = 'GET')</b><br>
		Элементы в массиве $fields будует использованы как $data в методе addField($data).
	</li>
	<li>
		<b>addField($data)</b><br>
		$data Может быть:<br>
		- экземпляром наследника класса input:
		<ul>
			<li>solutions\form\text - input type=text</li>
			<li>solutions\form\textarea</li>
			<li>solutions\form\password - input type=password</li>
			<li>solutions\form\select</li>
			<li>solutions\form\html - plain html</li>
		</ul>
		- ассоциативным массивом, к примеру: ['name' => 'field_name', 'type' => 'text', 'value' => 'value']<br>
		- простым массивом со следующим порядком: ['name', 'type', 'value']<br>
	</li>
</ul>
<br>
Методы класса <b>solutions\input</b>:
<ul>
	<li><b>__construct($name = null, $title = null)</b></li>
	<li><b>setValue($value)</b> return object</li>
	<li><b>setName($name)</b> return object</li>
	<li><b>setTitle($title)</b> return object</li>
	<li><b>setAttr($name, $value)</b> return object</li>
	<li><b>setAttrs(array $attrs)</b> return object</li>
</ul>
