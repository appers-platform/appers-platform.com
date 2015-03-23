<h3>Widget</h3>
<br><br>

Включить его можно в конфиге:
<?solutions\highlighter::out('"widgetSolution" => ["enabled" => true ],')?>

Вызвать на клиенте можно так:
<?solutions\highlighter::out('$$.solutions.widget.alert("Some message");')?>

Так же, если включен этот солюшн, можно передать GET параметр $$_solutions_widget_alert с сообщением, и оно будет отображено при загрузке страницы.

<h4>JS API:</h4>
<ul>
	<li>$$.solutions.widget.open(content, buttons, closable)</li>
	<li>$$.solutions.widget.close()</li>
	<li>$$.solutions.widget.confirm(content, button_y_cb = null, button_y = null, button_n = null, button_n_cb = null )</li>
	<li>$$.solutions.widget.alert(content, button = null)</li>
	<li>$$.solutions.widget.frame(url)</li>
	<li>$$.solutions.widget.setAfterOpenCallback(callback)</li>
	<li>$$.solutions.widget.setBeforeCloseCallback(callback)</li>
	<li>$$.solutions.widget.setAfterCloseCallback(callback)</li>
	<li>$$.solutions.widget.setNoClosable()</li>
</ul>

<br>
<br>