<?php
require('form.php');
require('Customer.php');
require('Mcustomer.php');
class Ccustomer{

function input(){    
    $formCustomer = new Form('', 'Input');
    $formCustomer->addField('customer_no','Customer No.');
    $formCustomer->addField('name','Name');
    $formCustomer->addField('address','Phone');
    $formCustomer->addField('phone','Address');
    
    if(isset($_POST['tombol']))
	   {
    		include('view/VterimaCustomer.php');
    		$customerA=new Customer($formCustomer->fields);
    		$m_customer = new Mcustomer();
    		$qry=$m_customer->inputDB($customerA);
    	 	 if($qry==1){
    				echo "Data Berhasil diinput </br>";
    			}else{
    				echo "Data Gagal diinput </br>";
    			}
    }else{
    		include('view/VformCustomer.php');
    	}
 }//end function

function edit($customer_no){
	 $m_customer = new Mcustomer();
   $qry = $m_customer->cetakdetailDB($customer_no);
   $hasil = mysqli_fetch_array($qry);

    if(!isset($_POST['tombol'])){
      $form = "<form action='' method='post'>
                <table widht='100%'>
                  <tr>
                  <td align='right'>Customer No.</td><td><input type='text' readOnly = 'readOnly' name='customer_no' value='".$hasil['customer_no']."'></td>
                  </tr>
                  <tr>
                  <td align='right'>Name</td><td><input type='text' name='name' value='".$hasil['name']."' required = 'required'></td>
                  </tr>
                  <tr>
                  <td align='right'>Address</td><td><input type='text' name='address' value='".$hasil['address']."' required = 'required'></td>
                  </tr>
                  <tr>
                  <td align='right'>phone</td><td><input type='text' name='phone' value='".$hasil['phone']."' required = 'required'></td>
                  </tr>
                  <tr><td><input type='submit' name='tombol' value='Update' ></td>
                  </tr>
                </table>
              </form>";
      include 'view/VeditCustomer.php';
    } else {
      $datacustomer = array(
      	'customer_no'=>$_POST['customer_no'],
      	'name'=>$_POST['name'],
      	'address'=>$_POST['address'],
      	'phone'=>$_POST['phone']);
      
      $m_customer = new Mcustomer();
      $qry = $m_customer->editDB($customer_no, $datacustomer);

      echo "| <a href='listcustomer.php'>List Customer</a> | <a href='InputCustomer.php'>Input Customer</a> |";
      echo "<br><br>";

      if($qry == 1){
        echo "Data berhasil diubah<br>";
      }else {
        echo "Data gagal diubah<br>";
      }
    }
 }//end function


 function cetaklist(){
 	$m_customer = new Mcustomer();
 	$qry = $m_customer->cetaklistDB();
 	$data ="
 	<table border = '1'>
 	<tr>
  <th>Customer No.</th>
  <th>Name</th>
  <th>Address</th>
  <th>Phone</th>
 	<th>Aksi</th>
 	</tr>";
 	while($hasil=mysqli_fetch_array($qry))
 	{
 		$data .= "
 		<tr>
    <td>".$hasil['customer_no']."</td>
    <td>".$hasil['name']."</td>
    <td>".$hasil['address']."</td>
    <td>".$hasil['phone']."</td>
 		<td><a href='detailcustomer.php?customer_no=".$hasil['customer_no']."'>detail</a>  | <a href='editcustomer.php?customer_no=".$hasil['customer_no']."'> edit</a>  |<a href='deletecustomer.php?customer_no=".$hasil['customer_no']."'>  hapus </a></td>
 		</tr>";
 	}$data .="<table>"; 
 	include('view/VlistCustomer.php');
 }// end function

 function cetakdetail($customer_no){
 	$m_customer = new Mcustomer();
 	$qry = $m_customer->cetakdetailDB($customer_no);
 	$data ="
 	<table border = '1'>
 	<tr>
 	<th>Meja Nomor</th><th>Makanan</th><th>Minuman</th><th>Atas Nama</th>
 	</tr>";
 	while($hasil=mysqli_fetch_array($qry))
 	{
 		$data .= "
 		<tr>
 		<td>".$hasil['customer_no']."</td>
 		<td>".$hasil['name']."</td>
 		<td>".$hasil['address']."</td>
 		<td>".$hasil['phone']."</td>
 		</tr>";
  	}$data .="<table>"; 
 	include('view/VdetailCustomer.php');
 }// end function

 function deletecustomer($customer_no){
 	$m_customer = new Mcustomer();
 	$qry = $m_customer->deleteDB($customer_no);
 	
 	if($qry == 1){
 		header("Location:listcustomer.php");
 	}
 	else{
 		echo "Data Gagal Dihapus </br>";
 	}
 }
} //end class
?>