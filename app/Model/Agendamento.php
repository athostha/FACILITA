<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Agendamento extends AppModel {
    
    public $belongsTo = array('Solicitacao', 'Usuario');
    
    
    public $validate = array('data' => array('between' => array(
                'rule' => array('lengthBetween', 19, 19),
                'message' => 'Insira a data'),
                
            )
        );
}