<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <h2 class="h4 mb-0">
                Editar usuario
            </h2>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h3 class="h5 mb-0">
                    Editando: {{ $user->name }}
                </h3>
            </div>

            <div class="card-body">
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @include('users.form', [
                        'buttonText' => 'Actualizar usuario'
                    ])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>