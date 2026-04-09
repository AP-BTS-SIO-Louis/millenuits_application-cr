<nav class="navbar navbar-expand-lg bg-secondary-subtle">
    <a class="navbar-brand" href="index.php">
        <img src="assets/images/Logo_mille_nuits.png" alt="Logo millenuits" width="50" height="auto"/>
    </a>
    <div class="container">


        <button type="button" class="navbar-toggler" data-bs-toogle="collapse" data-bs-target="#menu-millenuits">
            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="menu-millenuits">

            <?php
            if (isset($_SESSION["identifiant"])) {
                ?>
                <div class="collapse navbar-collapse" id="menu-millenuits">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="menu-millenuits" data-bs-toggle="dropdown">Commerciaux</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="menu-millenuits" data-bs-toggle="dropdown">Distributeurs</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="menu-millenuits" data-bs-toggle="dropdown">Contacts</a>
                            <ul class="dropdown-menu" aria-labelledby="menu-btssio">
                                <li><a class="dropdown-item" href="index.php?uc=ajouter-contact">Ajouter un contact</a></li>
                                <li><a class="dropdown-item" href="index.php?uc=list-contact">Afficher les contact d'un distributeur</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="menu-millenuits" data-bs-toggle="dropdown">Consultation</a>
                            <ul class="dropdown-menu" aria-labelledby="menu-btssio">
                                <li><a class="dropdown-item" href="index.php?uc=consultation-compte-rendu">Compte-rendu</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#"><span class="bi-person-fill"></span>
                                <?php echo " " . $_SESSION["identifiant"]; ?></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="index.php?uc=authentification&action=se_deconnecter">Se déconnecter
                                <span class="bi bi-box-arrow-in-right"></span></a></li>
                    </ul>
                    <?php
                } else {
                    ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php?uc=authentification&action=se_connecter">Se connecter
                                <span class="bi bi-box-arrow-in-left"></span></a></li>
                    </ul>
                    <?php
                }
                ?>

            </div>
        </div>
</nav>