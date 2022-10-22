#!/bin/sh

echo 'Enter Current commit'
read CurrCommit
git add .
git commit -m '$CurrCommit'
git push heroku main

