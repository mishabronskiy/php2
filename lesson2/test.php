<?php /*

1. Создать структуру классов ведения товарной номенклатуры.
а) Есть абстрактный товар.

б) Есть цифровой товар, штучный физический товар и товар на вес.

в) У каждого есть метод подсчета финальной стоимости.

г) У цифрового товара стоимость постоянная – дешевле штучного товара в два раза. У штучного товара обычная стоимость, у весового – в зависимости от продаваемого количества в килограммах. У всех формируется в конечном итоге доход с продаж.

д) Что можно вынести в абстрактный класс, наследование?
-В абстрактном классе мы выносим поля и общий абстрактный метод который необходимо переопределить в каждом дочернем классе


*/


?>
<meta charset='utf-8'>
<style>
td {border: solid 1px;}
</style>
<?php
abstract class Product {
    private $name;
    private $cost;
    private $counts;
    private $type;
    
    abstract function summ(); //Подсчет итоговой суммы
    
    abstract protected function getValue(); // вывод данных о товаре
}


class physicalProduct extends Product {
    function __construct($name, $cost, $counts, $type) {
        $this->name = $name;
        $this->cost = $cost;
        $this->counts = $counts;
        $this->type = $type;
    }

    public function summ() {
        return $this->cost * $this->counts;
    }
    
    public function getValue() {
         echo "<tr><td>Физ. товар</td><td>$this->name</td><td>$this->cost</td><td>$this->counts</td><td>$this->type</td><td>".$this->summ()."</td>         </tr>";
    }
}


class digitalProduct extends Product
{
    
     function __construct($name, $cost, $counts, $type) {
        $this->name = $name;
        $this->cost = $cost;
        $this->counts = $counts;
        $this->type = $type;
    }

    public function summ() {
        return ($this->cost / 2) * $this->counts;
    }

     public function getValue() {
         echo "<tr><td>Цифровой товар</td><td>$this->name</td><td>$this->cost</td><td>$this->counts</td><td>$this->type</td><td>".$this->summ()."</td>
         </tr>";
    }
}





class weightProduct extends Product
{
    function __construct($name, $cost, $counts, $type) {
        $this->name = $name;
        $this->cost = $cost;
        $this->counts = $counts;
        $this->type = $type;
       
    }
    
    public function summ() {
        return $this->cost * $this->counts;

    }

    public function getValue() {
         echo "<tr><td>Весовой товар</td><td>$this->name</td><td>$this->cost</td><td>$this->counts</td><td>$this->type</td><td>".$this->summ()."</td>
         </tr>";
    }
}

$physicalgoods = new physicalProduct("Монитор", "10990", "1", "Техника");
$digitalgoods = new digitalProduct("Лицензия NOD32", "1290", "5", "Ключи");
$weightgoods = new weightProduct("Золотое кольцо 585", "2490", "0.5", "Драг.Металлы");


?>
<table style='border: solid 1px;'><thead><tr><td>Тип</td><td>Название</td><td>Стоимость за шт.</td><td>Кол-во</td><td>Раздел</td><td>Итог</td></tr></thead>
<tbody>
     <?php 
     $physicalgoods->getValue(); 
     $digitalgoods->getValue(); 
     $weightgoods->getValue(); 
     ?>
</tbody></table>


<?php

//* Реализовать паттерн Singleton при помощи traits. 


trait singletontrait {
        private static $instance;  // Экземпляр объекта
// Защищаем от создания через new Singleton
    private function __construct() { /* ... @return Singleton */ } 
    
    
// Защищаем от создания через клонирование
    private function __clone() { /* ... @return Singleton */ }
    
    
// Защищаем от создания через unserialize
     private function __wakeup()  { /* ... @return Singleton */ }
    
    
// Возвращает единственный экземпляр класса. @return Singleton
      public static function getInstance() {
            if ( empty(self::$instance) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}




class Singleton {
    use singletontrait;
    public function doAction() { 
    echo "Проверка трейта";
    }

 }
    
    

 Singleton::getInstance()->doAction(); 


