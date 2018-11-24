<?php
class Mcustomer{
var $tabel='customer';
	public function inputDB($objekcustomer)
	{
		require('koneksi.php');
		return mysqli_query($k1,"	
			INSERT INTO ".$this->tabel."
			(id, customer_no, name, address, phone)
			VALUES (
			'',
			'".$objekcustomer->customer_no."', 
			'".$objekcustomer->name."',
			'".$objekcustomer->address."', 
			'".$objekcustomer->phone."')
			;");
	}

/*	public function hitungumur()
	{
		$hasil=2017-$this->makanan;
		return $hasil;
	}	*/
	public function cetakid()
	{
		echo "customer : ".$this->customer_no." customer_no ".$this->name." name ".$this->address." address ".$this->phone."</br>";
	}

	public function cetaklistDB(){
		require ('koneksi.php');
		return mysqli_query($k1, "SELECT * FROM ".$this->tabel.";");
	} //end function cetaklistDB

	public function cetakdetailDB($customer_no){
		require ('koneksi.php');
		return mysqli_query($k1, "SELECT * FROM customer WHERE customer_no= '$customer_no' ;");
	} //end function cetakdetailDB

	public function editDB($customer_no, $arraycustomer){
		require('koneksi.php');
		foreach($arraycustomer as $value => $isi)
		{
			$vl[]=$isi;
		}
		return mysqli_query($k1, "UPDATE ".$this->tabel." SET 
		      customer_no='".$vl[0]."',
              name='".$vl[1]."',
              address='".$vl[2]."',
              phone='".$vl[3]."'
              WHERE customer_no='".$customer_no."';");
	}

	public function deleteDB($customer_no)
	{
		require('koneksi.php');
		return mysqli_query($k1, "DELETE FROM customer WHERE customer_no='$customer_no' ;");
	}

	public function no_id()
	{
		require('koneksi.php');
		return mysqli_query($k1, "SELECT * FROM customer ORDER BY id DESC LIMIT 1; ");
	}
}
?>