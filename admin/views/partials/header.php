
<header>
    <nav>
        <div id="logo">
        <a href="index.php"><img src="../assets/images/ball2.png" alt="logo Mytennis"></a>
        </div>
            <div id="categories">
                <div class="dropdown">
                    <a class="dropbtn">Tenues</a>
                    <div class="dropdown-content">
                        <a href="#">Maillots Femme</a>
                        <a href="#">Maillots Homme</a>
                        <a href="#">Short Femme</a>
                        <a href="#">Short Homme</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="dropbtn">Balles</a>
                </div>
                <div class="dropdown">
                    <a class="dropbtn" href="index.php?p=categories&action=rackets">Raquettes</a>
                    <div class="dropdown-content">
                        <a href="#">Adultes</a>
                        <a href="#">Junior</a>
                    </div>
                </div>
            </div>
            <div>
                <a href=""><img src="../assets/images/search2.png" alt=""></a>
            </div>
            <div>
                <a href=""><img src="../assets/images/cart2.png" alt=""></a>
            </div> 
            <div id="account">
                <div class="dropdown">
                    <a class="dropbtn" href="index.php?p=users&action=form">Compte</a>
                    <div class="dropdown-content">
                            <a href="#">Profil</a>
                            <?php if (isset($_SESSION['user'])): ?>
                                <a href="?action=disconnect">déconnexion</a>
                            <?php endif; ?>
                        </div>
                </div>  
            </div> 
    </nav>
</header>
