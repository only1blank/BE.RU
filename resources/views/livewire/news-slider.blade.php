<div>
   <div class="news-item_h1">Новости компании</div>
            <div class="news__background">
                <img src="{{asset('img/isometric view of gift box-1.svg')}}" class="news__background_item1" alt="">
                <img src="{{asset('img/isometric view of gift box.svg')}}" class="news__background_item2" alt="">
            </div>
                <div class="news-container">
                    <div class="news__row">
                    @foreach($news as $item)
                    <div class="news-item">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="news-item__image">
                        @endif
                        <a class="news-item__title">{{ $item->title }}</a>
                    </div>
            @endforeach
        </div>
                </div>

</div>
