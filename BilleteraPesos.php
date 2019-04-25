<?php

class BilleteraPesos implements Billetera 
{
    public $billetes = array();
    public $total;
    
    public function agregar($billete, $cantidad)
    {
        $this->total += $billete * $cantidad;
        if (!isset($this->billetes[$billete])){
        $this->billetes[$billete]=$cantidad;
        }else{
        $this->billetes [$billete] += $cantidad;
        
        }
        return true;
    } 
    public function sacar($billete, $cantidad)
    {
        
        if (isset($this->billetes[$billete]) and $this->billetes[$billete] >= $cantidad){
            $this->billetes[$billete] -= $cantidad;
            $this->total -= $cantidad * $billete;
            return true;
            
        }else
        {
           // echo "\n" . "No tienes este tipo de billete." . "\n";
            return false;
        }
        
    }
    public function mostrar ()
    {
        
        // echo 'El total de la plata en Pesos es de: ' . $this->total . "\n";
        return $this->total;
    }
}
