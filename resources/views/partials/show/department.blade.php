    <div class="portlet">
        <div class="portlet-header">
            <div class="department--name">{{ $category->name }}</div>
        </div>

        <div class="portlet-content">
            @foreach ($category->objects as $object)
                @if ($category->name == 'BMA')
                    @include('partials/show/bma', ['object' => (object) $object])
                @else
                    @include('partials/show/vehicle', ['object' => (object) $object])
                @endif
            @endforeach
        </div>
    </div>
