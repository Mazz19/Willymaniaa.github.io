<?php
if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $content = $_POST['content'];
  
  echo "Titolo: " . $title . "<br>";
  echo "Contenuto: " . $content;
}
?>
