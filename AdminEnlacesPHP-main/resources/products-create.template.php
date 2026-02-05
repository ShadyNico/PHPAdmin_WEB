<?php require __DIR__ . '/partials/header.php'; ?>

<div class="border-b border-gray-200 pb-6 mb-6">
    <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl">Crear producto</h2>
    <p class="text-lg text-gray-600">Completa los datos para registrar un nuevo producto.</p>
</div>

<?php
$alert = SessionManager::getFlash('alert');
$errors = SessionManager::getFlash('errors', []);
$old = SessionManager::getFlash('old', []);
?>

<?php if ($alert): ?>
    <div class="mb-4 rounded-md bg-red-50 p-4 text-red-700">
        <?= htmlspecialchars($alert, ENT_QUOTES, 'UTF-8'); ?>
    </div>
<?php endif; ?>

<?php if ($errors): ?>
    <div class="mb-4 rounded-md bg-red-50 p-4 text-red-700">
        <ul class="list-disc list-inside">
            <?php foreach ($errors as $fieldErrors): ?>
                <?php foreach ($fieldErrors as $error): ?>
                    <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="/products" method="POST" class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700">Nombre</label>
        <input type="text" name="name" value="<?= htmlspecialchars($old['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">SKU</label>
        <input type="text" name="sku" value="<?= htmlspecialchars($old['sku'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Precio</label>
        <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($old['price'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Descripción</label>
        <textarea name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"><?= htmlspecialchars($old['description'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>
    <div class="flex items-center gap-3">
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Guardar</button>
        <a href="/products" class="text-gray-600 hover:text-gray-800">Cancelar</a>
    </div>
</form>

<?php require __DIR__ . '/partials/footer.php'; ?>
