<?php
  function customHeader(){
    echo 
    "<p>========================<br>
    PRIVATE HOMEPAGE<br>
    ========================</p>";
  };
  function customFooter(){
    echo 
    "<p>========================<br>
    Created by Dechiviel<br>
    ========================</p>";
  };
  function calc($data, $operator){
    if ($operator == '+') {
      $result = $data[0] + $data[1];
    } 
    else if ($operator == '-') {
      $result = $data[0] - $data[1];
    } 
    else if ($operator == '*') {
      $result = $data[0] * $data[1];
    } 
    else if ($operator == '/') {
      $result = $data[0] / $data[1];
    } 
    else if ($operator == '%') {
      $result = $data[0] % $data[1];
    } 
    else {
      $result = "Invalid operator";
    }
    return $result;
  };
?>