<?php require __DIR__ . '/partials/header.php'; ?>

<div class="border-b border-gray-200 pb-6 mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl">Productos</h2>
        <p class="text-lg text-gray-600">Administra el catálogo de productos.</p>
    </div>
    <a href="/products/create" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Nuevo producto</a>
</div>

<?php $alert = SessionManager::getFlash('alert'); ?>
<?php if ($alert): ?>
    <div class="mb-4 rounded-md bg-green-50 p-4 text-green-700">
        <?= htmlspecialchars($alert, ENT_QUOTES, 'UTF-8'); ?>
    </div>
<?php endif; ?>

<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nombre</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">SKU</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Precio</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Descripción</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            <?php foreach ($products as $product): ?>
                <tr>
                    <td class="px-4 py-2 text-sm text-gray-800">
                        <?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                    <td class="px-4 py-2 text-sm text-gray-600">
                        <?= htmlspecialchars($product['sku'] ?? '-', ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                    <td class="px-4 py-2 text-sm text-gray-600">
                        $<?= number_format((float) $product['price'], 2); ?>
                    </td>
                    <td class="px-4 py-2 text-sm text-gray-600">
                        <?= htmlspecialchars($product['description'] ?? '-', ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                    <td class="px-4 py-2 text-sm text-gray-600">
                        <div class="flex items-center gap-2">
                            <a href="/products/edit?id=<?= $product['id']; ?>" class="text-indigo-600 hover:text-indigo-800">Editar</a>
                            <form action="/products/destroy" method="POST" onsubmit="return confirm('¿Eliminar este producto?');">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="<?= $product['id']; ?>">
                                <button type="submit" class="text-red-600 hover:text-red-800">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
