<?php
class Form{
var $fields = array();
var $action;
var $submit = "";
var $jumField=0;

function __construct($action, $submit)
	{
	$this->action = $action;
	$this->submit = $submit;
	}

function displayForm()
	{
	    $m_customer = new Mcustomer();
	    $qry = $m_customer->no_id();
	    $no_id = mysqli_fetch_array($qry);

	    $no = $no_id['id'];
	    $no_unik = $no+1;

	    echo "Create Customer-CMR".$no_unik;
		echo"<form action='".$this->action."' method='post'>";
		echo"<table>";
		echo "<tr>
                  <td align='right'>Customer No.</td><td><input type='text' readOnly = 'readOnly' name='customer_no' value = 'CRM".$no_unik."'></td>
                  </tr>
                  <tr>
                  <td align='right'>Name</td><td><input type='text' name='name' required = 'required'></td>
                  </tr>
                  <tr>
                  <td align='right'>Address</td><td><input type='text' name='address' required = 'required'></td>
                  </tr>
                  <tr>
                  <td align='right'>Phone</td><td><input type='text' name='phone' required = 'required'></td>
                  </tr>
                  <tr><td><input type='submit' name='tombol' value='Input'></td>
                  </tr>
                </table>
              </form>";
	}

function addField($name,$label)
	{
	$this->fields[$this->jumField]['name']=$name;
	$this->fields[$this->jumField]['label']=$label;
	$this->jumField++;
	}

function getForm()
	{
		for($i=0; $i<count($this->fields); $i++)
			{
				$this->fields[$i]['value']=$_POST[$this->fields[$i]['name']];
				echo $this->fields[$i]['label']." : ". $_POST[$this->fields[$i]['name']]."</br>";
			}
	}

function terimaData()
	{
		for($i=0;$i<count($this->fields);$i++)
		{
			echo $this->fields[$i]['label'].":".$_POST[$this->fields[$i]['name']]." </br>";
		}
	}
}
?>