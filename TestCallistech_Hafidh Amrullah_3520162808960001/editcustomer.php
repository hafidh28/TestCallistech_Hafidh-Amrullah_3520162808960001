<?php
require('Ccustomer.php');
$customer_no=$_GET['customer_no'];
$c_customer = new Ccustomer();
$c_customer -> edit($customer_no);
?>