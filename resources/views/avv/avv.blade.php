@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'avv', 'title' => __('Registro AVV')])

@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>AVV</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr" defer></script>
        @livewireStyles
        @powerGridStyles
    </head>
    <body>
        <div class="content">
            <div class="container-fluid">
                <div class="rows">
                    <div class="col-md-12">
                        <div class="bg-white p-4 border border-gray-200 rounded">
                            <livewire:avvs-table/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        <!-- Scripts -->
        @livewireScripts
        @powerGridScripts
        <script src="//unpkg.com/alpinejs" defer></script>
        <script>
            window.addEventListener('showAlert', event => {
                alert(event.detail.message);
            })
        </script>
    </body>
</html>
