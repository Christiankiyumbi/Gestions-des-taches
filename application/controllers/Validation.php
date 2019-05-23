<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validation extends CI_Controller 
{

    public function nouvelUtilisateur()
    {
        $this -> form_validation -> set_rules('login', 'login', 'required|min_length[5]|max_length[255]',
        array(
            'required' => 'Le champs [%s] est obligatoire.',
            'min_length' => 'Le champs [%s] doit contenir au moins 5 caractères.',
            'max_length' => 'Le champs [%s] ne doit pas dépasser 255 caractères.'
        ));
    
        $this -> form_validation -> set_rules('pwd', 'password', 'required|min_length[8]|max_length[255]',
            array(
                'required' => 'Le champs %s est obligatoire.',
                'min_length' => 'Le champs [%s] doit contenir au moins 8 caractères.',
                'max_length' => 'Le champs [%s] ne doit pas dépasser 255 caractères.'
        ));

        $this -> form_validation -> set_rules('confirmation', 'confirmation', 'required|min_length[8]|max_length[255]|matches[pwd]',
            array(
                'required' => 'Le champs [%s] est obligatoire.',
                'min_length' => 'Le champs [%s] doit contenir au moins 8 caractères.',
                'max_length' => 'Le champs [%s] ne doit pas dépasser 255 caractères.',
                'matches' => 'Le champs [%s] ne correspond pas au mot de passe'
        ));

        if($this -> form_validation -> run())
        {
            $this -> load -> model('mainmodel');
            $data = 
                array(
                    'pseudo' => $this -> input -> post('login'),
                    'pwd' => $this -> input -> post('pwd')                
                );
            $this -> mainmodel -> insert_user($data);
            redirect('accueil/authentification');
        }
        else
        {
            $this -> load -> view('viewCreerCompte');
        } 
    }

    public function connexion()
    {
        $this -> form_validation -> set_rules('login', 'login', 'required|min_length[5]|max_length[255]',
            array(
                'required' => 'Le champs %s est obligatoire.',
                'min_length' => 'Le [%s] doit contenir au moins 5 caractères.',
                'max_length' => 'Le [%s] ne doit pas dépasser 255 caractères.'
            ));
        
        $this -> form_validation -> set_rules('pwd', 'password', 'required|min_length[8]|max_length[255]',
            array(
                'required' => 'Le champs %s est obligatoire.',
                'min_length' => 'Le [%s] doit contenir au moins 8 caractères.',
                'max_length' => 'Le [%s] ne doit pas dépasser 255 caractères.'
        ));

        if($this -> form_validation -> run())
        {
            $login = $this -> input -> post('login');
            $pwd = $this -> input -> post('pwd');
            $data = array('pseudo' => $login, 'pwd' => $pwd);

            $this -> load -> model('mainmodel');
            $result = $this -> mainmodel -> get_user($data);

            if(count($result) > 0)
            {
                $user = $result[0];
                $data = 
                    array(
                            'id' => $user -> id, 
                            'login' => $user -> pseudo, 
                            'pwd' => $user -> pwd, 
                            'connected' => true
                        );
                $this -> session -> set_userdata($data);
                redirect('accueil');
            }
            else
            {
                $msg =  array('err_msg' => 'Login ou mot de passe incorrect.');
                $this->session->set_flashdata($msg);
                $form_auth = $this -> load -> view('viewAuthentification', [], true);
                $page = array('page' => $form_auth);
                $this->load->view('viewAuthentification', $page);
            }
        }
        else
        {
            $this -> load -> view('viewAuthentification');
        } 
    }
    
    public function validerNouvelleTache()
    {
        
        $this -> form_validation -> set_rules('description', 'description', 'required|max_length[255]',
            array(
                'required' => 'Le champs %s est obligatoire.',
                'max_length' => 'Le champs %s doit contenir au moins 255 caractères.'
            ));

        if($this -> form_validation -> run())
        {
            $this -> load -> model('mainmodel');
            $id_user = $this -> session -> id;
            $data = 
                array(
                    'id_user' => $id_user, 
                    'description' => $this -> input -> post('description'),
                    'etat' =>  $this -> input -> post('etat'),
                    'date_creation' => $this -> input -> post('date_creation')          
                );
            
            $this -> mainmodel -> insert_tache($data);
            redirect('accueil');
        }
        else
        {
            $this -> load -> view('viewNouvelleTache');
        } 
    }

    public function updateNouvelleTache()
    {
        
        $this -> form_validation -> set_rules('description', 'description', 'required|max_length[255]',
            array(
                'required' => 'Le champs %s est obligatoire.',
                'max_length' => 'Le champs %s doit contenir au moins 255 caractères.'
            ));

        if($this -> form_validation -> run())
        {
            
            $user = $this -> session -> id;
            $result = $this -> mainmodel -> get_user($user);
            
            if(count($result) > 0)
            {
                $user = $result[0];
                $id_user = $user -> id_user;
                $data = 
                    array(
                        'id_user' => $id_user, 
                        'description' => $this -> input -> post('description'),
                        'etat' =>  $this -> input -> post('etat'),
                        'date_creation' => $this -> input -> post('date_creation')          
                    );
                $this -> mainmodel -> update_tache($data);
            }
            redirect('accueil');
        }
        else
        {
            $this -> load -> view('viewNouvelleTache');
        } 
    }

    public function marquerCommeFinie()
	{
        $id = $this -> uri -> segment(3);
        $id_user = $this -> uri -> segment(4);
        $this -> load -> model('mainmodel');
        $result = $this -> mainmodel -> get_taches($id);
        
        if(count($result) > 0)
        {
            $user = $result[0];
            $data = 
                array(
                    'id' => $id, 
                    'id_user' => $id_user, 
                    'description' => $user -> description,
                    'etat' => 1, 
                    'date_creation' => $user -> date_creation
            );
            $this -> mainmodel -> update_tache($id, $data);
            redirect('accueil');
        }
        else
        {
            $msg =  array('err_msg' => 'TODOAPP RETURN [Error].');
            $this->session->set_flashdata($msg);
            $form_auth = $this -> load -> view('viewAccueil', [], true);
            $page = array('page' => $form_auth);
            $this->load->view('viewAccueil', $page);
        }
    }
    
    public function marquerCommeEnCours()
	{
        $id = $this -> uri -> segment(3);
        $id_user = $this -> uri -> segment(4);
        $this -> load -> model('mainmodel');
        $result = $this -> mainmodel -> get_taches($id);
        
        if(count($result) > 0)
        {
            $user = $result[0];
            $data = 
                array(
                    'id' => $id, 
                    'id_user' => $id_user, 
                    'description' => $user -> description,
                    'etat' => 0, 
                    'date_creation' => $user -> date_creation
            );
            $this -> mainmodel -> update_tache($id, $data);
            redirect('accueil');
        }
        else
        {
            $msg =  array('err_msg' => 'TODOAPP RETURN [Error].');
            $this->session->set_flashdata($msg);
            $form_auth = $this -> load -> view('viewAccueil', [], true);
            $page = array('page' => $form_auth);
            $this->load->view('viewAccueil', $page);
        }
	}

	
	public function modifierTache()
	{
		$id = $this -> uri -> segment(3);
		$this -> load -> model('mainmodel');
        $data['fetch_data'] = $this -> mainmodel -> get_taches($id);
		$this -> load -> view('viewModifierTache', $data);
	}
	
	public function afficherConfirmation()
	{
		$id = $this -> uri -> segment(3);
		$this -> load -> model('mainmodel');
		$data['fetch_data'] = $this -> mainmodel -> get_taches($id);
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
