<?php
    
    class ServiceController extends AppController
    {
        
        public $uses
            = array(
                'Transaction',
            );
        
        function index()
        {
            
            $user_services = $this->current_user['Service'];
            
            if (empty($user_services)) {
                $this->Flash->set(h(__('На вашем аккаунте нет доступных сервисов')), array('element' => 'danger'));
                $this->redirect('/');
                
                return;
            }
            
            $option_services = Hash::combine($user_services, '{n}.id', '{n}.title');
            $this->set('services', $option_services);
    
            $post_service_id = $user_services[0]['id'];
    
            if ( !empty($this->request->data['Transaction']['service_id'])
                 && array_key_exists($this->request->data['Transaction']['service_id'], $option_services)) {
                $post_service_id = $this->request->data['Transaction']['service_id'];
            }
    
            $start_date = strtotime(date('Y-m-01 00:00:00'));
            $end_date = strtotime(date('Y-m-d 23:59:59'));
            $min_date = strtotime('2014-01-01');
    
            if ( !empty($this->request->data['Transaction']['date'])) {
                $dates_range = explode(' / ', $this->request->data['Transaction']['date']);
        
                if (count($dates_range) === 2) {
                    $timestamp_start_date = strtotime($dates_range[0]);
                    $timestamp_end_date = strtotime($dates_range[1]);
            
                    if ($timestamp_start_date !== false && $timestamp_end_date !== false
                        && $timestamp_start_date > $min_date
                        && $timestamp_start_date <= $timestamp_end_date) {
                        
                        $start_date = $timestamp_start_date;
                        $end_date = $timestamp_end_date;
                    }
                }
            }
    
            $this->request->data['Transaction']['date'] = date('Y-m-d', $start_date).' / '.date('Y-m-d', $end_date);
            $this->request->data['Transaction']['service_id'] = $post_service_id;
            
            $transactions = $this->Transaction->find('all',
                array(
                    'order'      => array('Transaction.date ASC'),
                    'conditions' => array(
                        'Transaction.service_id'           => $post_service_id,
                        'Transaction.date BETWEEN ? and ?' => array
                        (
                            date('Y-m-d 00:00:00', $start_date),
                            date('Y-m-d 23:59:59', $end_date),
                        ),
                    ),
                )
            );
    
            if (empty($transactions)) {
                $this->Flash->set(h(__('Не найдено транзакций по вашим критериям')), array('element' => 'warning'));
            }
    
            $this->set('transactions', $transactions);
        }
    }