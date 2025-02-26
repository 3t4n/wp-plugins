<?php
/* 
* Plugin Name: Promesas de Dios al Día
* Plugin URI: www.solucionesdecomputo.org
* Description: Este plugin ofrece 50 promesas de Dios para ti basadas en la Biblia (rv60). Las promesas se crean de forma aleatoria cada vez que se visita el sitio, esto quiere decir que no es un versiculo diario, sino que cada que tus visitantes entren al sitio tendrán una promesa de Dios diferente. 
* Author: Eduardo Rodriguez 
* Author URI: www.solucionesdecomputo.org
* Version: 1.0
*/
defined ('ABSPATH') or die;

register_activation_hook(__FILE__, 'PDD_Activar_Promesa');
register_uninstall_hook(__FILE__, 'PDD_Desinstalar_Plugin');

// shortcode 
add_shortcode('PDD_Promesa_al_dia','PDD_Promesa_Al_Dia');
function PDD_Promesa_Al_Dia()
{
    global $wpdb;
    ob_start();
    $random = rand(1, 50);
    $tabla_promesa = $wpdb->prefix . 'promesa_al_dia';
    $consulta= $wpdb->get_results( "SELECT id, versiculo, promesa FROM $tabla_promesa WHERE id = $random");

    foreach ($consulta as $fila) 
    {
        echo "<h3>" . $fila->versiculo . "</h3>" . "<p>" . $fila->promesa . "</p>";
    }
    return ob_get_clean();

}

// Al desinstalar el plugin se borrará tambien la BD creada promesa_al_dia
function PDD_Desinstalar_Plugin()
{
    global $wpdb;  
    $tabla_promesa = $wpdb->prefix . 'promesa_al_dia';
    $wpdb->query("DROP TABLE IF EXISTS {$tabla_promesa}");
  
}

//Se activa el plugin, crea una tabla y mete 50 promesas en la tabla prefix + promesa_al_dia
function PDD_Activar_Promesa()
{
    global $wpdb;
    global $phpmailer;
    include_once ABSPATH . 'wp-admin/includes/upgrade.php'; 
  

    //preparar consulta que vamos a lanzar la creacion de la Bd
    $tabla_promesa = $wpdb->prefix . 'promesa_al_dia';
    $charset_collate = $wpdb->get_charset_collate();
        $query_db = "CREATE TABLE IF NOT EXISTS $tabla_promesa (
        id int(3) NOT NULL AUTO_INCREMENT,
        versiculo varchar(100) NOT NULL,
        promesa varchar(500) NOT NULL,
        UNIQUE (id)
      )
    $charset_collate";
    dbDelta($query_db);

    // insertamos promesas en la BD
    $consulta= $wpdb->get_results( "SELECT * FROM $tabla_promesa WHERE id = 51");        
    if (empty ($consulta))
    {
            
        $wpdb->insert($tabla_promesa, array(
            'versiculo' => 'Génesis 28:15',
            'promesa' => 'He aquí que yo estoy contigo; yo te guardaré por dondequiera que vayas y te haré volver a esta tierra. No te abandonaré hasta que haya hecho lo que te he dicho',
            ));
        $wpdb->insert($tabla_promesa, array(       
            'versiculo' => 'Éxodo 19:5', 
            'promesa' => 'Ahora pues, si de veras escuchan mi voz y guardan mi pacto, serán para mí un pueblo[a] especial entre todos los pueblos. Porque mía es toda la tierra (Ex 19:5)',
            ));
        $wpdb->insert($tabla_promesa, array(
            'versiculo' => 'Éxodo 20:12', 
            'promesa' => 'Honra a tu padre y a tu madre, para que tus días se prolonguen sobre la tierra que el SEÑOR tu Dios te da (Ex 20:12).',
            ));
        $wpdb->insert($tabla_promesa, array(
            'versiculo' => 'Levítico 26:11-12', 
            'promesa' => 'Yo pondré mi morada entre ustedes, y mi alma no los abominará. Andaré entre ustedes y seré su Dios, y ustedes serán mi pueblo (Lev 26:11-12).',
            ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' => 'Josué 1:5', 
            'promesa' => 'Nadie te podrá hacer frente en todos los días de tu vida. Como estuve con Moisés, estaré contigo; no te dejaré ni te desampararé (Jos 1:5).',
        ));
        $wpdb->insert($tabla_promesa, array(
            'versiculo' => 'Josué 1:8', 
            'promesa' => 'Nunca se aparte de tu boca este libro de la Ley; más bien, medita en él de día y de noche, para que guardes y cumplas todo lo que está escrito en él. Así tendrás éxito y todo te saldrá bien (Jos 1:8).',
        ));
        $wpdb->insert($tabla_promesa, array(
            'versiculo' => 'Salmos 1:1-3', 
            'promesa' => 'Bienaventurado el hombre que no anda según el consejo de los impíos ni se detiene en el camino de los pecadores ni se sienta en la silla de los burladores. Más bien, en la ley del SEÑOR está su delicia, y en ella medita de día y de noche. Será como un árbol plantado junto a corrientes de aguas que da su fruto a su tiempo y su hoja no cae. Todo lo que hace prosperará (Sal 1:1-3).'
            ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Salmos 32:8', 
            'promesa' => 'Te haré entender y te enseñaré el camino en que debes andar. Sobre ti fijaré mis ojos (Sal 32:8).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Salmos 34:7', 
            'promesa' => 'El ángel del SEÑOR acampa en derredor de los que le temen, y los libra (Sal 34:7).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Salmos 41:1', 
            'promesa' => '¡Bienaventurado el que se preocupa del pobre! En el día malo lo librará el SEÑOR (Sal 41:1).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Salmos 67:6', 
            'promesa' => 'La tierra dará su fruto; nos bendecirá Dios, el Dios nuestro (Sal 67:6).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Salmos 84:11-12', 
            'promesa' => 'Porque sol y escudo es el SEÑOR Dios; gracia y gloria dará el SEÑOR. No privará del bien a los que andan en integridad. Oh SEÑOR de los Ejércitos, ¡bienaventurado el hombre que confía en ti! (Sal 84:11-12).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Salmos 103:3', 
            'promesa' => 'Él es quien perdona todas tus iniquidades, el que sana todas tus dolencias (Sal 103:3).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Salmos 107:9',
            'promesa' => 'Porque él sacia al alma sedienta y llena de bien al alma hambrienta (Sal 107:9).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Salmos 126:5', 
            'promesa' => 'Los que siembran con lágrimas, con regocijo segarán (Sal 126:5).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Proverbios 1:7', 
            'promesa' => 'El temor del SEÑOR es el principio del conocimiento; los insensatos desprecian la sabiduría y la disciplina (Pr 1:7).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Proverbios 3:9-10', 
            'promesa' => 'Honra al SEÑOR con tus riquezas y con las primicias de todos tus frutos. Así tus graneros estarán llenos con abundancia, y tus lagares rebosarán de vino nuevo (Pr 3:9-10).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Proverbios 19:17', 
            'promesa' => 'El que da al pobre presta al SEÑOR, y él le dará su recompensa (Pr 19:17 ).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Proverbios 22:9', 
            'promesa' => 'El de ojos bondadosos será bendito, porque de su pan da al necesitado (Pr 22:9).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Isaías 40:31', 
            'promesa' => 'Pero los que esperan en el SEÑOR renovarán sus fuerzas; levantarán las alas como águilas. Correrán y no se cansarán; caminarán y no se fatigarán (Is 40:31).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Isaías 41:10', 
            'promesa' => 'No temas, porque yo estoy contigo. No tengas miedo, porque yo soy tu Dios. Te fortaleceré, y también te ayudaré. También te sustentaré con la diestra de mi justicia (Is 41:10).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Isaías 57:15', 
            'promesa' => 'Porque así ha dicho el Alto y Sublime, el que habita la eternidad y cuyo nombre es el Santo: Yo habito en las alturas y en santidad; pero estoy con el de espíritu contrito y humillado, para vivificar el espíritu de los humildes y para vivificar el corazón de los oprimidos (Is 57:15).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Jeremías 17:7-8', 
            'promesa' => 'Bendito el hombre que confía en el SEÑOR, y cuya confianza es el SEÑOR. Será como un árbol plantado junto a las aguas y que extiende sus raíces a la corriente. No temerá cuando venga el calor, sino que sus hojas estarán verdes. En el año de sequía no se inquietará ni dejará de dar fruto (Jr 17:7-8).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Jeremías 33:3', 
            'promesa' => 'Clama a mí, y yo te responderé, y te enseñaré cosas grandes y ocultas que tú no conoces (Jr 33:3).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Malaquías 3:10', 
            'promesa' => 'Traigan todo el diezmo al tesoro y haya alimento en mi casa. Pruébenme en esto, ha dicho el SEÑOR de los Ejércitos, si no les abriré las ventanas de los cielos y vaciaré sobre ustedes bendición hasta que sobreabunde (Mal 3:10).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Mateo 6:33', 
            'promesa' => 'Más bien, busquen primeramente el reino de Dios y su justicia, y todas estas cosas les serán añadidas (Mt 6:33).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Mateo 11:28', 
            'promesa' => 'Vengan a mí, todos los que están fatigados y cargados, y yo los haré descansar (Mt 11:28).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Mateo 21:22', 
            'promesa' => 'Todo lo que pidan en oración, creyendo, lo recibirán (Mt 21:22).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Mateo 28:19-20', 
            'promesa' => 'Por tanto, vayan y hagan discípulos de todas las naciones, bautizándolos en el nombre del Padre, del Hijo y del Espíritu Santo, y enseñándoles que guarden todas las cosas que les he mandado. Y he aquí, yo estoy con ustedes todos los días, hasta el fin del mundo (Mt 28:19-20).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Lucas 6:38', 
            'promesa' => 'Den, y se les dará; medida buena, apretada, sacudida y rebosante se les dará en su regazo. Porque con la medida con que miden se les volverá a medir (Lc 6:38).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Juan 3:16', 
            'promesa' => 'Porque de tal manera amó Dios al mundo, que ha dado a su Hijo unigénito para que todo aquel que en él cree no se pierda mas tenga vida eterna (Jn 3:16 ).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Juan 10:27-29', 
            'promesa' => 'Mis ovejas oyen mi voz, y yo las conozco, y me siguen. Yo les doy vida eterna, y no perecerán jamás, y nadie las arrebatará de mi mano. Mi Padre, que me las ha dado, es mayor que todos y nadie las puede arrebatar de las manos del Padre (Jn 10:27-29).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Juan 11:25', 
            'promesa' => 'Yo soy la resurrección y la vida. El que cree en mí, aunque muera, vivirá (Jn 11:25).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Juan 12:26', 
            'promesa' => 'Si alguno me sirve, sígame; y donde yo estoy allí también estará mi servidor. Si alguno me sirve, el Padre le honrará (Jn 12:26).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Juan 14:21', 
            'promesa' => 'El que tiene mis mandamientos y los guarda, él es quien me ama. Y el que me ama será amado por mi Padre, y yo lo amaré y me manifestaré a él (Jn 14:21).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Juan 14:27', 
            'promesa' => 'La paz les dejo, mi paz les doy. No como el mundo la da yo se la doy a ustedes. No se turbe su corazón ni tenga miedo (Jn 14:27).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Juan 15:4-5', 
            'promesa' => 'Permanezcan en mí, y yo en ustedes. Como la rama no puede llevar fruto por sí sola si no permanece en la vid, así tampoco ustedes si no permanecen en mí. Yo soy la vid, ustedes las ramas. El que permanece en mí y yo en él, este lleva mucho fruto. Pero separados de mí nada pueden hacer (Jn 15:4-5).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Romanos 5:1', 
            'promesa' => 'Justificados, pues, por la fe tenemos paz para con Dios por medio de nuestro Señor Jesucristo (Ro 5:1).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  '1 Corintios 10:13', 
            'promesa' => 'No les ha sobrevenido ninguna tentación que no sea humana; pero fiel es Dios, quien no los dejará ser tentados más de lo que ustedes pueden soportar, sino que juntamente con la tentación dará la salida, para que la puedan resistir (1 Co 10:13).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  '2 Corintios 9:6-8', 
            'promesa' => 'Y digo esto: El que siembra escasamente cosechará escasamente, y el que siembra con generosidad también con generosidad cosechará. Cada uno dé como propuso en su corazón, no con tristeza ni por obligación porque Dios ama al dador alegre. Y poderoso es Dios para hacer que abunde en ustedes toda gracia, a fin de que, teniendo siempre en todas las cosas todo lo necesario, abunden para toda buena obra (2 Co 9:6-8).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Efesios 6:2', 
            'promesa' => 'Honra a tu padre y a tu madre (que es el primer mandamiento con promesa) (Ef 6:2).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Filipenses 4:6-7', 
            'promesa' => 'Por nada estén afanosos; más bien, presenten sus peticiones delante de Dios en toda oración y ruego, con acción de gracias. Y la paz de Dios, que sobrepasa todo entendimiento, guardará sus corazones y sus mentes en Cristo Jesús (Filip 4:6-7).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Filipenses 4:19', 
            'promesa' => 'Mi Dios, pues, suplirá toda necesidad de ustedes conforme a sus riquezas en gloria en Cristo Jesús (Filip 4:19).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  'Hebreos 11:6', 
            'promesa' => 'Y sin fe es imposible agradar a Dios, porque es necesario que el que se acerca a Dios crea que él existe y que es galardonador de los que le buscan (He 11:6).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  '2 Pedro 3:13', 
            'promesa' => 'Según las promesas de Dios esperamos cielos nuevos y tierra nueva en los cuales mora la justicia (2 Pe 3:13).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  '1 Juan 1:9', 
            'promesa' => 'Si confesamos nuestros pecados, él es fiel y justo para perdonar nuestros pecados y limpiarnos de toda maldad (1 Jn 1:9).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  '1 Juan 2:25', 
            'promesa' => 'Y esta es la promesa que él nos ha hecho: la vida eterna (1 Jn 2:25).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  '1 Juan 3:2', 
            'promesa' => 'Amados, ahora somos hijos de Dios, y aún no se ha manifestado lo que seremos. Pero sabemos que, cuando él sea manifestado, seremos semejantes a él porque lo veremos tal como él es (1 Jn 3:2).',
        ));
        $wpdb->insert($tabla_promesa, array(
                'versiculo' =>  '1 Juan 5:14-15', 
            'promesa' => 'Y esta es la confianza que tenemos delante de él: que si pedimos algo conforme a su voluntad, él nos oye. Y si sabemos que él nos oye en cualquier cosa que pidamos, sabemos que tenemos las peticiones que le hayamos hecho (1 Jn 5:14-15).',
        ));
        $wpdb->insert($tabla_promesa, array(
            'versiculo' =>  'Apocalipsis 2:10', 
            'promesa' => 'No tengas ningún temor de las cosas que has de padecer. He aquí, el diablo va a echar a algunos de ustedes en la cárcel para que sean probados, y tendrán tribulación por diez días. Sé fiel hasta la muerte, y yo te daré la corona de la vida (Ap 2:10).',
        )) ;  

        }

}

?>