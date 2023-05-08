<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Definimos las siguiente categorias
     *  1 Menu
     *  2 Aperitivo
     *  3 Rustidera
     *  4 Ensaladilla
     *  5 Paellas
     *  6 Principal
     *  7 Brasas
     */
    public function run(): void
    {
        
        $products = [

            #region ///////////////// Aperitivo en general ---------------------------------------------------------------------
            [
                //DSC_0053.jpg
                'name' => 'Calamares a la romana',
                'description' => 'Nuestros calamares a la romana son elaborados con calamares frescos, cortados en anillos, rebozados en harina y huevo, y fritos para lograr su deliciosa textura crujiente. Perfectos para compartir o disfrutar en solitario. ',
                'image' => 'DSC_0053.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0054.jpg
                'name' => 'Gabardinas',
                'description' => 'Deliciosas Gambas Rebozadas, que podrás disfrutar con Ajo, salsa María o mayonesa, tu eliges el complemento.',
                'image' => 'DSC_0054.jpg',
                'category_id' => 2
            ], 
            [
                //DSC_0008.jpg
                'name' => 'Cortezas',
                'description' => 'Adobadas con especias de alta calidad, cortadas y preparadas cuidadosamente para garantizar su textura crujiente y delicioso sabor. Elaboradas por nosotros con cerdo de origen local.',
                'image' => 'DSC_0008.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0009.jpg
                'name' => 'Rabo de cerdo',
                'description' => 'Nuestro rabo de cerdo es cocido a fuego lento para obtener un sabor delicioso y textura crujiente. Perfecto para compartir. Origen y alta calidad garantizados.',
                'image' => 'DSC_0009.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0001.jpg
                'name' => 'Alitas / muslitos de pollo',
                'description' => 'Rebozados con una mezcla de cerveza y especias para lograr un sabor único y delicioso. Crujientes por fuera y tiernos por dentro.',
                'image' => 'DSC_0001.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0002.jpg
                'name' => 'Tigres',
                'description' => 'Una deliciosa opción de marisco, rellenos con una mezcla de almejas, pan rallado, ajo y perejil, entre otros ingredientes. Fritos para lograr una textura crujiente por fuera y suave por dentro.',
                'image' => 'DSC_0002.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0003.jpg
                'name' => 'Calabacin relleno',
                'description' => 'Una receta saludable y sabrosa, que consiste en ahuecar la mitad del calabacín y rellenarlo con una mezcla de queso, champiñones salteados y carne picada cocida, horneado hasta que esté dorado.',
                'image' => 'DSC_0003.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0004.jpg
                'name' => 'Muslitos de cangrejo',
                'description' => 'Exquisitez del mar, con un sabor dulce y delicado. Son ideales para disfrutar en solitario o como parte de una ensalada o plato de mariscos. Su textura suave y jugosa los convierte en una opción irresistible para los amantes del marisco.',
                'image' => 'DSC_0004.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0005.jpg
                'name' => 'Flamenquines',
                'description' => 'Típicos en la gastronomía Andaluza, están hechos con finas lonchas de jamón york y queso enrollados en una jugosa carne de cerdo y empanados para un crujiente irresistible.',
                'image' => 'DSC_0005.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0006.jpg
                'name' => 'Empanadillas de atún',
                'description' => 'Nuestras empanadillas de atún, típicas en la cocina mediterránea, hechas con una deliciosa masa crujiente y rellenas de atún, cebolla y tomate.',
                'image' => 'DSC_0006.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0018.jpg
                'name' => 'Sepia',
                'description' => 'Si te encanta la sepia, en nuestra casa podrás disfrutarla a la plancha o rebozada, según tu preferencia.',
                'image' => 'DSC_0018.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0024.jpg
                'name' => 'Chipirón',
                'description' => 'A la plancha o rebozados, según tu preferencia. Nuestros chipirones son seleccionados con cuidado para asegurar su calidad y sabor, y los preparamos con la técnica adecuada para que disfrutes de su textura y sabor únicos. ',
                'image' => 'DSC_0024.jpg',
                'category_id' => 2
            ],
            [
                'name' => 'Pimientos rellenos de arroz tres delicias',
                'description' => 'Un clásico de la cocina mediterránea, y en nuestra casa los preparamos con un toque especial. Rellenamos nuestros pimientos con una mezcla de arroz y otros ingredientes seleccionados cuidadosamente para crear una explosión de sabores en tu boca. Pruébalos y no podrás resistirte a pedir más. ',
                'image' => 'pimientos_rellenos',
                'category_id' => 2
            ],
            [
                //DSC_0007.jpg
                'name' => 'Pimientos italianos',
                'description' => 'Prueba nuestros pimientos italianos fritos, crujientes por fuera y suaves por dentro, con un toque de sal y limón. ¡Ven a probarlos!',
                'image' => 'DSC_0007.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0020.jpg
                'name' => 'Calabacín, Berenjena y Alcachofa en tempura',
                'description' => 'Deliciosos calabacines, berenjenas y alcachofas fritos en tempura, crujientes por fuera y tiernos por dentro. ¡Prueba nuestra tempura!',
                'image' => 'DSC_0020.jpg',
                'category_id' => 2
            ],
            // Croquetas
            [
                //DSC_0015.jpg
                'name' => 'Croquetas de queso',
                'description' => 'Nuestras deliciosas croquetas de queso con un crujiente dorado son excelentes para compartir con amigos y familia, y un sabor inigualable que te dejará deseando más.',
                'image' => 'DSC_0015.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0014.jpg
                'name' => 'Croquetas de rabo de toro',
                'description' => 'Deliciosa especialidad española, con un interior cremoso y sabroso de rabo de toro guisado, y un crujiente exterior que las convierte en una deliciosa opción para cualquier ocasión.',
                'image' => 'DSC_0014.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0016.jpg
                'name' => 'Croquetas de pollo',
                'description' => 'Los preparamos con carne de pollo asada en horno de leña. El sabor ahumado de la carne le da un cremoso relleno a la croqueta. Son una excelente opción para disfrutar en cualquier momento del día.',
                'image' => 'DSC_0016.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0010.jpg
                'name' => 'Croquetas de jamón',
                'description' => 'Deliciosa y popular en la gastronomía española, la croqueta de jamón es un bocado crujiente por fuera y cremoso por dentro que no puedes dejar de probar.',
                'image' => 'DSC_0010.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0019.jpg
                'name' => 'Croquetas de Jabali',
                'description' => 'Las croquetas de jabalí caseras son una deliciosa alternativa a las croquetas tradicionales. Utilizando jabalí de montería cazado, puedes darle un sabor único y salvaje a tus croquetas. ¡Pruébalas y sorpréndete!',
                'image' => 'DSC_0019.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0012.jpg
                'name' => 'Croquetas de espinacas',
                'description' => 'Opción deliciosa y saludable para disfrutar como aperitivo o plato principal. Su sabor suave y cremoso las hace ideales para toda la familia.',
                'image' => 'DSC_0012.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0011.jpg
                'name' => 'Croquetas de bacalao',
                'description' => 'Un clásico de la gastronomía española. Su sabor intenso y su textura las hacen irresistibles. Si eres amante del bacalao, no puedes dejar de probarlas. ¡Son una delicia!',
                'image' => 'DSC_0011.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0017.jpg
                'name' => 'Croquetas de cocido',
                'description' => 'Prueba esta receta tradicional y sorprende a tus invitados. Disfruta de la esencia de un cocido en cada bocado con estas croquetas cremosas y llenas de sabor. ',
                'image' => 'DSC_0017.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0013.jpg
                'name' => 'Croquetas de setas',
                'description' => 'Disfruta de la esencia vegetariana en cada bocado con estas croquetas cremosas y llenas de sabor.',
                'image' => 'DSC_0013.jpg',
                'category_id' => 2
            ],
            ////////////////////////////////
            [
                //DSC_0021.jpg
                'name' => 'Champiñones enteros',
                'description' => 'Los champiñones se fríen hasta que estén dorados. Luego se sirven con una salsa verde hecha de perejil, ajo, aceite de oliva y vinagre. La salsa agrega un toque fresco y herbáceo al plato, lo que lo convierte en una opción perfecta para acompañar una variedad de platos principales.',
                'image' => 'DSC_0021.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0035.jpg
                'name' => 'Caracoles',
                'description' => '',
                'image' => 'DSC_0035.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0022.jpg
                'name' => 'Champiñones laminado',
                'description' => 'Los champiñones se cortan en láminas finas y se fríen hasta que estén dorados. Y lo mismo que los enteros.',
                'image' => 'DSC_0022.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0037.jpg
                'name' => 'Bacalao frito',
                'description' => 'Gastronomía mediterránea, hecho con trozos de bacalao rebozados hasta el punto de quedarse crujientes, colocados en salsa de tomate casera.',
                'image' => 'DSC_0037.jpg',
                'category_id' => 2
            ],
            [
                'name' => 'Lagrimas de pollo',
                'description' => 'Son un platillo de la gastronomía china que consiste en trozos de pollo marinados en especias y fritos hasta obtener una textura crujiente y jugosa.',
                'image' => 'dedos_pollo',
                'category_id' => 2
            ],
            [
                //DSC_0030.jpg
                'name' => 'Queso frito con mermelada de tomate',
                'description' => 'Popular en la cocina española, que consiste en rebanadas de queso frito hasta que estén doradas y crujientes, servidas con una sabrosa mermelada de tomate casera.',
                'image' => 'DSC_0030.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0033.jpg
                'name' => 'Queso frito con tomate',
                'description' => 'De la cocina Andaluza, que consiste en trozos de queso que se rebozan en huevo y pan rallado, se fríen y se sirven con rodajas de tomate fresco, aceite de oliva y sal.',
                'image' => 'DSC_0033.jpg',
                'category_id' => 2
            ],
            // Patatas
            [
                //DSC_0029.jpg
                'name' => 'Patatas al montón',
                'description' => 'Típico de la cocina española, especialmente en la región de Extremadura. Se trata de patatas cortadas en rodajas y fritas con ajos, pimentón y aceite de oliva, que se sirven apiladas en un montón y BAJO ENCARGO! acompañadas de otros ingredientes como huevo frito o chorizo.',
                'image' => 'DSC_0029.jpg',
                'category_id' => 2
            ],
            [
                //DSC_0039.jpg
                'name' => 'Patatas al horno',
                'description' => 'Plato sencillo y delicioso. Se cortan las patatas en rodajas o en cuñas, se sazonan con sal, pimienta y otras especias al gusto, se rocían con aceite de oliva y se hornean a alta temperatura hasta que estén doradas y crujientes por fuera y suaves por dentro. ',
                'image' => 'DSC_0039.jpg',
                'category_id' => 2
            ],
            [
                'name' => 'Patatas bravas',
                'description' => 'Son un plato típico de la cocina española. Se trata de patatas cortadas en cubos o en gajos, fritas y luego cubiertas con un alineado picante o dulce.',
                'image' => 'patatas_horno_fritas',
                'category_id' => 2
            ],
            [
                //DSC_0038.jpg
                'name' => 'Patatas a palos',
                'description' => 'Patatas cortadas en forma de bastón, que se fríen en aceite caliente hasta que estén doradas y crujientes. Ténemos diferentes tamaños para que escojas el que mejor se adapta a tu mesa.',
                'image' => 'DSC_0038.jpg',
                'category_id' => 2
            ],
            #endregion
            #region ///////////////// PAELLAS ----------------------------------------------------------------------------------
            [
                'name' => 'Paella de manitas',
                'description' => 'Plato tradicional de la cocina valenciana, que incorpora las patas de cerdo y arroz con azafrán, pimiento, tomate y otras especias, para crear una deliciosa combinación de sabores y texturas.',
                'image' => 'paella_manitas',
                'category_id' => 5
            ],
            [
                'name' => 'Paella a tu gusto',
                'description' => '¿Quieres una paella a tu medida? En nuestra casa puedes personalizarla con tus ingredientes favoritos. ¡Haz que tu comida sea única y ven a disfrutar de una deliciosa paella!',
                'image' => 'paella_gusto',
                'category_id' => 5
            ],
            [
                'name' => 'Paella de pollo',
                'description' => '¿Te apetece una deliciosa paella de pollo? En nuestra casa preparamos una paella de pollo con los mejores ingredientes y especias para que disfrutes de su sabor único. Y si lo prefieres, también podemos prepararla con conejo. ¡Ven a visitarnos y déjate llevar por el auténtico sabor de la paella!',
                'image' => 'paella_pollo',
                'category_id' => 5
            ],
            [
                'name' => 'Paella de marisco',
                'description' => 'Disfruta de la perfecta combinación de mariscos en nuestra paella de marisco mezclado. Con una mezcla equilibrada de sabores y texturas, nuestra paella es el plato ideal para compartir con familia y amigos. ',
                'image' => 'paella_marisco',
                'category_id' => 5
            ],
            [
                'name' => 'Paella abanda',
                'description' => 'Disfruta de la auténtica paella a la banda, elaborada con los mejores ingredientes del mar. En nuestra versión, la paella de sepia y calamar, disfrutarás de un arroz lleno de sabor, con la textura perfecta y una mezcla de ingredientes que seguro te encantará. ¡Ven a probarla en nuestra casa!',
                'image' => 'paella_abanda',
                'category_id' => 5
            ],
            [
                'name' => 'Pella de arroz negro',
                'description' => '¿Te apetece algo diferente? Prueba nuestra deliciosa paella de arroz negro, con su intenso sabor a marisco, tinta de calamar y una textura única y sabrosa. Un plato perfecto para compartir con amigos o en familia. ¡Ven a probarla en nuestra casa!',
                'image' => 'paella_negro',
                'category_id' => 5
            ],
            #endregion
            #region /////////////// Ensaladilla --------------------------------------------------------------------------------
            [
                //DSC_0032.jpg
                'name' => 'Ensaladilla rusa',
                'description' => 'Una ensalada fría y refrescante, perfecta para los días calurosos de verano. Con patatas, zanahorias, guisantes, atún y mayonesa, cada bocado es una deliciosa explosión de sabores y texturas. ¡No puedes dejar de probarla!',
                'image' => 'DSC_0032.jpg',
                'category_id' => 4
            ],
            [
                //DSC_0041.jpg
                'name' => 'Pollo y nueces',
                'description' => '¡No puedes perderte nuestra deliciosa ensaladilla de la casa! Esta ensaladilla, inspirada en la receta armenia, está hecha con tiernos trozos de pollo, nueces picadas, mayonesa y una mezcla de hierbas frescas.',
                'image' => 'DSC_0041.jpg',
                'category_id' => 4
            ],
            [
                //DSC_0043.jpg
                'name' => 'Ensaladilla de bocas de mar',
                'description' => 'Prueba nuestra deliciosa ensaladilla de boca de mar, preparada con suaves trozos de boca de mar, lechuga fresca, granos de maíz dulce y una suave y cremosa mayonesa. ¡Te encantará!',
                'image' => 'DSC_0043.jpg',
                'category_id' => 4
            ],
            [
                //DSC_0042.jpg
                'name' => 'Salpicón de pulpo',
                'description' => 'Esta ensalada es muy refrescante y tiene un sabor suave y agradable que seguramente te encantará. Es perfecta como aperitivo o como plato principal en un día caluroso de verano. ¡No te pierdas la oportunidad de probar nuestro salpicón de pulpo en nuestra casa!',
                'image' => 'DSC_0042.jpg',
                'category_id' => 4
            ],
            [
                //DSC_0036.jpg
                'name' => 'Ensalada Taboulé',
                'description' => '¡Prueba nuestra deliciosa ensaladilla de Taboulé! Originaria de Francia, esta ensalada está hecha con sémola de trigo, perejil fresco picado, menta, cebolla, tomate y pepino, todo mezclado con una refrescante vinagreta de limón y aceite de oliva. Es una ensalada fresca y saludable que es perfecta como acompañamiento o como plato principal para aquellos que buscan una opción más ligera.',
                'image' => 'DSC_0036.jpg',
                'category_id' => 4
            ],
            [//DSC_0040.jpg
                'name' => 'Ensalada de brocoli',
                'description' => 'Refresca tu paladar con nuestra ensaladilla de brócoli fresco, una opción saludable y deliciosa para cualquier momento del día. Preparada con brócoli crujiente, zanahoria, cebolla y aderezada con una vinagreta de limón, aceite de oliva y aliño de hierbas. ¡Ven a probarla en nuestra casa!',
                'image' => 'DSC_0040.jpg',
                'category_id' => 4
            ],
            #endregion
            #region ////////////// Principales ---------------------------------------------------------------------------------
            [
                //DSC_0044.jpg
                'name' => 'Tortillas',
                'description' => 'La tortilla española es un plato clásico y versátil que se puede disfrutar en cualquier momento del día. Ya sea que prefieras la tortilla tradicional con patatas y cebolla, o quieras experimentar con diferentes ingredientes como pimientos, champiñones o jamón serrano, siempre habrá una opción para satisfacer tus gustos. Además, en muchos lugares se pueden hacer tortillas personalizadas bajo encargo con los ingredientes que prefieras. ¡No hay límites para lo que puedes hacer con una buena tortilla!',
                'image' => 'DSC_0044.jpg',
                'category_id' => 6
            ],
            [
                //DSC_0031.jpg
                'name' => 'Manitas de cerdo',
                'description' => 'Para los paladares más aventureros. Cocinadas lentamente, las manitas se vuelven suaves y tiernas, con una textura gelatinosa. Estas se pueden servir como plato principal con una salsa de tomate picante y especias, o como parte de un caldo o sopa para agregar sabor y cuerpo. ¡Un manjar para los amantes de la carne y los sabores intensos!',
                'image' => 'DSC_0031.jpg',
                'category_id' => 6
            ],
            [
                //DSC_0026.jpg
                'name' => 'Magro con tomate',
                'description' => 'Guiso de carne de cerdo magra y tomate fresco está lleno de sabores y aromas mediterráneos, cocinado a fuego lento para crear una textura suave y tierna. Cada bocado es una explosión de sabor que te llevará directamente a la mesa de una casa española. ¡No podrás resistirte a probarlo!',
                'image' => 'DSC_0026.jpg',
                'category_id' => 6
            ],
            [
                //DSC_0034.jpg
                'name' => 'Gazpacho manchego',
                'description' => 'sopa caliente y reconfortante de la región de La Mancha, elaborada con una mezcla de verduras, carne y pan. Su aroma ahumado y su textura suave y cremosa te harán desear saborear cada cucharada. ¡Una delicia para los amantes de la cocina tradicional española!',
                'image' => 'DSC_0034.jpg',
                'category_id' => 6
            ],
            [
                //DSC_0027.jpg
                'name' => 'Berenjena entera con verdura y carne',
                'description' => 'Una deliciosa explosión de sabores mediterráneos en cada bocado. El crujiente exterior de la berenjena se combina perfectamente con el relleno suculento de carne y verduras, con una mezcla de texturas que te harán agua la boca. El aroma que emana al hornearse hará que quieras saborearla sin parar. ¿Qué esperas para probarla?',
                'image' => 'DSC_0027.jpg',
                'category_id' => 6
            ],
            [
                //DSC_0023.jpg
                'name' => 'Media berenjena a la rustidera',
                'description' => 'Asado al horno y rellenada con un sofrito de tomate y verduras picadas. Se hornea hasta que esté dorada y suave.',
                'image' => 'DSC_0023.jpg',
                'category_id' => 6
            ],
            [
                //DSC_0028.jpg
                'name' => 'Hígado de pollo con vermut',
                'description' => 'Para los amantes de los sabores intensos. El hígado es cocinado con una mezcla de vermut y especias para lograr una textura suave y un sabor profundo. ',
                'image' => 'DSC_0028.jpg',
                'category_id' => 6
            ],
            [
                //DSC_0025.jpg
                'name' => 'Macarrones',
                'description' => 'Prueba nuestros macarrones a la boloñesa con carne picada, o con atún, o si prefieres con otros ingredientes. ¡Ven a probarlos!',
                'image' => 'DSC_0025.jpg',
                'category_id' => 6
            ],
            #endregion
            #region ////////////// Menús ---------------------------------------------------------------------------------------
            [
                //DSC_0045.jpg
                'name' => 'Menú 1',
                'description' => 'Medio pollo con una ración de patatas y 4 Croquetas 8€',
                'image' => 'menu_uno.jpg',
                'category_id' => 1
            ],
            [
                //DSC_0046.jpg
                'name' => 'Menú 2',
                'description' => 'Un pollo con una ración de patatas y 4 Croquetas 12€',
                'image' => 'menu_dos.jpg',
                'category_id' => 1
            ],
            [
                //DSC_0047.jpg
                'name' => 'Menú 3',
                'description' => 'Un pollo y medio con tres raciones de patatas y 6 Croquetas 20€',
                'image' => 'menu_tres.jpg',
                'category_id' => 1
            ],
            [
                //DSC_0048.jpg
                'name' => 'Menú 4',
                'description' => 'Dos pollos con cuatro raciones patatas y 8 Croquetas 26½',
                'image' => 'menu_cuatro.jpg',
                'category_id' => 1
            ],
            [
                //DSC_0050.jpg
                'name' => 'Menú Vegetariano',
                'description' => 'Una berenjena al horno (Dos mitades), una ración de patatas y 4 Croquetas (Setas o Espinacas) 5€',
                'image' => 'menu_vegetariano.jpg',
                'category_id' => 1
            ],
            [
                //DSC_0052.jpg
                'name' => 'Menú Paella',
                'description' => 'Una ración de paella, con verduras rebozadas y dos croquetas 6€',
                'image' => 'menu_cinco.jpg',
                'category_id' => 1
            ],
            #endregion
            #region ////////////// Rustideras ----------------------------------------------------------------------------------
            [
                'name' => 'Rustidera de Cochinillo',
                'description' => 'Con patatas y verduras es un plato clásico de la gastronomía española, que combina la textura crujiente de la piel del cochinillo con el sabor y aroma de las patatas y verduras asadas.',
                'image' => 'rustidera_cochinillo',
                'category_id' => 3
            ],
            [
                'name' => 'Rustidera de Codillo',
                'description' => 'Plato delicioso y tradicional de la cocina alemana, en el que se asa lentamente el codillo de cerdo en su propio jugo hasta que queda tierno y jugoso. Se suele servir con patatas y chucrut para completar un plato reconfortante y sabroso.',
                'image' => 'rustidera_codillo',
                'category_id' => 3
            ],
            [
                'name' => 'Rustidera de Pulpo',
                'description' => 'Preparación típica de la gastronomía gallega, donde se cocina el pulpo con patatas y cebolla en una cazuela de barro a fuego lento, hasta que todo queda tierno y jugoso. Se puede degustar como plato principal o como tapa acompañada de un buen vino blanco.',
                'image' => 'rustidera_pulpo',
                'category_id' => 3
            ],
            [
                'name' => 'Rustidera de Cordero',
                'description' => 'Se cocina lentamente la paletilla de cordero en su propio jugo junto con patatas y verduras, creando un plato sabroso y jugoso con una textura suave y tierna. Es perfecto para compartir en una comida en familia o con amigos.',
                'image' => 'rustidera_cordero',
                'category_id' => 3
            ],
            [
                'name' => 'Rustidera de Pollo',
                'description' => 'Se asa el pollo con patatas y cebolla en una cazuela de barro, creando un plato lleno de sabor y aroma. La textura crujiente de la piel del pollo y la suavidad de la carne se combinan perfectamente con las patatas y cebolla asadas, resultando en un plato reconfortante y delicioso.',
                'image' => 'rustidera_pollo',
                'category_id' => 3
            ],
            [
                'name' => 'Rustidera de Lubina o Dorada',
                'description' => 'La elección entre lubina o dorada dependerá del gusto personal o disponibilidad en el mercado. Ambas opciones son deliciosas y combinan perfectamente con las patatas y verduras asadas en la rustidera.',
                'image' => 'rustidera_pescado',
                'category_id' => 3
            ],
            #endregion
            #region ///////////////// a la brasa -------------------------------------------------------------------------------
            [
                'name' => 'Costillar',
                'description' => 'El costillar a la brasa de leña es un plato delicioso que se asa lentamente en una parrilla alimentada con leña, creando un sabor ahumado único. Ideal para disfrutar en compañía.',
                'image' => 'brasa_costillar',
                'category_id' => 7
            ],
            [
                'name' => 'Chuletón',
                'description' => 'El chuletón de cerdo a la brasa es un plato jugoso y crujiente que se cocina a fuego lento en una parrilla.',
                'image' => 'brasa_chuleton',
                'category_id' => 7
            ],
            [
                'name' => 'Kebab a Espada',
                'description' => 'Receta Armenia que consiste en trozos de carne marinados ensartados en una espada y directos puestos a la brasa, servido en pan de la casa.',
                'image' => 'brasa_kebab',
                'category_id' => 7
            ],
            [
                'name' => 'Muslos y Alitas',
                'description' => '¡No hay nada mejor que unos muslos de pollo o alitas a la brasa para una barbacoa deliciosa y divertida! Con su irresistible sabor ahumado y crujiente, se convertirán en el plato estrella de cualquier reunión. ',
                'image' => 'brasa_muslos',
                'category_id' => 7
            ],
            [
                'name' => 'Lubina y Dorada',
                'description' => 'En nuestro restaurante puedes elegir entre lubina o dorada a la brasa, dos opciones de pescado fresco y sabroso cocinado en nuestra parrilla de carbón. Ambas opciones son saludables y ligeras, y se pueden acompañar con ensaladas o verduras a la parrilla para una comida completa y deliciosa. ¡No te pierdas la oportunidad de disfrutar de nuestro pescado a la brasa!',
                'image' => 'brasa_pescado',
                'category_id' => 7
            ]
            #endregion
       
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
