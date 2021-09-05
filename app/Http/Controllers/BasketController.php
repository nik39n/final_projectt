<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use App\Models\Basket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BasketController extends Controller {

    private $basket;

    public function __construct() {
        $this->basket = Basket::getBasket();
    }

    /**
     * Показывает корзину покупателя
     */
    public function index() {
        $products = $this->basket->products;
        return view('basket.index', compact('products'));
    }

    /**
     * Форма оформления заказа
     */
    public function checkout() {
        return view('basket.checkout');
    }

    /**
     * Добавляет товар с идентификатором $id в корзину
     */
    public function add(Request $request, $id) {
        $quantity = $request->input('quantity') ?? 1;
        $this->basket->increase($id, $quantity);
        // выполняем редирект обратно на ту страницу,
        // где была нажата кнопка «В корзину»
        return back();
    }

    /**
     * Увеличивает кол-во товара $id в корзине на единицу
     */
    public function plus($id) {
        $this->basket->increase($id);
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }

    /**
     * Уменьшает кол-во товара $id в корзине на единицу
     */
    public function minus($id) {
        $this->basket->decrease($id);
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }

    /**
     * Возвращает объект корзины; если не найден — создает новый
     */
    

    public function remove($id) {
        $this->basket->remove($id);
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }


    public function clear() {
        $this->basket->delete();
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }
}