<?php $this->load->helper('url');?>
<html>
	<head>
		<title>Tâche</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/gestion.css">
	</head>
	<body>
	<table>
		<tr>
			<td>
				<h3>Tâche</h3>
				<table class="detail">
					<tr>
						<th>Titre</th>
						<th>Description</th>
						<th>Date de création</th>
						<th>Auteur</th>
						<th>Date de démarrage</th>
						<th>Status</th>
						<th>Temps alloué</th>
						<th>Date de fin</th>
						<th>Date de validation</th>		
						<th>Temps estimé</th>
						<th>Temps réel</th>					
					</tr>
					<?php foreach ($task as $row):?>
					<tr>			
						<td><?php echo $row->title;?></td>
						<td><?php echo $row->description;?></td>
						<td><?php echo $row->create_date;?></td>
						<td><?php echo $row->author_user_id;?></td>
						<td><?php echo $row->start_date;?></td>
						<td><?php echo $row->status_id;?></td>
						<td><?php echo $row->time_allowed;?></td>
						<td><?php echo $row->end_date;?></td>
						<td><?php echo $row->validation_date;?></td>
						<td><?php echo $row->time_estimate;?></td>
						<td><?php echo $row->time_real;?></td>
						<td><a class="btn" href="<?php echo base_url();?>tasks/form/<?php echo $row->task_id ?>">edition</a></td>	
					</tr>	
					<?php endforeach;?>					
				</table>
			</td>			
			<td>			
				<a class="btn" href="<?php echo base_url();?>comments/form/<?php echo $this->uri->segment(3);?>/task">Nouveau commentaire</a>
				
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
						<td>
							<?php $onclick = array('class="btn" onclick'=>"return confirm('Are you sure?')");?>
							<?=anchor(base_url()."comments/delete/".$row->comment_id, 'Delete', $onclick);?>				
						</td>	
					</tr>	
					<?php endforeach;?>		
				</table>  
			</td>
		</tr>	
	</table>	
		<br>
		<?php foreach ($task as $row):?>
		<a class="btn" href="<?php echo base_url();?>projects/detail/<?php echo $row->project_id ?>">Retour au projet</a>
		<?php endforeach;?>		
		<br/>
		<br/>
		<a class="btn" href="<?php echo base_url();?>">Menu</a>
	</body>
</html>