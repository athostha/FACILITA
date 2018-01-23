<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class SolicitacoesController extends AppController{
    
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
    

    public function index(){
        $this->set('motivos', $this->Solicitacao->Motivo->find('all'));
        
        if ($this->request->is('post')) {
            $this->request->data['Solicitacao']['fechado'] = 0;
            $this->request->data['Solicitacao']['usuario_id'] = $this->Auth->user('id');
            if ($this->Solicitacao->saveAll($this->request->data,array('deep' => true))) {
                $this->Flash->success(__('Solicitação Registrada'));
                return $this->redirect(array('controller' => 'Solicitacoes' ,
                    'action' => 'index'));
            }
        }
        $this->set('solicitacoes', $this->Solicitacao->find('all', 
                array('conditions'=>array('usuario_id'=> $this->Auth->user('id'),
                    'Solicitacao.fechado' => 0),
                'order' => array('Solicitacao.id' => 'desc')
                )));
    }
    public function vispsicologo(){
        $this->set('solicitacoes', $this->Solicitacao->find('all',
                array('order' => array('Solicitacao.id' => 'desc'),
                    'conditions' => array('Solicitacao.fechado' => 0))));
    }
        public function visuser(){
        $this->set('solicitacoes', $this->Solicitacao->find('all', 
                array('conditions'=>array('usuario_id'=> $this->Auth->user('id'))),
                array('order' => array('Solicitacao.id' => 'desc'))));
    }
    
    public function solicita() {
        $this->set('motivos', $this->Solicitacao->Motivo->find('all'));
        
        if ($this->request->is('post')) {
            $this->request->data['Solicitacao']['fechado'] = 0;
            $this->request->data['Solicitacao']['usuario_id'] = $this->Auth->user('id');
            if ($this->Solicitacao->saveAll($this->request->data,array('deep' => true))) {
                $this->Flash->success(__('Solicitação Registrada'));
                return $this->redirect(array('controller' => 'Solicitacoes' ,
                    'action' => 'solicita'));
            }
        }  
    }
    public function fecharsolicitacao($id){
        $this->request->allowMethod('post');
        $this->Solicitacao->id = $id;
        if($this->Solicitacao->updateAll(array("Solicitacao.fechado" => 1),
                    array("Solicitacao.id" => $id))){
            $this->Flash->success(__('Solicitação finalizada'));
            return $this->redirect(array('action' => 'vispsicologo'));
        }
    }
    
    public function dados(){
        $this->Session->delete('search.begin', 'search.end');
        //Se o formulário for enviado
        if($this->request->is('post')){
            
            //Salvando os dados do formulário na sessão
            $this->Session->write('search.begin', $this->request->data('Busca.begin'));
            $this->Session->write('search.end', $this->request->data('Busca.end'));
            
        }
        
        if($this->Session->check('search.begin') && $this->Session->check('search.end')) {
            $end = null; $begin = null;
            $byear = $this->Session->read('search.begin.year');
            $bday = $this->Session->read('search.begin.day');
            $bmonth = $this->Session->read('search.begin.month');
            $begin = $byear."-".$bmonth."-".$bday." 00:00:00";
            $this->set('begin', $begin);
            
            $eyear = $this->Session->read('search.end.year');
            $eday = $this->Session->read('search.end.day');
            $emonth = $this->Session->read('search.end.month');
            $end = $eyear."-".$emonth."-".$eday." 23:59:59";
            $this->set('end',$end);
            
            $conditions = array('Solicitacao.created BETWEEN ? and ?' => array($begin,
                $end));
            //echo debug($conditions);
        // run the "select between" query
            $this->set('solicitacoes', $this->Solicitacao->find('count', 
                array('conditions'=> array($conditions,  'fechado' => 1))));
            $this->set('solicita', $this->Solicitacao->find('all', 
                array('conditions'=> array($conditions,  'fechado' => 1))));
            $this->set('motivos', $this->Solicitacao->Motivo->find('all'));
            $this->set('agendamentos', $this->Solicitacao->Agendamento->find('count',
                    array('conditions' => array('finalizado' => 1,
                        'Agendamento.data BETWEEN ? and ?' => array($begin, $end)))));
            /*
*/      }
    }
}