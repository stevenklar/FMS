<div class="department @if($first == true) department--first @endif">
    <div class="department--name">{{ $category->name }}</div>

    @foreach ($category->objects as $object)
        @include('partials/show/vehicle', ['object' => (object) $object])
    @endforeach

    <div style="clear: left;"></div>
</div>

