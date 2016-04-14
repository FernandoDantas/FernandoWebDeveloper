<?php
$View = new View;
$tpl_g = $View->Load('article_g');
$tpl_m = $View->Load('article_m');
$tpl_p = $View->Load('article_p');
$tpl_maisVistos = $View->Load('article_mais_vistos');
$tpl_galery = $View->Load('galeria_img');
?>

<main class="main_content container">      

    <!--SECTION DO SLIDE-->
    <section class="slide container">
        <h1 class="fontzero">Últimas do Site:</h1>
        <div class="slide_controll">
            <div class="slide_nav back" title="Voltar"><</div>
            <div class="slide_nav go" title="Próximo">></div>
        </div>
        <?php
        $cat = Check::CatByName('noticias');
        $post = new Read;
        $post->ExeRead("fwd_posts", "WHERE post_status = 1 AND (post_cat_parent = :cat OR post_category = :cat) ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "cat={$cat}&limit=3&offset=0");
        if (!$post->getResult()):
            FWDErro('Desculpe, ainda não existem noticias cadastradas. Favor volte mais tarde!', FWD_INFOR);
        else:
            foreach ($post->getResult() as $Slide):
                $Slide['post_title'] = Check::Words($Slide['post_title'], 12);
                $Slide['post_content'] = Check::Words($Slide['post_content'], 38);
                $Slide['datetime'] = date('Y-m-d', strtotime($Slide['post_date']));
                $Slide['pubdate'] = date('d/m/Y H:i:s', strtotime($Slide['post_date']));
                $View->Show($Slide, $tpl_g);
            endforeach;
        endif;
        ?>
    </section> <!-- FECHA SLIDE -->   

    <!--SECTION ÚLTIMAS NOTÍCIAS-->
    <section class="more_news container">        
        <div class="content">
            <h1 class="section_title">Destaques:</h1>
            <?php
            $destaques = new Read();
            $destaques->ExeRead("fwd_posts", "WHERE post_status = 1 ORDER BY post_views DESC, post_date DESC LIMIT 4");
            if (!$destaques->getResult()):
                FWDErro("Desulculpe, nenhum projeto em destaque neste momento. Favor volte depois!", FWD_INFOR);
            else:
                foreach ($destaques->getResult() as $destaquesMaisVistos):
                    $destaquesMaisVistos['post_title'] = Check::Words($destaquesMaisVistos['post_title'], 12);
                    $destaquesMaisVistos['post_content'] = Check::Words($destaquesMaisVistos['post_content'], 38);
                    $destaquesMaisVistos['datetime'] = date('Y-m-d', strtotime($destaquesMaisVistos['post_date']));
                    $destaquesMaisVistos['pubdate'] = date('d/m/Y H:i:s', strtotime($destaquesMaisVistos['post_date']));
                    $View->Show($destaquesMaisVistos, $tpl_m);
                endforeach;
            endif;
            ?>
            <div class="clear"></div> 
        </div>
    </section> <!-- FECHA ÚLTIMAS NOTÍCIAS -->

    <!--SECTION POSTS MAIS ANTIGOS-->
    <section class="bestviews container">
        <div class="content">
            <h1 class="section_title">Posts mais antigos:</h1>           
            <?php
            $post->setPlaces("cat={$cat}&limit=4&offset=11");
            if (!$post->getResult()):
                FWDErro("Desculpe, não temos mais notícias para exibir aqui. Favor, volte depois", FWD_INFOR);
            else:
                foreach ($post->getResult() as $news):
                    $news['post_title'] = Check::Words($news['post_title'], 12);
                    //$news['post_content'] = Check::Words($news['post_content'], 38);
                    $news['datetime'] = date('Y-m-d', strtotime($news['post_date']));
                    $news['pubdate'] = date('d/m/Y H:i:s', strtotime($news['post_date']));
                    $View->Show($news, $tpl_p);
                endforeach;
            endif;
            ?>            
            <div class="clear"></div>
        </div>
    </section><!--FIM DA SECTION POSTS MAIS ANTIGOS-->

    <aside class="newsletter container">
        <div class="content">
            <h1>Receba nossas novidades, ofertas e promoções!</h1>
            <form>
                <input type="email" placeholder="Informe seu E-mail:"/>
                <input type="submit" value="Assinar"/>
            </form>

            <div class="newsletter_icon"></div>
            <div class="clear"></div>
        </div>
    </aside>

    <div class="more_and_gallery">
        
        <!--MAIS VISTOS-->
        <section class="most_views container">
            <div class="content">
                <h1 class="section_title">Mais Vistos:</h1>
                <?php
                $maisVistos = new Read;
                $maisVistos->ExeRead("fwd_posts", "WHERE post_status = 1 ORDER BY post_views DESC, post_date DESC LIMIT 2");
                if (!$maisVistos->getResult()):
                    FWDErro("Desulculpe, nenhum projeto em destaque neste momento. Favor volte depois!", FWD_INFOR);
                else:
                    foreach ($maisVistos->getResult() as $visto):
                        $visto['post_title'] = Check::Words($visto['post_title'], 12);
                        //$visto['post_content'] = Check::Words($visto['post_content'], 38);
                        $visto['datetime'] = date('Y-m-d', strtotime($visto['post_date']));
                        $visto['pubdate'] = date('d/m/Y H:i:s', strtotime($visto['post_date']));
                        $View->Show($visto, $tpl_maisVistos);
                    endforeach;
                endif;
                ?>
                <div class="clear"></div>
            </div>
        </section><!--FIM DOS MAIS VISTOS-->

        <nav class="gallery container">
            <h1 class="section_title">Galeria:</h1>
            <?php
                $galeria = new Read;
                $galeria->ExeRead("fwd_posts", "WHERE post_status = 1 ORDER BY post_views DESC, post_date DESC LIMIT 6");
                if(!$galeria->getResult()):
                    FWDErro("Desculpe, não existe nehuma imagem neste momento. Favor volte depois", FWD_INFOR);
                else:
                    foreach ($galeria->getResult() as $imagems):
                        $imagems['post_title'] = Check::Words($imagems['post_title'], 12);
                        $View->Show($imagems, $tpl_galery);
                    endforeach;
                endif;
            ?>            
        </nav>

    </div><!-- MORE AND GALLERY -->
</main>