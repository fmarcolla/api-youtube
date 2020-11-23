
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Meu Projeto</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="icon" type="imagem/png" href="" />
        <?= $this->renderStyle() ?>

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="skin-blue layout-top-nav" data-new-gr-c-s-check-loaded="14.984.0" data-gr-ext-installed="" style="height: auto; min-height: 100%;" cz-shortcut-listen="true">
        <div class="wrapper" style="height: auto; min-height: 100%;">
            <header class="main-header">
                <nav class="navbar navbar-static-top">
                    <div class="container">
                    </div>
                </nav>
            </header>
            <div class="content-wrapper" style="min-height: 524px;">
                <div class="container">
                <section class="content">
                    <div class="box box-default">
                        <div class="box-body">
                            <form action="<?= URL ?>" method="GET">
                                <div class="row">
                                    <div class="col-md-5 box-campos-busca">
                                        <label>Buscar</label>
                                        <input required type="text" autocomplete="off" class="form-control" placeholder="Pesquisar" name="palavra_chave" value="<?= (isset($_GET['palavra_chave']) ? $_GET['palavra_chave'] : ''); ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <?php for($day = 1; $day <= $weekDaysFields; $day++){ ?>
                                        <div class="col-md-2 box-campos-busca">
                                            <label>Dia <?= $day; ?></label>
                                            <input required type="number" autocomplete="off" class="form-control" placeholder="Minutos" name="days[]" value="<?= (isset($_GET['days'][$day - 1]) ? $_GET['days'][$day - 1] : ''); ?>">
                                        </div>
                                    <?php }  ?>
                                    <div class="col-md-1 box-btn-pesquisar">
                                        <button type="submit" class="btn btn-success" name="filtrar">Pesquisar <i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            <?php if($mostFrequentWords != ""){ ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="frase-termos-frequentes"><b>Termos mais frequentes na sua pesquisa:</b> <?= $mostFrequentWords; ?></h5>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if($totalDays != ""){ ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="frase-termos-frequentes"><b>Total de 'dias' necessários para assistir todos os vídeos:</b> <?= $totalDays; ?></h5>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php foreach($videosPerDay as $day){ ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                    <i class="fa fa-calendar"></i><h3 class="box-title">Dia <?= $day['day']; ?></h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row docs-premium-template">

                                        <?php if(count($day['videos']) > 0){ ?>
                                            <?php foreach($day['videos'] as $video){ ?>
                                                
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="box box-solid">
                                                        <div class="box-body">
                                                            <h4 class="video-title">
                                                                <?= $video['snippet']['title'] ?>
                                                            </h4>
                                                            <div class="media">
                                                                <div class="media-body">
                                                                    <div class="clearfix">
                                                                        <div class="box-iframe-video">
                                                                            <?= $video['player']['embedHtml'] ?>
                                                                        </div>
                                                                        <hr>
                                                                        <p class="box-titulo-descricao-video">Descrição do Vídeo:</p>
                                                                        <p class="box-descricao-video"><?= nl2br($video['snippet']['description']); ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            <?php } ?>
                                        <?php }else{ ?>

                                            <div class="col-md-12 text-center">
                                                <h4 class="frase-sem-video-exibicao">Nenhum vídeo para exibir nesse dia!</h4>
                                            </div>

                                        <?php } ?>
                                    </div>
                                    <footer class="footer text-center">
                                        <div class="container">
                                            <b>Tempo disponível no dia:</b> <?= $day['minutesLimitDay']; ?> Minutos | <b>Tempo total dos vídeos:</b> <?= $day['totalVideosMinutes']; ?> Minutos
                                        </div>
                                    </footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </section>
                </div>
            </div>
            <footer class="main-footer">
                <div class="container">
                    <strong>Copyright © 2020.</strong> All rights
                    reserved.
                </div>
            </footer>
        </div>
    </body>
</html>