@component('mail::message')
    # Nuova richiesta preventivo

    Email: {{ $contact['email'] }}

    Richiesta: {{ $contact['request'] }}
@endcomponent
