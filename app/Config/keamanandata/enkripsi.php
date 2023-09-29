<?php
// Deskripsi fungsi enkripsi antara karakter input dengan karakter 
//penggantinya yang menggunakan huruf vokal
function enkripsi($input){
    $key = array(
        'a' => '~', 'i' => '$', 'u' => '^', 'e' => '#', 'o' => '+',
        'A' => '!', 'I' => '%', 'U' => '_', 'E' => '#', 'O' => '*',
    );

// Melakukan substitusi karakter dalam teks berdasarkan array $key dan kemudian setelah selesai maka di panggil kembali pada 
    $enkripsi = str_replace(array_keys($key), $key, $input);
    return $enkripsi;
}

// Pengecekan apakah halaman diakses menggunakan metode POST atau tidak
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil nilai input dari user
    $input = $_POST["input"];
    // Memanggil fungsi enkripsi untuk melakukan enkripsi teks dari inputan
    $ciphertext = enkripsi($input);
}
?>

<!--Pengaturan tampilan dari form Enkripsi-->
<!DOCTYPE html>
<html>
<head>
    <title>Enkripsi Teks</title>
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
        <h2 style="border-bottom: 2px solid #4CAF50; padding-bottom: 10px;">Enkripsi Teks</h2>
        
        <!-- Formulir untuk memasukkan teks yang akan dienkripsi -->
        <form action="" method="post">
            <!-- Label untuk input teks -->
            <label for="input" style="display: block; margin-bottom: 5px;">Masukkan Teks :</label>
            <!-- Input teks dari nilai POST input -->
            <input type="text" name="input" id="input" style="width: 100%; padding: 5px;">
            <!-- Mengecek apakah hasil enkripsi ada atau tidak -->
            <?php if (isset($ciphertext)): ?>
                <!-- Menampilkan hasil enkripsi dengan bingkai -->
                <div class="result-border">
                    <!-- Label untuk hasil enkripsi -->
                    <label><p>Hasil Enkripsi : <?php echo $ciphertext; ?></p></label>
                </div>
            <?php endif; ?>
            <br><br>
            <!-- Tombol "Enkripsi" untuk mengirimkan formulir -->
            <button class="btn-red" type="submit">Enkripsi</button>
        </form>
    </div>
</body>
</html>
