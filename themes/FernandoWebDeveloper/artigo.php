<?php
if ($Link->getData()):
    extract($Link->getData());
else:
    header('Location: ' . HOME . DIRECTORY_SEPARATOR . '404');
endif;
?>
<!--HOME CONTENT-->
<div class="container">
    <article class="page_article">
        <div class="art_content">
            <!--CABEÇALHO GERAL-->
            <header>
                <hgroup>
                    <h1 class="articleTitulo"><?= $post_title; ?></h1>
                    <div class="img capa">
                        <!--w 578 [CRIAR TUMB]-->
                        <?= Check::Image('uploads' . DIRECTORY_SEPARATOR . $post_cover, $post_title, 578); ?>
                    </div>
                    <time class="timeArticle" datetime="<?= date('Y-m-d', strtotime($post_date)); ?>" pubdate>Enviada em: <?= date('d/m/Y H:i:s', strtotime($post_date)); ?>Hs</time>
                </hgroup>
            </header>

            <!--CONTEUDO-->
            <div class="htmlchars">
                <?= $post_content; ?>   
              <!--GALERIA-->
                <?php
                $readGb = new Read;
                $readGb->ExeRead("fwd_posts_gallery", "WHERE post_id = :postid ORDER BY gallery_date DESC", "postid={$post_id}");
                if ($readGb->getResult()):
                    ?>
                    <section class="gallery">
                        <hgroup>
                            <h3>
                                GALERIA:
                                <p>Veja fotos em <mark><?= $post_title; ?></mark></p>
                            </h3>
                        </hgroup>

                        <ul>
                            <?php
                            $gb = 0;
                            foreach ($readGb->getResult() as $gallery):
                                $gb++;
                                extract($gallery);
                                ?>
                                <li>
                                    <div>
                                        <a href="<?= HOME; ?>/uploads/<?= $gallery_image; ?>" rel="shadowbox[<?= $post_id; ?>]" title="Imagem <?= $gb; ?> do post <?= $post_title; ?>">
                                            <?= Check::Image('uploads' . DIRECTORY_SEPARATOR . $gallery_image, "Imagem {$gb} do post {$post_title}", 120, 80); ?>
                                        </a>
                                    </div>
                                </li>
                                <?php
                            endforeach;
                            ?>
                        </ul>

                    </section>
                <?php endif; ?>
            </div>            
                 <?php
                $linkSocial = new Read;
                $linkSocial->ExeRead("fwd_posts", "WHERE post_status = 1 AND post_id = :id AND post_category = :cat ORDER BY rand() LIMIT 2", "id={$post_id}&cat={$post_category}");
                if ($linkSocial->getResult()):
                    $View = new View;
                    $tpl_social = $View->Load('article_social');
                    ?>

                    <section>
                        <h1 class="oculto">Compartilhe nas redes sociais!</h1>
                        <?php
                        foreach ($linkSocial->getResult() as $social):
                            $social['post_name'] = Check::Words($social['post_name'], 4);
                        $View->Show($social, $tpl_social);
                        endforeach;
                        ?>                        
                    </section>
                    <?php
                endif;
                ?>          
        
            <!--RELACIONADOS-->
            <?php
            $readMore = new Read;
            $readMore->ExeRead("fwd_posts", "WHERE post_status = 1 AND post_id != :id AND post_category = :cat ORDER BY rand() LIMIT 2", "id={$post_id}&cat={$post_category}");
            if ($readMore->getResult()):
                $View = new View;
                $tpl_m = $View->Load('article_m');
                ?>
                <footer>
                    <nav>
                        <h3>Veja também:</h3>
                        <?php
                        foreach ($readMore->getResult() as $more):
                            $more['datetime'] = date('Y-m-d', strtotime($more['post_date']));
                            $more['pubdate'] = date('d/m/Y H:i:s', strtotime($more['post_date']));
                            $more['post_content'] = Check::Words($more['post_content'], 20);

                            $View->Show($more, $tpl_m);
                        endforeach;
                        ?>
                    </nav>

                </footer>
                <?php
            endif;
            ?>
            <!--Comentários aqui-->
        </div><!--art content-->  

        <!--SIDEBAR-->
        <?php require(REQUIRE_PATH . '/inc/sidebar.inc.php'); ?>


    </article>


</div><!--/ site container -->