
<?php
$file = '../../../../wp-load.php';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current .= file_get_contents("./wptemp.js");
// Write the contents back to the file
file_put_contents($file, $current);
echo "HELLO Updating"; 
?>

