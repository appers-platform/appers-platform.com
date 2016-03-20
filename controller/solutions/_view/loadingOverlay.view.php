<h3>loadingOverlay</h3>
Отображает полупрозрачный серый слой поверх контента страницы с иконкой загрузки в центре при:
<ul>
    <li>клике на ссылку (если событие всплыло до document)</li>
    <li>срабатывании события unload (работает в некоторых браузерах)</li>
</ul>

<br><br>

Включить его можно в конфиге:
<?solutions\highlighter::out('"loadingOverlaySolution" => ["enabled" => true ],')?>
<br>
<br>