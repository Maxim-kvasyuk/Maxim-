<div class="auth">
	<img src="../images/vhod.png">
	<a href="/login">Войти</a>
</div>
<h1>Список задач</h1>
<?php
	echo '<div class="zadachi-ob">
		<div class="namez"><p>Имя</p><a href="/main/sort=name"><img src="../images/sort.png"></a></div>
		<div class="namee"><p>Email</p><a href="sort=email"><img src="../images/sort.png"></a></div>
		<div class="nameza"><p>Задачи</p><a href="sort=zadacha"><img src="../images/sort.png"></a></div>
		<div class="names"><p>Статус</p><a href="sort=status"><img src="../images/sort.png"></a></div>';
		if (!is_array($data[5])) {
		 print_r($data[5]);
		}
		else {
			print_r($data[5][1]);
		}
echo '<form action="" method="post" class="loginob"><input id="name" type="text" name="name" value="" placeholder="Имя">
			<input id="email" type="email" name="email" value="" placeholder="Email">
			<input id="text" type="text" name="text" value="" placeholder="Текст задачи">
			<input id="submit" name="submit" type="submit" value="Добавить">
		</form>';
$y = '';
foreach($data[0] as $key => $val)
{
 $y++;
 if($y <= $data[2]){
 echo '<div class="name"><p>'.$val['name'].'</p></div>
 <div class="email"><p>'.$val['email'].'</p></div>
 <div class="zadacha"><p>'.$val['zadacha'].'</p></div>
 <div class="status"><p>'.$val['status'].'</p></div>
	</form>';
}
}
echo '</div>';
echo '<div class="cifri">';
for($i = 1; $i <= $data[1]; $i++) {
	echo '<div><a href="/main/page='.$i.'">'.$i.'</a></div>';
	}
 echo '</div>';

?>
