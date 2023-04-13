<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{$event->name}}</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="css/vanilla-zoom.min.css">
    <style>
        .form-select {
            color: #3B99E0 !important;
            font-weight: 500;
            font-size: 2em;
            text-align: center;
        }
    </style>
    <script>
        document.addEventListener('input', function (event) {
            // Only run on our select menu
            if (event.target.id !== 'event') return;
            window.location.replace('/?event_id=' + event.target.value);
        }, false);
    </script>
</head>

<body>
    <main class="page gallery-page">
        <section class="clean-block clean-gallery dark">
            <div class="container">
                <div class="block-heading">
                    <select class="form-select form-select-lg mb-3" id="event" name="event">
                        @foreach ($events as $evt)
                        <option value="{{$evt->id}}" {{$evt->id === $event->id ? 'selected' : ''}}>{{$evt->name}}</option>
                        @endforeach
                    </select>
                    <p>{{Carbon::parse($event->date)->format('M d, Y')}} <br>{{$event->venue->name}}</p>
                </div>
                <div class="row">
                @foreach ($photos as $photo)
                    @php
                        $s3KeyName = $photo->image;
                        $thumbnailS3KeyName = $photo->thumbnail('small');
                        if (isProduction()) {
                            $s3KeyName = $photo->s3_key_name_directory . "/" . \Illuminate\Support\Facades\File::basename($photo->image);
                            $thumbnailS3KeyName = $photo->s3_key_name_directory . "/" . \Illuminate\Support\Facades\File::basename($photo->thumbnail('small'));
                        }
                    @endphp
                    <div class="col-md-6 col-lg-4 item"><a class="lightbox" href="{{ getS3Image($s3KeyName)}}"><img class="img-thumbnail img-fluid image" src="{{getS3Image($thumbnailS3KeyName)}}" style="width: 406px !important; height: auto !important; object-fit: scale-down;"></a></div>
                @endforeach
                </div>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <!-- <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Sign up</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div> -->
        <div class="footer-copyright">
            <p>© 2022 Copyright Text</p>
        </div>
    </footer>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="js/vanilla-zoom.js"></script>
    <script src="js/theme.js"></script>
    {{-- DISABLED  disable-devtool.min.js--}}
    {{-- @if (config('app.env') !== 'local')
    <script disable-devtool-auto src='https://fastly.jsdelivr.net/npm/disable-devtool/disable-devtool.min.js'></script>
    <script>
        // Disable right-click (not so good hack :p)
        window.oncontextmenu = function () {
            return false;
        };
    </script>
    @endif --}}
</body>

</html>