<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--singin m-login--2 m-login-2--skin-2" id="m_login">
		<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
			<div class="m-login__container">
				<div class="m-login__signin">
					<div class="m-login__head">
						<h3 class="m-login__title">

							<?php echo h(__('Зайти в админ панель')); ?>

						</h3>
					</div>
                    <?php echo $this->Flash->render(); ?>
					<form action="" id="UserLoginForm" method="post" accept-charset="utf-8" class="m-login__form m-form">
						<div class="form-group m-form__group">
                            <?php echo $this->Form->input('User.login',
                                array(
                                    'div'         => false,
                                    'label'       => false,
                                    'required'    => true,
                                    'type'        => 'text',
                                    'class'       => 'form-control m-input',
                                    'placeholder' => h(__('имя пользователя')),
                                ));
                            ?>
						</div>
						<div class="form-group m-form__group">
                            <?php echo $this->Form->input('User.password',
                                array(
                                    'div'         => false,
                                    'label'       => false,
                                    'required'    => true,
                                    'type'        => 'password',
                                    'class'       => 'form-control m-input m-login__form-input--last',
                                    'placeholder' => h(__('пароль'))
                                ));
                            ?>
						</div>
						<div class="m-login__form-action">
							<button type="submit"
									id="m_login_signin_submit"
									class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">

								<?php echo h(__('Войти')); ?>

							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end:: Page -->