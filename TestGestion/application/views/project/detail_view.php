<?php $this->load->helper('url');?>
<html>
	<head>
		<title>Projet</title>
				<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/gestion.css">		
	</head>
	<body>
	<table>
		<tr>
			<td>
				<h3>Projet</h3>
				<table class="detail">
					<tr>
						<th>Titre</th>
						<th>Description</th>
						<th>Date de création</th>
						<th>Auteur</th>
						<th>Date de démarrage</th>
						<th>Date de fin</th>
						<th>Client</th>
						<th>Status</th>
					</tr>
					<?php foreach ($project as $row):?>
					<tr>			
						<td><?php echo $row->title;?></td>
						<td><?php echo $row->description;?></td>
						<td><?php echo $row->create_date;?></td>
						<td><?php echo $row->author_user_id;?></td>
						<td><?php echo $row->start_date;?></td>
						<td><?php echo $row->end_date;?></td>
						<td><?php echo $row->client_id;?></td>
						<td><?php echo $row->status_id;?></td>
						<td><a class="btn" href="<?php echo base_url();?>projects/form/<?php echo $row->project_id ?>">edition</a></td>	
					</tr>	
					<?php endforeach;?>					
				</table>
				<br>
				<div class="task">
					<h3>Tâches du projet</h3>
					<table class="detail">
						<tr>
							<th>Titre</th>
							<th>Description</th>
							<th>Date de création</th>
							<th>Auteur</th>			
							<th>Status</th>
						</tr>		
						<?php foreach ($task as $row):?>
						<tr>
							<td><a href="<?php echo base_url(); ?>tasks/detail/<?php echo $row->task_id?>"><?php echo $row->title;?></a></td>
							<td><?php echo $row->description;?></td>
							<td><?php echo $row->create_date;?></td>
							<td><?php echo $row->author_user_id;?></td>
							<td><?php echo $row->status_id;?></td>	
							<td>
							<?php $onclick = array('class="btn"onclick'=>"return confirm('Are you sure?')");?>
							<?=anchor(base_url()."tasks/delete/".$row->task_id, 'Delete', $onclick);?>
							<?php $onclick = array('onclick'=>"return confirm('Are you sure?')");?>
							</td>					
						</tr>				
						<?php endforeach;?>
					</table>
					<br/>
					<a class="btn" href="<?php echo base_url();?>tasks/form/<?php echo $this->uri->segment(3);?>">Nouvelle tâche</a>
				</div>
			</td>			
			<td>			
				<a class="btn" href="<?php echo base_url();?>comments/form/<?php echo $this->uri->segment(3);?>/project">Nouveau commentaire</a>				
				<h3>Commentaires</h3>	
				<table class="detail">
					<tr>
						<th>Commentaire</th>
						<th>Auteur</th>
						<th>Date de création</th>
					</tr>		
					<?php foreach ($comment as $row):?>
					<tr>
						<td><?php echo $row->text;?></td>
						<td><?php echo $row->author;?></td>
						<td><?php echo $row->date;?></td>
					</tr>	
					<?php endforeach;?>		
				</table>  
			</td>
		</tr>	
	</table>	
	<br/>
			<a class="btn" href="http://localhost/test-git/TestGestion/">Menu</a>
	</body>
</html>