<section class="lot-item container">
    <?php if (isset($lot)): ?>
    <h2><?=htmlspecialchars($lot['name']);?></h2>
    <div class="lot-item__content">
        <div class="lot-item__left">
            <div class="lot-item__image">
                <img src="<?=$lot['url_img']; ?>" width="730" height="548" alt="<?=$lot['img_alt']; ?>">
            </div>
            <p class="lot-item__category">Категория: <span><?=$lot['category']; ?></span></p>
            <p class="lot-item__description"><?=$lot['description']; ?></p>
        </div>
        <div class="lot-item__right">
            <div class="lot-item__state">
                <div class="lot-item__timer timer">
                    <?=$lot['date']; ?>
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
                <form class="lot-item__form" action="add.php" method="post">
                    <p class="lot-item__form-item">
                        <label for="cost_bet">Ваша ставка</label>
                        <input id="cost_bet" type="number" name="cost_bet" placeholder="0">
                    </p>
                    <button type="submit" class="button">Сделать ставку</button>
                </form>
            </div>
            <div class="history">
                <h3>История ставок (<span>4</span>)</h3>
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