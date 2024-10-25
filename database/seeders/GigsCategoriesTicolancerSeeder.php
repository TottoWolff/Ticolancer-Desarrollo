<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GigsCategoriesTicolancer as GigsCategories;

class GigsCategoriesTicolancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        GigsCategories::create(['category' => 'Programación y Tecnología', 'image' => 'https://concepto.de/wp-content/uploads/2014/08/programacion-2-e1551291144973.jpg']);
        GigsCategories::create(['category' => 'Marketing Digital', 'image' => 'https://mardini.com.br/wp-content/uploads/2023/04/sites-web-marketing-e1680639442992.jpeg']);
        GigsCategories::create(['category' => 'Video y Animación', 'image' => 'https://blog.hubspot.es/hubfs/EditoresdevideoonlinegratisDaVinciResolve16.jpeg']);
        GigsCategories::create(['category' => 'Arquitectura', 'image' => 'https://s1.significados.com/foto/arquitectura-og.jpg']);
        GigsCategories::create(['category' => 'Diseño Gráfico', 'image' => 'https://www.safecreative.org/blog/es/wp-content/uploads/2023/02/derechos-de-autor-en-diseno-grafico.jpg']);
        GigsCategories::create(['category' => 'Música y Audio', 'image' => 'https://universidadeuropea.com/resources/media/images/como-ser-productor-musical-1200x630.original.jpg']);
        GigsCategories::create(['category' => 'Servicios de IA', 'image' => 'https://www.muypymes.com/wp-content/uploads/2018/09/inteligenciaartificial-dinero.jpg']);
        GigsCategories::create(['category' => 'Traducción y Escritura', 'image' => 'https://mecir1990.wordpress.com/wp-content/uploads/2015/06/escritura.jpg']);
        GigsCategories::create(['category' => 'Fotografía', 'image' => 'https://www.dzoom.org.es/wp-content/uploads/2021/01/fotografa-ciudad-bokeh-810x540.jpg']);
    }
}
