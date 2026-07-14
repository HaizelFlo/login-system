<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <h2 class="h4 mb-0">
                Crear permiso
            </h2>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h3 class="h5 mb-0">
                    Datos del nuevo permiso
                </h3>
            </div>

            <div class="card-body">
                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf

                    @include('permissions.form', [
                        'buttonText' => 'Crear permiso'
                    ])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>