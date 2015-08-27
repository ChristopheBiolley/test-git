<?php $this->load->helper('url');?>
<html>
	<head>
		<title>Utilisateur</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/gestion.css">
	</head>
	<body>
	<table>
		<tr>
			<td>
				<h3>Utilisateur</h3>
				<table class="detail">
					<tr>
						<th>Nom</th>
						<th>Niveau d'access</th>
						<th>Mail</th>
										
					</tr>
					<?php 
					foreach ($user as $row):?>
					<tr>			
						<td><?php echo $row->prename." ".$row->name;?></td>						
						<td><?php echo $row->access_id;?></td>
						<td><?php echo $row->mail;?></td>
						<?php if($this->session->userdata('access')=="10"){ ?>
						<td><a class="btn" href="<?php echo base_url();?>admins/userform/<?php echo $row->user_id ?>">edition</a></td>
						<?php }?>	
					</tr>	
					<?php endforeach;?>					
				</table>
			</td><!-- 	
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
			</td> -->		
		</tr>	
	</table>				
		<br/>
		<br/>
		<a class="btn" href="<?php echo base_url();?>">Menu</a>
	</body>
</html>