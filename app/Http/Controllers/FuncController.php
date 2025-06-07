<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuncController extends Controller
{
    //Пример Метод из 4 задания

    public function method_4(PartnerType $product_type, MaterialType $materialType, int $quantity, float $price1, float $price2)
    {
        try {
            $need_quantity = round($price1 * $price2 * $product_type->coefficent * (1 + $materialType->percent_defective));
            return $need_quantity;
        }
        catch (\Exception $exception){
            return -1;
        }
    }
}
