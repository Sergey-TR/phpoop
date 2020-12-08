<header>
    <div class="header center">
        <div class="header__left">
            <a class="logo" href="#">
                <img class="logo__img" src="https://raw.githubusercontent.com/Sergey-TR/testkraken/master/project/img/logo.png" alt="logo">BRAN<span class="logoD">D</span>
            </a>
            <div class="browse">
                <details class="browse_det">
                    <summary class="browse_det_sum">Browse</summary>
                    <div class="browse_drop_menu">
                        <h3 class="browse__h3">Women</h3>
                        <ul class="browse_ul">
<!--                            --><?php //foreach ($browseWomen as $shirtWomen) { ?>
<!--                                <li><a href="#" class="browse_a">--><?//= $shirtWomen ?><!--</a></li>-->
<!--                            --><?php //} ?>
                        </ul>
                        <h3 class="browse__h3">men</h3>
                        <ul class="browse_ul">
<!--                            --><?php //foreach ($browseMen as $shirtMen) { ?>
<!--                                <li><a href="#" class="browse_a">--><?//= $shirtMen ?><!--</a></li>-->
<!--                            --><?php //} ?>
                        </ul>
                    </div>
                </details>
            </div>
            <form class="header__form" action="#">
                <input class="header__form__int" type="search" placeholder="Search for Item...">
                <button class="header__form__btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="header__right">
            <div class="header__right_cart">
                <div class="cart__total">

<!--                    <span class="cart__total_span">--><?//= isset($totalCart) ? $totalCart : 0 ?><!--</span>-->

                    <a href="/basket" class="cart__total_btn"></a>
                </div>
            </div>
            <div class="my_account_btn">
                <details class="my_account_det">
                    <summary class="my_account_sum">My Account</summary>
                    <div class="my_account_checkout">
<!--                        --><?php //if (array_get($_SESSION, 'user')) : ?>
<!--                            <p style="text-align: center; padding: 10px; font-size: 20px;-->
<!--							font-weight: bold;-->
<!--							color: #f16d7f;">-->
<!--                                --><?//= $_SESSION['user']['login']; ?><!-- </p>-->
<!--                            <a href="/logout" class="my_account_check">LOG OUT</a>-->
<!--                        --><?php //else : ?>
<!--                            <a href="/login" class="my_account_check">LOG IN</a>-->
<!--                        --><?php //endif; ?>
                        <a href="/registration" class="my_account_cart">Registration</a>
                    </div>
                </details>
            </div>
        </div>
    </div>
</header>
<nav>
    <div class="nav">
        <ul class="menu center">
            <li class="menu__list"><a href="/" class="menu__link">Home</a></li>
            <li class="menu__list"><a href="/?c=product&a=catalog&page=1" class="menu__link">Catalog</a></li>
            <li class="menu__list"><a href="/?c=product&a=category&name=women"class= "menu__link">Women</a></li>
            <li class="menu__list"><a href="/?c=product&a=category&name=man" class="menu__link">Man</a></li>
            <li class="menu__list"><a href="/?c=basket&a=basket" class="menu__link">Basket</a></li>
            <li class="menu__list"><a href="#" class="menu__link">Featured</a></li>
            <li class="menu__list"><a href="#" class="menu__link">Hot Deals</a></li>
<!--            --><?php //foreach ($menu as $nav) { ?>
<!--                <li class="menu__list"><a href="--><?//= $nav['link'] ?><!--" class="menu__link">--><?//= $nav['label'] ?><!--</a></li>-->
<!--            --><?php //} ?>
        </ul>
    </div>
</nav>
