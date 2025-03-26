<?php
function style()
{
  echo "  <style>
    body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 90vh;
      background-color: #f4f4f4;
    }

    .container {
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
    }

    @media (max-width: 700px) {
      .container {
        flex-direction: column;
      }
    }

    .matrix-container {
      display: grid;
      grid-template-columns: repeat(2, 80px);
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }

    input,
    .result {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 40px;
      margin: 5px;
      text-align: center;
      border: 1px solid #000;
      border-radius: 10px;
    }

    .op {
      margin: 10px;
      color: rgba(80, 80, 80);
      font-size: 40px;
    }

    .btn {
      margin-top: 30px;
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
    }
    
    .btn input {
      color: rgba(80, 80, 80);
      border-radius: 30px;
      border-color: grey;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    .btn input {
      width: 80px;
      color: rgba(80, 80, 80);
      border-radius: 30px;
      border-color: grey;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    .btn input:hover {
      background-color:rgb(195, 197, 196);
      color: rgba(40, 40, 40);
    }
    .btn input:active {
      background-color:rgb(183, 174, 165);
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  </style>";
}
function matrixAddition($matrix)
{
  $result = array($matrix[0] + $matrix[4], $matrix[1] + $matrix[5], $matrix[2] + $matrix[6], $matrix[3] + $matrix[7]);
  return $result;
}
?>