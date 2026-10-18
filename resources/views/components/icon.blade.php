@props(['name', 'class' => 'size-4', 'filled' => false])
@php
    $path = resource_path('svg/icons/' . $name . '.svg');
    $svg = is_file($path) ? file_get_contents($path) : '';
    if ($filled) {
        $svg = str_replace('fill="none"', 'fill="currentColor"', $svg);
    }
    $svg = preg_replace('/^<svg/', '<svg aria-hidden="true" class="' . e($class) . '"', $svg, 1);
@endphp
{!! $svg !!}
