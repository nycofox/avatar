# Avatar Generation and Retrieval System

The Avatar Generation and Retrieval System is a Laravel-based web application that allows users to request AI-generated
avatars by specifying their size, a unique identifier, and the preferred sex. These avatars are intended for
demonstration purposes and are generated based on user-provided inputs.

You will need to upload your own images, go to ```/avatar``` to organize images.

## Features

- Serve AI-generated avatars.
- Request avatars with customizable size, identifier, and sex.
- Ensure consistent avatars for the same identifier.
- Store and retrieve avatars from a collection of many unique images.

## Usage

### Requesting Avatars

To request an avatar, use the following URL format:

```https://localhost/a?d={size}&s={sex}&h={identifier}```

Where:

- ```{size}```: The desired size of the avatar in pixels (e.g., 300).
- ```{sex}```: The sex of the avatar, which can be 'm' for male, 'f' for female, or blank for random
- ```{identifier}```: A unique string that consistently maps to the same avatar. If not provided, a random avatar will
  be returned.

### Examples

- Request a 300x300 random male avatar:
  https://localhost/a?d=300&s=m

- Request a 150x150 female avatar for the identifier "user@example.com":
  https://localhost/a?d=150&s=f&h=user@example.com

- Request a 500x500 avatar for the identifier "randomname" (note, this will randomly choose either a male or female
  picture):
  https://localhost/a?d=500&h=randomname

## Contributing

If you would like to contribute to the Avatar Generation and Retrieval System, please open an issue or submit a pull
request on the GitHub repository.
