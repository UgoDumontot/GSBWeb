
<!-- affichage du detail de la fiche agent / Derniere modification le 6 fevrier 2014 par Pascal BLAIN -->
<?php 
$titre="caract&eacute;ristiques du praticien";
echo (' 	<div id="fiche">
			<ul class="lesOnglets">	
				<li class="actif onglet" 	id="onglet1" onclick="javascript:Affiche(\'1\',3);">'.$titre.'</li>
				<li class="inactif onglet" 	id="onglet2" onclick="javascript:Affiche(\'2\',3);">Usagers suivis</li>
				<li class="inactif onglet" 	id="onglet3" onclick="javascript:Affiche(\'3\',3);">compte rendu</li>
			</ul>');
/*================================================================================================== COORDONNEES (1) */
 $titre="Pr&eacute;nom";
 echo ("	
	 	<div style='display: block;' class='unOnglet' id='contenuOnglet1'> 
 			<table style='border: 0px solid white;'>
			<tr>
				<td style='border :0px;'>
				<fieldset><legend>Coordonn&eacute;es</legend>
					<table>
						<tr><th style='width:130px;'>Nom</th>			<td style='width:130px;'>".$lesInfosPraticien['nom']."</td> </tr>
						<tr><th>".$titre."</th>									<td>".$lesInfosPraticien['pNom']."</td> </tr>
						<tr><th>Adresse</th>									<td>".$lesInfosPraticien['pRue']."</td> </tr>
						<tr><th>Code postal</th>								<td>".$lesInfosPraticien['pCP']."</td> </tr>
						<tr><th>Ville</th>										<td>".$lesInfosPraticien['pVille']."</td> </tr>
						<tr><th>T&eacute;l&eacute;phone</th>			<td>".$tel."</td> </tr>
						<tr><th>Type</th>										<td>".$lesInfosPraticien['pCode']."</td> </tr>
						<tr><th>Notoriete</th>						<td>".$lesInfosPraticien['pNotoriete']."</td></tr>");
echo ("			</table>
				</fieldset>
				</td>	
				<td style='border :0px;'>
				<fieldset><legend>Territoire (".count($lesSecteurs)." secteurs)</legend> 
					<table>
						<tr><th style='width:130px;'>Code</th>		<td>".$lesInfosPraticien['pRegion']."</td> </tr>
						<tr><th>Libell&eacute;</th>							<td>".$lesInfosPraticien['pRegion']."</td> </tr>
					</table><br />
					<table>
						<tr><th  style='width:10px;'>&nbsp;</th><th>Nom du secteur</th><th>dossiers en cours</th><th>dossiers clos</th>	");
					$nbSuivis=0; $nbClos	=0;
					for ($lig=0; $lig < count($lesSecteurs); $lig++)
					{	$n=$lig + 1;
						echo "
						<tr><td> ".$n."</td>	<td>".$lesSecteurs[$lig]['sNumero']." ".$lesSecteurs[$lig]['sIntitule']."</td>";
if ($lesSecteurs[$lig]['nbSuivis']>0) {echo ("
					<td class='stNb'><a onclick=\"javascript:voirListe('$type','".$lesSecteurs[$lig]['sNumero']."','S'); return false;\">".$lesSecteurs[$lig]['nbSuivis']."</a></td>");} 
else  {echo ("
			 		<td class='stNb'>".$lesSecteurs[$lig]['nbSuivis']."</td>");}
if ($lesSecteurs[$lig]['nbClos']>0) {echo ("
					<td class='stNb'><a onclick=\"javascript:voirListe('$type','".$lesSecteurs[$lig]['sNumero']."','C'); return false;\">".$lesSecteurs[$lig]['nbClos']."</a></td>");} 
else  {echo ("
			 		<td class='stNb'>".$lesSecteurs[$lig]['nbClos']."</td>");}

echo "</tr>";
						$nbSuivis	+=$lesSecteurs[$lig]['nbSuivis'];
						$nbClos		+=$lesSecteurs[$lig]['nbClos'];
					}
					echo "
						<tr><th colspan=2> </th>
						<th style='text-align: center;'>".$nbSuivis."</th><th style='text-align: center;'>".$nbClos."</th> </tr>";
					
echo ("
					</table>
				</fieldset></td>
			</tr>
			</table>
		</div>");
		
/*================================================================================================== SUIVI (2)*/		
echo ("
		<div style='display: none;' class='unOnglet' id='contenuOnglet2'>
			<fieldset><legend>".$titre."</legend>
				<p><i>(");
{echo (count($lesUsagers)." dossiers)");}					

echo (")</i></p>
			<table style='border: 0px solid white;'>
				<tr><th class='controleLong'>Nom de l'usager</th><th>Genre</th><th class='controleLong'>Ville</th><th>n&eacute;(e) le</th><th>No CAF</th>
				<th>Secteur</th><th>Statut</th></tr>");	
		foreach ($lesUsagers as $uneLigne)		
		{ 	if($uneLigne['uHomme']==1) {$sexe="M";} else {$sexe="F";} 
echo("		<tr><td class='controleLong'><a href='index.php?choixTraitement=usagers&action=voir&lstUsagers=".$uneLigne['uId']."' style='text-decoration:none;'>".$uneLigne['uNom']." ".$uneLigne['uPrenom']."</a></td>
						<td style='text-align : center;'>".$sexe."</td>
						<td class='controleLong'>".$uneLigne['uCp']." ".$uneLigne['uVille']."</td>
						<td class='controle' style='text-align : center;'>".$uneLigne['uDateNaissance']."</td>
						<td class='controle' style='text-align : center;'>".$uneLigne['uNumCaf']."</td>
						<td class='controle' style='text-align : center;'>".$uneLigne['wSecteur']."</td>
						<td class='controle' style='text-align : center;'>".$uneLigne['uStatut']."</td>
				</tr>");
		}
echo ("		</table>
	  		</fieldset>
		</div>");

/*================================================================================================== compte rendu (3)*/
echo ("
		<div style='display: none;' class='unOnglet' id='contenuOnglet3'>
			<fieldset><legend>compte rendu</legend>
			echo '
		<br><br><h2 align=center>SAISIES COMPTE RENDU </h2><br><br>	
		<div style='display: block; overflow: auto;'><form>
		  <p>Veuillez choisir un type de practicien :</p>
		  <div>
			<input type='radio' id='Practicien1'
			 name='practicien' value='Médecin Hospitalier'>
			<label for='Practicien1'>Médecin Hospitalier</label><br>

			<input type='radio' id='Practicien2'
			 name='practicien' value='Médecine de Ville'>
			<label for='Practicien2'>Médecine de Ville</label><br>

			<input type='radio' id='Practicien3'
			 name='practicien' value='Pharmacien Hospitalier'>
			<label for='Practicien3'>Pharmacien Hospitalier</label><br>
			
			<input type='radio' id='Practicien4'
			 name='practicien' value='Pharmacien Officine'>
			<label for='Practicien4'>Pharmacien Officine</label><br>
			
			<input type='radio' id='Practicien5'
			 name='practicien' value='Personnel de santé'>
			<label for='Practicien5'>Personnel de santé</label><br>
			
		  </div>
		  <div>
			<br><button type='submit'>Soumettre</button>
		  </div>
		</form><br></div>
		<div style='display: block; margin-left: 950px; margin-top: -210px;'>
		<form>
		<p>Vos observations : <br><TEXTAREA name='nom' rows=6 cols=40></TEXTAREA>
		</form>
		<div style='display: block; margin-left: -300px; margin-top: -120px;'>
		<p>Date de la visite : <input type='date' name='DateVisite'></p>
		<p>Motif de la visite :</p>
		<select>
			<option value=''>Motif</option>
			<option value='Actualisationannuelle'>Actualisation annuelle</option>
			<option value='RapportAnnuel'>Rapport Annuel</option>
			<option value='Baisseactivité'>Baisse activité</option>
		</select>
		</div>
		
		<div style='display: block; margin-left: -600px; margin-top: -120px;'>
		
		");
		
	$nbL=count($lesLignes);	
 echo('
 <div id="contenu">
	<form name="choixP" action="index.php?choixTraitement=praticien&action=voir" method="post">
	<h2>'.$titre.'
	        <select name="lstPraticiens" STYLE="width:350px;" onchange="submit();">
	            ');
	            if (!isset($_REQUEST['lstPraticiens'])) {$choix = 'premier';} else {$choix =$_REQUEST['lstPraticiens'];}
	            $i=1; 
	            foreach ($lesLignes as $uneLigne) 
				{	
					if($uneLigne['pNum'] == $choix or $choix == 'premier')
						{echo "<option selected value=\"".$uneLigne['pNum']."\">".$uneLigne['pNom']." ".$uneLigne['pPrenom']."</option>\n	";
						$choix = $uneLigne['pNum'];
						$noL=$i;
						}
					else
						{echo "<option value=\"".$uneLigne['pNum']."\">".$uneLigne['pNom']." ".$uneLigne['pPrenom']."</option>\n		";
						$i=$i+1;}
				}	           
			    echo ("
	        </select>			
			</h2>
			

			</fieldset>
		</div>

	</div>");				
?>