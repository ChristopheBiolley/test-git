<head>
	<title>Formulaire</title>
</head>

<script>
	function goback()
	{
		history.go(-1);
	}
</script>
<?php 
$company="";
$name="";
$surname="";
$address1="";
$address2="";
$postal="";
$locality="";
$fixe="";
$mobile="";
$mail="";
$site="";
$id=0;
$url=base_url()."admins/newclient";

if(isset($client))
{
	foreach($client as $row):
	$id=$row->client_id;
	$company=$row->company;
	$name=$row->name;
	$surname=$row->surname;
	$address1=$row->address1;
	$address2=$row->address1;
	$postal=$row->postal_code;
	$locality=$row->locality;
	$fixe=$row->fixe_phone;
	$mobile=$row->mobile_phone;
	$mail=$row->mail;
	$site=$row->url;
	$url=base_url()."admins/upclient/".$id;
	endforeach;
}
?>
<form method="post" action="<?php echo $url;?>">
	<input type="hidden" name="id" value="<?php echo $id;?>"/>
	Company:<input type="text" name="company" value="<?php echo $company;?>"/>
	Prénom<input type="text" name="name" value="<?php echo $name;?>"/>
	Nom:<input type="text" name="surname" value="<?php echo $surname;?>"/>
	Adresse 1:<input type="text" name="address1" value="<?php echo $address1;?>"/>
	Adresse 2:<input type="text" name="address2" value="<?php echo $address2;?>"/>
	Code postal:<input type="text" name="postal" value="<?php echo $postal;?>"/>
	Localité:<input type="text" name="locality" value="<?php echo $locality;?>"/>
	Tél. fixe:<input type="tel" name="fixe" value="<?php echo $fixe;?>"/>
	Tél. mobile:<input type="tel" name="mobile" value="<?php echo $mobile;?>"/>
	Mail:<input type="email" name="mail" value="<?php echo $mail;?>"/>
	Site:<input type="url" name="site" value="<?php echo $site;?>"/>	
	<br/>						
	<input type="submit" value="OK"/>
</form>

<button onclick="goback()">Annuler</button>