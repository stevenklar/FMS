<div class="department @if($first == true) department--first @endif">
    <div class="department--name">{{ $category->name }}</div>

    @foreach ($category->objects as $object)
        @if ($category->name == 'BMA')
            @include('partials/show/bma', ['object' => (object) $object])
        @else
            @include('partials/show/vehicle', ['object' => (object) $object])
        @endif
    @endforeach

    <div style="clear: left;"></div>
</div>

