# Example

## Installation

Clone this repository:

```bash
git clone https://github.com/msmakouz/samle.git
```

Install dependencies:

```bash
cd sample
composer install
```

## General information

This example contains two files, `push.php`, and `createQueue.php`.

- The `push.php` file allows for sending a message to an already **existing** queue.
- The `createQueue.php` file allows for creating a queue.

Before using these files, you need to open them and add your **credentials** to access SQS.

## Sending a message

Execute file `push.php` and pass the `queue` name as argument.

```bash
php push.php queueName
```

## Creating a queue

Execute file `createQueue.php` and pass the `queue` name as argument.

```bash
php createQueue.php queueName
```
