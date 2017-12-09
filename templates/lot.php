<section class="lot-item container">
    <?php if (isset($lot)): ?>
    <h2><?=htmlspecialchars($lot['name']);?></h2>
    <div class="lot-item__content">
        <div class="lot-item__left">
            <div class="lot-item__image">
                <img src="<?=$lot['url_img']; ?>" width="730" height="548" alt="">
            </div>
            <p class="lot-item__category">Категория: <span><?=$lot['category']; ?></span></p>
            <p class="lot-item__description"><?=$lot['description']; ?></p>
        </div>
        <div class="lot-item__right">
            <div class="lot-item__state">
                <div class="lot-item__timer timer">
                    <?=timeEnd($lot['date']);?>
                </div>
                <div class="lot-item__cost-state">
                    <div class="lot-item__rate">
                        <span class="lot-item__amount">Текущая цена</span>
                        <span class="lot-item__cost"><?=$lot['cost']; ?></span>
                    </div>
                    <div class="lot-item__min-cost">
                        Мин. ставка <span><?=$lot['cost_min']; ?></span>
                    </div>
                </div>
                <?php if($bet_add): ?>
                <form class="lot-item__form" method="post">
                    <p class="lot-item__form-item <?=isset($bet_error)? "form__item--invalid" : "";?>">
                        <label for="cost">Ваша ставка</label>
                        <input id="cost" type="number" name="cost" placeholder="<?=$lot['cost_min'];?>">
                    </p>
                    <button type="submit" class="button">Сделать ставку</button>
                    <span class="form__error"><?=isset($bet_error)? $bet_error : "";?></span>
                </form>
                <?php endif; ?>
            </div>
            <div class="history">
                <h3>История ставок (<span><?=count($bets)?></span>)</h3>
                <table class="history__list">
                    <?php foreach ($bets as $bet): ?>
                        <tr class="history__item">
                            <td class="history__name"><?=$bet['name']; ?></td>
                            <td class="history__price"><?=$bet['price']; ?></td>
                            <td class="history__time"><?=timeFun($bet['ts']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <?php else: ?>
        <h1 style="color: black">Лот с этим ID не найден</h1>
    <?php endif; ?>
</section>