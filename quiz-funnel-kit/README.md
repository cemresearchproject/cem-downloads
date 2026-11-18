# Quiz funnel kit

A short quiz for your website. A visitor answers a few questions, leaves their name and email, and then sees one
offer, a few to choose from, or a thank-you page. Each answer moves straight to the next question, a progress bar
shows how far along they are, and a visitor who leaves halfway comes back to where they stopped.

Plain PHP. No framework, no database, no build step: it runs on any host that runs PHP 7.4 or later.

## Set it up

1. Upload the whole folder to your host (for example to `yoursite.com/quiz/`).
2. Open `settings.php` and fill it in (below).
3. Open the folder's address in a browser and take the quiz once yourself.

## settings.php

| Setting | What it does |
|---|---|
| `brand_name` | Your name, shown at the top, in the questions and in the consent line |
| `brand_colour` | `violet`, `teal`, `green`, `amber`, `red` or `slate`. The values are in `assets/tokens.css` |
| `leads` | Where each lead goes (below) |
| `after` | `one` shows the first offer, `few` shows every offer, `thanks` shows a thank-you page |
| `question_set` | `health`, `service`, `software`, `store` or `general` |
| `offers` | The offers shown after the quiz: each has a `name`, a `url` and a one-sentence `line` |

## Where leads go

Set `leads.to` to one of:

- **`email`**: each lead is emailed to `leads.email`. This uses your host's mail; if your host does not send mail,
  use `webhook` or `later`.
- **`webhook`**: each lead is posted as JSON to `leads.webhook`. Point it at Zapier, Make, or your CRM's form address.
- **`later`**: each lead is saved on your server in `leads/leads.jsonl`, one per line, to collect when you are ready.

A lead that cannot be emailed or posted is saved in `leads/leads.jsonl` with the reason, so none is lost.
The `leads/` folder is locked from the web on Apache hosts (`leads/.htaccess`); on other servers, block it yourself
or move the file outside the web folder.

Each lead holds the time, the name, the email, the phone (if given), the question set and every answer.

## Change the questions

Each question set is a file in `sets/`. Change any wording, add or remove an option, or add a question by copying a
line. Keep each `id` short, lowercase and without spaces. `{brand}` in any wording becomes your brand name.
`phone` in the contact step turns the optional phone field on or off.

## Add an offer

Add a line to `offers` in `settings.php`:

```php
['name' => 'Starter plan', 'url' => 'https://yoursite.com/starter', 'line' => 'Everything you need to begin.'],
```

With `after` set to `one`, only the first offer shows: put the one you want first.

## Privacy and terms

`privacy.php` and `terms.php` are starter pages. Read them, change anything that does not match how you work, and
replace `[your contact email]`. They are templates, not legal advice.

## Files

| File | What it is |
|---|---|
| `index.php` | The landing page |
| `quiz.php` | The questions and the contact step |
| `submit.php` | Sends the lead and moves on |
| `after.php` | The offer, offers or thank-you page |
| `settings.php` | Your settings |
| `sets/` | The question sets |
| `assets/` | The look (`tokens.css` for colours, `style.css`) and the quiz script |

Version in `VERSION`. Released under the MIT licence (`LICENSE`). Part of
[CEM downloads](https://tools.cemresearchproject.org).
