<div style="padding: 0 calc(50% - 570px); display: flex; flex-direction: column; justify-content: center;
    align-items: center; margin-top: 40px;">
    <div><h2><?= $product->title ?></h2></div>
    <div style="margin-top: 20px; display: flex; justify-content: space-around; width: 900px;">
        <div>
            <img style="width: 263px; height: 282px;" src="/img/<?= $product->images ?>" alt="photo">
        </div>
        <div style="width: 400px; position: relative;">
            <h3 style="margin-bottom: 20px;">price : <?= $product->price ?> $</h3>
            <h3 style="margin-bottom: 20px;">Описание товара</h3>
            <p style="margin-bottom: 20px;"><?= $product->description ?></p>
            <a style="display: block; position: absolute; bottom: 0; right: 0; width: 100px; height: 40px; color: #222222;
                background-color: #cdcccc; text-align: center; line-height: 38px;"
               href="/?c=product&a=catalog">взад</a>
            <form class="" method="POST" action=""  style="position: absolute; bottom: 0; left: 0;">
                <input type="hidden" value="" name="id">
                <input type="hidden" value="1" name="quantity">
                <img src="https://raw.githubusercontent.com/Sergey-TR/images/main/cartWhite.png" alt="">
                <input style="width: 100px; height: 40px;" class="" type="submit" value="Add to Cart">
            </form>
        </div>
    </div>



</div>