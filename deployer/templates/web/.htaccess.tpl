Options +FollowSymLinks

RewriteEngine on

# Redirect http to https
RewriteCond %{SERVER_PORT} ^80$
RewriteRule ^.*$ https://%{SERVER_NAME}%{REQUEST_URI} [R=301,L]

# if a directory or a file exists, use it directly
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

# otherwise forward it to index.php
RewriteRule . index.php
