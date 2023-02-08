
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="<?php echo base_url('assets\css\AjoutCategorie.css');?>" type="text/css">
    </head>
    <body>
        
         <section class="inscription_section">
        <div id = "content">
            <div class="row justify-content-center">
                <div class="text-center">
                    <h2 class="heading">
                        Modifier Objet! 
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="formulaire">
                    <div class="padding-0">
                        <div class="row justify-content-center">
        
            <form action="<?php echo site_url('Userlog/modifierobjet');?>" method="get">
              
                    <div class="form-grp">
                        <input class="form-control" type="text" placeholder="<?php echo $valueobjet['nom']; ?>" value="<?php echo $valueobjet['nom']; ?>" name="nom" required>
                    </div>

                    <div class="form-grp">
                        <input class="form-control" type="text" placeholder="<?php echo $valueobjet['description']; ?>" value="<?php echo $valueobjet['description']; ?>"  name="description" required>
                    </div>

                    <div class="form-grp">
                        <input class="form-control" type="number" placeholder="<?php echo $valueobjet['prix']; ?>" value="<?php echo $valueobjet['prix']; ?>"  name="prix" required>
                    </div>

                    <div class="form-grp">
                        <select name="idcategorie" class="form-control">
                                <?php for($i=0;$i<count($listeCategorie);$i++){ ?>
                                <option value="<?php echo $listeCategorie[$i]['id']; ?>"><?php echo $listeCategorie[$i]['nom']; ?></option>
                                <?php } ?>
                        </select>
                    </div>
                    
                    <input class="form-control" type="hidden" value="<?php echo $_GET['idobjet']; ?>" name="idobjet">
                    
                   <div class="form-grp">
                                    <button type="submit" class="btn">
                                       Modifier
                                    </button>
                                </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </body>
</html>
