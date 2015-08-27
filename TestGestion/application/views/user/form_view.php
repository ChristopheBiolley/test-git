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
$name="";
$prename="";
$login="";
$pw="";
$mail="";
$access_id="";
$id=0;
$url=base_url()."admins/newuser";
if(isset($user))
{
	foreach($user as $row):
	
	$name=$row->name;
	$prename=$row->prename;	
	$mail=$row->mail;
	$access_id=$row->access_id;
	$id=$row->user_id;	
	$url=base_url()."admins/upuser/".$id;
	endforeach;
}
?>
<form method="post" action="<?php echo $url;?>">
	<input type="hidden" name="id" value="<?php echo $id;?>"/>
	Prénom<input type="text" name="prename" value="<?php echo $prename;?>">
	Nom:<input type="text" name="name" value="<?php echo $name;?>">
	<?php if($id==0){?>
	Login:<input type="text" name="login" value="<?php echo $login;?>">
	Mot de passe<input type="password" name="pw" value="<?php echo $pw;?>">
	<?php }?>
	Niveau d'access:		
		<select name="access">
		<option>choisir un niveau</option>
		<?php foreach ($access as $row): ?>
		<option <?php if($access_id==$row->name){echo "selected";} ?>
		
		value="<?php echo $row->access_id;?>"><?php echo $row->name;?></option>
		<?php endforeach;?>
	</select> 
	Mail:<input type="email" name="mail" value="<?php echo $mail;?>">
	<br/>					
	<input type="submit" value="OK"/>
</form>
<button onclick="goback()">Annuler</button>