<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear cuenta | UFitness Gym</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #ff6a00;
            --bg-darker: #050505;
            --text-light: #ffffff;
            --text-muted: rgba(255, 255, 255, 0.72);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(180deg, var(--bg-darker) 0%, #1a1a1a 60%, #000 100%);
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        a { color: inherit; text-decoration: none; }

        .card {
            width: min(760px, 100%);
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 36px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.55);
            display: grid;
            gap: 20px;
        }

        .logo { font-size: 1.4rem; font-weight: 800; text-transform: uppercase; color: var(--primary); }
        .logo::before {
            content: '';
            display: inline-block;
            width: 12px;
            height: 12px;
            margin-right: 10px;
            background: var(--primary);
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(255, 106, 0, 0.7);
        }

        .subtitle { margin: 0; color: var(--text-muted); }

        form { display: grid; gap: 16px; }

        label { display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.12em; font-weight: 700; color: rgba(255, 255, 255, 0.68); margin-bottom: 8px; }

        input {
            width: 100%;
            padding: 14px 16px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.16);
            background: rgba(255, 255, 255, 0.04);
            color: var(--text-light);
            font-size: 1rem;
            font-family: inherit;
        }

        input:focus {
            outline: none;
            border-color: rgba(255, 106, 0, 0.8);
            box-shadow: 0 0 0 3px rgba(255, 106, 0, 0.15);
        }

        button {
            padding: 14px 18px;
            background: var(--primary);
            color: var(--text-light);
            border: none;
            border-radius: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            cursor: pointer;
        }

        .back-link { color: var(--text-muted); font-weight: 600; text-decoration: underline; text-underline-offset: 4px; }
    </style>
</head>
<body>
    <div class="card">
        <div style="display:flex; align-items:center; justify-content: space-between; gap: 12px;">
            <a href="/" class="logo">UFitness Gym</a>
            <a href="{{ route('login') }}" class="back-link">¿Ya tenés cuenta? Inicia sesión</a>
        </div>
        <div>
            <h1 style="margin: 0 0 8px; text-transform: uppercase;">Crear cuenta</h1>
            <p class="subtitle">Registrate para unirte a la comunidad UFitness y comenzar tu transformación.</p>
        </div>
        <form action="#" method="POST">
            <div>
                <label for="name">Nombre completo</label>
                <input type="text" id="name" name="name" placeholder="Tu nombre" required>
            </div>
            <div>
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" placeholder="correo@ejemplo.com" required>
            </div>
            <div style="display:grid; gap: 12px; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
                <div>
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Crea una contraseña" required>
                </div>
                <div>
                    <label for="password_confirmation">Confirmar contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repítela" required>
                </div>
            </div>
            <button type="submit">Registrarme</button>
        </form>
    </div>
</body>
</html>