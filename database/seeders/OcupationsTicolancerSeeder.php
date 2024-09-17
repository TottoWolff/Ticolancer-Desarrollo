<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OcupationsTicolancer as Ocupations;

class OcupationsTicolancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Ocupations::create(['name' => 'Consultoría de Marketing']);
        Ocupations::create(['name' => 'Optimización SEO']);
        Ocupations::create(['name' => 'Gestión de Redes Sociales']);
        Ocupations::create(['name' => 'Creación de Contenido']);
        Ocupations::create(['name' => 'Desarrollo de Aplicaciones Móviles']);
        Ocupations::create(['name' => 'Administración de Bases de Datos']);
        Ocupations::create(['name' => 'Seguridad Informática']);
        Ocupations::create(['name' => 'Investigación de Mercado']);
        Ocupations::create(['name' => 'Estrategia de Marca']);
        Ocupations::create(['name' => 'Redacción Publicitaria']);
        Ocupations::create(['name' => 'Desarrollo de E-commerce']);
        Ocupations::create(['name' => 'Diseño Gráfico']);
        Ocupations::create(['name' => 'Ilustración']);
        Ocupations::create(['name' => 'Diseño de Logotipos']);
        Ocupations::create(['name' => 'Diseño de Presentaciones']);
        Ocupations::create(['name' => 'Edición de Fotografía']);
        Ocupations::create(['name' => 'Creación de Infografías']);
        Ocupations::create(['name' => 'Producción Musical']);
        Ocupations::create(['name' => 'Composición de Música']);
        Ocupations::create(['name' => 'Edición de Audio']);
        Ocupations::create(['name' => 'Locución']);
        Ocupations::create(['name' => 'Traducción Técnica']);
        Ocupations::create(['name' => 'Corrección de Estilo']);
        Ocupations::create(['name' => 'Transcripción']);
        Ocupations::create(['name' => 'Creación de Cursos Online']);
        Ocupations::create(['name' => 'Asistencia Virtual']);
        Ocupations::create(['name' => 'Diseño de Experiencia de Usuario (UX)']);
        Ocupations::create(['name' => 'Desarrollo Front-end']);
        Ocupations::create(['name' => 'Desarrollo Back-end']);
        Ocupations::create(['name' => 'Implementación de CRM']);
        Ocupations::create(['name' => 'Diseño de Interactividad']);
        Ocupations::create(['name' => 'Automatización de Procesos']);
        Ocupations::create(['name' => 'Análisis de Datos']);
        Ocupations::create(['name' => 'Desarrollo de Plugins']);
        Ocupations::create(['name' => 'Asesoría en Innovación']);
        Ocupations::create(['name' => 'Gestión de Proyectos']);
        Ocupations::create(['name' => 'Investigación Académica']);
        Ocupations::create(['name' => 'Asesoría Legal']);
        Ocupations::create(['name' => 'Consultoría Financiera']);
    }
}
