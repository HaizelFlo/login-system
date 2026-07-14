<x-app-layout>
    <x-slot name="header">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <h2 class="h4 mb-1">
                    Usuarios
                </h2>

                <p class="text-muted mb-0">
                    Administración de usuarios del sistema.
                </p>
            </div>

            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="bi bi-person-plus me-1"></i>
                Nuevo usuario
            </a>
        </div>
    </x-slot>

    <div class="py-4">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-1"></i>
                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                {{ session('error') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th class="px-4">ID</th>
                                <th>Nombre</th>
                                <th>Correo electrónico</th>
                                <th>Rol</th>
                                <th>Registro</th>
                                <th class="text-end px-4">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="px-4">
                                        {{ $user->id }}
                                    </td>

                                    <td>
                                        <span class="fw-semibold">
                                            {{ $user->name }}
                                        </span>

                                        @if (auth()->id() === $user->id)
                                            <span class="badge text-bg-info ms-1">
                                                Tú
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>

                                    <td>
                                        @if ($user->roles->isNotEmpty())
                                            @foreach ($user->roles as $role)
                                                <span class="badge text-bg-secondary">
                                                    {{ $role->name }}
                                                </span>
                                            @endforeach
                                        @elseif ($user->role)
                                            <span class="badge text-bg-secondary">
                                                {{ $user->role }}
                                            </span>
                                        @else
                                            <span class="text-muted">
                                                Sin rol
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $user->created_at?->format('d/m/Y') }}
                                    </td>

                                    <td class="text-end px-4">
                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pencil-square"></i>
                                            Editar
                                        </a>

                                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger" @disabled(auth()->id() === $user->id)>
                                                <i class="bi bi-trash"></i>
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="bi bi-people fs-1 text-muted"></i>

                                        <p class="text-muted mt-2 mb-3">
                                            No hay usuarios registrados.
                                        </p>

                                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
                                            Crear primer usuario
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

        @if ($users->hasPages())
            <div class="mt-4">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        @endif

    </div>
</x-app-layout>