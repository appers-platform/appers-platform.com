<h3>Комментарии</h3>
<h4>Вызов:</h4>
<?solutions\highlighter::out('\solutions\comment::show($dependency_entity, $target_element_id = null)');?>
Аргументы:
<ul>
	<li>dependency_entity - название того, к чему привязывается коментарий. К примеру - "page"/"element"/что-либо-еще.</li>
	<li>target_element_id - идентификатор объекта</li>
</ul>
К примеру, если Вы хотите добавить возможность оставлять комментарии на текущей странице,
то можно dependency_entity указать "page", а target_element_id - идентификатор страницы.
<h4>Параметры конфига:</h4>
<ul>
	<li>complains (bool) - включить/выключить возможность пожаловаться на коментарий.</li>
	<li>spam_report (bool) - включить/выключить возможность пожаловаться на коментарий как на спам.</li>
</ul>
<br>
<br>