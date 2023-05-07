# Use an official MongoDB image as a parent image
FROM mongo:5.0

# Install the MongoDB PHP extension
RUN apt-get update && apt-get install -y php php-mongodb

# Copy our PHP script into the container
COPY index.php /usr/src/app/index.php

# Set the environment variables for the MongoDB connection
ENV MONGODB_HOST mongodb://mongodb:27017
ENV MONGODB_DB location

# Start the PHP script
CMD ["php", "-S", "0.0.0.0:80", "-t", "/usr/src/app"]
