@include('layouts.header')
    <div class="">
        @include('frontend.layouts.navbar')
        <section class="position-relative bg-light" style="padding: 12rem 0 6rem">
            <div class="container">
                <div class="row"> 
                    <div class="col-12 mb-4">
                        <h3 class="text-light-green mb-4">To support, Please fill in your details below.</h3>
                        <div class="text-white mb-4"></div>
                        <div class="mb-4 p-4" style="border: 1px solid var(--light-green);">
                            @if(request()->get('success'))
                                <div class="alert alert-success m-0">Thank you for your support. Together we win.</div>
                            @else
                                <form action="javascript:;" method="post" class="supporter-form " data-action="{{ route('supporter.add') }}" autocomplete="off">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="text-muted">Title</label>
                                            <select class="form-control custom-select title" name="title">
                                                <option value="">Select title</option>
                                                <?php $titles = \App\Models\Supporter::$titles; ?>
                                                @if(empty($titles))
                                                    <option value="">No titles</option>
                                                @else
                                                    @foreach($titles as $title)
                                                        <option value="{{ $title }}">
                                                            {{ ucwords($title) }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <small class="error title-error text-danger"></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="text-muted">Firstname</label>
                                            <input type="text" name="firstname" class="form-control firstname" placeholder="e.g., John">
                                            <small class="error firstname-error text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="text-muted">Lastname</label>
                                            <input type="text" name="lastname" class="form-control lastname" placeholder="e.g., John">
                                            <small class="error lastname-error text-danger"></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="text-muted">Local government area</label>
                                            <select class="form-control custom-select lga" name="lga">
                                                <option value="">Select local government</option>
                                                <?php $lgas = \App\Models\Supporter::$lgas; ?>
                                                @if(empty($lgas))
                                                    <option value="">No lgas</option>
                                                @else
                                                    @foreach($lgas as $lga)
                                                        <option value="{{ $lga }}">
                                                            {{ ucwords($lga) }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <small class="error lga-error text-danger"></small>
                                        </div>
                                        
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="text-muted">Email</label>
                                            <input type="email" name="email" class="form-control email" placeholder="e.g., email@you.com">
                                            <small class="error email-error text-danger"></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="text-muted">Phone</label>
                                            <input type="text" name="phone" class="form-control phone" placeholder="e.g., 08158212666">
                                            <small class="error phone-error text-danger"></small>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-lg bg-light-green text-white supporter-button py-3 px-5 mb-4 mt-1">
                                        <img src="/images/spinner.svg" class="mr-2 d-none supporter-spinner mb-1">
                                        Submit
                                    </button>
                                    <div class="alert px-3 supporter-message d-none mb-3"></div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('frontend.layouts.bottom')
    </div>
@include('layouts.footer')