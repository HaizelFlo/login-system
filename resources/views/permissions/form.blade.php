<div class="mb-3">
    <label for="name" class="form-label">
        Nombre del permiso
    </label>

    <input type="text" id="name" name="name" value="{{ old('name', $permission->name ?? '') }}" class="form-control @error('name') is-invalid @enderror" maxlength="50" required autofocus>

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
        {{ old('description', $permission->description ?? '') }}
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

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-check-circle me-1"></i>
        {{ $buttonText ?? 'Guardar' }}
    </button>

    <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-x-circle me-1"></i>
        Cancelar
    </a>
</div>