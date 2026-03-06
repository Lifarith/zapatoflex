@extends('layouts.panel')

@section('content')
<div class="container">
    <h2 class="mb-4">Editar Producto</h2>

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

    <form action="{{ route('productos.update', $producto) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre"
                   class="form-control"
                   value="{{ old('nombre', $producto->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Marca</label>
            <input type="text" name="marca"
                   class="form-control"
                   value="{{ old('marca', $producto->marca) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Categoría</label>
            <select name="categoria" class="form-select" required>
                <option value="deportivos"
                    {{ $producto->categoria == 'deportivos' ? 'selected' : '' }}>
                    Deportivos
                </option>
                <option value="casuales"
                    {{ $producto->categoria == 'casuales' ? 'selected' : '' }}>
                    Casuales
                </option>
                <option value="formales"
                    {{ $producto->categoria == 'formales' ? 'selected' : '' }}>
                    Formales
                </option>
                <option value="otros"
                    {{ $producto->categoria == 'otros' ? 'selected' : '' }}>
                    Otros
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tecnología</label>
            <input type="text" name="tecnologia"
                   class="form-control"
                   value="{{ old('tecnologia', $producto->tecnologia) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion"
                      class="form-control"
                      rows="3">{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" name="precio"
                   class="form-control"
                   value="{{ old('precio', $producto->precio) }}" required>
        </div>

        {{-- Imagen actual --}}
        @if($producto->imagen)
            <div class="mb-3">
                <label class="form-label">Imagen Actual</label><br>
                <img src="{{ asset('storage/'.$producto->imagen) }}"
                     width="150"
                     class="img-thumbnail">
            </div>
        @endif

        <div class="mb-3">
            <label class="form-label">Cambiar Imagen</label>
            <input type="file" name="imagen"
                   class="form-control">
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('productos.index') }}"
               class="btn btn-secondary">
               Volver
            </a>

            <button type="submit" class="btn btn-primary">
                Actualizar Producto
            </button>
        </div>

    </form>
</div>
@endsection
