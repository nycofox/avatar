<x-layout>
    <div class="card mt-4">
        <div class="card-body">
            <h2>Welcome to the Avatar App!</h2>
            <h3>Instructions:</h3>

            <p>To request an avatar, use the following URL format:</p>

            <code>{{ config('app.url') }}/a?d={size}&s={sex}&h={identifier}</code>

            <p class="mt-2">Where:</p>

            <ul>
                <li><code>{size}</code> - The desired size of the avatar in pixels (e.g., 300).</li>
                <li><code>{sex}</code> - The sex of the avatar, which can be 'm' for male, 'f' for female, or blank for
                    random
                </li>
                <li><code>{identifier}</code> - A unique string that consistently maps to the same avatar. If not
                    provided, a random avatar will be returned
                </li>
            </ul>

            <p><a href="https://nycofox.com">Visit my blog</a> - Nyco Fox</p>
        </div>
    </div>
</x-layout>
