@extends('layouts.panel')

@section('content')
<div class="container">
    <h2 class="mb-4">Crear Nuevo Producto</h2>

    {{-- Mostrar errores --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre"
                   class="form-control"
                   value="{{ old('nombre') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Marca</label>
            <input type="text" name="marca"
                   class="form-control"
                   value="{{ old('marca') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Categoría</label>
            <select name="categoria" class="form-select" required>
                <option value="">Seleccione</option>
                <option value="deportivos">Deportivos</option>
                <option value="casuales">Casuales</option>
                <option value="formales">Formales</option>
                <option value="otros">Otros</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tecnología</label>
            <input type="text" name="tecnologia"
                   class="form-control"
                   value="{{ old('tecnologia') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion"
                      class="form-control"
                      rows="3">{{ old('descripcion') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Stock Inicial</label>
            <input type="number"
                name="stock"
                class="form-control"
                value="{{ old('stock', 0) }}"
                min="0"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" name="precio"
                   class="form-control"
                   value="{{ old('precio') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input type="file" name="imagen"
                   class="form-control">
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('productos.index') }}"
               class="btn btn-secondary">
               Volver
            </a>

            <button type="submit" class="btn btn-success">
                Guardar Producto
            </button>
        </div>

    </form>
</div>
@endsection
