<script>
    $(function() {
        var successMessage = "{{ session('success') }}";
        var errorMessage = "{{ session('error') }}";
        var infomessage = "{{ session('message') }}";
        var warningMessage = "{{ session('warning')}}";


        "use strict";
        if(infomessage){
            $.toast({
                heading: 'Status',
                text: infomessage,
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'info',
                hideAfter: 6000,
                stack: 6
            });
        }

        if(warningMessage){
            $.toast({
                heading: 'Warning',
                text: warningMessage,
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'warning',
                hideAfter: 6500,
                stack: 6
            });

        }

        if(errorMessage){
            $.toast({
                heading: 'Error',
                text: errorMessage,
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'error',
                hideAfter: 6500,
                stack: 6
            });

        }

        if(successMessage){
            $.toast({
                heading: 'Success',
                text: successMessage,
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'success',
                hideAfter: 6500,
                stack: 6
            });

        }

    });
</script>