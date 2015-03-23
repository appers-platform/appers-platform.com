
Пример:
<?solutions\highlighter::out("\\solutions\\mail::send('receiver@example.com', 'Title of test message', 'This is body of test email');")?>

Параметры конфига (опционально):
<?solutions\highlighter::out("
'mailSolution' => [
'sender_email'	=> 'notifications@example.com',
'sender_name'	=> 'Notifications service',
]
")?>

Параметры конфига для отладки (опционально):
<?solutions\highlighter::out("
'mailSolution' => [
'debug' => '/path/to/mail.html',
'debugOnly' => true
]
")?>

Для отправки почты с выделенного сервера, Вы можете указать параметр <i>'background' => true</i> в конфиге, и запустить скрипт отправки <i>./run exec::mail::send</i> на нем.
<br>
<br>
Если Вы хотите отправлять почту через Mandrill, Вы можете указать это в конфиге:
<?solutions\highlighter::out("
'mailSolution' => [
'driver' => 'mandrill',
'mandrill_key' => '****YOUR SECRET MANDRILL KEY****'
]
")?>
Драйверы:<br>
- mandrill<br>
- sendmail<br>
<br>
Также, Вы можете указать какой драйвер будет использован в коде:
<?solutions\highlighter::out("\\solutions\\mail\\mandrill::send('receiver@example.com', 'Title of test message', 'This is body of test email');")?>
