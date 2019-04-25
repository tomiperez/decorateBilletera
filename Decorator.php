<?php

class Decorator implements Billetera 
{
    public $billetera;
    public $total;
    public $billetesI;
    public $billetesD;
    public function agregar($billete, $cantidad)
    {
        if (!isset($this->billetesI[$billete])){
        $this->billetesI[$billete] = $cantidad;
        $this->billetera->agregar($billete, $cantidad);
        }else{
        $this->billetesI[$billete] += $cantidad;
        $this->billetera->agregar($billete, $cantidad);
        }
      return true;  
    } 
    public function sacar($billete, $cantidad)
    {
       if ($this->billetera->sacar($billete, $cantidad)==true) {
           if(isset($this->billetesD[$billete])){
            $this->billetesD[$billete] += $cantidad;}
            else{
            $this->billetesD[$billete] = $cantidad;    
            }
        }else{
            return false;
        }
        
        
    }
    public function mostrar ()
    {
        $total=$this->billetera->mostrar ();
    }
    public function __construct ($billetera)
    {
        $this->billetera = $billetera;
    }
    public function mostrarEstadistica()
    {
        echo "\n" . 'Total de billetes ingresados:' . "\n" ;
        foreach ($this->billetesI as $key => $billetes){
            echo 'Ingreso ' . $billetes. ' de: $' . $key . "\n";
         }
        echo "\n" . 'Total de billetes retirados:' . "\n" ;
        foreach ($this->billetesD as $key => $billetes){
            echo 'Sacó ' . $billetes. ' de: $' . $key . "\n";
         }
    }
    public function mostrarTotal ()
    {
        echo "\n" . 'Total de billetes:' . "\n" ;
        foreach ($this->billetera->billetes as $key => $billetes) {
           echo 'tienes ' . $billetes. ' de: $' . $key . "\n";
        }
    }

}

