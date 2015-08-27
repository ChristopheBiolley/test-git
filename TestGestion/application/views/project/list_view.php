<?php $this->load->helper('url');?>
<html>
	<head>		
		<title>Menu</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/gestion.css">
	</head>
	<body>
		<table class="all">
			<tr>
				<td>
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
							<?php if($this->session->userdata('access')=="5"||$this->session->userdata('access')=="10"){ ?>
							<td>
								<?php $onclick = array('class="btn" onclick'=>"return confirm('Are you sure?')");?>
								<?=anchor(base_url()."projects/delete/".$row->project_id, 'Delete', $onclick);?>
							</td>	
							<?php }?>
						</tr>
						<?php endforeach;?>
					</table>	
					<br/>		
					<?php if($this->session->userdata('access')=="5"||$this->session->userdata('access')=="10"){ ?>
					<a class="btn" href="<?php echo base_url();?>projects/form">Nouveau projet</a>
					<?php }?>
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
							<?php if($this->session->userdata('access')=="5"||$this->session->userdata('access')=="10"){?>	
							<td>
								<?php $onclick = array('class="btn" onclick'=>"return confirm('Are you sure?')");?>
								<?=anchor(base_url()."tasks/delete/".$row->task_id, 'Delete', $onclick);?>				
							</td>	
							<?php }?>
						</tr>
						<?php endforeach;?>
					</table>	
					<?php if($this->session->userdata('access')=="0"){?>
					<form method="post" action="<?php echo base_url(); ?>admins/log/">
						User:<input type="text" name="user"/>
						Password:<input type="password" name="pwd"/>
						<input type="submit" value="log"/>
					</form>	
					<?php }else{?>	
					<a class="btn" href="<?php echo base_url(); ?>admins/unlog/">unlog</a>
					<?php }?>	
				</td>				
				<td>
					<h3>Utilisateur</h3>
					<table class="menu">
						<tr>							
							<th>Nom</th>
							<th>Niveau d'access</th>
						</tr>
						<?php foreach ($user as $row):?>
						<tr>		
							<td><a href="<?php echo base_url(); ?>admins/detailuser/<?php echo $row->user_id?>"><?php echo $row->prename." ".$row->name;?></a></td>
							<td><?php echo $row->access_id;?></td>
							<?php if($this->session->userdata('access')=="10"){ ?>
							<td>
								<?php $onclick = array('class="btn" onclick'=>"return confirm('Are you sure?')");?>
								<?=anchor(base_url()."admins/deluser/".$row->user_id, 'Delete', $onclick);?>
							</td>	
							<?php }?>
						</tr>
						<?php endforeach;?>
					</table>	
					<br/>		
					<?php if($this->session->userdata('access')=="10"){ ?>
					<a class="btn" href="<?php echo base_url();?>admins/userform">Nouvel utilisateur</a>
					<?php }?>
					<br/>		
				</td>
				<td>
					<h3>Clients</h3>
					<table class="menu">
						<tr>							
							<th>Client</th>
							<th>Company</th>
						</tr>
						<?php foreach ($client as $row):?>
						<tr>		
							<td><a href="<?php echo base_url(); ?>admins/detailclient/<?php echo $row->client_id?>"><?php echo $row->name." ".$row->surname;?></a></td>
							<td><?php echo $row->company;?></td>						
							<?php if($this->session->userdata('access')=="10"){ ?>
							<td>
								<?php $onclick = array('class="btn" onclick'=>"return confirm('Are you sure?')");?>
								<?=anchor(base_url()."admins/delclient/".$row->client_id, 'Delete', $onclick);?>
							</td>	
							<?php }?>
						</tr>
						<?php endforeach;?>
					</table>	
					<br/>		
					<?php if($this->session->userdata('access')=="10"){ ?>
					<a class="btn" href="<?php echo base_url();?>admins/clientform">Nouveau client</a>
					<?php }?>
				</td>
			</tr>	
		</table>	
	</body>
</html>