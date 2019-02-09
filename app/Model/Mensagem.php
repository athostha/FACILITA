<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Mensagem extends AppModel {
    public $validate = array(
        'conteudo' => array(
          'required' => array(
              'rule' => 'notBlank',
              'message' => 'campo em branco'
          )
        ),
        'solicitacao_id' => array(
          'required' => array(
              'rule' => 'notBlank'
          )
        ),
        'usuario_id' => array(
          'required' => array(
              'rule' => 'notBlank'
          )
        )
        
    );


    
    public $belongsTo = array('Usuario',
        'Solicitacao');

    
}

