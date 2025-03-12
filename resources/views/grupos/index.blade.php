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
            margin: 0;
            padding: 0;
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

        /* Contenido principal */
        main {
            padding: 2rem;
            text-align: center;
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

    <h1>Grupos</h1>
    <a href="{{route('grupos.create')}}" class="btn btn-primary">Crear Nuevo Grupo</a>
    <br><br>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Semestre</th>
            <th>Grupo</th>
            <th>Turno</th>
            <th>Acciones</th>
        </tr>
        @foreach ($grupos as $grupo)
        <tr>
            <td>{{ $grupo->id }}</td>
            <td>{{ $grupo->semestre }}</td>
            <td>{{ $grupo->grupo }}</td>
            <td>{{ $grupo->turno }}</td>
            <td>
                <a href="{{ route('grupos.edit', $grupo->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <footer class="footer">
        <p>&copy; 2025. Todos los derechos reservados.</p>
    </footer>
</body>
</html>