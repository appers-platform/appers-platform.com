<h3>Комментарии</h3>
<h4>Вызов:</h4>
<?solutions\highlighter::out('\solutions\voting::show( $dependency_entity, $target_element_id = null,  $disabled = false, $callback = null, $callback_data = null)');?>
Аргументы:
<ul>
	<li>dependency_entity - название того, к чему привязывается голосование. К примеру - "page"/"element"/что-либо-еще.</li>
	<li>target_element_id - идентификатор объекта</li>
	<li>disabled - boolean, позволяющий отключить голосование</li>
	<li>callback - каллбэк, вызываемый когда пользователь проголосует</li>
	<li>callback_data - данные, передаваемые в вышеупомянутый каллбэк</li>
</ul>
К примеру, если Вы хотите добавить возможность голосовать на текущей странице,
то можно dependency_entity указать "page", а target_element_id - идентификатор страницы.
<br>
<br>