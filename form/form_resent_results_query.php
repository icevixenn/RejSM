<?php 
/*
 * Query do bazy danych o informacje o aktualnych wynikach pacjenta.
 * Dostępne dane:
 * 1) EDSS, Ambulation Index
 * 2) MSFC (T25FT, 9HPT-DH, 9HPT-NDH, PASAT
 * 3) VFT, SDMT
 * 4) BDI-II, FSS, MFIS
 */
require_once '../db_tools/queryDB.php';
require_once "../lang/$lang/form_resent_results.php";
	
// EDSS
$query_EDSS = "SELECT Result FROM AT_EDSS WHERE ID = '$patient_id' ORDER BY Date DESC LIMIT 1";
$EDSS_result = queryDB($query_EDSS);
$EDSS_result = $EDSS_result ->fetch_assoc();
$EDSS = $EDSS_result['Result'];

// Ambulation Index
$query_AI = "SELECT result FROM AT_amb_indx WHERE ID = '$patient_id' ORDER BY Date DESC LIMIT 1";
$AI_result = queryDB($query_AI);
$AI_result = $AI_result->fetch_assoc();
$AI = $AI_result['result'];

// T25FT
$query_T25FT= "SELECT I_try, II_try FROM AT_MSFC_25FWT WHERE ID = '$patient_id' ORDER BY date DESC LIMIT 1";
$T25FT_result = queryDB($query_T25FT);
$T25FT_result = $T25FT_result->fetch_assoc();
$T25FT = ($T25FT_result['I_try'] + $T25FT_result['II_try'])/2;
$T25FT = $T25FT/2;

// 9HPT
$query_H9PT = "SELECT I_dh, II_dh, I_ndh, II_ndh FROM AT_MSFC_9HPT WHERE ID = '$patient_id' ORDER BY date DESC LIMIT 1";
$H9PT = queryDB($query_H9PT);
$H9PT = $H9PT->fetch_assoc();
$H9PT_dh = ($H9PT['I_dh'] + $H9PT['II_dh'])/2;
$H9PT_ndh = ($H9PT['I_ndh'] + $H9PT['II_ndh'])/2;

// PASAT
$query_PASAT = "SELECT score FROM AT_MSFC_PASAT WHERE ID = '$patient_id' ORDER BY date DESC LIMIT 1";
$PASAT_result = queryDB($query_PASAT);
$PASAT_result = $PASAT_result ->fetch_assoc();
$PASAT = $PASAT_result['score'];

// VFT
$query_VFT = "SELECT snellen FROM AT_VFT WHERE ID = '$patient_id' ORDER BY date DESC LIMIT 1";
$VFT_result = queryDB($query_VFT);
$VFT_result = $VFT_result->fetch_assoc();
$VFT = $VFT_result['snellen'];

// SDMT
$query_SDMT = "SELECT Result FROM AT_SDMT WHERE ID = '$patient_id' ORDER BY Date DESC LIMIT 1";
$SDMT_result = queryDB($query_SDMT);
$SDMT_result = $SDMT_result->fetch_assoc();
$SDMT = $SDMT_result['Result'];

// BDI-II
$query_BDI = "SELECT Result FROM AT_BDI WHERE ID = '$patient_id' ORDER BY Date DESC LIMIT 1";
$BDI_result = queryDB($query_BDI);
$BDI_result = $BDI_result->fetch_assoc();
$BDI = $BDI_result['Result'];

// FSS
$query_FSS = "SELECT Result FROM AT_FSS WHERE ID = '$patient_id' ORDER BY Date DESC LIMIT 1";
$FSS_result = queryDB($query_FSS);
$FSS_result = $FSS_result ->fetch_assoc();
$FSS = $FSS_result['Result'];

// MFIS
$query_MFIS = "SELECT result FROM AT_MFIS WHERE ID = '$patient_id' ORDER BY date DESC LIMIT 1";
$MFIS_result = queryDB($query_MFIS);
$MFIS_result = $MFIS_result ->fetch_assoc();
$MFIS = $MFIS_result['result'];

?>

