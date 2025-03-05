<html>

<head>
  <style>
    .container {
      display: flex;
      flex-direction: row;
    }

    .container div {
      margin: 10px;
      font-size: 1.1rem;
    }
  </style>
</head>

<body>
  <form action="no1.php" method="post">
    <div class="container">
      <div>
        Nama<br><br>
        Nrp<br><br>
        Nilai angka<br><br>
        <?php if (isset($_POST["submit"]))
          echo "Nilai huruf <br><br>"; ?>
        <?php if (isset($_POST["submit"]))
          echo "Predikat <br><br>"; ?>
        <input class="input" type="submit" name="submit" value="Submit">
      </div>
      <div>
        <input class="input" type="text" name="nama" required>
        <?php if (isset($_POST["submit"]))
          echo $_POST["nama"]; ?><br><br>

        <input class="input" type="number" name="nrp" required>
        <?php if (isset($_POST["submit"]))
          echo $_POST["nrp"]; ?><br><br>

        <input class="input" type="number" name="nilaiAngka" required>
        <?php if (isset($_POST["submit"]))
          echo $_POST["nilaiAngka"]; ?><br><br>

        <?php
        if (isset($_POST["submit"])) {
          echo 
          '<style>.input {
            display: none;
          }</style>';
        }
        $nilaiHuruf = "";
        $predikat = "";
        if (isset($_POST["submit"])) {
          if ($_POST["nilaiAngka"] >= 0 && $_POST["nilaiAngka"] <= 40) {
            $nilaiHuruf = "E";
            $predikat = "Sangat Tidak Memuaskan";
          } else if ($_POST["nilaiAngka"] >= 41 && $_POST["nilaiAngka"] <= 55) {
            $nilaiHuruf = "D";
            $predikat = "Tidak Memuaskan";
          } else if ($_POST["nilaiAngka"] >= 56 && $_POST["nilaiAngka"] <= 60) {
            $nilaiHuruf = "C";
            $predikat = "Cukup";
          } else if ($_POST["nilaiAngka"] >= 61 && $_POST["nilaiAngka"] <= 65) {
            $nilaiHuruf = "BC";
            $predikat = "Lebih dari Cukup";
          } else if ($_POST["nilaiAngka"] >= 66 && $_POST["nilaiAngka"] <= 70) {
            $nilaiHuruf = "B";
            $predikat = "Baik";
          } else if ($_POST["nilaiAngka"] >= 71 && $_POST["nilaiAngka"] <= 80) {
            $nilaiHuruf = "AB";
            $predikat = "Sangat Baik";
          } else if ($_POST["nilaiAngka"] >= 81 && $_POST["nilaiAngka"] <= 100) {
            $nilaiHuruf = "A";
            $predikat = "Sempurna";
          }
        }
        ?>

        <?php if (isset($_POST["submit"]))
          echo "$nilaiHuruf <br><br>"; ?>

        <?php if (isset($_POST["submit"]))
          echo "$predikat <br><br>"; ?>
      </div>
    </div>
  </form>
</body>

</html>