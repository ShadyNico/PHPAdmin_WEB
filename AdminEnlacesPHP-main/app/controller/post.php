<?php
$title = "Posts";

$post = [
    'titulo' => 'El Poder de PHP en el Desarrollo Web Moderno',
    'autor' => 'Ana García',
    'fecha' => '2026-03-15',
    'contenido' => 'PHP sigue siendo un lenguaje esencial en el desarrollo web moderno porque ofrece flexibilidad, una comunidad amplia y herramientas maduras. Con frameworks robustos y una sintaxis accesible, permite construir sitios dinámicos, APIs y sistemas escalables. Además, su compatibilidad con múltiples servidores y bases de datos facilita la integración en entornos empresariales. Aprender PHP fortalece la comprensión de backend y abre oportunidades para crear soluciones eficientes.',
    'tags' => ['PHP', 'Backend', 'Servidores', 'Desarrollo Web']
];

function formatear_info_autor(array $postData): string
{
    return "Publicado por {$postData['autor']} el {$postData['fecha']}";
}

function renderizar_tags_html(array $tags): string
{
    $tagsHtml = '';
    foreach ($tags as $tag) {
        $tagsHtml .= "<span class='tag'>{$tag}</span>";
    }

    return $tagsHtml;
}

function contar_palabras(string $texto): int
{
    return str_word_count(strip_tags($texto));
}

require __DIR__ . '/../../resources/post.template.php';
