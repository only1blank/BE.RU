<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    
        <form wire:submit.prevent="submit">
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control" id="name" wire:model="name">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" wire:model="email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    
            <div class="mb-3">
                <label for="message" class="form-label">Сообщение</label>
                <textarea class="form-control" id="message" rows="5" wire:model="message"></textarea>
                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
    
</div>
