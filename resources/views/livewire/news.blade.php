<div class="news-admin">
    <h1 class="news-admin__title">Управление новостями</h1>

    <form class="news-admin__form" wire:submit.prevent="addNews">
        <div class="news-admin__form-group">
            <label class="news-admin__label" for="title">Заголовок:</label>
            <input class="news-admin__input" type="text" id="title" wire:model="title">
        </div>
        <div class="news-admin__form-group">
            <label class="news-admin__label" for="content">Содержание:</label>
            <textarea class="news-admin__textarea" id="content" wire:model="content"></textarea>
        </div>
        <div class="news-admin__form-group">
            <label class="news-admin__label" for="image">Изображение:</label>
            <input class="news-admin__file" type="file" id="image" wire:model="image">
            @error('image') <span class="news-admin__error">{{ $message }}</span> @enderror
        </div>
        <button class="news-admin__button news-admin__button--submit" type="submit">
            {{ $editMode ? 'Обновить новость' : 'Добавить новость' }}
        </button>
        @if($editMode)
            <button class="news-admin__button news-admin__button--cancel" type="button" wire:click="resetForm">Отмена</button>
        @endif
    </form>

    <div class="news-admin__list">
        <h2 class="news-admin__subtitle">Список новостей</h2>
        @foreach($newsList as $news)
            <div class="news-admin__item">
                @if($news->image)
                    <img class="news-admin__image" src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
                @endif
                <h3 class="news-admin__item-title">{{ $news->title }}</h3>
                <p class="news-admin__item-content">{{ $news->content }}</p>
                <div class="news-admin__actions">
                    <button class="news-admin__button news-admin__button--edit" wire:click="editNews({{ $news->id }})">Редактировать</button>
                    <button class="news-admin__button news-admin__button--delete" wire:click="deleteNews({{ $news->id }})">Удалить</button>
                </div>
            </div>
        @endforeach
    </div>
</div>