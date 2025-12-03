<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión | UFitness Gym</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #ff6a00;
            --primary-dark: #c44f00;
            --bg-dark: #0d0d0d;
            --bg-darker: #050505;
            --text-light: #ffffff;
            --text-muted: rgba(255, 255, 255, 0.72);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background: radial-gradient(circle at 20% 20%, rgba(255, 106, 0, 0.12), transparent 35%),
                radial-gradient(circle at 80% 0%, rgba(255, 106, 0, 0.14), transparent 35%),
                linear-gradient(180deg, var(--bg-darker) 0%, #1a1a1a 60%, #000 100%);
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .card {
            width: min(960px, 100%);
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 0;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(255, 255, 255, 0.02);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.55);
        }

        .card-visual {
            position: relative;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.04), rgba(0, 0, 0, 0.5));
            padding: 36px;
            display: flex;
            align-items: flex-end;
            justify-content: flex-start;
            gap: 16px;
            overflow: hidden;
        }

        .card-visual::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 20% 15%, rgba(255, 106, 0, 0.35), transparent 40%);
            z-index: 0;
        }

        .card-visual img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.65);
            z-index: 0;
        }

        .visual-copy {
            position: relative;
            z-index: 1;
            max-width: 420px;
        }

        .visual-copy h1 {
            font-size: 2.4rem;
            margin: 0 0 12px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .visual-copy p {
            margin: 0;
            color: var(--text-muted);
            line-height: 1.7;
            font-weight: 500;
        }

        .card-form {
            padding: 36px;
            background: rgba(0, 0, 0, 0.65);
            display: grid;
            gap: 20px;
        }

        .card-form header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .logo {
            font-size: 1.4rem;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-transform: uppercase;
            color: var(--primary);
        }

        .logo::before {
            content: '';
            display: inline-block;
            width: 12px;
            height: 12px;
            background: var(--primary);
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(255, 106, 0, 0.7);
        }

        .back-link {
            font-weight: 600;
            color: var(--text-muted);
            text-decoration: underline;
            text-decoration-color: rgba(255, 255, 255, 0.35);
            text-underline-offset: 4px;
        }

        .form-title {
            font-size: 1.9rem;
            margin: 8px 0 6px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .form-subtitle {
            margin: 0;
            color: var(--text-muted);
            line-height: 1.6;
        }

        form {
            display: grid;
            gap: 18px;
        }

        label {
            display: block;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.68);
            margin-bottom: 8px;
        }

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
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }

        button:hover {
            transform: translateY(-1px);
            background: #ff7f26;
            box-shadow: 0 12px 22px rgba(255, 106, 0, 0.35);
        }

        .register {
            font-weight: 600;
            color: var(--text-muted);
            text-align: center;
            margin: 0;
        }

        .register a {
            color: var(--primary);
            font-weight: 800;
        }

        @media (max-width: 820px) {
            body {
                padding: 16px;
            }

            .card-visual {
                min-height: 260px;
            }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-visual">
            <img src="https://images.unsplash.com/photo-1549060279-7e168fcee0c2?auto=format&fit=crop&w=1200&q=80" alt="Entrenamiento en el gimnasio">
            <div class="visual-copy">
                <h1>Bienvenido de vuelta</h1>
                <p>Accede a tu cuenta para seguir tu progreso, reservar clases y mantener tu energía en movimiento con la comunidad de UFitness Gym.</p>
            </div>
        </div>
        <div class="card-form">
            <header>
                <a href="/" class="logo">UFitness Gym</a>
                <a href="/" class="back-link">← Regresar al inicio</a>
            </header>
            <div>
                <h2 class="form-title">Iniciar sesión</h2>
                <p class="form-subtitle">Ingresa tus credenciales para acceder a tu cuenta.</p>
            </div>
            <form action="#" method="POST">
                <div>
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" placeholder="correo@ejemplo.com" required>
                </div>
                <div>
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                </div>
                <button type="submit">Ingresar</button>
            </form>
            <p class="register">¿No tenés cuenta? <a href="{{ route('register') }}">Registrate aquí</a></p>
        </div>
    </div>
</body>
</html>