# 💧 MEJY – Sistema de Inventario de Medidores de Agua

MEJY es un sistema web desarrollado para el control de **entradas y salidas de medidores de agua** en una bodega, permitiendo llevar un registro claro, editable y persistente del inventario.

El sistema fue diseñado pensando en un **flujo operativo real**, donde los medidores ingresan, se validan, se editan y posteriormente se registran como medidores activos.

---

## 🧠 Problema que resuelve

En la gestión manual de inventarios:
- Se pierden registros
- No hay trazabilidad clara
- La información se duplica o se altera

**MEJY digitaliza el proceso**, permitiendo:
- Registrar medidores entrantes
- Editar información antes de validarla
- Transferir registros entre estados (entrada → activo)
- Consultar historial de manera rápida

---

## ⚙️ Tecnologías utilizadas

- PHP
- MongoDB
- HTML5
- CSS3
- Bootstrap
- JavaScript
- XAMPP / PHP Desktop

---

## 📦 Estructura general

MEJY/
├── vistas/
│ ├── medidores_entrada.php
│ ├── medidores.php
│ └── login.php
├── controllers/
├── models/
├── config/
│ └── autoload.php
├── assets/
│ ├── css/
│ └── img/
└── index.php


---

## 🔄 Flujo del sistema

1. Un medidor entra a bodega
2. Se registra en la colección `medidores_entrada`
3. El usuario puede:
   - Revisar
   - Editar datos
4. Al validar, el registro se transfiere a la colección `medidores`
5. El sistema mantiene la consistencia de los datos

---

## 🗄️ Base de datos

**MongoDB**

Colecciones principales:
- `medidores_entrada`
- `medidores`

Cada transferencia conserva los datos editados antes del movimiento.

---

## 🔐 Seguridad

- Acceso mediante login
- Sesión activa para navegación interna
- Cierre de sesión seguro

---

## 🖥️ Interfaz

- Navbar funcional
- Tablas responsivas
- Formularios claros
- Navegación sencilla para usuarios no técnicos

---

## 🧪 Estado del proyecto

✔ Funcional  
✔ Usado como sistema real  
✔ Listo para demostración  

Posibles mejoras futuras:
- API REST
- Dockerización
- Autenticación con roles
- Historial de movimientos

---

## 👨‍💻 Autor

Desarrollado por **Jorge Raúl Valencia Santos, José Alfredo Salinas y Christian Vergara Valerio**  
Proyecto enfocado en resolver una necesidad real de control de inventario.
