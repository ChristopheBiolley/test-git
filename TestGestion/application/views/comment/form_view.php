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
$text="";

if($this->session->userdata('user')==NULL)	
{
	$author="guest";
}
else
{
	$author=$this->session->userdata('user');
}

$id=0;
$date="";
$from=$this->uri->segment(3);
$type=$this->uri->segment(4);
$url=base_url()."comments/news";
?>
<form method="post" action="<?php echo $url;?>">
	<input type="hidden" name=id value="<?php echo $id;?>"/>
	<input type="hidden" name=type value="<?php echo $type;?>"/>
	<input type="hidden" name=from value="<?php echo $from;?>"/>
	<input type="hidden" name="date" value="<?php echo date ('Y-m-d');?>"/>
	<input type="hidden" name="author" value="<?php echo $author;?>"/>	
	Texte : <br/>
	<textarea name="text"><?php echo $text;?></textarea>	
	<br/>						
	<input type="submit" value="OK"/>
</form>
<button onclick="goback()">Annuler</button>