<div class="container mt-4">
    <?php if (isset($_SESSION['identifiant'])) { ?>

        <h1>Ajouter un contact:</h1>
        <p class="text-muted">* indiquer un champ obligatoire</p>

        <form action="index.php?uc=ajouter-contact&action=validerSaisieContact" method="post" class="mt-4">

            <h3 class="mb-3">Identification</h3>

            

            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom du contact*" required>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom du contact*" required>
                </div>
            </div>

            <h3 class="mb-3 mt-4">Coordonnées</h3>

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-text">@</span>
                        <input type="email" class="form-control" name="mail" id="mail" placeholder="Email*" required>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                        <input type="tel" class="form-control" name="tel_fixe" id="tel_fixe" placeholder="Téléphone fixe">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-phone-fill"></i></span>
                        <input type="tel" class="form-control" name="tel_portable" id="tel_portable" placeholder="Téléphone portable">
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="privilegie" name="privilegie" value="1">
                        <label class="form-check-label" for="privilegie">
                            Contact privilégié
                        </label>
                    </div>
                </div>
            </div>

            <h3 class="mb-3">Sélectionner le distributeur*</h3>
            <div class="row mb-4">
                <div class="col-md-12">
                    <select class="form-select" name="id_distributeur" id="id_distributeur" required>
                        <option value="" selected disabled>Choisissez un distributeur</option>

                        <?php foreach ($lesDistributeurs as $unDistributeur): ?>
                            <option value="<?php echo $unDistributeur['id']; ?>">
                                <?php echo $unDistributeur['raison_sociale']; ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-primary">Valider</button>
                <button type="reset" class="btn btn-secondary">Annuler</button>
            </div>

        </form>
    <?php } ?>
</div>