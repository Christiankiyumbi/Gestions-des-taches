<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller 
{
    
	public function index()
	{
		$id = $this -> session -> id;
		$this -> load -> model('mainmodel');
		//$data['fetch_data'] = $this -> mainmodel -> fetch_data($id);
		$data['fetch_data'] = $this -> mainmodel -> fetch_data_by_date($id);
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
		echo $this -> session -> user;
	}

	public function deconnexion()
	{
		$this-> session -> unset_userdata('is_connected');
        redirect();
	}
	
}
