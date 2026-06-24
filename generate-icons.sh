#!/bin/bash

# Generate PWA icons using ImageMagick
# Install ImageMagick first: brew install imagemagick (Mac) or apt-get install imagemagick (Linux)

# Create icons directory
mkdir -p public/icons

# Generate icons from a base image (provide your own base.png)
# You can create a simple icon using this command:
convert -size 512x512 gradient:#667eea-#764ba2 -fill white -gravity center \
    -pointsize 80 -annotate 0 "MV" public/icons/icon-512x512.png

# Generate all sizes
sizes=(72 96 128 144 152 192 384 512 32 16 180)
for size in "${sizes[@]}"
do
    convert public/icons/icon-512x512.png -resize ${size}x${size} public/icons/icon-${size}x${size}.png
done

# Copy to root directory
cp public/icons/icon-72x72.png .
cp public/icons/icon-96x96.png .
cp public/icons/icon-128x128.png .
cp public/icons/icon-144x144.png .
cp public/icons/icon-152x152.png .
cp public/icons/icon-192x192.png .
cp public/icons/icon-384x384.png .
cp public/icons/icon-512x512.png .
cp public/icons/icon-32x32.png .
cp public/icons/icon-16x16.png .
cp public/icons/icon-180x180.png .

echo "Icons generated successfully!"