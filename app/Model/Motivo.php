<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Motivo extends AppModel{
    
       
    
    public $validate = array(
        'motivo' => array(
          'required' => array(
              'rule' => 'notBlank',
              'rule' =>'alphaNumeric'
              
          )
        ),
    );
    

    
    public $hasAndBelongsToMany = array(
        'Solicitacao' => array(
            'className' => 'Solicitacao',
            'order' => 'Solicitacao.id DESC',
            'joinTable' => 'motivos_solicitacoes',
            'foreignKey' => 'motivo_id',
            'associationForeignKey' => 'solicitacao_id',
            'unique' => 'keepExisting'
        )
    );
    
}

