$(function () {

    // INITIALISATION DE PARAMETRES UTILES
    var entity = $('#entity').val();
    var attributs = JSON.parse($('#attributs').val());

    //  AFFICHAGE DU FORMULAIRE D'AJOUT
    $(document).on('click', '.addBtn', function(){
        $('#addModal').modal('show');
    });

    // LES COLONNES
    var columns = [];
    attributs.forEach(attribut => {
        columns.push({"data": attribut.name})
    });
    columns.push(
        {
            "data": null,
            render: function(data, type, row) {
                return `<button class="btn btn-sm editBtn"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm deleteBtn"><i class="fas fa-trash"></i></button>`;
            }
        }
    )

    // DATATABLE
    var datatable = $("#datatable").DataTable({

        "serverSide": true,
        "processing": true,
        "deferRender": true,
        "drawCallback": function (setting, json) {

            console.log("all data are loaded into table");
            // $("input[data-bootstrap-switch]").each(function(){
            //     $(this).bootstrapSwitch({
            //         onSwitchChange: function(e) {
            //             $tr = $(this).closest('tr')
            //             var data = tableDemandes.row($tr).data()
            //             $currentID = data.identifiant
            //             $currentState = data.validation
            //             $.ajax({
            //                 url: "valider.php",
            //                 type: 'POST',
            //                 data: {
            //                     "id": $currentID,
            //                     "state": $currentState
            //                 },
            //                 success: function(data) {
            //                     // console.log(JSON.parse(data));
            //                     tableDemandes.ajax.reload(null, false);
            //                 }
            //             })

            //         }
            //     });
            // });
            
            $('[data-toggl="tooltip"]').tooltip({
                trigger: 'hover'
            });

        },
        "ajax": '/data/'+entity,
        "columns": columns,
        "columnDefs": [
            // Les elements qui sont des foreign key, seront caché, au profil du libelle de l'eleemnt en reference
            // {
            //     "targets": [13,14,15,16],
            //     "visible": false,
            //     "searchable": false
            // }
        ],
        "responsive": false,
        "autoWidth": false,
        "language" : {
            "sEmptyTable":     "Aucune donnée disponible dans le tableau",
            "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
            "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
            "sInfoPostFix":    "",
            "sInfoThousands":  ",",
            "sLengthMenu":     "Afficher _MENU_ éléments",
            "sLoadingRecords": '<div><i class="fas fa-3x fa-spinner fa-spin"></i><div class="text-bold pt-2">Chargement...</div></div>',
            "sProcessing":     '<div><i class="fas fa-3x fa-spinner fa-spin"></i><div class="text-bold pt-2">Chargement...</div></div>',
            "sSearch":         "Rechercher :",
            "sZeroRecords":    "Aucun élément correspondant trouvé",
            "oPaginate": {
                "sFirst":    "Premier",
                "sLast":     "Dernier",
                "sNext":     "Suivant",
                "sPrevious": "Précédent"
            },
            "oAria": {
                "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
            },
            "select": {
                    "rows": {
                        "_": "%d lignes sélectionnées",
                        "0": "Aucune ligne sélectionnée",
                        "1": "1 ligne sélectionnée"
                    } 
            }
        }
    });

    // READAPTATION DU TOOLTIP
    $('#datatable').on('draw.dt', function() {
        $('[data-toggle="tooltip"]').tooltip({
            trigger: 'hover'
        });
    })

    // AJOUT
    $('#addBtn').on('click', function() {

        var data = {};

        attributs.forEach(attribut => {
            if(attribut.fillable) data[attribut.name] = $('#'+attribut.name).val();
        });

        ajouterArticle(data);
    })

    // FUNCTION DE GESTION DE L'AJOUT
    function ajouterArticle(data) {
        
        $.ajax({
            url: "/add/"+entity,
            type: "POST",
            data,
            cache: false,
            success: function(data) {

                var data = JSON.parse(data);

                // si tout s'est bien passé on fait disparaitre le modal
                if(data.alert == "success") $('#addModal').modal('hide');
                
                datatable.ajax.reload(null, true);

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-end',
                    showConfirmButton: false,
                    timer: 5000
                });
                Toast.fire({
                    icon: data.alert,
                    title: data.message
                });
                      
            }
        });
    }


    // MODIFICATION


})