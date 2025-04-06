<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>📸 Placeholder Image API - laravel 12</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      padding: 2rem;
      background-color: #f9fafb;
      color: #1f2937;
      max-width: 1000px;
      margin: 0 auto;
    }
    h1 {
      font-size: 2.5rem;
      color: #111827;
    }
    h2 {
      margin-top: 2rem;
      color: #1e293b;
    }
    code {
      background: #e5e7eb;
      padding: 0.3rem 0.5rem;
      border-radius: 0.3rem;
      font-family: monospace;
    }
    .example {
      background: #f1f5f9;
      padding: 1rem;
      border-left: 4px solid #3b82f6;
      margin: 1rem 0;
    }
    .link {
      color: #2563eb;
      text-decoration: none;
    }
    .link:hover {
      text-decoration: underline;
    }
    .preview {
      margin: 1rem 0;
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
    }
    .preview img {
      border-radius: 0.5rem;
      border: 1px solid #d1d5db;
      max-width: 100%;
      height: auto;
    }
  </style>
</head>
<body>

  <h1>📸 Laravel Placeholder Image API</h1>
  <p>Generá imágenes personalizadas directamente desde tu frontend, útiles para pruebas, diseños o contenidos sin definir.</p>

  <h2>🚀 Endpoint principal</h2>
  <div class="example">
    <code>GET /api/image</code>
  </div>

  <h2>🧩 Parámetros disponibles</h2>
  <ul>
    <li><strong>size</strong>: Dimensiones de la imagen (ej: <code>300x200</code>)</li>
    <li><strong>bg</strong>: Color de fondo en hexadecimal (con o sin <code>#</code>, o encodeado con <code>%23</code>) o nombre (ej: <code>ffcc00</code>, <code>%23ffcc00</code>, <code>blue</code>)</li>
    <li><strong>color</strong>: Color del texto (hexadecimal o nombre válido)</li>
    <li><strong>text</strong>: Texto que se mostrará (espacios como <code>Hola+Mundo</code>)</li>
    <li><strong>format</strong>: Formato de salida (<code>png</code>, <code>jpeg</code>, <code>webp</code>)</li>
  </ul>

  <h2>💡 Cómo usar la API</h2>
  <p>Sigue estos pasos para integrar y usar la API de imágenes en tu proyecto:</p>
  <ol>
    <li>
      <strong>Selecciona los parámetros:</strong> Define las dimensiones, colores, texto y formato según tus necesidades. Por ejemplo:
      <ul>
        <li><code>size=300x200</code>: Dimensiones de la imagen.</li>
        <li><code>bg=ffcc00</code>: Color de fondo en hexadecimal.</li>
        <li><code>color=ffffff</code>: Color del texto.</li>
        <li><code>text=Hola+Mundo</code>: Texto a mostrar.</li>
        <li><code>format=png</code>: Formato de la imagen.</li>
      </ul>
    </li>
    <li>
      <strong>Construye la URL:</strong> Combina los parámetros en la URL base de la API. Ejemplo:
      <pre><code>https://tusitio.com/api/image?size=300x200&bg=ffcc00&text=Hola+Mundo</code></pre>
    </li>
    <li>
      <strong>Usa la URL en tu proyecto:</strong> Inserta la URL generada en tu código HTML o frontend. Ejemplo:
      <pre><code>&lt;img src="https://tusitio.com/api/image?size=300x200&amp;bg=ffcc00&amp;text=Hola+Mundo" alt="Placeholder"&gt;</code></pre>
    </li>
  </ol>

  <h2>📸 Ejemplos visuales</h2>

  <h3>1. Diferentes dimensiones</h3>
  <div class="preview">
    <img src="/api/image?size=300x200" alt="300x200">
    <img src="/api/image?size=600x300" alt="600x300">
    <img src="/api/image?size=150x150" alt="150x150">
  </div>

  <h3>2. Colores de fondo personalizados</h3>
  <div class="preview">
    <img src="/api/image?size=300x200&bg=ffcc00" alt="Amarillo">
    <img src="/api/image?size=300x200&bg=blue" alt="Azul">
    <img src="/api/image?size=300x200&bg=111827&color=ffffff" alt="Oscuro">
    <img src="/api/image?size=300x200&bg=%23ff5733" alt="Rojo coral">
    <img src="/api/image?size=300x200&bg=%2300ffcc" alt="Verde azulado">
  </div>

  <p>✔️ Podés usar colores como:</p>
  <ul>
    <li><code>bg=blue</code> (nombre de color CSS)</li>
    <li><code>bg=ff5733</code> (hex sin <code>#</code>)</li>
    <li><code>bg=%23ff5733</code> (hex con <code>#</code> encodeado)</li>
  </ul>

  <h3>3. Texto y colores personalizados</h3>
  <div class="preview">
    <img src="/api/image?size=400x200&text=Hola+Mundo" alt="Hola Mundo">
    <img src="/api/image?size=400x200&text=Laravel+Rocks&bg=ff0000&color=ffffff" alt="Laravel Rocks">
    <img src="/api/image?size=400x200&text=HGATeam&bg=222831&color=00fff5" alt="HGATeam">
    <img src="/api/image?size=400x200&text=Dark+Mode&bg=000000&color=00ff00" alt="Dark Mode">
  </div>

  <h3>4. Formatos disponibles</h3>
  <p>Las imágenes también pueden renderizarse en <code>jpeg</code> y <code>webp</code>.</p>
  <div class="preview">
    <img src="/api/image?size=300x200&text=JPEG&format=jpeg" alt="JPEG">
    <img src="/api/image?size=300x200&text=WEBP&format=webp" alt="WEBP">
  </div>

  <h2>💡 Ejemplo de uso en HTML</h2>
  <pre><code>&lt;img src="https://tusitio.com/api/image?size=300x200&amp;bg=gray&amp;text=Placeholder"&gt;</code></pre>

  <h2>🔗 Repositorio GitHub</h2>
  <p><a href="https://github.com/HGAteam/placeholder-image-api" class="link" target="_blank">github.com/HGAteam/placeholder-image-api</a></p>

  <h2>🌐 Demo pública</h2>
  <p><code>https://api-placeholder.tudominio.com/api/image?size=600x300&text=Demo</code></p>

  <h2>⚙️ Stack</h2>
  <ul>
    <li>laravel 12.x</li>
    <li>Intervention Image v3 con driver Gd</li>
    <li>API pública sin autenticación</li>
    <li>Soporte para PNG, JPEG, WEBP</li>
  </ul>

</body>
</html>
