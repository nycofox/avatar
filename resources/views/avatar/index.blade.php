<x-layout>
    <h1>List of avatars</h1>
    <a href="{{ route('avatar.create') }}">Add new avatars</a>

    {{--    Create table to list all avatars    --}}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Avatar</th>
            <th scope="col">Sex</th>
            <th scope="col">Number</th>
        </tr>
        </thead>
        <tbody>
        @foreach($avatars as $avatar)
            <tr>
                <td><img alt="Avatar" src="{{ route('avatar.showid', $avatar->id) }}" width="40" height="40"></td>
                <td>{{ $avatar->sex }}</td>
                <td>{{ $avatar->number }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--    Add pagination links    --}}
    {{ $avatars->links() }}
</x-layout>
