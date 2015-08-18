<?php $this->load->helper('url');?>
<html>
	<head>
		<title>Projet</title>
		<!-- 
		<script>
			function Edition()
			{				
				var x = document.getElementById("Edit").style.display;
				
				if(x=="none")
				{
					document.getElementById("Edit").style.display = "inline";
					x = document.getElementById("Edit").style.display;
				}
				else
				{
					document.getElementById("Edit").style.display="none";
				}
			}
		</script>-->
	</head>
	<body>
		<h3>Projet</h3>
		<table>
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
				<td><a href="<?php echo base_url();?>projects/form/<?php echo $row->project_id ?>">edition</a></td>	
			</tr>	
			<?php endforeach;?>					
		</table>
		<br>
		<div class="task">
		<h3>Tâches du projet</h3>
		<table>
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
					<form method="post" action="<?php echo base_url(); ?>tasks/delete">
						<input type="hidden" name="id" value="<?php echo $row->task_id;?>"/>
						<input type="hidden" name="project" value="<?php echo $this->uri->segment(3);?>"/>
						<input type="submit" value="Delete"/>
					</form>
				</td>			
			</tr>				
			<?php endforeach;?>
		</table>
		<a href="<?php echo base_url();?>tasks/form/<?php echo $this->uri->segment(3);?>">Nouvelle tâche</a>
		</div>
		<br/><br/>
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
			<br/>	 -->
	
			<a href="http://localhost/test-git/TestGestion/">Retour</a>
	</body>
</html>