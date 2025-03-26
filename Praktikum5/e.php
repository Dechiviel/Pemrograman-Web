<!DOCTYPE html>
<html lang="id">

<head>
  <?php
  include 'function/functionForE.php';
  style();
  ?>
</head>

<body>
  <form action="" method="post">
    <div class="container">
      <div class="matrix-container">
        <input type="number" name="matrix[]" placeholder="M1[1][1]" required>
        <input type="number" name="matrix[]" placeholder="M1[1][2]" required>
        <input type="number" name="matrix[]" placeholder="M1[2][1]" required>
        <input type="number" name="matrix[]" placeholder="M1[2][2]" required>
      </div>
      <div class="op">
        +
      </div>
      <div class="matrix-container">
        <input type="number" name="matrix[]" placeholder="M2[1][1]" required>
        <input type="number" name="matrix[]" placeholder="M2[1][2]" required>
        <input type="number" name="matrix[]" placeholder="M2[2][1]" required>
        <input type="number" name="matrix[]" placeholder="M2[2][2]" required>
      </div>
      <div class="op">
        =
      </div>
      <?php
      if (isset($_POST['submit'])) {
        $result = matrixAddition($_POST['matrix']);
      }
      ?>
      <div class="matrix-container">
        <div class="result">
          <div class="num"><?php if(isset($result)) echo $result[0]; ?></div>
        </div>
        <div class="result">
          <div class="num"><?php if(isset($result)) echo $result[1]; ?></div>
        </div>
        <div class="result">
          <div class="num"><?php if(isset($result)) echo $result[2]; ?></div>
        </div>
        <div class="result">
          <div class="num"><?php if(isset($result)) echo $result[3]; ?></div>
        </div>
      </div>
    </div>
    <div class="btn">
      <input type="submit" name="submit" value="Submit">
      <input type="reset" name="reset" value="Reset" onclick="window.location='e.php'">
    </div>
  </form>
</body>

</html>