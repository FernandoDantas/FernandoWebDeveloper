<main class="main_content container" id="contato">
    <div class="content">
        <header class="title-section">
            <h1>Fale Conosco:</h1>
            <p class="tagline">Alguma dúvida? Entre em contato!</p>
        </header>   
        <?php
        $Contato = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if ($Contato && $Contato['SendFormContato']):
            unset($Contato['SendFormcontato']);
            $Contato['Assunto'] = 'Menssagem via site FernandoWebDeveloper!!';
            $Contato['DestinoNome'] = 'Fernando Web Developer';
            $Contato['DestinoEmail'] = 'fernandojrsud@hotmail.com';           
            
            
            $SendEmail = new Email;
            $SendEmail->Enviar($Contato);

            if ($SendEmail->getError()):
                FWDErro($SendEmail->getError()[0], $SendEmail->getError()[1]);
            endif;

        endif;
        ?>
        <div class="google-maps">   
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.256937764295!2d-35.90154562803202!3d-7.211502957310619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ac1fccedd2b511%3A0xffb8da60d386431d!2sR.+Diogo+da+Costa+-+Monte+Santo%2C+Campina+Grande+-+PB%2C+58400-733!5e0!3m2!1spt-BR!2sbr!4v1460555001818" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <form name="FormContato" action="#contato" method="post" class="form">
            <fieldset class="form_left">
                <label>
                    <span>Informe Seu Nome:</span>
                    <input type="text" placeholder="Nome:" name="RemetenteNome" title="Informe seu nome" required/>
                </label>

                <label>
                    <span>Informe Seu E-mail:</span>
                    <input type="email" placeholder="E-mail:" name="RemetenteEmail" title="Informe seu e-mail" required/>
                </label>         
            </fieldset>
            <fieldset class="form_right">
                <label>
                    <span>Fale Aqui:</span>
                    <textarea rows="8" placeholder="Escreva Sua Mensagem:" name="Mensagem" required></textarea>
                </label>       

                <div class="form_action">
                    <input class="btn limpar" type="reset" value="Limpar Dados" title="Limpar Dados"/>
                    <input class="btn enviar" type="submit" value="Enviar Dados" name="SendFormContato" title="Enviar Dados"/>
                </div>
            </fieldset>
        </form>

        <div class="clear"></div>
    </div>

</main>