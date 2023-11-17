# COSAS POR ARREGLAR CLASIFICADOS EN FUNCIONALIDAD, RESPONSIVE, DISEÑO!!!!!!!!!!

# FUNCIONALIDAD!!!
1. Base de datos lugares bogota.
2. Eliminar cuenta no esta funcionando.
3. Hacer modal contacto (formulario).
4. Crear boton editar datos.
5. Menu burguer para opciones de usuario.
6. Vista previa imagenes registro de establecimiento. 
7. Guardar imagenes y nombres de imagenes en db
8. Guardar evento con el usuario.
9. Imagen Puente Aranda.
10. Mas informacion no funcionando (preferiblemente modal).
11. Contraseña max 12 cambiar a mas larga y establecer un patron.
12. Derechos reservados, automatico.

# RESPONSIVE!!!
1. Responsive mis_registros, diseño, y footer.
2. Calendario, registro establecimiento, lugares dentro de localidades, modal de usuario, desea registrar establecimiento(modal), maletita restablecer contraseña e index, verificar correo, cambiar contraseña responsive.


# DISEÑO!!!
1. mapa.php titulo localidades esta horrible.
2. Registro e inicio especificar requisitos contraseña.
3. Centrar index.
4. Agregar diseño a los modales.
5. Diseño modal lugares localidad.
6. Diseño pagina lugares especificos.
7. Acepto los ter-y-con chistosito.
8. carga registro, inicio, ingreso, cierre, ver correo super molesto.
9. contraseñaf.php y verificar correo  arreglar diseño.

# Base de datos
1. Fatal error: Uncaught mysqli_sql_exception: Cannot delete or update a parent row: a foreign key constraint fails (`mybog`.`schedule_list`, CONSTRAINT `Id_usuario_for` FOREIGN KEY (`Id_usuario_for`) REFERENCES `cuentas` (`Id_Usuario`)) in C:\xampp\htdocs\MyBog\php\eliminar.php:19 Stack trace: #0 C:\xampp\htdocs\MyBog\php\eliminar.php(19): mysqli_stmt->execute() #1 {main} thrown in C:\xampp\htdocs\MyBog\php\eliminar.php on line 19