<?php
$View = new View;
$tpl_banner = $View->Load('article_banner');
$tpl_ultimas = $View->Load('article_ultimas');
?>

<!--INICIO DO BANNER-->
<div class="banner container">
    <h1 class="oculto">Venha conhecer e aprender sobre o mundo da tecnologia com fernando web developer!</h1>
    <?php
    $cat = Check::CatByName('noticias');
    $post = new Read;
    $post->ExeRead("fwd_posts", "WHERE post_status = 1 AND (post_cat_parent = :cat OR post_category = :cat) ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "cat={$cat}&limit=1&offset=0");
    if (!$post->getResult()):
        FWDErro('Desculpe, ainda não existem noticias cadastradas. Favor volte mais tarde!', FWD_INFOR);
    else:
        foreach ($post->getResult() as $Slide):
            $Slide['post_title'] = Check::Words($Slide['post_title'], 4);
            $Slide['post_content'] = Check::Words($Slide['post_content'], 16);
            $Slide['datetime'] = date('Y-m-d', strtotime($Slide['post_date']));
            $Slide['pubdate'] = date('d/m/Y H:i:s', strtotime($Slide['post_date']));
            $View->Show($Slide, $tpl_banner);
        endforeach;
    endif;
    ?>
</div>
<!--FIM DO BANNER-->

<!--INICIO DAS ULTIMAS NOTICIAS-->
<main class="servicos container">
    <h1 class="oculto">Útimas do site!</h1>
    <?php
    $destaques = new Read();
    $destaques->ExeRead("fwd_posts", "WHERE post_status = 1 ORDER BY post_views DESC, post_date DESC LIMIT 3");
    if (!$destaques->getResult()):
        FWDErro("Desulculpe, nenhuma noticia em destaque neste momento. Favor volte depois!", FWD_INFOR);
    else:
        foreach ($destaques->getResult() as $destaquesMaisVistos):
            $destaquesMaisVistos['post_title'] = Check::Words($destaquesMaisVistos['post_title'], 12);
            $destaquesMaisVistos['post_content'] = Check::Words($destaquesMaisVistos['post_content'], 38);
            $destaquesMaisVistos['datetime'] = date('Y-m-d', strtotime($destaquesMaisVistos['post_date']));
            $destaquesMaisVistos['pubdate'] = date('d/m/Y H:i:s', strtotime($destaquesMaisVistos['post_date']));
            $View->Show($destaquesMaisVistos, $tpl_ultimas);
        endforeach;
    endif;
    ?> 

</main>
<!--FIM DAS UTIMAS NOTICIAS-->

<section>
    <h1 class="oculto">Compartilhe nas redes sociais!</h1>
    <ul class="sharebook">
    <li class="like facebook">
        <span class="count">542</span>
        <a href="http://www.fernandowebdeveloper.com.br" title="Compartilhe no Facebook!">Compartilhe no 
            <span>Facebook!</span>
        </a>
    </li>    
    <li class="like google" >
        <span class="count">1521</span>
        <a href="http://www.fernandowebdeveloper.com.br" title="Recomende no Google!">Recomende no 
            <span>Google!</span>
        </a>
    </li>
    <li class="like twitter">
        <span class="count">1</span>
        <a href="http://www.fernandowebdeveloper.com.br" rel="&hashtags=BoraDesenvolver&text=Fernando Web Developer - Desenvolvimento, suporte e assistencia em sistemas Web!&" title="Conte isto no Twitter!">Conte isto no 
            <span>Twitter!</span>
        </a>
    </li>    
    </ul> 
</section>

<!-- NEWSLETTER-->
<section class="newslatter container">
    <h2> Inscreva-se agora! </h2>
    <h3> Receba novidades, dicas e muito mais!!</h3>
    <form>
        <input class="bg-black radius" type="email" name="email" placeholder="Seu email">
        <button class="bg-white radius"> Cadastrar </button>
    </form>            
</section>
<!--FIM DA NEWSLETTER-->
</body>
</html>
