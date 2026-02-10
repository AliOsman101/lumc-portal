<!-- Minimal reset-password view for tests -->
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token ?? '' }}" />
    <input name="email" />
    <input name="password" type="password" />
    <input name="password_confirmation" type="password" />
    <button type="submit">Reset Password</button>
</form>
