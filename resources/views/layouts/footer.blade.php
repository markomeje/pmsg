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
        <!-- Summernote -->
        <script src="{{ config('app.url') }}/summernote/summernote-lite.min.js" type="text/javascript"></script>
        {{-- Other Scripts --}}
        <script type="text/javascript">
            var description = $('#description');
            if (description) {
                description.summernote({
                    tabsize: 4,
                    height: 500
                });
            }

            @if(!empty($posts) || !empty($news))
                $('.upload-image').click(function() {
                    uploader({target: $(this), button: 'upload-image', input: 'image-input', loader: 'image-loader', preview: 'image-preview'});
                });   
            @endif
        </script>
    </body>
</html>