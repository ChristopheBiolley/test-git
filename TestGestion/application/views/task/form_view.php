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
$title="";
$descr="";
$id=0;
$project_id=$this->uri->segment(3);
$url=base_url()."tasks/add/".$project_id;


if(isset($task))
{
	foreach($task as $row):
	
	$title=$row->title;
	$descr=$row->description;
	$id=$row->task_id;
	$url=base_url()."tasks/update/".$id;
	$start_date=$row->start_date;
	$end_date=$row->end_date;
	$author_id=$row->author_user_id;
	$status_id=$row->status_id;
	$allowed=$row->time_allowed;
	$validation=$row->validation_date;
	$estimate=$row->time_estimate;
	$real=$row->time_real;
	endforeach;
}

if($id==0)
{
?>
<form method="post" action="<?php echo $url;?>">
	<input type="hidden" name=id value="<?php echo $id;?>"/>
	<input type="hidden" name="create" value="<?php echo date ('Y-m-d')?>"/>
	<input type="hidden" name="status" value="1"/>
	<input type="hidden" name="project" value="<?php echo $project_id;?>"/>
	<!-- <input type="hidden" name="URL" value="<?php echo current_url();?>"/> -->
	Titre : <input type="text" name="title" value="<?php echo $title;?>"/><br/>
	Description : <br/>
	<textarea name="descr"><?php echo $descr;?></textarea><br/>
	Auteur:	
	<select name="author">
		<?php foreach ($user as $row): ?>
		<option  value="<?php echo $row->user_id;?>"><?php echo $row->prename." ".$row->name;?></option>
		<?php endforeach;?>
	</select> <br/>					
	<input type="submit" value="OK"/>
</form>
<?php 
}
else
{
?>
<form method="post" action="<?php echo $url;?>">
	<input type="hidden" name=id value="<?php echo $id;?>"/>		
	<!-- <input type="hidden" name="URL" value="<?php echo current_url();?>"/> -->
	Titre : <input type="text" name="title" value="<?php echo $title;?>"/><br/>
	Description : <br/>
	<textarea name="descr"><?php echo $descr;?></textarea><br/>
	Auteur:	
	<select name="author">
		<?php foreach ($user as $row): ?>
		<option <?php if($author_id==$row->prename." ".$row->name){echo "selected";} ?>
		
		value="<?php echo $row->user_id;?>"><?php echo $row->prename." ".$row->name;?></option>
		<?php endforeach;?>
	</select> 
	<br/>
	Date de départ*:
	<input type="date" name="start" value="<?php echo $start_date;?>">
	<br/>
	Status:
	<select name="status">
		<?php foreach ($status as $row): ?>
		<option <?php if($status_id==$row->status){echo "selected";} ?>
		
		value="<?php echo $row->status_id;?>"><?php echo $row->status;?></option>
		<?php endforeach;?>
	</select> 
	<br/>
	Temps alloué*:
	<input type="date" name="allowed" value="<?php echo $allowed;?>">	
	<br/>	
	Date de fin*:
	<input type="date" name="end" value="<?php echo $end_date;?>">	
	<br/>	
	Date de validation*:
	<input type="date" name="validation" value="<?php echo $validation;?>">	
	<br/>	
	Temps estimé*:
	<input type="date" name="estimated" value="<?php echo $estimate;?>">	
	<br/>
	Temps réel*:
	<input type="date" name="real" value="<?php echo $real;?>">	
	<br/>	
	*Les dates doivent être écrite dans ce format: AAAA-MM-JJ<br/>	
	<input type="submit" value="OK"/>
</form>
<?php 
}
?>
<button onclick="goback()">Annuler</button>