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
        /*
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
           
        }
        else
        {
            $this -> load -> view('viewAuthentification');
        } 
        */

       $login = $this -> input -> post('login');
       $pwd = $this -> input -> post('pwd');
       $data = array('pseudo' => $login, 'pwd' => $pwd);

       $this -> load -> model('mainmodel');
       $result = $this -> mainmodel -> fetch_user($data);

       if(count($result) > 0)
       {
           $user = $result[0];
           $data = array('login' => $user -> pseudo, 'pwd' => $user -> pwd, 'connected' => true);
           $this -> session -> set_userdata($data);
           redirect('accueil');
       }
       else
       {
            $msg =  array('err_msg' => 'Login ou mot de passe incorrect.');
            $this->session->set_flashdata($msg);
            $form_auth = $this -> load -> view('accueil/viewAuthentification', [], true);
            $page = array('page' => $form_auth);
            $this->load->view('viewAuthentification', $page);
       }
    }
    
    public function validerNouvelleTache()
    {
        
        $this -> form_validation -> set_rules('description', 'description', 'required|max_length[255]',
            array(
                'required' => 'Le champs %s est obligatoire.',
                'max_length' => 'Le champs %s doit contenir au moins 255 caractères.'
            ));
        
            /**
             * return string
             * 
             * $datestring = 'Year: %Y Month: %m Day: %d - %h:%i %a';
             * $time = time();
             * echo mdate($datestring, $time);
             * 
             * return array
             * 
             * $range = date_range('2012-01-01', '2012-01-15');
             * echo "First 15 days of 2012:";
             * foreach ($range as $date)
             * {
             *       echo $date."\n";
             * }
             */
        
        if($this -> form_validation -> run())
        {
            $this -> load -> model('mainmodel');
            $data = 
                array(
                    'description' => $this -> input -> post('description'),
                    'etat' => $this -> input -> post('etat'),
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
}
