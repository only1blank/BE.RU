<div>
    
    <form wire:submit.prevent="submit" class="form-container">
        <div class="form-group">
            <label for="from">Откуда:</label>
            <input type="text" id="suggest1" wire:model="from" class="form-input">
            @error('from') <span class="error">{{ $message }}</span> @enderror
        </div>
    
        <div class="form-group">
            <label for="to">Куда:</label>
            <input type="text" id="to" wire:model="to" class="form-input">
            @error('to') <span class="error">{{ $message }}</span> @enderror
        </div>
    
        <div class="form-group">
            <label for="packageSize">Размер посылки:</label>
            <select id="packageSize" wire:model="packageSize" class="form-input">
                <option value="nothing" selected >Выбрать</option>
                <hr>
                <option value="Маленький" >Маленький</option>
                <option value="Средний" >Средний</option>
                <option value="Большой">Большой</option>
            </select>
            @error('packageSize') <span class="error">{{ $message }}</span> @enderror
        </div>
    
        <button type="submit" class="form-button">Оформить доставку</button>
    </form>
    <script>
        document.querySelector('form').addEventListener('submit', function (event) {
            const selectElement = document.getElementById('packageSize');
            if (selectElement.value === 'nothing') {
                alert('Пожалуйста, выберите размер посылки.');
                event.preventDefault(); 
            }
        });
    </script>
    
</div>
