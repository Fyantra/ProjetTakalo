<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets\fonts\fontawesome-5\css\all.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets\fonts\fontawesome-5\css\all.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets\css\userInscrit.css');?>">
</head>
<body>
        <h3>Les <?php echo $userInscrit['totalUser'] ?> utilisateurs inscrits:</h3>
    <section>
        <?php for($i=0;$i<count($listUser);$i++) {?>
        <div class="justify-content-center profil mt-17 p-20 pb-20 br-10">
            <div class="pdp justify-content-center w-20 h-60 p-35 ml-auto-mr-auto circle" style="background-color : rgb(55, 187, 174)"> 
                <i class="fas fa-user icone"></i>
            </div>

            <div class="in-profil ml-auto-mr-auto p-35 br-10">
                <div class="info mt-17">
                    <div>
                        Nom:
                    </div> 
                    <div>
                        <?php echo $listUser[$i]['nom'] ?> 
                    </div>
                </div>
                <div class="info mt-17">
                    <div>
                        Email:
                    </div>
                    <div>
                    <?php echo $listUser[$i]['mail'] ?>
                    </div> 
                </div>
            </div>
            <div class="retour br-10 mt-17 justify-content-center ml-auto-mr-auto">
                <a href="<?php echo site_url('welcome/templateAdmin');?>">
                    Retour
                </a>
            </div>
        </div>
        <hr class="hr"><hr class="hr" style="color:red">
        <?php } ?>
    </section>
</body>
</html>