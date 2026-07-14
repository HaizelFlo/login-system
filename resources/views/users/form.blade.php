<div class="mb-3">
    <label for="name" class="form-label">
        Nombre
    </label>

    <input type="text" id="name" name="name" value="{{ old('name', $user->name ?? '') }}" class="form-control @error('name') is-invalid @enderror" required autofocus>

    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">
        Correo electrónico
    </label>

    <input type="email" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="form-control @error('email') is-invalid @enderror" required>

    @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="role_id" class="form-label">
        Rol
    </label>

    <select id="role_id" name="role_id" class="form-select @error('role_id') is-invalid @enderror" required>
        <option value="">
            Selecciona un rol
        </option>

        @foreach ($roles as $role)
            <option
                value="{{ $role->id }}"
                @selected(
                    old(
                        'role_id',
                        isset($user) ? $user->roles->first()?->id : null
                    ) == $role->id
                )>
                {{ $role->name }}
            </option>
        @endforeach
    </select>

    @error('role_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="password" class="form-label">
        Contraseña
    </label>

    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" {{ isset($user) ? '' : 'required' }}>

    @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

    @isset($user)
        <div class="form-text">
            Déjala vacía para conservar la contraseña actual.
        </div>
    @endisset
</div>

<div class="mb-4">
    <label for="password_confirmation" class="form-label">
        Confirmar contraseña
    </label>

    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" {{ isset($user) ? '' : 'required' }}>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-check-circle me-1"></i>
        {{ $buttonText ?? 'Guardar' }}
    </button>

    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-x-circle me-1"></i>
        Cancelar
    </a>
</div>