<header>
    <nav>
        <div id="logo">
        <a href="index.php"><img src="./assets/images/ball2.png" alt="logo Mytennis"></a>
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
                <a href=""><img src="./assets/images/search2.png" alt=""></a>
            </div>
            <div>
                <a href=""><img src="./assets/images/cart2.png" alt=""></a>
            </div> 
            <div id="account">
                <div class="dropdown">
                    <a class="dropbtn" href="index.php?p=users&action=form">Compte</a>
                    <div class="dropdown-content">
                            <?php if (isset($_SESSION['user'])): ?>
                                <a href="index.php?p=users&action=edit&id=<?= $_SESSION['user']['id'] ?>">Profil</a>
                                <a href="index.php?p=users&action=disconnected">déconnexion</a>
                            <?php endif; ?>
                        </div>
                </div>  
            </div> 
    </nav>
</header>
