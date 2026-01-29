   <?php
   require __DIR__ . '/partials/header.php';
   ?>
   <div class="border-b border-gray-200 pb-8 mb-8">
      <h1 class="text-4xl font-semibold text-gray-900 sm:text-5xl">
         <?= $post['titulo'] ?>
      </h1>

      <p class="text-lg text-gray-600 w-full max-w-4xl">
         <?= formatear_info_autor($post) ?>
      </p>
   </div>

   <div>
      <p class="text-sm text-gray-600">
         <?= $post['contenido'] ?>
      </p>
   </div>

   <div class="mt-6 space-y-2">
      <p class="text-sm text-gray-600">
         Número de palabras: <?= contar_palabras($post['contenido']) ?>
      </p>

      <div class="flex flex-wrap gap-2 text-sm text-gray-600">
         <?= renderizar_tags_html($post['tags']) ?>
      </div>
   </div>
      <?php
      require __DIR__ . '/partials/footer.php';
      ?>
