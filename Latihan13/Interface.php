<?php  

// Kelas Abstrak yang sama sekali tidak memiliki implementasi 
// Murni merupakan template untuk kelas turunannya 
// Tidak boleh memiliki property, hanya deklarasi method saja
// Semua method harus dideklarasikan dengan visibility public
// Boleh mendeklarasikan __construct()
// Satu kelas boleh mengimplementasikan banyak interface 
// Dengan menggunakan type-hinting dapat melakukan 'Dependency Injection'
// Pada akhirnya akan mencapai Polymorphism

interface InfoProduk {
    public function getInfoProduk(); 
}

abstract class Produk {
    protected $judul, 
            $penulis,
            $penerbit,
            $harga,
            $diskon = 0;
          
    public function __construct(  $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
           
     
    }

    public function setJudul( $judul ) {
        $this->judul = $judul;
    }

    public function getJudul() {
        return $this->judul;
    }

    public function setPenulis( $penulis ) {
        return $this->penulis = $penulis;
    }

    public function getPenulis() {
        return $this->penulis;
    }

    public function setPenerbit( $penerbit ) {
        return $this->penerbit = $penerbit;
    }

    public function getPenerbit() {
        return $this->penerbit;
    }

    public function setHarga( $harga ) {
        return $this->harga = $harga;
    }

    public function getHarga() {
        return $this->harga - ($this->harga * $this->diskon / 100);

    }

    public function setDiskon($diskon) {
        $this->diskon = $diskon;
    }

    public function getDiskon() {
        return $this->diskon;
    }


    // public function sayHello() {
    //     return "Hello Pecinta Komik";
    // }
    public function getLabel() {
             return "$this->penulis, $this->penerbit";
         }

        abstract public function getInfo();
    
}


class komik extends Produk implements InfoProduk {
    public $jumlahHalaman;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jumlahHalaman = 0) {
        parent::__construct( $judul, $penulis, $penerbit, $harga );

        $this->jumlahHalaman = $jumlahHalaman;
    }

    public function getInfo() {
        $str = "{$this->judul} | {$this->getLabel()} (RP. {$this->harga})";

        return $str;
    }
    public function getInfoProduk() {
        $str = "Komik : " . $this->getInfo() . " - {$this->jumlahHalaman} Halaman.";
        return $str;
    }
    
}


class Game extends Produk implements InfoProduk {
    public $waktuMain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0) {
        parent::__construct($judul, $penulis, $penerbit, $harga );

        $this->waktuMain = $waktuMain;
    }

    public function getInfo() {
        $str = "{$this->judul} | {$this->getLabel()} (RP. {$this->harga})";

        return $str;
    }


    public function getInfoProduk() {
        $str = "Game : " . $this->getInfo() . " - {$this->waktuMain} Jam.";
        return $str;
    }
    
}

class CetakInfoProduk {
    public $daftarProduk = array();

public function tambahProduk( Produk $produk ) {
    $this->daftarProduk[] = $produk;
}

    public function cetak( ) {
        $str = "DAFTAR PRODUK : <br>";

        foreach( $this->daftarProduk as $p) {
            $str .= "- {$p->getInfoProduk()} <br>";
        }

        return $str;
    }
}


$produk1 = new komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 35000, 125);
$produk2 = new Game("Only up", "Neil Amstrong", "SCKR Games", 30000, 45);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk( $produk1 );
$cetakProduk->tambahProduk( $produk2 );
echo $cetakProduk->cetak();

// $tes = new Produk();





