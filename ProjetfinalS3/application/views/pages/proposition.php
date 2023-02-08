<link rel="stylesheet" href="<?php echo base_url('assets\css\categorie.css');?>" type="text/css">

<div id="content">
    
    <div id="main_content">
        <div id="titre">
            <h2 id="titre">Les propositions<h2>
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
                                        <?php echo $listCategorie[$i]['nom'] ?>
                                    </em>
                                </h2>
                            </p>
                            <p>
                            <?php echo '<span>Categorie:</span>'.$listCategorie[$i]['nomCategorie']; ?>
                            </p>
                            <p>
                            <?php echo $listCategorie[$i]['description'] ?>
                            </p>
                        </a>
                        <p>
                            
                        <?php echo $listCategorie[$i]['prix'] ?>
                            
                        </p>
                        <p class="reserver">
                            <a href="<?php echo site_url('Userlog/propositionechange?ido1=').$ido1.'&ido2='.$listCategorie[$i]['id'];?>">
                                Proposer
                            </a>
                        </p>
                    </div>
                </div>	
        <?php } ?>
        </div>	
            
                
            </div>	
