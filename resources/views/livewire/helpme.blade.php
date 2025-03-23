<div>
<div class="help-form">
    <div class="help-form__row">
        <div class="help-form__row_guywithnotebook">
<img src="{{asset('img/help.png')}}" alt="">
        </div>
        <div class="help-form__row_form">
            <form action="" method="post">
                <label class="help-form_form_question">Появились вопросы?</label>
                <p class="help-form_form_description">Техническая поддержка всегда готова ответить на все интересующие вас вопросы</p>
<button type="button" class="button-helpform" data-bs-toggle="modal" data-bs-target="#feedbackModal">
    Написать
</button>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="feedbackModalLabel">Обратная связь</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @livewire('feedback-form') 
            </div>
        </div>
    </div>
</div>
</div>