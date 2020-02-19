<?php 
/*
 * Zapytania do bazy danych do pliku form/form_demografic.php
 *
 */
require_once "../lang/$lang/form_demografic.php";
require_once '../db_tools/queryDB.php';


// Informacje o wybranym pacjencie o ID = $patient_id

$query_demografic = "SELECT 
					    AN.Inicialy,
						PL.name_gender,
					    DB.year, DB.month,DB.gender, DB.address, DB.province, DB.hand, DB.labor, 
						DB.education, DB.family_status, DB.employ, DB.SM_in_family, DB.job,
						MZ.name_address,
					    WO.name_province,
					    RE.name_hand,
					    PO.name_labor,
					    WY.name_education,
					    SR.name_family_status,
					    PZ.name_job,
					    ZA.name_employ,
					    SM.name_SM_in_family,
					    CASE
					        WHEN DB.date_death IS NULL THEN 'Nie dotyczy'
					    END AS 'Data zgonu'
					FROM
					    `AT_DemogData` AS DB
							JOIN
						01_FS_ID_anonim AS AN ON DB.ID = AN.ID_ID
							JOIN
						Name_gender AS PL ON DB.gender = PL.id_name_gender
							JOIN
						Name_address AS MZ ON DB.address = MZ.id_name_address
							JOIN
					    Name_province AS WO ON DB.province = WO.id_name_province
					        JOIN
						Name_hand AS RE ON DB.hand = RE.id_name_hand
							JOIN
						Name_labor AS PO ON DB.labor = PO.id_name_labor
							JOIN
						Name_education AS WY ON DB.education = WY.id_name_education
							JOIN
						Name_family_status AS SR ON DB.family_status = SR.id_name_family_status
							JOIN
						Name_job AS PZ ON DB.job = PZ.id_name_job
							JOIN
						Name_employ AS ZA ON DB.employ = ZA.id_name_employ
							JOIN
						Name_SM_in_family AS SM ON DB.SM_in_family = SM.id_name_SM_in_family
					WHERE
					    DB.ID =  $patient_id";

$result_demografic = queryDB($query_demografic);
$row_dem = $result_demografic->fetch_assoc();

$year = $row_dem['year'];
$month = $row_dem['month'];
$gender = $row_dem['gender'];
$address = $row_dem['address'];
$province = $row_dem['province'];
$hand = $row_dem['hand'];
$labor = $row_dem['labor'];
$education = $row_dem['education'];
$family_status = $row_dem['family_status'];
$employ = $row_dem['employ'];
$SM_in_family = $row_dem['SM_in_family'];
$job = $row_dem['job'];

$gender_name = $row_dem['name_gender'];
$address_name = $row_dem['name_address'];
$province_name = $row_dem['name_province'];
$hand_name = $row_dem['name_hand'];
$labor_name = $row_dem['name_labor'];
$education_name = $row_dem['name_education'];
$family_status_name = $row_dem['name_family_status'];
$employ_name = $row_dem['name_employ'];
$SM_in_family_name = $row_dem['name_SM_in_family'];
$job_name = $row_dem['name_job'];

// Nazewnictwo płci
$query_gender = "SELECT * FROM Name_gender";
$result_gender = queryDB($query_gender);
while($row_gender = $result_gender->fetch_assoc()){
	$id_gender[] = $row_gender['id_name_gender'];
	$name_gender[] = $row_gender['name_gender'];
}

// Nazewnictwo miejsca zamieszkania
$query_address = "SELECT * FROM Name_address";
$result_address= queryDB($query_address);
while($row_address = $result_address->fetch_assoc()){
	$id_address[] = $row_address['id_name_address'];
	$name_address[] = $row_address['name_address'];
}

// Nazewnictwo województw
$query_province = "SELECT * FROM Name_province";
$result_province = queryDB($query_province);
while($row_province = $result_province->fetch_assoc()){
	$id_prov[] = $row_province['id_name_province'];
	$name_prov[] = $row_province['name_province'];
}

// Nazewnictwo ręczności
$query_hand = "SELECT * FROM Name_hand";
$result_hand = queryDB($query_hand);
while($row_hand = $result_hand->fetch_assoc()){
	$id_hand[] = $row_hand['id_name_hand'];
	$name_hand[] = $row_hand['name_hand'];
}

// Nezewnictwo porodów
$query_labor = "SELECT * FROM Name_labor";
$SM_labor = queryDB($query_labor);
while($row_labor = $SM_labor->fetch_assoc()){
	$id_labor[] = $row_labor['id_name_labor'];
	$name_labor[] = $row_labor['name_labor'];
}

// Nezewnictwo edukacji
$query_education = "SELECT * FROM Name_education";
$SM_education = queryDB($query_education);
while($row_education = $SM_education->fetch_assoc()){
	$id_education[] = $row_education['id_name_education'];
	$name_education[] = $row_education['name_education'];
}

// Nazewnictwo statusu rodziny
$query_family = "SELECT * FROM Name_family_status";
$family = queryDB($query_family);
while($row_family = $family->fetch_assoc()){
	$id_family[] = $row_family['id_name_family_status'];
	$name_family[] = $row_family['name_family_status'];
}

// Nazewnictwo pracy
$query_job = "SELECT * FROM Name_job";
$result_job = queryDB($query_job);
while($row_job = $result_job->fetch_assoc()){
	$id_job[] = $row_job['id_name_job'];
	$name_job[] = $row_job['name_job'];
}

// Nazewnictwo zatrudnienia
$query_employ = "SELECT * FROM Name_employ";
$result_employ = queryDB($query_employ);
while($row_employ = $result_employ->fetch_assoc()){
	$id_employ[] = $row_employ['id_name_employ'];
	$name_employ[] = $row_employ['name_employ'];
}

// Nazewnictwo SM w rodzinie
$query_SM_in_family = "SELECT * FROM Name_SM_in_family";
$result_SM_in_family = queryDB($query_SM_in_family);
while($row_SM = $result_SM_in_family->fetch_assoc()){
	$id_SM[] = $row_SM['id_name_SM_in_family'];
	$name_SM[] = $row_SM['name_SM_in_family'];
}

?>