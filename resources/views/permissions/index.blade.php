<x-app-layout>
    <x-slot name="header">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <h2 class="h4 mb-1">
                    Permisos
                </h2>

                <p class="text-muted mb-0">
                    Administración de permisos del sistema.
                </p>
            </div>

            <a href="{{ route('permissions.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i>
                Nuevo permiso
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

        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th class="px-4">ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th class="text-end px-4">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($permissions as $permission)
                                <tr>
                                    <td class="px-4">
                                        {{ $permission->id }}
                                    </td>

                                    <td>
                                        <span class="fw-semibold">
                                            {{ $permission->name }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $permission->description ?: 'Sin descripción' }}
                                    </td>

                                    <td class="text-end px-4">
                                        <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pencil-square"></i>
                                            Editar
                                        </a>

                                        <form action="{{ route('permissions.destroy', $permission) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este permiso?');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <i class="bi bi-key fs-1 text-muted"></i>

                                        <p class="text-muted mt-2 mb-3">
                                            No hay permisos registrados.
                                        </p>

                                        <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm">
                                            Crear primer permiso
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

        @if ($permissions->hasPages())
            <div class="mt-4">
                {{ $permissions->links('pagination::bootstrap-5') }}
            </div>
        @endif

    </div>
</x-app-layout>