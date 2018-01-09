<?php
    
    class GlobalController extends AppController
    {
        
        public $uses
            = array(
                'Transaction'
            );
        
        function index()
        {
            
            if (empty($this->current_user['Service'])) {
                $this->Flash->set(h(__('На вашем аккаунте нет доступных сервисов :(')), array('element' => 'danger'));
                $this->redirect('/');
            }
            
            $services_ids = Hash::extract($this->current_user['Service'], '{n}.id');
            
            $end_date = strtotime('Today 23:59:59');
            $start_date = strtotime('- 29 days');
            $minimal_date = strtotime('2014-01-01');
            
            if ( !empty($this->request->data)) {
                $date_range = explode('/', $this->request->data['Transaction']['date']);
                
                if (count($date_range) === 2) {
                    $input_start_date = strtotime($date_range[0]);
                    $input_end_date = strtotime($date_range[1]);
                    
                    if (
                        $input_start_date !== false && $input_end_date !== false && $input_start_date > $minimal_date && $input_start_date < $input_end_date
                    ) {
                        
                        $start_date = $input_start_date;
                        $end_date = $input_end_date;
                    }
                    
                }
            }
            
            $this->request->data['Transaction']['date'] = date('Y-m-d', $start_date).' / '.date('Y-m-d', $end_date);
            
            $income_db_id = 1;
            $outcome_db_id = 2;
            
            $conditions = array(
                'conditions' => array(
                    'Transaction.date BETWEEN ? and ?' => array
                    (
                        date('Y-m-d 00:00:00', $start_date),
                        date('Y-m-d 23:59:59', $end_date),
                    ),
                    'Transaction.service_id'           => $services_ids,
                    'Transaction.operation_id'         => array($income_db_id, $outcome_db_id)
                ),
                'order'      => array('Transaction.date ASC')
            );
            
            $data_arr = $this->Transaction->find('all', $conditions);
            
            $has_transaction = true;
            if (empty($data_arr)) {
                $has_transaction = false;
            }
            
            $this->set('has_transaction', $has_transaction);
            
            if ($has_transaction === false) {
                return;
            }
            
            $plot_data = array();
            $services = array();
            foreach ($data_arr as $key => $value) {
                
                if ($value['Transaction']['operation_id'] === $income_db_id) {
                    $item = array(
                        'value' => $value['Transaction']['amount'],
                        'date'  => date("Y-m-d", strtotime($value['Transaction']['date']))
                    );
                    $plot_data[] = $item;
                }
                $services[$value['Transaction']['service_id']][$value['Transaction']['operation_id']][] = $value['Transaction']['amount'];
                
            }
            
            $user_services = Hash::combine($this->current_user['Service'], '{n}.id', '{n}');
            
            $diagram1 = array();
            $diagram2 = array();
            $diagram3 = array();
            $diagram4 = array();
            
            foreach ($services as $key => $value) {
                $income = 0;
                $outcome = 0;
                $transactionByIncome = 0;
                
                if ( !empty($value[$income_db_id])) {
                    $income = array_sum($value[$income_db_id]);
                    $transactionByIncome = count($value[$income_db_id]);
                }
                
                if ( !empty($value[$outcome_db_id])) {
                    $outcome = array_sum($value[$outcome_db_id]);
                }
                
                $diagram1[$key]['color'] = $user_services[$key]['color'];
                $diagram2[$key]['color'] = $user_services[$key]['color'];
                $diagram3[$key]['color'] = $user_services[$key]['color'];
                $diagram4[$key]['color'] = $user_services[$key]['color'];
                
                $diagram1[$key]['value'] = $income;
                if ($transactionByIncome !== 0) {
                    $diagram2[$key]['value'] = $income / $transactionByIncome;
                } else {
                    $diagram2[$key]['value'] = 0;
                }
                $diagram3[$key]['value'] = $transactionByIncome;
                $diagram4[$key]['value'] = $income - $outcome;
                
                $table[$key] = array(
                    'service_name'     => $user_services[$key]['title'],
                    'color'            => $user_services[$key]['color'],
                    'outcome'          => number_format($outcome, 2),
                    'middle_check'     => number_format($diagram2[$key]['value'],2),
                    'income_sum'       => number_format($income, 2),
                    'clean_income_sum' => number_format($diagram4[$key]['value'], 2)
                );
                
            }
            
            $this->set('plot_data', json_encode($plot_data, JSON_HEX_QUOT));
            
            $this->set('diagram1', json_encode($diagram1, JSON_HEX_QUOT));
            $this->set('diagram2', json_encode($diagram2, JSON_HEX_QUOT));
            $this->set('diagram3', json_encode($diagram3, JSON_HEX_QUOT));
            $this->set('diagram4', json_encode($diagram4, JSON_HEX_QUOT));
            
            $this->set('table', $table);
        }
    }