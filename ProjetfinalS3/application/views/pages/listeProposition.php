<link rel="stylesheet" href="<?php echo base_url('assets\css\categorieAdmin.css');?>" type="text/css">

<div id="content">
	
	<div id="main_content">
		<div id="titre">
			<h2 id="titre">Tous vos propositions<h2>
		<?php 

		?>	
		</div>
			<?php for($i=0;$i<count($listeProposition);$i++){ ?>
					<div class="content">
					
						<div class="img">
							<a href="#">
								<img src="<?php echo base_url('assets\image\blouson.png');?>">
							</a>
						</div>
						<div class="txt">
							<a href="#">
								<p>
									<h2>
										<em>
											<?php echo $listeProposition[$i]['nom1']; ?>
										</em>
									</h2>
								</p>
								<p>
									<?php echo $listeProposition[$i]['d1']; ?>
								</p>
							</a>
							<p class="chiffre">
								
								<?php echo $listeProposition[$i]['prix1']; ?>
								
							</p>
							<p ><!--class="reserver">-->
							<a href="<?php echo site_url('Userlog/echange?o1=').$listeProposition[$i]['id1'].'&idproposition='.$listeProposition[$i]['id'].'&o2='.$listeProposition[$i]['id2'].'&u1='.$listeProposition[$i]['u1'];?>">
									<button class="reserver">Accepter</button>
								</a>
							</p>
							<p ><!--class="reserver">-->
								<a href="<?php echo site_url('Userlog/refuser?idproposition=').$listeProposition[$i]['id'];?>">
									<button class="reserver">Refuser</button>
								</a>
							</p>
						</div>
					</div>	
						
					
					<div class="content">
					
						<div class="img">
							<a href="#">
								<img src="<?php echo base_url('assets\image\blouson.png');?>">
							</a>
						</div>
						<div class="txt">
							<a href="#">
								<p>
									<h2>
										<em>
											<?php echo $listeProposition[$i]['nom2']; ?>
										</em>
									</h2>
								</p>
								<p>
								<?php echo $listeProposition[$i]['d2']; ?>

								</p>
							</a>
							<p class="chiffre">
								
								<?php echo $listeProposition[$i]['prix2']; ?>
								
							</p>
							
						</div>
					</div>	
				
			</div>	

		<?php } ?>
			
				
			</div>	
