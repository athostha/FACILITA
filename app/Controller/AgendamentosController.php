<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AgendamentosController extends AppController{
    public function beforeFilter() {
        App::import('Core', 'l10n');
        parent::beforeFilter();
        $session = $this->Session->read('Auth.User.psicologo');
        if($session == 1){
            $this->Auth->allow();
        }else{
            $this->Auth->deny();
        }
    }
    public function beforeRender(){
        $this->set('agendados', $this->Agendamento->find('all', 
                array('conditions'=>array('Agendamento.usuario_id'=> $this->Auth->user('id'),
                    'Agendamento.finalizado' => 0)
                )));
        $this->set('contagendamentos', $this->Agendamento->find('count', 
                array('conditions'=>array(array('Agendamento.usuario_id'=> $this->Auth->user('id'),'Agendamento.finalizado' => 0))
                )));
        $this->set('alertamensagens', $this->Agendamento->Solicitacao->Mensagem->find('all', array('conditions' => array('Solicitacao.usuario_id'=> $this->Auth->user('id'),
            'Mensagem.usuario_id !='=> $this->Auth->user('id'), 'Mensagem.lido' => 0, 'Solicitacao.fechado'=>0))));
        $this->set('countalertamensagens', $this->Agendamento->Solicitacao->Mensagem->find('count', array('conditions' => array('Solicitacao.usuario_id'=> $this->Auth->user('id'),
            'Mensagem.usuario_id !='=> $this->Auth->user('id'), 'Mensagem.lido' => 0, 'Solicitacao.fechado'=>0))));
    }
    public function agendamentos(){
        $this->set('agendamentos', $this->Agendamento->find('all', array(
                'order' => array('Agendamento.data' => 'desc'),
                'conditions' => array('Agendamento.finalizado' => 0))));
        
    }
        public function delete($id) {        
        
        $this->request->allowMethod('post');
        $this->Agendamento->id = $id;
        if (!$this->Agendamento->exists()) {
            throw new NotFoundException(__('Agendamento Inválido'));
        }
         
        if ($this->Agendamento->delete($id)) {
            $this->Flash->success(__('Agendamento deletado'));
            return $this->redirect(array('action' => 'visagendamentos'));
        } else {
            debug($id);
        }
        $this->Flash->error(__('Erro ao deletar agendamento'));
        return $this->redirect(array('action' => 'visagendamentos'));
    }
    public function fechamento($id){
        $this->Agendamento->id = $id;

        if (!$id) {
            throw new NotFoundException(__('Invalido'));
        };
        $agendamento = $this->Agendamento->findById($id);
        if (!$agendamento) {
            throw new NotFoundException(__('Usuário não existe'));
        }

        if ($this->request->is(array('Agendamento', 'put'))) {
            $this->Agendamento->id = $id;
            $this->Agendamento->updateAll(array("Agendamento.finalizado" => 1), 
                    array("Agendamento.id" => $id));
            if ($this->Agendamento->save($this->request->data)) {
                
              $this->Flash->success(__('Agendamento finalizado com sucesso'));
                return $this->redirect(array(
                    'action' => 'agendamentos'));
            }
            $this->Flash->error(__('erro ao editar o perfil'));
            return $this->redirect(array(
                    'action' => 'fechamento', $id));
        }

        if (!$this->request->data) {
            $this->request->data = $agendamento;
        }
    }
}