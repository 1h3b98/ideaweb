<?php
  
   include "C:/xampp/htdocs/siteweb/config.php" ;
 
   class avisC 
   {
   	
   	public function ajouter($avis) 
   	{
   		$sql="insert into avis(cin_client,reclamation) values(:cin_client,:reclamation)" ;
   		$db=config::getConnexion() ;
   		$req=$db->prepare($sql) ;
   		try
   		{
   			
   			$req->bindValue(':cin_client',$avis->getcin_client());
   			$req->bindValue(':reclamation',$avis->getreclamation());
   			$req->execute() ;
   			return true ;

   		}
	   	 catch(Exception $e) 
	   	{
	   		echo "Erreur".$e->getMessage();}
         }
         
         public function afficher()
         {
            $sql="select * from avis ";
         $db=config::getConnexion();
         try
         {
         $liste=$db->query($sql);
         return $liste;      
         }
         catch(Exception $e) 
         {echo "Erreur".$e->getMessage();
      }

   }
   
    public function supprimer($cin_client)
         {
            $sql="delete from avis where cin_client= :cin_client";
         $db=config::getConnexion();
         $req=$db->prepare($sql);
         $req->bindValue(':cin_client',$cin_client);
         try
         {
         $req->execute();
         }
         catch(Exception $e) 
         {echo "Erreur".$e->getMessage();
      }
    }
/*
    function modifier($compte,$cin_client){
    $sql="UPDATE compte SET E_mail=:E_mail,  mdp=:mdp, cin_client=:cin_client1 , nom=:nom,prenom=:prenom,adresse=:adresse,numero=:numero,type=:type WHERE compte.cin_client=:cin_client";
    
    $db = config::getConnexion();
    //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{    
        $req=$db->prepare($sql);
        $E_mail=$compte->getE_mail();
        $mdp=$compte->getmdp();
        $cin_client1=$compte->getcin_client();
        $nom=$compte->getnom();
        $prenom=$compte->getprenom();
        $adresse=$compte->getadresse();
        $numero=$compte->getnumero();
        $type=$compte->gettype();
    $datas = array(':E_mail'=>$E_mail, ':mdp'=>$mdp,':cin_client1'=>$cin_client1,':cin_client'=>$cin_client,':nom'=>$nom,':prenom'=>$prenom,':adresse'=>$adresse,':numero'=>$numero,':type'=>$type);
    //$req->bindValue(':E_mailn',$E_mailn);
    $req->bindValue(':E_mail',$E_mail);
    $req->bindValue(':mdp',$mdp);
    $req->bindValue(':cin_client1',$cin_client1);
    $req->bindValue(':cin_client',$cin_client);
    $req->bindValue(':nom',$nom);
    $req->bindValue(':prenom',$prenom);
    $req->bindValue(':adresse',$adresse);
    $req->bindValue(':numero',$numero);
    $req->bindValue(':type',$type);
    
    
            $s=$req->execute();
      
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }
    
  }
  function recuperer($cin_client){
    $sql="SELECT * from compte where cin_client=$cin_client";
    $db = config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
  }*/


}

?>






