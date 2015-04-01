<?php
session_start();
?>

<html>
<title>My Paradigms Assignment</title>

<body>

<form action="<?php print($_SERVER['SCRIPT_NAME'])?>" method="get">
<input type="text" value="" name="input_text">
<input type="submit" value="Submit" name="submitter">

</form>
<form>
<input type="submit" value="Save" name="saver" formaction=<?php 
$fh = fopen("entries.json", 'w');
if($fh === false)
	die("Failed to open entries.json for writing.");
else
{
	fwrite($fh, json_encode($entries));
	fclose($fh);
} ?>
>
</form>
<br>
<?php
if(!isset($_SESSION['entries']))
	$_SESSION['entries'] = array();

$entries = &$_SESSION['entries'];
$incoming_entry = htmlentities($_GET["input_text"]);
$entries []= $incoming_entry;
$arrlength = count($entries);

for ($i = $arrlength - 1; $i >= 0; $i--) {
	echo $entries[$i];
	echo "<br>";
}
//session_destroy();
?>
</body>
</html>
