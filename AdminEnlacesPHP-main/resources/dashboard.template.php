<?php require __DIR__ . '/partials/header.php'; ?>
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold">Dashboard de Estadísticas</h1>
    <hr class="my-4">
    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <div class="rounded-lg bg-blue-600 p-6 text-white shadow">
            <div class="text-sm uppercase tracking-wide">Total de Links</div>
            <div class="mt-2 text-4xl font-semibold">
                <?php echo $stats['total_links']; ?>
            </div>
            <p class="mt-2 text-sm text-blue-100">Links registrados en el sistema.</p>
        </div>
        <div class="rounded-lg bg-green-600 p-6 text-white shadow">
            <div class="text-sm uppercase tracking-wide">Total de Usuarios</div>
            <div class="mt-2 text-4xl font-semibold">
                <?php echo $stats['total_users']; ?>
            </div>
            <p class="mt-2 text-sm text-green-100">Usuarios registrados en la plataforma.</p>
        </div>
        <div class="rounded-lg bg-white p-6 text-gray-900 shadow">
            <div class="text-sm uppercase tracking-wide text-gray-500">Último Usuario Registrado</div>
            <div class="mt-2 text-xl font-semibold">
                <?php echo htmlspecialchars($stats['last_user_email']); ?>
            </div>
            <p class="mt-2 text-sm text-gray-500">Email del usuario más reciente.</p>
        </div>
    </div>
</div>
<?php require __DIR__ . '/partials/footer.php'; ?>
