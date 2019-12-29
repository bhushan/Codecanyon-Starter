@extends('layouts.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Application Settings
                </h3>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.post.app-settings') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="sitename">{{ __('Sitename:') }}</label>
                        <input id="sitename" type="text" name="sitename" placeholder="Your sitename goes here.."
                            value="{{ ( $settings->where('key', 'sitename')->pluck('value')->first() ?? '' ) }}"
                            class="form-control  @error('sitename') is-invalid @enderror" required>
                        @error('sitename')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">{{ __('Description:') }}</label>
                        <input id="description" type="text" name="description"
                            placeholder="Description for your website SEO.."
                            value="{{ ( $settings->where('key', 'description')->pluck('value')->first() ?? '' ) }}"
                            class="form-control  @error('description') is-invalid @enderror" required>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="company">{{ __('Company:') }}</label>
                        <input id="company" type="text" name="company" placeholder="Company name.."
                            value="{{ ( $settings->where('key', 'company')->pluck('value')->first() ?? '' ) }}"
                            class="form-control  @error('company') is-invalid @enderror" required>
                        @error('company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="siteurl">{{ __('Site Url:') }}</label>
                        <input id="siteurl" type="text" name="siteurl" placeholder="Ex. //enlight.host"
                            value="{{ ( $settings->where('key', 'siteurl')->pluck('value')->first() ?? '' ) }}"
                            class="form-control  @error('siteurl') is-invalid @enderror" required>
                        @error('siteurl')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection