<header class="main_header container">
    <div class="content">
        <div class="main_header_logo">
            <h1>Fernando Web Developer</h1>
            <a href="<?= HOME;?>" title="Feranando Web Developer">
                <img src="<?= INCLUDE_PATH; ?>/images/logo-fwd.png" alt="[Fernando Web Developer]" title="Feranando Web Developer"/>
            </a>
        </div>

        <div class="mobile_action"></div>

        <ul class="main_header_nav">
            <li class="main_header_nav_search">
                <form name="search" action="" method="post">
                    <input class="s" type="search" placeholder="Pesquisar:" name="s">
                    <input class="b" type="submit" value=""/>
                </form>
            </li>

            <li class="main_header_nav_item"><a href="<?=HOME;?>" title="Home | Feranando Web Developer">Home</a></li>
            <li class="main_header_nav_item"><a href="http://localhost/cursos/ws_rwd/06-mobile-first" title="Novidades | Feranando Web Developer">Novidades</a></li>
            <li class="main_header_nav_item"><a href="http://localhost/cursos/ws_rwd/06-mobile-first" title="Mais Vistos | Feranando Web Developer">Mais Vistos</a></li>
            <li class="main_header_nav_item"><a href="http://localhost/cursos/ws_rwd/06-mobile-first" title="Categorias | Feranando Web Developer">Categorias</a>
                <!-- SUBMENU -->
                <ul class="main_header_nav_sub">
                    <li class="main_header_nav_sub_item"><a href="http://localhost/cursos/ws_rwd/06-mobile-first" title="Categoria 1">Categoria 1</a>
                    <li class="main_header_nav_sub_item"><a href="http://localhost/cursos/ws_rwd/06-mobile-first" title="Categoria 2">Categoria 2</a>
                    <li class="main_header_nav_sub_item"><a href="http://localhost/cursos/ws_rwd/06-mobile-first" title="Categoria 3">Categoria 3</a>
                    <li class="main_header_nav_sub_item"><a href="http://localhost/cursos/ws_rwd/06-mobile-first" title="Categoria 4">Categoria 4</a>
                    <li class="main_header_nav_sub_item"><a href="http://localhost/cursos/ws_rwd/06-mobile-first" title="Categoria 5">Categoria 5</a>
                </ul>
            </li>
            <li class="main_header_nav_item"><a href="<?=HOME;?>/contato" title="Contato | Feranando Web Developer">Contato</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</header>