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
    $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : "";
    $metodePembayaran = isset($_POST['pembayaran']) ? $_POST['pembayaran'] : "";

    // Query untuk menyimpan data ke dalam tabel database
    $sql = "INSERT INTO purchases (nama, alamat, jumlah, metode_pembayaran, produk) VALUES ('$nama', '$alamat', '$jumlah', '$metodePembayaran', '$produk')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan ke dalam database.";
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
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
            <a href="#" class="logo">GameStore!!</a>
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
            <p>RNZ Trift-Shop</p>
            <p>Ini toko baju dan sepatu</p>
            <p>silahkan cari baju dan sepatu yang kamu sukai</p>
        </div>

        <div class="banner">
            <video autoplay loop muted>
                <source src="lofi.mp4">
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
        <p>Dusk Diver</p>
        <p class="heading">80.000</p>
        <img src="./games/ps8.jpeg" style="width: 230px; height: 280px; border-radius: 10px;"><br>
        <button type="submit" name="buy_now" onclick="openModal('Dusk Diver')">Beli Sekarang</button>
    </div>

    <!--- 2 --->
    <div class="box-1">
        <span>2</span>
        <p>Mary Skelter Finale</p>
        <p class="heading">80.000</p>
        <img src="./games/ps1.jpeg" style="width: 230px; height: 280px; border-radius: 10px;"><br>
        <button type="submit" name="buy_now" onclick="openModal('Mary Skelter Finale')">Beli Sekarang</button>
    </div>

    <!--- 3 --->
    <div class="box-1">
        <span>3</span>
        <p>Battlefield 1</p>
        <p class="heading">80.000</p>
        <img src="./games/ps4.jpeg" style="width: 230px; height: 280px; border-radius: 10px;"><br>
        <button type="submit" name="buy_now" onclick="openModal('BATTLEFIELD 1')">Beli Sekarang</button>
    </div>

    <div class="box-1">
        <span>4</span>
        <p>Little Big Planet 3</p>
        <p class="heading">80.000</p>
        <img src="./games/ps6.jpeg" style="width: 230px; height: 280px; border-radius: 10px;"><br>
        <button type="submit" name="buy_now" onclick="openModal('Little Big Planet 3')">Beli Sekarang</button>
    </div>

    <div class="box-1">
        <span>5</span>
        <p>Spider-Man</p>
        <p class="heading">80.000</p>
        <img src="./games/ps2.jpeg" style="width: 230px; height: 280px; border-radius: 10px;"><br>
        <button type="submit" name="buy_now" onclick="openModal('Spider-Man')">Beli Sekarang</button>
    </div>

    
</div>

<div id="modal" style="display: none;">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <!-- Isi form sesuai kebutuhan -->
        <label for="nama">Nama Pembeli:</label>
        <input type="text" id="nama" name="nama" required><br>

        <label for="alamat">Alamat:</label>
        <input type="alamat" id="alamat" name="alamat" required><br>

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

@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

html {
    scroll-behavior: smooth;
    font-family: 'Montserrat', sans-serif;
}

body {
    margin: 0;
    padding: 0;
    font-family: 'Montserrat', sans-serif;
}

ul{
    list-style:none;
}
 
a{
    text-decoration:none;
}
 
section{
    width:100%;
    height:95vh;
    position: relative;
}
 
nav{
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 60px;
    background-color: rgb(0, 0, 0);
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2);
    padding: 0 5%;
    z-index: 999; /* or any higher value */
    color: #000; /* Default color for links */
    text-decoration: none;
    color: #000;

     
}
nav ul{
    display: flex;
}
  
nav ul li a{
    margin:30px;
    color:#ffffff;
    font-size: 15px;
    font-weight:700;
    text-shadow: 2px 2px 4px rgba(255, 255, 255, 1.2);
}
 
.logo{
    color:#ffffff;
    font-size: 22px;
    font-weight: bold;
    text-shadow: 2px 2px 4px rgba(255, 255, 255, 1.2);
}
 
.active{
    color:#ffffff;
    font-weight:bold;
    text-shadow: 2px 2px 4px rgba(255, 255, 255, 1.2);
}
 
.text-container p:nth-child(1){
    font-weight: bold;
    color: black;
    font-size: 22px;
    text-shadow: 2px 2px 4px rgba(255, 255, 255, 1.2);
}
 
.text-container p:nth-child(2){
    font-weight: bold;
    letter-spacing: 2px;
    color: black;
    font-size: 60px;
    text-shadow: 2px 2px 4px rgba(255, 255, 255, 1.2);
}
 
.text-container p:nth-child(3){
    color: black;
    font-size: 30px;
    line-height: 30px;
    text-shadow: 2px 2px 4px rgba(255, 255, 255, 1.2);
}
 
.text-container p:nth-child(4){
    color: black;
    font-size: 17px;
    margin-top: 10px;
    line-height: 30px;
    text-shadow: 2px 2px 4px rgba(255, 255, 255, 1.2);
}
 
.text-container p{
    line-height: 0px;
    margin: 55px 0px 25px;
}
 
.text-container{
    position: absolute;
    left: 13%;
    top: 42%;
    transform: translate(-13%, -42%);
}
 
.text-container button{
    width: 130px;
    height: 42px;
    border-radius: 10px;
    font-weight: bold;
    font-size: 14px;
    outline: none;
    margin: 0px 10px;
}
 
.model{
    height: 300px;
    position: absolute;
    bottom: 200px;
    left: 80%;
    transform: translateX(-70%);
    border-radius: 25%;
}
 
.services{
    height:600px;
    background-color:#f6f5f5;
    padding: 2% 10% 0px 10%;
}
 
.services-text p:nth-child(1){
    font-weight:bold;
    color:#1d1c1c;
    font-size:30px;
    line-height:0px;
    text-align: center;
    margin-bottom: 40px;
}
 
.services-text p:nth-child(2){
    color:#7e7d7d;
 
}
 
.services-text{
    margin:50px 0px;
}

.box-container{
    display: flex;
    justify-content: space-between;
}
 
.box-1{
    width: 300px;
    height: 500px;
    background-repeat: no-repeat;
    background-size: cover;
    box-shadow:2px 2px 18px rgba(0,0,0,0.3);
    align-items: center;
    justify-content: center;
    display: flex;
    flex-direction: column;
    margin: 0px 4px;
         
}
  
.box-1 span{
    width:40px;
    height:40px;
    border-radius:50%;
    background-color:white;
    display: flex;
    justify-content: center;
    align-items:center;
    font-weight: bold;
}
 
.box-1 p:nth-child(2){
    color:black;
    font-size: 23px;
    line-height:0px;
}
 
.box-1 p:nth-child(3){
    color:#8F8F8F;
    text-align:center;
    width: 230px;
    margin:0px 0px 20px 0px;
}
 
.box-1 button{
    width:100px;
    height:30px;
    background-color:#FFFFFF;
    border:none;
    outline: none;
    border-radius:5px;
}
 
.testimoni{
    height:500px;
    background-color:#FFFFFF;
    padding: 2% 10% 0px 10%;
    text-align: center;
    margin: auto;
}
 
.testimoni-text p:nth-child(1){
    font-weight:bold;
    color:#1d1c1c;
    font-size:30px;
    line-height:0px;
}
 
.testimoni-text{
    margin:70px 0px;
}
 
.testimoni-col{
    display:flex;
    justify-content:space-between;
}
 
.testimoni-1,.testimoni-2{
    flex-basis: 44%;
    border-radius: 50px;
    margin-bottom: 5%;
    text-align: left;
    background: #f4f2f4;
    padding: 25px;
    cursor: pointer;
    display: flex;
    width: 500px;
    box-shadow: 2px 2px 12px rgba(0,0,0,0.2);   
}
 
.testimoni-col img{
    height: 60px;
    margin-left: 5px;
    margin-right: 30px;
    margin-top: 20px;
    border-radius: 50px;
}
 
.testimoni-col p{
    padding: 0;
}
 
.testimoni-col h3{
    margin-top: 15px;
    text-align: left;
}
 
.testimoni-col .fas, .testimoni-col .far{
    color: #f44336;
}
 
footer p{
    font-family: calibri;
}
 
footer p:nth-child(1){
    font-size: 30px;
    font-weight:bold;
    color:#FFFFFF;
    line-height:10px;
}
 
footer p:nth-child(2){
    font-size: 16px;
    color:#7e7d7d;
    width:600px;
    text-align: center;
}
 
footer{
    height:300px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    background-color: #191919;
}
 
.social-icons a{
    width:40px;
    height:40px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color:#e6e3e3;
    margin:20px 10px;
    border-radius:50%;
}
 
.social-icons{
    display: flex;
     
}
 
.social-icons i,.social i{
    color:#000000;
}
 
.social-icons a:hover{
    background-color:#000000;
    box-shadow:2px 2px 12px rgba(0,0,0,0.2);
    transition:all ease 0.5s;
}
 
.social-icons a:hover i,
.social a:hover i{
    color:#FFFFFF;
    transition:all ease 0.5s;
}
  
.copyright{
    color:#565555;
    font-size: 15px;
    position: absolute;
    left:50%;
    bottom:10px;
    transform: translateX(-50%);
}
.social{
    position: fixed;
    top:50%;
    right:0px;
    transform:translateY(-50%);
}
 
.social a{
    display: flex;
    justify-content: center;
    align-items: center;
    width:50px;
    height:50px;
    margin:0px;
    padding: 0px;
    line-height:0px;
    background-color:#FFFFFF;
    border:1px solid #CBCBCB;
    box-shadow:2px 2px 12px rgba(0,0,0,0.2);
}
 
.social a:hover{
    background-color:#000000;
    transition:all ease 0.5s;
}
 
.social a:hover{
    background-color:#000000;
    transition:all ease 0.5s;
}
 
.social i{
    font-size:20px;
    color:#2B2B2B;
}

html{
    scroll-behavior: smooth;
}

  /* Tampilan dasar modal */
  #modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
  }

  /* Tampilan form di dalam modal */
  #modal form {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 300px;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
  }

  /* Tampilan label pada form */
  #modal form label {
    margin-bottom: 10px;
    font-weight: bold;
  }

  /* Tampilan input pada form */
  #modal form input,
  #modal form select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  /* Tampilan tombol pada form */
  #modal form button {
    width: 100%;
    padding: 8px;
    margin-top: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  /* Tampilan tombol Kembali pada form */
  #modal form button[type="button"] {
    background-color: #ccc;
    color: #333;
  }

  .banner{
    width: 100%;
    height: 100vh;
}

.banner video{
    position:absolute;
    object-fit: cover;
    width: 100%;
    height: 100%;
}

