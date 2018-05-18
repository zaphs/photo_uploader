<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm">
            <br/>
            <p>Problem Statement (Photo uploader / Viewer) -</p>
            <ul>
                <li>
                    1. Create REST APIs for photo upload with following options (routes) -
                    <ul>
                        <li>a. Upload photo (to a local directory where source code is)</li>
                        <li>b. Rename an uploaded photo by its name</li>
                        <li>c. Delete an uploaded photo by its name</li>
                        <li>d. List all uploaded photos</li>
                    </ul>
                </li>

                <li>2. Provide functionality to use these APIs on a webpage using html forms.</li>
                <li>3. Display results from API to the same or separate webpage (preferably via AJAX/Jquery on same page)</li>
            </ul>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-sm">

                    <form name="photo_uploader_form" id="photo_uploader_form" action="{{ route('api') }}" method="POST" enctype="multipart/from-data">
                        {{ csrf_field() }}
                        <div class="form-group form-group-sm">
                                <input type="file" class="form-control" name="image" id="photo" />
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"  id="upload">Upload</button>
                                </div>
                        </div>
                    </form>

                    <div class="proto" style="display: none;">
                        <div>
                            <input type="radio" id="selected-photo" name="selected-photo">
                            <span class="filename"></span>
                        </div>
                    </div>


                    <ul id="files"></ul>

                    <input type="text" name="target" id="rename-target" placeholder="New name">
                    <button type="button" class="btn btn-default"  id="rename">Rename</button>
                    <button type="button" class="btn btn-default"  id="delete">Delete</button>
                    <button type="button" class="btn btn-default"  id="list">List</button>
                    <p>
                        <span id="messages" class="text-muted"></span>
                    </p>

            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
