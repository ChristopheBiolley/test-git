<?php $this->load->helper('url'); ?>
<html>
	<head>		
		<title>Menu</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/gestion.css">
	</head>
	<body>
		<h3>Projets</h3>
		<table class="menu">
			<tr>
				<th>Titre</th>
				<th>Description</th>
				<th>Date de création</th>
			<!-- 	<th>Auteur</th>			
				<th>Status</th> -->
			</tr>
			<?php foreach ($project as $row):?>
			<tr>		
				<td><a href="<?php echo base_url(); ?>projects/detail/<?php echo $row->project_id?>"><?php echo $row->title;?></a></td>
				<td><?php echo $row->description;?></td>
				<td><?php echo $row->create_date;?></td>
			<!-- 	<td><?php echo $row->author_user_id;?></td>
				<td><?php echo $row->status_id;?></td>	 -->
				<td>
				<?php $onclick = array('class="btn" onclick'=>"return confirm('Are you sure?')");?>
				<?=anchor(base_url()."projects/delete/".$row->project_id, 'Delete', $onclick);?>
				</td>	
			</tr>
			<?php endforeach;?>
		</table>	
		<br/>	
		<a class="btn" href="<?php echo base_url();?>projects/form">Nouveau projet</a>
		<br/>			
		<br/>
		<h3>Tâches</h3>
		<table class="menu">
			<tr>
				<th>Titre</th>
				<th>Description</th>
				<th>Date de création</th>
			<!-- 	<th>Auteur</th>			
				<th>Status</th> -->
			</tr>
			<?php foreach ($task as $row):?>
			<tr>		
				<td><a href="<?php echo base_url(); ?>tasks/detail/<?php echo $row->task_id?>"><?php echo $row->title;?></a></td>
				<td><?php echo $row->description;?></td>
				<td><?php echo $row->create_date;?></td>
			<!-- 	<td><?php echo $row->author_user_id;?></td>
				<td><?php echo $row->status_id;?></td>	 -->
				<td >
				<?php $onclick = array('class="btn" onclick'=>"return confirm('Are you sure?')");?>
				<?=anchor(base_url()."tasks/delete/".$row->task_id, 'Delete', $onclick);?>				
				</td>	
			</tr>
			<?php endforeach;?>
		</table>			
	</body>
</html>