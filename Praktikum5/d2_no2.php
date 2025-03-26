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

    <?php
    if (isset($_POST['reset'])) {
      echo ".result{display:none;}";
    }
    ?>
  </style>
</head>

<body>
  <?php
  include 'function/functionForD2No2.php';
  customHeader();
  ?>
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
      <label for="operator">Operator</label>
      <input type="text" id="operator" name="operator" placeholder="+  -  *  /  %" required>
    </div>
    <br>
    <?php
    if (isset($_POST['submit'])) {
      echo "<div class='result'>Result: " . calc($_POST['data'], $_POST['operator']) . "<br><br></div>";
    }
    ?>
    <input type="submit" name="submit" value="Submit">
    <input type="reset" name="reset" value="Reset" onclick="window.location='d2_no2.php'">
  </form>
  <?php
  customFooter();
  ?>

</body>

</html>