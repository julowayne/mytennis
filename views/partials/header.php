<header>
    <nav>
        <div id="logo">
            <a href="index.php"><img src="<?= isset($_SESSION['viewAdmin']) ? '../assets/images/ball2.png' : './assets/images/ball2.png' ?>" alt="logo Mytennis"></a>
        </div>
            <div id="categories">
                <?php foreach($categories as $category): ?>
                    <div class="dropdown">
                        <a class="dropbtn" href="index.php?p=categories&action=menu&id=<?=$category['id']?>"><?=$category['name']?></a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div>
                <a href=""><img src="<?= isset($_SESSION['viewAdmin']) ? '../assets/images/search2.png' : './assets/images/search2.png' ?>" alt="logo recherche"></a>
            </div>
            <div id="cart">
                <a href="index.php?p=cart&action=display"><?= count($_SESSION['cart']); ?></a>
                <a href="index.php?p=cart&action=display"><img src="<?= isset($_SESSION['viewAdmin']) ? '../assets/images/cart2.png' : './assets/images/cart2.png' ?>" alt="logo panier"></a>
            </div> 
            <div>
            <?php if (isset($_SESSION['user'])): ?>
                <a href="index.php?p=users&action=edit&id=<?= $_SESSION['user']['id'] ?>"><img src="<?= isset($_SESSION['viewAdmin']) ? '../assets/images/user3.png' : './assets/images/user3.png' ?>" alt="logo panier"></a>
            <?php endif; ?>
            <?php if (!isset($_SESSION['user'])): ?>
                <a href="index.php?p=users&action=form"><img src="<?= isset($_SESSION['viewAdmin']) ? '../assets/images/user3.png' : './assets/images/user3.png' ?>" alt="logo panier"></a>
            <?php endif; ?>
            </div> 
            <div id="account">
            <?php if (!isset($_SESSION['user'])): ?>
                <a class="dropbtn" href="index.php?p=users&action=form">Compte</a>
            <?php endif; ?>
                <div class="dropdown">
                 <?php if (isset($_SESSION['user'])): ?>
                    <a class="dropbtn" href="index.php?p=users&action=edit&id=<?= $_SESSION['user']['id'] ?>"><?= $_SESSION['user']['firstname'] ?></a>
                    <div class="dropdown-content">
                            <a href="index.php?p=users&action=disconnected">déconnexion</a>
                            <?php if($_SESSION['user']['is_admin'] == 1): ?>
                            <a href="./admin/index.php?controller=index">Administration</a>
                            <a href="../index.php?controller=index">Mytennis</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div> 
            </div>
            <div id="burger">
                <a href=""><img src="<?= isset($_SESSION['viewAdmin']) ? '../assets/images/open-menu3.png' : './assets/images/open-menu3.png' ?>" alt="menu burger"></a> 
            </div>
        </nav>
</header>

