<html>

<!-- Hoite Prins
Quick en dirty
Geen enkele vorm van error-checking of security -->

<?php
$user = "root";
$pass = "toor";
$connect = mysqli_connect('localhost',$user,$pass,'db_name');

if(isset($_POST['submit'])) {
$voornaam 	= $_POST['voornaam'];
$achternaam 	= $_POST['achternaam'];
$tel 		= $_POST['telefoonnummer'];

function toevoegenNaam($connect,$voornaam,$achternaam,$tel){
		$querytoevoegen = "INSERT INTO adresboek (voornaam, achternaam, telefoonnummer) VALUES ('$voornaam', '$achternaam', '$tel')";
		mysqli_query($connect,$querytoevoegen);
}
toevoegenNaam($connect, $voornaam, $achternaam, $tel);
}
?>

<body>
	<form action='index.php' method='POST'>
		<input type="text" name="voornaam" value="voornaam">
		<input type="text" name="achternaam" value="achternaam">
		<input type="text" name="telefoonnummer" value="telefoonnummer">
		<input type="submit" name="submit">
	</form>
<?php
$query = mysqli_query($connect, "SELECT * FROM adresboek" );
echo 	"<table border='1'>
			<tr>
			<th>Voornaam</th>
			<th>Achternaam</th>
			<th>Telefoonnummer</th>
			</tr>";

	while($row = mysqli_fetch_array($query))
  	{
  		echo "<tr>";
   		echo "<td>" . $row['voornaam'] . "</td>";
  		echo "<td>" . $row['achternaam'];
  		echo "<td>" . $row['telefoonnummer'] . "</td>";
  		echo "</tr>";
  	}
		echo "</table>";
?>
</body>
</html>
