<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->helper('assets_helper');
		$this->load->model('Fonctions');
		$data = array();
		$data['numCaisse'] = $this->Fonctions->getNumeroCaisse();
		$this->load->view('index',$data);	
	}

	public function Changer_Caisse(){
		redirect(site_url('Load/Changer_Caisse'));
	}	

	public function Choix_Caisse(){
		$this->load->helper('assets_helper');
		$this->load->model('Fonctions');
		$caisse = $this->input->post('caisse');
		if($caisse != "null")
		{
			$this->session->set_userdata('caisse',$caisse);
			$data = array();
			$data['template'] = "template.php";
			$data['designation'] = $this->Fonctions->getDesignations();
			$data['prixUnitaire'] = $this->Fonctions->getPrixUnitaires();
			$data['quantiteStock'] = $this->Fonctions->getQuantiteStock();
			$data['images'] = $this->Fonctions->getImages();
			$data['codeCategorie'] = $this->Fonctions->getCodeCategories();
			$this->load->view('index',$data);
		}
		else
		{
			redirect(site_url());
		}
		
	}

	public function crud()
	{
		$this->load->helper('assets_helper');
		$this->load->model('Fonctions');
		$data = array();
		$data['crud'] = "crud.php";
		$data['refProduit'] = $this->Fonctions->getRefProduit();
		$data['designation'] = $this->Fonctions->getDesignations();
		$data['prixUnitaire'] = $this->Fonctions->getPrixUnitaires();
		$data['quantiteStock'] = $this->Fonctions->getQuantiteStock();
		$data['images'] = $this->Fonctions->getImages();
		$data['codeCategorie'] = $this->Fonctions->getCodeCategories();
		$this->load->view('index',$data);
	}	

	public function login(){
		$this->load->helper('assets_helper');
		$data = array();
		$data['login'] = "loginAdmin.php";
		$this->load->view('index',$data);
	}

	public function verifierLogin()
	{
		$this->load->helper('assets_helper');
		$this->load->model('Fonctions');
		$data = array();
		$login = $this->input->post('email');
		$mdp = $this->input->post('mdp');
		$verifier =  $this->Fonctions->verifierLogin($login,$mdp);
		if($verifier == 1)
		{
			redirect(site_url('Accueil/crud'));
		}
		else{
			$data['login'] = "loginAdmin.php";
			$this->load->view('index',$data);
		}
	}

	public function supprimer()
	{
		$this->load->helper('assets_helper');
		$this->load->model('Fonctions');
		$idProduit = $this->input->get('id');
		$this->Fonctions->supprimerProduit($idProduit);
		$data = array();
		$data['crud'] = "crud.php";
		$data['refProduit'] = $this->Fonctions->getRefProduit();
		$data['designation'] = $this->Fonctions->getDesignations();
		$data['prixUnitaire'] = $this->Fonctions->getPrixUnitaires();
		$data['quantiteStock'] = $this->Fonctions->getQuantiteStock();
		$data['images'] = $this->Fonctions->getImages();
		$data['codeCategorie'] = $this->Fonctions->getCodeCategories();
		$this->load->view('index',$data);
	}

	public function valeurModifier()
	{
		$this->load->helper('assets_helper');
		$this->load->model('Fonctions');
		$idProduit = $this->input->get('id');
		$data = array();
		$data['modif'] = "modif.php";
		$data['designation'] =  $this->Fonctions->getDesignationSimple($idProduit);
		$data['prixUnitaire'] =  $this->Fonctions->getPrixUnitaireSimple($idProduit);
		$data['Quantite'] =  $this->Fonctions->getQuantiteSimple($idProduit);
		$this->load->view('index',$data);
	}

	public function modifier()
	{
		$this->load->helper('assets_helper');
		$this->load->model('Fonctions');
		$idProduit = $this->input->post('id');
		$designation = $this->input->post('designation');
		$prixUnitaire = $this->input->post('prixUnitaire');
		$quantiteStock = $this->input->post('quantiteStock');
		$images = $this->input->post('images');
		$this->Fonctions->modifierProduit($idProduit,$designation,$prixUnitaire,$quantiteStock,$images);
		$data = array();
		$data['crud'] = "crud.php";
		$data['refProduit'] = $this->Fonctions->getRefProduit();
		$data['designation'] = $this->Fonctions->getDesignations();
		$data['prixUnitaire'] = $this->Fonctions->getPrixUnitaires();
		$data['quantiteStock'] = $this->Fonctions->getQuantiteStock();
		$data['images'] = $this->Fonctions->getImages();
		$data['codeCategorie'] = $this->Fonctions->getCodeCategories();
		$this->load->view('index',$data);
	}

	public function traitement()
	{
		$this->load->helper('assets_helper');
		$this->load->model('Fonctions');
		$produit = $this->input->post('designation');
		$quantite = $this->input->post('quantite');
		$caisseNum = $this->session->userdata('caisse');
		$refProduit = $this->Fonctions->getSimpleRefProduit($produit);
		$montant = $this->Fonctions->getSimplePrixUnitaire($produit);
		$montantTotal = $montant * $quantite;
		$date = $this->Fonctions->getDateHeure();
		$this->Fonctions->insertAchat($refProduit,$quantite,$montantTotal);
		$idAchat = $this->Fonctions->getIdAchat();
		$this->Fonctions->insertPayement($idAchat,$caisseNum,$date);
		$data = array();
		$data['ajouter'] = "ajouterAchat.php";
		$data['designation'] = $this->Fonctions->getDesignation($caisseNum);
		$data['prixUnitaire'] = $this->Fonctions->getPrixUnitaire($caisseNum);
		$data['quantite'] = $this->Fonctions->getQuantite($caisseNum);
		$data['prixTotal'] = $this->Fonctions->getTotalMontant($caisseNum);
		$data['sommeMontant'] = $this->Fonctions->sommeMontant($data['prixTotal']);
		$this->load->view('index',$data);
	}
}



