@if ($errors->any())
<div class="row">
  <div class="card red darken-1">
    <div class="card-content white-text">
      <span class="card-title">Warning!</span>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
  </div>
</div>
@endif
