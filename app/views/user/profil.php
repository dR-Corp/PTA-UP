<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">
                    <?= $titrePage; ?>
                    <div class="" id=""></div>
                </h1>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="pt-2" style="background: url('<?=ASSETS;?>Login/images/redac.jpg') no-repeat; background-size: 100%; background-position:; border-radius: 3px; padding-bottom: 1px;">
                            <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle bg-dark"
                                src="<?=ASSETS;?>LTE/dist/img/avatar.png"
                                alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center font-weight-bold"><?= $user->getUsername() ?></h3>

                            <p class="text-muted text-center">
                            <?php
                                if($user->getRole() == User::ROLE_SUPER) {
                                    echo '<span class="badge badge-success">Admin</span>';
                                }
                                else {
                                    echo '<span class="badge badge-info">Utilisateur</span>';
                                }

                                //show if user account is activated
                                if($user->getEtat() == 0) {
                                    echo '<span class="badge badge-info ml-1" >Activé</span>';
                                }
                                else {
                                    echo '<span class="badge badge-danger ml-1">Désactivé</span>';
                                }

                                // indiquer que l'utilisateur est certifié s'il l'est
                                if($user->getCertification() == 1) {
                                    echo '<span class="badge badge-success ml-1" >Certifié</span>';
                                }
                            ?>
                            </p>
                        </div>
                        <div class="row mt-3">
                            <div class="offset-sm-1"></div>
                            <div class="col-sm-10">
                                <div class="card">
                                    <div class="card-body py-0">
                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item text-center">
                                                <b><i class="fas fa-building mr-1"></i> Structure</b>
                                            </li>
                                            <li class="list-group-item">
                                                <b><?= $user->structure()->getCode() ?></b> <a class="float-right"><?= $user->structure()->getLibelle() ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->