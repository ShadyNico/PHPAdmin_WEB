<?php
$title = 'Posts';
$post = [
    'titulo' => 'El Poder de PHP en el Desarrollo Web Moderno',
    'autor' => 'Ana García',
    'fecha' => '2026-03-15',
    'contenido' => 'PHP ha sido durante mucho tiempo un pilar del desarrollo web gracias a su flexibilidad, '
        . 'comunidad activa y facilidad para integrarse con distintos servicios. En proyectos modernos, '
        . 'sigue siendo una opción sólida para construir aplicaciones dinámicas, APIs y paneles de control. '
        . 'Su ecosistema ofrece frameworks maduros, herramientas de automatización y buenas prácticas que '
        . 'favorecen el mantenimiento del código. Además, su compatibilidad con servidores y bases de datos '
        . 'lo convierte en un lenguaje ideal para productos escalables.',
    'tags' => ['PHP', 'Backend', 'Servidores', 'Desarrollo Web'],
];

function formatear_info_autor(array $postData): string
{
    return "Publicado por {$postData['autor']} el {$postData['fecha']}";
}

function renderizar_tags_html(array $tags): string
{
    $tagsHtml = array_map(
        static fn(string $tag): string => "<span class=\"tag\">{$tag}</span>",
        $tags
    );

    return implode('', $tagsHtml);
}

function contar_palabras(string $texto): int
{
    return str_word_count($texto);
}

require __DIR__ . '/../../resources/post.template.php';
