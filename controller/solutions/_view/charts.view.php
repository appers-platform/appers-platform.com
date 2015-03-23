
<h3>Графики</h3>
Пример:
<?
$this->chart = new solutions\charts\simple('Chart name');
$this->chart->setData('counter', [1,2,3,1,2,3]);
print $this->chart;
?>

Исходный код:
<?solutions\highlighter::out('
$this->chart = new solutions\charts\simple(\'Chart name\');
$this->chart->setData(\'counter\', [1,2,3,1,2,3]);
print $this->chart;
')?>