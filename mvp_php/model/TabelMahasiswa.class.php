<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Kelas yang berisikan tabel dari mahasiswa
class TabelMahasiswa extends DB
{
	function getMahasiswa()
	{
		// Query mysql select data mahasiswa
		$query = "SELECT * FROM mahasiswa";
		
		// Mengeksekusi query
		return $this->execute($query);
	}

	function getMahasiswaByNIM($nim)
    {
        $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
        return $this->execute($query);
    }

    function addMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telepon)
    {
        $query = "INSERT INTO mahasiswa (nim, nama, tempat, tl, gender, email, telp) 
                 VALUES ('$nim', '$nama', '$tempat', '$tl', '$gender', '$email', '$telepon')";
        return $this->execute($query);
    }

    function updateMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telepon)
    {
        $query = "UPDATE mahasiswa 
                 SET nama='$nama', tempat='$tempat', tl='$tl', 
                     gender='$gender', email='$email', telp='$telepon' 
                 WHERE nim='$nim'";
        return $this->execute($query);
    }

    function deleteMahasiswa($nim)
    {
        $query = "DELETE FROM mahasiswa WHERE nim='$nim'";
        return $this->execute($query);
    }
}
