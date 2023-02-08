<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique</title>
    <link rel="stylesheet" href="<?php echo base_url('assets\css\historique.css');?>">
</head>
<body>
    <div class="content">
    <h2>
        Historique d`appartenance d`un objet 
    </h2>
    <center>
    <table class="high-level-table" id="table">
        <tr>
            
            <th>nom1</th>
            <th>nom2</th>
            <th>Objet1</th>
            <th>Objet2</th>
            <th>Date et Heure d`echange</th>

        </tr>
        <?php for($i=0;$i<count($listehistorique);$i++){ ?>
            <tr>
                <td><?php echo $listehistorique[$i]['nom1']; ?></td>
                <td><?php echo $listehistorique[$i]['nom2']; ?></td>
                <td><?php echo $listehistorique[$i]['nomobjet1']; ?></td>
                <td><?php echo $listehistorique[$i]['nomobjet2']; ?></td>               
                <td><?php echo $listehistorique[$i]['date']; ?></td>               
            </tr>
        <?php } ?>
    </table>
    </center>
</div>
</body>
</html>