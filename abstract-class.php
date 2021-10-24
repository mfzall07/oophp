<?php

abstract class Produk {

    private $judul, 
           $penulis, 
           $penerbit,
           $harga, 
           $diskon;


    public function setJudul($judul) {
        if ( !is_string($judul) ) {
            throw new Exception("Judul Harus String");
        }
        $this->judul = $judul;
    }

    public function getJudul(){
        return $this->judul;
    }

    public function setPenulis($penulis) {
        if ( !is_string($penulis) ) {
            throw new Exception("Judul Harus String");
        }
        $this->penulis = $penulis;
    }

    public function getPenulis(){
        return $this->penulis;
    }

    public function setPenerbit($penerbit) {
        if ( !is_string($penerbit) ) {
            throw new Exception("Judul Harus String");
        }
        $this->penerbit = $penerbit;
    }

    public function getPenerbit(){
        return $this->penerbit;
    }

    public function setHarga($harga) {
        if ( !is_integer($harga) ) {
            throw new Exception("Judul Harus String");
        }
        $this->Penerbit = $penerbit;
    }

    public function getHarga() {
        return $this->harga - ($this->harga * $this->diskon /100);
    }

    public function setDiskon( $diskon ) {
        $this->diskon = $diskon;
    }

    public function getDiskon() {
        return $this->diskon;
    }

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    public function __construct($judul, $penulis, $penerbit, $harga){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;

    }

    abstract public function getInfoProduk();

    public function getInfo() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp.{$this->harga})";
        return $str;

    }

}

class Komik extends Produk {
    public $jmlHalaman;

    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman){
        parent :: __construct ($judul, $penulis, $penerbit, $harga);

        $this->jmlHalaman = $jmlHalaman;

    }

    public function getInfoProduk() {
        $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
    return $str;
    }
}


class Game extends Produk {
    public $waktuMain;

    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain){
        parent :: __construct ($judul, $penulis, $penerbit, $harga,);

        $this->waktuMain = $waktuMain;
    
    }

    public function getInfoProduk() {
        $str = "Game : " . $this->getInfo() . " ~ {$this->waktuMain} Jam.";
    return $str;
    }

}



class CetakInfoProduk {
    public $daftarProduk = [];

    public function tambahProduk( Produk $produk){
        $this->daftarProduk[] = $produk;
    }

    public function cetak() {
        $str = "DAFTAR PRODUK : <br>";

        foreach ( $this->daftarProduk as $p){
            $str .= "- {$p->getInfoProduk()} <br>";
        }

        return $str;
    }
}


$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game ("Uncharted", "Neil Druckmen", "Sony Computer", 250000, 50);


$cetakProduk = new cetakInfoProduk();
$cetakProduk->tambahProduk( $produk1 );
$cetakProduk->tambahProduk( $produk2 );

echo $cetakProduk->cetak();


