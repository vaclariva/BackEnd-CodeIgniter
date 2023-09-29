<?php
//  fungsi deskripsi antara karakter input dengan karakter penggantinya
function dekripsi($ciphertext){
    $key = array(
        '~' => 'a', '$' => 'i', '^' => 'u', '#' => 'e', '+' => 'o',
        '!' => 'A', '%' => 'I', '_' => 'U', '*' => 'O',
    );

    // Melakukan substitusi karakter dalam teks berdasarkan array $key
    $dekripsi = str_replace(array_keys($key), $key, $ciphertext);
    return $dekripsi;
}

// Pengecekan apakah halaman diakses menggunakan metode POST atau tidak
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil nilai cipherteks
    $ciphertext = $_POST["ciphertext"];
    // Memanggil fungsi deskripsi untuk melakukan deskripsi teks 
    $plaintext = dekripsi($ciphertext);
}
?>


<!--Pengaturan tampilan dari form Enkripsi-->
<!DOCTYPE html>
<html>
<head>
    <title>Dekripsi Teks</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            border: 2px solid #4CAF50; /* Warna border hijau */
            padding: 20px;
            border-radius: 10px;
            background-color: white;
            text-align: center;
            max-width: 400px;
        }
            .btn-red {
                background-color: #FF5733; /* Warna tombol merah */
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 10px;
            cursor: pointer;
        }
        .result-border {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 10px;
            margin-top: 15px;
        }
    </style>
</head>

<!-- Membuat bagian utama dari form enkripsi-->
<body>
    <!-- Kontainer utama dengan kelas "container" -->
    <div class="container">
        <!-- Judul "Enkripsi Teks" dengan diberi garis bawah -->
        <h2 style="border-bottom: 2px solid #4CAF50; padding-bottom: 10px;">Dekripsi Teks</h2>

        <!-- Formulir untuk memasukkan teks yang akan dideskripsikan -->
        <form action="" method="post">
            <!-- Label untuk memasukkan teks yang akan dideskripsikan -->
            <label for="ciphertext" style="display: block; margin-bottom: 5px;">Masukkan Ciphertext :</label>
            <!-- Input teks dari nilai POST cipherteks -->
            <input type="text" name="ciphertext" id="ciphertext" style="width: 100%; padding: 5px;">
            <!-- Mengecek apakah hasil deskripsi ada atau tidak -->
            <?php if (isset($plaintext)): ?>
                <!-- Menampilkan hasil deskripsi dengan bingkai -->
                <div class="result-border">
                    <!-- Label untuk hasil deskripsi -->
                    <label><p>Hasil Deskripsi : <?php echo $plaintext; ?></p></label>
                </div>
            <?php endif; ?>
            <br><br>
            <!-- Tombol "Deskripsi" untuk mengirimkan formulir -->
            <button class="btn-red" type="submit">Deskripsi</button>
        </form>
    </div>
</body>
</html> 