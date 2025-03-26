<html>

<head>
  <style>
    form div {
      display: flex;
      flex-direction: row;
    }

    div label {
      width: 80px;
    }

    div input {
      width: 105px;
    }
  </style>
</head>

<body>
  <h3>Input Data</h3>
  <form action="" method="post">
    <div>
      <label for="data0">Data 0</label>
      <input type="number" id="data0" name="data[]" required>
    </div>
    <div>
      <label for="data1">Data 1</label>
      <input type="number" id="data1" name="data[]" required>
    </div>
    <div>
      <label for="data2">Data 2</label>
      <input type="number" id="data2" name="data[]" required>
    </div>
    <br>
    <input type="submit" name="submit" value="Submit">
    <input type="reset" name="reset" value="Reset" onclick="window.location='d2_no1.php'">
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $data = $_POST['data'];
    $sum = array_sum($data);
    $average = $sum / count($data);
    echo "Average: $average<br>";

    $max = $data[0];
    foreach ($data as $x) {
      $x > $max ? $max = $x : $x;
    }
    echo "Max: $max<br>";
  }
  ?>
</body>

</html>