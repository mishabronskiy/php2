<meta charset='utf-8'>
<?php
// 1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.
class Order {
    var $product; //продукт
    var $price;   //цена
    var $amount;  //кол-во
//2. Описать свойства класса из п.1 (состояние).
    function __construct($product, $price, $amount) {
        $this->product = $product;
        $this->price = $price;
        $this->amount = $amount;
    }
//3. Описать поведение класса из п.1 (методы).
    function totalprice($price, $amount){ // посчитать общую стоимость
        return $price * $amount;
    }

    function showDetail() { //Отобразить детали заказа
        echo "Вы заказали ".$this->product." ".$this->amount. "шт. по цене: ".$this->price."<br>Итог:".$this->totalprice($this->price, $this->amount); 
    }
    
    function deleteOrder() { //Удалить заказ
        echo "Ваш заказ ".$this->product." ".$this->amount. "шт. - ".$this->totalprice($this->price, $this->amount)."р. был удален из корзины!"; 
    }
    
}
//4. Придумать наследников класса из п.1. Чем они будут отличаться?
class adminOrder extends Order { //работать с подключением файлов умею, пишу все в одном чтобы вам не скакать по ним
    var $status; 
    
        function __construct($status, $product, $price, $amount) {
        $this->status = $status;
        parent:: __construct($product, $price, $amount);
    }
    

    function setStatus() { //установить статус заказа и вывести детали
        echo "Статус вашего заказа был изменен на: ";//.$this-status;// Почему-то не получается вызвать поле класса...
        echo "<br>";
    }
    
    
    function showOrder() { //Сменить статус заказа и вывести детали
         $this->setStatus();
        parent::showDetail();
    }

}


$obj = new Order("Телефон", 3000, 2);
$obj->showDetail(); //клиентская часть, показать детали
echo "<br>";
$obj->deleteOrder(); //удалить заказ
echo "<br><br><br>";
$status = new adminOrder("Отправлен", "Телефон", 3000, 2); //изменение статуса заказа из админки
$status->showOrder();


/*Задание 5 Что он выведет на каждом шаге? Почему?
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); // 1
$a2->foo(); // 2
$a1->foo(); // 3
$a2->foo(); // 4 

каждый раз мы используем один и тот же класс. Переменная сохраняется в методе foo поэтому при вызове метода мы каждый раз увеличиваем переменную.
 */
 
 
 /*Задание 6
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); //1
$b1->foo(); //1 потому что используем объект дочернего класса с наследуемыми свойствами, т.е. по сути используем новый объект с наследуемым методом foo
$a1->foo(); //2
$b1->foo(); //2
 */




 /*Задание 7
*Дан код:
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A; // т.к. у нас отсутствует конструктор то мы можем не передавать аргументы и не прописывать скобки 
$b1 = new B;
$a1->foo(); //1
$b1->foo(); //1
$a1->foo(); //2
$b1->foo(); //2




*/



?>