<?php
Class NewsModel extends Core\mvc\Model{


public function NewsIndex(){

$news =  $this->db->query('SELECT * FROM news');
return $news->fetch();
}
public function NewsLimit($page){
	if($page<1){
		$page = 1;
	}

	return  $this->db->query('SELECT * FROM news ORDER BY id DESC LIMIT '.(($page-1)*\Core\Core::get()->config['News']['page']).','.\Core\Core::get()->config['News']['page'].'')->fetchAll();

}

public function NewsNumber(){
		$data =  $this->db->query("SELECT COUNT(*) FROM news")->fetch();
		return $data['COUNT(*)'];
}
public function CommentairesLimit($page){

	if($page<1){
		$page = 1;
	}
/** Pagination commentaires prochaine version ***/
	// $request =  $this->db->prepare('SELECT * FROM commentaires WHERE idnews =:idnews ORDER BY id DESC LIMIT'.(($page-1)*\Core\Core::get()->config['News']['commentaires']).','.\Core\Core::get()->config['News']['commentaires'].'');
   $request =  $this->db->prepare('SELECT * FROM commentaires WHERE idnews =:idnews ORDER BY id DESC ');

     $request->bindValue('idnews',$page);
     $request->execute();
    return  $request->fetchAll();

}

public function NewsComment($id){
  
   $request =  $this->db->prepare('SELECT * FROM news WHERE id =:id ');

     $request->bindValue('id',$id);
     $request->execute();
    return  $request->fetchAll();
}

public  function NumNewsComment($id){
if($id<1){
		$id = 1;
	}

	$request = $this->db->prepare('SELECT COUNT(idnews) FROM commentaires  WHERE idnews = :idnews ');
	$request->bindValue(':idnews',$id);
	$request->execute();
	$data = $request->fetch();
	return $data['COUNT(idnews)'];

}
public function modelComment($idnews,$contenu,$auteur){

$data = $this->db->prepare('INSERT INTO commentaires(idnews,contenu,auteur) VALUES (:idnews,:contenu,:auteur)');
        $data->execute(array(
            'idnews' => $idnews,
            'contenu' => $contenu,
            'auteur' => $auteur,
       
        ));

}
public function Vote(){
   return  $this->db->query('SELECT * FROM accounts ORDER BY vote DESC LIMIT 3')->fetchAll();
    
}
public function connecter(){
	  $data =   $this->db->prepare('SELECT COUNT(logged) FROM accounts WHERE logged = :logged');
	  $data->bindValue('logged',1);
	  $data->execute();
	  $req = $data->fetch();
	  return $req['COUNT(logged)'];

      
}
public function Equipe(){
	return $this->db->query('SELECT * FROM equipe')->fetchAll();
}

}