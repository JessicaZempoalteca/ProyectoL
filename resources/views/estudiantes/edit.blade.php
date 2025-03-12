<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grupos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Navegación */
        .navbar {
            background-color: #333;
            padding: 1rem;
        }

        .navbar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-around;
        }

        .navbar ul li {
            margin: 0;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            display: inline-block;
        }

        .navbar ul li a:hover {
            background-color: #575757;
            border-radius: 5px;
        }

        /* Pie de página */
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1rem;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="{{ route('home') }}">Inicio</a></li>
            <li><a href="{{ route('grupos.index') }}">Grupos</a></li>
            <li><a href="{{ route('estudiantes.index') }}">Estudiantes</a></li>
        </ul>
    </nav>

    <h1>EDITAR ESTUDIANTE</h1>
    <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $estudiante->nombre) }}">
            @if ($errors->has('nombre'))
                <p class="text-danger">{{ $errors->first('nombre') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="grupo">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ old('apellidos', $estudiante->apellidos) }}">
            @if ($errors->has('apellidos'))
                <p class="text-danger">{{ $errors->first('apellidos') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="grupo">Edad:</label>
            <input type="number" name="edad" id="edad" class="form-control" value="{{ old('edad', $estudiante->edad) }}">
            @if ($errors->has('edad'))
                <p class="text-danger">{{ $errors->first('edad') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="grupo">Email:</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $estudiante->email) }}">
            @if ($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="grupo">Telefono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $estudiante->telefono) }}">
            @if ($errors->has('telefono'))
                <p class="text-danger">{{ $errors->first('telefono') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="grupo_id">Grupo:</label>
            <select name="grupo_id" id="grupo_id" class="form-control">
                @foreach ($grupos as $grupo)
                    <option value="{{ $grupo->id }}" {{ isset($estudiante) && $estudiante->grupo_id == $grupo->id ? 'selected' : '' }}>
                        {{ $grupo->semestre }} {{ $grupo->grupo }} {{ $grupo->turno }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('grupo_id'))
                <p class="text-danger">{{ $errors->first('grupo_id') }}</p>
            @endif
        </div>        

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <footer class="footer">
        <p>&copy; 2025. Todos los derechos reservados.</p>
    </footer>
    
</body>
</html>