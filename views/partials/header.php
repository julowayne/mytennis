<header>
    <nav>
        <div id="logo">
        <a href="index.php"><img src="<?= isset($_SESSION['viewAdmin']) ? '../assets/images/ball2.png' : './assets/images/ball2.png' ?>" alt="logo Mytennis"></a>
        </div>
            <div id="categories">
                <?php foreach($categories as $category): ?>
                <div class="dropdown">
                    <a class="dropbtn" href="index.php?p=categories&action=menu&id=<?=$category['id']?>"><?=$category['name']?></a>
                    <div class="dropdown-content">
                    <?php foreach($childCategories as $childCategory): ?>
                       <?php if($childCategory['parent_id'] == $category['id']): ?>
                        <a href="index.php?p=categories&action=menu&id=<?=$childCategory['parent_id']?>"><?=$childCategory['name']?></a>
                       <?php endif; ?>
                    <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div>
                <a href=""><img src="<?= isset($_SESSION['viewAdmin']) ? '../assets/images/search2.png' : './assets/images/search2.png' ?>" alt="logo recherche"></a>
            </div>
            <div>
                <a href=""><img src="<?= isset($_SESSION['viewAdmin']) ? '../assets/images/cart2.png' : './assets/images/cart2.png' ?>" alt="logo panier"></a>
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
                        <?php endif; ?>
                    </div>
                </div>  
            </div> 
    </nav>
</header>
