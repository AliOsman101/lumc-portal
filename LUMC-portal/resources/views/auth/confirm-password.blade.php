<!-- Minimal confirm-password view for tests -->
<form method="POST" action="{{ route('password.confirm') }}">
    @csrf
    <input name="password" type="password" />
    <button type="submit">Confirm</button>
</form>
