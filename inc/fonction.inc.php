<?php
//---------------------------------------------------------------
function executeRequete($req)
{
    global $mysqli;
    $resultat = $mysqli->query($req);
    if(!$resultat)
    {
        die("🛑 Une erreur est survenu sur la reqête SQL. <br>Message de l'erreur : " . $mysqli->error . "<br>Code : " . $req);
    }
    return $resultat;
}
//---------------------------------------------------------------
function debug($var, $mode = 1)
{
    echo '<div style="background: orange; padding: 5px;">';
    // Génère un contexte de debogage
    $trace = debug_backtrace();
    // echo '<pre>'; print_r($trace); echo '</pre><hr>';
    // Retirer un élément du tableau
    $trace = array_shift($trace);
    echo "Debug demandé dans le fichier : $trace[file] à la ligne $trace[line].";
    if($mode === 1)
    {
        echo '<pre>'; print_r($var); echo '</pre>';
    }
    else
    {
        echo '<pre>'; var_dump($var); echo '</pre>';
    }
    echo '</div>';
}
//---------------------------------------------------------------
function internauteEstConnecte()
{
    if(!isset($_SESSION['membre']))
    {
        return false;
    }
    else
    {
        return true;
    }
}
//---------------------------------------------------------------
function internauteEstConnecteEtEstAdmin()
{
    if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}
