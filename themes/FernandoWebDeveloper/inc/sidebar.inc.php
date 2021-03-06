<?php
$View = (!empty($View) ? $View : $View = new View);
$post_id = (!empty($post_id) ? $post_id : null);

$Side = new Read;
$tpl_p = $View->Load('article_p');
?>

<aside class="main-sidebar">

    <article class="ads">
        <header>
            <h1 class="line_title"><span class="azul">Fan Page</span></h1>
            <div class="fb-page" data-href="https://www.facebook.com/Fernando-Dantas-1642038059364413" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
        </header>
    </article>



    <section class="widget art-list last-publish">
        <h2 class="line_title"><span class="oliva">Últimas Atualizações:</span></h2>
        <?php
        $Side->ExeRead("fwd_posts", "WHERE post_status = 1 AND post_id != :side ORDER BY post_date DESC LIMIT 3", "side={$post_id}");
        if ($Side->getResult()):
            foreach ($Side->getResult() as $last):
                $last['datetime'] = date('Y-m-d', strtotime($last['post_date']));
                $last['pubdate'] = date('d/m/Y H:i:s', strtotime($last['post_date']));
                $last['post_title'] = Check::Words($last['post_title'], 10);
                $View->Show($last, $tpl_p);
            endforeach;
        endif;
        ?>
    </section>

    <section class="widget art-list most-view">
        <h2 class="line_title"><span class="vermelho">Destaques:</span></h2>
        <?php
        $Side->ExeRead("fwd_posts", "WHERE post_status = 1 AND post_id != :side ORDER BY post_views DESC LIMIT 3", "side={$post_id}");
        if ($Side->getResult()):
            foreach ($Side->getResult() as $most):
                $most['datetime'] = date('Y-m-d', strtotime($most['post_date']));
                $most['pubdate'] = date('d/m/Y H:i:s', strtotime($most['post_date']));
                $most['post_title'] = Check::Words($most['post_title'], 10);
                $View->Show($most, $tpl_p);
            endforeach;
        endif;
        ?>
    </section>
</aside>