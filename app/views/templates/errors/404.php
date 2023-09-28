<?php echo $head; ?>
<!-- Main content -->
<body style="background-image: url('<?php echo ASSETS;?>img/rectorat.jpg'); background-size: 100% 50%;">
    
    <section class="content" style="height: 65vh; background-color: #19233e; width: 68%; margin: auto; margin-top: 17.5vh; border-radius: 10px; padding: 10% 0px 70px 0px; padding-left: 6%; padding-right: 6%;">
        <div class="error-page">
            <h2 class="headline text-warning"> 404</h2>

            <div class="error-content text-white">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page introuvable.</h3>

                <p>
                    La page que vous demandez n'est pas retrouvée sur la plateforme !
                    Cliquez ici <a href="/" style="color: #24a9ff;">pour retrouver le tableau de bord ou la page de connexion le cas échéant</a>
                </p>
                
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->

</body>

<?php echo $scripts; ?>