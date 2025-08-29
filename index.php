<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStore - Tu Tienda de Tecnología Online</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        /* Banner Superior */
        .banner {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 30px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="tech" patternUnits="userSpaceOnUse" width="20" height="20"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23tech)"/></svg>');
            opacity: 0.3;
        }

        .banner-content {
            position: relative;
            z-index: 2;
        }

        .logo {
            font-size: 3em;
            font-weight: bold;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            background: linear-gradient(45deg, #fff, #a8d8ea);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .tagline {
            font-size: 1.2em;
            opacity: 0.9;
        }

        /* Menú de Navegación */
        .nav-menu {
            background: #2c3e50;
            padding: 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .nav-menu ul {
            list-style: none;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .nav-menu li {
            margin: 0;
        }

        .nav-menu a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 20px 25px;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .nav-menu a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #3498db, #2ecc71);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .nav-menu a:hover::before {
            left: 0;
        }

        .nav-menu a:hover {
            transform: translateY(-3px);
            color: white;
        }

        /* Contenido Principal */
        .content {
            padding: 40px;
            min-height: 400px;
        }

        .section {
            display: none;
            animation: fadeIn 0.5s ease-in;
        }

        .section.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section h2 {
            color: #2c3e50;
            margin-bottom: 25px;
            font-size: 2.5em;
            text-align: center;
            background: linear-gradient(45deg, #3498db, #2ecc71);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section p {
            margin-bottom: 20px;
            font-size: 1.1em;
            line-height: 1.8;
            text-align: justify;
        }

        /* Tarjetas de equipo */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .team-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .team-card h4 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 1.3em;
        }

        /* Servicios */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .service-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .service-card:hover {
            transform: scale(1.05);
        }

        .service-card h3 {
            margin-bottom: 15px;
            font-size: 1.5em;
        }

        /* Formulario de contacto */
        .contact-info {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .contact-info h3 {
            margin-bottom: 20px;
            font-size: 1.8em;
        }

        .contact-item {
            margin-bottom: 15px;
            font-size: 1.1em;
            padding: 10px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            backdrop-filter: blur(5px);
        }

        .map-container {
            width: 100%;
            height: 300px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        /* Formulario de cotización */
        .quote-form {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #2c3e50;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            box-shadow: 0 4px 20px rgba(52, 152, 219, 0.3);
        }

        .btn-submit {
            background: linear-gradient(45deg, #3498db, #2ecc71);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-size: 1.1em;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            margin-right: 15px;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        .btn-cancel {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-size: 1.1em;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-cancel:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(231, 76, 60, 0.4);
        }

        /* ESTILOS ESPECÍFICOS PARA LA COTIZACIÓN */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .product-category {
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .product-category h4 {
            margin-bottom: 15px;
            font-size: 1.3em;
        }

        .product-item {
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .product-item label {
            display: flex;
            align-items: center;
            cursor: pointer;
            font-size: 1em;
            margin-bottom: 0;
        }

        .product-item input[type="checkbox"] {
            margin-right: 8px;
            transform: scale(1.2);
        }

        .product-item input[type="number"] {
            margin-top: 5px;
            width: 100px;
            padding: 8px;
            border: 2px solid #ddd;
            border-radius: 5px;
            text-align: center;
            font-size: 1em;
        }

        .product-item .quantity-input {
            display: none;
            margin-top: 8px;
        }

        /* Página de resultados */
        .results-page {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .results-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .results-table th,
        .results-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ecf0f1;
        }

        .results-table th {
            background: linear-gradient(135deg, #3498db, #2ecc71);
            color: white;
            font-weight: bold;
        }

        .results-table tr:hover {
            background-color: #f8f9fa;
        }

        .total-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            margin-top: 30px;
            text-align: center;
        }

        .client-info {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 25px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-menu ul {
                flex-direction: column;
            }
            
            .content {
                padding: 20px;
            }
            
            .logo {
                font-size: 2em;
            }
            
            .section h2 {
                font-size: 2em;
            }

            .products-grid {
                grid-template-columns: 1fr;
            }

            .results-table {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Banner Superior -->
        <header class="banner">
            <div class="banner-content">
                <div class="logo">🚀 TechStore</div>
                <div class="tagline">La tecnología del futuro, hoy en tus manos</div>
            </div>
        </header>

        <!-- Menú de Navegación -->
        <nav class="nav-menu">
            <ul>
                <li><a href="#" onclick="showSection('tienda')">🏪 Nuestra Tienda Online</a></li>
                <li><a href="#" onclick="showSection('servicios')">⚙️ Servicios</a></li>
                <li><a href="#" onclick="showSection('contacto')">📞 Contáctenos</a></li>
                <li><a href="#" onclick="showSection('cotizacion')">💰 Solicitud de Cotización</a></li>
            </ul>
        </nav>

        <!-- Contenido Principal -->
        <main class="content">
            <!-- Sección Nuestra Tienda Online -->
            <section id="tienda" class="section active">
                <h2>Nuestra Tienda Online</h2>
                <p>Bienvenidos a TechStore, tu destino número uno para la tecnología más avanzada del mercado. Somos una empresa joven y dinámica, comprometida con ofrecer productos de la más alta calidad a precios competitivos.</p>
                
                <p>Desde nuestros inicios, nos hemos especializado en traer las últimas innovaciones tecnológicas directamente a tu hogar. Nuestra misión es democratizar el acceso a la tecnología de vanguardia, haciendo que productos exclusivos estén al alcance de todos.</p>

                <h3 style="text-align: center; margin: 30px 0; color: #2c3e50;">Nuestro Equipo</h3>
                <div class="team-grid">
                    <div class="team-card">
                        <h4>Viviana Ruiz</h4>
                        <p><strong>CEO & Fundadora</strong></p>
                        <p>Ingeniera en Sistemas con 10 años de experiencia en el sector tecnológico. Especialista en innovación y desarrollo de productos.</p>
                    </div>
                    <div class="team-card">
                        <h4>Erika Casas</h4>
                        <p><strong>Director Técnico</strong></p>
                        <p>Experta en hardware y nuevas tecnologías. Responsable de la selección y evaluación de nuestros productos.</p>
                    </div>
                    <div class="team-card">
                        <h4>Paola Salazar</h4>
                        <p><strong>Gerente de Ventas</strong></p>
                        <p>Especialista en atención al cliente y estrategias comerciales. Garantiza la mejor experiencia de compra para nuestros usuarios.</p>
                    </div>
                    <div class="team-card">
                        <h4>Camilo Pareja</h4>
                        <p><strong>Jefe de Logística</strong></p>
                        <p>Coordina toda la cadena de suministro y garantiza entregas rápidas y seguras en todo el país.</p>
                    </div>
                </div>
            </section>

            <!-- Sección Servicios -->
            <section id="servicios" class="section">
                <h2>Nuestros Servicios</h2>
                <p>En TechStore no solo vendemos productos, ofrecemos soluciones integrales para todas tus necesidades tecnológicas. Nuestros servicios están diseñados para brindarte la mejor experiencia desde la compra hasta el uso continuo de tus dispositivos.</p>

                <div class="services-grid">
                    <div class="service-card">
                        <h3>🔧 Soporte Técnico Especializado</h3>
                        <p>Nuestro equipo de técnicos certificados está disponible 24/7 para resolver cualquier problema o duda que tengas con tus dispositivos. Ofrecemos:</p>
                        <ul style="margin-top: 15px; padding-left: 20px;">
                            <li>Configuración inicial de equipos</li>
                            <li>Resolución de problemas técnicos</li>
                            <li>Actualizaciones de software</li>
                            <li>Optimización de rendimiento</li>
                            <li>Consultoría tecnológica personalizada</li>
                        </ul>
                    </div>
                    <div class="service-card">
                        <h3>🚚 Entrega Express y Instalación</h3>
                        <p>Garantizamos la entrega más rápida del mercado con nuestro servicio premium de logística. Incluye:</p>
                        <ul style="margin-top: 15px; padding-left: 20px;">
                            <li>Entrega en menos de 24 horas en ciudades principales</li>
                            <li>Instalación profesional a domicilio</li>
                            <li>Configuración completa del equipo</li>
                            <li>Capacitación básica de uso</li>
                            <li>Garantía extendida en instalación</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Sección Contacto -->
            <section id="contacto" class="section">
                <h2>Contáctenos</h2>
                <div class="contact-info">
                    <h3>📍 Información de Contacto</h3>
                    <div class="contact-item">
                        <strong>📱 WhatsApp:</strong> +57 300 123 4567
                    </div>
                    <div class="contact-item">
                        <strong>📞 Celular:</strong> +57 312 987 6543
                    </div>
                    <div class="contact-item">
                        <strong>🏢 Dirección:</strong> Carrera 70 #45-23, Centro Comercial Unicentro, Local 205, Medellín, Antioquia, Colombia
                    </div>
                    <div class="contact-item">
                        <strong>⏰ Horarios de Atención:</strong> Lunes a Viernes: 8:00 AM - 7:00 PM | Sábados: 9:00 AM - 5:00 PM
                    </div>
                </div>

                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1234567890!2d-75.5812!3d6.2442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sMedell%C3%ADn%2C+Antioquia%2C+Colombia!5e0!3m2!1ses!2sco!4v1234567890"
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </section>

            <!-- Sección Cotización -->
            <section id="cotizacion" class="section">
                <h2>Solicitud de Cotización</h2>
                <p style="text-align: center; margin-bottom: 30px;">Complete el siguiente formulario y reciba una cotización personalizada en menos de 24 horas.</p>
                
                <form class="quote-form" id="quoteForm" method="POST" action="guardar_cotizacion.php">
                    <!-- Información Personal -->
                    <div style="background: rgba(255, 255, 255, 0.9); padding: 25px; border-radius: 15px; margin-bottom: 25px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
                        <h3 style="color: #2c3e50; margin-bottom: 20px; border-bottom: 2px solid #3498db; padding-bottom: 10px;">📝 Información Personal</h3>
                        
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
                            <div class="form-group">
                                <label for="nombres">Nombres y Apellidos *</label>
                                <input type="text" id="nombres" name="nombres" required placeholder="Ej: María González López">
                            </div>
                            
                            <div class="form-group">
                                <label for="ciudad">Ciudad *</label>
                                <select id="ciudad" name="ciudad" required>
                                    <option value="">Selecciona tu ciudad</option>
                                    <option value="Medellín">Medellín</option>
                                    <option value="Bogotá">Bogotá</option>
                                    <option value="Cali">Cali</option>
                                    <option value="Barranquilla">Barranquilla</option>
                                    <option value="Cartagena">Cartagena</option>
                                    <option value="Bucaramanga">Bucaramanga</option>
                                    <option value="Pereira">Pereira</option>
                                    <option value="Manizales">Manizales</option>
                                    <option value="Santa Marta">Santa Marta</option>
                                    <option value="Ibagué">Ibagué</option>
                                    <option value="Cúcuta">Cúcuta</option>
                                    <option value="Villavicencio">Villavicencio</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Neiva">Neiva</option>
                                    <option value="Popayán">Popayán</option>
                                    <option value="Pasto">Pasto</option>
                                    <option value="Montería">Montería</option>
                                    <option value="Sincelejo">Sincelejo</option>
                                    <option value="Valledupar">Valledupar</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                        </div>
                        
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 20px;">
                            <div class="form-group">
                                <label for="direccion">Dirección *</label>
                                <input type="text" id="direccion" name="direccion" required placeholder="Ej: Carrera 70 #45-23, Apartamento 304">
                            </div>
                            
                            <div class="form-group">
                                <label for="celular">Celular *</label>
                                <input type="tel" id="celular" name="celular" required placeholder="Ej: 300 123 4567">
                            </div>
                        </div>
                    </div>

                    <!-- Selección de Productos -->
                    <div style="background: rgba(255, 255, 255, 0.9); padding: 25px; border-radius: 15px; margin-bottom: 25px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
                        <h3 style="color: #2c3e50; margin-bottom: 20px; border-bottom: 2px solid #e74c3c; padding-bottom: 10px;">🛍️ Selección de Productos</h3>
                        <p style="color: #7f8c8d; margin-bottom: 20px;">Marque los productos que le interesan y especifique las cantidades deseadas:</p>
                        
                        <div class="products-grid">
                            
                            <!-- Smartphones -->
                            <div class="product-category" style="background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);">
                                <h4 style="color: #2c3e50; margin-bottom: 15px;">📱 Smartphones</h4>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="iPhone" onchange="toggleQuantityInput(this, 'iphone')">
                                        <span>iPhone (varios modelos)</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-iphone">
                                        <label for="qty-iphone">Cantidad:</label>
                                        <input type="number" id="qty-iphone" name="qty-iphone" min="1" value="1">
                                    </div>
                                </div>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="Samsung Galaxy" onchange="toggleQuantityInput(this, 'samsung')">
                                        <span>Samsung Galaxy</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-samsung">
                                        <label for="qty-samsung">Cantidad:</label>
                                        <input type="number" id="qty-samsung" name="qty-samsung" min="1" value="1">
                                    </div>
                                </div>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="Xiaomi" onchange="toggleQuantityInput(this, 'xiaomi')">
                                        <span>Xiaomi</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-xiaomi">
                                        <label for="qty-xiaomi">Cantidad:</label>
                                        <input type="number" id="qty-xiaomi" name="qty-xiaomi" min="1" value="1">
                                    </div>
                                </div>
                            </div>

                            <!-- Laptops -->
                            <div class="product-category" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                                <h4 style="color: #2c3e50; margin-bottom: 15px;">💻 Laptops</h4>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="MacBook" onchange="toggleQuantityInput(this, 'macbook')">
                                        <span>MacBook (Air/Pro)</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-macbook">
                                        <label for="qty-macbook">Cantidad:</label>
                                        <input type="number" id="qty-macbook" name="qty-macbook" min="1" value="1">
                                    </div>
                                </div>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="Dell XPS" onchange="toggleQuantityInput(this, 'dell')">
                                        <span>Dell (XPS/Inspiron)</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-dell">
                                        <label for="qty-dell">Cantidad:</label>
                                        <input type="number" id="qty-dell" name="qty-dell" min="1" value="1">
                                    </div>
                                </div>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="Lenovo ThinkPad" onchange="toggleQuantityInput(this, 'lenovo')">
                                        <span>Lenovo ThinkPad</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-lenovo">
                                        <label for="qty-lenovo">Cantidad:</label>
                                        <input type="number" id="qty-lenovo" name="qty-lenovo" min="1" value="1">
                                    </div>
                                </div>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="ASUS Gaming" onchange="toggleQuantityInput(this, 'asus')">
                                        <span>ASUS (Gaming/Oficina)</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-asus">
                                        <label for="qty-asus">Cantidad:</label>
                                        <input type="number" id="qty-asus" name="qty-asus" min="1" value="1">
                                    </div>
                                </div>
                            </div>

                            <!-- Gaming -->
                            <div class="product-category" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <h4 style="margin-bottom: 15px;">🎮 Gaming</h4>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="PlayStation 5" onchange="toggleQuantityInput(this, 'ps5')">
                                        <span>PlayStation 5</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-ps5">
                                        <label for="qty-ps5">Cantidad:</label>
                                        <input type="number" id="qty-ps5" name="qty-ps5" min="1" value="1">
                                    </div>
                                </div>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="Xbox Series X" onchange="toggleQuantityInput(this, 'xbox')">
                                        <span>Xbox Series X/S</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-xbox">
                                        <label for="qty-xbox">Cantidad:</label>
                                        <input type="number" id="qty-xbox" name="qty-xbox" min="1" value="1">
                                    </div>
                                </div>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="Nintendo Switch" onchange="toggleQuantityInput(this, 'switch')">
                                        <span>Nintendo Switch</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-switch">
                                        <label for="qty-switch">Cantidad:</label>
                                        <input type="number" id="qty-switch" name="qty-switch" min="1" value="1">
                                    </div>
                                </div>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="PC Gaming" onchange="toggleQuantityInput(this, 'pc_gaming')">
                                        <span>PC Gaming</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-pc_gaming">
                                        <label for="qty-pc_gaming">Cantidad:</label>
                                        <input type="number" id="qty-pc_gaming" name="qty-pc_gaming" min="1" value="1">
                                    </div>
                                </div>
                            </div>

                            <!-- Audio -->
                            <div class="product-category" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);">
                                <h4 style="color: #2c3e50; margin-bottom: 15px;">🎧 Audio</h4>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="AirPods" onchange="toggleQuantityInput(this, 'airpods')">
                                        <span>AirPods (varios modelos)</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-airpods">
                                        <label for="qty-airpods">Cantidad:</label>
                                        <input type="number" id="qty-airpods" name="qty-airpods" min="1" value="1">
                                    </div>
                                </div>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="Sony WH-1000XM" onchange="toggleQuantityInput(this, 'sony_headphones')">
                                        <span>Sony (WH-1000XM)</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-sony_headphones">
                                        <label for="qty-sony_headphones">Cantidad:</label>
                                        <input type="number" id="qty-sony_headphones" name="qty-sony_headphones" min="1" value="1">
                                    </div>
                                </div>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="Bose QuietComfort" onchange="toggleQuantityInput(this, 'bose')">
                                        <span>Bose QuietComfort</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-bose">
                                        <label for="qty-bose">Cantidad:</label>
                                        <input type="number" id="qty-bose" name="qty-bose" min="1" value="1">
                                    </div>
                                </div>
                            </div>

                            <!-- Smart Home -->
                            <div class="product-category" style="background: linear-gradient(135deg, #d299c2 0%, #fef9d7 100%);">
                                <h4 style="color: #2c3e50; margin-bottom: 15px;">🏠 Smart Home</h4>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="Amazon Alexa" onchange="toggleQuantityInput(this, 'alexa')">
                                        <span>Amazon Alexa/Echo</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-alexa">
                                        <label for="qty-alexa">Cantidad:</label>
                                        <input type="number" id="qty-alexa" name="qty-alexa" min="1" value="1">
                                    </div>
                                </div>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="Google Home" onchange="toggleQuantityInput(this, 'google_home')">
                                        <span>Google Home/Nest</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-google_home">
                                        <label for="qty-google_home">Cantidad:</label>
                                        <input type="number" id="qty-google_home" name="qty-google_home" min="1" value="1">
                                    </div>
                                </div>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="Luces Inteligentes" onchange="toggleQuantityInput(this, 'smart_lights')">
                                        <span>Luces Inteligentes</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-smart_lights">
                                        <label for="qty-smart_lights">Cantidad:</label>
                                        <input type="number" id="qty-smart_lights" name="qty-smart_lights" min="1" value="1">
                                    </div>
                                </div>
                            </div>

                            <!-- Accesorios -->
                            <div class="product-category" style="background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);">
                                <h4 style="color: #2c3e50; margin-bottom: 15px;">🔌 Accesorios</h4>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="Cargadores" onchange="toggleQuantityInput(this, 'cargadores')">
                                        <span>Cargadores</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-cargadores">
                                        <label for="qty-cargadores">Cantidad:</label>
                                        <input type="number" id="qty-cargadores" name="qty-cargadores" min="1" value="1">
                                    </div>
                                </div>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="Cables USB" onchange="toggleQuantityInput(this, 'cables')">
                                        <span>Cables USB/Lightning</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-cables">
                                        <label for="qty-cables">Cantidad:</label>
                                        <input type="number" id="qty-cables" name="qty-cables" min="1" value="1">
                                    </div>
                                </div>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="Fundas y Protectores" onchange="toggleQuantityInput(this, 'fundas')">
                                        <span>Fundas y Protectores</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-fundas">
                                        <label for="qty-fundas">Cantidad:</label>
                                        <input type="number" id="qty-fundas" name="qty-fundas" min="1" value="1">
                                    </div>
                                </div>
                                <div class="product-item">
                                    <label>
                                        <input type="checkbox" name="products[]" value="Power Banks" onchange="toggleQuantityInput(this, 'power_bank')">
                                        <span>Power Banks</span>
                                    </label>
                                    <div class="quantity-input" id="quantity-power_bank">
                                        <label for="qty-power_bank">Cantidad:</label>
                                        <input type="number" id="qty-power_bank" name="qty-power_bank" min="1" value="1">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <!-- Comentarios adicionales -->
                    <div class="form-group">
                        <label for="comentarios">Comentarios Adicionales</label>
                        <textarea id="comentarios" name="comentarios" rows="4" placeholder="Especifique modelos exactos, colores, características especiales, o cualquier otra información relevante para su cotización..."></textarea>
                    </div>
                    
                    <div style="text-align: center; margin-top: 30px;">
                        <button type="submit" class="btn-submit">📤 Enviar Datos</button>
                        <button type="button" class="btn-cancel" onclick="cancelForm()">❌ Cancelar</button>
                    </div>
                </form>
            </section>

            <!-- Sección Resultados de Cotización -->
            <section id="resultados" class="section">
                <div class="results-page">
                    <h2 style="text-align: center; margin-bottom: 30px; color: #2c3e50;">📋 Resultado de su Cotización</h2>
                    
                    <!-- Información del Cliente -->
                    <div class="client-info">
                        <h3 style="color: #2c3e50; margin-bottom: 20px;">👤 Información del Cliente</h3>
                        <div id="clientInfo"></div>
                    </div>
                    
                    <!-- Tabla de Productos -->
                    <div>
                        <h3 style="color: #2c3e50; margin-bottom: 20px;">🛒 Productos Cotizados</h3>
                        <table class="results-table" id="productsTable">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th style="text-align: center;">Cantidad</th>
                                    <th style="text-align: right;">Precio Unitario</th>
                                    <th style="text-align: right;">Total</th>
                                </tr>
                            </thead>
                            <tbody id="productsTableBody">
                                <!-- Los productos se insertarán aquí -->
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Total -->
                    <div class="total-section">
                        <h3>💰 Total de la Cotización</h3>
                        <div id="totalAmount" style="font-size: 2em; font-weight: bold; margin-top: 15px;"></div>
                        <p style="margin-top: 15px; font-size: 1.1em;">
                            ✅ Datos guardados exitosamente en nuestra base de datos<br>
                            📞 Nos pondremos en contacto en las próximas 2 horas
                        </p>
                    </div>
                    
                    <div style="text-align: center; margin-top: 30px;">
                        <button class="btn-submit" onclick="showSection('tienda')">🏠 Volver al Inicio</button>
                        <button class="btn-submit" onclick="showSection('cotizacion')" style="margin-left: 15px;">📝 Nueva Cotización</button>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        // Base de datos simulada en memoria
       let database = {
            cotizaciones: []
        }; 

        // Precios de productos
        const productPrices = {
            'iPhone': 2500000,
            'Samsung Galaxy': 1800000,
            'Xiaomi': 800000,
            'MacBook': 4500000,
            'Dell XPS': 2200000,
            'Lenovo ThinkPad': 2800000,
            'ASUS Gaming': 3200000,
            'PlayStation 5': 2800000,
            'Xbox Series X': 2400000,
            'Nintendo Switch': 1400000,
            'PC Gaming': 4000000,
            'AirPods': 400000,
            'Sony WH-1000XM': 600000,
            'Bose QuietComfort': 800000,
            'Amazon Alexa': 300000,
            'Google Home': 350000,
            'Luces Inteligentes': 150000,
            'Cargadores': 50000,
            'Cables USB': 25000,
            'Fundas y Protectores': 35000,
            'Power Banks': 120000
        };

        // Función para mostrar secciones
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => {
                section.classList.remove('active');
            });
            
            document.getElementById(sectionId).classList.add('active');
            
            // Si vamos a cotización, resetear el formulario
            if (sectionId === 'cotizacion') {
                resetForm();
            }
        }

        // Función para mostrar/ocultar campos de cantidad
        function toggleQuantityInput(checkbox, productId) {
            const quantityDiv = document.getElementById(`quantity-${productId}`);
            
            if (checkbox.checked) {
                quantityDiv.style.display = 'block';
            } else {
                quantityDiv.style.display = 'none';
            }
        }

        // Función para validar el formulario
        function validateForm() {
            const nombres = document.getElementById('nombres').value.trim();
            const ciudad = document.getElementById('ciudad').value;
            const direccion = document.getElementById('direccion').value.trim();
            const celular = document.getElementById('celular').value.trim();

            if (!nombres || !ciudad || !direccion || !celular) {
                alert('Por favor complete todos los campos obligatorios.');
                return false;
            }

            // Verificar que al menos un producto esté seleccionado
            const selectedProducts = document.querySelectorAll('input[name="products[]"]:checked');
            if (selectedProducts.length === 0) {
                alert('Por favor seleccione al menos un producto para cotizar.');
                return false;
            }

            return true;
        }

        // Función para enviar cotización (simula guardar en base de datos)
        function submitQuote(event) {
            event.preventDefault();

            if (!validateForm()) {
                return;
            }

            // Recopilar datos del formulario
            const formData = {
                id: Date.now(), // ID único basado en timestamp
                nombres: document.getElementById('nombres').value.trim(),
                ciudad: document.getElementById('ciudad').value,
                direccion: document.getElementById('direccion').value.trim(),
                celular: document.getElementById('celular').value.trim(),
                comentarios: document.getElementById('comentarios').value.trim(),
                productos: [],
                fecha: new Date().toLocaleDateString('es-CO')
            };

            // Recopilar productos seleccionados
            const selectedProducts = document.querySelectorAll('input[name="products[]"]:checked');
            let totalCotizacion = 0;

            selectedProducts.forEach(checkbox => {
                const productName = checkbox.value;
                const productId = checkbox.getAttribute('onchange').match(/'([^']+)'/)[1];
                const quantityInput = document.getElementById(`qty-${productId}`);
                const quantity = parseInt(quantityInput.value) || 1;
                const unitPrice = productPrices[productName] || 0;
                const totalPrice = unitPrice * quantity;

                formData.productos.push({
                    nombre: productName,
                    cantidad: quantity,
                    precioUnitario: unitPrice,
                    total: totalPrice
                });

                totalCotizacion += totalPrice;
            });

            formData.totalCotizacion = totalCotizacion;

            // Simular guardado en base de datos
            database.cotizaciones.push(formData);
            console.log('Datos guardados en base de datos:', formData);

            // Consultar datos de la base de datos (simulación)
            const savedData = database.cotizaciones.find(c => c.id === formData.id);

            // Mostrar resultados
            displayResults(savedData);
        }

        // Función para mostrar resultados
        function displayResults(data) {
            // Mostrar información del cliente
            const clientInfo = document.getElementById('clientInfo');
            clientInfo.innerHTML = `
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    <div><strong>Nombre:</strong> ${data.nombres}</div>
                    <div><strong>Ciudad:</strong> ${data.ciudad}</div>
                    <div><strong>Dirección:</strong> ${data.direccion}</div>
                    <div><strong>Celular:</strong> ${data.celular}</div>
                    <div><strong>Fecha:</strong> ${data.fecha}</div>
                    <div><strong>ID Cotización:</strong> ${data.id}</div>
                </div>
                ${data.comentarios ? `<div style="margin-top: 15px;"><strong>Comentarios:</strong> ${data.comentarios}</div>` : ''}
            `;

            // Mostrar tabla de productos
            const tableBody = document.getElementById('productsTableBody');
            tableBody.innerHTML = '';

            data.productos.forEach(producto => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${producto.nombre}</td>
                    <td style="text-align: center;">${producto.cantidad}</td>
                    <td style="text-align: right;">${producto.precioUnitario.toLocaleString('es-CO')}</td>
                    <td style="text-align: right; font-weight: bold;">${producto.total.toLocaleString('es-CO')}</td>
                `;
                tableBody.appendChild(row);
            });

            // Mostrar total
            document.getElementById('totalAmount').innerHTML = 
                `${data.totalCotizacion.toLocaleString('es-CO')} COP`;

            // Cambiar a la sección de resultados
            showSection('resultados');
        }

        // Función para cancelar el formulario
        function cancelForm() {
            if (confirm('¿Está seguro de que desea cancelar? Se perderán todos los datos ingresados.')) {
                showSection('tienda');
            }
        }

        // Función para resetear el formulario
        function resetForm() {
            document.getElementById('quoteForm').reset();
            
            // Ocultar todos los campos de cantidad
            const quantityInputs = document.querySelectorAll('.quantity-input');
            quantityInputs.forEach(input => {
                input.style.display = 'none';
            });
        }

        // Inicializar la página
        document.addEventListener('DOMContentLoaded', function() {
            showSection('tienda');
        });
    </script>
</body>
</html>