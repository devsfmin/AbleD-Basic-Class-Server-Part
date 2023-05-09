<?php

$conn = mysqli_connect(
        'localhost',
        'min',
        '0000',
        'members',
        '3306') or die ("Can't access DB");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL : " . mysqli_connect_error();
}
$sql = "SELECT VERSION()";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
print_r($row["VERSION()"]);

?>