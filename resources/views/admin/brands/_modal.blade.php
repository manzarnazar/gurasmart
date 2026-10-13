@if (($createPermission ?? false) || ($editPermission ?? false))
    <div class="modal modal-blur fade" id="brand-modal" tabindex="-1" role="dialog" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form class="form-submit" action="{{ route('admin.brands.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('labels.create_brand') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('partials._visibility-inspector')

                        <div class="mb-3">
                            <label class="form-label required">
                                {{ __('labels.scope_type') }}
                                <x-form-info-tooltip :title="__('messages.brand_scope_type_info_message')" />
                            </label>
                            <select class="form-select" name="scope_type" id="scopeType">
                                <option value="">{{ __('labels.select_scope_type') }}</option>
                                @foreach (\App\Enums\HomePageScopeEnum::forBrands() as $scopeType)
                                    <option value="{{ $scopeType }}"
                                        {{ old('scope_type', 'global') == $scopeType ? 'selected' : '' }}>
                                        {{ ucfirst($scopeType) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('scope_type')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3" id="scopeCategoryField" style="display: none;">
                            <label class="form-label">{{ __('labels.scope_category') }}</label>
                            <select class="form-select" name="scope_id" id="select-root-category">
                                <option value="">{{ __('labels.select_category') }}</option>
                                @if (!empty($scopeCategory))
                                    <option value="{{ $scopeCategory->id }}" selected>{{ $scopeCategory->title }}
                                    </option>
                                @endif
                            </select>
                            @error('scope_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label required">{{ __('labels.brand_name') }}</label>
                            <input type="text" class="form-control" name="title"
                                placeholder="{{ __('labels.enter_brand_name') }}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">{{ __('labels.description') }}</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="{{ __('labels.enter_description') }}"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">{{ __('labels.logo') }}</label>
                            <input type="file" class="form-control" id="logo-upload" name="logo"
                                data-logo-url="" />
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="status" id="status-switch"
                                        value="active" checked>
                                    <label class="form-check-label"
                                        for="status-switch">{{ __('labels.status') }}</label>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <x-seo-fields />
                    </div>

                    <div class="modal-footer">
                        <a href="#" class="btn" data-bs-dismiss="modal">{{ __('labels.cancel') }}</a>
                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-2">
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            {{ __('labels.create_new_brand') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
