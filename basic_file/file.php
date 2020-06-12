<?php

echo __FILE__ . "<br>";
echo __LINE__ . "<br>";
echo __DIR__ . "<br>";
if (file_exists(__DIR__)){
    echo "Affirmative Result" . "<br>";
} else echo "No Results" . "<br>";
if (is_file(__DIR__)){
    echo "Affirmative! Path leads to a file." . "<br>";
} else echo "False! Path does not lead to a file" . "<br>";
if (is_dir(__DIR__)){
    echo "Affirmative! Path leads to a folder." . "<br>";
} else echo "False! Path does not lead to a folder" . "<br>";
echo file_exists(__DIR__) ? "Located" . "<br>" : "Not Located" . "<br>";
echo is_dir(__FILE__) ? "Yes a directory" . "<br>" : "No not a directory" . "<br>";
echo "<div><button><a href='index.php'>Home</a></button></button></div>";