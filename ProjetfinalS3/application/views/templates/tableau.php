<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?php echo base_url('assets\css\main.css');?>" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="menuu_deroulant">
        <div id="menuu">
            <a href="#">
                <div style="background-color: rgb(46, 131, 122); color:white; ">
                    Menu
                </div>
            </a>
            <a href="<?php echo site_url('Userlog/vershistorique');?>">
                <div>
                    Historique
                </div>
            </a>
            <a href="<?php echo site_url('Userlog/goRecherche');?>">
                <div>
                Recherche des categories
                </div>
            </a>
            <a href="#">
                <div>
                    A propos du projet 
                </div>
            </a>
        </div>
        
        
    </div>
</body>
</html>