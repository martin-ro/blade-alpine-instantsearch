<div {{ $attributes->except('x-show') }} x-show="items.length > 0">
    {{ $slot }}
</div>
