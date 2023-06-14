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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


<!-- script.menu 1.0.0 -->
<script src="<?php DOCUMENT_ROOT; ?>public/scripts/menu.js" defer></script>

<?php if (strpos(REQUEST_URI, '/personal') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/person_view.js"></script>
<?php } ?>

<?php if (strpos(REQUEST_URI, '/registrar_persona') !== false) { ?>
     <script src="<?php DOCUMENT_ROOT; ?>app/scripts/form_validation.js"></script>
<?php } ?>

</body>

</html>