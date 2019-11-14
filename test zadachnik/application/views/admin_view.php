<div class="vihod">
	<img src="../images/vhod.png">
  <a href="/exit.php">Выход</a>
</div>
<h1>Панель админинстрирования</h1>
	<?php

if (!empty($data[4])) {
	   $key = array_search($data[4], $data[0]);
		echo
		'<div class="redact-ob">
		<form class="redactor" action="/admin/" method="post">
		<div class="redactor">
		<input name="name" type="text" value="'.$data[4]['name'].'">
		</div>
		<div class="redactor">
		<input name="email" type="email" value="'.$data[4]['email'].'">
		</div>
		<div class="redactor">
		<input name="zadacha" type="text" value="'.$data[4]['zadacha'].'">
		</div>
		<div class="redactor">
		<input name="status" type="text" value="'.$data[4]['status'].'">
		</div>
		<button class="redactor" type="submit" value="'.$key.'" name="saveRedact">Сохранить</button>
		</form>
		</div>';
	}
	else {

		echo '<div class="adm-ob">
		<div class="namez"><p>Имя</p><a href="sort=name"><img src="../images/sort.png"></a></div>
		<div class="namee"><p>Email</p><a href="sort=email"><img src="../images/sort.png"></a></div>
		<div class="nameza"><p>Задачи</p><a href="sort=zadacha"><img src="../images/sort.png"></a></div>
		<div class="names"><p>Статус</p><a href="sort=status"><img src="../images/sort.png"></a></div>
		<div class="namev"><p>Выполнено</p><a href="sort=vipolneno"><img src="../images/sort.png"></a></div>
		<div class="namer"><p>Редактировать</p><a href="sort=redact"><img src="../images/sort.png"></a></div>
		<div class="dobavit-zadachu">';
		if (!is_array($data[5])) {
		 print_r($data[5]);
		}
		else {
		print_r($data[5][1]);
		}

		echo '<form action="" method="post">
		<input id="name" type="text" name="name" value="" placeholder="Имя">
					<input id="email" type="email" name="email" value="" placeholder="Email">
					<input id="text" type="text" name="text" value="" placeholder="Текст задачи">
					<input id="submit" name="submit" type="submit" value="Добавить">
				</form></div>';
				$y = '';
	foreach($data[0] as $key => $val)
 {
	 $y++;
	 if($y <= $data[2]){
	 echo '<div class="name"><p>'.$val['name'].'</p></div>
	 <div class="email"><p>'.$val['email'].'</p></div>
	 <div class="zadacha"><p>'.$val['zadacha'].'</p></div>
	 <div class="status"><p>'.$val['status'].'</p></div>
	 <div class="vipolneno">
	 <form action="/admin/page='.$data[3].'" method="post">
	  <button type="submit" value="'.$key.'" name="vipolneno">Выполнено</button>
		</div>
		<div class="redact">
		<button type="submit" value="'.$key.'" name="redact">Редактировать</button>
		</div>
		</form>';
 }
 }
   echo '</div>';
 echo '<div class="cifri">';
 for($i = 1; $i <= $data[1]; $i++) {
		echo '<div><a href="/admin/page='.$i.'">'.$i.'</a></div>';
		}
	}
		echo '</div>';

?>
</br>
</br>
