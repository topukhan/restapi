# PHP REST API Setup Guide

## Overview

This guide will walk you through the process of setting up a PHP REST API with MySQL database integration. Follow these steps to get your environment up and running smoothly.

## Prerequisites

-   Apache and MySQL
-   Basic knowledge of PHP and MySQL
-   Clone this repository to your local machine.

```
git clone https://github.com/topukhan/restapi.git
cd restapi
```

## Database Setup

1. Open PHPMyAdmin and create a new database or existing database and add the database name in includes/config.php file.
2. From includes folder in your repository Import table.sql into database.

## Server Configuration

1. Ensure that your Laragon is installed and running. (Currently run only with laragon)
2. Start Apache and MySQL servers.

## Accessing the API Views

Once your servers are running, navigate to the following URL in your browser:

```
http://localhost/folderName/views/category/index.php
```

Your PHP REST API is now set up and ready to go.

## Additional Notes

-   Ensure that your server environment meets the PHP version and configuration requirements.
-   Review and customize the configuration files for database connections if needed.
-   For security reasons, avoid using default usernames and passwords in your database configuration.
