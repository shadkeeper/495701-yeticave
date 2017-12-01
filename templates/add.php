<form class="form form--add-lot container <?=isset($errors)? 'form--invalid' : '';?>" action="add.php" method="post" enctype="multipart/form-data">
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <div class="form__item form__item--invalid <?=isset($errors['name'])? "form__item--invalid" : "";?>">
            <label for="name">Наименование</label>
            <input id="name" type="text" name="name" placeholder="Введите наименование лота" value="<?=isset($add_lot['name'])? $add_lot['name'] : '';?>">
            <span class="form__error"><?=isset($errors['name'])? $errors['name'] : "";?></span>
        </div>
        <div class="form__item <?=isset($errors['category'])? "form__item--invalid" : "";?>">
            <label for="category">Категория</label>
            <select id="category" name="category">
                <?php foreach($categories as $category): ?>
                    <option <?=(isset($add_lot['category']) && $add_lot['category'] == $category['name'])? 'selected' : '';?>><?=$category['name'];?></option>
                <?php endforeach; ?>
            </select>
            <span class="form__error"><?=isset($errors['category'])? $errors['category'] : "";?></span>
        </div>
    </div>

    <div class="form__item form__item--wide" <?=isset($errors['description'])? "form__item--invalid" : "";?>>
        <label for="message">Описание</label>
        <textarea id="message" name="description" placeholder="Напишите описание лота"><?=isset($add_lot['description'])? $add_lot['description'] : '';?></textarea>
        <span class="form__error"><?=isset($errors['description'])? $errors['description'] : "";?></span>
    </div>

    <div class="form__item form__item--file <?=isset($errors['url_img'])? "form__item--invalid" : "";?> <?=isset($add_lot['url_img'])? 'form__item--uploaded' : '';?>">
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="<?=isset($add_lot['url_img'])? $add_lot['url_img'] : '';?>" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" name="url_img" id="photo2" value="">
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
        </div>
        <span class="form__error"><?=isset($errors['url_img'])? $errors['url_img'] : "";?></span>
    </div>

    <div class="form__container-three">
        <div class="form__item form__item--small <?=isset($errors['cost'])? "form__item--invalid" : "";?>">
            <label for="cost">Начальная цена</label>
            <input id="cost" type="number" name="cost" placeholder="0" value="<?=isset($add_lot['cost'])? $add_lot['cost'] : '';?>">
            <span class="form__error"><?=isset($errors['cost'])? $errors['cost'] : "";?></span>
        </div>
        <div class="form__item form__item--small <?=isset($errors['cost_min'])? "form__item--invalid" : "";?>">
            <label for="cost_min">Шаг ставки</label>
            <input id="cost_min" type="number" name="cost_min" placeholder="0" value="<?=isset($add_lot['cost_min'])? $add_lot['cost_min'] : '';?>">
            <span class="form__error">Введите шаг ставки</span>
        </div>
        <div class="form__item <?=isset($errors['date'])? "form__item--invalid" : "";?>">
            <label for="date">Дата окончания торгов</label>
            <input class="form__input-date" id="date" type="date" name="date" value="<?=isset($lot['date'])? $lot['date'] : '';?>">
            <span class="form__error"><?=isset($errors['date'])? $errors['date'] : "";?></span>
        </div>
    </div>

    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
</form>