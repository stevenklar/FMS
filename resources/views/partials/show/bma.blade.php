<div class="vehicle vehicle-{{ $object->id }}">
    <div class="status status--<?= $object->status ?>">
        <img id="detail-icon-img" src="https://cdn4.iconfinder.com/data/icons/48-bubbles/48/43.Bell-24.png" alt="alarm, alert, bell, christmas, notification, ring icon" width="24" height="24">
    </div>

    <div class="call-sign">
        <div class="id">{{ $object->name }}</div>
    </div>
</div>
