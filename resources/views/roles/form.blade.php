<div class="mb-3">
    <label for="name" class="form-label">
        Nombre del rol
    </label>

    <input type="text" id="name" name="name" value="{{ old('name', $role->name ?? '') }}" class="form-control @error('name') is-invalid @enderror" maxlength="50" required autofocus>

    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-4">
    <label for="description" class="form-label">
        Descripción
    </label>

    <textarea id="description" name="description" rows="4" maxlength="255" class="form-control @error('description') is-invalid @enderror">
        {{ old('description', $role->description ?? '') }}
    </textarea>

    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

    <div class="form-text">
        La descripción es opcional.
    </div>
</div>

<div class="mb-4">
    <label class="form-label">
        Permisos del rol
    </label>

    @if ($permissions->isEmpty())
        <div class="alert alert-warning mb-0">
            No existen permisos registrados.

            <a href="{{ route('permissions.create') }}">
                Crear un permiso
            </a>
        </div>
    @else
        <div class="row">
            @foreach ($permissions as $permission)
                <div class="col-md-6 col-lg-4 mb-2">
                    <div class="form-check border rounded p-3 ps-5">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission-{{ $permission->id }}"
                            @checked(
                                in_array(
                                    $permission->id,
                                    old(
                                        'permissions',
                                        isset($role)
                                            ? $role->permissions->pluck('id')->toArray()
                                            : []
                                    )))>

                        <label class="form-check-label" for="permission-{{ $permission->id }}">
                            <span class="fw-semibold">
                                {{ $permission->name }}
                            </span>

                            @if ($permission->description)
                                <small class="d-block text-muted">
                                    {{ $permission->description }}
                                </small>
                            @endif
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @error('permissions')
        <div class="text-danger small mt-2">
            {{ $message }}
        </div>
    @enderror

    @error('permissions.*')
        <div class="text-danger small mt-2">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-check-circle me-1"></i>
        {{ $buttonText ?? 'Guardar' }}
    </button>

    <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-x-circle me-1"></i>
        Cancelar
    </a>
</div>