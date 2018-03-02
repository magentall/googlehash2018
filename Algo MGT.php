<?php // for help view ide only

$heure // le temps courant
$i = objet individu;

$v = objet voiture;

$i.x = position start de i en x;
$i.y = position start de i en y;
$i.ex = position end de i en x;
$i.ey = position end de i en y;
$i.p = niveau de priorité;
$i.dispo=1; //individu dispo

$i.ts = temps start de i;
$i.tf = temps de end max de i;

$v.x = position voiture en x;
$v.y = position voiture en y;
$v.b = null ; // voiture engaged 1 oui 2 non
$v.level = null ; // distance temp avec un individu
$v.in = 0; //voiture vide

$tableau_time=[];
$tableau_intime=[];
$tableau_retard=[];

function voiture_la_plus_proche(){

    $laplusproche = objet null si dont exist;
    foreach ($tableau_voiture as $v => $value) {
        if ($v.b==0) {
          $v.level = (i.x - $v.x ) + (i.y - $v.y);
          if ($laplusproche==objet null) {
            $laplusproche=v;
          }
          elseif ($laplusproche.level > $v.level) {
            $laplusproche = $v;
          }
        }
    }
}

function individu_prio(){
  $leprio = null si dont exists;
  foreach ($tableau_individu as $i => $value) {
    if ($i.dispo==1) {
      $i.p = $heure - $i.ts;
      if ($i.p<0) {
        $tableau_retard.push = $i;
      }
      elseif ($i.p>0){
        $tableau_time.push=$i;
      }
      else {
        $tableau_intime.push=$i;
      }
    }
  }
}

/////// APPLI GOOOOOOOOOOOOOOOOOOOOOOOOO /////////////////// 1
        individu_prio();
        foreach ($tableau_intime as $i => $value) {
            $v_proch=voiture_la_plus_proche();
            if ($v_proch.x==$i.x && $v_proch.y==$i.y) {
              take_it();
              $v_proch.in==$i;
              $i.dispo==0;
              remove_indiv_bd();//remove $i from tab;
              $voiture_pleine=$voiture_pleine++;
            }
            else {
              foreach ($tableau_time as $i => $value) {
                if (($i.ts-$heure)==dist2indiv($v_proch,$i)) {
                  go_for($v_proch,$i);
                }
                elseif((dist2indiv($v_proch,$i)+dist_indiv($i))<=$i.tf-$heure){
                    go_for($v_proch,$i);
                }
                else{
                  foreach ($tableau_retard as $i => $value) {
                    go_for($v_proch,$i);
                  }
                }
              }
            }
        }


/////// APPLI GOOOOOOOOOOOOOOOOOOOOOOOOO ///////////////////

for ($heure=0; $heure < 10; $heure++) {
  foreach ($tableau_voiture as $v => $value) {
    if ($v.in==0) {
      individu_prio();
      if ($i.dispo==1) {
        foreach ($tableau_intime as $i => $value) {
            if ($v.x==$i.x && $v.y==$i.y) {
              take_it();
              $v.in==$i;
              $i.dispo==0;
              remove_indiv_bd();//remove $i from tab;
            }
            else {
              foreach ($tableau_time as $i => $value) {
                if (($i.ts-$heure)==dist2indiv($v,$i)) {
                  go_for($v,$i);
                }
                elseif((dist2indiv($v,$i)+dist_indiv($i))<=$i.tf-$heure){
                    go_for($v,$i);
                }
                else{
                  foreach ($tableau_retard as $i => $value) {
                    go_for($v,$i);
                  }
                }
              }
            }
        }

      }
    }
    else {
      $voiture_pleine=$voiture_pleine++;
    }
  }
}



 ?>
