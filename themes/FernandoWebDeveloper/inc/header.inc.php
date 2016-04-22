      <header class="cabecalho container">           
            <a href="<?=HOME; ?>" title="Fernando Web Developer"> <h1 class="logo">Fernando Web Developer :: Desnvolvimento de sites e sistemas web</h1></a>            
            <button class="btn-menu bg-gradient"><i class="fa fa-bars fa-lg"></i></button>
            <nav class="menu">   
                <h2 class="oculto">Mais Sobre o Fernando Web Developer</h2>
                <a class="btn-close"><i class="fa fa-times"></i></a>
                <ul>                    
                    <li><a href="<?=HOME;?>" title="Home :: Fernando Web Developer">Home</a></li>
                    <li><a href="#" title="Clientes :: Fernando Web Developer">Clientes</a></li>
                    <li><a href="#" title="Serviços :: Fernando Web Developer">Serviços</a></li>
                    <li><a href="#" title="Blog :: Fernando Web Developer">Blog</a></li>
                    <li><a href="#" title="Quem sou :: Fernando Web Developer">Quem somos</a></li>
                    <li><a href="<?=HOME;?>/contato" title="Contato :: Fernando Web Developer">Contato</a></li>  
                    <li class="search">
                    <?php
                    $search = filter_input(INPUT_POST, 's', FILTER_DEFAULT);
                    if (!empty($search)):
                        $search = strip_tags(trim(urlencode($search)));
                        header('Location: ' . HOME . '/pesquisa/' . $search);
                    endif;
                    ?>

                    <form name="search" action="" method="post">
                        <input class="fls" type="text" name="s" />
                        <input class="btn" type="submit" name="sendsearch" value="" />
                    </form>
                </li>
                </ul>
            </nav>
        </header>