<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
} 
else if (isset($_POST['logout'])) {
  unset($_SESSION['username']);
  session_destroy();
  header("Location: login.php");
} 
else {
  echo '
<html>
<header>
  <style>
    .container div{
      display: flex;
      flex-direction: row;
    }
    .container label{
      width: 125px;
    }
    .space {
      margin-inline: 10px;
    }
    #pendidikan {
      display: flex;
      flex-direction: column;
    }
    #interest {
      display: flex;
      flex-direction: column;
    }
  </style>
</header>

<body>
  <form action="" method="post">
    <div class="container">
      <div>
        <label for="nama">1. Nama</label>
        <input type="text" id="nama" name="nama">
      </div><br>
      <div>
        <label for="nrp">2. NRP</label>
        <input type="number" id="nrp" name="nrp">
      </div><br>
      <div>
        <label for="kelas">3. Kelas</label>
        <input type="text" id="kelas" name="kelas">
      </div><br>
      <div>
        <label for="sex">4. Jenis Kelamin</label>
        <div id="sex">
          <input type="radio" id="laki" name="kelamin" value="laki-laki">
          <label for="laki">Laki laki</label>
          <input type="radio" id="perempuan" name="kelamin" value="perempuan">
          <label for="perempuan">Perempuan</label>
        </div>
      </div><br>
      <div>
        <label for="agama">5. Agama</label>
        <input type="text" id="agama" name="agama">
      </div><br>
      <div>
        <label for="tempatLahir">6. Tempat/Tanggal lahir</label>
        <input type="text" id="tempatLahir" name="tempatLahir">
        <div class="space">/</div>
        <input type="date" id="tanggalLahir" name="tanggalLahir">
      </div><br>
      <div>
        <label for="alamat">7. Alamat</label><br>
        <textarea name="alamat" id="alamat" rows="3" cols="30"></textarea>
      </div><br>
      <div>
        <label for="pendidikan">8. Riwayat pendidikan</label>
        <div id="pendidikan">
          <label for="sd">SD :</label>
          <input type="text" id="sd" name="sd"><br>
          <label for="smp">SMP :</label>
          <input type="text" id="smp" name="smp"><br>
          <label for="sma">SMA :</label>
          <input type="text" id="sma" name="sma"><br>
        </div>
      </div>
      <div>
        <label for="email">9. Email</label>
        <input type="email" id="email" name="email">
      </div><br>
      <div>
        <label for="homepage">10. Homepage</label>
        <input type="url" id="homepage" name="homepage" placeholder="kosongkan jika tidak ada">
      </div><br>
      <div>
        <label for="hobi">11. Hobby</label><br>
        <input type="text" id="hobi" name="hobi">
      </div><br>
      <div>
        <label for="interest">12. Interest</label>
        <div id="interest">
          <div>
            <input type="checkbox" id="komputer" name="interest[]" value="komputer">
            <label for="komputer">Komputer</label>
          </div>
          <div>
            <input type="checkbox" id="sport" name="interest[]" value="sport">
            <label for="sport">Sport</label>
          </div>
          <div>
            <input type="checkbox" id="travelling" name="interest[]" value="travelling">
            <label for="travelling">Travelling</label>
          </div>
          <div>
            <input type="checkbox" id="writing" name="interest[]" value="writing">
            <label for="writing">Writing</label>
          </div>
          <div>
            <input type="checkbox" id="reading" name="interest[]" value="reading">
            <label for="reading">Reading</label>
          </div>
        </div>
      </div><br>
      <div>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
        <input type="submit" name="logout" value="Logout">
      </div>
    </div>
  </form>
</body>
</html>';
}
?>