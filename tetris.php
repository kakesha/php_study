<?php 

	// эта строка нужна, чтобы гарантированно отображался русский текст
	header('Content-Type: text/html; charset=utf-8');
	
	// установили часовой пояс, чтобы показать текущую дату
	date_default_timezone_set('Europe/Moscow');
	echo 'Сервер тетриса загрузился: ' . date('F j, Y, g:i a') . '<br>';
		
	// создаем объект базы данных (типа  sqlite)
	// __DIR__ - абсолютный путь к папке, из которой запускается скрипт
	$db = new PDO('sqlite:' . __DIR__ . '/scores.sqlite');
	// проверяем его на корректность
	if (isset($db))
	{
		echo 'Подключение к СУБД прошло успешно.<br>';
		
		// выбрать все записи из таблицы очков
		$result = $db->query ('SELECT * FROM scores');
		foreach($result as $row)
		{
			echo $row['username'] . ': ' .  $row['score'] . '<br>';
		}	
	}	
?>

//I found you and went to sleep. gadya