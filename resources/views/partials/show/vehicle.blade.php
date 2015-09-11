<div class="vehicle vehicle-{{ $object->id }}">
    <div class="status status--<?= $object->status ?>"><?= $object->status ?></div>

    <div class="call-sign">
        <div class="id">{{ $object->name }}</div>
    </div>
</div>
