<?php 

class Somme
{
    private $ttcr;
    public static $ttc;
    public static function ttcr(){
        
        $remise = 0;
        if($this->ttc >0 && $this->ttc < 500000){
            $remise = 0 / 100;
        }else if($this->ttc >= 500000 && $this->ttc < 1000000){
            $remise = 10 / 100;
        }else{
            $remise = 20 / 100;
        }

        $this->ttcr = $this->ttc - ($this->ttc * $remise);
        return $this->ttcr;
    }


    private static function ttc_remise()
    {
        $ttc_remise = $this->ttc - $this->ttcr();
        return $ttc_remise;
    }

    private function ht_remise()
    {
        $ht_remise =self::ttc_remise() / (1 + 0.2);
        return $ht_remise;
    }

    public static function somme($ht){
        return $ht - $this->ht_remise();
    }
}