<x-layout>
    <h1>Upload avatars</h1>
    <a href="{{ route('avatar.index') }}">Back to overview</a>

    <form action="{{ route('avatar.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mt-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" id="sex1" value="f">
                <label class="form-check-label" for="sex1">
                    Female
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" id="sex2" value="m">
                <label class="form-check-label" for="sex2">
                    Male
                </label>
            </div>
        </div>

        <div class="mt-3">
            <label for="avatars" class="form-label">Choose files</label>
            <input name="images[]" class="form-control" type="file" id="avatars" multiple>
        </div>

        <button type="submit" class="mt-3 btn btn-primary">Batch Upload</button>
    </form>
</x-layout>
