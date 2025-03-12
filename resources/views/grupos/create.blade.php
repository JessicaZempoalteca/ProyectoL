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

    <h1>CREAR GRUPO</h1>
    <form action="{{ route('grupos.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="semestre">Semestre:</label>
            <input type="text" name="semestre" id="semestre" class="form-control" value="{{ old('semestre') }}">
            @if ($errors->has('semestre'))
                <p class="text-danger">{{ $errors->first('semestre') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="grupo">Grupo:</label>
            <input type="text" name="grupo" id="grupo" class="form-control" value="{{ old('grupo') }}">
            @if ($errors->has('grupo'))
                <p class="text-danger">{{ $errors->first('grupo') }}</p>
            @endif
        </div>
        
        <div class="form-group">
            <label for="turno">Turno:</label>
            <select name="turno" id="turno" class="form-control">
                <option value="Matutino" {{ old('turno') == 'Matutino' ? 'selected' : '' }}>Matutino</option>
                <option value="Vespertino" {{ old('turno') == 'Vespertino' ? 'selected' : '' }}>Vespertino</option>
            </select>
            @if ($errors->has('turno'))
                <p class="text-danger">{{ $errors->first('turno') }}</p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <footer class="footer">
        <p>&copy; 2025. Todos los derechos reservados.</p>
    </footer>
</body>
</html>