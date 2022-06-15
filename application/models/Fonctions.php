<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Fonctions extends CI_Model
{
	function getRefProduit()
	{
		$tab = array();
		$indice = 0;
		$query = $this->db->query("select * from produit");
		foreach($query->result_array() as $rows)
		{
			$tab[$indice] = $rows['Ref_produit'];
			$indice++;
		}
		return $tab;
	}

	function verifierLogin($login,$mdp)
	{
		$retour = 0;
		$sql = "select count(*) as compte from administrateur where Login = '%s' and MotDePasse = '%s'";
		$sql = sprintf($sql,$login,sha1($mdp));
		$query = $this->db->query($sql);
		foreach($query->result_array() as $rows)
		{
			$retour = $rows['compte'];
		}
		return $retour;
	}

	function getIdAchat()
	{
		$idAchat = 0;
		$query = $this->db->query("select max(idAchat) as idAchat from achat");
		foreach($query->result_array() as $rows)
		{
			$idAchat = $rows['idAchat'];
		}
		return $idAchat;
	}

	function getDesignations()
	{
		$tab = array();
		$indice = 0;
		$query = $this->db->query("select * from produit");
		foreach($query->result_array() as $rows)
		{
			$tab[$indice] = $rows['Designation'];
			$indice++;
		}
		return $tab;
	}

	function getPrixUnitaires()
	{
		$tab = array();
		$indice = 0;
		$query = $this->db->query("select * from produit");
		foreach($query->result_array() as $rows)
		{
			$tab[$indice] = $rows['Prix_Unitaire'];
			$indice++;
		}
		return $tab;
	}

	function getQuantiteStock()
	{
		$tab = array();
		$indice = 0;
		$query = $this->db->query("select * from produit");
		foreach($query->result_array() as $rows)
		{
			$tab[$indice] = $rows['QuantiteStock'];
			$indice++;
		}
		return $tab;
	}

	function getImages()
	{
		$tab = array();
		$indice = 0;
		$query = $this->db->query("select * from produit");
		foreach($query->result_array() as $rows)
		{
			$tab[$indice] = $rows['Images'];
			$indice++;
		}
		return $tab;
	}

	function getCodeCategories()
	{
		$tab = array();
		$indice = 0;
		$query = $this->db->query("select * from produit");
		foreach($query->result_array() as $rows)
		{
			$tab[$indice] = $rows['Code_categorie'];
			$indice++;
		}
		return $tab;
	}

	function getDesignation($caisse)
	{
		$tab = array();
		$indice = 0;
		$sql = "select * from v_produit where NumCaisse = '%s'";
		$sql = sprintf($sql,$caisse);
		$query = $this->db->query($sql);
		foreach($query->result_array() as $rows)
		{
			$tab[$indice] = $rows['Designation'];
			$indice++;
		}
		return $tab;
	}
	function getNumeroCaisse()
	{
		$tab = array();
		$indice = 0;
		$query = $this->db->query("select * from caisse");
		foreach($query->result_array() as $rows)
		{
			$tab[$indice] = $rows['NumCaisse'];
			$indice++;
		}
		return $tab;
	}

	function getPrixUnitaire($caisse)
	{
		$tab = array();
		$indice = 0;
		$sql = "select * from v_produit where NumCaisse = '%s'";
		$sql = sprintf($sql,$caisse);
		$query = $this->db->query($sql);
		foreach($query->result_array() as $rows)
		{
			$tab[$indice] = $rows['Prix_Unitaire'];
			$indice++;
		}
		return $tab;
	}

	function getQuantite($caisse)
	{
		$tab = array();
		$indice = 0;
		$sql = "select * from v_produit where NumCaisse = '%s'";
		$sql = sprintf($sql,$caisse);
		$query = $this->db->query($sql);
		foreach($query->result_array() as $rows)
		{
			$tab[$indice] = $rows['Quantite'];
			$indice++;
		}
		return $tab;
	}

	function getSimplePrixUnitaire($designation)
	{
		$prixUnitaire = 0;
		$sql = "select * from produit where Designation ='%s'";
		$sql = sprintf($sql, $designation);
		$query = $this->db->query($sql);
		foreach($query->result_array() as $rows)
		{
			$prixUnitaire = $rows['Prix_Unitaire'];
		}
		return $prixUnitaire;
	}

	function getSimpleRefProduit($designation)
	{
		$refProduit = "";
		$sql = "select * from produit where Designation ='%s'";
		$sql = sprintf($sql, $designation);
		$query = $this->db->query($sql);
		foreach($query->result_array() as $rows)
		{
			$refProduit = $rows['Ref_produit'];
		}
		return $refProduit;
	}

	function getDesignationSimple($idProduit)
	{
		$retour = "";
		$sql = "select * from produit where Ref_produit = '%s'";
		$sql = sprintf($sql,$idProduit);
		$query = $this->db->query($sql);
		foreach($query->result_array() as $rows)
		{
			$retour = $rows['Designation'];
		}
		return $retour;
	}

	function getPrixUnitaireSimple($idProduit)
	{
		$retour = "";
		$sql = "select * from produit where Ref_produit = '%s'";
		$sql = sprintf($sql,$idProduit);
		$query = $this->db->query($sql);
		foreach($query->result_array() as $rows)
		{
			$retour = $rows['Prix_Unitaire'];
		}
		return $retour;
	}

	function getQuantiteSimple($idProduit)
	{
		$retour = 0;
		$sql = "select * from produit where Ref_produit = '%s'";
		$sql = sprintf($sql,$idProduit);
		$query = $this->db->query($sql);
		foreach($query->result_array() as $rows)
		{
			$retour = $rows['QuantiteStock'];
		}
		return $retour;
	}

	function getCodeCategorie($idProduit)
	{
		$retour = "";
		$sql = "select * from produit where Ref_produit = '%s'";
		$sql = sprintf($sql,$this->db->escape($idProduit));
		$query = $this->db->query($sql);
		foreach($query->result_array() as $rows)
		{
			$retour = $rows['Code_categorie'];
		}
		return $retour;
	}

	function ajouterProduit($idProduit,$designation,$prixUnitaire,$quantite,$code_categorie)
	{
		$sql = "insert into produit values('%s','%s',%d,%d,'%s')";
		$sql = sprintf($sql, $idProduit, $designation, $prixUnitaire, $quantite, $code_categorie);
		$this->db->query($sql);
	}

	function modifierProduit($idProduit,$designation,$prixUnitaire,$quantite,$images)
	{
		$sql = "update produit set Designation = '%s', Prix_Unitaire = %d, QuantiteStock = %d, Images = '%s' where Ref_produit = '%s'";
		$sql = sprintf($sql,$designation,$prixUnitaire,$quantite,$images,$idProduit);
		$this->db->query($sql);
	}

	function supprimerProduit($idProduit)
	{
		$sql = "delete from produit where Ref_produit = '%s'";
		$sql = sprintf($sql,$idProduit);
		$this->db->query($sql);
	}

	function modifierQuantiteStock($quantite,$code)
	{
		$sql = "update produit set QuantiteStock = %d  where Ref_produit = '%s'";
		$sql = sprintf($sql,$quantite,$this->db->escape($code));
		$this->db->query($sql);
	}

	function ajouterAchat($refProduit,$quantite,$prixTotal)
	{
		$idAchat = "null";
		$sql = "insert into achat values('%s','%s',%d,%d)";
		$sql = sprintf($sql, $idAchat, $refProduit,$quantite,$prixTotal);
		$this->db->query($sql);
	}

	function ajouterPayement($idAchat,$numCaisse,$date)
	{
		$sql = "insert into payement values(%d,'%s','%s')";
		$sql = sprintf($sql,$idAchat,$numCaisse,$date);
		$this->db->query($sql);
	}

	function updateQuantiteStock($quantite,$code)
	{
		$sql = "update produit set QuantiteStock = %d  where Ref_produit = '%s'";
		$sql = sprintf($sql,$quantite,$code);
		$this->db->query($sql);
	}

	function insertAchat($refProduit,$quantite,$prixTotal)
	{
		$idAchat = "null";
		$sql = "insert into achat values('%s','%s',%d,%d)";
		$sql = sprintf($sql, $idAchat, $refProduit,$quantite,$prixTotal);
		$this->db->query($sql);
	}

	function insertPayement($idAchat,$numCaisse,$date)
	{
		$sql = "insert into payement values(null,%d,'%s','%s')";
		$sql = sprintf($sql,$idAchat,$numCaisse,$date);
		$this->db->query($sql);
	}


	function getTotalMontant($caisse)
	{
		$tab = array();
		$indice = 0;
		$sql = "select * from v_produit where NumCaisse = '%s'";
		$sql = sprintf($sql,$caisse);
		$query = $this->db->query($sql);
		foreach($query->result_array() as $rows)
		{
			$tab[$indice] = $rows['Prix_Total'];
			$indice++;
		}
		return $tab;
	}

	function getDateHeure()
	{
		$date = "";
		$query = $this->db->query("select now() as date");
		foreach($query->result_array() as $rows)
		{
			$date = $rows['date'];
		}
		return $date;
	}

	function sommeMontant($tab)
	{
		$somme = 0;
		for($i = 0; $i < count($tab); $i++)
		{
			$somme = $somme + $tab[$i];
		}
		return $somme;
	}
}

?>