<?php

class Model_Main extends Model
{

	//Метод отвечающий за пагинацию.
	public function get_page($b) {
	$p = $b;
	$data = $this->rvivod($p);
	//$this->dobavit_zadachu();
	return $data;
	}

	public function get_data()
	{
		$p = isset( $_GET['page'] ) ? (int) $_GET['page'] : 1;
		//$this->dobavit_zadachu();
		$data = $this->rvivod($p);
			return $data;
 }

 // Сортировка
 public function get_sort() {
   $data = $this->sortirovka();
   return $data;
 }
}
?>
