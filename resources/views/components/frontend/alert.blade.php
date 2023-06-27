@props(['type' => 'success'])

<div data-alert class='alert alert-{{$type}} alert-dismissible fade show' role="alert"> <!-- class alert hier belangrijk -->
    {{ $message ?? 'Success' }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" title="close"></button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        const alerts = document.querySelectorAll('[data-alert]')
        alerts.forEach(function(alert){
            window.setTimeout(function(){
                $(alert).alert('close');
            }, 5000);
        });
    })
</script>
