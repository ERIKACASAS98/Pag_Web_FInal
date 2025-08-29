# 🛒 Techstore - Sistema de Cotizaciones  

Este proyecto es una **aplicación web en PHP y MySQL** que permite a los usuarios diligenciar un formulario de cotización de productos, guardar los datos en una base de datos y visualizar los resultados en una tabla organizada con precios unitarios y totales.  

---

## 🚀 Características principales  

✅ Formulario de cotización con:  
- Datos personales (nombre, ciudad, dirección, celular).  
- Selección de productos con cantidad.  
- Campo de comentarios opcional.  

✅ Procesamiento en PHP:  
- Inserta los datos del cliente en la tabla `clientes_cotizacion`.  
- Inserta los productos seleccionados en la tabla `productos_cotizacion`.  
- Calcula el total de la cotización automáticamente.  

✅ Visualización:  
- Página de confirmación con el total de la cotización.  
- Página de reportes (`ver_cotizacion.php`) con toda la información: cliente, productos, precios unitarios y totales.  
- Opciones para volver al formulario o al menú principal.  

✅ Base de datos en MySQL (phpMyAdmin).  

---

## ⚙️ Instalación  

### 1. Clonar el repositorio  
```bash
git clone https://github.com/ERIKACASAS98/Pag_Web_FInal.git
