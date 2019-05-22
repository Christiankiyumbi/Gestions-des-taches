<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller 
{
    
	public function index()
	{
		$this -> load -> model('mainmodel');
		$data['fetch_data'] = $this -> mainmodel -> fetch_data();
		$this -> load -> view('viewAccueil', $data);
	}

	public function nouvelleTache()
	{
		$this -> load -> view('viewNouvelleTache');
	}

	public function nouvelleTacheSimultanee()
	{
		$this -> load -> view('viewTachesSimultanees');
	}

	public function creerCompte()
	{
		$this -> load -> view('viewCreerCompte');
	}

	public function authentification()
	{
		$this -> load -> view('viewAuthentification');
	}

	public function session()
	{
		$user =  $this -> input -> post('login');
		$this -> session -> userdata('user', $user);
		// Afficher SESSION
		echo $this -> session -> user;
	}

	public function deconnexion()
	{
		$this-> session -> unset_userdata('is_connected');
        redirect();
	}

	
	public function modifierTache()
	{
		$id = $this -> uri -> segment(3);
		$this -> load -> model('mainmodel');
		$data['fetch_data'] = $this -> mainmodel -> print_data($id);
		$this -> load -> view('viewModifierTache', $data);
	}
	
	public function afficherConfirmation()
	{
		$id = $this -> uri -> segment(3);
		$this -> load -> model('mainmodel');
		$data['fetch_data'] = $this -> mainmodel -> print_data($id);
		$this -> load -> view('viewConfirmerSuppression', $data);
	}

	public function supprimerTache()
	{
		$id = $this -> uri -> segment(3);
		$this -> load -> model('mainmodel');
		$this -> mainmodel -> delete_data($id);
		redirect('accueil');
	}
	
}
