## About This Repo

I really like AI and ChatGPT has blown my mind. I decided to create a Laravel API that uses ChatGPT to easily integrate in other applications! See the blog at [my blog](https://jyroneparker.com/2023/02/17/creating-a-laravel-chatgpt-api/)

## Usage
This Laravel tutorial application is powered by the [Laravel OpenAI API] (https://github.com/mastashake08/laravel-openai-api) package created by yours truly and can be found here. This package simply requires the package and exposes the API from the package. Simply spin up the instance, run composer, set the .env file and hit the URL.

```
composer install
```

```
POST /api/generate-result  $data - a JSON object containing OpenAI configuration
e.g.
{
  "model": "text-davinci-003",
   "prompt" : "Write a wordpress post excerpt summarizing ChatGPT",
  "temperature": 0.9,
  "max_tokens": 20
}  
```
## Consider Sponsoring
Help me maintain this project, please consider looking at the [FUNDING](./.github/FUNDING.yml) file for more info.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jyrone Parker](https://github.com/mastashake08)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
