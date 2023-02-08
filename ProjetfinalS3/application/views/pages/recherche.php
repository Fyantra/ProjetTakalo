<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/recherche.css');?>">
</head>
<body>
    <section class="inscription_section">
    <div id = "content">
        <div class="row justify-content-center">
            <div class="text-center">
                <h2 class="heading">
                    Faite Votre recherche 
                </h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="formulaire">
                <div class="padding-0">
                    <div class="row justify-content-center">
    
                        <div id="login-form">
                            <form action="<?php echo site_url('Userlog\rechercheObjet');?>" method="get">
                                <label for="motcle">Mot-Cle</label>
                                <input type="text" id="email" name="motcle" class="input" required><br>
                                <label for="categorie" >Categorie</label>
                                <select name="categorie" class="input" required><br>
                                    <?php for($i=0;$i<count($listeCategorie);$i++){ ?>
                                    <option value="<?php echo $listeCategorie[$i]['id'] ?>"><?php echo $listeCategorie[$i]['nom'] ?></option>
                                    <?php } ?>
                                </select>
                                <button type="submit" id="submit-btn">Rechercher</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>