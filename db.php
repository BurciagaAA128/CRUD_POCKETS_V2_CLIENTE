<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'bd_pockets'
) or die(mysqli_erro($mysqli));

?>
