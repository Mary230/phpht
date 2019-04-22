<?php

namespace first;

use \ex\Ex1;
use \ex\Ex2;
use \ex\Ex3;
use \ex\Ex4;
use \ex\Ex5;


class myClass
{
    public function f1(int $a) {
        if ($a>=0){
            throw new Ex1("Больше нуля!");
        }else throw new Ex2("Меньше нуля!");
    }
    public function f2(int $a){
        if ($a%2==0){
            throw new Ex3("Четно!");
        }else throw new Ex4("Нечетно!");
    }
    public function f3(int $a){
        if ($a%3==0){
            throw new Ex5("Делится на три!");
        }else throw new Ex1("Не делится на три!");
    }
    public function f4(int $a){
        if ($a%5==0){
            throw new Ex2("Делится на пять!");
        }else throw new Ex3("Не делится на пять!");
    }
}