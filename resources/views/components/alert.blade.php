
{{-- Вы можете определить содержимое именованнго слота с помощью тега x-slot --}}
<div class="alert alert-{{ $infoText }}">
    {{ $slot }}
    {{ $infoText }}
</div>
