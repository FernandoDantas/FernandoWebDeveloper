<?php
ob_start();
require('./_app/Config.inc.php');
$Session = new Session;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">

        <!--[if lt IE 9]>
            <script src="../../_cdn/html5.js"></script>
         <![endif]-->  
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fernando Web Developer :: Desnvolvimento de sites e sistemas web</title>        
        <meta name="description" content="Tenha seu site pessoal, blog ou até mesmo um aplicativo ou sistema web personalizado para sua empresa!! "/>
        <meta name="keywords" content="Desenvolvimento de sistemas web, Sites e aplicativos mobile."/>
        <meta name="robots" content="index, follow"/>        

        <link rel="author" href="https://plus.google.com/u/0/103537220638041176724/posts"/>
        <link rel="publisher" href="https://plus.google.com/103537220638041176724"/>
        <link rel="canonical" href="http://localhost/www.fernandowebdeveloper.com.br/"/>

        <meta itemprop="name" content="Fernando Web Developer"/>
        <meta itemprop="description" content="Fernando Web Developer"/>
        <meta itemprop="image" content="images/index.jpg"/>
        <meta itemprop="url" content="http://localhost/www.fernandowebdeveloper.com.br/"/> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">        
        <link type="image/png" rel="icon" href="<?= INCLUDE_PATH; ?>/images/favicon.png">

        <?php
        $Link = new Link;
        $Link->getTags();
        ?>

        
        <link rel="stylesheet" type="text/css" href="<?= INCLUDE_PATH; ?>/css/style.css">
        <link rel="stylesheet" href="<?= HOME; ?>/_cdn/shadowbox/shadowbox.css">
        <link  href="https://fonts.googleapis.com/css?family=Lato:400,300,700"  rel="stylesheet" type="text/css">

    </head>
    <body>

        <?php
        require(REQUIRE_PATH . '/inc/header.inc.php');

        if (!require($Link->getPatch())):
            FWDErro('Erro ao incluir arquivo de navegação!', FWD_ERROR, true);
        endif;

        require(REQUIRE_PATH . '/inc/footer.inc.php');
        ?>

    </body>

    <script src="<?= HOME ?>/_cdn/jquery.js"></script>
    <script src="<?= HOME ?>/_cdn/jcycle.js"></script>
    <script src="<?= HOME ?>/_cdn/jmask.js"></script>
    <script src="<?= HOME ?>/_cdn/shadowbox/shadowbox.js"></script>
    <script src="<?= HOME ?>/_cdn/_plugins.conf.js"></script>
    <script src="<?= HOME ?>/_cdn/_scripts.conf.js"></script>
    <script src="<?= HOME ?>/_cdn/combo.js"></script>
</html>
<?php
ob_end_flush();
