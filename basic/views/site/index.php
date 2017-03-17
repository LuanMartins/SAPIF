<?php

/* @var $this yii\web\View */

$this->title = 'TCC';
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>


<body id="page-top">
<header>
    <div class="header-content">
        <div class="header-content-inner">
            <img id="homeHeading" src=<?=Url::to("@web/logo/sgpif200x200.png")?>>
            <hr>
            <p>Fazendo sempre o melhor para que seus usuários possam ter a melhor informação da forma mais prática possivel, para que seu processor
            de permuta possa acontecer da forma mais agradavel</p>
            <a href="#services" class="btn btn-primary btn-xl page-scroll">Serviços</a>
        </div>
    </div>
</header>

<section class="bg-primary" id="about">

        <div id="texto">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Login</h2>
                <hr class="light">
            </div>
        </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">

                        <?php $form = ActiveForm::begin([
                                'id' => 'login-form',
                                'options' => ['class' => 'form-horizontal'],
                                'fieldConfig' => [
                                    'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
                                    'labelOptions' => ['class' => 'col-lg-2 control-label'],
                                ],

                            ]); ?>

                            <?= $form->field($user, 'email')->textInput(['placeholder' => "Enter Your Email"])->input('email')?>

                            <?= $form->field($user, 'password')->passwordInput() ?>
                            <?= $form->field($user, 'rememberMe', [
                                'template' => "{label}<div class=\"col-lg-offset-2 col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
                            ])->checkbox() ?>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <?= Html::submitButton(Yii::t('user', 'Login'), ['class' => 'btn btn-primary']) ?>

                                    <br/><br/>
                                    <?= Html::a(Yii::t("user", "Register"), ["/user/register"]) ?> /
                                    <?= Html::a(Yii::t("user", "Forgot password") . "?", ["/user/forgot"]) ?> /
                                    <?= Html::a(Yii::t("user", "Resend confirmation email"), ["/user/resend"]) ?>
                                </div>
                            </div>

                            <?php ActiveForm::end(); ?>

                            <?php if (Yii::$app->get("authClientCollection", false)): ?>
                                <div class="col-lg-offset-2 col-lg-10">
                                    <?= yii\authclient\widgets\AuthChoice::widget([
                                        'baseAuthUrl' => ['/user/auth/login']
                                    ]) ?>
                                </div>
                            <?php endif; ?>

                           
                </div>
            </div>


        </div>

</section>

<section id="services">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Serviços Oferecidos</h2>
                <hr class="primary">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-search text-primary sr-icons"></i>
                    <h3>Buscas Simples</h3>
                    <p class="text-muted">Busque pelos servidores que desejam realizar permutas na instituição na qual você esta lotado</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
                    <h3>Informação</h3>
                    <p class="text-muted">Disponha de toda a informação necessaria para entrar em contato com seu parceiro de permuta</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-envelope-o text-primary sr-icons"></i>
                    <h3>Mensagem</h3>
                    <p class="text-muted">Mande Um email para o servidor que tem interesse no seu campus direto do site</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-user text-primary sr-icons"></i>
                    <h3>Muitos Interessados</h3>
                    <p class="text-muted">Diversos servidores fazem uso do sistema, de diversos locais do país</p>
                </div>
            </div>
        </div>
    </div>

</section>

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">Fale Conosco! </h2>
                <hr class="light">
                <p>Duvidas, sugestões, reclamações... Entre em contato conosco a equipe do SGPif lhe responderá o mais breve possivel!</p>
            </div>
            <div class="col-lg-4 col-lg-offset-2 text-center">
                <div id="color">

                 <a href="http://www.facebook.com">
                    <i class="fa fa-facebook fa-3x sr-contact"></i>
                     </a>
                    <p>facebook.com</p>
                    </div>

            </div>
            <div class="col-lg-4 text-center">
                <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                <p><a href="mailto:your-email@your-domain.com">luan_18martins@hotmail.com</a></p>
            </div>
        </div>
    </div>
    </section>






<!-- jQuery -->

</body>