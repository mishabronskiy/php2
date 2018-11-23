<meta charset='utf-8'>
<?php
// 1. ��������� �����, ������� ��������� ����� �������� �� ���������� ������� ��������-���������: �������, ������, ������� � �.�.
class Order {
    var $product; //�������
    var $price;   //����
    var $amount;  //���-��
//2. ������� �������� ������ �� �.1 (���������).
    function __construct($product, $price, $amount) {
        $this->product = $product;
        $this->price = $price;
        $this->amount = $amount;
    }
//3. ������� ��������� ������ �� �.1 (������).
    function totalprice($price, $amount){ // ��������� ����� ���������
        return $price * $amount;
    }

    function showDetail() { //���������� ������ ������
        echo "�� �������� ".$this->product." ".$this->amount. "��. �� ����: ".$this->price."<br>����:".$this->totalprice($this->price, $this->amount); 
    }
    
    function deleteOrder() { //������� �����
        echo "��� ����� ".$this->product." ".$this->amount. "��. - ".$this->totalprice($this->price, $this->amount)."�. ��� ������ �� �������!"; 
    }
    
}
//4. ��������� ����������� ������ �� �.1. ��� ��� ����� ����������?
class adminOrder extends Order { //�������� � ������������ ������ ����, ���� ��� � ����� ����� ��� �� ������� �� ���
    var $status; 
    
        function __construct($status, $product, $price, $amount) {
        $this->status = $status;
        parent:: __construct($product, $price, $amount);
    }
    

    function setStatus() { //���������� ������ ������ � ������� ������
        echo "������ ������ ������ ��� ������� ��: ";//.$this-status;// ������-�� �� ���������� ������� ���� ������...
        echo "<br>";
    }
    
    
    function showOrder() { //������� ������ ������ � ������� ������
         $this->setStatus();
        parent::showDetail();
    }

}


$obj = new Order("�������", 3000, 2);
$obj->showDetail(); //���������� �����, �������� ������
echo "<br>";
$obj->deleteOrder(); //������� �����
echo "<br><br><br>";
$status = new adminOrder("���������", "�������", 3000, 2); //��������� ������� ������ �� �������
$status->showOrder();


/*������� 5 ��� �� ������� �� ������ ����? ������?
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

������ ��� �� ���������� ���� � ��� �� �����. ���������� ����������� � ������ foo ������� ��� ������ ������ �� ������ ��� ����������� ����������.
 */
 
 
 /*������� 6
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
$b1->foo(); //1 ������ ��� ���������� ������ ��������� ������ � ������������ ����������, �.�. �� ���� ���������� ����� ������ � ����������� ������� foo
$a1->foo(); //2
$b1->foo(); //2
 */




 /*������� 7
*��� ���:
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A; // �.�. � ��� ����������� ����������� �� �� ����� �� ���������� ��������� � �� ����������� ������ 
$b1 = new B;
$a1->foo(); //1
$b1->foo(); //1
$a1->foo(); //2
$b1->foo(); //2




*/



?>