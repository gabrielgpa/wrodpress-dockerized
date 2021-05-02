<?php

/**
 * Plugin Name: Lab Form
 * Plugin URI: https://gabrielgpa.github.io
 * Description: Formulário para testes
 * Version: 1.0
 * Author: Gabriel Araújo
 * Author URI: https://gabrielgpa.github.io
 */

function orcamento_whatsapp() 
{
    
?>
    <form method="post">
        <label for="name">Nome</label><br>
        <input type="text" name="name"><br>
        <br>

        <label for="email">E-mail</label><br>
        <input type="text" name="email"><br>
        <br>

        <label for="product">Qual produtor você deseja comprar?</label><br>
        <select name="product" id=""><br>
            <option value="Cadeira Gamer">Cadeira Gamer</option>
            <option value="Teclado wireless">Teclado wireless</option>
            <option value="PS5">PS5</option>
        </select>
        <br>
        <br>

        <input type="submit" name="submit" value="Enviar">
    </form>

<?php
}

    function send($data) 
    {
        $name = $data['name'];
        $email = $data['email'];
        $product = $data['product'];
        $wsp_txt = 'Olá, meu nome é *' .$name. '* e desejo um orçamento para o *' . $product . '*. Meu e-mail é *' . $email . '*';
        $wtp_message = str_replace(' ', '%20', $wsp_txt);
        $wtp_appUrl = 'http://api.whatsapp.com/send?1=pt_BR&phone=<phone_number>&text='.$wtp_message;

?>
        <script type="text/javascript">
            let tab = window.open("<?php echo $wtp_appUrl; ?>", '_blank');

            if (!tab) {
                alert('Você precisa permistir os Popups antes de enviar');
            }
            
            window.history.back()
        </script>

<?php
    }

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    send($_POST);
}

add_shortcode( 'orcamento', 'orcamento_whatsapp');

?>