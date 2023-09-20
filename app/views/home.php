<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="m-0 text-dark">
                <?= $titrePage; ?>
                <div class="" id="compte_a_rebours"></div>
            </h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <?php if($_SESSION['profil'] != 4): ?>
        <div class="row">
            <div class="col-12">
                <?php if(isset($_SESSION['notif']) && !empty($_SESSION['notif'] && $_SESSION["showed"] == 1)): ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5>
                    <i class="icon fas fa-info"></i> Information importante
                    <?php if($_SESSION["profil"] == 1 || $_SESSION["profil"] == 2): ?>
                        <a href="hide-notif.html"><button class="btn btn-sm bg-white float-right">Supprimer</button></a>
                    <?php endif; ?>
                  </h5>
                  <?php echo $_SESSION['notif'] ?>
                </div>
                <?php elseif($_SESSION["profil"] == 1 || $_SESSION["profil"] == 2): ?>
                <form role="form" method="POST" action="show-notif.html">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Notification</label>
                        <div class="row">
                            <div class="col-sm-10 mb-1">
                                <input type="text" class="form-control" id="notif" name="notif" placeholder="Le text de la notification ici !">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-md btn-primary btn-block">Afficher</button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php endif; ?>

                <?php if($urgenceArticle): ?>
                    <div class="card elevation-3">
                        <div class="card-header bg-warning" style="color: black;">
                            <h1 class="card-title">Article urgent</h1>
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body row">
                            <div class="col-sm-10 text-lg">
                                <?= $urgenceArticle->getTitre() ?>
                            </div>
                            <div class="col-sm-2">
                                <span class="badge badge-info badge-md mr-2 mt-2" ><?= $urgenceArticle->getNbrMots() ?> mots</span>
                                <span class="badge badge-info badge-md mt-2"><?= $urgenceArticle->getDelai()."H" ?></span>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer row">
                            <div class="col-sm-2">
                                <a href="detail-article.html~id~<?= $urgenceArticle->getIdArticle() ?>~retour~2"><button class="btn btn-primary btn-sm btn-block mb-1" data-toggle="modal" data-target="#addModal"><i class="fas fa-eye" aria-hidden="true"></i> Voir</button></a>
                            </div>
                            <?php if($_SESSION['profil'] == 3): ?>
                            <span class="text-danger"><i class="fas fa-exclamation"></i> Lire le détail avant de prendre</span>
                            <?php endif; ?>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                <?php endif; ?>
                
                <?php if($article): ?>
                    <!-- Default box -->
                    <div class="card elevation-3">
                        <div class="card-header" style="background-color: #044687; color: white;">
                            <h1 class="card-title">Cet article est disponible</h1>
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body row">
                            <div class="col-sm-10 text-lg">
                                <?= $article->getTitre() ?>
                            </div>
                            <div class="col-sm-2">
                                <span class="badge badge-info badge-md mr-2 mt-2" ><?= $article->getNbrMots() ?> mots</span>
                                <span class="badge badge-info badge-md mt-2"><?= $article->getDelai()."H" ?></span>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer row">
                            <div class="col-sm-2">
                                <a href="detail-article.html~id~<?= $article->getIdArticle() ?>~retour~2"><button class="btn btn-primary btn-sm btn-block mb-1" data-toggle="modal" data-target="#addModal"><i class="fas fa-eye" aria-hidden="true"></i> Voir</button></a>
                            </div>
                            <?php if($_SESSION['profil'] == 3): ?>
                            <div class="col-sm-2">
                                <a href="prendre-article.html~idArticle~<?= $article->getIdArticle() ?>~idRedacteur~<?= $_SESSION['idRedacteur'] ?>"><button class="btn btn-primary btn-sm btn-block mb-1" data-toggle="modal" data-target="#addModal"><i class="fas fa-" aria-hidden="true"></i> Prendre</button></a>
                            </div>
                            <?php endif; ?>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    
                    <!-- /.card -->
                <?php else: ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card elevation-3">
                                <div class="card-header" style="background-color: #044687; color: white;">
                                    <h1 class="card-title">Aucun article disponible</h1>
                                    <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if($_SESSION['profil'] == 1): ?>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                    <h3><?= $nbrUsers ?></h3>

                    <p>Utilisateurs</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                    <h3><?= $nbrModerateur ?></h3>

                    <p>Modérateurs</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-user-check"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                    <h3><?= $nbrRedacteur ?></h3>

                    <p>Redacteurs</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-user-tie"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                    <h3><?= $nbrArticle ?></h3>

                    <p>Articles</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-file-alt"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <?php elseif($_SESSION['profil'] == 3): ?>
        <div class="row">
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                <h3><?= $nbrRedactions ?></h3>

                <p>Rédactions</p>
                </div>
                <div class="icon">
                <i class="fas fa-book"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                <h3><?= $nbrRedactionsS ?></h3>

                <p>Rédactions soumises</p>
                </div>
                <div class="icon">
                <i class="fas fa-paper-plane"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                <h3><?= $nbrRedactionsV ?></h3>

                <p>Rédactions validées</p>
                </div>
                <div class="icon">
                <i class="fas fa-check"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                <h3><?= $nbrRedactionsN ?></h3>

                <p>Redaction invalides</p>
                </div>
                <div class="icon">
                <i class="fas fa-times"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
        </div>
        <?php elseif($_SESSION['profil'] == 2): ?>
        <div class="row">
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                <h3><?= $nbrRedacteur ?></h3>

                <p>Rédacteurs</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                <h3><?= $nbrRedac ?></h3>

                <p>Rédactions</p>
                </div>
                <div class="icon">
                <i class="ion ion-stats-bars"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                <h3><?= $nbrRedacV ?></h3>

                <p>Rédactions validées</p>
                </div>
                <div class="icon">
                <i class="ion ion-person-add"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                <h3><?= $nbrRedacN ?></h3>

                <p>Rédactions invalidées</p>
                </div>
                <div class="icon">
                <i class="ion ion-pie-graph"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
        </div>
        <?php else: ?>
        <div class="row">
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                <h3><?= $nbArticles ?></h3>

                <p>Articles</p>
                </div>
                <div class="icon">
                <i class="fas fa-book"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                <h3><?= $nbRedactionEnCours ?></h3>

                <p>Rédaction en cours</p>
                </div>
                <div class="icon">
                <i class="fas fa-spinner fa-spin"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                <h3><?= $nbArticleRediges ?></h3>

                <p>Articles redigés</p>
                </div>
                <div class="icon">
                <i class="fas fa-check"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                <h3><?= $nbrMots ?></h3>

                <p>Nombre total de mots</p>
                </div>
                <div class="icon">
                <i class="ion ion-pie-graph"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
        </div>
        
        <div class="row mb-2">
            <div class="col-sm-12">
                <h3 class="h3">Derniers articles</h3>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <?php foreach($lasts_articles as $article): ?>
            <div class="card elevation-3">
                <div class="card-body row py-1">
                    <div class="col-sm-1">
                        <a href="detail-article.html~id~<?= $article->getIdArticle() ?>~retour~0"><button class="btn btn-light btn-sm text-info text-lg" data-toggle="modal" data-target="#addModal"><i class="fas fa-folder-open" aria-hidden="true"></i></button></a>
                    </div>
                    <div class="col-sm-9 text-lg pt-1 bg-light">
                        <?= $article->getTitre() ?>
                    </div>
                    <div class="col-sm-2 bg-light text-right pt-1">
                        <span class="badge badge-info badge-md mr-2 mt-2" ><?= $article->getNbrMots() ?> mots</span>
                        <span class="badge badge-info badge-md mt-2"><?= $article->getDelai()."H" ?></span>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer py-0"></div>
                <!-- /.card-footer-->
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
    
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?php
    if($_SESSION['profil'] == 1):
?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- AREA CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Variation du nombre d'articles mensuels redigés</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <div class="chart">
                            <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- BAR CHART 2 -->
                    <div class="card card-success">
                        <div class="card-header">
                        <h3 class="card-title">Nombre de mots par mois</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col (LEFT) -->
                <div class="col-md-6">
                    <!-- LINE CHART -->
                    <div class="card card-info">
                        <div class="card-header">
                        <h3 class="card-title">Variation du nombre mensuel de mot redigés</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <div class="chart">
                            <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- BAR CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                        <h3 class="card-title">Nombre d'articles par mois</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col (RIGHT) -->

                <div class="col-md-6">
                    <p class="text-center">
                        <strong>Max rédactions par mois</strong>
                    </p>

                    <div id="max-redactions" class="px-4">

                        <!-- <div class="progress-group">
                            Add Products to Cart
                            <span class="float-right"><b>160</b>/200</span>
                            <div class="progress progress-sm">
                            <div class="progress-bar bg-success" style="width: 80%"></div>
                            </div>
                        </div> -->

                    </div>

                    </div>
                    <!-- /.col -->

                <div class="col-md-6">
                    <!-- DONUT CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Nombre d'articles par mois</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script>
    $(function () {
        /* ChartJS
        * -------
        * Here we will create a few charts using ChartJS
        */

        //--------------
        //- AREA CHART -
        //--------------
        function areaChartArticle(chartLabels, chartDatasA, chartDatasW) {
            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

            var areaChartData = {
                labels  : chartLabels,
                datasets: [
                    {
                    label               : 'Articles',
                    backgroundColor     : 'rgba(60,141,188,0.9)',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : chartDatasA
                    },
                    {
                    label               : 'Mots',
                    backgroundColor     : 'rgba(210, 214, 222, 1)',
                    borderColor         : 'rgba(210, 214, 222, 1)',
                    pointRadius         : false,
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : [0,0,0,0,0,0,0,0,0,0,0,0]
                    },
                ]
            }

            var lineChartData = {
                labels  : chartLabels,
                datasets: [
                    {
                    label               : 'Articles',
                    backgroundColor     : 'rgba(60,141,188,0.9)',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : [0,0,0,0,0,0,0,0,0,0,0]
                    },
                    {
                    label               : 'Mots',
                    backgroundColor     : 'rgba(210, 214, 222, 1)',
                    borderColor         : 'rgba(210, 214, 222, 1)',
                    pointRadius         : false,
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : chartDatasW
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio : false,
                responsive : true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                    gridLines : {
                        display : false,
                    }
                    }],
                    yAxes: [{
                    gridLines : {
                        display : false,
                    }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            var areaChart       = new Chart(areaChartCanvas, { 
                type: 'line',
                data: areaChartData, 
                options: areaChartOptions
            })

            //-------------
            //- LINE CHART -
            //--------------

            var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
            var lineChartData = jQuery.extend(true, {}, lineChartData)
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, { 
            type: 'line',
            data: lineChartData, 
            options: lineChartOptions
            })
        }
        
        //-------------
        //- DONUT CHART -
        //-------------
        function donutChartArticle(chartLabels, chartDatas, totalArticles, totalMots) {
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData        = {
            labels: chartLabels,
            datasets: [
                {
                    data: chartDatas,
                    backgroundColor : ['#216dce', '#f50a54', '#f56954', '#00a65a', '#2d62ce', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#2d6dce', '#2d1dce', '#ed6dce'],
                }
            ]
            }
            var donutOptions     = {
                maintainAspectRatio : false,
                responsive : true,
                title: {
                    display: true,
                    text: 'Total : ' + totalArticles + ' articles pour ' + + totalMots + ' mots',
                    position: 'bottom'
                }
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var donutChart = new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions    
            })
        }

        //-------------
        //- BAR CHART -
        //-------------
        function barCharNombreArticles(chartLabels, chartDatas, totalArticles) {
            var barChartCanvas = $('#barChart').get(0).getContext('2d');
            var thisBarChartData = {
            labels  : chartLabels,
            datasets: [
                {
                label               : 'Nombre d\'articles',
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : chartDatas
                }
            ]
            }
            var barChartData = jQuery.extend(true, {}, thisBarChartData)

            var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false

            }
            

            var barChart = new Chart(barChartCanvas, {
            type: 'bar', 
            data: barChartData,
            options: {
                barChartOptions,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Total : ' + totalArticles + ' articles',
                    position: 'bottom'
                }

            }
            })
        }
        function barCharNombreMots(chartLabels, chartDatas, totalMots) {
            var barChartCanvas = $('#barChart2').get(0).getContext('2d');
            var thisBarChartData = {
            labels  : chartLabels,
            datasets: [
                {
                label               : 'Nombre de mots',
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : chartDatas
                }
            ]
            }
            var barChartData = jQuery.extend(true, {}, thisBarChartData)

            var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
            }

            var barChart = new Chart(barChartCanvas, {
                type: 'bar', 
                data: barChartData,
                options: {
                    barChartOptions,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Total : ' + totalMots + ' mots',
                        position: 'bottom'
                    }
                }
            })
        }
        
        function maxRedactions(barLabels, namesBestRed, nbrRedsBestRed) {

            var bars = '';

            var i = 0;
            for(i < 0; i < barLabels.length; i++) {
                bars += 
                    '<div class="progress-group">'+
                        barLabels[i] + ' : <b>' + namesBestRed[i] +'</b>' +
                        '<span class="float-right"><b>'+nbrRedsBestRed[i]+'</b></span>'+
                        '<div class="progress progress-sm">'+
                        '<div class="progress-bar bg-success" style="width:'+(nbrRedsBestRed[i])+'%"></div>'+
                        '</div>'+
                    '</div>';
            }

            return bars;

        }
        
        $.ajax({
            url: "getBarChartData.html",
            type: "POST",
            data: {},
            cache: false,
            success: function(data){
                // console.log(data);
                var res = JSON.parse(data);

                barLabels = res['yearsMonthName'];
                barDatasArticles = res['articles'];
                barDatasWords = res['words'];
                totalMots = res['totalMots'];
                totalArticles = res['totalArticles'];

                areaChartArticle(barLabels, barDatasArticles, barDatasWords);
                donutChartArticle(barLabels, barDatasArticles, totalArticles, totalMots);
                barCharNombreArticles(barLabels, barDatasArticles, totalArticles);
                barCharNombreMots(barLabels, barDatasWords, totalMots);
                
                idsBestRed = res['bestReds']['idReds'];
                namesBestRed = res['bestReds']['names'];
                nbrRedsBestRed = res['bestReds']['nbrReds'];

                bars = maxRedactions(barLabels, namesBestRed, nbrRedsBestRed);
                console.log(bars);
                maxRedactionsContainer = $('#max-redactions');
                maxRedactionsContainer.html(bars);

            }
        });

    })
    </script>
<?php
    endif;
?>

<?php if($_SESSION['profil'] != 4 && $nbArticleRediges > 0): ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- AREA CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Variation du nombre d'articles mensuels redigés</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <div class="chart">
                            <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- BAR CHART 2 -->
                    <div class="card card-success">
                        <div class="card-header">
                        <h3 class="card-title">Nombre de mots par mois</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col (LEFT) -->
                <div class="col-md-6">
                    <!-- LINE CHART -->
                    <div class="card card-info">
                        <div class="card-header">
                        <h3 class="card-title">Variation du nombre mensuel de mot redigés</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <div class="chart">
                            <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- BAR CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                        <h3 class="card-title">Nombre d'articles par mois</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col (RIGHT) -->

                <div class="col-md-12">
                    <!-- DONUT CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Nombre d'articles par mois</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script>
    $(function () {
        /* ChartJS
        * -------
        * Here we will create a few charts using ChartJS
        */

        //--------------
        //- AREA CHART -
        //--------------
        function areaChartArticle(chartLabels, chartDatasA, chartDatasW) {
            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

            var areaChartData = {
                labels  : chartLabels,
                datasets: [
                    {
                    label               : 'Articles',
                    backgroundColor     : 'rgba(60,141,188,0.9)',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : chartDatasA
                    },
                    {
                    label               : 'Mots',
                    backgroundColor     : 'rgba(210, 214, 222, 1)',
                    borderColor         : 'rgba(210, 214, 222, 1)',
                    pointRadius         : false,
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : [0,0,0,0,0,0,0,0,0,0,0,0]
                    },
                ]
            }

            var lineChartData = {
                labels  : chartLabels,
                datasets: [
                    {
                    label               : 'Articles',
                    backgroundColor     : 'rgba(60,141,188,0.9)',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : [0,0,0,0,0,0,0,0,0,0,0]
                    },
                    {
                    label               : 'Mots',
                    backgroundColor     : 'rgba(210, 214, 222, 1)',
                    borderColor         : 'rgba(210, 214, 222, 1)',
                    pointRadius         : false,
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : chartDatasW
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio : false,
                responsive : true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                    gridLines : {
                        display : false,
                    }
                    }],
                    yAxes: [{
                    gridLines : {
                        display : false,
                    }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            var areaChart       = new Chart(areaChartCanvas, { 
                type: 'line',
                data: areaChartData, 
                options: areaChartOptions
            })

            //-------------
            //- LINE CHART -
            //--------------

            var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
            var lineChartData = jQuery.extend(true, {}, lineChartData)
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, { 
            type: 'line',
            data: lineChartData, 
            options: lineChartOptions
            })
        }
        
        //-------------
        //- DONUT CHART -
        //-------------
        function donutChartArticle(chartLabels, chartDatas, totalArticles, totalMots) {
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData        = {
            labels: chartLabels,
            datasets: [
                {
                    data: chartDatas,
                    backgroundColor : ['#216dce', '#f50a54', '#f56954', '#00a65a', '#2d62ce', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#2d6dce', '#2d1dce', '#ed6dce'],
                }
            ]
            }
            var donutOptions     = {
                maintainAspectRatio : false,
                responsive : true,
                title: {
                    display: true,
                    text: 'Total : ' + totalArticles + ' articles pour ' + + totalMots + ' mots',
                    position: 'bottom'
                }
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var donutChart = new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions    
            })
        }

        //-------------
        //- BAR CHART -
        //-------------
        function barCharNombreArticles(chartLabels, chartDatas, totalArticles) {
            var barChartCanvas = $('#barChart').get(0).getContext('2d');
            var thisBarChartData = {
            labels  : chartLabels,
            datasets: [
                {
                label               : 'Nombre d\'articles',
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : chartDatas
                }
            ]
            }
            var barChartData = jQuery.extend(true, {}, thisBarChartData)

            var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false

            }
            

            var barChart = new Chart(barChartCanvas, {
            type: 'bar', 
            data: barChartData,
            options: {
                barChartOptions,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Total : ' + totalArticles + ' articles',
                    position: 'bottom'
                }

            }
            })
        }
        function barCharNombreMots(chartLabels, chartDatas, totalMots) {
            var barChartCanvas = $('#barChart2').get(0).getContext('2d');
            var thisBarChartData = {
            labels  : chartLabels,
            datasets: [
                {
                label               : 'Nombre de mots',
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : chartDatas
                }
            ]
            }
            var barChartData = jQuery.extend(true, {}, thisBarChartData)

            var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
            }

            var barChart = new Chart(barChartCanvas, {
                type: 'bar', 
                data: barChartData,
                options: {
                    barChartOptions,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Total : ' + totalMots + ' mots',
                        position: 'bottom'
                    }
                }
            })
        }
        
        
        $.ajax({
            url: "getBarChartDataCli.html",
            type: "POST",
            data: {},
            cache: false,
            success: function(data){
                // console.log(data);
                var res = JSON.parse(data);

                barLabels = res['yearsMonthName'];
                barDatasArticles = res['articles'];
                barDatasWords = res['words'];
                totalMots = res['totalMots'];
                totalArticles = res['totalArticles'];

                areaChartArticle(barLabels, barDatasArticles, barDatasWords);
                donutChartArticle(barLabels, barDatasArticles, totalArticles, totalMots);
                barCharNombreArticles(barLabels, barDatasArticles, totalArticles);
                barCharNombreMots(barLabels, barDatasWords, totalMots);
                
                idsBestRed = res['bestReds']['idReds'];
                namesBestRed = res['bestReds']['names'];
                nbrRedsBestRed = res['bestReds']['nbrReds'];

                bars = maxRedactions(barLabels, namesBestRed, nbrRedsBestRed);
                console.log(bars);
                maxRedactionsContainer = $('#max-redactions');
                maxRedactionsContainer.html(bars);

            }
        });

    })
    </script>
<?php endif; ?>