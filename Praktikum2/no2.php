<html>

<body>
  <h2>
    Demo Perpindahan
  </h2>

  <?php
  if(isset($_POST["submit"])) echo 
  "<p>
    Menampilkan angka dari 0 sampai 10
  </p>
  <p>
    Pada hitungan ke " . $_POST["count"] . ", operasi yang dilakukan adalah " . $_POST["operasi"] . "
  </p>
  <p>
    Hasil Deret:
  </p>";
  else echo "<p>Tampilkan angka dari 0 sampai 10</p>";
  ?>

  <form class="form" action="" method="post">
    Lakukan <br>
    <input type="radio" id="continue" name="operasi" value="continue">
    <label for="continue">Continue</label><br>
    <input type="radio" id="break" name="operasi" value="break">
    <label for="break">Break</label><br>
    <input type="radio" id="return" name="operasi" value="return">
    <label for="return">Return</label><br>
    <input type="radio" id="exit" name="operasi" value="exit">
    <label for="exit">Exit</label><br><br>

    <label for="num">Pada hitungan ke</label>
    <input type="number" name="count" min="0" max="10"><br><br>

    <input type="submit" name="submit" value="submit">
  </form>

  <?php
  if(isset($_POST["submit"]))
  {
    echo 
    '<style>
      .form {
        display: none;
      }
    </style>';

    for($i = 0; $i < 11; $i++)
    {
      if($i == $_POST["count"])
      {
        if($_POST["operasi"] == "continue") continue;
        else if($_POST["operasi"] == "break") break;
        else if($_POST["operasi"] == "return") return;
        else if($_POST["operasi"] == "exit") exit;
      }
      echo "$i";
      if($i == 10) continue;
      echo ", ";
    }
    echo " : Looping selesai";
  }
  ?>
</body>

</html>