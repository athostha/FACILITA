<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Usuario extends AppModel {
    
    public function beforeSave($options = array()) {
        
        if (isset($this->data['Usuario']['senha'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data['Usuario']['senha'] = $passwordHasher->hash($this->data['Usuario']['senha']);
        }
        return true;
    }
    
        public $name = 'Usuario';
        
        public $validate = array(
            'nome' => array(
              'required' => array(
                  'rule' => 'notBlank'
              )
            ),
            'senha' => array(
                 'notEmpty' => array(
                        'rule' => array('notBlank'),
                        'message' => 'Insira uma senha.',
                 ),
                'matchPasswords' => array(
                        'rule' => array('matchPasswords'),
                        'message' => 'Senha e confirmação devem ser iguais!'
                 )
            ),
            'data_nascimento' => array(
              'required' => array(
                  'rule' => 'notBlank'
              )
            ),
            'matricula' => array(
                    'unique' => array(
                        'rule' => 'isUnique',
                        'required' => 'create',
                        'message' => 'Matrícula já existe'
                ),
                'numeric' => array(
                    'rule' => 'numeric',
                    'message' => 'Apenas números'
                )
            ),
            'email' => array(
              'required' => array(
                  'rule' => 'notBlank'
              )
            ),
            'telefone' => array(
                'between' => array(
                    'rule' => array('lengthBetween', 10, 11),
                    'message' => 'Insira número completo com DDD'
                )
            ),
            'sexo' => array(
              'required' => array(
                  'rule' => 'notBlank'
              )
            ),
            'estado_civil' => array(
              'required' => array(
                  'rule' => 'notBlank'
              )
            ),
            'setor' => array(
              'required' => array(
                  'rule' => 'notBlank'
              )
            ),
            'cargo' => array(
              'required' => array(
                  'rule' => 'notBlank'
              )
            ),
            'realizou_atendiomento_psicologico' => array(
              'required' => array(
                  'rule' => 'notBlank'
              )
            ),
            'admin' => array(
              'required' => array(
                  'rule' => 'notBlank'
              )
            ),
            'psicologo' => array(
              'required' => array(
                  'rule' => 'notBlank'
              )
            ),
            
        );
        public $hasMany = array(
        'Solicitacao' => array(
            'className' => 'Solicitacao'
        )
    );
          
    public function isOwnedBy() {
        return TRUE;
    }
    public function matchPasswords($data){
      if ($data['senha']==$this->data['Usuario']['confirm_password']){
            return true;
       }
       $this->invalidate('confirm_password','Senha e confirmação devem ser iguais!');
        return false;
}
}

