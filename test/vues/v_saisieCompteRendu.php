		<?php
	
	// php1_1.php : support de cours PHP (passage de paramètres via l'adresse URL/mthode GET)
	// créé le : 6 février 2014 par P.Blain	
	// modifié : 03/05/2018 par A.FARSI 
	
/*================================================================================================== compte rendu (3)*/
echo ("
		
			
					<div style='display: block; margin-left: -600px; margin-top: -400px;'>
						<div id='contenu'>
				<br><br><h2 align=center>SAISIES COMPTE RENDU </h2><br><br>	
				<div style='display: block; margin-left: 10px; margin-top: 10px;'>
					<form>
						<p>Veuillez choisir un type de practicien :</p>
						<div>
							<input type='radio' id='Practicien1' name='practicien' value='Médecin Hospitalier'>
							<label for='Practicien1'>Médecin Hospitalier</label><br>
	
							<input type='radio' id='Practicien2' name='practicien' value='Médecine de Ville'>
							<label for='Practicien2'>Médecine de Ville</label><br>
	
							<input type='radio' id='Practicien3' name='practicien' value='Pharmacien Hospitalier'>
							<label for='Practicien3'>Pharmacien Hospitalier</label><br>
				
							<input type='radio' id='Practicien4' name='practicien' value='Pharmacien Officine'>
							<label for='Practicien4'>Pharmacien Officine</label><br>
				
							<input type='radio' id='Practicien5' name='practicien' value='Personnel de santé'>
							<label for='Practicien5'>Personnel de santé</label><br>
						</div>
						<div>
							<br><button type='submit'>Soumettre</button>
						</div>
					</form>
				</div>
				<div style='display: block; margin-left: 425px; margin-top: -230px;'>
					<form>
						<p>Vos observations : <br><TEXTAREA name='nom' rows=6 cols=40></TEXTAREA>
					</form>
						<p>Date de la visite : <input type='date' name='DateVisite'></p>
						<p>Motif de la visite :</p>
						<select>
							<option value=''>Motif</option>
							<option value='Actualisationannuelle'>Actualisation annuelle</option>
							<option value='RapportAnnuel'>Rapport Annuel</option>
							<option value='Baisseactivité'>Baisse activité</option>
						</select>
				</div>
							<div style='display: block; margin-left: 10px; margin-top: -220px;'>
							<form name='choixP' action='index.php?choixTraitement=praticien&action=voir' method='post'>
								<p>Nom et Prenom</p>
								<select name='lstPraticiens' STYLE='width:350px;' onchange='submit()'>");
if (!isset($_REQUEST['lstPraticiens'])) {$choix = 'premier';} else {$choix =$_REQUEST['lstPraticiens'];}
$i=1; 
foreach ($lesLignes as $uneLigne) 
{	
	if($uneLigne['pNum'] == $choix or $choix == 'premier')
	{
		echo ("								<option selected value=\"".$uneLigne['pNum']."\">".$uneLigne['pNom']." ".$uneLigne['pPrenom']."</option>\n		");
		$choix = $uneLigne['pNum'];
		$noL=$i;
	}
	else
	{
		echo "								<option value=\"".$uneLigne['pNum']."\">".$uneLigne['pNom']." ".$uneLigne['pPrenom']."</option>\n";
		$i=$i+1;
	}
}	           
echo ('   
						
								</select>
							</form>
						</div>
					</div>
				</div>
			</fieldset>
	');
?>