<footer>
     <div class="container_footer">
          <div class="container_information">
               <p class="p">Calle Venezuela Esq. Ismael Vasquez</p>
               <p class="p">Telefono: 4259198</p>
               <p class="p">Fax: 4250699</p>
               <p><a href="#">igbjcochabamba@gmail.com</a></p>
          </div>
          <div class="redes_sociales">
               <a href="#" target="_blank" class="fab fa-facebook-f"></a>
               <a href="#" target="_blank" class="fab fa-twitter"></a>
               <a href="#" target="_blank" class="fab fa-youtube"></a>
          </div>
     </div>
</footer>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- importando dominio para peticiones ajax-->
<script>
     const baseURL = "<?php echo BASE_URL_DOMAIN; ?>";
</script>

<!-- script.menu 1.0.0 -->
<script src="<?php DOCUMENT_ROOT; ?>public/scripts/menu.js" defer></script>

<?php if (strpos(REQUEST_URI, '/login') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/auth/login.js"></script>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/auth/form_validation.js"></script>
<?php } ?>

<?php if (strpos(REQUEST_URI, '/personal') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/personnel/view.js"></script>
<?php } ?>

<?php if (strpos(REQUEST_URI, '/registrar_persona') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/personnel/form_validation.js"></script>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/personnel/register.js"></script>
<?php } ?>

<?php if (strpos(REQUEST_URI, '/actualizar_persona') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/personnel/form_validation.js"></script>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/personnel/update.js"></script>
<?php } ?>

<?php if (strpos(REQUEST_URI, '/asignar_item') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/personnel/item_assign.js"></script>
<?php } ?>

<?php if (strpos(REQUEST_URI, '/cambiar_item_asignado') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/personnel/item_update.js"></script>
<?php } ?>
<?php if (strpos(REQUEST_URI, '/asignar_cargo') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/personnel/position_assign.js"></script>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/personnel/position_form_validation.js"></script>
<?php } ?>
<?php if (strpos(REQUEST_URI, '/actualizar_cargo') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/personnel/position_update.js"></script>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/personnel/position_form_validation.js"></script>
<?php } ?>

<?php if (strpos(REQUEST_URI, '/centros_mantenimiento') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/maintenance_center/view.js"></script>
<?php } ?>

<?php if (strpos(REQUEST_URI, '/registrar_centro_mantenimiento') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/maintenance_center/register.js"></script>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/maintenance_center/form_validation.js"></script>
<?php } ?>

<?php if (strpos(REQUEST_URI, '/actualizar_centro_mantenimiento') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/maintenance_center/update.js"></script>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/maintenance_center/form_validation.js"></script>
<?php } ?>
<?php if (strpos(REQUEST_URI, '/ver_tecnicos_centro_mantenimiento') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/maintenance_center/view_technician_center.js"></script>
<?php } ?>

<?php if (strpos(REQUEST_URI, '/asignar_tecnico') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/maintenance_center/view_assign_technician.js"></script>
<?php } ?>

<?php if (strpos(REQUEST_URI, '/asignar_activo') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/assign_assets/view.js"></script>
<?php } ?>

<?php if (strpos(REQUEST_URI, '/registrar_activo') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/peticion.js"></script>
<?php } ?>

<?php if (strpos(REQUEST_URI, '/departamento') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/departament/view.js"></script>
<?php } ?>

<?php if (strpos(REQUEST_URI, '/proveedor') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/provider/view.js"></script>
<?php } ?>
<?php if (strpos(REQUEST_URI, '/registrar_departamento_formulario') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/departament/validacion_registro.js"></script>
<?php } ?>
<?php if (strpos(REQUEST_URI, '/cronograma_mantenimiento') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/maintenance_schedule/view.js"></script>
<?php } ?>
</body>

</html>