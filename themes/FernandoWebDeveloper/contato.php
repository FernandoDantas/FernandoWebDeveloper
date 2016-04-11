<section class="footer_contact">
    <h3 class="line_title"><span>Contato:</span></h3>        
    <?php
    $Contato = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if ($Contato && $Contato['SendFormContato']):
        unset($Contato['SendFormContato']);

        $Contato['Assunto'] = 'Mensagem via Site!';
        $Contato['DestinoNome'] = 'Fernando Dantas';
        $Contato['DestinoEmail'] = 'portalfertec@portalfertec.com.br';

        $SendMail = new Email;
        $SendMail->Enviar($Contato);

        if ($SendMail->getError()):
            WSErro($SendMail->getError()[0], $SendMail->getError()[1]);
        endif;

    endif;
    ?>

    <form name="FormContato" action="#contato" method="post">
        <label>
            <span>nome:</span>
            <input type="text" title="Informe seu nome" name="RemetenteNome" required />
        </label>

        <label>
            <span>e-mail:</span>
            <input type="email" title="Informe seu e-mail" name="RemetenteEmail" required />
        </label>

        <label>
            <span>mensagem:</span>
            <textarea title="Envie sua mensagem" name="Mensagem" required rows="3"></textarea>
        </label>

        <input type="submit" value="Enviar" name="SendFormContato" class="btn">                        
    </form>
</section>

