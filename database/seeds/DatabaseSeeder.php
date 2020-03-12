<?php

use App\Food;
use App\Rating;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    //para ejecutar el run=>    php artisan db:seed
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        self::seedFoods();
        $this->command->info('Datos en tabla foods insertados correctamente!');
        self::seedUsers();
        $this->command->info('Datos en tabla users insertados correctamente!');
        self::seedRatings();
        $this->command->info('Datos en tabla ratings insertados correctamente!');
    }

    private function seedFoods()
    {
        DB::table('foods')->delete();
        $r = new Food();
        $r->name = 'Paella';
        $r->difficulty = 'Media';
        $r->time = 50;
        $r->price = 20;
        $r->kcal = 225;
        $r->description = 'Como punto de partida preparamos un fumet (caldo) con tomate, cebolla, aceite oliva virgen y pescado de roca, galeras o cangrejos.\r\n\r\nTras añadir aceite de oliva virgen en el centro de la paella (aprovechamos para nivelar la paella),  sofreímos las cigalas, las gambas o langostinos y retiramos.Sofreímos la sepia o el calamar a taquitos y añadimos la salsa de ñora o “Salmorreta”* y removemos todos los ingredientes hasta que queden bien embadurnados.\r\n\r\nUna vez mezclado todo añadimos el pimentón dulce encima y removemos evitando que el pimentón se queme y añadimos el arroz en la paella (100 gr por persona) y continuamos mezclando todo hasta que el arroz se dore.Una vez perlado el arroz añadimos el fumet en la paella en una proporción de 1 de arroz por 3 de fumet y espolvoreamos un poco de azafrán al gusto.\r\n\r\nSubimos el fuego al máximo y cuando se empiece a evaporar el fumet añadimos los mejillones y el marisco de forma ordenada y vistosa.Una vez empiece a emerger el arroz bajamos fuego al mínimo y esperamos a que se evapore todo el caldo.\r\n\r\nSi fuera necesario añadir fumet lo haremos lentamente y asegurándonos de que esté caliente para no estropear la cocción.  Una vez seco el arroz  dejamos reposar unos 10 minutos.';
        $r->image = 'images\paella.jpg';
        $r->save();

        $r1 = new Food();
        $r1->name = 'Macarrones';
        $r1->difficulty = 'Fácil';
        $r1->time = 25;
        $r1->price = 11;
        $r1->kcal = 345;
        $r1->description = 'Lo primero que vamos a hacer es cocer la pasta. Pon agua en una olla, suficiente para que cubra la pasta, y una cucharadita de postre de sal. Sube la temperatura al máximo para que hierba.\r\nCuando empiece a hervir añade los macarrones, y cuando vuelva a hervir de nuevo, déjalos cociendo los minutos que muestre el paquete (en este caso son 9 minutos). Al cabo de ese tiempo escúrrelos.\r\nMientras vamos a elaborar el resto de la receta, para tener lista la panceta y la mezcla de huevos y queso justo cuando escurramos los macarrones.\r\nCorta la panceta en tiritas finas y saltéala en una sartén a fuego medio hasta que se dore, como puedes ver en la fotografía. Reserva.\r\nEn un bol bate los huevos, ralla el queso y añádelo. Remueve bien e incorpora un poco de pimienta negra molida. Mézclalo todo para que se fusionen los ingredientes.\r\nAhora es cuando viene el verdadero truco para elaborar la perfecta carbonara: cuando los macarrones estén listos y sigan bien calientes tras su cocción, vuelve a ponerlos en la olla en la que los has cocido y añade la panceta junto con la mezcla de huevos y queso, y remueve suavemente para que se impregne bien toda la pasta. De esta forma, el propio calor de los macarrones hará que el huevo se cuaje ligeramente y el resultado quede cremoso pero no crudo.';
        $r1->image = 'images\macarrones.jpg';
        $r1->save();

        $r2 = new Food();
        $r2->name = 'Arroz Negro';
        $r2->difficulty = 'Fácil';
        $r2->time = 25;
        $r2->price = 11;
        $r2->kcal = 345;
        $r2->description = 'Picamos la cebolla, el pimiento, el tomate y el ajo en trozos muy finos. Por otro lado, pelamos las gambas y reservamos. Con las cabezas de las gambas preparamos un fumet para después preparar con el nuestro arroz. En una paella, ponemos un chorreón de aceite de oliva virgen extra, y cuando esté caliente salteamos la sepia previamente troceada durante cinco minutos.\r\n\r\nAñadimos la cebolla y el pimiento verde, removemos y dejamos que se hagan durante cinco minutos. Agregamos el ajo y las gambas, rehogamos unos minutos y por fin agregamos el tomate troceado. Salamos ligeramente y dejamos que se cocine todo durante cinco minutos. Retiramos las gambas y las reservamos para el final de la elaboración.\r\nDiluimos las tintas en un vasito con dos cucharadas de agua caliente y lo añadimos a la cazuela. Incorporamos el arroz y dejamos que se sofría sin dejar de remover durante dos minutos aproximadamente. Añadimos el vino blanco y dejamos que se evapore.\r\n\r\nCubrimos el arroz con la mitad del caldo y dejamos que hierva, dejando que se cocine a fuego vivo durante diez minutos, momento en que añadiremos el resto del caldo, bajaremos el fuego y continuaremos la cocción a fuego medio durante otros siete minutos más.\r\nEste tiempo es orientativo y el punto depende de factores como el tipo de arroz y el fuego utilizado, de manera que es conveniente probar el arroz en los minutos finales. Cuando falten dos minutos, añadimos las gambas y subimos el fuego para terminar de evaporar el caldo. Antes de servir, dejamos reposar durante cinco minutos cubriendo con un paño limpio.';
        $r2->image = 'images\arroznegro.jpg';
        $r2->save();

        $r3 = new Food();
        $r3->name = 'Cocido Madrileño';
        $r3->difficulty = 'Difícil';
        $r3->time = 50;
        $r3->price = 18;
        $r3->kcal = 275;
        $r3->description = 'La noche anterior pondremos a remojo unos buenos garbanzos castellanos en la víspera del cocido. Truco: Además le pondremos un puñado de sal gorda para que al día siguiente no se encallen en la cocción. Empezaremos por poner a cocer, partiendo de agua fría, las carnes, la punta de jamón y los huesos indicados. Clave: Durante todo el cocido, de principio a fin, retiraremos la espuma que se vaya formando con una espumadera. Asimismo iremos incorporando agua según se vaya evaporando para que nuestro cocido no se quede seco.\r\nEl fuego del cocido lo tendremos de una forma continua a media potencia. Cuando el agua empiece a hervir, añadimos los garbanzos, previamente escurridos y lavados. Desde que el agua vuelva a hervir, tardarán en estar tiernos entre dos y tres horas, hecho a fuego lento o bien unos 20 minutos en caso de hacerlo en olla rápida. Recomendación: meted los garbanzos en una malla para poder sacarlos con facilidad al finalizar la cocción y así poder servir el cocido en los tres vuelcos tradicionales.\r\nEn un puchero aparte, ponemos a cocer el repollo, y en otra cacerola, cocemos chorizos y morcillas, para que no llenen de grasa nuestro caldo. Cuando el cocido esté prácticamente hecho, incorporamos las patatas y las zanahorias peladas en el puchero del cocido madrileño.\r\nAl finalizar el proceso, sacamos las carnes y las servimos en una fuente a la que incorporamos chorizos y morcillas. Rehogamos el repollo y lo ponemos en una fuente con los garbanzos, las patatas y las zanahorias. Para hacer la sopa, colamos el caldo y añadimos los fideos cuando el caldo empiece a hervir, siendo necesarios dos o tres minutos para los fideos finos tipo cabellín.';
        $r3->image = 'images\cocidomadrileno.jpg';
        $r3->save();

        $r4 = new Food();
        $r4->name = 'Flamenquín Cordobés';
        $r4->difficulty = 'Media';
        $r4->time = 35;
        $r4->price = 8;
        $r4->kcal = 275;
        $r4->description ='Se aplastan lo más finamente posible los filetes, se extienden y rellenan con tiras de jamón y tocino ibérico. Se enrollan y primero se pasan por harina, a continuación, por huevo y por último pasarlos por el pan rallado. Para terminar, se fríen en abundante aceite de oliva. Los flamenquines se pueden servir acompañados de patatas fritas, ensalada o mahonesa.';
        $r4->image = 'images\flamenquin.jpg';
        $r4->save();

        $r5 = new Food();
        $r5->name = 'Hamburguesa';
        $r5->difficulty = 'Media';
        $r5->time = 35;
        $r5->price = 8;
        $r5->kcal = 275;
        $r5->description ='En un bol mezclamos los ingredientes de las hamburguesas caseras. Los huevos, les darán un toque de cremosidad extra mientras que el pan rallado que, como ves es poca cantidad para que mantengan dicha cremosidad, darán un toquecito de crujir. El ajo y la cebolla, las pocho previamente, para que no tenga un sabor demasiado salvaje aunque, si lo prefieres, puedes añadirlo en crudo. Mezclamos con las manos limpias.\r\nAhora dividimos la masa e 4 porciones iguales. Las amasamos una a una, pasándola rápidamente de una mano a otra (así, logramos que se desarrolle la proteína de la carne, evitando que la hamburguesa se deshaga durante la cocción) y después, las aplastamos un poco, dándole la forma de hamburguesa.\r\nLas cocinamos. En una sartén antiadherente, ponemos tan solo una gotita de aceite, a fuego medio y colocamos sobre ella las hamburguesas. El tiempo exacto de cocción dependerá del punto deseado de la carne. Si la queremos poco hecha, con 3 minutos por cada una de sus caras será suficiente. Si la queremos más hecha, el doble de tiempo. Cuando le demos la vuelta, ponemos una loncha de queso encima de la hamburguesa, para que se vaya fundiendo.\r\nUna vez hechas, montamos las hamburguesas. Ponemos en el pan, al cual previamente lo hemos pasado un poco por la sartén para que esté caliente, una base de lechuga y encima una rodaja de tomate. Encima colocamos las hamburguesas caseras con la loncha de queso y encima, unos aros de cebolla. Terminamos aderezando con nuestra salsa favorita.';
        $r5->image = 'images\hamburguesa.jpg';
        $r5->save();

        $r6 = new Food();
        $r6->name = 'Pizza Carbonara';
        $r6->difficulty = 'Difícil';
        $r6->time = 45;
        $r6->price = 7;
        $r6->kcal = 315;
        $r6->description ='Comenzamos preparando la masa de pizza, -podéis usar una refrigerada si vais con prisa- o amasar nuestra masa casera. Para hacer la salsa carbonara, comenzamos cortando el bacon en tiras muy finas y las salteamos en una sartén hasta que comiencen a soltar su grasa. Las reservamos que ya se terminarán de cocinar en el horno. En la grasa que hayan soltado, salteamos los champiñones laminados vuelta y vuelta, reservándolos también. Después añadimos la nata líquida y 50 g de queso rallado en hilos -cualquier mezcla que nos guste- y la reducimos hasta que empiece a fundirse el queso. Extendemos la masa o base de la pizza, ponemos tres o cuatro cucharadas sopera de la salsa de nata y queso sobre ella y la extendemos bien con el dorso de una cuchara. Después añadimos la mozzarella desmigada en trocitos, los taquitos de bacon y champiñones y el resto del queso rallado en hilos. Añadimos un poco más de la salsa carbonara que hemos elaborado, -repartiéndolos por toda la superficie de la pizza-, espolvoreamos con abundante pimienta negra y la cocinamos en el horno precalentado a 230º durante unos 15 minutos hasta que los bordes de la pizza comiencen a tostarse.';
        $r6->image = 'images\pizza.jpg';
        $r6->save();

        $r7 = new Food();
        $r7->name = 'Salmorejo';
        $r7->difficulty = 'Fácil';
        $r7->time = 20;
        $r7->price = 6;
        $r7->kcal = 335;
        $r7->description ='Para hacer el salmorejo, me gusta ir mezclando los ingredientes paso a paso para así conseguir la textura perfecta. Comienzo lavando los tomates, retirando lo verde del pedúnculo y triturándolos. No es necesario pelar ni quitar las pepitas porque después paso el puré de tomate por un colador fino donde se queda todo pasando solamente el tomate.\r\nEn un bol coloco el pan y lo cubro con el puré de tomate dejando que se impregne durante unos diez minutos. Pasado ese tiempo, incorporo el diente de ajo y trituro bien con la batidora o con la Thermomix y obtengo una crema espesa de pan y tomate. La proporción de pan que yo uso es estupenda para esta textura, pero podéis variarla en función del agua que tengan los tomates que utilicéis y de lo consistente que sea la miga.\r\nA continuación incorporo el aceite de oliva virgen extra. Un buen salmorejo se debería hacer siempre con aceite de la zona de Córdoba, por lo que si podéis, cualquier variedad de la D.O. Cabra es la idónea, pero en todo caso, si no tenéis de allí, utilizad un buen aceite de oliva virgen extra que conseguirá la emulsión perfecta y un resultado cremoso y espeso.\r\nTras echar el aceite volvemos a turbinar todo en el robot de cocina o a base de batidora y paciencia hasta que nuestro salmorejo sea uniforme, con un bonito color anaranjado y suficientemente compacto como para aguantar sobre su superficie los tradicionales tropezones de guarnición con los que se decora cada ración.';
        $r7->image = 'images\salmorejo.jpg';
        $r7->save();

    }

    public function seedUsers(){
        DB::table('users')->delete();
        $user1 = new User();
        $user1->name = 'admin';
        $user1->email = 'admin@gmail.com';
        $user1->password = bcrypt('admin');
        $user1->birth = ('1986-05-28');
        $user1->rol = ('admin');
        $user1->save();
        $user2 = new User();
        $user2->name = 'usuario';
        $user2->email = 'usuario@gmail.com';
        $user2->password = bcrypt('usuario');
        $user2->birth = ('1990-04-26');
        $user2->rol = ('basic');
        $user2->save();
    }

    public function seedRatings(){
        DB::table('ratings')->delete();
        $val1= new Rating();
        $val1->user_id = 2;
        $val1->food_id = 1;
        $val1->opinion = 'opinion de la primera receta hecha por el usuario id=1 (usuario)';
        $val1->save();
        $val2= new Rating();
        $val2->user_id = 2;
        $val2->food_id = 2;
        $val2->opinion = 'opinion de la segunda receta hecha por el usuario id=1 (usuario)';
        $val2->save();
    }
}
