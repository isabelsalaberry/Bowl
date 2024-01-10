<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
$this->registerCssFile('/css/homepage.css');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100" style="background-color: blanchedalmond">
<?php $this->beginBody() ?>

<header id="header">
    <div class="bg-imagem" style="background-image: url('/imagens/bg-banner-homepage.jpg');">
        <div class="container mx-auto d-sm-flex d-block flex-sm-nowrap" style="justify-content: center">
            <?php
            NavBar::begin([
                'brandLabel' => '<img src="/imagens/logo-texto-embaixo.png" width="50">',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => ['class' => 'navbar navbar-expand-sm navbar-light', 'style' => 'display: flex;']
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav', 'style' => 'border-radius: 10px; 
    background-color: #9AB21C; 
    padding: 5px;'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'Ingredientes do Dia', 'url' => ['/site/ingredientes-do-dia']],
                    ['label' => 'Sobre Nós', 'url' => ['/site/about']],
                    ['label' => 'Contactos', 'url' => ['/site/contact']],
                    ['label' => 'Refeições', 'url' => ['/refeicao/index']],
                    ['label' => 'Ingredientes', 'url' => ['/ingrediente/index']],
                    ['label' => 'Categorias', 'url' => ['/categoria-ingrediente/index']],
                    ['label' => 'Mensagens', 'url' => ['/mensagem/index']],
                    ['label' => 'Pedidos', 'url' => ['/pedido/index']],
                    ['label' => 'Clientes', 'url' => ['/cliente/index']],
                    Yii::$app->user->isGuest
                        ? ['label' => 'Login', 'url' => ['/user/login']]
                        : '<li class="nav-item">'
                        . Html::beginForm(['/site/logout'])
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'nav-link btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>',
                ]
            ]);
            NavBar::end();
            ?>
        </div>
    </div>
</header>

<main id="main" class="flex-shrink-0" role="main" style="background-color: blanchedalmond">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3" style="background-color: #9AB21C;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <img src="/imagens/bowl-text-logo-transp.png" alt="..." height="30">
            </div>
            <div class="col-md-6 text-center text-md-end">&copy; Bowl. <?= date('Y') ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
