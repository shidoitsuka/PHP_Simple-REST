# REST API test
## About
REST API that I made for skill test purposes.

## How to build
- Clone this repo
- Make a database named **gogo**
- Import the SQL file to the database
- Open it on the web.

> I use XAMPP, so I place it inside `htdocs` folder inside my XAMPP directory.

## Usage

### 1. Make a transaction
- Make a POST request to `/transaction.php`
- Parameters are :

|param|required|type|
|--|--|--|
|itemName|`true`|string|
|itemQty|`true`|int|
|paymentMethod|`true`|int (0 for Credit/Debit Card, 1 for Virtual Account)|
|customerName|`true`|string|
|merchantId|`true`|int|

#### Possible Responses :
- `500 Error` - you didn't provice correct data
- `200 Success` - Success

### 2. Check transaction status
- Make a GET request to `/transaction.php?refId={REFERENCES_ID}&merchId={MERCHANT_ID}`

Notice the **REFERENCES_ID** and **MERCHANT_ID**. You need both in order to get transaction status.

#### Possible Responses :
- `500 Error` - you didn't provice correct data
- `200 Success` - Success

### 3. Update transaction status
> You need to install PHP CLI in order to use this feature!

In the shell of your choice, run
```sh
$ php -f index.php {REFERENCES_ID} {STATUS (1-3)}
```

#### Possible Responses :
- `Status tidak boleh lebih dari 3 atau kurang dari 0` - You provide wrong status number

Available status numbers are :
|number|detail|
|--|--|
|1|Pending|
|2|Paid|
|3|Failed|