<?php /*

1. ������� ��������� ������� ������� �������� ������������.
�) ���� ����������� �����.

�) ���� �������� �����, ������� ���������� ����� � ����� �� ���.

�) � ������� ���� ����� �������� ��������� ���������.

�) � ��������� ������ ��������� ���������� � ������� �������� ������ � ��� ����. � �������� ������ ������� ���������, � �������� � � ����������� �� ������������ ���������� � �����������. � ���� ����������� � �������� ����� ����� � ������.

�) ��� ����� ������� � ����������� �����, ������������?
-� ����������� ������ �� ������� ���� � ����� ����������� ����� ������� ���������� �������������� � ������ �������� ������


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
    
    abstract function summ(); //������� �������� �����
    
    abstract protected function getValue(); // ����� ������ � ������
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
         echo "<tr><td>���. �����</td><td>$this->name</td><td>$this->cost</td><td>$this->counts</td><td>$this->type</td><td>".$this->summ()."</td>         </tr>";
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
         echo "<tr><td>�������� �����</td><td>$this->name</td><td>$this->cost</td><td>$this->counts</td><td>$this->type</td><td>".$this->summ()."</td>
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
         echo "<tr><td>������� �����</td><td>$this->name</td><td>$this->cost</td><td>$this->counts</td><td>$this->type</td><td>".$this->summ()."</td>
         </tr>";
    }
}

$physicalgoods = new physicalProduct("�������", "10990", "1", "�������");
$digitalgoods = new digitalProduct("�������� NOD32", "1290", "5", "�����");
$weightgoods = new weightProduct("������� ������ 585", "2490", "0.5", "����.�������");


?>
<table style='border: solid 1px;'><thead><tr><td>���</td><td>��������</td><td>��������� �� ��.</td><td>���-��</td><td>������</td><td>����</td></tr></thead>
<tbody>
     <?php 
     $physicalgoods->getValue(); 
     $digitalgoods->getValue(); 
     $weightgoods->getValue(); 
     ?>
</tbody></table>


<?php

//* ����������� ������� Singleton ��� ������ traits. 


trait singletontrait {
        private static $instance;  // ��������� �������
// �������� �� �������� ����� new Singleton
    private function __construct() { /* ... @return Singleton */ } 
    
    
// �������� �� �������� ����� ������������
    private function __clone() { /* ... @return Singleton */ }
    
    
// �������� �� �������� ����� unserialize
     private function __wakeup()  { /* ... @return Singleton */ }
    
    
// ���������� ������������ ��������� ������. @return Singleton
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
    echo "�������� ������";
    }

 }
    
    

 Singleton::getInstance()->doAction(); 


