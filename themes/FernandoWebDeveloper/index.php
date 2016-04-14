<?php
$View = new View;
$tpl_g = $View->Load('article_g');
?>

<main class="main_content container">      

    <h1 class="fontzero">Ultimas do Site:</h1>
    <section class="slide container">
        <div class="slide_controll">
            <div class="slide_nav back"><</div>
            <div class="slide_nav go">></div>
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

    <section class="more_news container">
        <div class="content">
            <h1 class="section_title">Destinos Mais Escolhidos:</h1>

            <article class="more_news_item">
                <a href="#ver" title="Para Punta Cana">
                    <img src="tim.php?src=<?= INCLUDE_PATH; ?>/uploads/04.jpg&w=480&h=280" alt="[Punta Cana]" title="Punta Cana"/>
                </a>
                <div class="more_news_item_desc">
                    <h1><a href="#ver" title="Para Punta Cana">Punta Cana, simplesmente um destino espetacular para suas férias. É para curtir a 2 ou com a galera!</a></h1>
                    <time datetime="2015-01-26">26/01/2015 às 14:23hs</time>
                </div>
            </article>

            <article class="more_news_item">
                <a href="#ver" title="Bora Bora">
                    <img src="tim.php?src=<?= INCLUDE_PATH; ?>/uploads/05.jpg&w=480&h=280" alt="[Bora Bora]" title="Bora Bora"/>
                </a>
                <div class="more_news_item_desc">
                    <h1><a href="#ver" title="Bora Bora">Bora Bora, O máximo do romantismo, um destino ideal para casais apaixonados ou em lua de mel!</a></h1>
                    <time datetime="2015-01-26">26/01/2015 às 14:23hs</time>
                </div>
            </article>

            <article class="more_news_item">
                <a href="#ver" title="Para Lonres">
                    <img src="tim.php?src=<?= INCLUDE_PATH; ?>/uploads/06.jpg&w=480&h=280" alt="[Lonres]" title="Lonres"/>
                </a>
                <div class="more_news_item_desc">
                    <h1><a href="#ver" title="Para Lonres">Pontos turísticos deslumbrantes. Baladas inigualáveis e toda magia de Londres. Curta em alto estilo!</a></h1>
                    <time datetime="2015-01-26">26/01/2015 às 14:23hs</time>
                </div>
            </article>

            <article class="more_news_item">
                <a href="#ver" title="Para Bonito">
                    <img src="tim.php?src=<?= INCLUDE_PATH; ?>/uploads/07.jpg&w=480&h=280" alt="[Bonito]" title="Bonito"/>
                </a>
                <div class="more_news_item_desc">
                    <h1><a href="#ver" title="Para Bonito">Pertinho de você. Bonito é um paraíso de grutas e aguas cristalinas. Venha mergulhar e curtir bonito!</a></h1>
                    <time datetime="2015-01-26">26/01/2015 às 14:23hs</time>
                </div>
            </article>
            <div class="clear"></div>
        </div>
    </section> <!-- FECHA MAIS VISTOS -->

    <section class="bestviews container">
        <div class="content">
            <h1 class="section_title">Melhores Destinos:</h1>
            <article class="bestviews_item">
                <time datetime="2015-01-26">26/01/2015 às 14:23hs</time>
                <h1><a href="#ver" title="Para Punta Cana">Quer descansar e curtir? Um lindo hotel em punta cana é uma ótima opção para você!</a></h1>
            </article>

            <article class="bestviews_item">
                <time datetime="2015-01-26">26/01/2015 às 14:23hs</time>
                <h1><a href="#ver" title="Bora Bora">Bora Bora, O máximo do romantismo, um destino ideal para casais apaixonados ou em lua de mel!</a></h1>
            </article>

            <article class="bestviews_item">
                <time datetime="2015-01-26">26/01/2015 às 14:23hs</time>
                <h1><a href="#ver" title="Para Fortaleza">Que tal uma linda viajem por fortaleza para curtir e recordar? conheça o melhor daqui!</a></h1>
            </article>

            <article class="bestviews_item">
                <time datetime="2015-01-26">26/01/2015 às 14:23hs</time>
                <h1><a href="#ver" title="Para Bonito">Pertinho de você. Bonito é um paraíso de grutas e aguas cristalinas. Venha mergulhar e curtir bonito!</a></h1>
            </article>
            <div class="clear"></div>
        </div>
    </section>

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
        <section class="most_views container">
            <div class="content">
                <h1 class="section_title">Mais Vistos:</h1>

                <article class="most_views_item">
                    <picture alt="Para Punta Cana">
                        <!--[if IE 9]><video style="display: none;"><![endif]-->
                        <source media="(min-width: 960px)" srcset="tim.php?src=<?= INCLUDE_PATH; ?>/uploads/03.jpg&w=500&h=300"/>
                        <source media="(min-width: 480px)" srcset="tim.php?src=<?= INCLUDE_PATH; ?>/uploads/02.jpg&w=300&h=180"/>
                        <source media="(min-width: 1px)" srcset="tim.php?src=<?= INCLUDE_PATH; ?>/uploads/02.jpg&w=300&h=300"/>  
                        <!--[if IE 9]></video><![endif]-->
                        <img srcset="tim.php?src=<?= INCLUDE_PATH; ?>/uploads/02.jpg&w=300&h=180, tim.php?src=<?= INCLUDE_PATH; ?>/uploads/03.jpg&w=500&h=300 2x" src="<?= INCLUDE_PATH; ?>/uploads/02.jpg" alt="[Punta Cana]" title="Punta Cana"/>
                    </picture> 
                    <div class="most_views_item_desc">
                        <time datetime="2015-01-26">26/01/2015 às 14:23hs</time>
                        <h1><a href="#ver" title="Para Punta Cana">Quer descansar e curtir? Um lindo hotel em punta cana é uma ótima opção para você!</a></h1>
                    </div>
                </article>

                <article class="most_views_item">
                    <picture alt="Para Bora Bora">    
                        <!--[if IE 9]><video style="display: none;"><![endif]-->
                        <source media="(min-width: 960px)" srcset="tim.php?src=<?= INCLUDE_PATH; ?>/uploads/05.jpg&w=500&h=300"/>
                        <source media="(min-width: 480px)" srcset="tim.php?src=<?= INCLUDE_PATH; ?>/uploads/05.jpg&w=300&h=180"/>                   
                        <source media="(min-width: 1px)" srcset="tim.php?src=<?= INCLUDE_PATH; ?>/uploads/05.jpg&w=300&h=300"/>  
                        <!--[if IE 9]></video><![endif]-->
                        <img srcset="tim.php?src=<?= INCLUDE_PATH; ?>/uploads/05.jpg&w=300&h=180, tim.php?src=<?= INCLUDE_PATH; ?>/uploads/05.jpg&w=500&h=300 2x" src="<?= INCLUDE_PATH; ?>/uploads/05.jpg" alt="[Bora Bora]" title="Bora Bora"/>
                    </picture> 
                    <div class="most_views_item_desc">
                        <time datetime="2015-01-26">26/01/2015 às 14:23hs</time>
                        <h1><a href="#ver" title="Bora Bora">Bora Bora, O máximo do romantismo, um destino ideal para casais apaixonados ou em lua de mel!</a></h1>
                    </div>
                </article>
                <div class="clear"></div>
            </div>
        </section>

        <nav class="gallery container">
            <h1 class="section_title">Galerias:</h1>
            <a href='<?= INCLUDE_PATH; ?>/uploads/08.jpg' rel='shadowbox[gb]'><img src='tim.php?src=<?= INCLUDE_PATH; ?>/uploads/08.jpg&w=360&h=200' alt='Galeria' title='Galeria'/></a><a href='<?= INCLUDE_PATH; ?>/uploads/09.jpg' rel='shadowbox[gb]'><img src='tim.php?src=<?= INCLUDE_PATH; ?>/uploads/09.jpg&w=360&h=200' alt='Galeria' title='Galeria'/></a><a href='<?= INCLUDE_PATH; ?>/uploads/10.jpg' rel='shadowbox[gb]'><img src='tim.php?src=<?= INCLUDE_PATH; ?>/uploads/10.jpg&w=360&h=200' alt='Galeria' title='Galeria'/></a><a href='<?= INCLUDE_PATH; ?>/uploads/11.jpg' rel='shadowbox[gb]'><img src='tim.php?src=<?= INCLUDE_PATH; ?>/uploads/11.jpg&w=360&h=200' alt='Galeria' title='Galeria'/></a><a href='<?= INCLUDE_PATH; ?>/uploads/12.jpg' rel='shadowbox[gb]'><img src='tim.php?src=<?= INCLUDE_PATH; ?>/uploads/12.jpg&w=360&h=200' alt='Galeria' title='Galeria'/></a><a href='<?= INCLUDE_PATH; ?>/uploads/13.jpg' rel='shadowbox[gb]'><img src='tim.php?src=<?= INCLUDE_PATH; ?>/uploads/13.jpg&w=360&h=200' alt='Galeria' title='Galeria'/></a>                </nav>

    </div><!-- MORE AND GALLERY -->
</main>