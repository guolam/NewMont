<!-- resources/views/components/modal-image.blade.php -->
<!--画像を拡大表示する-->

@props(['src', 'alt'])

<div x-data="{ isOpen: false }">
    <img src="{{ $src }}" alt="{{ $alt }}" {{ $attributes->merge(['class' => 'cursor-pointer']) }} @click="isOpen = true">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-20 transition-opacity" x-show="isOpen" @keydown.escape.window="isOpen = false" @click.away="isOpen = false">
        <div class="flex items-center justify-center h-screen">
            <div class="relative" style="align-self: flex-start; margin-top: 10vh;"> <!-- 画像を中央よりも25%下に配置 -->
                <img src="{{ $src }}" alt="{{ $alt }}" class="mx-auto" style="max-height: 70vh;" x-on:click.away="isOpen = false">
                <button type="button" class="absolute top-0 right-0 mt-4 mr-4 text-white text-2xl hover:text-gray-400" @click="isOpen = false">
                    &times;
                </button>
            </div>
        </div>
    </div>
</div>


