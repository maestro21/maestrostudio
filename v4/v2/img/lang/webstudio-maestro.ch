server {
	listen 80;
	listen [::]:80;

	root /var/www/webstudio-maestro.ch/html;
	index index.php index.html index.htm index.nginx-debian.html;

	server_name webstudio-maestro.ch www.webstudio-maestro.ch;

	location / {
		 try_files $uri $uri/ /index.php?$args;
	}

	location ~ \.php$ {
		include snippets/fastcgi-php.conf;
		fastcgi_pass unix:/run/php/php7.0-fpm.sock;
	}

	location ~ /\.ht {
		deny all;
	}
}

