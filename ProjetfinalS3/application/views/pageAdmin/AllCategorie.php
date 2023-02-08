<link rel="stylesheet" href="<?php echo base_url('assets\css\categAdmin2.css');?>" type="text/css">

<div id="content">
	
	<div id="main_content">
		<div id="titre">
			<h2 id="titre">Tous vos produits<h2>
		<?php?>
		</div>
		<?php for($i=0;$i<count($listCategorie);$i++){ ?>
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
										<?php echo $listCategorie[$i]['nom']; ?>
									</em>
								</h2>
							</p>
						
						<p ><!--class="reserver">-->
							<a href="<?php echo site_url('Userlog/modifiercategorie?id=').$listCategorie[$i]['id'];?>">
								<button class="reserver">Changer</button>
							</a>
						</p>
						<p ><!--class="reserver">-->
							<a href="<?php echo site_url('Userlog/deleteCategorie?idCategorie=').$listCategorie[$i]['id'];?>">
								<button class="reserver">Supprimer</button>
							</a>
						</p>
					</div>
				</div>	
			
				<div class="content">
				
					
					<?php } ?>
				</div>	
			
		</div>	
			
				
			</div>	
