<?php 
$baza = connectToDB();
$stmt = $baza->prepare("SELECT concat(H.city, ', ',H.name_hospital) AS name FROM AT_Hospital AS H");
$stmt->execute();
$results = $stmt->get_result();
while($hosp = $results->fetch_assoc()) {
	if($hosp['name'] === 'Kraków, AGH') {
		continue;
	}
	echo '<option value="'.$hosp['name'].'">'.$hosp['name'].'</option>';
}
$stmt->close();
?>