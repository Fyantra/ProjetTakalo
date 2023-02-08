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
    <link rel="stylesheet" href="<?php echo base_url('assets\css\echange.css');?>">
</head>
<body>
    <center>
        <section id="menu">
            <div id="h1">
                <h3>Le nombre d`echange effectue est:</h3>
                <div class="chiffre"><?php echo $totalEchange['totalEchange'] ?></div>
            </div>
        </section>
    </center>
</body>
</html>