
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <li class="navbar-brand"><img src="../img/agh.svg" width="45%" height="45%"></li>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      
<?php if ((isset($_SESSION['login'])) && (isset($_SESSION['logged_in'])))
{
?>
        <!-- Dodaj nowego pacjenta -->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="new_patient">
          <a class="nav-link" href="./add_new_patient.php">
            <i class="fa fa-plus" aria-hidden="true"></i>
            <span class="nav-link-text"><?php echo $menuNewPatient; ?></span>
          </a>
        </li>
        <!-- Tabela pacjentów -->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="home">
          <a class="nav-link" href="./home.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text"><?php echo $menuPatientTable; ?></span>
          </a>
        </li>
<?php if (isset($_SESSION['patient_id'])){?>

		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="demogr">
          <a class="nav-link" href="./demografic_data.php">
            <i class="fa fa-address-card-o"></i>
            <span class="nav-link-text"><?php echo $menuDemograficData; ?></span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="med_hist">
          <a class="nav-link" href="./medical_history.php">
            <i class="fa fa-heartbeat"></i>
            <span class="nav-link-text"><?php echo $menuMedHistory; ?></span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="diagn">
          <a class="nav-link" href="./diagnostics.php">
            <i class="fa fa-stethoscope"></i>
            <span class="nav-link-text"><?php echo $menuDiagnostic; ?></span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="treat">
          <a class="nav-link" href="./treatment.php">
            <i class="fa fa-medkit"></i>
            <span class="nav-link-text"><?php echo $menuTreatment; ?></span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="results">
          <a class="nav-link" href="./resent_results.php">
            <i class="fa fa-user-md"></i>
            <span class="nav-link-text"><?php echo $menuResentResult; ?></span>
          </a>
        </li>  
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="clinimetrics">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#clinimetrics_down" data-parent="#exampleAccordion">
            <i class="fa fa-wheelchair"></i>
            <span class="nav-link-text"><?php echo $menuClinimetrics; ?></span>
          </a>
          <ul class="sidenav-second-level collapse" id="clinimetrics_down">
            <li>
              <a href="./EDSS.php"><?php echo $menuEDSS; ?></a>
            </li>
            <li>
              <a href="./amb_indx.php"><?php echo $menuAmbIndx; ?></a>
            </li>
            <li>
              <a href="./MSFC.php"><?php echo $menuMSFC; ?></a>
            </li>
            <li>
              <a href="./VFT_SDMT.php"><?php echo $menuVFT_SDMT; ?></a>
            </li>
            <li>
              <a href="./BDI_FSS_MFIS.php"><?php echo $menuBDI_FSS; ?></a>
            </li>
          </ul>
        </li>
        <?php }?>
        <!-- Statystyka-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="statistic.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text"><?php echo $menuStats; ?></span>
          </a>
        </li>
<?php }
/*
 * Opcje dostępne przy niezalogowanym użytkowniku
 * PDF: Stwardnienie Rozsiane
 * PDF: O Rejestrze
 * Opcja: zarejestruj się 
 */
if ((!isset($_SESSION['login'])) && (!isset($_SESSION['logged_in'])))
{
?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="https://pl.wikipedia.org/wiki/Stwardnienie_rozsiane">
            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
            <span class="nav-link-text"><?=$menuSM?></span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="../pages/register.php">
            <i class="fa fa-user-plus" aria-hidden="true"></i>
            <span class="nav-link-text"><?=$menuRegister?></span>
          </a>
        </li>  
<?php }?>   
      </ul>
<!-- Strzałka pokazująca/chowająca menu po lewej stronie -->     
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      
<!-- Tytuł -->      
      <ul class="navbar-nav">
      	<li class="nav-item">
      	<a class="nav-link" href="../index.php">
            <h4><?=$title?></h4></a>
        </li>
        </ul>
        
      <ul class="navbar-nav ml-auto">
<!-- Opcja wyloguj - dostępna tylko przy zalogowanym użytkowniku -->
<?php if ((isset($_SESSION['login'])) && (isset($_SESSION['logged_in'])))
{
?>    
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#logout">
            <i class="fa fa-fw fa-sign-out"></i><?=$menuLogout?></a>
        </li>
<?php 
}?>

<!-- Opcja zaloguj - dostępna tylko przy niezalogowanym użytkowniku -->
<?php if ((!isset($_SESSION['login'])) && (!isset($_SESSION['logged_in'])))
{
?>    
        <li class="nav-item">
          <a class="nav-link" href="../index.php">
            <i class="fa fa-fw fa-sign-in"></i><?=$menuLogin?></a>
        </li>
<?php 
}?>

<!-- TODO (na razie zmiana w kodzie html_tools/varName.php) LANGUAGE CHANGE FOR POLISH -->
<?php 
/*
if ((isset($lang)) && ($lang=='eng'))
{
?> 
        <li class="nav-item">
          <a class="nav-link" href="#">
				<img border="0" alt="W3Schools" src="../img/pl.png"></a>
        </li>
<?php 
}?>
<!-- LANGUAGE CHANGE FOR ENGLISH -->
<?php if ((isset($lang)) && ($lang=='pl'))
{
?> 
        <li class="nav-item">
          <a class="nav-link" href="#">
				<img border="0" alt="W3Schools" src="../img/eng.png"></a>
        </li>
<?php 
}
*/
?>
      </ul>
    </div>
  </nav>
<!-- Koniec nagłówka -->
<!-- Początek strony -->
  <div class="content-wrapper">
  <div class="container-fluid">

<!-- Container (białe tło do tekstu), koniec diva na początku pliku pages/footer.php -->
  <div class="card mb-3">
  