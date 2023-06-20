<?php
// Koneksi ke database
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_toko";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Periksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nama = isset($_POST['nama']) ? $_POST['nama'] : "";
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : "";
    $produk = isset($_POST['produk']) ? $_POST['produk'] : "";
    $size = isset($_POST['size']) ? $_POST['size'] : "";
    $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : "";
    $metodePembayaran = isset($_POST['pembayaran']) ? $_POST['pembayaran'] : "";

    // Query untuk menyimpan data ke dalam tabel database
    $sql = "INSERT INTO purchases (nama, alamat, size, jumlah, metode_pembayaran, produk) VALUES ('$nama', '$alamat', '$size', '$jumlah', '$metodePembayaran', '$produk')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil disimpan ke dalam database.');</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: " . $conn->error . "');</script>";
    }
    
}

// Menutup koneksi database
$conn->close();
?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>MY Website</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>   
</head>

<body>
    <section>
        <!--- navigation --->
        <nav>
            <!--- logo --->
            <a href="#" class="logo">Thrift-Store</a>
            <!--- menu --->
            <ul>
                <li><a href="#home" class="active">Home page</a></li>
                <li><a href="#product">Product</a></li>
                <li><a href="#testimoni">Testimonials</a></li>
                <li><a href="#sosial">Contact</a></li>
            </ul>
        </nav>
 
        <!--- text --->
        <div class="text-container" id="home">
    <p>Hello,</p>
    <p>Welcome to R Thrift-Store</p>
    <p>Ini toko baju dan sepatu</p>
    <p>Silahkan cari baju dan sepatu yang kamu sukai</p>
</div>

<div class="banner">
    <video autoplay loop muted>
        <source src="lofi.mp4" type="video/mp4">
    </video>
</div>

</video>
</div>
        <!-- model -->
        <img alt="model" class="model" src="warung.png">  
    </section>
 
    <!-- services -->
    <div class="services" id="product">
        <!--text-->
        <div class="services-text ">
            <p>Ini Adalah Product Saya</p>
        </div>

        
  <!-- Tambahkan box-1 lainnya dengan form yang sama -->

  <div class="box-container">
    <!--- 1 --->
    <div class="box-1">
        <span>1</span>
        <p>Erigo</p>
        <p class="heading">120.000</p>
        <img src="erigo.jpg" style="width: 230px; height: 280px; border-radius: 10px;"><br>
        <button type="submit" name="buy_now" onclick="openModal('Erigo')">Beli Sekarang</button>
    </div>

    <!--- 2 --->
    <div class="box-1">
        <span>2</span>
        <p>Adidas Samba</p>
        <p class="heading">1.200.000</p>
        <img src="samba.jpg" style="width: 230px; height: 280px; border-radius: 10px;"><br>
        <button type="submit" name="buy_now" onclick="openModal('Adidas Samba')">Beli Sekarang</button>
    </div>

    <!--- 3 --->
    <div class="box-1">
        <span>3</span>
        <p>Reebok</p>
        <p class="heading">350.000</p>
        <img src="reebok.jpg" style="width: 230px; height: 280px; border-radius: 10px;"><br>
        <button type="submit" name="buy_now" onclick="openModal('Reebok')">Beli Sekarang</button>
    </div>

    <div class="box-1">
        <span>4</span>
        <p>New Balance</p>
        <p class="heading">500.000</p>
        <img src="NB.jpg" style="width: 230px; height: 280px; border-radius: 10px;"><br>
        <button type="submit" name="buy_now" onclick="openModal('New Balance')">Beli Sekarang</button>
    </div>

    <div class="box-1">
        <span>5</span>
        <p>Stone Island</p>
        <p class="heading">850.000</p>
        <img src="stone.jpg" style="width: 230px; height: 280px; border-radius: 10px;"><br>
        <button type="submit" name="buy_now" onclick="openModal('Stone Island')">Beli Sekarang</button>
    </div>

    
</div>

<div id="modal" style="display: none;">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <!-- Isi form sesuai kebutuhan -->
        <label for="nama">Nama Pembeli:</label>
        <input type="text" id="nama" name="nama" required><br>

        <label for="alamat">Alamat:</label>
        <input type="alamat" id="alamat" name="alamat" required><br>

        <label for="size">SIZE:</label>
<input type="text" id="size" name="size"><br>

        <label for="jumlah">Jumlah:</label>
        <input type="number" id="jumlah" name="jumlah" required><br>

        <label for="pembayaran">Metode Pembayaran:</label>
        <select id="pembayaran" name="pembayaran">
            <option value="ShopeePay">ShopeePay</option>
            <option value="Dana">Dana</option>
            <option value="BCA">BCA</option>
            <option value="Mandiri">Mandiri</option>
        </select><br><br>

        <input type="hidden" id="produk" name="produk" value="">
        <button type="submit">Submit</button>
        <button type="button" onclick="closeModal()">Kembali</button>
    </form>
</div>

<script>
    function openModal(produk) {
        document.getElementById("modal").style.display = "block";
        document.getElementById("produk").value = produk;
    }

    function closeModal() {
        document.getElementById("modal").style.display = "none";
    }
</script>

</div>
     
    <!--testimonials-->
    <div class="testimoni" id="testimoni">
        <!--text-->
        <div class="testimoni-text ">
            <p>What Our Client Says..</p>
        </div>        
 
        <div class="testimoni-col">
            <div class="testimoni-1">
                <img src="ggp.webp">
                <div>
                    <p>Product nya bagus dan nyaman dipakai ketika dimana mana dan bahan nya halus tidak kasar</p>
                    <h3>Client Pertama</h3>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
 
            <div class="testimoni-2">
                <img src="image.jpeg">
                <div>
                    <p>sepatunya bagus bahnya kuat dan tahan lama dan harga nya juga sangat murah  </p>
                    <h3>Client Kedua</h3>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
        </div>
    </div>
 
    <!-- footer -->
    <footer>
        <p>Interested In Using Our Services?</p>
             
        <!--paragraph-->
        <p>I try to work on your project as quickly as possible. Guarantee for revision until you are satisfied with my work.</p>
        <!--social-->
        <div class="social-icons" id="sosial">
        <a href="https://api.whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
<a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
<a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
<a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
<a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>

        </div>
         
        <!--copyright-->
        <p class="copyright"> My Social Media</p>
    </footer>
 
    <!--social-attach-bar-->
    <div class="social">
    <a href="https://api.whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
<a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
<a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
<a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
<a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>

    </div>
</body>

</html>