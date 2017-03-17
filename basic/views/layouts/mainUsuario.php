<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\helpers\Url;
\yiister\gentelella\assets\Asset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" href="./logo/sgpif16x16.ico" type="image/x-icon" />
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    
    <![endif]-->
</head>

<?php $this->beginBody(); ?>
<body class="nav-md">
<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href=<?=Url::to('principal')?> class="site_title"><img  src=<?=Url::to('@web/logo/sgpif45x45.png')?>> <span>SGPIF</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src= <?= url::to('@web/uploaded/imagens/'.$this->params['usuario']->foto); ?> class="img-circle profile_img">

                    </div>
                    <div class="profile_info">
                        <span>Bem Vindo,</span>
                        <h2><?=$this->params['usuario']->nome?></h2>
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3>Geral</h3>

                        <?php if(!yii::$app->user->can("admin")){?>
                        <?=

                            \yiister\gentelella\widgets\Menu::widget(
                                [
                                    "items" => [
                                        ["label" => "Home", "url" => [url::to('/usuario/principal')], "icon" => "home"],
                                        ["label" => "Pesquisa", "url" => [url::to('/usuario/pesquisa')], "icon" => "search"],

                                        /*["label" => "Error page", "url" => ["site/error-page"], "icon" => "close"],
                                        [
                                            "label" => "Widgets",
                                            "icon" => "th",
                                            "url" => "#",
                                            "items" => [
                                                ["label" => "Menu", "url" => ["site/menu"]],
                                                ["label" => "Panel", "url" => ["site/panel"]],
                                            ],
                                        ],
                                        [
                                            "label" => "Badges",
                                            "url" => "#",
                                            "icon" => "table",
                                            "items" => [
                                                [
                                                    "label" => "Default",
                                                    "url" => "#",
                                                    "badge" => "123",
                                                ],
                                                [
                                                    "label" => "Success",
                                                    "url" => "#",
                                                    "badge" => "new",
                                                    "badgeOptions" => ["class" => "label-success"],
                                                ],
                                                [
                                                    "label" => "Danger",
                                                    "url" => "#",
                                                    "badge" => "!",
                                                    "badgeOptions" => ["class" => "label-danger"],
                                                ],
                                            ],
                                        ],
                                        [
                                            "label" => "Multilevel",
                                            "url" => "#",
                                            "icon" => "table",
                                            "items" => [
                                                [
                                                    "label" => "Second level 1",
                                                    "url" => "#",
                                                ],
                                                [
                                                    "label" => "Second level 2",
                                                    "url" => "#",
                                                    "items" => [
                                                        [
                                                            "label" => "Third level 1",
                                                            "url" => "#",
                                                        ],
                                                        [
                                                            "label" => "Third level 2",
                                                            "url" => "#",
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],*/
                                    ],
                                ]
                            )

                        ?>
                        <?php }else{ ?>
                        <?=

                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    ["label" => "Home", "url" => [url::to('/')], "icon" => "home"],
                                    ["label" => "Pesquisa", "url" => [url::to('/usuario/pesquisa')], "icon" => "search"],
                                    ["label" => "Usuários", "url" => [url::to('/user/admin')], "icon" => "user"],
                                    ["label" => "Administração", "url" => "#", "icon" => "table",

                                        "items" =>[

                                            ["label"=> "Aréa", "icon" => "table", "url" => [url::to('/area/')]],
                                            ["label"=> "Campus", "icon" => "table", "url" => [url::to('/campus/')]],
                                            ["label"=> "Cidade", "icon" => "table", "url" => [url::to('/cidade/')]],
                                            ["label"=> "Estado", "icon" => "table", "url" => [url::to('/estado/')]],
                                            ["label"=> "Instituição", "icon" => "table", "url" => [url::to('/instituicao/')]],
                                            ["label"=> "Regime", "icon" => "table", "url" => [url::to('/regime/')]],
                                            ["label"=> "Titulação", "icon" => "table", "url" => [url::to('/titulacao/')]],
                                            ["label"=> "Turno", "icon" => "table", "url" => [url::to('/turno/')]],



                                                        ]


                                    ],
                                    /*["label" => "Error page", "url" => ["site/error-page"], "icon" => "close"],
                                    [
                                        "label" => "Widgets",
                                        "icon" => "th",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Menu", "url" => ["site/menu"]],
                                            ["label" => "Panel", "url" => ["site/panel"]],
                                        ],
                                    ],
                                    [
                                        "label" => "Badges",
                                        "url" => "#",
                                        "icon" => "table",
                                        "items" => [
                                            [
                                                "label" => "Default",
                                                "url" => "#",
                                                "badge" => "123",
                                            ],
                                            [
                                                "label" => "Success",
                                                "url" => "#",
                                                "badge" => "new",
                                                "badgeOptions" => ["class" => "label-success"],
                                            ],
                                            [
                                                "label" => "Danger",
                                                "url" => "#",
                                                "badge" => "!",
                                                "badgeOptions" => ["class" => "label-danger"],
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Multilevel",
                                        "url" => "#",
                                        "icon" => "table",
                                        "items" => [
                                            [
                                                "label" => "Second level 1",
                                                "url" => "#",
                                            ],
                                            [
                                                "label" => "Second level 2",
                                                "url" => "#",
                                                "items" => [
                                                    [
                                                        "label" => "Third level 1",
                                                        "url" => "#",
                                                    ],
                                                    [
                                                        "label" => "Third level 2",
                                                        "url" => "#",
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],*/
                                ],
                            ]
                        )

                        ?>

                        <?php } ?>


                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->

                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src=<?= url::to('@web/uploaded/imagens/'.$this->params['usuario']->foto); ?> alt=""><?=$this->params['usuario']->nome ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">

                                <li>
                                    <a href=<?=Url::to(['/user/account'])?>>
                                        <span class="glyphicon glyphicon-user"></span>
                                        <span>Conta</span>
                                    </a>
                                </li>
                                
                                <li>

                                    <?php echo Html::a('Log Out', Url::to(['/user/logout']), [
                                            'data-confirm' => "Realmente Quer Sair ?", // <-- confirmation works...
                                            'data-method' => 'post',
                                            'data-params' => 'myParam=anyValue',
                                            'class' => 'fa fa-sign-out pull-right',
                                        ]
                                    );
                                    ?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>

                </div>
            <?php endif; ?>
            <div class="clearfix"></div>
            <?= $content ?>

        </div>


        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com" rel="nofollow" target="_blank">Colorlib</a><br />
                Extension for Yii framework 2 by <a href="http://yiister.ru" rel="nofollow" target="_blank">Yiister</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
</body>
<!-- /footer content -->
<?php $this->endBody(); ?>

</html>
<?php $this->endPage(); ?>
