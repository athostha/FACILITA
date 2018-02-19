<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UsuariosController extends AppController{
    
       public function beforeFilter() {
        parent::beforeFilter();
        
        $this->Auth->allow('registro','logout');
        $this->Auth->deny('perfil');
    }

    
    public function login() {
        
        if ($this->request->is('post')) {
            
            if ($this->Auth->login()) {
                //return $this->redirect($this->Auth->redirectUrl());
                return $this->redirect(array(
                    'controller' => 'solicitacoes',
                    'action' => 'index'));
            } else {
            $this->Flash->error(__('matricula ou senha inválida'));
            }
            
        }
        
    }
    
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
    
    //Cria usuário psicologo
    public function registropsicologo() {
        if ($this->request->is('post')) {
            $this->Usuario->create();
            $this->request->data['Usuario']['admin'] = 0;
            $this->request->data['Usuario']['psicologo'] = 1;
            if ($this->Usuario->save($this->request->data)) {
                $this->Flash->success(__('Usuário registrado'));
                return $this->redirect(array(
                    'controller' => 'solicitacoes',
                    'action' => 'index'));
            }
            $this->Flash->error(
                __('Erro ao registrar do usuário')
            );
            
        }
    }
    //cria usuário comum
    public function registro() {
        if ($this->request->is('post')) {
            $this->Usuario->create();
            $this->request->data['Usuario']['admin'] = 0;
            $this->request->data['Usuario']['psicologo'] = 0;
            if ($this->Usuario->save($this->request->data)) {
                $this->Flash->success(__('Usuário registrado'));
                return $this->redirect(array(
                    'action' => 'login'));
            }
            $this->Flash->error(
                __('Erro ao registrar do usuário')
            );
        }
    }
    //Visualiza todos os usuários registrados
    public $components = array('Paginator');

    public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Usuario.id' => 'asc'
        )
    );
    public function vis(){
        //$this->set('usuarios', $this->Usuario->find('all',
        //        array('conditions' => array('Usuario.psicologo' => 0))));
        
        $this->Paginator->settings = $this->paginate;

    // similar to findAll(), but fetches paged results
        $posts = $this->Paginator->paginate('Usuario',
                array('Usuario.psicologo' => 0));
        $this->set('usuarios', $posts);
    }
    //edita usuário existente
    public function editar($id){
        $this->Usuario->id = $id;

        if (!$id) {
            throw new NotFoundException(__('Invalido'));
        };
        $usuario = $this->Usuario->findById($id);
        if (!$usuario) {
            throw new NotFoundException(__('Usuário não existe'));
        }

        if ($this->request->is(array('Usuario', 'put'))) {
            $this->Usuario->id = $id;
            if ($this->Usuario->save($this->request->data)) {
              $this->Flash->success(__('Perfil editado com sucesso'));
                return $this->redirect(array('controller' => 'Solicitacoes',
                    'action' => 'index'));
            }
            $this->Flash->error(__('erro ao editar o perfil'));
            return $this->redirect(array(
                    'action' => 'editar', $id));
        }

        if (!$this->request->data) {
            $this->request->data = $usuario;
        }
    }
    //deleta usuário
    public function delete($id) {        
        
        $this->request->allowMethod('post');
        $this->Usuario->id = $id;
        if (!$this->Usuario->exists()) {
            throw new NotFoundException(__('Usuário não existe'));
        }
         
        if ($this->Usuario->delete($id)) {
            $this->Flash->success(__('Deletado com sucesso'));
            return $this->redirect(array('action' => 'visao'));
        } else {
            debug($id);
        }
        $this->Flash->error(__('Erro ao realizar operação'));
        return $this->redirect(array('action' => 'visao'));
    }
    public function perfil($id){
        $this->set('usuario', $this->Usuario->findByid($id));
        $this->set('agendamentos', $this->Usuario->Solicitacao->Agendamento->find('all',
                        array('order' => array('Agendamento.data' => 'desc'),
                            'conditions' => array('Usuario.id' => $id))));
        $this->set('solicitacoes', $this->Usuario->Solicitacao->find('all',
                        array('order' => array('Solicitacao.id' => 'desc'),
                            'conditions' => array('Usuario.id' => $id))));
        
        
    }
    
    public function novasenha($id){
        $this->Usuario->id = $id;
        
        if (!$id) {
            throw new NotFoundException(__('Invalido'));
        };
        $usuario = $this->Usuario->findById($id);
        if (!$usuario) {
            throw new NotFoundException(__('Usuário não existe'));
        }

        if ($this->request->is(array('Usuario', 'put'))) {
            $this->Usuario->id = $id;
            if ($this->Usuario->save($this->request->data)) {
              $this->Flash->success(__('Perfil editado com sucesso'));
                return $this->redirect(array('controller' => 'Solicitacoes',
                    'action' => 'index'));
            }
            $this->Flash->error(__('erro ao editar o perfil'));
            return $this->redirect(array(
                    'action' => 'editar', $id));
        }

        if (!$this->request->data) {
            $this->request->data = $usuario;
        }
    }
}
