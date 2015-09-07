<?php $this->load->helper('url');?>
<html>
	<head>
		<title>Client</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/gestion.css">
	</head>
	<body>
	<table>
		<tr>
			<td>
				<h3>Client</h3>
				<table class="detail">
					<tr>
						<th>Client</th>
						<th>Company</th>
						<th>Adresse 1</th>
						<th>Adresse 2</th>
						<th>Code postal</th>
						<th>Ville</th>
						<th>Téléphone fixe</th>
						<th>Téléphone mobile</th>
						<th>Mail</th>		
						<th>Url</th>			
					</tr>
					<?php foreach ($client as $row):?>
					<tr>			
						<td><?php echo $row->name." ".$row->surname;?></td>
						<td><?php echo $row->company;?></td>
						<td><?php echo $row->address1;?></td>
						<td><?php echo $row->address2;?></td>
						<td><?php echo $row->postal_code;?></td>
						<td><?php echo $row->locality;?></td>
						<td><?php echo $row->fixe_phone;?></td>
						<td><?php echo $row->mobile_phone;?></td>
						<td><?php echo $row->mail;?></td>
						<td><?php echo $row->url;?></td>
						<?php if($this->session->userdata('access')=="10"){ ?>
						<td><a class="btn" href="<?php echo base_url();?>admins/clientform/<?php echo $row->client_id ?>">edition</a></td>
						<?php }?>	
					</tr>	
					<?php endforeach;?>					
				</table>
			</td>			
	<!--		<td class="comment">			
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
						<?php if($this->session->userdata('access')=="10"){ ?>
						<td>
							<?php $onclick = array('class="btn" onclick'=>"return confirm('Are you sure?')");?>
							<?=anchor(base_url()."comments/delete/".$row->comment_id."/".$type."/".$from, 'Delete', $onclick);?>				
						</td>
						<?php }?>
					</tr>	
					<?php endforeach;?>		
				</table>  
			</td>  -->
		</tr>	
	</table>
		<br/>
		<a class="btn" href="<?php echo base_url();?>">Menu</a>
	</body>
</html>