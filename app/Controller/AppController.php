<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'Session',  
        'Flash',
        'Auth' => array(
            'loginRedirect' => array('controller' => 
                'solicitacoes', 
                'action' => 'index'),
            'logoutRedirect' => array(
                'controller' => 'usuarios',
                'action' => 'login',
            ),
            'loginAction' => array('controller' => 
                'usuarios','action' => 
                'login'),
            'authenticate' => array(                
                'Form' => array(
                    'userModel' => 'Usuario',
                    'passwordHasher' => 'Blowfish',
                    'fields' => array(
                        'username' => 'matricula', //Default is 'username' in the userModel
                        'password' => 'senha'  //Default is 'password' in the userModel
                    )
                )
            ),
            'authorize' => array('Controller'), // Added this line
            //'authError' => 'Im sorry david, Im afraid I cant do that'
        )
    );
    
    
    public function isAuthorized() {
        // Admin can access every action
        $admin = $this->Session->read('Auth.User.admin');
        if ($this->action === 'index') {
        return true;
        }
        if ($this->action === 'atendimento') {
            $usuario = $this->Session->read('Auth.User.id');
            $sid = (int) $this->request->params['pass'][0];
            $sol = $this->Mensagem->Solicitacao->find('first',
                    array('conditions' => array('Solicitacao.id' => $sid)));
            if($usuario == $sol['Usuario']['id']){
                return true;
            }else if($admin == 1){
                    return true;
            }
        }
        if ($this->action === 'agendamentos') {
            if($admin == 1){
                return true;
            }else{
                return false;
            }
        }
        if ($this->action === 'atendimentofinalizado') {
            if($admin == 1){
                return true;
            }else{
                return false;
            }
        }
        if ($this->action === 'gerenciarmotivos') {
            if($admin == 1){
                return true;
            }else{
                return false;
            }
        }
        if ($this->action === 'dados') {
            if($admin == 1){
                return true;
            }else{
                return false;
            }
        }
        if ($this->action === 'atendimentos') {
            if($admin == 1){
                return true;
            }
        }
        if ($this->action === 'novoatendimento') {
            if($admin == 0){
                return true;
            }
        }
        if ($this->action === 'visuser') {
            if($admin == 0){
                return true;
            }
        }
        if ($this->action === 'registropsicologo') {
        if($admin == 1){
                return true;
            }
        }
        if ($this->action === 'usuarios') {
        if($admin == 1){
                return true;
            }
        }
        if ($this->action === 'perfil') {
        if($admin == 1){
                return true;
            }
        }if ($this->action === 'delete') {
        if($admin == 1){
                return true;
            }else{
                return false;
            }
        }if ($this->action === 'perfilpsicologo') {
        if($admin == 1){
                return true;
            }else{
                return false;
            }
        }
        $usuario = $this->Session->read('Auth.User.id');
        $id = (int) $this->request->params['pass'][0];
        if($usuario == $id){
            return true;
        }
    }
        

}
