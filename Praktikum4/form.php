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
  <?php
    $nameRegex = '/^([A-Z][a-z]+\s)*([A-Z][a-z]+)$/';
    $nrpRegex = '/^[0-9]{7}0((3[1-9])|([4-5][0-9])|60)$/';
    $dateRegex = '/^(((0[1-9]|[1-2][0-9]|3[0-1])-Jan)|((0[1-9]|[1-2][0-9]|)-Feb)|((0[1-9]|[1-2][0-9]|3[0-1])-Mar)|((0[1-9]|[1-2][0-9]|30)-Apr)|((0[1-9]|[1-2][0-9]|3[0-1])-Mei)|((0[1-9]|[1-2][0-9]|30)-Jun)|((0[1-9]|[1-2][0-9]|3[0-1])-Jul)|((0[1-9]|[1-2][0-9]|3[0-1])-Agu)|((0[1-9]|[1-2][0-9]|30)-Sep)|((0[1-9]|[1-2][0-9]|3[0-1])-Okt)|((0[1-9]|[1-2][0-9]|30)-Nov)|((0[1-9]|[1-2][0-9]|3[0-1])-Des))-\d\d\d\d$/';
  ?>
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
        <input type="text" id="tanggalLahir" name="tanggalLahir" placeholder="dd-Mmm-yyyy">
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
      </div>
    </div>
  </form>

  <?php
    if(isset($_POST['submit'])){
      $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
      preg_match($nameRegex, $nama) ? $nama .= ' ' . '(VALID)': $nama .= ' ' . "(INVALID NAME)";
      $nrp = isset($_POST['nrp']) ? $_POST['nrp'] : '';
      preg_match($nrpRegex, $nrp) ? $nrp .= ' ' . '(VALID)' : $nrp .= ' ' . "(INVALID NRP)";
      $kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';
      $kelamin = isset($_POST['kelamin']) ? $_POST['kelamin'] : '';
      $agama = isset($_POST['agama']) ? $_POST['agama'] : '';
      $tempatLahir = isset($_POST['tempatLahir']) ? $_POST['tempatLahir'] : '';
      $tanggalLahir = isset($_POST['tanggalLahir']) ? $_POST['tanggalLahir'] : '';
      preg_match($dateRegex, $tanggalLahir) ? $tanggalLahir .= ' ' . '(VALID)' : $tanggalLahir .= ' ' . "(INVALID DATE)";
      $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
      $sd = isset($_POST['sd']) ? $_POST['sd'] : '';
      $smp = isset($_POST['smp']) ? $_POST['smp'] : '';
      $sma = isset($_POST['sma']) ? $_POST['sma'] : '';
      $email = isset($_POST['email']) ? $_POST['email'] : '';
      $homepage = isset($_POST['homepage']) ? $_POST['homepage'] : '';
      $hobi = isset($_POST['hobi']) ? $_POST['hobi'] : '';
      $interest = isset($_POST['interest']) ? $_POST['interest'] : [];

      echo "<h1>Form Data</h1>";
      echo "<p>Nama: $nama</p>";
      echo "<p>NRP: $nrp</p>";
      echo "<p>Kelas: $kelas</p>";
      echo "<p>Jenis Kelamin: $kelamin</p>";
      echo "<p>Agama: $agama</p>";
      echo "<p>Tempat Lahir: $tempatLahir</p>";
      echo "<p>Tanggal Lahir: $tanggalLahir</p>";
      echo "<p>Alamat: $alamat</p>";
      echo "<p>Riwayat Pendidikan: </p>";
      echo "<p>SD: $sd</p>";
      echo "<p>SMP: $smp</p>";
      echo "<p>SMA: $sma</p>";
      echo "<p>Email: $email</p>";
      echo "<p>Homepage: $homepage</p>";
      echo "<p>Hobby: $hobi</p>";
      echo "<p>Interest: ";
      foreach($interest as $i){
      echo "$i ";
      }
      echo "</p>";
    }
  ?>
</body>
</html>