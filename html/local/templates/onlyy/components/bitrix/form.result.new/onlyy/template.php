<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arResult
 */
?>

<?php if ($arResult["isFormErrors"] == "Y"): ?>
    <?= $arResult["FORM_ERRORS_TEXT"] ?>
<?php endif; ?>
<?= $arResult["FORM_NOTE"] ?? '' ?>

<?php if ($arResult["isFormNote"] != "Y"): ?>
    <div class="contact-form">

        <?php if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y"): ?>
            <div class="contact-form__head">
                <?php if ($arResult["isFormTitle"]): ?>
                    <div class="contact-form__head-title"><?= $arResult["FORM_TITLE"] ?></div>
                <?php endif; ?>
                <div class="contact-form__head-text"><?= $arResult["FORM_DESCRIPTION"] ?></div>
            </div>
        <?php endif; ?>
        <?= $arResult["FORM_HEADER"] ?>
        <div class="contact-form__form-inputs">
                <?php foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion): ?>
                    <?php if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] === 'hidden'): ?>
                        <input type="hidden" name="form_<?= $arQuestion['STRUCTURE'][0]['FIELD_TYPE'] ?>_<?= $arQuestion['STRUCTURE'][0]['ID'] ?>" value="<?= $arQuestion['STRUCTURE'][0]['VALUE'] ?>">
                    <?php elseif ($arQuestion["STRUCTURE"][0]["ID"] != 6): ?>
                        <div class="input contact-form__input">
                            <label class="input__label" for="<?= $arQuestion["STRUCTURE"][0]["ID"] ?>">
                                <div class="input__label-text">
                                    <?= $arQuestion["CAPTION"] ?>
                                    <?php if ($arQuestion["REQUIRED"] === "Y"): ?><span class="required">*</span><?php endif; ?>
                                </div>
                                <?php
                                    $fieldType = $arQuestion['STRUCTURE'][0]['FIELD_TYPE'];
                                    $fieldID = $arQuestion['STRUCTURE'][0]['ID'];
                                    $nameAttr = "form_" . $fieldType . "_" . $fieldID;
                                    $typeAttr = $fieldType === 'email' ? 'email' : 'text';
                                    ?>
                                    <input class="input__input" type="<?= $typeAttr ?>" name="<?= $nameAttr ?>" id="<?= $fieldID ?>" value="<?= htmlspecialcharsbx($arResult["arAnswers"][$FIELD_SID][0]["VALUE"] ?? '') ?>">
                                <?php if (isset($arResult["FORM_ERRORS"][$FIELD_SID])): ?>
                                    <div class="input__notification"><?= htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID]) ?></div>
                                <?php else: ?>
                                    <div class="input__notification"></div>
                                <?php endif; ?>
                            </label>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <div class="contact-form__form-message">
                <? echo array_values($arResult["QUESTIONS"])[4]["STRUCTURE"][0]["SID"] ?>
                <?php if (isset(array_values($arResult["QUESTIONS"])[4]["STRUCTURE"][0]["ID"])): ?>
                    <div class="input">
                        <label class="input__label" for="<?= array_values($arResult["QUESTIONS"])[4]["STRUCTURE"][0]["ID"] ?>">
                            <div class="input__label-text">
                                <?= array_values($arResult["QUESTIONS"])[4]["CAPTION"] ?>
                            </div>
                            <textarea class="input__input" type="text" name="form_textarea_6<?= array_values($arResult["QUESTIONS"])[4]["STRUCTURE"][0]["ID"] ?>"></textarea>
                        </label>
                    </div>
                <?php endif; ?>
            </div>

            <div class="contact-form__bottom">
                <div class="contact-form__bottom-policy">
                    Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных данных&raquo;.
                </div>
                <div class="contact-form__bottom-buttons">
                    <input <?= (intval($arResult["F_RIGHT"]) < 10 ? 'disabled="disabled"' : '') ?>
                           type="submit"
                           name="web_form_submit"
                           value="<?= htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) ?: GetMessage("FORM_ADD")) ?>"
                           class="form-button contact-form__bottom-button" />
                </div>
            </div>

        <?= $arResult["FORM_FOOTER"] ?>
    </div>

<?php endif; ?>
