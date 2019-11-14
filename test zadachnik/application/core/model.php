<?php

class Model
{

	// Функция добавления в массив.
	public function dobavit($value, $filename)
	{
	$str_value = serialize($value);
	$f = fopen($filename, 'w');
	fwrite($f, $str_value);
	fclose($f);
	}

	//Функция вывода из массива.
	public function vivesti($filename)
	{
	$file = file_get_contents($filename);
	$value = unserialize($file);
	return $value;
	}

	//Метод добавления отметки выполнено и редактирования записи админинстратором.
	public function update_arr() {
	  //Условие для выполнено
	  if(isset($_POST['vipolneno']))
	  {
	    $vipolneno = $_POST['vipolneno'];
	    $arrVipolneno = $this->vivesti('baza.txt');
	    $redVip = $arrVipolneno[$vipolneno];
	    $arr1 = $this->vivesti('baza.txt');
	    $arr1[$vipolneno] = $redVip;
	    $arrVip = $arr1[$vipolneno];
	    $arrVip['status'] = 'Выполнено';
	    $arr1[$vipolneno] = $arrVip;
	    $arr1 = $this->dobavit($arr1, 'baza.txt');
	  }

	  //Условие для редактирования
	  if(isset($_POST['redact'])) {
	    $redact =$_POST['redact'];
	    $arrRedact = $this->vivesti('baza.txt');
	    $redElem = $arrRedact[$redact];
	    return $redElem;
	  }
	}

 // Метод отвечающий за вывод из массива.
public function rvivod($p) {

$arr1 = $this->vivesti('baza.txt');
//print_r($arr1);
$total = count($arr1);//Количество элементов массива
$limit = 3;//Лимит показываемых страниц
$totalPages = ceil( $total/ $limit );//Сколько всего страниц
$totalPage = $total % $limit;//Деление с остатком
$k  = '';
for($v = 0; $v <= $total; $v = $v+$limit){
$k++;
 if($k <= $totalPages){
 $new_mas[$k] = $v;
}
}
$num = $p;
$p = $new_mas[$p];
$a = $p;
$b = $p + 1;
$c = $p + 2;
@$data = array($a => $arr1[$a], $b => $arr1[$b], $c => $arr1[$c]);
$data = array_filter($data);
$col = count($data);
$arrObsvyaz = $this->dobavit_zadachu();
$redElem = $this->update_arr();
return array($data, $totalPages, $col, $num, $redElem, $arrObsvyaz);
}

//Метод для редактирования записи админом
public function redact() {

  if(isset($_POST['saveRedact']))
  {
    $saver = $_POST['saveRedact'];
    $nameRedact = htmlspecialchars($_POST['name']);
    $emailRedact = htmlspecialchars($_POST['email']);
    $zadachaRedact = htmlspecialchars($_POST['zadacha']);
    $arrSaver = array('name' => $nameRedact,
   			'email' => $emailRedact,
   			'zadacha' => $zadachaRedact,
   			'status' => 'Выполнено </br> Отредактировано </br> админинстратором');
    $arrSaves = $this->vivesti('baza.txt');
    $arrSave = $arrSaves[$saver];
    if ($arrSave !== $arrSaver) {
      $arrSaves [$saver] = $arrSaver;
      $arrSaves = $this->dobavit($arrSaves, 'baza.txt');
			return $arrSaves;
    }
  }
  }

// Метод отвечающий за добавление задачи в список.
public function dobavit_zadachu() {
if(!empty($_POST['submit'])){
if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['text'])){
 $name = htmlspecialchars($_POST['name']);
 $email = htmlspecialchars($_POST['email']);
 $text = htmlspecialchars($_POST['text']);
 $arr1 = $this->vivesti('baza.txt');
 $arr2 [] = array('name' => $name,
		 'email' => $email,
		 'zadacha' => $text,
		 'status' => 'В работе');
 $arr3 = array_merge($arr2, $arr1);
 $this->dobavit($arr3, 'baza.txt');
 $arr3 = $this->vivesti('baza.txt');
 $arrObsvyaz = '<p class="obsvyaz" style="color: green">Вы успешно добавили задачу</p>';
	return array($arr3, $arrObsvyaz);
}
else {
	$arrObsvyaz = '<p class="obsvyaz" style="color: red">Вы заполнили не все поля, попробуйте еще раз</p>';
	return $arrObsvyaz;
}
}
}

//Метод сортировки массива
public function sortirovka() {

	 $arrSort = $this->vivesti('baza.txt');
   $data = array_reverse($arrSort);
	 $data = $this->dobavit($data, 'baza.txt');
	 $p = isset( $_GET['page'] ) ? (int) $_GET['page'] : 1;
	 $data = $this->rvivod($p);
	 return $data;
}

	// метод выборки данных
	public function get_data() {

	}

	public function get_page($b) {}

	public function get_sort() {

	}
}
