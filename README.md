# Vitor Braga Adviser

> [!NOTE]
> This project was made as a challenge for a Job Opportunity. It required the usage of Laravel, Vue.js and Tailwind CSS.
> I also used Laravel JetStream as a starting point utilizing the Inertia stack.

1. [Access](#access)
2. [Setup Instructions](#setup-instructions).
3. [Time Spent](#time-spent)
4. [Technical Decisions](#technical-decisions).
5. [Improvements](#improvements).

## Access

This product is using Laravel Vapor, a serverless solution for deployment in AWS.

> https://clean-grove-cop0j9luq39v.vapor-farm-e1.com/

## Setup Instructions

- PHP 8.3
- Laravel 10
- Vue 3 with Composition API
- MySQL 8

> [!NOTE]
> Instructions to run this project locally:

Clone this repository:

```
git clone git@github.com:vitor-leitebraga/vitor-braga-adviser.git
cd vitor-braga-adviser
```

---

Install PHP dependencies:

```
composer install
```

---

Create the .env file from the example

```
cp .env.example .env
```

---

Generate the application key

```
php artisan key:generate
```

---

Create the Database and Migrations

PS: Make sure to create the database with the matching name of it in your .env file

```
php artisan migrate
```

---

Install NPM dependencies:

```
npm ci
```

---

Build assets

```
npm run build
```

Run the server, the output will show the address

PS: Make sure your MySQL is running

```
php artisan serve
```

## Time Spent

- Creating and organizing the project and libraries (1h)
- Prospection Form Step 1 (3h)
  * Includes general thinking about how to structure the whole form, creating the global state management for this page, and
making sure the components were reusable if needed.
- Prospection Form Step 2 (2h)
  * Creating all the components for the inputs and making them reusable. Creating a soft validation of the personal
fields to try to minimize the requests to server.
- Prospection Form Step 3 (1h)
  * Reusing form components, applying validation, creating the request to server.
- Creating Prospection Form server validation and business logic (2h)
  * Includes the FormRequest validation, interfaces, repositories and services.
- Improving Layout (3h)
- Documentation (2h)

## Technical Decisions

- Used Service classes to separate the business logic from the Controllers, making sure they
were only used to receive the requests, handle input validation and provide responses.
- 

## Improvements

Because of time restrictions, I was not able to do all the things I wanted. I will list some of them here just for the
sake of information:

- Use the e-mail field to load the Consumer data, if already used this form previously.
- Change the layout left image to match only the categories selected in the first step
- Since the responsiveness was not required, I did not focus on making sure this would run in a Samsung Galaxy Fold
properly. So I would add this as an improvement.
- Put some static data in the database, like Contact Preferences, States, Insurance Categories, etc.
- An admin part where you can see the data created. (Direct access only for now)
