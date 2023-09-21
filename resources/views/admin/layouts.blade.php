<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $pageTitle }}</title>

    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
  
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">



</head>

<body id="page-top">

    <div id="wrapper">

        @yield('content')

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto ft">
                    <span>Health. Beauty. Wellness. Wealth International 2023 | All rights Reserved </span>
                </div>
            </div>
        </footer>
    
    </div>    <!-- End of Page Wrapper -->
   
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

   
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="index.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            function readURL(input) {
                if (input.files && input.files.length > 0) {
                    $('#image-preview').html(''); 
    
                    for (let i = 0; i < input.files.length; i++) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const img = $('<img>').attr('src', e.target.result);
                            $('#image-preview').append(img);
                        };
                        reader.readAsDataURL(input.files[i]);
                    }
    
                    // Add a "Cancel" button
                    const cancelButton = $('<button>').text('X');
                    cancelButton.click(function () {
                        // Clear the selected images and reset the file input
                        $('#image-preview').html('');
                        $('input[type="file"]').val('');
                    });
                    $('#image-preview').append(cancelButton);
                }
            }
    
            // Listen for changes in the file input
            $('input[type="file"]').change(function () {
                readURL(this);
            });
        });
    </script>
    

 
</body>

</html>