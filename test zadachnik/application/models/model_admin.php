<?php

class Model_admin extends Model
{

  //Метод отвечающий за пагинацию.
	public function get_page($b) {
  $this->redact();
  $this->update_arr();
	$p = $b;
	$data = $this->rvivod($p);
	//$this->dobavit_zadachu();
	return $data;

	}

  //Срабатывает при открытии страницы admin.
	public function get_data()
	{
    $this->redact();
    $this->update_arr();
    //$this->dobavit_zadachu();
    $p = isset( $_GET['page'] ) ? (int) $_GET['page'] : 1;
    $data = $this->rvivod($p);
    return $data;
}

public function get_sort() {
  $data = $this->sortirovka();
  return $data;
}
}
?>
