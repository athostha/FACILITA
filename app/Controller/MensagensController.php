<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MensagensController extends AppController{
        public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->deny();
    }
    public function beforeRender(){
        $this->set('agendados', $this->Mensagem->Solicitacao->Agendamento->find('all', 
                array('conditions'=>array('Agendamento.usuario_id'=> $this->Auth->user('id'),
                    'Agendamento.finalizado' => 0)
                )));
        $this->set('contagendamentos', $this->Mensagem->Solicitacao->Agendamento->find('count', 
                array('conditions'=>array(array('Agendamento.finalizado' => 0,'Agendamento.usuario_id'=> $this->Auth->user('id')))
                )));
        $this->set('alertamensagens', $this->Mensagem->find('all', array('conditions' => array('Solicitacao.usuario_id'=> $this->Auth->user('id'),
            'Mensagem.usuario_id !='=> $this->Auth->user('id'), 'Mensagem.lido' => 0, 'Solicitacao.fechado'=>0))));
        $this->set('countalertamensagens', $this->Mensagem->find('count', array('conditions' => array('Solicitacao.usuario_id'=> $this->Auth->user('id'),
            'Mensagem.usuario_id !='=> $this->Auth->user('id'), 'Mensagem.lido' => 0, 'Solicitacao.fechado'=>0))));
    }
    public function atendimento($solicitacaoid){
        //exibe solicitacao selecionada
        $solicitacoes = $this->Mensagem->Solicitacao->find('all');
        foreach ($solicitacoes as $solicitacao):
            if($solicitacao['Solicitacao']['id'] == $solicitacaoid){
                $this->set('descricaosolicitacao', $solicitacao);
                $solicita = $solicitacao;
            }
        endforeach;
        
        //exibe mensagens relacionadas a solicitacao selecionada
        $this->Mensagem->solicitacao_id = $solicitacaoid;
        $this->set('mensagens', $this->Mensagem->find('all',
            array('conditions' => array('solicitacao_id' => $solicitacaoid),
                'order' => array('Mensagem.id' => 'asc'))));
        

        
        //marca mensagem como lida
        $mensagenslidas = $this->Mensagem->find('all',
            array('conditions' => array('solicitacao_id' => $solicitacaoid)));
        //echo debug($mensagenslidas);
        foreach ($mensagenslidas as $mensagemlida):
            
        if(($mensagemlida['Mensagem']['lido'] == 0)
                &&($mensagemlida['Mensagem']['usuario_id'] != $this->Auth->user('id'))
                &&($mensagemlida['Mensagem']['solicitacao_id'] == $solicitacaoid)
                &&($mensagemlida['Usuario']['psicologo'] != $this->Auth->User('psicologo'))){
            //echo debug($mensagemlida);
            if($this->Mensagem->updateAll(array("Mensagem.lido" => 1), 
                    array("Mensagem.solicitacao_id" => $solicitacaoid))){
                $this->Flash->success(__('Mensagem marcada como lida'));
            }
        }
        endforeach;
        
        



//Salva nova mensagem
        if ($this->request->is('post')) {
            if($this->request->data('Mensagem')){
                $this->request->data['Mensagem']['lido'] = 0;
                $this->request->data['Mensagem']['solicitacao_id'] = $solicitacaoid;
                $this->request->data['Mensagem']['usuario_id'] = $this->Auth->user('id');
                if ($this->Mensagem->save($this->request->data)) {
                    $this->Flash->success(__('Mensagem Registrada'));
                    return $this->redirect(array('controller' => 'Mensagens' ,
                        'action' => 'atendimento', $solicitacaoid));
                }
            }
            
            
            
        //agenda consulta
            if($this->request->data('Agendar')){
                $data = $this->request->data['Agendar']['dia'];
                $hora = $this->request->data['Agendar']['hora'];
                echo debug($this->request->data);
                if(strlen($data) == 10){
                    $end = $data." ".$hora.":00";
                    //echo debug($data);
                    echo debug($end);

                    $this->request->data['Agendamento']['data'] = $end;
                    $this->request->data['Agendamento']['solicitacao_id'] = $solicitacaoid;
                    $this->request->data['Agendamento']['usuario_id'] = $solicita['Solicitacao']['usuario_id'];
                    $this->request->data['Agendamento']['local'] = $this->request->data['Agendar']['local'];
                    echo debug($this->request->data);
                    if ($this->Mensagem->Solicitacao->Agendamento->save($this->request->data)){
                        $this->Flash->success(__('Data Agendada'));
                        return $this->redirect(array('controller' => 'Mensagens',
                            'action' => 'atendimento', $solicitacaoid));
                    }else{
                        $this->Flash->error(__('Data incorreta'));
                    }
                    
                }else{
                    $this->Flash->error(__('Data incorreta'));
                }
            }
        }
    }
        
    public function atendimentofinalizado($solicitacaoid){
        //exibe solicitacao selecionada
        $solicitacoes = $this->Mensagem->Solicitacao->find('all');
        foreach ($solicitacoes as $solicitacao):
            if($solicitacao['Solicitacao']['id'] == $solicitacaoid){
                $this->set('descricaosolicitacao', $solicitacao);
                
            }
        endforeach;
        $this->set('agendamentos', $this->Mensagem->Solicitacao->Agendamento->find('all',
                        array('order' => array('Agendamento.data' => 'desc'),
                            'conditions' => array('Solicitacao.id' => $solicitacaoid))));
        //exibe mensagens relacionadas a solicitacao selecionada
        $this->Mensagem->solicitacao_id = $solicitacaoid;
        $this->set('mensagens', $this->Mensagem->find('all',
            array('conditions' => array('solicitacao_id' => $solicitacaoid),
                'order' => array('Mensagem.id' => 'asc'))));
    }
}
