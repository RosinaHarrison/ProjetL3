<?php
// content="text/plain; charset=utf-8"
include ('src/jpgraph.php');//Si pas ca le graph ne s'affichera pas
include ("src/jpgraph_bar.php");// pour le barplot
// appel bd
include 'call_bd.php';

$annee=$_GET['annee'];
// contenue et legendes
$chaine= array();
$temps_parole=array();
$bdd = getBD_TDP(); //connexion BD

$res=$bdd->query('SELECT * FROM MEDIA WHERE MEDIA.annee ='.$annee);
while ($row = $res->fetch()){ // Ajouter année devant, c'est pour la légende
  $chaine[] = $row['rnomMed']; $temps_parole[] = $row['temp_parole'];
}

$largeur = 300;
$hauteur = 400;

// Initialisation du graphique
$graph = new Graph($largeur, $hauteur);
$graph->setScale("textlin");

// Ajouter une ombre au conteneur
$graph->SetShadow();



// Titre associé au graphe
$graph->title->Set("Temps de parole par chaine");

// Axe x  ********************************
//affichage des chaine et separation

$graph->xaxis->SetTickLabels($chaine); $graph->xgrid->Show(true,true);




// Create
$histo = new BarPlot($temps_parole);//Permet d'avoir l'histogramme
//$histo->SetLegend($chaine);




// ajouter le graphique histo au conteneur
$graph->Add($histo);




// Spécifier des couleurs personnalisées... #FF0000 ok


// Légendes qui accompagnent le graphique, ici chaque chaine avec sa couleur


// Position du graphique (0.5=centré)


// Type de valeur (pourcentage ou valeurs)



// Personnalisation des étiquettes pour chaque partie


// Personnaliser la police et couleur des étiquettes
$histo->value->SetColor('blue');

// Provoquer l'affichage
$graph->Stroke();


?>