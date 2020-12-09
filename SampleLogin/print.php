<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Registered Users</h1>
                <a href="admin.php"><i class="fas fa-sign-out-alt"></i>Go Back</a>
			</div>
		</nav>
</body>
</html>


<?php
require_once "db.php";
$table = 'accounts';
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit;
}

if($_SESSION["id"]!=16)
{
   header('Location: login.html');
   exit;
}

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS);

if (!$con)
    die("Can't connect to database");

if (!mysqli_select_db($con, $DATABASE_NAME))
    die("Can't select database");

// sending query
$result = mysqli_query($con, "SELECT `id`, `username`, `email` FROM {$table}");
if (!$result) {
    die("Query to show fields from table failed");
} 

$fields_num = mysqli_num_fields($result);

print "<table border='1'><tr>";
// printing table headers
for($i=0; $i<$fields_num; $i++)
{
    $field = mysqli_fetch_field($result);
    print "<td>{$field->name}</td>";
}
print "</tr>\n";
// printing table rows
while($row = mysqli_fetch_row($result))
{
    print "<tr>";

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
     foreach($row as $cell)
        print "<td>$cell</td>";

        print "</tr>\n";
}
mysqli_free_result($result);
?>

