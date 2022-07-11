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
        {{-- Chat Bot --}}
        @if(!str_contains(request()->root(), 'admin') && str_contains(request()->root(), '.ng'))
            <script src="//code.tidio.co/mxllsfj2n4cmmufikdimeqa4ujtvoojd.js" async></script>
        @endif
        {{-- Other Scripts --}}
        <script type="text/javascript">
            $(function(){
                $('.copy-to-clipboard').copyOnClick({
                    // confirmShow: true
                    confirmClass:"copy-confirmation",
                    confirmText:"Copied",
                    confirmTime: 3,
                });
            });
            // new ClipboardJS('.copy-to-clipboard');

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
                @endforeach 
            @endif
        </script>
    </body>
</html>