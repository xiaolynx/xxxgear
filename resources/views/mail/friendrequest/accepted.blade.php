@component('mail::message')
# Friend Request Accepted

**You're friend request has been accepted by:**

**Name:** {{ $user->name }}


@component('mail::button', ['url' => route('profiles.show', $user->name)])
Visit their profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
