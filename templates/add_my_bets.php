<section class="rates container">
    <h2>Мои ставки</h2>
    <table class="rates__list">
        <? if (count($add_my_bets_massive)) :?>
            <?php foreach ($add_my_bets_massive as $item => $bet): ?>
                <tr class="rates__item">
                    <td class="rates__info">
                        <div class="rates__img">
                            <img src="<?=$goods[$item]['url_img']; ?>" width="54" height="40" alt="">
                        </div>
                        <h3 class="rates__title"><a href="lot.php?id=<?=$item ?>"><?=$goods[$item]['name']; ?></a></h3>
                    </td>
                    <td class="rates__category">
                        <?=$goods[$item]['category']; ?>
                    </td>
                    <td class="rates__timer">
                        <div class="timer"><?=timeEnd($goods[$item]['date']);?></div>
                    </td>
                    <td class="rates__price">
                        <?=$bet['cost']; ?> р
                    </td>
                    <td class="rates__time">
                        <?=timeFun($bet['bet_date']); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <div>Вы не сделали ставку</div>
        <?php endif; ?>
    </table>
</section>