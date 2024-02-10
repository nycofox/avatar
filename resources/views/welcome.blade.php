<x-layout>
    <div class="card mt-4">
        <div class="card-body">
            <h2>Welcome to the Avatar App!</h2>
            <p>There are currently {{ $total_count }} avatars available to use!</p>
            <p>We've served a total of {{ $total_requests }} request.</p>
            <h3>Instructions:</h3>

            <p>To request an avatar, use the following URL format:</p>

            <code>{{ config('app.url') }}/a?d={size}&s={sex}&h={identifier}</code>

            <p class="mt-2">Where:</p>

            <ul>
                <li><code>{size}</code> - The desired size of the avatar in pixels (e.g., 300). Maximum size is 500.</li>
                <li><code>{sex}</code> - The sex of the avatar, which can be 'm' for male, 'f' for female, or blank for
                    random
                </li>
                <li><code>{identifier}</code> - A unique string that consistently maps to the same avatar. If not
                    provided, a random avatar will be returned. If provided, the same avatar will always be returned,
                    however it will still vary based on the chosen sex. So a hash can have up to two different avatars.
                </li>
            </ul>

            <p><a href="https://nycofox.com">Visit my blog</a> - Nyco Fox</p>
        </div>
    </div>
</x-layout>
