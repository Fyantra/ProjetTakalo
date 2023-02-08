<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
                        Categorie! 
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="formulaire">
                    <div class="padding-0">
                        <div class="row justify-content-center">
        
            <form action="<?php echo site_url('Userlog/updateCategorie');?>" method="post">
              
                    <div class="form-grp">
                        <input class="form-control" type="text" value="<?php echo $categorie['nom'] ?>" name="nom" required>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $categorie['id'] ?>">
                        
                   <div class="form-grp">
                                    <button type="submit" class="btn">
                                       Ajouter
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
