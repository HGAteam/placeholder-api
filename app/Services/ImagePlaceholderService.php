<?php
namespace App\Services;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\JpegEncoder;
use Intervention\Image\Encoders\PngEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\ImageManager;

class ImagePlaceholderService
{

    public function generate(?string $size, array $options)
    {
        $size = $size ?: '300x200';

        if (! preg_match('/^\d{2,4}x\d{2,4}$/', $size)) {
            $size = '300x200';
        }

        [$width, $height] = explode('x', strtolower($size));
        $width            = intval($width);
        $height           = intval($height);

        $text   = $options['text'] ?? "{$width}x{$height}";
        $bg     = $this->toRgbString($options['bg'] ?? 'cccccc'); // Convertir a RGB
        $color  = $this->normalizeColor($options['color'] ?? '000000');
        $format = strtolower($options['format'] ?? 'png');

        $manager = new ImageManager(new Driver());

        // Crear un lienzo vacío con el color de fondo
        $image = $manager->create($width, $height)->fill($bg);

        // Agregar el texto al centro de la imagen
        $x = intval($width / 2);
        $y = intval($height / 2);

        $image->text($text, $x, $y, function ($font) use ($color, $width, $height) {
            // Calcula el tamaño de la fuente como el 10% del menor lado
            $fontSize = intval(min($width, $height) * 0.1); 
            $font->filename(app_path('Fonts/arial.ttf'));
            // Aplica el tamaño de la fuente calculado
            $font->size($fontSize);
            $font->color($color);
            $font->align('center');
            $font->valign('center');
        });

        // Codificar la imagen en el formato especificado
        return $image->encode($this->getEncoder($format));
    }

    protected function getEncoder(string $format)
    {
        return match ($format) {
            'jpeg', 'jpg' => new JpegEncoder(),
            'webp'        => new WebpEncoder(),
            default       => new PngEncoder(),
        };
    }

    protected function normalizeColor(string $input): string
    {
        $input = urldecode(trim($input));
        $input = ltrim($input, '#');

        if (preg_match('/^[a-f0-9]{3}$|^[a-f0-9]{6}$/i', $input)) {
            return '#' . strtolower($input);
        }

        return strtolower($input);
    }

    protected function toRgbString(string $color): string
    {
        $color = urldecode(trim($color));
        $color = strtolower(ltrim($color, '#'));

        if (preg_match('/^[a-f0-9]{6}$/', $color)) {
            $r = hexdec(substr($color, 0, 2));
            $g = hexdec(substr($color, 2, 2));
            $b = hexdec(substr($color, 4, 2));
            return "rgb($r, $g, $b)";
        }

        if (preg_match('/^[a-f0-9]{3}$/', $color)) {
            $r = hexdec(str_repeat(substr($color, 0, 1), 2));
            $g = hexdec(str_repeat(substr($color, 1, 1), 2));
            $b = hexdec(str_repeat(substr($color, 2, 1), 2));
            return "rgb($r, $g, $b)";
        }

        $named = [
            'red'     => [255, 0, 0],
            'blue'    => [0, 0, 255],
            'green'   => [0, 128, 0],
            'yellow'  => [255, 255, 0],
            'black'   => [0, 0, 0],
            'white'   => [255, 255, 255],
            'gray'    => [128, 128, 128],
            'purple'  => [128, 0, 128],
            'orange'  => [255, 165, 0],
            'pink'    => [255, 192, 203],
            'brown'   => [165, 42, 42],
            'teal'    => [0, 128, 128],
            'aqua'    => [0, 255, 255],
            'lime'    => [0, 255, 0],
            'silver'  => [192, 192, 192],
            'maroon'  => [128, 0, 0],
            'navy'    => [0, 0, 128],
            'olive'   => [128, 128, 0],
            'fuchsia' => [255, 0, 255],
        ];

        return isset($named[$color])
        ? "rgb(" . implode(",", $named[$color]) . ")"
        : "rgb(204, 204, 204)";
    }
}
