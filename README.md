## Utility Management System
# Overview

This project is a Laravel-based Utility Management System designed to handle large-scale meter data processing, multi-tenant architecture, and advanced reporting features. It includes a modular service layer, complex database design, and a scalable RESTful API.

# Features

- Multi-tenant architecture supporting multiple customers
- Modular service layer for processing meter data
- Scalable RESTful API with rate limiting
- Complex database design optimized for large datasets
- Distributed data processing system using Laravel Queues
- Dynamic reporting with data analytics capabilities

## Multi-Tenant Architecture

Created migration files called `create_tenants_table` and `create_customers_table` to create the necessary tables for tenants and customers. Every customer belongs to a tenant. I created a `Traits`
folder and added a trait to each of the models so they belong to a tenant. Additionally, I added a listener that adds the user's `tenant_id` to the session. We can then use the `tenant_id` in the scope with the `TenantScope.php` file.
now every time we make a query it will automatically add the `tenant_id` to the query.

## API Endpoints
    
    POST /api/readings: Log a new meter reading
    GET /api/consumption: Retrieve consumption data

## Rate Limiting
API routes are protected by rate limiting middleware. The default limits are:

    - 60 requests per minute for general API endpoints
    - 60 requests per minute for the meter readings endpoint

# Services
The **`MeterDataService`** class handles the core logic for retrieving, aggregating, and processing meter data. It includes methods for calculating daily and monthly consumption.

## Jobs
The `ProcessMeterDataJob` is responsible for background processing of meter data, including data retrieval and consumption calculations.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
