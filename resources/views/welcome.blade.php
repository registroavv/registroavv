@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'welcome', 'title' => __('GMVV')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <h1 class="text-white text-center">{{ __('Bienvenidos al Sistema de Registro de las Asambleas Viviendo Venezolanos.') }}</h1>
      </div>
  </div>
</div>
@endsection