<?php $this->load->helper('url');?>
<html>
	<head>
		<title>Tâche</title>
		
	</head>
	<body>
		<h3>Tâche</h3>
		<table>
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
				<td><a href="<?php echo base_url();?>tasks/form/<?php echo $row->task_id ?>">edition</a></td>	
			</tr>	
			<?php endforeach;?>					
		</table>
		<br>
<!-- 
		<h3>Commentaires</h3>	
		<table>
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
					<form method="post" action="<?php echo base_url(); ?>comments/delete">
						<input type="hidden" name="id" value="<?php echo $row->comment_id;?>"/>
						<input type="hidden" name="typeId" value="<?php echo $this->uri->segment(3);?>"/>
						<input type="hidden" name="type" value="<?php echo $this->uri->segment(1);?>"/>
						<input type="submit" value="Delete"/>
					</form>
				</td>	
			</tr>	
			<?php endforeach;?>		
		</table>  
			<br/>	
		 -->
			
	</body>
</html>