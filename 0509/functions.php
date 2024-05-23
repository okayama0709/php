<?php
function vending_machine($price, $juice)
{
    if ($price >= 120) {
        $massage = $juice . "の購入ができました。";
    } else {
        $massage = $juice . "を買うには" . (120 - $price) . "円足りません。";
    };
    return $massage;
};
