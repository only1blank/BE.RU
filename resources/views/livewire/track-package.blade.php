<div>
  
    <form wire:submit.prevent="track">
        <div class="form-group">
            <label for="trackingId">Трекинг-номер:</label>
            <input type="text" id="trackingId" wire:model="trackingId" class="form-input" required>
            @error('trackingId') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="form-button">Отследить</button>
    </form>

    @if (session()->has('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif

    @if ($package)
    <div class="package-info">
        <h3 class="package-info__title">Информация о посылке</h3>
        <p class="package-info__item package-info__item--tracking">
            <strong class="package-info__label">Трекинг-номер:</strong> 
            <span class="package-info__value">{{ $package->tracking_id }}</span>
        </p>
        <p class="package-info__item package-info__item--from">
            <strong class="package-info__label">Откуда:</strong> 
            <span class="package-info__value">{{ $package->from }}</span>
        </p>
        <p class="package-info__item package-info__item--to">
            <strong class="package-info__label">Куда:</strong> 
            <span class="package-info__value">{{ $package->to }}</span>
        </p>
        <p class="package-info__item package-info__item--size">
            <strong class="package-info__label">Размер посылки:</strong> 
            <span class="package-info__value">{{ $package->package_size }}</span>
        </p>
        <p class="package-info__item package-info__item--status">
            <strong class="package-info__label">Статус:</strong> 
            <span class="package-info__value">{{ $package->status }}</span>
        </p>
    </div>
    @endif
</div>