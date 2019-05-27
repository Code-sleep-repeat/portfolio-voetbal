# FCA Cloud

FCA Cloud is a PHP based web app that lists members of a soccer club.
![logo](https://imgur.com/a/SmE2klP)

## Requirements
- PHP 7.2 or higher (You can use the preconfigured [installer]()
- Apache


## Installation

Use [Git](https://git-scm.com/) to clone the repository.

```bash
git clone https://github.com/Code-sleep-repeat/portfolio-voetbal
```

Alternatively, you can also use [the Windows installer](https://www.google.com)

## Endpoints
| Parameter | Type | Description |
| :--- | :--- | :--- |
| `POST` | `backend/api/create.php` | Creates a member |
| `POST` | `backend/api/Readone.php` | Returns one member from the table |
| `POST` | `backend/api/Readone.php` | Returns one member from the table |



```
## Status Codes

FCA cloud returns the following status codes in its API:

| Status Code | Description |
| :--- | :--- |
| 200 | `OK` |
| 201 | `CREATED` |
| 400 | `BAD REQUEST` |
| 404 | `NOT FOUND` |
| 500 | `INTERNAL SERVER ERROR` |

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
