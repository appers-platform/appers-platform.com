<h3>Appers.JS</h3>
<div>
	Библиотека легких клиентских скриптов.
</div>
<h4>API</h4>
<ol>
	<li><i>$$.loadScript(src, [callback]);</i> - загрузчик скриптов.</li>
	<li><i>$$.log(data);</i> - вывести информацию в лог браузера.</li>
	<li><i>$$.error(data);</i> - вывести ошибку в лог браузера.</li>
	<li><i>$$.registerSolution(name, solution_object);</i> - зарегистрировать объект солюшина.</li>
	<li><i>$$.callSolutionScripts(name, name, data, data_sign);</i> - вызвать скрипт солюшина.</li>
	<li><i>$$.registerPattern(name, pattern);</i> - зарегистрировать паттерн.</li>
	<li><i>$$.registerLib(name, lib);</i> - зарегистрировать библиотеку.</li>
	<li><i>$$.serializeData(element);</i> - сериализовать данные.</li>
	<li><i>$$.serialize(element);</i> - сериализовать елемент.</li>
	<li><i>$$.serializeObject(obj, prefix);</i> - сериализовать объект.</li>
	<li><i>$$.getSolutionAjaxFunction(element);</i> - вызов скрипта солюшина.</li>
	<li><i>$$.ready(callback);</i> - аналог $.ready().</li>
	<li><i>$$.getVar(name);</i> - получить переменную платформы.</li>
	<li><i>$$.isArray(name);</i> - проверить является ли объек массивом.</li>
	<li><i>$$.executeFunctionByName(functionName, args);</i> - вызов функции по имени (к примеру, 'a.b.func').</li>
</ol>

<center>
	<a href="/gettingStarted/framework">
		<span class="glyphicon glyphicon-arrow-left"></span>
		Фреймворк
	</a>
</center>
