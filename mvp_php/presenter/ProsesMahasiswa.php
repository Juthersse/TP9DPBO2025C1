<?php

include("KontrakPresenter.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

class ProsesMahasiswa implements KontrakPresenter
{
	private $tabelmahasiswa;
	private $data = [];

	function __construct()
	{
		// Konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "db_mvp_php"; // nama basis data
			$this->tabelmahasiswa = new TabelMahasiswa($db_host, $db_user, $db_password, $db_name); // instansi TabelMahasiswa
			$this->data = array(); // instansi list untuk data Mahasiswa
		} catch (Exception $e) {
			echo "yah error" . $e->getMessage();
		}
	}

	function prosesDataMahasiswa()
	{
		try {
			// mengambil data di tabel Mahasiswa
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->getMahasiswa();

			while ($row = $this->tabelmahasiswa->getResult()) {
				// ambil hasil query
				$mahasiswa = new Mahasiswa(); // instansiasi objek mahasiswa untuk setiap data mahasiswa
				$mahasiswa->setId($row['id']); // mengisi id
				$mahasiswa->setNim($row['nim']); // mengisi nim
				$mahasiswa->setNama($row['nama']); // mengisi nama
				$mahasiswa->setTempat($row['tempat']); // mengisi tempat
				$mahasiswa->setTl($row['tl']); // mengisi tl
				$mahasiswa->setGender($row['gender']); // mengisi gender
				$mahasiswa->setEmail($row['email']); // isi email
                $mahasiswa->setTelp($row['telp']); // isi telephone

				$this->data[] = $mahasiswa; // tambahkan data mahasiswa ke dalam list
			}
			// Tutup koneksi
			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 2" . $e->getMessage();
		}
	}

	function prosesDataMahasiswaByNIM($nim)
    {
        try {
            $this->tabelmahasiswa->open();
            $this->tabelmahasiswa->getMahasiswaByNIM($nim);
            $data = $this->tabelmahasiswa->getResult();
            $this->tabelmahasiswa->close();
            return $data;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function prosesAddMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telepon)
    {
        try {
            $this->tabelmahasiswa->open();
            $this->tabelmahasiswa->addMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telepon);
            $this->tabelmahasiswa->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function prosesUpdateMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telepon)
    {
        try {
            $this->tabelmahasiswa->open();
            $this->tabelmahasiswa->updateMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telepon);
            $this->tabelmahasiswa->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function prosesDeleteMahasiswa($nim)
    {
        try {
            $this->tabelmahasiswa->open();
            $this->tabelmahasiswa->deleteMahasiswa($nim);
            $this->tabelmahasiswa->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

	function getId($i)
	{
		// mengembalikan id mahasiswa dengan indeks ke i
		return $this->data[$i]->id;
	}
	function getNim($i)
	{
		// mengembalikan nim mahasiswa dengan indeks ke i
		return $this->data[$i]->nim;
	}
	function getNama($i)
	{
		// mengembalikan nama mahasiswa dengan indeks ke i
		return $this->data[$i]->nama;
	}
	function getTempat($i)
	{
		// mengembalikan tempat mahasiswa dengan indeks ke i
		return $this->data[$i]->tempat;
	}
	function getTl($i)
	{
		// mengembalikan tanggal lahir(TL) mahasiswa dengan indeks ke i
		return $this->data[$i]->tl;
	}
	function getGender($i)
	{
		// mengembalikan gender mahasiswa dengan indeks ke i
		return $this->data[$i]->gender;
	}
	function getEmail($i)
    {
        return $this->data[$i]->email;
    }
    function getTelepon($i)
    {
        return $this->data[$i]->telp;
    }
	function getSize()
	{
		return sizeof($this->data);
	}
}
