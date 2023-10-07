# NASA Hackathon Backend Project

This project is one part of the larger NASA Hackathon project.

To use this project, Docker and Docker Compose are required. Installing the project is very simple:

Clone this project.
Run the command 'docker-compose build'.
After it's completed, run 'docker-compose up -d'."


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

- [@jotope94](https://github.com/jotope94)
