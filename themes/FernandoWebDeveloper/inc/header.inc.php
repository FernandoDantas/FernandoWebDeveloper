<header class="cabecalho container">  
    
    <a href="<?= HOME; ?>" title="Fernando Web Developer"> <h1 class="logo">Fernando Web Developer :: Desnvolvimento de sites e sistemas web</h1></a>            

    <div class="mobile_action"></div>

    <?php
    $search = filter_input(INPUT_POST, 's', FILTER_DEFAULT);
    if (!empty($search)):
        $search = strip_tags(trim(urlencode($search)));
        header('Location: ' . HOME . '/pesquisa/' . $search);
    endif;
    ?>

    <ul class="main_header_nav">
        <li class="main_header_nav_search">
            <form name="search" action="" method="post">
                <input class="s" type="search" placeholder="Pesquisar:" name="s">
                <input class="b" type="submit" value=""/>
            </form>
        </li>

        <li class="main_header_nav_item"><a href="<?= HOME; ?>" title="Home :: Fernando Web Developer">Home</a></li>
        <li class="main_header_nav_item"><a href="#" title="Clientes :: Fernando Web Developer">Clientes</a></li>
        <li class="main_header_nav_item"><a href="#" title="Serviços :: Fernando Web Developer">Serviços</a></li>
        <li class="main_header_nav_item"><a href="http://localhost/cursos/ws_rwd/06-mobile-first" title="Categorias | Curso Design Responsivo | UpInside Treinamentos">Categorias</a>
            <!-- SUBMENU -->
            <ul class="main_header_nav_sub">
                <li class="main_header_nav_sub_item"><a href="http://localhost/cursos/ws_rwd/06-mobile-first" title="Categoria 1">Categoria 1</a>
                <li class="main_header_nav_sub_item"><a href="http://localhost/cursos/ws_rwd/06-mobile-first" title="Categoria 2">Categoria 2</a>
                <li class="main_header_nav_sub_item"><a href="http://localhost/cursos/ws_rwd/06-mobile-first" title="Categoria 3">Categoria 3</a>
                <li class="main_header_nav_sub_item"><a href="http://localhost/cursos/ws_rwd/06-mobile-first" title="Categoria 4">Categoria 4</a>
                <li class="main_header_nav_sub_item"><a href="http://localhost/cursos/ws_rwd/06-mobile-first" title="Categoria 5">Categoria 5</a>
            </ul>
        </li>
        <li class="main_header_nav_item"><a href="#" title="Quem sou :: Fernando Web Developer">Quem somos</a></li>
        <li class="main_header_nav_item"><a href="<?= HOME; ?>/contato" title="Contato :: Fernando Web Developer">Contato</a></li>
    </ul>
</header>