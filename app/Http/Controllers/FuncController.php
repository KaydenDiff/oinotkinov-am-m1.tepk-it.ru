<?php

namespace App\Http\Controllers;

use App\Models\MaterialType;
use App\Models\ProductType;
use Illuminate\Http\Request;

class FuncController extends Controller
{
    //Метод из 4 модуля
    public function method_4m(ProductType $productType, MaterialType $materialType, int $quantity, float $p1, float $p2, float $storage) {
        try {
            //Вычисляем количество необходимого материала на одну единицу продукции
            $need_quantity = ceil($p1 * $p2 * $productType->coefficient * $quantity / (1 + $materialType->defect / 100));
            //Возвращаем целое количество закупаемого материала
            return max(0, (int)($need_quantity - $storage));
            //Если в качестве параметров метода будут указаны
            // несуществующие типы продукции, материалов или
            // другие неподходящие данные, то метод возварщает -1
        } catch (\Exception $e) {
            return -1;
        }
    }
}
