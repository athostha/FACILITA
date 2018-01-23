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
    
    public function visagendamentos(){
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
    
    public function fechar($id){
        $this->request->allowMethod('post');
        $this->Agendamento->id = $id;
        if($this->Agendamento->updateAll(array("Agendamento.finalizado" => 1),
                        array("Agendamento.id" => $id))){
            $this->Flash->success(__('Agendamento finalizado'));
            return $this->redirect(array('action' => 'visagendamentos'));
        }
    }
}
