# -gimnasio
# Sistema de Gestión de Gimnasio

Proyecto de análisis funcional y desarrollo backend para un sistema de gestión de un gimnasio.
Incluye modelado UML, definición de historias de usuario y una mini API en PHP.

---

## 🎯 Objetivo del Proyecto
Demostrar habilidades de:
- Análisis funcional
- Modelado UML
- Metodología ágil
- Implementación backend en PHP
- Diseño de una mini API REST (JSON)

---

## 🧠 Alcance Funcional
El sistema permite:
- Inscribir clientes al gimnasio
- Registrar y validar pagos de cuota/membresía
- Reservar clases con control de cupos
- Cancelar reservas y liberar cupos

---

## 🧩 Diagramas UML
El proyecto incluye:
- Diagrama de Clases
- Diagrama de Secuencia – Inscripción
- Diagrama de Secuencia – Reserva de clase
- Diagrama de Secuencia – Cancelación de reserva
- Diagrama de Secuencia – Pago de cuota / membresía

*(Los diagramas se encuentran en la carpeta `/diagramas`)*

---

## 📘 Historias de Usuario
Ejemplo:

**HU-01 – Inscribir cliente**
> Como empleado del gimnasio  
> quiero inscribir a un cliente  
> para habilitar su acceso a los servicios

Cada historia cuenta con criterios de aceptación y validaciones de negocio.

---

## 🧱 Arquitectura
Proyecto organizado en capas simples:


---

## 🔌 Tecnologías utilizadas
- PHP 8
- MySQL
- PDO
- UML
- Git / GitHub
- draw.io

---

## 🌐 Mini API (JSON)
Ejemplos de endpoints:

- `POST /api/pago.php`
- `POST /api/reserva.php`
- `POST /api/inscripcion.php`
- `POST /api/cancelacion.php`

Las respuestas se devuelven en formato JSON con códigos HTTP.

---

## ▶️ Cómo ejecutar el proyecto
1. Clonar el repositorio
2. Crear la base de datos MySQL
3. Configurar `config/db.php`
4. Ejecutar desde un servidor local (XAMPP / WAMP)

---

## 👩‍💻 Autora
**María Susana Blanco**  
Analista Funcional / Analista de Sistemas  

---

## 📌 Notas
Proyecto realizado con fines de aprendizaje y portfolio profesional.
