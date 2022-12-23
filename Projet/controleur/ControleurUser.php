<?php

class ControleurUser {

	function __construct($action) {
		global $vues;

		try{

			switch($action) {
				case NULL:
					$this->Reinit();
					break;

				case "home":
					$news=ModeleNews::getNews();
					require($vues['accueil']);
					break;

				case "article":

					$this->Article();
					break;

				case "ajouterCommentaire":
					ModeleUtilisateur::creerCommentaire($_POST['commentaireContent'], $_SESSION['login'], $_POST['newsID']);
					setcookie('nbCommentairesUser',$_COOKIE['nbCommentairesUser']+1,time()+365*24*3600);
					$this->Article();
					break;

				case "connection":
					require($vues["seconnecter"]);
					break;

				case "rechercherNews":
					Validation::validateString($_POST['titleNews']);
					$news=ModeleNews::findNewsByTitle($_POST['titleNews']);
					require($vues['accueil']);
					break;

				case "creeruncompte":
					require($vues['creeruncompte']);
					break;

				case "seEnregistrer":
					if($_POST['passwordRegisterRetype']==$_POST['passwordRegister']){

						ModeleUtilisateur::register($_POST['loginRegister'], $_POST['passwordRegister']);
						$news=ModeleNews::getNews();
						require($vues['accueil']);
					}
					else{
						require($vues['creeruncompte']);
					}
					break;

				case "login":
					error_reporting(E_ERROR | E_PARSE);
					ModeleUtilisateur::login($_POST['login'],$_POST['password']);
					$news=ModeleNews::getNews();
					require($vues['accueil']);
					break;

				case "deconnection":
					ModeleUtilisateur::deconnection();
					new ControleurUser(NULL);
					break;

				default: //mauvaise action
				$dVueEreur[] =	"Erreur d'appel php controleur user";
				require ($vues['erreur']);
				break;
		}

		} catch (PDOException $e)
		{
			$dVueEreur[] =	"Erreur inattendue user!!! ";
			require ($vues['erreur']);
		}

		//fin
		exit(0);
	}//fin constructeur

	function Article(){
		global $vues;
		$idNews=$_REQUEST['newsID'] ?? null;
		$newsbyID =  ModeleNews::getNewsByID($idNews);
		$commentaires= ModeleNews::getCommentaires($idNews);
		require ($vues['article']);
	}



	static function  getNombreAllCommentaires(){
		return ModeleNews::getNombreAllCommentaires();
	}

	static function  NbCommentairesParNews($newsid){
		return ModeleNews::getNombreCommentaire($newsid);
	}
	function Reinit() {

		global $vues; // nécessaire pour utiliser variables globales
		require($vues['seconnecter']);
	}

}//fin class

?>
