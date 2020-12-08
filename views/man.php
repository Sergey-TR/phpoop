<div class="itemHeading">
    <h2 class="fetured">MAN</h2>
    <p class="fetured_p">Shop for items based on what we featured in this week</p>
</div>

<div class="product-box center">
    <?php foreach ($category as $item) {
        $imgUrl = "/img/{$item['images']}";  ?>

        <div class="product">

            <a href="/?c=product&a=card&id=<?= $item['id'] ?>">

                <img class="product__img" src="<?= $imgUrl ?>"
                     alt="photo"></a>
            <div class="product__content">
                <a href="#" class="product__name"><?= $item['title'] ?></a>
                <p class="product__price">$<?= $item['price'] ?><img class="product__star"
                                                                     src="https://raw.githubusercontent.com/Sergey-TR/images/main/star.png"
                                                                     alt="star">
                </p>
            </div>
            <!-- <a href="#" class="product__add">
                 <img src="https://raw.githubusercontent.com/Sergey-TR/images/main/cartWhite.png" alt="">
                 Add to Cart
            </a> -->
            <form class="form__add" method="POST" action="/addBasket" class="" style="position: absolute; top: 97px; left: 70px;">
                <input type="hidden" value="<?= $item['id'] ?>" name="id">
                <input type="hidden" value="1" name="quantity">
                <img src="https://raw.githubusercontent.com/Sergey-TR/images/main/cartWhite.png" alt="">
                <input class="product__add" type="submit" value="Add to Cart">
            </form>
        </div>
    <?php } ?>
</div>
