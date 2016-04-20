<section class="contato container" id="contato">         
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
    <div>
        <header class="title-section">
            <h1>Fale Conosco:</h1>
            <h3>Alguma dúvida? Entre em contato!</h3>
        </header> 

        <form name="FormContato" action="#contato" method="post">
            <fieldset class="">
                <label>
                    <span class="spaninfo">Informe Seu Nome:</span>
                    <input class="bg-black radius" type="text" placeholder="Nome:" name="RemetenteNome" title="Informe seu nome" required/>
                </label>

                <label>
                    <span class="spaninfo">Informe Seu E-mail:</span>
                    <input class="bg-black radius" type="email" placeholder="E-mail:" name="RemetenteEmail" title="Informe seu e-mail" required/>
                </label>         
            </fieldset>
            <fieldset class="">
                <label>
                    <span class="spaninfo">Fale Aqui:</span>
                    <textarea class="bg-black radius" rows="8" placeholder="Escreva Sua Mensagem:" name="Mensagem" required></textarea>
                </label>       

                <div class="">
                    <button class="limpar" type="reset" value="Limpar Dados" title="Limpar Dados">Limpar</button>
                    <button class="enviar" type="submit" value="Enviar Dados" name="SendFormContato" title="Enviar Dados">Enviar</button>
                </div>
            </fieldset>
        </form>       
    </div>

</section>