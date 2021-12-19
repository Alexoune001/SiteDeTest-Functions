<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand">Menu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item"><a class="nav-link" href="/"><i class="fas fa-home"></i></a></li>
                <?php if(!isset($_SESSION['pseudo'])) { ?>
                    <li class="nav-item"><a class="nav-link" href="/login">Se connecter</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">S'enregistrer</a></li>
                <?php } else { ?>
                    <!--<li class="nav-item"><a class="nav-link" href="/profil-<//?= $_SESSION['id'] ?>">Mon profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="/edit">Editer mon profil</a></li>-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Mon profil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/profil-<?= $_SESSION['id'] ?>">Voir mon profil</a></li>
                            <li><a class="dropdown-item" href="/edit">Editer mon profil</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/inbox">Boîte de réception</a></li>
                    <li class="nav-item"><a class="nav-link" href="/logout">Se déconnecter</a></li>
                <?php } ?>
            </ul>
            <form method="POST" action="/search" class="d-flex">
                <input  type="search" name="requete" class="form-control me-2" placeholder="Chercher un utilisateur" />
                <button type="submit" class="btn btn-outline-success"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</nav>