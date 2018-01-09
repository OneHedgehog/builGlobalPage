<!-- Styles -->
<?php $this->append('custom_css'); ?>
<style>
    #chartdiv, #diagram1 {
        width: 100%;
        height: 500px;
    }
    
    #diagram1, #diagram2, #diagram3, #diagram4 {
        width: 70%;
        height: 500px;
    }
    
    table .m-badge {
        cursor: pointer;
    }

</style>
<?php $this->end() ?>

<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    <?php echo h(__('Дата пикер')) ?>
                </h3>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right" method="post" action="">
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12"><?php echo(h(__('Выберите нужный диапозон дат'))) ?></label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                    <div class='input-group pull-right' id='daterangepicker'>
                        <?php echo $this->Form->input('Transaction.date',
                            array(
                                'div'         => false,
                                'label'       => false,
                                'required'    => true,
                                'type'        => 'text',
                                'class'       => 'form-control m-input',
                                'placeholder' => h(__('Select date range')),
                            ));
                        ?>
                        <span class="input-group-addon"><i class="la la-calendar-check-o"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
                <div class="row">
                    <div class="col-lg-9 ml-lg-auto">
                        <button type="submit" class="btn btn-brand"><?php echo h(__('Отправить')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>

<?php if ($has_transaction === true): ?>
    <?php echo $this->Html->script('tabswitcher/tab.switcher.js') ?>
    <?php echo $this->Html->script('amcharts/amcharts.js') ?>
    <?php echo $this->Html->script('amcharts/pie.js') ?>
    <?php echo $this->Html->script('amcharts/serial.js') ?>
    <?php echo $this->Html->script('amcharts/amstock.js') ?>
    <?php echo $this->Html->script('export/export.min.js') ?>
    <?php echo $this->Html->css('export/export.css') ?>
    <?php echo $this->Html->script('amcharts/themes/light.js') ?>
    
    <div class="m-portlet m-portlet--responsive-mobile wemakesoft_tab">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text m--font-brand">
                        Am Chart
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <button type="button" class="m-btn btn btn-secondary"><i class="la la-file-text-o"></i></button>
                    <button type="button" class="m-btn btn btn-secondary"><i class="la la-floppy-o"></i></button>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div id="chartdiv"></div>
        </div>
        <div class="m-portlet__body">
            <div class="row">
                <div class="col-md-6">
                    <div id="diagram1"></div>
                </div>
                <div class="col-md-6">
                    <div id="diagram2"></div>
                </div>
                <div class="col-md-6">
                    <div id="diagram3"></div>
                </div>
                <div class="col-md-6">
                    <div id="diagram4"></div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="m-portlet m-portlet--responsive-mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="flaticon-technology m--font-brand"></i>
                    </span>
                    <h3 class="m-portlet__head-text m--font-brand">
                        <?php echo h(__('Таблица сервисов')); ?>
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
            </div>
        </div>
        <div class="m-portlet__body">
            <table class="table table-bordered datatable-div">
                <thead>
                    <tr>
                        <th title="Field #1"><?php echo h(__('Название сервиса')); ?></th>
                        <th title="Field #2"><?php echo h(__('Сума доходов транзакций')); ?></th>
                        <th title="Field #3"><?php echo h(__('Средний чек')); ?></th>
                        <th title="Field #4"><?php echo h(__('Сумма транзакций расходов')); ?></th>
                        <th title="Field #5"><?php echo h(__('Прибыль транзакций')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($table as $key => $value): ?>
                        <tr>
                            <td>
                                <span class="m-badge wemakesoft_label" style="background-color:<?php echo($value['color']); ?>" service_id="<?php echo $key; ?>"><?php echo($value['service_name']); ?></span>
                            </td>
                            <td><?php echo($value['income_sum']); ?></td>
                            <td><?php echo($value['middle_check']); ?></td>
                            <td><?php echo($value['outcome']); ?></td>
                            <td><?php echo($value['clean_income_sum']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php else: ?>
    <div class="m-portlet m-portlet--responsive-mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="flaticon-technology m--font-brand"></i>
                    </span>
                    <h3 class="m-portlet__head-text m--font-brand">
                        <?php echo h(__('Нету транзакций')) ?>
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
            </div>
        </div>
        <div class="m-portlet__body">
            <?php echo h(__('Что можно сделать?')) ?>
        </div>
    </div>
<?php endif; ?>

<?php $this->append('custom_js'); ?>
<script>
    // input group and left alignment setup
    $('#daterangepicker').daterangepicker({
        buttonClasses: 'm-btn btn',
        applyClass: 'btn-primary',
        cancelClass: 'btn-secondary',
        minDate: '01/01/2014',
        maxDate: moment(),
        ranges: {
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'Last 3 Months': [moment().subtract(3, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'Last 6 Months': [moment().subtract(6, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
        }
    }, function (start, end, label) {
        $('#daterangepicker .form-control').val(start.format('YYYY-MM-DD') + ' / ' + end.format('YYYY-MM-DD'));
    });


</script>
<?php $this->end(); ?>

<?php if ($has_transaction === true): ?>
    <?php $this->append('custom_js'); ?>
    <script>

        let plot_data = <?php echo($plot_data) ?>;
        let chart = AmCharts.makeChart("chartdiv", {
            "type": "stock",
            "theme": "light",
            "dataSets": [{
                "fieldMappings": [{
                    "fromField": "value",
                    "toField": "value"
                }],
                "dataProvider": plot_data,
                "categoryField": "date"
            }
            ],

            "panels": [{
                "showCategoryAxis": true,
                "title": "Value",
                "eraseAll": false,
                "stockGraphs": [{
                    "id": "g1",
                    "valueField": "value",
                    "comparable": true,
                    "compareField": "value",
                    "useDataSetColors": false
                }],
                "stockLegend": {
                    "periodValueTextComparing": "[[percents.value.close]]%",
                    "periodValueTextRegular": "[[value.close]]"
                }
            }],
            "chartCursorSettings": {
                "valueBalloonsEnabled": true,
                "fullWidth": true,
                "cursorAlpha": 0.1,
                "valueLineBalloonEnabled": true,
                "valueLineEnabled": true,
                "valueLineAlpha": 0.5,
                "selectWithoutZooming": true,
                "zoomable": false
            },
            "periodSelector": {
                "position": "top",
                "inputFieldsEnabled": false,
                "periods": [{
                    "period": "MM",
                    "count": 1,
                    "label": "1 month"
                }, {
                    "period": "YYYY",
                    "count": 1,
                    "label": "1 year"
                }, {
                    "period": "YTD",
                    "label": "YTD"
                }, {
                    "selected": true,
                    "period": "MAX",
                    "label": "MAX"
                }]
            },
            "chartScrollbarSettings": {
                "enabled": false
            },

            "export": {
                "enabled": false
            }
        });


        let diagram_data_set = [
            {
                dom_id: 'diagram1',
                data: getAmChartDataArr(<?php echo($diagram1) ?>)
            },
            {
                dom_id: 'diagram2',
                data: getAmChartDataArr(<?php echo($diagram2) ?>)
            },
            {
                dom_id: 'diagram3',
                data: getAmChartDataArr(<?php echo($diagram3) ?>)
            },
            {
                dom_id: 'diagram4',
                data: getAmChartDataArr(<?php echo($diagram4) ?>)
            }
        ];

        makePies(diagram_data_set);

        function makePies(diagram_data_set) {
            for (key in diagram_data_set) {

                if (diagram_data_set[key].data == false) {
                    continue;
                }

                drowDiagram(diagram_data_set[key].dom_id, diagram_data_set[key].data);
            }

        }

        function drowDiagram(diagramDomId, diagram_data) {

            AmCharts.makeChart(diagramDomId, {
                "type": "pie",
                "theme": "light",
                "pullOutDuration": 0,
                "pullOutRadius": 0,
                "startDuration": 0,
                "labelsEnabled": false,
                "dataProvider": diagram_data,
                "valueField": "value",
                "colorField": "color",
                "balloon": {
                    "fixedPosition": true
                },
                "export": {
                    "enabled": false
                }
            });
        }


        function getAmChartDataArr(diagram_data) {
            arr = [];
            for (key in diagram_data) {
                diagram_data[key].id = key;
                arr.push(diagram_data[key]);
            }

            return arr;
        }

        initTabs('.wemakesoft_tab');
    
    </script>
    <?php $this->end() ?>
    
    <?php $this->append('custom_js') ?>
    <script>
        const DatatableHtmlTableClass = function () {

            let initializer = () => {

                let datatable = $('.datatable-div').mDatatable({
                    pagination: false,
                    columns: [
                        {
                            field: '<?php echo h(__('Сума доходов транзакций')); ?>',
                            type: 'number',
                        },
                        {
                            field: '<?php echo h(__('Средний чек')); ?>',
                            type: 'number',
                        },
                        {
                            field: '<?php echo h(__('Сумма транзакций расходов')); ?>',
                            type: 'number',
                        },
                        {
                            field: '<?php echo h(__('Прибыль транзакций')); ?>',
                            type: 'number',
                        },
                    ],
                });
            };
            return {
                init: function () {
                    initializer();
                },
            };
        }();

        jQuery(document).ready(function () {
            DatatableHtmlTableClass.init();

            let service_label = $('.wemakesoft_label');
            service_label.attr('active', true);

            let can_click = true;
            let services = formServiceArr(service_label, null);
            let width = 'width:' + (service_label[0].getAttribute('style')).split('width:')[1];


            service_label.click((e) => {
                can_click = canClick(services);

                let targ = $(e.target);
                let active = targ.attr('active');
                let id = targ.attr('service_id');

                if (active === 'true' && can_click === true) {
                    active = 'false';
                    targ.attr('style', 'background-color: ' + services[id].bg_deactive + '; ' + width);

                } else if (active === 'false') {
                    active = 'true';
                    targ.attr('style', 'background-color: ' + services[id].bg_active + '; ' + width);
                } else if (active === 'true' && can_click === false) {
                    return;
                }


                targ.attr('active', active);
                services = formServiceArr(service_label, services);


                let diagram_data = [];
                for (let i = 0; i <= diagram_data_set.length - 1; i++) {
                    let item = diagram_data_set[i].data;

                    if (services[id].active === 'false') {
                        for (key in item) {
                            if (item[key].id == id) {
                                diagram_data.push(item[key]);
                                item.splice(key, 1);
                            }
                        }
                    }
                    else if (services[id].active === 'true') {
                        item.push(services[id].deactive_diagram_data[i])
                    }
                }
                services[id].deactive_diagram_data = diagram_data;
                makePies(diagram_data_set);

            });

            function formServiceArr(service_label, prev_services) {
                let services = {};

                service_label.each((index, value) => {
                    let service = {
                        id: $(value).attr('service_id'),
                        active: $(value).attr('active'),
                        bg_deactive: '#D6D8D9',
                        deactive_diagram_data: []
                    };
                    if (prev_services === null) {
                        service.bg_active = $(value).attr('style').split(':')[1];
                    }

                    services[service.id] = service;
                });

                if (prev_services !== null) {
                    for (key in prev_services) {
                        services[key].bg_active = prev_services[key].bg_active;
                        services[key].deactive_diagram_data = prev_services[key].deactive_diagram_data;
                    }
                }

                return services;
            }

            function canClick(services) {
                active_services = [];
                for (key in services) {
                    if (services[key].active === 'true') {
                        active_services.push(services[key].active)
                    }
                }
                if (active_services.length === 1) {
                    return false;
                }

                return true;
            }

        });
    </script>
    <?php $this->end() ?>

<?php endif; ?>
