CREATE USER test_user WITH PASSWORD 'test_password';
CREATE DATABASE patterns;
GRANT ALL PRIVILEGES ON DATABASE patterns TO test_user;