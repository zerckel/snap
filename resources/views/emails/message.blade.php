
@component('mail::message')
    Hello **{{$name}}**,  {{-- use double space for line break --}}
    Thank you for choosing SnapMail!

    Click below to See ur SnapMail
    @component('mail::button', ['url' => 'http://127.0.0.1:8000/'.$code])
        Go to your inbox
    @endcomponent
    Sincerely,
    SnapMail team.
@endcomponent
