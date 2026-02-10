<!-- Minimal login view for tests -->
<form method="POST" action="{{ route('login') }}">
    @csrf
    <input name="email" />
    <input name="password" type="password" />
    <button type="submit">Login</button>
</form>
