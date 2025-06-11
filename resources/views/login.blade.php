<form method="POST" action="{{ route('api.login') }}">
  @csrf
  <!-- إدخال الإيميل وكلمة السر هنا -->

  <button type="submit">Log in</button>
</form>

<div>
  <a href="{{ route('password.request') }}">Forget your Password?</a>
</div>
