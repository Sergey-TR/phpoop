<?php

/*1. Придумать класс, который описывает любую сущность из предметной области 
    интернет-магазинов: продукт, ценник, посылка и т.п. или любой другой области. 
    Опишите свойства и методы, придумайте наследника, расширяющего функционал родителя. 
    Приведите пример использования  */

//Я ПОНИМАЮ, ЧТО ЭТО НИГДЕ НЕ ПРИДЕТСЯ ИСПОЛЬЗОВАТЬ, НО ВЫ САМИ ГОВОРИЛИ "ПРИДУМАЙТЕ ЧТО ХОТИТЕ"

class Bum {
    public $name;
    public $salary;
    public $action;

    public function __construct($name = null, $salary = null, $action = null)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->action = $action;
    }

    public function show ()
    {
        echo "Он {$this->name}, у него денег {$this->salary} его занятие {$this->action}<br>";

    }
    public function money ($dole)
    {
        if($dole > 0)
        {
            echo "Бомж говорит: Ура, мне подкинули {$dole} денег, хватит на бормотушку.<br>";
        }
    }
}

class Worker extends Bum {
    public $duty;
    public $time;

    public function __construct($name = null, $salary = null, $duty = null, $time = null, $action = null)
    {
        parent::__construct($name, $salary, $action);
        $this->duty = $duty;
        $this->time = $time;
    }

    public function show ()
    {
        echo "Он {$this->name}, его зарплата {$this->salary},
                у него {$this->duty} обязанностей,
                и он работает {$this->time} часов,
                в свободное время он {$this->action}.<br>";
    }

    public function givMoney(Bum $cash)
    {
        if($this->salary > 100)
        {
            $cash->salary += ((rand(100, $this->salary)) - 100);
            echo "Работяга говорит: Манагер дал денег {$this->salary} подам Бомжу на бухлишко.<br>";
        }
        else
        {
            echo "Работяга говорит: Манагер не хорший человек оштрафовал на {$this->salary} денег.<br>";
        }
    }
}

class Manager extends Worker {
    public $mood;

    public function __construct($name = null, $salary = null, $duty = null, $time = null, $action = null, $mood = null)
    {
        parent::__construct($name, $salary, $duty, $time, $action);
        $this->mood = $mood;
    }
    public function goodMood (Bum $cash)
    {
        $this->mood = rand(0, 1);
            if($this->mood == 0)
            {
                $cash->salary += rand(-50, -10);
                echo "Манагер говорит: У меня плохое настроение, оштрафую Работягу на {$cash->salary} денег.<br>";
            }
            else
            {
                $cash->salary += rand(10, 50);
                echo "Манагер говорит: У меня хорошее настроение, дам Работяге {$cash->salary} денег.<br>";
            }
    }
}

$lifeBum = new Bum("Бомж", 0, "ищет деньги чтобы бухнуть");
$lifeBum->show();

$lifeWorker = new Worker ("Работяга", 100, 100500, 12, "бухает");
$lifeWorker->show();

$lifeManager = new Manager ("Манагер", 500, 100, 8, "бухает коньячок");
$lifeManager->show();

$lifeManager->goodMood($lifeWorker);

$lifeWorker->givMoney($lifeBum);

$lifeBum->money($lifeBum->salary);

echo "<pre>";
print_r($lifeBum);
var_dump(get_class_methods($lifeBum));
print_r($lifeWorker);
var_dump(get_class_methods($lifeWorker));
print_r($lifeManager);
var_dump(get_class_methods($lifeManager));
echo "</pre>";


//ОБЩИЙ КОММЕНТАРИЙ ДЛЯ ЗАДАНИЙ № 3, 4, 5.

/* Ключевое слово static, написанное перед присваиванием значения локальной переменной, приводит к следующему:
    - Присваивание выполняется только один раз, при первом вызове функции
    - Значение помеченной таким образом переменной сохраняется после окончания работы функции
    - При последующих вызовах функции вместо присваивания переменная получает сохраненное ранее значение */

/* 3. Дан код:  Что он выведет на каждом шаге? Почему? */

 class A
 {
     public function foo()
     {
         static $x = 0;
         echo ++$x;
     }
 }
     $a1 = new A(); //создаем экземпляр класса А и записываем в $a1
     $a2 = new A(); //кажется, что создаем новый экземпляр объекта класса А
                    //но реально метод будет существовать лишь в одном экземпляре,
                    //просто при каждом вызове в него будет пробрасываться разный $this.
     $a1->foo(); // 1
     $a2->foo(); // 2
     $a1->foo(); // 3
     $a2->foo(); // 4

/*4. Объясните результаты в этом случае. Немного изменим п.5: */


// при наследование класса (и метода) приводит к тому, что создается новый метод

 class C {
     public function foo() {
         static $x = 0;
         echo ++$x;
     }
 }
 class D extends C {
 }
     $c1 = new C();
     $d1 = new D();
     $c1->foo(); // 1
     $d1->foo(); // 1
     $c1->foo(); // 2
     $d1->foo(); // 2

/*5. *Дан код: Что он выведет на каждом шаге? Почему?  */

 class E {
     public function foo() {
         static $x = 0;
         echo ++$x;
     }
 }
 class F extends E {
 }
     $e1 = new E; //все аналогично з.4, но нет скобок, насколько я понимаю синтаксис это допускает
     $f1 = new F;
     $e1->foo(); // 1
     $f1->foo(); // 1
     $e1->foo(); // 2
     $f1->foo(); // 2

