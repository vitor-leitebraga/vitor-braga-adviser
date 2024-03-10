# Vitor Braga Adviser

> [!NOTE]
> This project was made as a challenge for a Job Opportunity. It required the usage of Laravel, Vue.js and Tailwind CSS.
> I also used Laravel JetStream as a starting point utilizing the Inertia stack.

1. [Access](#access)
2. [Setup Instructions](#setup-instructions)
3. [Time Spent](#time-spent)
4. [Technical Decisions](#technical-decisions)
5. [Ideas](#ideas)
6. [Running Tests](#running-tests)

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
git clone https://github.com/vitor-leitebraga/vitor-braga-adviser.git
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

Create the Database and run the Migrations

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

---

Run the server, the output will show the address

PS: Make sure your MySQL is running

```
php artisan serve
```

## Time Spent

- (1h) Creating and organizing the project and libraries 
- (3h) Prospection Form Step 1 
  * Includes general thinking about how to structure the whole form, creating the global state management for this page, and
making sure the components were reusable if needed.
- (2h) Prospection Form Step 2 
  * Creating all the components for the inputs and making them reusable. Creating a soft validation of the personal
fields to try to minimize the requests to server.
- (1h) Prospection Form Step 3 
  * Reusing form components, applying validation, creating the request to server.
- (2h) Creating Prospection Form server validation and business logic 
  * Includes the FormRequest validation, interfaces, repositories and services.
- (2h) Creating some Feature Tests and Unit Tests 
- (3h) Improving Layout 
- (2h) Documentation 

## Technical Decisions

Frontend

- Used Pinia to manage a global state and make sure we have the data from all the steps of the Prospection Form while
we are still navigating between them.
- Created a soft validation for each form step, to minimize the requests to the server.

Backend

- Used Service classes to separate the business logic from the Controllers, even if for this case we don't have too much
of a logic, making sure the Controllers were only used to receive the requests, handle input validation and provide responses.
- Created the Many-to-Many relation between Consumer and ClientAddress thinking about the same Consumer creating
multiple prospections using the same address, and also another person from this same address (family maybe) wanting an 
insurance. The way it was thought I can relate them without creating duplicated data.
- The name ClientAddress was to reuse this entity with another type of possible consumer, like a company. Since both are
clients, I can apply the same ClientAddress to both.
- The logic of reusing a Consumer is currently considering all the fields, to facilitate, but the intention was to take 
into consideration the e-mail field, for example, and use the consumer data instead of creating a whole new Consumer,
again, to prevent duplicated data.
- I used Repositories, even having Eloquent and it's Models which I believe it's enough, but I wanted to 
demonstrate that I'm able to work with it.

## Ideas

The below list have some ideas for future improvements: 

- Use the e-mail field to load the Consumer data, if already used this form previously.
- Change the layout left image to match only the categories selected in the first step
- Since the responsiveness was not required, I did not focus on making sure this would run in a Samsung Galaxy Fold
properly. So I would add this as an improvement.
- Put some static data in the database, like Contact Preferences, States, Insurance Categories, etc.
- An admin area where you can see the data created. (Direct access only for now)
- Add more tests

## Running Tests

```
php artisan test
```
