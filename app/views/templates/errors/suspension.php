<?php echo $head; ?>
<!-- Main content -->
<body style="background-image: url('<?php echo ASSETS;?>Login/images/redac.jpg'); background-size: 100% 100%;">
    
    <section class="content" style="height: 65vh; background-color: #19233e; width: 68%; margin: auto; margin-top: 17.5vh; border-radius: 10px; padding: 10% 0px 70px 0px; padding-left: 6%; padding-right: 6%;">
        <div class="error-page">
            <!-- <h2 class=" text-warning"> Compte <br>suspendu</h2> -->

            <div class="error-content text-white">
                <h2><i class="fas fa-exclamation-triangle text-warning"></i> Compte suspendu</h2>
                <p>
                    Veuillez contacter le gestionnaire pour plus d'information.
                    Cliquez ici <a href="login.html" style="color: #24a9ff;">pour retrouver la page de connexion</a>
                </p>
                
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->

</body>

    <?php echo $scripts; ?>