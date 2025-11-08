<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UFitness Gym</title>
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
            background: linear-gradient(180deg, var(--bg-darker) 0%, #1a1a1a 60%, #000 100%);
            color: var(--text-light);
            scroll-behavior: smooth;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        header {
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(12px);
            background: rgba(0, 0, 0, 0.75);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 72px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
            font-weight: 600;
            letter-spacing: 0.04em;
        }

        .logo {
            font-size: 1.6rem;
            font-weight: 800;
            display: flex;
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
            box-shadow: 0 0 24px rgba(255, 106, 0, 0.8);
        }

        .cta-link {
            padding: 10px 22px;
            background: var(--primary);
            color: var(--text-light);
            border-radius: 999px;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }

        .cta-link:hover {
            transform: translateY(-2px);
            background: #ff7f26;
            box-shadow: 0 10px 25px rgba(255, 106, 0, 0.35);
        }

        .hero {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 56px;
            padding: 90px 0 96px;
            align-items: center;
        }

        .hero-content h1 {
            font-size: clamp(2.8rem, 6vw, 4.8rem);
            line-height: 1.05;
            margin-bottom: 20px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .hero-content p {
            margin-bottom: 36px;
            font-size: 1.05rem;
            line-height: 1.8;
            color: var(--text-muted);
            font-weight: 500;
        }

        .hero-actions {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .hero-visual {
            position: relative;
            padding: 32px;
            border-radius: 28px;
            background: radial-gradient(circle at top left, rgba(255, 106, 0, 0.5), transparent 55%),
                linear-gradient(160deg, rgba(255, 255, 255, 0.05) 0%, rgba(0, 0, 0, 0.6) 100%);
            border: 1px solid rgba(255, 255, 255, 0.08);
            overflow: hidden;
        }

        .hero-visual::after {
            content: '';
            position: absolute;
            top: -25%;
            right: -20%;
            width: 220px;
            height: 220px;
            background: rgba(255, 106, 0, 0.35);
            filter: blur(80px);
            transform: rotate(35deg);
        }

        .hero-visual img {
            width: 100%;
            border-radius: 20px;
            object-fit: cover;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
        }

        section {
            padding: 96px 0;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 24px;
        }

        .section-subtitle {
            color: var(--primary);
            font-weight: 700;
            letter-spacing: 0.3em;
            font-size: 0.8rem;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .about-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 36px;
            align-items: start;
        }

        .story {
            background: rgba(255, 255, 255, 0.04);
            border-radius: 24px;
            padding: 32px;
            border: 1px solid rgba(255, 255, 255, 0.07);
            line-height: 1.7;
            color: var(--text-muted);
            font-weight: 500;
        }

        .highlight-card {
            background: linear-gradient(135deg, rgba(255, 106, 0, 0.12), rgba(255, 106, 0, 0));
            border-radius: 24px;
            padding: 32px;
            border: 1px solid rgba(255, 106, 0, 0.35);
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .highlight-card h3 {
            font-size: 1.4rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .highlight-card ul {
            margin: 0;
            padding-left: 20px;
            line-height: 1.7;
            color: var(--text-muted);
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 40px;
        }

        form {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 24px;
            padding: 32px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            display: grid;
            gap: 20px;
        }

        label {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.14em;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.6);
        }

        input,
        textarea {
            width: 100%;
            padding: 14px 18px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: rgba(0, 0, 0, 0.6);
            color: var(--text-light);
            font-size: 1rem;
            font-family: inherit;
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        button {
            padding: 14px 24px;
            background: var(--primary);
            color: var(--text-light);
            border: none;
            border-radius: 999px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(255, 106, 0, 0.3);
        }

        .map-card {
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid rgba(255, 106, 0, 0.35);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.45);
        }

        iframe {
            border: none;
            width: 100%;
            height: 100%;
            min-height: 340px;
        }

        footer {
            padding: 32px 0 48px;
            text-align: center;
            color: rgba(255, 255, 255, 0.45);
            font-size: 0.85rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(0, 0, 0, 0.85);
            margin-top: 96px;
        }

        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                gap: 16px;
                height: auto;
                padding: 18px 0;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero {
                padding-top: 70px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="#home" class="logo">UFitness Gym</a>
                <div class="nav-links">
                    <a href="#home">Inicio</a>
                    <a href="#about">Quiénes somos</a>
                    <a href="#contact">Contacto</a>
                    @if (Route::has('login'))
                        @auth
                            <a class="cta-link" href="{{ url('/dashboard') }}">{{ Auth::user()->name }}</a>
                        @else
                            <a class="cta-link" href="{{ route('login') }}">Iniciar sesión</a>
                        @endauth
                    @else
                        <a class="cta-link" href="#">Iniciar sesión</a>
                        @endif
                    </div>
                </nav>
            </div>
        </header>

        <main>
            <section id="home">
                <div class="container hero">
                    <div class="hero-content">
                        <h1>UFitness Gym</h1>
                        <p>
                            Transforma tu energía en resultados. Entrena con pasión, supera tus límites y conquista tus metas con la comunidad más motivada de la ciudad.
                        </p>
                        <div class="hero-actions">
                            @if (Route::has('login'))
                                <a class="cta-link" href="{{ route('login') }}">Comenzar ahora</a>
                            @else
                                <a class="cta-link" href="#">Comenzar ahora</a>
                            @endif
                        </div>
                        </div>
                    <div class="hero-visual">
                        <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=1100&q=80" alt="Personas entrenando en el gimnasio">
                    </div>
                </div>
            </section>

        <section id="about">
            <div class="container">
                <p class="section-subtitle">Nuestra historia</p>
                <h2 class="section-title">Quiénes Somos</h2>
                <div class="about-content">
                    <div class="story">
                        <p>
                            UFitness Gym nació de la pasión por el deporte de tres estudiantes visionarios de una universidad americana. Inspirados por la energía de los campus y por las historias de superación que los rodeaban, decidieron crear un espacio donde la motivación fuera contagiosa y las metas se hicieran realidad.
                        </p>
                        <p>
                            Comenzando con un pequeño club universitario y un puñado de pesas, estos fundadores imaginaron un lugar donde cada persona pudiera liberar su verdadero potencial. Hoy, UFitness Gym sigue honrando esa esencia universitaria: espíritu de equipo, innovación constante y la convicción de que cada entrenamiento es un paso más hacia la mejor versión de uno mismo.
                        </p>
                    </div>
                    <div class="highlight-card">
                        <h3>Energía que impulsa</h3>
                        <ul>
                            <li>Entrenadores dedicados a tu progreso.</li>
                            <li>Programas personalizados para todos los niveles.</li>
                            <li>Ambientes inspiradores con tecnología de vanguardia.</li>
                            <li>Comunidad que celebra cada logro.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact">
            <div class="container">
                <p class="section-subtitle">Estamos para ayudarte</p>
                <h2 class="section-title">Contacto</h2>
                <div class="contact-grid">
                    <form action="#" method="POST">
                        <div>
                            <label for="first_name">Nombre</label>
                            <input type="text" id="first_name" name="first_name" placeholder="Tu nombre" required>
                        </div>
                        <div>
                            <label for="last_name">Apellido</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Tu apellido" required>
                        </div>
                        <div>
                            <label for="email">Correo electrónico</label>
                            <input type="email" id="email" name="email" placeholder="correo@ejemplo.com" required>
                        </div>
                        <div>
                            <label for="message">Mensaje</label>
                            <textarea id="message" name="message" placeholder="Escribe tu consulta, solicitud o mensaje" required></textarea>
                        </div>
                        <button type="submit">Enviar</button>
                    </form>
                    <div class="map-card">
                        <iframe src="https://www.google.com/maps?q=Costado%20Noroeste%20Camino%20de%20Oriente%2C%20Managua%2C%20Nicaragua&output=embed" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <p style="margin-top: 24px; color: var(--text-muted); font-size: 0.95rem;">
                    Dirección: <a href="https://www.google.com/maps/search/?api=1&query=Costado+Noroeste+Camino+de+Oriente,+Managua,+Nicaragua" target="_blank" rel="noopener">Costado Noroeste Camino de Oriente, Managua, Nicaragua</a>
                </p>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            © {{ date('Y') }} UFitness Gym. Todos los derechos reservados.
        </div>
    </footer>
</body>
</html>

