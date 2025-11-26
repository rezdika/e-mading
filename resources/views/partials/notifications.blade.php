{{-- Notification System Partial --}}
@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    notifications.success('Berhasil', '{{ session('success') }}');
});
</script>
@endif

@if(session('error'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    notifications.error('Error', '{{ session('error') }}');
});
</script>
@endif

@if(session('warning'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    notifications.warning('Peringatan', '{{ session('warning') }}');
});
</script>
@endif

@if(session('info'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    notifications.info('Informasi', '{{ session('info') }}');
});
</script>
@endif

@if($errors->any())
<script>
document.addEventListener('DOMContentLoaded', function() {
    @foreach($errors->all() as $error)
    notifications.error('Error', '{{ $error }}');
    @endforeach
});
</script>
@endif