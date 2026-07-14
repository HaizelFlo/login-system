<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <h2 class="h4 mb-0">
                Editar rol
            </h2>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h3 class="h5 mb-0">
                    Editando: {{ $role->name }}
                </h3>
            </div>

            <div class="card-body">
                <form action="{{ route('roles.update', $role) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @include('roles.form', [
                        'buttonText' => 'Actualizar rol'
                    ])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>