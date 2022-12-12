<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class avv extends Model
{

    protected $fillable = ['estado_id', 'municipio_id', 'parroquia_id', 'nombre', 'codigo_intu'];

    public static function getAllAvv()
    {
        $estado = auth()->user()->estado_id;

        $result = DB::table('avvs')
        ->join('estados', 'avvs.estado_id', '=', 'estados.id')
        ->join('municipios', 'avvs.municipio_id', '=', 'municipios.id')
        ->join('parroquias', 'avvs.parroquia_id', '=', 'parroquias.id')
        ->join('organos', 'avvs.organo_id', '=', 'organos.id')
        ->join('saimes', 'avvs.saime_id', '=', 'saimes.id')
        ->join('implantacions', 'avvs.implantacion_id', '=', 'implantacions.id')
        ->join('proyectos', 'avvs.proyecto_id', '=', 'proyectos.id')
        ->join('prefactibilidads', 'avvs.prefactibilidad_id', '=', 'prefactibilidads.id')
        ->join('factibilidad_servicios', 'avvs.factibilidad_servicio_id', '=', 'factibilidad_servicios.id')
        ->join('salida_cartograficas', 'avvs.salida_cartografica_id', '=', 'salida_cartograficas.id')
        ->join('levantamiento_topograficos', 'avvs.levantamiento_topografico_id', '=', 'levantamiento_topograficos.id')
        ->join('estudio_suelos', 'avvs.estudio_suelo_id', '=', 'estudio_suelos.id')
        ->join('servicios_cercanos', 'avvs.servicios_cercanos_id', '=', 'servicios_cercanos.id')
        ->join('propiedad_terrenos', 'avvs.propiedad_terreno_id', '=', 'propiedad_terrenos.id')
        ->join('cmgs', 'avvs.cmg_id', '=', 'cmgs.id')
        ->join('tpms', 'avvs.tpm_id', '=', 'tpms.id')
        ->join('sigevihs', 'avvs.sigevih_id', '=', 'sigevihs.id')
        ->select('avvs.created_at',
                 'estados.nombre as estado',
                 'municipios.nombre as municipio',
                 'parroquias.nombre as parroquia',
                 'avvs.nombre',
                 'avvs.nombre_terreno',
                 'avvs.direccion',
                 'avvs.familias',
                 'avvs.cant_personas',
                 'avvs.consejo_comunal',
                 'avvs.comuna',
                 'organos.nombre as organo',
                 'saimes.cedula',
                 'saimes.nombre1',
                 'avvs.telefono',
                 'avvs.observacion_redes',
                 'avvs.nombre_proyecto',
                 'implantacions.nombre as implantacion',
                 'proyectos.nombre as proyecto',
                 'avvs.cant_viviendas',
                 'avvs.observacion_fmh',
                 'avvs.area_terreno',
                 'avvs.codigo_intu',
                 'avvs.matriz_intu',
                 'prefactibilidads.nombre as prefactibilidad',
                 'factibilidad_servicios.nombre as factibilidad',
                 'salida_cartograficas.nombre as salida_cartografica',
                 'levantamiento_topograficos.nombre as levantamiento',
                 'estudio_suelos.nombre as estudio_suelo',
                 'servicios_cercanos.nombre as servicios_cercanos',
                 'avvs.observacion_intu2',
                 'avvs.gaceta_oficial',
                 'avvs.decreto_3330',
                 'propiedad_terrenos.nombre as propiedad',
                 'avvs.tenencia_terreno',
                 'avvs.observacion_intu3',
                 'avvs.latitud',
                 'avvs.longitud',
                 'avvs.metodologia_ejecucion',
                 'avvs.tipologia_constructiva',
                 'cmgs.nombre as cmg',
                 'avvs.nombre_cmg',
                 'tpms.nombre as tpm',
                 'avvs.tpm_codigo',
                 'sigevihs.nombre as sigevih',
                 'avvs.sigevih_codigo',
                 'avvs.protocolizacion',
                 'avvs.preregistro',
                 'avvs.nivel1',
                 'avvs.nivel2',
                 'avvs.nivel3',
                 'avvs.nivel4',
                 'avvs.nivel5',
                 'avvs.nivel6',
                 'avvs.nivel7',
                 'avvs.nivel8',
                 'avvs.nivel9')->get();
        //dd($result);
        return $result;

    }
    public function requerimientos_fmh()
    {
        return $this->belongsTo(requerimientos_fmh::class);
    }
    public function implantacion()
    {
        return $this->belongsTo(implantacion::class);
    }
    public function municipio()
    {
        return $this->belongsTo(municipio::class);
    }
    public function parroquia()
    {
        return $this->belongsTo(parroquia::class);
    }
    public function estado()
    {
        return $this->belongsTo(estado::class);
    }
    public function organo()
    {
        return $this->belongsTo(organo::class);
    }
    public function saime()
    {
        return $this->belongsTo(saime::class);
    }
    public function proyecto()
    {
        return $this->belongsTo(proyecto::class);
    }
    public function estudioSuelo()
    {
        return $this->belongsTo(estudio_suelo::class);
    }
    public function factibilidadServicio()
    {
        return $this->belongsTo(factibilidad_servicio::class);
    }
    public function levantamientoTopografico()
    {
        return $this->belongsTo(levantamiento_topografico::class);
    }
    public function prefactibilidad()
    {
        return $this->belongsTo(prefactibilidad::class);
    }
    public function propiedad_terreno()
    {
        return $this->belongsTo(propiedad_terreno::class);
    }
    public function salidaCartografica()
    {
        return $this->belongsTo(salidaCartografica::class);
    }
    public function serviciosCercanos()
    {
        return $this->belongsTo(serviciosCercanos::class);
    }
    public function tpm()
    {
        return $this->belongsTo(tpm::class);
    }
    public function sigevih()
    {
        return $this->belongsTo(sigevih::class);
    }
    public function cmg()
    {
        return $this->belongsTo(cmg::class);
    }
    public function minuta()
    {
        return $this->hasMany(minuta::class);
    } 
	public function scopenombre($query, $nombre)
	{
		if($nombre)
        {
			return $query->where('nombre_proyecto', 'like', "%$nombre%")
                         ->orWhere('nombre', 'like', "%$nombre%");
        }
    }
	public function scopeproyecto($query, $proyecto)
	{
		if($proyecto)
        {
			return $query->where('proyecto_id', '=', "$proyecto");
        }
    }
	public function scopeimplantacion($query, $implantacion)
	{
		if($implantacion)
        {
			return $query->where('implantacion_id', '=', "$implantacion");
        }
    }
	public function scopeestado($query, $estado)
	{
		if($estado)
        {
			return $query->where('estado_id', '=', "$estado");
        }
    }
	public function scopepropiedad_terreno($query, $propiedad_terreno_id)
	{
		if($propiedad_terreno_id)
        {
			return $query->where('propiedad_terreno_id', '=', "$propiedad_terreno_id");
        }
    }
	public function scopeservicios_cercanos($query, $servicios_cercanos_id)
	{
		if($servicios_cercanos_id)
        {
			return $query->where('servicios_cercanos_id', '=', "$servicios_cercanos_id");
        }
    }
	public function scopeprefactibilidad($query, $prefactibilidad_id)
	{
		if($prefactibilidad_id)
        {
			return $query->where('prefactibilidad_id', '=', "$prefactibilidad_id");
        }
    }
	public function scopefactibilidad_servicio($query, $factibilidad_servicio_id)
	{
		if($factibilidad_servicio_id)
        {
			return $query->where('factibilidad_servicio_id', '=', "$factibilidad_servicio_id");
        }
    }
	public function scopesalida_cartografica($query, $salida_cartografica_id)
	{
		if($salida_cartografica_id)
        {
			return $query->where('salida_cartografica_id', '=', "$salida_cartografica_id");
        }
    }
	public function scopelevantamiento_topografico($query, $levantamiento_topografico_id)
	{
		if($levantamiento_topografico_id)
        {
			return $query->where('levantamiento_topografico_id', '=', "$levantamiento_topografico_id");
        }
    }
	public function scopeestudio_suelo($query, $estudio_suelo_id)
	{
		if($estudio_suelo_id)
        {
			return $query->where('estudio_suelo_id', '=', "$estudio_suelo_id");
        }
    }
	public function scopenivel1($query, $nivel1)
	{
		if($nivel1)
        {
			return $query->where('nivel1', '=', "$nivel1");
        }
    }
    public function scopenivel2($query, $nivel2)
	{
		if($nivel2)
        {
			return $query->where('nivel2', '=', "$nivel2");
        }
    }
	public function scopenivel3($query, $nivel3)
	{
		if($nivel3)
        {
			return $query->where('nivel3', '=', "$nivel3");
        }
    }
	public function scopenivel4($query, $nivel4)
	{
		if($nivel4)
        {
			return $query->where('nivel4', '=', "$nivel4");
        }
    }
}
