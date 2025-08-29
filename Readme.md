<div style="background: linear-gradient(90deg,#ffd7eb 0%, #ffc1e3 50%, #ffb3d1 100%); padding:12px; border-radius:10px; margin-bottom:18px;">
  <h1 style="margin:0; color:#5a0b2e;">🛒 TechStore — Sistema de Cotizaciones</h1>
  <p style="margin:4px 0 0; color:#7a2540;">Aplicación en PHP + MySQL para solicitar, guardar y consultar cotizaciones de productos.</p>
</div>

# 📌 Resumen (rápido)
El sistema permite que un usuario complete un formulario de cotización (`index.php`), los datos se guardan en MySQL mediante `guardar_cotizacion.php` y después pueden verse en detalle (cliente, productos, precio unitario y totales) en `ver_cotizacion.php`. También puedes inspeccionar la base de datos directamente con **phpMyAdmin**.

---

# 🗂 Estructura del proyecto
Techstore/
│── index.php # Formulario principal (página de usuario)
│── guardar_cotizacion.php # Recibe POST y guarda en la BD (muestra resumen)
│── ver_cotizacion.php # Lista cotizaciones y detalle de productos
│── cotizacion.sql # Script para crear la BD y tablas
│── style.css # Estilos
│── script.js # JS del frontend (validaciones/UX)
│── README.md # Este documento
│── .gitignore # Archivos a ignorar por Git

yaml
Copiar código

---

# 🛠 Instalación y ejecución (paso a paso — muy detallado)
> **Objetivo:** ejecutar el proyecto localmente en Windows con **XAMPP** (o similar).

## 1) Preparar XAMPP
1. Abre el **XAMPP Control Panel**.  
2. Inicia **Apache** y **MySQL** (botones *Start*).  
   - Si hay problemas con puertos (ej. 80 o 3306): detén servicios que usen esos puertos o cambia la configuración.

## 2) Copiar los archivos al servidor local
1. Ve a la carpeta de XAMPP, normalmente:
C:\xampp\htdocs\

markdown
Copiar código
2. Crea una carpeta llamada `Techstore` y **pega todos los archivos del proyecto** dentro:
C:\xampp\htdocs\Techstore\

markdown
Copiar código

## 3) Crear la base de datos (phpMyAdmin)
1. Abre en tu navegador:
http://localhost/phpmyadmin

markdown
Copiar código
2. Crea una base de datos llamada **`techstore`** (si no existe).  
3. Importa `cotizacion.sql`:
- Selecciona la BD `techstore`.
- Pestaña **Importar** → elegir `cotizacion.sql` → **Ir**.

*(El SQL crea `clientes_cotizacion` y `productos_cotizacion`.)*

## 4) Revisar/ajustar credenciales de BD
- Abre `guardar_cotizacion.php` y confirma las credenciales MySQL (líneas iniciales):

```php
$servername = "localhost";
$username   = "root";   // usuario phpMyAdmin (XAMPP por defecto)
$password   = "";       // contraseña (XAMPP por defecto es vacía)
$dbname     = "techstore";
Si cambiaste el usuario/contraseña en tu MySQL, actualiza esos valores.

5) Probar la app
Abre en tu navegador:

bash
Copiar código
http://localhost/Techstore/index.php
Llena el formulario (nombre, ciudad, dirección, celular), selecciona productos y cantidades, y envía.

Verás una pantalla resumen con el costo total y botones para:

Hacer otra cotización

Ver todas las cotizaciones

6) Ver los datos guardados
En la web:
Abre:

bash
Copiar código
http://localhost/Techstore/ver_cotizacion.php
Ahí verás la lista de cotizaciones con cada producto, su cantidad, precio unitario y total por línea, y el total general.

En phpMyAdmin:

Navega a techstore → tablas:

clientes_cotizacion (datos del cliente)

productos_cotizacion (líneas de productos con cotizacion_id vinculado)

🔍 Cómo funciona (explicación paso a paso para aprender rápido)
Usuario llena el formulario (index.php) — todos los inputs tienen name que el backend espera.

Formulario hace POST a guardar_cotizacion.php.

guardar_cotizacion.php:

Conecta a la BD con mysqli.

Inserta los datos del cliente en clientes_cotizacion (prepared statement).

Obtiene el insert_id (ID de cotización).

Recorre $_POST['products'] y por cada producto lee qty-<producto> para obtener la cantidad.

Calcula precio unitario y total (usa el array de precios) y guarda cada línea en productos_cotizacion.

Calcula totalCotizacion y muestra el resumen en pantalla.

ver_cotizacion.php consulta la BD y muestra el detalle por cada cotización.

✅ Comandos útiles (si trabajas con Git)
(Opcional — subir tu proyecto a GitHub si deseas)

bash
Copiar código
# inicializar repo (solo si aún no lo hiciste)
git init

# añadir archivos al commit
git add .

# crear commit
git commit -m "Versión inicial: sistema de cotizaciones"

# establecer rama principal
git branch -M main

# conectar con GitHub (reemplaza la URL por tu repo)
git remote add origin https://github.com/ERIKACASAS98/Pag_Web_FInal.git

# subir al remoto
git push -u origin main
⚠️ Problemas comunes & soluciones rápidas
Error de conexión a BD

Asegúrate de que MySQL esté corriendo en XAMPP.

Revisa $username, $password en guardar_cotizacion.php.

No aparecen los productos en la BD

Verifica que los name de los inputs (products[] y qty-...) coincidan exactamente con lo que espera el PHP.

No puedo ver la página

Comprueba que los archivos estén en C:\xampp\htdocs\Techstore y que accedes por http://localhost/Techstore/index.php.

Git: "nothing added to commit but untracked files present"

Ejecuta git add . antes de git commit.

✨ Toques estéticos y buenas prácticas (recomendado)
Mantén los precios en un archivo o tabla si planeas cambiarlos frecuentemente (mejor que editarlos en el PHP).

Añade validación en el backend (sanitización con filter_input() y comprobación de tipos).

Para producción: usa HTTPS, usuarios con permisos limitados en la BD y protección CSRF.

👩‍🏫 Autores
Viviana M Ruiz RUiz 

Erika l Casas  Toro