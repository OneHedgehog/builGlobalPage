<!--begin::Portlet-->
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    <?php echo h(__('Транзакции')); ?>
                </h3>
            </div>
        </div>
    </div>

    <!--begin::Form-->
    <form action="" id="ServiceTransactionForm" method="post" class="m-form m-form--fit m-form--label-align-right" accept-charset="utf-8">
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12"><?php echo h(__('Выберите Сервис')); ?></label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                    <div class="form-group m-form__group">
                        <?php echo $this->Form->input('Transaction.service_id',
                            array(
                                'div'         => false,
                                'label'       => false,
                                'required'    => true,
                                'type'        => 'select',
                                'class'       => 'form-control m-input m-input--square',
                                'placeholder' => h(__('Имя Сервиса')),
                                'options'     => $services,
                                'empty'       => false,
                            ));
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12"><?php echo h(__('Период Дат')); ?></label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                    <div class='input-group pull-right' id='m_daterangepicker_6'>
                        <?php echo $this->Form->input('Transaction.date',
                            array(
                                'div'         => false,
                                'label'       => false,
                                'required'    => true,
                                'type'        => 'text',
                                'class'       => 'form-control m-input',
                                'placeholder' => h(__('Выберите дату')),
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
<!--end::Portlet-->

<?php if (empty($transactions)): ?>
    <!--begin::Portlet-->
    <div class="m-portlet m-portlet--responsive-mobile">
        <div class="m-portlet__body">
            <?php echo h(__('Не найдено транзакций за указанный период')); ?>
        </div>
    </div>
    <!--end::Portlet-->
<?php else: ?>
    <!--begin::Portlet-->
    <div class="m-portlet m-portlet--responsive-mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="flaticon-technology m--font-brand"></i>
                    </span>
                    <h3 class="m-portlet__head-text m--font-brand"></h3>
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
            ГРАФИК #1
        </div>
        <div class="m-portlet__body">
            ГРАФИК #2
        </div>
    </div>
    <!--end::Portlet-->

    <!--begin::Portlet-->
    <div class="m-portlet m-portlet--responsive-mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="flaticon-technology m--font-brand"></i>
                    </span>
                    <h3 class="m-portlet__head-text m--font-brand">
                        Portlet Toolbar
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
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
            galley
            of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
            unknown
            printer took a galley of type and scrambled.
        </div>
        <div class="m-portlet__body">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
            galley
            of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
            unknown
            printer took a galley of type and scrambled.
        </div>
    </div>
    <!--end::Portlet-->
<?php endif; ?>

<?php $this->append('custom_js'); ?>
<script>
    $('#m_daterangepicker_6').daterangepicker({
        buttonClasses: 'm-btn btn',
        applyClass: 'btn-primary',
        cancelClass: 'btn-secondary',
        minDate: '2014-01-01',
        maxDate: moment(),
        ranges: {
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'Last 3 Months': [moment().subtract(3, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'Last 6 Months': [moment().subtract(6, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
        }
    }, function (start, end, label) {
        $('#m_daterangepicker_6 .form-control').val(start.format('YYYY-MM-DD') + ' / ' + end.format('YYYY-MM-DD'));
    });
</script>
<?php $this->end(); ?>