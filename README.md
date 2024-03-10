
# Online Demo:
https://alisol.ir/Projects/Online-Appointment-Booking-System
-
## Sample Users:
1. User 1:
    - Username: demo1
    - Password: demo1
2. User 2:
    - Username: demo2
    - Password: demo2

# Requirements And Limitations:
- PHP >= 7 Is Allowed.
- PDO Is Allowed (Not Any ORMs).
- Composer Packages Are Allowed (Not Any Frameworks).
- Due Date: 1 Day.

# Desired Features:
- User should be able to make an appointment.
- Reserved times cannot be reserved again.
- User should be able to cancel their previous reserved times.

# Architecture:
- MVC (Inspired by Laravel).

## Architectural Decisions:
- As we have the following two entities:
1. Users
2. Reservations
- So, we need to have 2 models corresponding to them.
- Therefore, decided to create a logginable system and make relation between user and their reservations.

## Operational Decisions:
- As we don't have much time and we were not allowed to use any frameworks:
    - So, decided to create a minimal but scalable system which supports web routing (and API routing for future), composer packages.
    - Also, the system is Git friendly and supports CI/CD procedures.
    - Last but not least, the project supports TDD approach for testing.

# Dependencies:

## Back-End Dependencies:
- PHP >= 8.0.10
- pecee/simple-router 5.4.1.7 (For Implementing Routing)
- phpunit/phpunit >= 9.6 (For Unit Tests)

## Front-End Dependencies:
- Bootstrap Library

# Database:
- MariaDB 10.4.21 

# Tables:
- users
- reservations

# Sample Database Seeder:
https://alisol.ir/Projects/Online-Appointment-Booking-System/migrations/test.sql
