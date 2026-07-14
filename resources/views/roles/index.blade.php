<x-app-layout>
    <x-slot name="header">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <h2 class="h4 mb-1">
                    Roles
                </h2>

                <p class="text-muted mb-0">
                    Administración de roles del sistema.
                </p>
            </div>

            <a href="{{ route('roles.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i>
                Nuevo rol
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
                                <th>Descripción</th>
                                <th>Permisos</th>
                                <th class="text-end px-4">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($roles as $role)
                                <tr>
                                    <td class="px-4">
                                        {{ $role->id }}
                                    </td>

                                    <td>
                                        <span class="fw-semibold">
                                            {{ $role->name }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $role->description ?: 'Sin descripción' }}
                                    </td>

                                    <td>
                                        @forelse ($role->permissions as $permission)
                                            <span class="badge text-bg-primary mb-1">
                                                {{ $permission->name }}
                                            </span>
                                        @empty
                                            <span class="text-muted">
                                                Sin permisos
                                            </span>
                                        @endforelse
                                    </td>

                                    <td class="text-end px-4">
                                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-outline-warning" title="Editar rol">
                                            <i class="bi bi-pencil-square"></i>
                                            Editar
                                        </a>

                                        <form action="{{ route('roles.destroy', $role) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este rol?');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar rol">
                                                <i class="bi bi-trash"></i>
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <i class="bi bi-person-badge fs-1 text-muted"></i>

                                        <p class="text-muted mt-2 mb-3">
                                            No hay roles registrados.
                                        </p>

                                        <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">
                                            Crear primer rol
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

        @if ($roles->hasPages())
            <div class="mt-4">
                {{ $roles->links('pagination::bootstrap-5') }}
            </div>
        @endif

    </div>
</x-app-layout>