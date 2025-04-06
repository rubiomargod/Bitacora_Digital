@if (session('success') || $errors->any())
<div class="modal fade" id="modalMessages" tabindex="-1" aria-labelledby="modalLabelMessages" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabelMessages">
          @if(session('success')) ✅ Éxito @else ❌ Error @endif
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if (session('success'))
        {{ session('success') }}
        @endif
        @if ($errors->any())
        <ul>
          @foreach ($errors->all() as $error)
          <li>❗ {{ $error }}</li>
          @endforeach
        </ul>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endif
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var modal = document.getElementById("modalMessages");
    if (modal) {
      var modalInstance = new bootstrap.Modal(modal);
      modalInstance.show();
    }
  });
</script>