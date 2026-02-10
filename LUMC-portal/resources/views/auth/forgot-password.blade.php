<!-- Minimal forgot-password view for tests -->
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <input name="email" />
    <button type="submit">Send Reset Link</button>
</form>
