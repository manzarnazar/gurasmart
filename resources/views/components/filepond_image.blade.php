@php
    $removeName = 'remove_' . preg_replace('/[^A-Za-z0-9_]/', '_', str_replace('[]', '', $name));
@endphp
<div>
    <input type="hidden" name="{{ $removeName }}" value="0" data-filepond-remove-for="{{ $name }}">
    <input
        type="file"
        class="form-control"
        id="{{ $id ?? $name }}"
        name="{{ $name }}"
        data-image-url="{{ $imageUrl ?? '' }}"
        disabled="{{ $disabled ?? 'false' }}"
        multiple="{{ $multiple ?? 'false' }}"
    />
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const input = document.querySelector('[name="{{ $name }}"]');
        if (input) {
            let imageUrl = input.getAttribute('data-image-url');
            const removeInput = input.closest('form')?.querySelector('[data-filepond-remove-for="{{ $name }}"]');
            const pond = FilePond.create(input, {
                allowImagePreview: true,
                instantUpload: false,
                acceptedFileTypes: ['image/*'],
                credits: false,
                storeAsFile: true,
                files: imageUrl ? [{
                    source: imageUrl, options: {
                        type: 'remote'
                    }
                }] : []
            });
            pond.on('removefile', function () {
                if (removeInput) {
                    removeInput.value = '1';
                }
            });
            pond.on('addfile', function () {
                if (removeInput) {
                    removeInput.value = '0';
                }
            });
        }
    });
</script>
