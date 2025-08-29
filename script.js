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