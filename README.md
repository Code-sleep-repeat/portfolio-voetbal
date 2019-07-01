# FCA Cloud

FCA Cloud is a PHP based web app that lists members of a soccer club.

<img src="https://github.com/Code-sleep-repeat/portfolio-voetbal/blob/master/assets/PNG/FCA.png" alt="drawing" width="200"/>

## Statistics
![](https://img.shields.io/website/https/fca-cloud.com.svg?down_color=red&style=for-the-badge&up_color=green&up_message=online&down_message=offline)
![](https://img.shields.io/github/repo-size/Code-sleep-repeat/portfolio-voetbal.svg?style=for-the-badge)
![](https://img.shields.io/discord/564739981591969794.svg?label=Discord&logo=discord&style=for-the-badge)
![](https://img.shields.io/github/contributors/Code-sleep-repeat/portfolio-voetbal.svg?style=for-the-badge)
![](https://img.shields.io/github/issues-raw/Code-sleep-repeat/portfolio-voetbal.svg?style=for-the-badge)

## Requirements
- PHP 7.2 or higher (You can use the preconfigured [installer]())
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
| `POST` | `backend/api/member/create.php` | Creates a member |
| `POST` | `backend/api/member/read_one.php` | Returns one member from the table |
| `POST` | `backend/api/member/read.php` | Returns all members from the table |
| `POST` | `backend/api/member/delete.php` | Deletes one member specified by `ID` |
| `POST` | `backend/api/member/search.php` | Returns a members with the `ID` parameter |
| `POST` | `backend/api/member/update.php` | updates member information changes |




## Status Codes

FCA cloud returns the following status codes in its API:

| Status Code | Description |
| :--- | :--- |
| 200 | `OK` |
| 201 | `CREATED` `UPDATED` `DELETED` `SEARCHED` |
| 400 | `BAD REQUEST` |
| 404 | `NOT FOUND` |
| 500 | `INTERNAL SERVER ERROR` |

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
