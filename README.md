# Instagram Clone

## Overview

This project is an Instagram clone built with the TALL stack (Tailwind CSS, Alpine.js, Livewire, and Laravel). It aims to replicate the core functionalities of the Instagram web application, allowing users to register, share photos, and interact with other users' posts.

## Features

- **User Registration**: Users can sign up for an account to access the platform.
- **Photo Sharing**: Users can upload and share photos with captions.
- **Feed**: Users can view a feed of posts shared by other users.
- **Interactions**: Users can like and comment on posts.
- **Follow/Unfollow**: Users can follow and unfollow other users to customize their feed.
- **Profile Management**: Users can manage their profile information and settings.

## Technologies Used

- **Laravel**: Laravel is used as the backend framework to handle routing, authentication, and database operations.
- **Tailwind CSS**: Tailwind CSS is used for styling the frontend components, providing a modern and responsive design.
- **Alpine.js**: Alpine.js is used for frontend interactivity and dynamic behavior without the need for a full-fledged JavaScript framework.
- **Livewire**: Livewire is used to build reactive interfaces on the server-side, simplifying the development of interactive features.
- **Daisy UI**: Daisy UI is used to enhance the UI components with pre-designed elements and layouts.
- **Shadcn**: Shadcn is used for adding shadows and depth to UI elements, improving the overall visual appeal.

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/instagram-clone.git
   ```

2. Navigate to the project directory:

   ```bash
   cd instagram-clone
   ```

3. Install dependencies:

   ```bash
   composer install
   npm install
   ```

4. Set up environment variables:

   - Rename the `.env.example` file to `.env`:

     ```bash
     cp .env.example .env
     ```

   - Generate an application key:

     ```bash
     php artisan key:generate
     ```

   - Configure database settings in the `.env` file.

5. Run migrations and seeders:

   ```bash
   php artisan migrate --seed
   ```

6. Start the development server:

   ```bash
   php artisan serve
   ```

7. Access the application in your web browser at `http://localhost:8000`.

## Contributing

Contributions are welcome! If you have any ideas for improvements or new features, feel free to open an issue or submit a pull request.