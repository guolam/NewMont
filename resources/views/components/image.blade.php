<!-- resources/views/components/image.blade.php -->
<!--画像を表示するコンポーネント-->

@props(['src', 'alt'])

<img src="{{ $src }}" alt="{{ $alt }}" {{ $attributes->merge(['class' => 'w-full object-cover']) }}>
