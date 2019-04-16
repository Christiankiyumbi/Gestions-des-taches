<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validation extends CI_Controller {
    
    public function validerNouvelleTache(){
        
       
        
        $this -> form_validation -> set_rules('description', 'description', 'required|max_length[255]',
            array(
                'required' => 'Le champs %s est obligatoire.',
                'max_length' => 'Le champs doit contenir au moins 255 caractères.'
            ));
        
        if($this -> form_validation -> run()){
            $this -> load -> model('mainmodel');
            $data = 
                array(
                    'descriptionTache' => $this -> input -> post('description'),
                    'heureDebut' => $this -> input -> post('heureDebut'),
                    'heureFin' => $this -> input -> post('heureFin'),
                    'dateDebut' => $this -> input -> post('dateDebut'),
                    'dateFin' => $this -> input -> post('dateFin'),
                    'commentaire' => $this -> input -> post('commentaire')                
                );
                $this -> mainmodel -> insert_data($data);
            redirect('accueil');
        }else{
            redirect('accueil/nouvelleTache');
        } 
    }
}
