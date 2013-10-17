<?php
Class BoutiqueModel extends Core\mvc\Model{

public  function stats($stats){
$analyze = array();
$contenu = array();
$statsitem = 	 array(
	'8d' => 'Tue la cible',
	'64' => 'Dommages Neutre',
	'61' => 'Dommages Terre',
	'63' => 'Dommages Feu',
	'60' => 'Dommages Eau',
	'62' => 'Dommages Air',
	'5c' => 'Vol de vie Terre',
	'5e' => 'Vol de vie Feu',
	'5b' => 'Vol de vie Eau',
	'5d' => 'Vol de vie Air',
	'65' => 'PA perdus à la cible',
	'6f' => 'PA',
	'80' => 'PM',
	'75' => 'PO',
	'70' => 'Dommages',
	'8a' => '% Dommages',
	'e1' => 'Dommages aux pièges',
	'e2' => '% Dommages aux pièges',
	'73' => 'Coups critiques',
	'9e' => 'Poids Portable',
	'b0' => 'Prospection',
	'b2' => 'Soins',
	'b6' => 'Créatures invocables',
	'ae' => 'Initiative',
	'6e' => 'Vie', //2 different things
	'7d' => 'Vitalité',
	'7c' => 'Sagesse',
	'76' => 'Force',
	'7e' => 'Intelligence',
	'7b' => 'Chance',
	'77' => 'Agilité',
	'99' => '-Vitalité',
	'9c' => '-Sagesse',
	'9d' => '-Force',
	'9b' => '-Intelligence',
	'98' => '-Chance',
	'9a' => '-Agilité',
	'd6' => '%Res Neutre',
	'd2' => '%Res Terre',
	'd5' => '%Res Feu',
	'd3' => '%Res Eau',
	'd4' => '%Res Air',
	'f4' => 'Res Neutre',
	'f0' => 'Res Terre',
	'f3' => 'Res Feu',
	'f1' => 'Res Eau',
	'f2' => 'Res Air',
	'fa' => '%Res Neutre(PvP)',
	'fe' => '%Res Terre(PvP)',
	'fd' => '%Res Feu(PvP)',
	'fb' => '%Res Eau(PvP)',
	'fc' => '%Res Air(PvP)',
	'108' => 'Res Neutre(PvP)',
	'104' => 'Res Terre(PvP)',
	'107' => 'Res Feu(PvP)',
	'105' => 'Res Eau(PvP)',
	'106' => 'Res Air(PvP)',
	'32b' => 'Tours',
);
$explodeur =  explode(',', $stats);
$countexp = count($explodeur);
for ($i=0; $i < $countexp ;$i++) { 
$statsitems = explode('#',$explodeur[$i]);
array_push($analyze,array(
'type'=>$statsitems[0],
'min'=>hexdec($statsitems[1]),
'max'=>hexdec($statsitems[2])
	));



if($analyze[$i]['max'] == 0){
array_push($contenu,array(
'contenu'=>'+'.$analyze[$i]['min']
	));
}else{
array_push($contenu,array(
'contenu'=>'+'.$analyze[$i]['min'].' à '.$analyze[$i]['max'].' '.$statsitem[$analyze[$i]['type']]
	));
}


}
return $contenu;
}

public function  itemCat($id){

	    $req = $this->db->prepare('SELECT * FROM `boutique` WHERE type=:id');
        $req->bindValue('id',$id);
        $req->execute();
        return  $req->fetchAll();

}
public function  itemStats($id){

	    $req = $this->db->prepare('SELECT stats FROM `boutique` WHERE type=:id');
        $req->bindValue('id',$id);
        $req->execute();
        return  $req->fetch();


}
public function Personnage($id){

   $request =  $this->db->prepare('SELECT * FROM personnages WHERE account =:id ');

     $request->bindValue('id',$id);
     $request->execute();
    return  $request->fetchAll();

}

public function  accounts($id){

	    $req = $this->db->prepare('SELECT * FROM `accounts` WHERE guid=:id');
        $req->bindValue('id',$id);
        $req->execute();
        return  $req->fetch();

}
public function  boutique($id){

	    $req = $this->db->prepare('SELECT * FROM `boutique` WHERE id=:id');
        $req->bindValue('id',$id);
        $req->execute();
        return  $req->fetch();

}
     public function updatepoints($id,$points){
        $req = $this->db->prepare('UPDATE accounts SET points = :points WHERE guid =  :id');
   return$req->execute(array(
    'points' => $points,
    'id'=>$id
    ));
     }
   public function senditem($playerid, $action, $nombre)
    {
        $req = $this->db->prepare('INSERT INTO live_action(playerid, action, nombre) VALUES(:playerid, :action, :nombre)');
        $req->execute(array(
            'playerid' => $playerid,
            'action' => $action,
            'nombre' => $nombre

        ));
    }
       public function numPersonnage($id)
    {

	$request = $this->db->prepare('SELECT COUNT(account) FROM personnages  WHERE guid = :id ');
	$request->bindValue(':id',$id);
	$request->execute();
	$data = $request->fetch();
	return $data['COUNT(account)'];
    }


}


    
  
