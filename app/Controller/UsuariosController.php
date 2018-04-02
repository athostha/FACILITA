<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UsuariosController extends AppController{
    
       public function beforeFilter() {
        parent::beforeFilter();
        if(null !==($this->Session->read('Auth.User'))){
        $this->Auth->deny('cadastro','login');
        $this->Auth->allow('logout');
        if($this->params['action']=='login' || $this->params['action']=='cadastro'){
            return $this->redirect(array(
                        'controller' => 'solicitacoes',
                        'action' => 'index'));
        }
         } else {
             $this->Auth->allow('cadastro','logout','login');
         }
        $this->Auth->deny('perfil');
    }
    public function beforeRender(){
        if ($this->request->here != '/facilita/usuarios/login') {
            if($this->request->here != '/facilita/usuarios/cadastro'){
                $this->set('agendados', $this->Usuario->Solicitacao->Agendamento->find('all', 
                        array('conditions'=>array('Agendamento.usuario_id'=> $this->Auth->user('id'),
                            'Agendamento.finalizado' => 0)
                        )));
                $this->set('contagendamentos', $this->Usuario->Solicitacao->Agendamento->find('count', 
                        array('conditions'=>array(array('Agendamento.finalizado' => 0, 'Agendamento.usuario_id'=>$this->Auth->user('id')))
                        )));
                $this->set('alertamensagens', $this->Usuario->Solicitacao->Mensagem->find('all', array('conditions' => array('Solicitacao.usuario_id'=> $this->Auth->user('id'),
                    'Mensagem.usuario_id !='=> $this->Auth->user('id'), 'Mensagem.lido' => 0, 'Solicitacao.fechado'=>0))));
                $this->set('countalertamensagens', $this->Usuario->Solicitacao->Mensagem->find('count', array('conditions' => array('Solicitacao.usuario_id' => $this->Auth->user('id'),
                    'Mensagem.usuario_id !='=> $this->Auth->user('id'), 'Mensagem.lido' => 0, 'Solicitacao.fechado'=>0))));
            }
        }
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
    public function cadastro() {
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
        'limit' => 15,
        'order' => array(
            'Usuario.id' => 'asc'
        )
    );
    public function usuarios($tipo = null){
        //$this->set('usuarios', $this->Usuario->find('all',
        //        array('conditions' => array('Usuario.psicologo' => 0))));
        
    //    $this->Paginator->settings = $this->paginate;

    // similar to findAll(), but fetches paged results
    //    $posts = $this->Paginator->paginate('Usuario',
    //            array('Usuario.psicologo' => 0));
    //    $this->set('usuarios', $posts);
        
        if($tipo == 'new'){
            $this->Session->delete('busca.Nome', 'busca.Matricula');
            //$this->Paginator->settings = $this->paginate;
        
            //$posts = $this->Paginator->paginate('Post',
           //array('User.id' => 0));
            //$this->set('posts', $posts);
        }
        if(!isset($posts)){
            $this->Paginator->settings = $this->paginate;
        
            $posts = $this->Paginator->paginate('Usuario',
            array('Usuario.psicologo !=' => 1,
                'nome LIKE' => '%',
                'matricula LIKE' => '%'));
            $this->set('usuarios', $posts);
        }
        
        //Se o formulário for enviado
        if($this->request->is('post')){
            
            //Salvando os dados do formulário na sessão
            $this->Session->write('busca.Nome', $this->request->data('buscar.Nome'));
            $this->Session->write('busca.Matricula', $this->request->data('buscar.Matricula'));
            //return $this->redirect(array('action' => 'search'));
            
        }
        
        if($this->Session->check('busca.Nome') && $this->Session->check('busca.Matricula')) {
            
            $this->Paginator->settings = $this->paginate;
        
            $posts = $this->Paginator->paginate('Usuario',
            array('Usuario.psicologo !=' => 1,
                'nome LIKE' => '%'.$this->Session->read('busca.Nome').'%',
                'matricula LIKE' => '%'.$this->Session->read('busca.Matricula').'%'));

            $this->set('usuarios', $posts);
        }
    }
    //edita usuário existente
    public function perfil($id){
        if($this->request->is('post')){
            if(!empty($this->request->data['Usuario']['upload']['name'])){
                $file = $this->request->data['Usuario']['upload']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions
                
                //only process if the extension is valid
                if(in_array($ext, $arr_ext)){
                        //do the actual uploading of the file. First arg is the tmp name, second arg is 
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/usuarios/' . $id . '.png');
                        //prepare the filename for database entry
                        //$this->request->data['Usuario']['imagem'] = $file['name'];
                }
            }
        }
        $this->Usuario->id = $id;
        $this->set('id', $id);

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
                    'action' => 'perfil', $id));
        }

        if (!$this->request->data) {
            $this->request->data = $usuario;
        }
        
    }
    public function perfilpsicologo($id){
        if($this->request->is('post')){
            if(!empty($this->request->data['Usuario']['upload']['name'])){
                $file = $this->request->data['Usuario']['upload']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions
                
                //only process if the extension is valid
                if(in_array($ext, $arr_ext)){
                        //do the actual uploading of the file. First arg is the tmp name, second arg is 
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/usuarios/' . $id . '.png');
                        //prepare the filename for database entry
                        //$this->request->data['Usuario']['imagem'] = $file['name'];
                }
            }
        }
        $this->Usuario->id = $id;
        $this->set('id', $id);

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
                    'action' => 'perfil', $id));
        }

        if (!$this->request->data) {
            $this->request->data = $usuario;
        }
        
    }
    //deleta usuário
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Usuario->delete($id)) {
            $this->Flash->success(
                __('Usuário de id: %s foi deletado.', h($id))
            );
            return $this->redirect(array('controller' => 'usuarios',
                'action' => 'usuarios'));
        } else {
            $this->Flash->error(
                __('Motivo de id: %s não pode ser deletado deletado.', h($id))
            );
        }
    }
    /*public function perfil($id){
        $this->set('usuario', $this->Usuario->findByid($id));
        $this->set('agendamentos', $this->Usuario->Solicitacao->Agendamento->find('all',
                        array('order' => array('Agendamento.data' => 'desc'),
                            'conditions' => array('Usuario.id' => $id))));
        $this->set('solicitacoes', $this->Usuario->Solicitacao->find('all',
                        array('order' => array('Solicitacao.id' => 'desc'),
                            'conditions' => array('Usuario.id' => $id))));
        if ($this->request->is('post')) {
            if(!empty($this->request->data['Usuario']['upload']['name'])){
                $file = $this->request->data['Usuario']['upload']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions

                //only process if the extension is valid
                if(in_array($ext, $arr_ext)){
                
                        //do the actual uploading of the file. First arg is the tmp name, second arg is 
                        //where we are putting it
                        if(move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/usuarios/' . $id . '.png')){
                            echo debug($file);
                        }

                        //prepare the filename for database entry
                        //$this->request->data['Usuario']['imagem'] = $file['name'];
                }
            }
        }
    }*/
    
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
                    'action' => 'perfil', $id));
        }

        if (!$this->request->data) {
            $this->request->data = $usuario;
        }
    }
}
