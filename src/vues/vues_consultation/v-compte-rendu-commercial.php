<div class="container">
    <div class="page-header">
        <h2></h2>
    </div>
    <form name='formulaire'>
        <div class='row mb-3 align-items-end'>
            <div class='col-md-3'>
                <label for='liste' class='form-label'>Sélectionner le commercial</label>
                <select class='form-control' id='liste'>
                    <option value="" disabled selected>-Sélectionner-</option>
                    <?php foreach ($lesCompteRenduCommercial as $unCommercial) { ?>
                        <option value='<?php echo $unCommercial['id'] ?>'>
                            <?php echo $unCommercial['nom'] . ' ' . $unCommercial['prenom'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class='col-md-3'>
                <label for="date-debut" class="form-label">Date de début de période</label>
                <input type="date" class="form-control" name="date-debut" id="date-debut">
            </div>
            <div class='col-md-3'>
                <label for="date-fin" class="form-label">Date de fin de période</label>
                <input type="date" class="form-control" name="date-fin" id="date-fin">
            </div>
            <div class='col-md-3 text-end'>
                <button type="button" id="btnAfficher" class="btn btn-primary px-4">Afficher</button>
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
                    <th scope="col">Distributeur</th>
                    <th scope="col">Contat</th>
                    <th scope="col">Date visite</th>
                    <th scope="col">Coefficient de confiance</th>
                    <th scope="col">Motif</th>
                    <th scope="col">oeuil</th>
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

$('#btnAfficher').click(function () {
        

        $.ajax({
            url: 'ajax/getConsultationJSON.php',
            type: 'POST',
            data: {
                info: $('#liste').val(),
                debut: $('#date-debut').val(),
                fin: $('#date-fin').val()
            },
            dataType: 'json',
            success: function (data) {
                $('#zoneNom').empty();
                $('#corpsTableau').empty();

                let Titre = $('<h4>');
                if (data.length > 0) {
                    Titre.html('Compte rendu de visite de ' + $('#liste option:selected').text()+ '<br>'+ ' Du ' + $('#date-debut').val() + ' au '+ $('#date-fin').val() );
                    $('#zoneNom').append(Titre);

                    $.each(data, function (key, value) {
                        let ligne = "<tr>" +
                            "<td>" + value.nom_distrib + "</td>" +
                            "<td>" + value.nom_contact + " " + value.prenom_contact + "</td>" +
                            "<td>" + value.date_vis + "</td>" +
                            "<td>" + value.coef + "</td>" +
                            "<td>" + value.motif_lib + "</td>" +
                            "<td><i class='bi bi-eye'></i></td>" +
                            "</tr>";
                        $('#corpsTableau').append(ligne);
                    });
                } else if($('#liste').val() === ""){
                    Titre.text('Veuillez choisir un commercial');
                    $('#zoneNom').append(Titre);
                    $('#corpsTableau').append('<tr><td colspan="6" class="text-center">Aucune donnée trouvée</td></tr>');
                } else if(!$('#date-debut').val()|| !$('#date-fin').val()){
                    Titre.text('Veuillez penser à rentrer des dates');
                    $('#zoneNom').append(Titre);
                    $('#corpsTableau').append('<tr><td colspan="6" class="text-center">Aucune donnée trouvée</td></tr>');
                } else {
                    Titre.text('Aucun compte rendu pour' + $('#liste option:selected').text());
                    $('#zoneNom').append(Titre);
                    $('#corpsTableau').append('<tr><td colspan="6" class="text-center">Aucune donnée trouvée</td></tr>');
                }
            },
            error: function () {
                alert("Erreur lors de l'appel AJAX !");
            }
        }); 
    }); 

</script>