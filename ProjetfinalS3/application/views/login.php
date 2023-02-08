<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url('assets\bootstrap\css\bootstrap.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets\css\login.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets\fontawesome-5\css\all.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets\fontawesome-5\css\all.min.css');?>">
</head>

<body>
    <section class="form-08">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="_form-08-main">
                        <form action="<?php echo site_url('welcome/checkUser');?>" method="post">
                            <div class="_form-08-head">
                                <h2>Bienvenue</h2>
                            </div>

                            <div class="form-group">
                                <label>Entrez votre Email</label>
                                <input type="email" name="mail" class="form-control" placeholder="Email"
                                    required="" aria-required="true">
                            </div>

                            <div class="form-group">
                                <label>Entrez votre mot de passe</label>
                                <input type="password" name="mdp" class="form-control" placeholder="mot de passe"
                                    required="" aria-required="true">
                            </div>

                            <div class="form-group">
                                <input type="submit" class=" _btn_04" value="Login">
                            </div>
                        </form>
                        <div class="inscription">
                            <a href="<?php echo site_url('welcome/goToinscription');?>">
                                Inscription
                            </a>
                        </div>
                        <div class="sub-01">
                            <img src="<?php echo base_url('assets\image\shap-02.png');?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="<?php echo base_url('assets\bootstrap\js\bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets\bootstrap\js\jquery.min.js');?>"></script>
</body>

</html>