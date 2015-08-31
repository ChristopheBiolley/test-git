<?php $this->load->helper('url');?>
<html>
	<head>
		<title>Projet</title>
				<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/gestion.css">		
	</head>
	<body>
	<table class="all">
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
						<?php if($this->session->userdata('access')=="5"||$this->session->userdata('access')=="10"){ ?>
						<td><a class="btn" href="<?php echo base_url();?>projects/form/<?php echo $row->project_id ?>">edition</a></td>	
						<?php }?>
					</tr>	
					<?php endforeach;?>					
				</table>
				<br/>				
				<table>
					<tr>						
						<th>Projet attribué à</th>
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
									<?=anchor(base_url()."projects/delmanager/".$row->project_manager_id."/".$row->project_id, 'Delete', $onclick);
									}?>
								</p> 						
								<?php endforeach;
							}?>	
						</td>
						<?php if($this->session->userdata('access')=="10"){ ?>
						<td>
							<form action="<?php echo base_url()."projects/addmanager/".$this->uri->segment(3);?>" method="post">											
								<input type="hidden" name="project" value="<?php echo $this->uri->segment(3);?>">
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
				<br>
				<h3>Tâches du projet</h3>
				<table class="detail">
					<tr>
						<th>Titre</th>
						<th>Description</th>
						<th>Date de création</th>
						<th>Auteur</th>			
						<th>Status</th>
					</tr>		
					<?php 
					$type=$this->uri->segment(1);
					$from=$this->uri->segment(3);
					foreach ($task as $row):?>
					<tr>
						<td><a href="<?php echo base_url(); ?>tasks/detail/<?php echo $row->task_id?>"><?php echo $row->title;?></a></td>
						<td><?php echo $row->description;?></td>
						<td><?php echo $row->create_date;?></td>
						<td><?php echo $row->author_user_id;?></td>
						<td><?php echo $row->status_id;?></td>	
						<?php if($this->session->userdata('access')=="5"||$this->session->userdata('access')=="10"){ ?>
						<td>
							<?php $onclick = array('class="btn"onclick'=>"return confirm('Are you sure?')");?>
							<?=anchor(base_url()."tasks/delete/".$row->task_id."/".$type."/".$from, 'Delete', $onclick);?>
						</td>
						<?php }?>					
					</tr>				
					<?php endforeach;?>
				</table>
				<br/>
				<?php if($this->session->userdata('access')=="5"||$this->session->userdata('access')=="10"){ ?>
				<a class="btn" href="<?php echo base_url();?>tasks/form/<?php echo $this->uri->segment(3);?>">Nouvelle tâche</a>
				<?php }?>
			</td>			
			<td class="comment">
				<a class="btn" href="<?php echo base_url();?>comments/form/<?php echo $this->uri->segment(3);?>/project">Nouveau commentaire</a>				
				<h3>Commentaires</h3>
				<table class="detail">
					<tr>
						<th>Commentaire</th>
						<th>Auteur</th>
						<th>Date de création</th>
					</tr>		
					<?php 			
					foreach ($comment as $row):?>
					<tr>
						<td><?php echo $row->text;?></td>
						<td><?php echo $row->author;?></td>
						<td><?php echo $row->date;?></td>
						<?php if($this->session->userdata('access')=="5"||$this->session->userdata('access')=="10"){?>
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
	<a class="btn" href="http://localhost/test-git/TestGestion/">Menu</a>
	</body>
</html>