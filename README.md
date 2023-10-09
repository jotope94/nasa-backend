<img src="/public/assets/logo-black.png">

# NASA Hackathon Backend Project

This project is one part of the larger NASA Hackathon project.

To use this project, Docker and Docker Compose are required. Installing the project is very simple:

```
  1 - Clone the project.
  2 - Run the command 'docker-compose build'.
  3 - Comment out line 26: CMD ["sh", "-c", "supervisord -n & php artisan serve --host=0.0.0.0 --port=8000"].
  4 - Paste the command: CMD ["sh", "-c", "supervisord -n "].
  5 - Run 'docker-compose up -d'.
  6 - Run 'docker docker exec -ti nasa-backend-1 bash'.
  7 - Inside the container, run 'composer install'.
  8 - Exit the container, uncomment line 27, and remove the line from step 4.
  9 - Run 'docker-compose up -d'.
  10- Create a .env file and copy-paste the content from .env.example.
```

## API Documentation

```http
  POST /create
```

| Parameter   | Type       | Description                  |
| :---------- | :--------- | :---------------------------------- |
| `lng` | `int` | latitude |
| `lat` | `int` | longitude |
| `reportBy` | `string` | name of reported  |
| `fireSeverity` | `string` | Dimension for de fire |
| `riskInNeighbourhood` | `string` | risk for the neighbourhood |

#### Return string success

```http
  GET /get
```

#### Return all the records



## Authors

- [João Vitor de Lima Perez](https://github.com/jotope94)
