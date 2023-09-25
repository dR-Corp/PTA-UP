<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-10">
                <h1 class="m-0 text-dark">
                    <?= $titrePage; ?>
                    <div class="" id=""></div>
                </h1>
            </div>
            <div class="col-sm-2" id="addBtnField">
                <button class="btn btn-primary btn-sm btn-block addBtn" data-toggle="tooltip" data-placement="bottom" title="Ajout d'un élément"><i class="fas fa-plus mr-2" aria-hidden="true"></i> Ajouter</button>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card table-responsive">
                    <div class="card-body">
                        <style>
                            td {
                                white-space: nowrap;
                            }
                        </style>
                        <table id="table_articles" class="table table-bordered table-striped">
                            <thead>
	                            <tr>
                                    <?php foreach ($attributs as $attribut): ?>
	                                <th scope="col"><?= $attribut['lib'] ?></th>
                                    <?php endforeach; ?>
	                                <!-- <th hidden scope="col">ID Article</th> -->
	                                <th scope="col">Actions</th>
	                            </tr>
	                        </thead>
                            <tbody>
	                        </tbody>
                            <tfoot>
	                            <tr>
                                    <?php foreach ($attributs as $attribut): ?>
	                                <th scope="col"><?= $attribut['lib'] ?></th>
                                    <?php endforeach; ?>
	                                <!-- <th hidden scope="col">ID Article</th> -->
	                                <th scope="col">Actions</th>
	                            </tr>
	                        </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<!-- addModal -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-lg modal-dialog-centered ">
        <div class="modal-content">            
            
            <div class="modal-header bg-light">
                <h4 class="modal-title">Formulaire d'ajout</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="color: black;" aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                
                <?php foreach ($attributs as $attribut): ?>
                    <div class="form-group">
                        <?php if($attribut['fillable']): ?>
                            <label for="titre"><?= $attribut['lib'] ?></label>
                            <?php if($attribut['input_type'] == "text"): ?>
                                <input type="text" class="form-control" id="<?= $attribut['name'] ?>" <?= $attribut['required'] ?> />
                            <?php elseif($attribut['input_type'] == "textarea"): ?>
                                <textarea name="values[liens]" id="liens" cols="30" rows="3" class="form-control" <?= $attribut['required'] ?>></textarea>
                            <?php elseif($attribut['input_type'] == "number"): ?>
                                <input type="number" class="form-control" id="<?= $attribut['name'] ?>" <?= $attribut['required'] ?> />
                            <?php elseif($attribut['input_type'] == "select"): ?>
                                <select class="form-control custom-select" id="<?= $attribut['name'] ?>" <?= $attribut['required'] ?>>
                                    <option value=""></option>
                                    <?php foreach($choices as $choice): ?>
                                        <option value="<?= $choice['id'] ?>"><?= $choice['value'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php elseif($attribut['input_type'] == "checkbox"): ?>
                                <input type="checkbox" name="" id="">
                            <?php elseif($attribut['input_type'] == "radio"): ?>
                                <input type="radio" name="" id="">
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <th scope="col"></th>
                <?php endforeach; ?>
                
            </div>
            <div class="modal-footer justify-content-between">
                <button id="addForm" class="btn btn-block btn-outline-primary">Créer</button>
            </div>
        </div>
    </div>
</div>

<?php
//  echo SCRIPTS;
?>

<script src="<?= SCRIPTS ?>crud.js"></script>