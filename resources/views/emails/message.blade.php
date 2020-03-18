
@component('mail::message')
    Hello **{{$name}}**,
    Thank you for choosing SnapMail!

    Click below to See ur SnapMail
    @component('mail::button', ['url' => 'http://127.0.0.1:8000/'.$code])
        Go to your SnapMail
    @endcomponent
    Sincerely,
    SnapMail team.
@endcomponent
