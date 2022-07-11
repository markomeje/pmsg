        {{-- Jquery JS --}}
        <script src="{{ config('app.url') }}/jquery/jquery.min.js"></script>
        {{-- Pooper JS --}}
        <script src="{{ config('app.url') }}/bootstrap/popper.min.js"></script>
        {{-- bootstrap JS --}}
        <script src="{{ config('app.url') }}/bootstrap/bootstrap.min.js"></script>
        {{-- index JS --}}
        <script src="{{ config('app.url') }}/js/index.js"></script>
        {{-- forms JS --}}
        <script src="{{ config('app.url') }}/js/forms.js"></script>
        {{-- ajax JS --}}
        <script src="{{ config('app.url') }}/js/ajax.js"></script>
        {{-- Copy to clipboard --}}
        <script src="{{ config('app.url') }}/js/clipboard.js"></script>
        <!-- Summernote -->
        <script src="{{ config('app.url') }}/summernote/summernote-lite.min.js" type="text/javascript"></script>
        {{-- File Pond Scripts --}}
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
        <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

        {{-- Chat Bot --}}
        @if(!str_contains(request()->root(), 'admin') && str_contains(request()->root(), '.ng'))
            <script src="//code.tidio.co/mxllsfj2n4cmmufikdimeqa4ujtvoojd.js" async></script>
        @endif
        {{-- Other Scripts --}}
        <script type="text/javascript">
            const fieldName = document.querySelector('.filepond');
            if(fieldName) {
                FilePond.registerPlugin(FilePondPluginFileEncode, FilePondPluginFileValidateSize, FilePondPluginImageExifOrientation, FilePondPluginImagePreview);

                var pond = FilePond.create(fieldName, {
                    labelIdle: `Drag & Drop other images here`,
                });

                var files = fieldName.files;
                pond.setOptions({
                    maxFiles: "{{ empty($max) ? 10 : $max }}",
                    server: {
                        process: {
                            url: fieldName.getAttribute('data-url'),
                            method: 'post',
                            headers: {
                                'X-CSRF-TOKEN': "{{ @csrf_token() }}",
                            },
                            onload: (response) => {
                                console.log(JSON.parse(response));
                            },
                            onerror: (response) => {
                                var response = JSON.parse(response)
                                console.log(response.info);
                                alert(response.info);
                                return;
                            },
                        },

                        revert: (uniqueFileId, load, error) => {
                            alert('Not allowed. Reload page and try again.');
                            window.location.reload(true)
                        },
                    },
                });
            }

            $(function(){
                $('.copy-to-clipboard').copyOnClick({
                    confirmClass:"copy-confirmation",
                    confirmText:"Copied",
                    confirmTime: 3,
                });
            });

            var description = $('#description');
            if (description) {
                description.summernote({
                    tabsize: 4,
                    height: 500
                });
            }

            @if(!empty($posts) || !empty($news) || !empty($images))
                $('.upload-image').click(function() {
                    uploader({target: $(this), button: 'upload-image', input: 'image-input', loader: 'image-loader', preview: 'image-preview'});
                });   
            @endif

            @if(!empty($images))
                @foreach($images as $image)
                    $('.upload-image-{{ $image->id }}').click(function() {
                        uploader({target: $(this), button: 'upload-image-{{ $image->id }}', input: 'image-input-{{ $image->id }}', loader: 'image-loader-{{ $image->id }}', preview: 'image-preview-{{ $image->id }}'});
                    });

                    $('.delete-image-{{ $image->id }}').on('click', function() {
                        handleAjax({that: $(this), button: 'delete-image-button-{{ $image->id }}', spinner: 'delete-image-spinner-{{ $image->id }}'});    
                    });
                @endforeach 
            @endif
        </script>
    </body>
</html>