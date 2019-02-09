<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Solicitacao extends AppModel {
    public $name = 'Solicitacao';
    
    public $validate = array(
        'descricao' => array(
          'required' => array(
              'rule' => 'notBlank'
          )
        ),
    );
    /*
     * 
    public function isOwnedBy($solicitacao, $usuario) {
        return $this->field('id', array('id' => $solicitacao, 'usuario_id' => $usuario)) !== false;
    }
     *
     */
    public $belongsTo = array('Usuario'); 
        
    public $hasAndBelongsToMany = array(
        'Motivo' => array(
            'className' => 'Motivo',
            'order' => 'Motivo.id DESC',
            'joinTable' => 'motivos_solicitacoes',
            'foreignKey' => 'solicitacao_id',
            'associationForeignKey' => 'motivo_id',
           'unique' => 'keepExisting'
        ),
    );

    public $hasMany = array('Mensagem', 'Agendamento');
    
}

