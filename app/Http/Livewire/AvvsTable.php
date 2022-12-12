<?php

namespace App\Http\Livewire;

use App\Models\avv;
use App\Models\estado;
use App\Models\municipio;
use App\Models\parroquia;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class AvvsTable extends PowerGridComponent
{
    use ActionButton;

    public string $primaryKey = 'avvs.id';
    // public string $sortField = 'avvs.id';

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();
        // $this->persist(['columns', 'filters']);

        return [
            Exportable::make('avv')
                ->striped()
                ->type(Exportable::TYPE_XLS)
                ->columnWidth([
                    1 => 20,
                    2 => 12,
                    3 => 19,
                    4 => 32,
                    5 => 33,
                    6 => 100,
                    7 => 100,
                    8 => 100,
                    9 => 10,
                    10 => 18,
                    11 => 50,
                    12 => 50,
                    13 => 86,
                    14 => 11,
                    15 => 12,
                    16 => 100,
                    17 => 100,
                    18 => 17,
                    19 => 16,
                    20 => 21,
                    21 => 21,
                    22 => 15,
                    23 => 15,
                    24 => 33,
                    25 => 25,
                    26 => 25,
                    27 => 35,
                    28 => 32,
                    29 => 24,
                    30 => 18,
                    31 => 16,
                    32 => 100,
                    33 => 20,
                    34 => 20,
                    35 => 32,
                    36 => 28,
                    37 => 100,
                    38 => 18,
                    39 => 22,
                    40 => 42,
                    41 => 15,
                    42 => 9,
                    43 => 9,
                    44 => 9,
                    45 => 9,
                    46 => 9,
                    47 => 9,
                    48 => 9,
                    49 => 9,
                    50 => 9,
                    ]),
            Header::make()
                ->showSearchInput()
                ->showToggleColumns(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<\App\Models\avv>
    */
    public function datasource(): ?Builder
    {
        return avv::query()
        ->join('estados', function ($avv){
            $avv->on('avvs.estado_id', '=', 'estados.id');
        })
        ->join('municipios', function($avv){
            $avv->on('avvs.municipio_id', '=', 'municipios.id');
        })
        ->join('parroquias', function($avv){
            $avv->on('avvs.parroquia_id', '=', 'parroquias.id');
        })
        ->join('organos', function($avv){
            $avv->on('avvs.organo_id', '=', 'organos.id');
        })
        ->join('saimes', function($avv){
            $avv->on('avvs.saime_id', '=', 'saimes.id');
        })
        ->join('implantacions', function($avv){
            $avv->on('avvs.implantacion_id', '=', 'implantacions.id');
        })
        ->join('proyectos', function($avv){
            $avv->on('avvs.proyecto_id', '=', 'proyectos.id');
        })
        ->join('prefactibilidads', function($avv){
            $avv->on('avvs.prefactibilidad_id', '=', 'prefactibilidads.id');
        })
        ->join('factibilidad_servicios', function($avv){
            $avv->on('avvs.factibilidad_servicio_id', '=', 'factibilidad_servicios.id');
        })
        ->join('salida_cartograficas', function($avv){
            $avv->on('avvs.salida_cartografica_id', '=', 'salida_cartograficas.id');
        })
        ->join('levantamiento_topograficos', function($avv){
            $avv->on('avvs.levantamiento_topografico_id', '=', 'levantamiento_topograficos.id');
        })
        ->join('estudio_suelos', function($avv){
            $avv->on('avvs.estudio_suelo_id', '=', 'estudio_suelos.id');
        })
        ->join('servicios_cercanos', function($avv){
            $avv->on('avvs.servicios_cercanos_id', '=', 'servicios_cercanos.id');
        })
        // ->join('propiedad_terrenos', function($avv){
        //     $avv->on('avvs.propiedad_terreno_id', '=', 'propiedad_terrenos.id');
        // })
        // ->join('cmgs', function($avv){
        //     $avv->on('avvs.cmg_id', '=', 'cmgs.id');
        // })
        // ->join('tpms', function($avv){
        //     $avv->on('avvs.tpm_id', '=', 'tpms.id');
        // })
        // ->join('sigevihs', function($avv){
        //     $avv->on('avvs.sigevih_id', '=', 'sigevihs.id');
        // })
        ->select([
            'avvs.*',
            'estados.nombre as nombre_estado',
            'municipios.nombre as nombre_municipio',
            'parroquias.nombre as nombre_parroquia',
            'organos.nombre as organo_nombre',
            'saimes.cedula as saime_cedula',
            'saimes.nombre1 as saime_nombre',
            'implantacions.nombre as implantacion_nombre',
            'proyectos.nombre as proyecto_nombre',
            'prefactibilidads.nombre as prefactibilidad_nombre',
            'factibilidad_servicios.nombre as factibilidad_nombre',
            'salida_cartograficas.nombre as salida_cartografica_nombre',
            'levantamiento_topograficos.nombre as levantamiento_nombre',
            'estudio_suelos.nombre as estudio_suelo_nombre',
            'servicios_cercanos.nombre as servicios_cercanos_nombre',
        //     'propiedad_terrenos.nombre as propiedad_nombre',
        //     'cmgs.nombre as cmg_nombre',
        //     'tpms.nombre as tpm_nombre',
        //     'sigevihs.nombre as sigevih_nombre',
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [
            'estado' => ['nombre'],
            'municipio' => ['nombre'],
            'parroquia' => ['nombre'],
            'organos' => ['nombre'],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {

        return PowerGrid::eloquent()

            ->addColumn('codigoregistro')
            ->addColumn('fecha_formatted', function (avv $model) {
                return Carbon::parse($model->created_at)->format('d/m/Y');
                })
            ->addColumn('nombre_estado')
            ->addColumn('nombre_municipio')
            ->addColumn('nombre_parroquia')
            ->addColumn('nombre')
            ->addColumn('nombre_terreno')
            ->addColumn('direccion')
            ->addColumn('familias')
            ->addColumn('cant_personas')
            ->addColumn('consejo_comunal')
            ->addColumn('comuna')
            ->addColumn('organo_nombre')
            ->addColumn('saime_cedula')
            ->addColumn('saime_nombre')
            ->addColumn('telefono')
            ->addColumn('observacion_redes')
            ->addColumn('nombre_proyecto')
            ->addColumn('implantacion_nombre')
            ->addColumn('proyecto_nombre')
            ->addColumn('cant_viviendas')
            ->addColumn('observacion_fmh')
            ->addColumn('area_terreno')
            ->addColumn('codigo_intu')
            ->addColumn('matriz_intu')
            ->addColumn('prefactibilidad_nombre')
            ->addColumn('factibilidad_nombre')
            ->addColumn('salida_cartografica_nombre')
            ->addColumn('levantamiento_nombre')
            ->addColumn('estudio_suelo_nombre')
            ->addColumn('servicios_cercanos_nombre')
            ->addColumn('observacion_intu2')
            ->addColumn('gaceta_oficial')
            ->addColumn('decreto_3330')
            ->addColumn('tenencia_terreno')
            ->addColumn('observacion_intu3')
            ->addColumn('latitud')
            ->addColumn('longitud')
            ->addColumn('metodologia_ejecucion')
            ->addColumn('tipologia_constructiva')
            ->addColumn('nombre_cmg')
            ->addColumn('tpm_codigo')
            ->addColumn('sigevih_codigo')
            ->addColumn('protocolizacion')
            ->addColumn('preregistro', function (avv $model) {
                return ($model->preregistro ? 'SI' : 'NO');})
            ->addColumn('nivel1', function (avv $model) {
                return ($model->nivel1 ? 'SI' : 'NO');})
            ->addColumn('nivel2', function (avv $model) {
                return ($model->nivel2 ? 'SI' : 'NO');})
            ->addColumn('nivel3', function (avv $model) {
                return ($model->nivel3 ? 'SI' : 'NO');})
            ->addColumn('nivel4', function (avv $model) {
                return ($model->nivel4 ? 'SI' : 'NO');})
            ->addColumn('nivel5', function (avv $model) {
                return ($model->nivel5 ? 'SI' : 'NO');})
            ->addColumn('nivel6', function (avv $model) {
                return ($model->nivel6 ? 'SI' : 'NO');})
            ->addColumn('nivel7', function (avv $model) {
              return ($model->nivel7 ? 'SI' : 'NO');})
            ->addColumn('nivel8', function (avv $model) {
                return ($model->nivel8 ? 'SI' : 'NO');})
            ->addColumn('nivel9', function (avv $model) {
                return ($model->nivel9 ? 'SI' : 'NO');});
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        $codigoestado = 0;
        return [

            // Column::make('ESTADOS', 'estado_id')
            // ->makeInputRange(),

            Column::make('CODIGO REGISTRO', 'codigoregistro')
                ->searchable(),

            Column::make('FECHA', 'fecha_formatted')
                ->sortable(),
                // ->makeInputDatePicker('avvs.created_at'),

            Column::make(__('ESTADO'), 'nombre_estado')
                ->sortable()
                ->searchable(),
                // ->makeInputSelect(estado::all(), 'nombre', 'avvs.estado_id'),

            Column::make(__('MUNICIPIO'), 'nombre_municipio')
                ->sortable()
                ->searchable(),
                // ->makeInputSelect(municipio::all()->where('estado_id', '=', 1), 'nombre', 'avvs.municipio_id'),

            Column::make(__('PARROQUIA'), 'nombre_parroquia')
                ->sortable()
                ->searchable(),
                // ->makeInputSelect(parroquia::all(), 'nombre', 'avvs.parroquia_id'),

            Column::make('NOMBRE', 'nombre')
                ->sortable()
                ->searchable(),
                // ->makeInputText('avvs.nombre'),

            Column::make('NOMBRE TERRENO', 'nombre_terreno')
                ->sortable()
                ->hidden()
                ->searchable()
                ->visibleInExport(true),
            // ->makeInputText(),
            
            Column::make('DIRECCION', 'direccion')
                ->hidden()
                ->visibleInExport(true),

            Column::make('FAMILIAS', 'familias')
                ->hidden()
                ->visibleInExport(true),

            Column::make('CANT PERSONAS', 'cant_personas')
                ->hidden()
                ->visibleInExport(true),

            Column::make('CONSEJO COMUNAL', 'consejo_comunal')
                ->hidden()
                ->visibleInExport(true),

            Column::make('COMUNA', 'comuna')
                ->hidden()
                ->visibleInExport(true),

            Column::make('ORGANO EJECUTOR', 'organo_nombre')
                ->hidden()
                ->visibleInExport(true),

            Column::make('CEDULA', 'saime_cedula')
                ->hidden()
                ->visibleInExport(true),

            Column::make('NOMBRE', 'saime_nombre')
                ->hidden()
                ->visibleInExport(true),

            Column::make('TELEFONO', 'telefono')
                ->hidden()
                ->visibleInExport(true),

            Column::make('OBSERVACION', 'observacion_redes')
                ->hidden()
                ->visibleInExport(true),

            Column::make('NOMBRE DEL PROYECTO', 'nombre_proyecto')
                ->hidden()
                ->searchable()
                ->visibleInExport(true),

            Column::make('IMPLANTACION', 'implantacion_nombre')
                ->hidden()
                ->visibleInExport(true),

            Column::make('PROYECTO', 'proyecto_nombre')
                ->hidden()
                ->visibleInExport(true),

            Column::make('CANT DE VIVIENDAS', 'cant_viviendas')
                ->hidden()
                ->visibleInExport(true),

            Column::make('OBSERVACION', 'observacion_fmh')
                ->hidden()
                ->visibleInExport(true),

            Column::make('AREA DEL TERRENO', 'area_terreno')
                ->hidden()
                ->visibleInExport(true),

            Column::make('CODIGO INTU', 'codigo_intu')
                ->hidden()
                ->visibleInExport(true),

            Column::make('MATRIZ INTU', 'matriz_intu')
                ->hidden()
                ->visibleInExport(true),

            Column::make('INFORME DE PREFACTIBILIDAD', 'prefactibilidad_nombre')
                ->hidden()
                ->visibleInExport(true),

            Column::make('FACTIBILIDAD TECNICA', 'factibilidad_nombre')
                ->hidden()
                ->visibleInExport(true),

            Column::make('SALIDA CARTOGRAFICA', 'salida_cartografica_nombre')
                ->hidden()
                ->visibleInExport(true),

            Column::make('LEVANTAMIENTO TOPOGRAFICO', 'levantamiento_nombre')
                ->hidden()
                ->visibleInExport(true),

            Column::make('ESTUDIO DE SUELO', 'estudio_suelo_nombre')
                ->hidden()
                ->visibleInExport(true),

            Column::make('SERVICIOS CERCANOS', 'servicios_cercanos_nombre')
                ->hidden()
                ->visibleInExport(true),

            Column::make('OBSERVACION', 'observacion_intu2')
                ->hidden()
                ->visibleInExport(true),

            Column::make('GACETA OFICIAL', 'gaceta_oficial')
                ->hidden()
                ->visibleInExport(true),

            Column::make('DECRETO 3330', 'decreto_3330')
                ->hidden()
                ->visibleInExport(true),

            Column::make('TENENCIA DEL TERRENO', 'tenencia_terreno')
                ->hidden()
                ->visibleInExport(true),

            Column::make('OBSERVACION', 'observacion_intu3')
                ->hidden()
                ->visibleInExport(true),

            Column::make('LATITUD', 'latitud')
                ->hidden()
                ->visibleInExport(true),

            Column::make('LONGITUD', 'longitud')
                ->hidden()
                ->visibleInExport(true),

            Column::make('METODOLOGIA DE EJECUCION', 'metodologia_ejecucion')
                ->hidden()
                ->visibleInExport(true),

            Column::make('TIPOLOGIA CONSTRUCTIVA', 'tipologia_constructiva')
                ->hidden()
                ->visibleInExport(true),

            Column::make('NOMBRE DEL CMG', 'nombre_cmg')
                ->hidden()
                ->visibleInExport(true),

            Column::make('CODIGO DEL TPM', 'tpm_codigo')
                ->hidden()
                ->visibleInExport(true),

            Column::make('CODIGO DEL SIGEVIH', 'sigevih_codigo')
                ->hidden()
                ->visibleInExport(true),

            Column::make('¿ESTA PROTOCOLIZADO?', 'protocolizacion')
                ->hidden()
                ->visibleInExport(true),

            Column::make('PREREGISTRO', 'preregistro')
                ->hidden()
                ->visibleInExport(true),
            
            Column::make('NIVEL 1', 'nivel1')
                ->hidden()
                ->visibleInExport(true),

            Column::make('NIVEL 2', 'nivel2')
                ->hidden()
                ->visibleInExport(true),

            Column::make('NIVEL 3', 'nivel3')
                ->hidden()
                ->visibleInExport(true),

            Column::make('NIVEL 4', 'nivel4')
                ->hidden()
                ->visibleInExport(true),

            Column::make('NIVEL 5', 'nivel5')
                ->hidden()
                ->visibleInExport(true),

            Column::make('NIVEL 6', 'nivel6')
                ->hidden()
                ->visibleInExport(true),

            Column::make('NIVEL 7', 'nivel7')
                ->hidden()
                ->visibleInExport(true),

            Column::make('NIVEL 8', 'nivel8')
                ->hidden()
                ->visibleInExport(true),

            Column::make('NIVEL 9', 'nivel9')
                ->hidden()
                ->visibleInExport(true),
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid avv Action Buttons.
     *
     * @return array<int, Button>
     */

    
    // public function actions(): array
    // {
    //    return [
    //        Button::make('edit', 'Edit')
    //            ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
    //            ->route('avv.edit', ['avv' => 'id']),

    //        Button::make('destroy', 'Delete')
    //            ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
    //            ->route('avv.delete', ['avv' => 'id'])
    //            ->method('delete')
    //     ];
    // }
    

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid avv Action Rules.
     *
     * @return array<int, RuleActions>
     */

    
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($avv) => $avv->id === 1)
                ->hide(),
        ];
    }
    
}
