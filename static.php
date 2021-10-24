<?php 


class ContohStatic {

    public static $angka = 1;


    public static function halo(){
        return "halo." . self::$angka++ . " Kali";
    }
}

echo ContohStatic::$angka;
echo "<br>";
echo ContohStatic::halo();
echo "<hr>";
echo ContohStatic::halo();

?>