<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller 
{
    
	public function index()
	{
		$id = $this -> session -> id;
		$this -> load -> model('mainmodel');
		$data['tasks'] = $this -> mainmodel -> get_tasks_by_date($id);
		$this -> load -> view('viewAccueil', $data);
	}

	public function nouvelle_tache()
	{
		$this -> load -> view('viewNouvelleTache');
	}

	public function creer_compte()
	{
		$this -> load -> view('viewCreerCompte');
	}

	public function modify_task()
	{
		$this -> load -> view('viewModifierTache');
	}

	public function task_confirmation()
	{
		$this -> load -> view('viewConfirmerSuppression');
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

	
}
