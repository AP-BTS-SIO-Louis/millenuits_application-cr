<div class="container">
    <div class="page-header">
        <h2>Liste des contacts d'un distributeur</h2>
    </div>
    <form name='formulaire'>
        <div class='row mb-3'>
            <div class='col-md-6'>
                <label for='liste' class='form-label'></label>
                <select class='form-control' id='liste'>
                    <option value="" disabled selected>-Sélectionner-</option>
                    <?php
                    foreach ($lesDistributeurs as $unDistributeur) {
                        ?>
                        <option value='<?php echo $unDistributeur['id'] ?>'><?php echo $unDistributeur['raison_sociale'] ?></option>
                    <?php }
                    ?>
                </select>
            </div>
        </div>
        <div class='row mb-3'>
            <div class='col-md-8'>
                <div id='zoneNom'></div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Téléphone fixe</th>
                    <th scope="col">Téléphone portable</th>
                    <th scope="col">Privilégié</th>
                </tr>
            </thead>
            <tbody id="corpsTableau">
            </tbody>
        </table>   
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" 
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
crossorigin="anonymous"></script>

<script>
    /*
     * Fonction exécutée à chaque changement dans la liste des catégories.
     * #liste fait référence à l'id de la liste déroulante
     */
    $('#liste').change(function () {

        var texte;
        /*Utilisation de la méthode ajax qui permet d'instancier un objet HttpRequest*/
        $.ajax({
            url: 'ajax/getContactJSON.php',
            type: 'POST',
            data: 'cont=' + $('#liste').val(),
            dataType: 'json',
            success: function (data) {
                let Titre = $('<h4>');
                $('#zoneNom').empty();
                
                $('#corpsTableau').empty();

                if (data.length > 0) {
                    Titre.text('Liste des contacts ' + $('#liste option:selected').text());
                    $('#zoneNom').append(Titre);

                    $.each(data, function (key, value) {
                        
                        let ligne = "<tr>" +
                                "<td>" + value.nom + "</td>" +
                                "<td>" + value.prenom + "</td>" +
                                "<td>" + value.mail + "</td>" +
                                "<td>" + (value.tel_fixe || '') + "</td>" + 
                                "<td>" + (value.tel_portable || '') + "</td>" +
                                "<td>" + (value.privilegie === 1 ? '✓' : '') + "</td>" + 
                                "</tr>";

                       
                        $('#corpsTableau').append(ligne);
                    });
                } else {
                    Titre.text('Aucun contact pour ce distributeur');
                    $('#zoneNom').append(Titre);
              
                    $('#corpsTableau').append('<tr><td colspan="6" class="text-center">Aucune donnée trouvée</td></tr>');
                }
            },
            error: function () {
                alert("erreur !");
            }
        });
    });
</script>