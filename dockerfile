# Base image
FROM php:8.2.12-cli

# Set args
ARG GIT_REPO=https://github.com/sadeequeshaikh1111/lakshyaportal.git
ARG GIT_BRANCH=main
RUN echo "✅ Composer install stg 0"
# Install necessary packages and PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip zip curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    nodejs npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN echo "✅ Composer installed"

# Set working directory
WORKDIR /var/www

# Clone Laravel project directly into html folder
RUN echo "➡️ Cloning Laravel project..." && \
    git clone --branch $GIT_BRANCH $GIT_REPO html && \
    echo "✅ Laravel project cloned successfully"

# Set working directory inside the Laravel project
WORKDIR /var/www/html

# Install dependencies and setup Laravel
RUN echo "➡️ Installing Laravel dependencies..." && \
    composer install && \
    if [ -f ".env.example" ]; then cp .env.example .env; fi && \
    php artisan key:generate && \
    echo "✅ Laravel setup done"

# Build frontend assets (optional)
RUN echo "➡️ Building frontend..." && \
    npm install && npm run build && \
    echo "✅ Frontend built"

# Expose Laravel port
EXPOSE 8000

# Start Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
