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
						<?php if($this->session->userdata('access')=="5"||$this->session->userdata('access')=="10"){ ?>
						<td><a class="btn" href="<?php echo base_url();?>tasks/form/<?php echo $row->task_id ?>">edition</a></td>
						<?php }?>	
					</tr>	
					<?php endforeach;?>		
				</table>	
				<br/>										
				<table>
					<tr>						
						<th>Tâche attribuée à</th>
					</tr>
					<tr>					
						<td>
							<?php
							if($manager==NULL)
							{
								echo "Non attribué";
							}
							else
							{ 
								foreach ($manager as $row):
								echo $row->user_id;	?>	
								<p>
									<?php if($this->session->userdata('access')=="10"){
									$onclick = array('class="btn" onclick'=>"return confirm('Are you sure?')");?>
									<?=anchor(base_url()."tasks/delmanager/".$row->task_user_id."/".$row->task_id, 'Delete', $onclick);
									}?>
								</p> 						
								<?php endforeach;
							}?>	
						</td>
						<?php if($this->session->userdata('access')=="10"){ ?>
						<td>
							<form action="<?php echo base_url()."tasks/addmanager/".$this->uri->segment(3);?>" method="post">											
								<input type="hidden" name="task" value="<?php echo $this->uri->segment(3);?>">
								choisir un utilisateur:
								<select name="user">
									<?php foreach ($user as $row): ?>
									<option  value="<?php echo $row->user_id;?>"><?php echo $row->prename." ".$row->name;?></option>
									<?php endforeach;?>
								</select> <br/>	
								<input type="submit" value="OK">
							</form>
							
						</td>	
						<?php }?>					
					</tr>
				</table>
			</td>			
			<td class="comment">			
				<a class="btn" href="<?php echo base_url();?>comments/form/<?php echo $this->uri->segment(3);?>/task">Nouveau commentaire</a>				
				<h3>Commentaires</h3>	
				<table class="detail">
					<tr>
						<th>Commentaire</th>
						<th>Auteur</th>
						<th>Date de création</th>						
					</tr>		
					<?php 			
					$type=$this->uri->segment(1);	
					$from=$this->uri->segment(3);
					foreach ($comment as $row):?>
					<tr>
						<td><?php echo $row->text;?></td>
						<td><?php echo $row->author;?></td>
						<td><?php echo $row->date;?></td>
						<?php if($this->session->userdata('access')=="5"||$this->session->userdata('access')=="10"){ ?>
						<td>
							<?php $onclick = array('class="btn" onclick'=>"return confirm('Are you sure?')");?>
							<?=anchor(base_url()."comments/delete/".$row->comment_id."/".$type."/".$from, 'Delete', $onclick);?>				
						</td>
						<?php }?>
					</tr>	
					<?php endforeach;?>		
				</table>  
			</td>
		</tr>	
	</table>	
		<br/>
		<?php foreach ($task as $row):?>
		<a class="btn" href="<?php echo base_url();?>projects/detail/<?php echo $row->project_id ?>">Retour au projet</a>
		<?php endforeach;?>		
		<br/>
		<br/>
		<a class="btn" href="<?php echo base_url();?>">Menu</a>
	</body>
</html>