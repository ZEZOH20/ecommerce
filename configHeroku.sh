#!/bin/sh

#heroku config:add APP_DEBUG=true
#heroku config:add APP_KEY=base64:zJ5XZKJLIOfJf+F9j1jOVXQtdO7hBW9H+tX8G8fBjww=
heroku config:add APP_NAME=Laravel
heroku config:add APP_ENV=production
heroku config:add APP_URL=http://localhost

heroku config:add DB_CONNECTION=pgsql
heroku config:add DB_HOST=ec2-54-82-205-3.compute-1.amazonaws.com
heroku config:add DB_PORT=5432
heroku config:add DB_DATABASE=ecommerce
heroku config:add DB_USERNAME=xasrftmgfmihxg
heroku config:add DB_PASSWORD=05e2e5977770b91e2688c306bb8448915571763490c86b4499582e45c425f62d



#heroku pg:credentials:url