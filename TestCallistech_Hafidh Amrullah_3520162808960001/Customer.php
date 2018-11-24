<?php
class Customer{
	public $customer_no;
	public $name;
	public $address;//encapsulation
	public $phone;//Customer

	//public bisa
	//private tidak bisa diakses dan diubah nilainya,harus lewat method 
	
	public function __construct($datacustomer)
	{
		$this->customer_no=$datacustomer[0]['value'];
		$this->name=$datacustomer[1]['value'];
		$this->address=$datacustomer[2]['value'];
		$this->phone=$datacustomer[3]['value'];
	}//method yang dipanggil otomatis ketika object diciptakan
	
	
	public function ganticustomer_no($customer_nobaru)
	{
		$this->customer_no=$customer_nobaru;
	}
	public function gantiname($namebaru)
	{
		$this->name=$namebaru;
	}
	
	public function cetakname()
	{
		echo "name customer: ".$this->name."</br>";
	}
	
	public function gantiaddress($addressbaru)
	{
		$this->address=$addressbaru;
	}

	public function inputDBcustomer()
	{
		require('koneksi.php');
		return mysqli_query($k1,"	
			INSERT INTO customer(customer_no, name, address, phone)
			VALUES (
			'".$this->customer_no."', '".$this->name."', '".$this->address."','".$this->phone."');");
	}

	public function cetakid()
	{
		echo "customer : ".$this->customer_no." customer_no ".$this->name." address ".$this->address." phone ".$this->phone."</br>";
	}
}
?>